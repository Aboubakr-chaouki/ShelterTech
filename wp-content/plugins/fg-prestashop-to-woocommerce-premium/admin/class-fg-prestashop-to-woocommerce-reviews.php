<?php
/**
 * Reviews class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_Reviews', false) ) {

	/**
	 * Reviews class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Reviews {

		private $plugin;
		
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
		 * Reset the Prestashop last imported review ID
		 *
		 */
		public function reset_reviews() {
			update_option('fgp2wc_last_review_id', 0);
		}
		
		/**
		 * Update the number of total elements found in PrestaShop
		 * 
		 * @since 3.0.0
		 * 
		 * @param int $count Number of total elements
		 * @return int Number of total elements
		 */
		public function get_total_elements_count($count) {
			if ( !isset($this->plugin->premium_options['skip_reviews']) || !$this->plugin->premium_options['skip_reviews'] ) {
				$count += $this->get_reviews_count();
			}
			return $count;
		}

		/**
		 * Get the number of PrestaShop reviews
		 * 
		 * @since 3.0.0
		 * 
		 * @return int Number of reviews
		 */
		private function get_reviews_count() {
			$reviews_count = 0;
			if ( $this->plugin->table_exists('product_comment') ) {
				$prefix = $this->plugin->plugin_options['prefix'];
				$deleted = '';
				if ( $this->plugin->column_exists('product_comment', 'deleted') ) {
					$deleted = 'WHERE deleted = 0';
				}
				$sql = "
					SELECT COUNT(*) AS nb
					FROM {$prefix}product_comment
					$deleted
				";
				$result = $this->plugin->prestashop_query($sql);
				$reviews_count = isset($result[0]['nb'])? $result[0]['nb'] : 0;
			}
			return $reviews_count;
		}

		/**
		 * Import the PrestaShop product reviews
		 *
		 */
		public function import_reviews() {
			
			if ( isset($this->plugin->premium_options['skip_reviews']) && $this->plugin->premium_options['skip_reviews'] ) {
				return;
			}
			if ( !$this->plugin->table_exists('product_comment') ) {
				return;
			}
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			$message = __('Importing reviews...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, $this->get_reviews_count());
			} else {
				$this->plugin->log($message);
			}
			
			$imported_reviews_count = 0;
			
			$customers = $this->plugin->get_imported_prestashop_customers();
			$products_ids = $this->plugin->get_woocommerce_products();
			$reviews = $this->get_reviews();
			$reviews_count = count($reviews);
			
			foreach ( $reviews as $review ) {
				$product_id = array_key_exists($review['id_product'], $products_ids)? $products_ids[$review['id_product']]: 0;
				if ( $product_id != 0 ) {
					$user_id = array_key_exists($review['id_customer'], $customers)? $customers[$review['id_customer']]: 0;
					$content = $review['content'];
					if ( !empty($review['title']) ) {
						$content = '<h3>' . $review['title'] . '</h3>' . $content;
					}
					$comment = array(
						'comment_post_ID'		=> $product_id,
						'comment_author'		=> $review['customer_name'],
						'comment_author_email'	=> '',
						'comment_content'		=> $content,
						'comment_type'			=> 'review',
						'user_id'				=> $user_id,
						'comment_author_IP'		=> '',
						'comment_date'			=> $review['date_add'],
						'comment_approved'		=> $review['validate'],
					);
					$comment_id = wp_insert_comment($comment);
					if ( !empty($comment_id) ) {
						$imported_reviews_count++;
						add_comment_meta($comment_id, 'rating', $review['grade'], true);
					}
				}
				if ( defined('WP_CLI') ) {
					$progress_cli->tick(1);
				}
				
				// Increment the PrestaShop last imported review ID
				update_option('fgp2wc_last_review_id', $review['id_product_comment']);
			}
			$this->plugin->progressbar->increment_current_count($reviews_count);
			
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
			
			$this->plugin->display_admin_notice(sprintf(_n('%d review imported', '%d reviews imported', $imported_reviews_count, $this->plugin->get_plugin_name()), $imported_reviews_count));
		}

		/**
		 * Get the PrestaShop product reviews
		 *
		 * @return array of product reviews
		 */
		private function get_reviews() {
			$product_reviews = array();

			if ( $this->plugin->table_exists('product_comment') ) {
				$last_prestashop_review_id = (int)get_option('fgp2wc_last_review_id'); // to restore the import where it left

				$prefix = $this->plugin->plugin_options['prefix'];
				if ( version_compare($this->plugin->prestashop_version, '1.4', '<') ) {
					$sql = "
						SELECT id_product_comment, id_product, id_customer, '' AS title, content, '' AS customer_name, grade, validate, date_add
						FROM {$prefix}product_comment
						WHERE id_product_comment > '$last_prestashop_review_id'
						ORDER BY id_product_comment
					";
				} else {
					$sql = "
						SELECT id_product_comment, id_product, id_customer, title, content, customer_name, grade, validate, date_add
						FROM {$prefix}product_comment
						WHERE deleted = 0
						AND id_product_comment > '$last_prestashop_review_id'
						ORDER BY id_product_comment
					";
				}
				$product_reviews = $this->plugin->prestashop_query($sql);
			}
			
			return $product_reviews;
		}
		
	}
}
