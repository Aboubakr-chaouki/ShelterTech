<?php
/**
 * Vouchers class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_Vouchers', false) ) {

	/**
	 * Vouchers class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Vouchers {

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
		 * Reset the Prestashop last imported cart rule ID
		 *
		 */
		public function reset_vouchers() {
			update_option('fgp2wc_last_cart_rule_id', 0);
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
			if ( !isset($this->plugin->premium_options['skip_vouchers']) || !$this->plugin->premium_options['skip_vouchers'] ) {
				$count += $this->get_vouchers_count();
			}
			return $count;
		}

		/**
		 * Get the number of PrestaShop vouchers
		 * 
		 * @since 3.0.0
		 * 
		 * @return int Number of vouchers
		 */
		private function get_vouchers_count() {
			$prefix = $this->plugin->plugin_options['prefix'];
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				$table_name = 'discount';
			} else {
				$table_name = 'cart_rule';
			}
			$sql = "
				SELECT COUNT(*) AS nb
				FROM {$prefix}$table_name
			";
			$result = $this->plugin->prestashop_query($sql);
			$vouchers_count = isset($result[0]['nb'])? $result[0]['nb'] : 0;
			return $vouchers_count;
		}

		/**
		 * Import the PrestaShop vouchers
		 *
		 */
		public function import_vouchers() {
			
			if ( isset($this->plugin->premium_options['skip_vouchers']) && $this->plugin->premium_options['skip_vouchers'] ) {
				return;
			}
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			$message = __('Importing vouchers...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, $this->get_vouchers_count());
			} else {
				$this->plugin->log($message);
			}
			
			$imported_vouchers_count = 0;
			
			$products_ids = $this->plugin->get_woocommerce_products();
			$categories_ids = $this->plugin->get_term_metas_by_metakey('_fgp2wc_old_product_category_id' . '-lang' . $this->plugin->current_language);
			$vouchers = $this->get_vouchers();
			$vouchers_count = count($vouchers);
			foreach ( $vouchers as $voucher ) {
				if ( $voucher['date_from'] > date('Y-m-d H:i:s') ) {
					$post_status = 'future';
				} else {
					$post_status = 'publish';
				}
				$data = array(
					'post_type'			=> 'shop_coupon',
					'post_date'			=> $voucher['date_from'],
					'post_title'		=> $voucher['code'],
					'post_excerpt'		=> isset($voucher['description'])? $voucher['description']: '',
					'post_status'		=> ($voucher['active'] == 1)? $post_status: 'draft',
					'comment_status'	=> 'closed',
					'ping_status'		=> 'closed',
				);
				$voucher_id = wp_insert_post($data);
				if ( !empty($voucher_id) ) {
					$imported_vouchers_count++;
					add_post_meta($voucher_id, '_fgp2wc_old_voucher_id', $voucher['id_cart_rule']);
					
					//  Percent or amount
					if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
						// PrestaShop 1.4
						$coupon_amount = $voucher['value'];
						$free_shipping = 'no';
						switch ( $voucher['id_discount_type'] ) {
							case 1: // percent
								$discount_type = 'percent';
								break;
							case 3: // free shipping
								$discount_type = 'fixed_cart';
								$coupon_amount = 0.0;
								$free_shipping = 'yes';
								break;
							case 2: // fixed amount
							default: 
								$discount_type = 'fixed_cart';
								break;
						}
					} else {
						// PrestaShop 1.5+
						if ($voucher['reduction_percent'] != 0.0) {
							$discount_type = 'percent';
							$coupon_amount = $voucher['reduction_percent'];
						} else {
							$discount_type = 'fixed_cart';
							$coupon_amount = $voucher['reduction_amount'];
						}
						$free_shipping = !empty($voucher['free_shipping'])? 'yes': 'no';
					}

					// Not cumulable with other discounts
					if ( isset($voucher['cumulable']) && ($voucher['cumulable'] == 0) ) {
						add_post_meta($voucher_id, 'individual_use', 'yes', true);
					}

					// Not cumulable with other reductions
					if ( isset($voucher['cumulable_reduction']) && ($voucher['cumulable_reduction'] == 0) ) {
						add_post_meta($voucher_id, 'exclude_sale_items', 'yes', true);
					}

					// Expiry date
					if ( $voucher['date_to'] == '0000-00-00 00:00:00' ) {
						$expiry_date = '';
					} else {
						$expiry_date = substr($voucher['date_to'], 0, 10); // Remove the hour
					}

					// Customer email
					if ( !empty($voucher['email']) ) {
						$customer_email = array($voucher['email']);
					} else {
						$customer_email = array();
					}
					add_post_meta($voucher_id, 'discount_type', $discount_type, true);
					add_post_meta($voucher_id, 'coupon_amount', $coupon_amount, true);
					add_post_meta($voucher_id, 'usage_limit', $voucher['quantity'], true);
					add_post_meta($voucher_id, 'usage_limit_per_user', $voucher['quantity_per_user'], true);
					add_post_meta($voucher_id, 'expiry_date', $expiry_date, true);
					add_post_meta($voucher_id, 'free_shipping', $free_shipping, true);
					add_post_meta($voucher_id, 'minimum_amount', $voucher['minimum_amount'], true);
					add_post_meta($voucher_id, 'customer_email', $customer_email, true);

					// Products restrictions
					if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') ) { // PrestaShop 1.5+ only
						$cart_rule_items = $this->get_cart_rule_items($voucher['id_cart_rule']);
						$products = array();
						$categories = array();
						foreach ( $cart_rule_items as $cart_rule_item ) {
							switch ( $cart_rule_item['type'] ) {
								
								// Products restriction
								case 'products':
									if ( array_key_exists($cart_rule_item['id_item'], $products_ids) ) {
										$products[] = $products_ids[$cart_rule_item['id_item']];
									}
									break;
								
								// Categories restriction
								case 'categories':
									if ( array_key_exists($cart_rule_item['id_item'], $categories_ids) ) {
										$categories[] = $categories_ids[$cart_rule_item['id_item']];
									}
									break;
							}
						}
						if ( !empty($products) ) {
							add_post_meta($voucher_id, 'product_ids', implode(',', $products), true);
						}
						if ( !empty($categories) ) {
							add_post_meta($voucher_id, 'product_categories', $categories, true);
						}
					}
				}
				if ( defined('WP_CLI') ) {
					$progress_cli->tick(1);
				}
				
				// Increment the last imported cart rule ID
				update_option('fgp2wc_last_cart_rule_id', $voucher['id_cart_rule']);
			}
			$this->plugin->progressbar->increment_current_count($vouchers_count);
			
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
			
			$this->plugin->display_admin_notice(sprintf(_n('%d voucher imported', '%d vouchers imported', $imported_vouchers_count, $this->plugin->get_plugin_name()), $imported_vouchers_count));
		}

		/**
		 * Get the PrestaShop vouchers
		 *
		 * @return array of vouchers
		 */
		private function get_vouchers() {
			$vouchers = array();

			$last_prestashop_voucher_id = (int)get_option('fgp2wc_last_cart_rule_id'); // to restore the import where it left

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$sql = "
					SELECT d.id_discount AS id_cart_rule, d.id_discount_type, d.id_customer, d.name AS code, d.value, d.quantity, d.quantity_per_user, d.cumulable, d.cumulable_reduction, d.date_from, d.date_to, d.minimal AS minimum_amount, d.active,
					dl.description,
					cu.email
					FROM {$prefix}discount d
					LEFT JOIN {$prefix}discount_lang dl ON dl.id_discount = d.id_discount AND dl.id_lang = '$lang'
					LEFT JOIN {$prefix}customer cu ON cu.id_customer = d.id_customer
					WHERE d.id_discount > '$last_prestashop_voucher_id'
					ORDER BY d.id_discount
				";
			} else {
				// PrestaShop 1.5+
				$sql = "
					SELECT c.id_cart_rule, c.id_customer, c.date_from, c.date_to, c.description, c.quantity, c.quantity_per_user, c.code, c.minimum_amount, c.product_restriction, c.free_shipping, c.reduction_percent, c.reduction_amount, c.reduction_product, c.active,
					cu.email
					FROM {$prefix}cart_rule c
					LEFT JOIN {$prefix}customer cu ON cu.id_customer = c.id_customer
					WHERE c.id_cart_rule > '$last_prestashop_voucher_id'
					ORDER BY c.id_cart_rule
				";
			}
			$sql = apply_filters('fgp2wc_get_vouchers_sql', $sql);
			$vouchers = $this->plugin->prestashop_query($sql);

			return $vouchers;
		}

		/**
		 * Get the PrestaShop items (products or categories) included in a voucher
		 *
		 * @param int $id_cart_rule Cart rule ID
		 * @return array of items with their type (products|categories)
		 */
		private function get_cart_rule_items($id_cart_rule) {
			$items = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT cpv.id_item, cp.type
				FROM {$prefix}cart_rule_product_rule_value cpv
				INNER JOIN {$prefix}cart_rule_product_rule cp ON cp.id_product_rule = cpv.id_product_rule
				INNER JOIN {$prefix}cart_rule_product_rule_group cg ON cg.id_product_rule_group = cp.id_product_rule_group
				WHERE cg.id_cart_rule = '$id_cart_rule'
			";
			$items = $this->plugin->prestashop_query($sql);

			return $items;
		}
		
	}
}
