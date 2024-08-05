<?php
/**
 * Taxes class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      3.51.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_Taxes', false) ) {

	/**
	 * Taxes class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Taxes {

		private $plugin;
		private $imported_tax_classes = array();
		
		/**
		 * Initialize the class and set its properties.
		 *
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {
			$this->plugin = $plugin;
		}

		/**
		 * Import the PrestaShop tax rules groups
		 *
		 */
		public function import_tax_rules_groups() {
			
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			$this->plugin->log(__('Importing taxes...', $this->plugin->get_plugin_name()));
			$wc_tax_classes = $this->get_wc_tax_classes();
			
			$tax_rules_groups = $this->get_tax_rules_groups();
			$imported_tax_rules_groups_count = 0;
			
			foreach ( $tax_rules_groups as $tax_rules_group ) {
				if ( !in_array($tax_rules_group['name'], $wc_tax_classes) ) {
					$this->add_wp_tax_class($tax_rules_group['name']);
					$imported_tax_rules_groups_count++;
				}
				$this->imported_tax_classes[$tax_rules_group['id_tax_rules_group']] = $tax_rules_group['name'];
				
				// Increment the last imported cart rule ID
				update_option('fgp2wc_last_tax_rules_group_id', $tax_rules_group['id_tax_rules_group']);
			}
			
			$this->plugin->display_admin_notice(sprintf(_n('%d tax rules group imported', '%d tax rules groups imported', $imported_tax_rules_groups_count, $this->plugin->get_plugin_name()), $imported_tax_rules_groups_count));
		}

		/**
		 * Get the WooCommerce tax classes
		 * 
		 * @since 3.54.0
		 * 
		 * @global object $wpdb
		 * @return array WooCommerce tax classes
		 */
		private function get_wc_tax_classes() {
			global $wpdb;
			$tax_classes = array();
			
			$sql = "
				SELECT t.name
				FROM {$wpdb->prefix}wc_tax_rate_classes t
			";
			$tax_classes = $wpdb->get_col($sql);
			
			return $tax_classes;
		}
		
		/**
		 * Add a tax class
		 * 
		 * @since 3.54.0
		 * 
		 * @global object $wpdb
		 * @param int|false Number of rows inserted, or false on error
		 */
		private function add_wp_tax_class($tax_class_name) {
			global $wpdb;
			
			return $wpdb->insert($wpdb->prefix . 'wc_tax_rate_classes', array(
				'name' => $tax_class_name,
				'slug' => sanitize_title($tax_class_name)
			));
		}
		
		/**
		 * Get the PrestaShop tax rules groups
		 *
		 * @return array of tax rules groups
		 */
		private function get_tax_rules_groups() {
			$tax_rules_groups = array();
			
			if ( $this->plugin->table_exists('tax_rules_group') ) {
				$prefix = $this->plugin->plugin_options['prefix'];
				if ( $this->plugin->column_exists('tax_rules_group', 'deleted') ) {
					// PrestaShop 1.6 and more
					$deleted_criteria = "AND t.deleted = 0";
				} else {
					// PrestaShop 1.5 and less
					$deleted_criteria = '';
				}
				$sql = "
					SELECT t.id_tax_rules_group, t.name
					FROM {$prefix}tax_rules_group t
					WHERE t.active = 1
					$deleted_criteria
				";
				$tax_rules_groups = $this->plugin->prestashop_query($sql);
			}
			return $tax_rules_groups;
		}
		
		/**
		 * Update the tax class for the product
		 * 
		 * @param int $new_post_id WP Post ID
		 * @param array $product Product data
		 */
		public function update_product_tax_class($new_post_id, $product) {
			if ( isset($product['id_tax_rules_group']) && array_key_exists($product['id_tax_rules_group'], $this->imported_tax_classes) ) {
				$meta_value = sanitize_title($this->imported_tax_classes[$product['id_tax_rules_group']]);
				add_post_meta($new_post_id, '_tax_status', 'taxable', true);
				add_post_meta($new_post_id, '_tax_class', $meta_value, true);
			}
		}
		
	}
}
