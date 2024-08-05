<?php
/**
 * Virtual products class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_VirtualProducts', false) ) {

	/**
	 * Virtual products class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_VirtualProducts {

		private $plugin;
		private $download_manager;
		private $is_connected = false;
		
		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    2.0.0
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;

		}
		
		/**
		 * If there are downloadable products, check if FTP is well configured 
		 * 
		 * @since 4.21.1
		 * 
		 * @param bool $do_import Can do the import
		 * @return bool Can do the import
		 */
		public function check_ftp_for_downloadable_products($do_import) {
			if ( (!isset($this->plugin->premium_options['skip_downloadable']) || !$this->plugin->premium_options['skip_downloadable']) && $this->count_downloads() > 0 ) {
				$this->init_multidownload_manager();
				if ( !$this->is_connected ) {
					$do_import = false;
					$this->plugin->display_admin_error(__('Please configure the FTP connection to transfer the downloadable products or select "Don\'t import the downloadable products" in the Partial Import section', $this->plugin->get_plugin_name()));
				}
			}
			return $do_import;
		}

		/**
		 * Count the PrestaShop downloads
		 *
		 * @since 4.21.1
		 * 
		 * @return int Number of downloads
		 */
		private function count_downloads() {
			$count = 0;
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb
				FROM {$prefix}product_download d
				WHERE d.active = 1
			";
			$results = $this->plugin->prestashop_query($sql);
			if ( count($results) > 0 ) {
				$count = $results[0]['nb'];
			}
			return $count;
		}

		/**
		 * Initialize the multi download manager
		 *
		 * @since 4.16.0
		 */
		public function init_multidownload_manager() {
			$protocol = $this->plugin->plugin_options['download_protocol'] == 'file_system'? 'file_system' : 'ftp';
			$this->download_manager = new FG_PrestaShop_to_WooCommerce_Download($this->plugin, $protocol);
			$this->is_connected = $this->download_manager->test_connection();
		}
		
		/**
		 * Import the PrestaShop virtual products
		 *
		 * @param int $new_post_id WooCommerce product ID
		 * @param array $product PrestaShop product
		 */
		public function import_virtual_products($new_post_id, $product) {
			if ( isset($product['is_virtual']) && $product['is_virtual'] ) {
				// Set the virtual attribute
				update_post_meta($new_post_id, '_virtual', 'yes');
			}
			
			// Import the downloadable files
			$this->import_downloads($new_post_id, $product['id_product']);
		}
		
		/**
		 * Import the PrestaShop downloads
		 *
		 * @param int $new_post_id WooCommerce product ID
		 * @param int $product_id PrestaShop product ID
		 */
		public function import_downloads($new_post_id, $product_id) {
			if ( !isset($this->plugin->premium_options['skip_downloadable']) || !$this->plugin->premium_options['skip_downloadable'] ) {
				$downloads = $this->get_downloads($product_id);
				if ( !empty($downloads) ) {
					// Set the downloadable attribute
					update_post_meta($new_post_id, '_downloadable', 'yes');

					$downloadable_files = array();

					foreach ( $downloads as $download ) {
						$download_limit = empty($download['nb_downloadable'])? -1 : $download['nb_downloadable'];
						$download_expiry = empty($download['nb_days_accessible'])? -1 : $download['nb_days_accessible'];
						add_post_meta($new_post_id, '_download_limit', $download_limit, true);
						add_post_meta($new_post_id, '_download_expiry', $download_expiry, true);

						// Upload the file
						$filename = 'download/' . $download['filename'];
						$upload_path = $this->wc_upload_dir($filename, $download['date_add']);
						// Make sure we have an uploads directory
						if ( !wp_mkdir_p($upload_path) ) {
							$this->plugin->display_admin_error(sprintf(__("Unable to create directory %s", $this->plugin->get_plugin_name()), $upload_path));
							continue;
						}

						$new_full_filename = $upload_path . '/' . $download['display_filename'];

						if ( $this->download_manager->copy($filename, $new_full_filename) ) {
							$filetype = wp_check_filetype($new_full_filename);
							$attachment_id = $this->plugin->insert_attachment($download['display_filename'], $download['display_filename'], $new_full_filename, '', $download['date_add'], $filetype['type']);
							if ( $attachment_id ) {
								$download_id = md5($download['filename']);
								$downloadable_files[$download_id] = array(
									'name' => $download['display_filename'],
									'file' => wp_get_attachment_url($attachment_id),
								);
								update_post_meta($attachment_id, '_fgp2wc_old_file', $filename);
								$this->plugin->media_count++;
							}
						} else {
							$this->plugin->display_admin_error("Can't copy $filename to $new_full_filename");
							return;
						}
					}

					// Attach the downloads to the product
					add_post_meta($new_post_id, '_downloadable_files', $downloadable_files, true);
				}
			}
		}

		/**
		 * Get the PrestaShop downloads
		 *
		 * @param int $product_id Product ID
		 * @return array of downloads
		 */
		private function get_downloads($product_id) {
			$downloads = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4 and less
				$sql = "
					SELECT d.display_filename, d.physically_filename AS filename, d.date_deposit AS date_add, d.nb_days_accessible, d.nb_downloadable
					FROM {$prefix}product_download d
					WHERE d.id_product = '$product_id'
					AND d.active = 1
				";
			} else {
				// PrestaShop 1.5+
				$sql = "
					SELECT d.display_filename, d.filename, d.date_add, d.nb_days_accessible, d.nb_downloadable
					FROM {$prefix}product_download d
					WHERE d.id_product = '$product_id'
					AND d.active = 1
				";
			}
			$downloads = $this->plugin->prestashop_query($sql);

			return $downloads;
		}

		/**
		 * Get the WooCommerce uploads dir
		 * 
		 * @since 2.7.1
		 * 
		 * @param string $filename Filename
		 * @param date $date Date
		 * @return string Upload directory
		 */
		private function wc_upload_dir($filename, $date) {
			$wp_upload_dir = wp_upload_dir();
			$upload_path = $wp_upload_dir['basedir'];
			$upload_dir = $this->plugin->upload_dir($filename, $date);
			$upload_dir = str_replace($upload_path, $upload_path . '/woocommerce_uploads', $upload_dir);
			return $upload_dir;
		}
		
	}
}
