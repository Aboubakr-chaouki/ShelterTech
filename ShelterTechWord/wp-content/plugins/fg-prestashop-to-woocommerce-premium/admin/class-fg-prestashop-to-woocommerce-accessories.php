<?php
/**
 * Accessories class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      3.36.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_Accessories', false) ) {

	/**
	 * Accessories class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Accessories {

		private $plugin;
		
		/**
		 * Initialize the class and set its properties.
		 *
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;
		}

		/**
		 * Import the PrestaShop accessories
		 *
		 */
		public function import_accessories() {
			if ( (!isset($this->plugin->premium_options['skip_products']) || !$this->plugin->premium_options['skip_products']) &&
				 (!isset($this->plugin->premium_options['skip_accessories']) || !$this->plugin->premium_options['skip_accessories']) ) {
				$this->plugin->log(__('Importing accessories...', $this->plugin->get_plugin_name()));

				$products_with_accessories = $this->get_products_with_accessories();
				foreach ( $products_with_accessories as $product_id) {
					if ( $this->plugin->import_stopped() ) {
						break;
					}
					$accessories = $this->get_accessories($product_id);
					if ( (count($accessories) > 0) && isset($this->plugin->imported_products[$product_id]) ) {
						$related_products_ids = array();
						foreach ( $accessories as $accessory ) {
							if ( isset($this->plugin->imported_products[$accessory]) ) {
								$related_products_ids[] = $this->plugin->imported_products[$accessory];
							}
						}
						if ( in_array($this->plugin->premium_options['accessories'], array('as_crosssells', 'as_both')) ) {
							// Set Cross-sells
							add_post_meta($this->plugin->imported_products[$product_id], '_crosssell_ids', $related_products_ids);
						}
						if ( in_array($this->plugin->premium_options['accessories'], array('as_upsells', 'as_both')) ) {
							// Set Up-sells
							add_post_meta($this->plugin->imported_products[$product_id], '_upsell_ids', $related_products_ids);
						}
					}
				}
			}
		}
		
		/**
		 * Get the PrestaShop products containing accessories
		 * 
		 * @return array Product IDs
		 */
		private function get_products_with_accessories() {
			$products_ids = array();
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT DISTINCT a.id_product_1
				FROM {$prefix}accessory a
			";
			$result = $this->plugin->prestashop_query($sql);
			if ( count($result) > 0 ) {
				foreach ( $result as $row ) {
					$products_ids[] = $row['id_product_1'];
				}
			}
			
			return $products_ids;
		}

		/**
		 * Get the PrestaShop accessories of a product
		 * 
		 * @param int $product_id Product ID
		 * @return array Accessories
		 */
		private function get_accessories($product_id) {
			$accessories = array();
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT a.id_product_2
				FROM {$prefix}accessory a
				WHERE a.id_product_1 = '$product_id'
			";
			$result = $this->plugin->prestashop_query($sql);
			if ( count($result) > 0 ) {
				foreach ( $result as $row ) {
					$accessories[] = $row['id_product_2'];
				}
			}
			
			return $accessories;
		}

	}
}
