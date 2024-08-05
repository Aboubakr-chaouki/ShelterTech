<?php
/**
 * Orders class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FGPS_WC_Order', false) ) {

	/**
	 * FGPS_WC_Order class
	 *
	 * @since 4.51.0
	 * 
	 * @package    FG_PrestaShop_to_WooCommerce_Premium
	 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FGPS_WC_Order extends WC_Order {

		/**
		 * Override the WC_Order::set_status() method to avoid adding a "completed" note in the order
		 * and wrong paid date and completed date
		 * 
		 * @since 4.51.0
		 * 
		 * @param string $new_status    Status to change the order to. No internal wc- prefix is required.
		 * @param string $note          Optional note to add.
		 * @param bool   $manual_update Is this a manual order status change?.
		 * @return array
		 */
		public function set_status($new_status, $note = '', $manual_update = false) {
			$result = WC_Abstract_Order::set_status($new_status);
			$this->maybe_set_date_paid();
			$this->maybe_set_date_completed();
			return $result;
		}

		/**
		 * Maybe set date paid.
		 *
		 * Override the WC_Order::maybe_set_date_paid() method to set the right date
		 * 
		 * Sets the date paid variable when transitioning to the payment complete
		 * order status. This is either processing or completed. This is not filtered
		 * to avoid infinite loops e.g. if loading an order via the filter.
		 *
		 * Date paid is set once in this manner - only when it is not already set.
		 * This ensures the data exists even if a gateway does not use the
		 * `payment_complete` method.
		 * 
		 * @since 4.51.0
		 */
		public function maybe_set_date_paid() {
			// This logic only runs if the date_paid prop has not been set yet.
			if ( ! $this->get_date_paid( 'edit' ) ) {
				$payment_completed_status = apply_filters( 'woocommerce_payment_complete_order_status', $this->needs_processing() ? 'processing' : 'completed', $this->get_id(), $this );

				if ( $this->has_status( $payment_completed_status ) ) {
					// If payment complete status is reached, set paid now.
					$this->set_date_paid( $this->get_date_modified() );

				} elseif ( 'processing' === $payment_completed_status && $this->has_status( 'completed' ) ) {
					// If payment complete status was processing, but we've passed that and still have no date, set it now.
					$this->set_date_paid( $this->get_date_modified() );
				}
			}
		}

		/**
		 * Maybe set date completed.
		 *
		 * Override the WC_Order::maybe_set_date_completed() method to set the right date
		 * 
		 * Sets the date completed variable when transitioning to completed status.
		 * 
		 * @since 4.51.0
		 */
		protected function maybe_set_date_completed() {
			if ( $this->has_status( 'completed' ) ) {
				$this->set_date_completed( $this->get_date_modified() );
			}
		}
		
	}
}

if ( !class_exists('FG_Prestashop_to_WooCommerce_Orders', false) ) {

	/**
	 * Orders class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Orders {

		private $plugin;
		private $customers = array(); // Imported customers
		private $employees = array(); // Imported employees
		private $products_ids = array();
		private $shipment_methods = array();
		private $order_statuses = array();

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
		 * Reset the Prestashop last imported order ID
		 *
		 */
		public function reset_orders() {
			update_option('fgp2wc_last_order_id', 0);
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
			if ( !isset($this->plugin->premium_options['skip_orders']) || !$this->plugin->premium_options['skip_orders'] ) {
				$count += $this->get_orders_count();
			}
			return $count;
		}

		/**
		 * Get the number of PrestaShop orders
		 * 
		 * @since 3.0.0
		 * 
		 * @return int Number of orders
		 */
		private function get_orders_count() {
			$prefix = $this->plugin->plugin_options['prefix'];
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') && ($this->plugin->shop_id != 0) )  {
				$extra_criteria = "WHERE o.id_shop = '{$this->plugin->shop_id}'";
			}
			$sql = "
				SELECT COUNT(*) AS nb
				FROM {$prefix}orders o
				$extra_criteria
			";
			$result = $this->plugin->prestashop_query($sql);
			$orders_count = isset($result[0]['nb'])? $result[0]['nb'] : 0;
			return $orders_count;
		}

		/**
		 * Import the PrestaShop orders
		 *
		 */
		public function import_orders() {
			if ( isset($this->plugin->premium_options['skip_orders']) && $this->plugin->premium_options['skip_orders'] ) {
				return;
			}
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			$message = __('Importing orders...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, $this->get_orders_count());
			} else {
				$this->plugin->log($message);
			}
			
			// Hook for doing other actions before importing the orders
			do_action('fgp2wc_pre_import_orders');
			
			$imported_orders_count = 0;
			$order_ids = array();
			
			$this->customers = $this->plugin->get_imported_prestashop_customers();
			$this->employees = $this->plugin->get_imported_prestashop_employees();
			$this->products_ids = $this->plugin->get_woocommerce_products();
			$this->shipment_methods = $this->get_shipments_methods();
			$this->order_statuses = $this->get_order_statuses();

			do {
				if ( $this->plugin->import_stopped() ) {
					break;
				}
				$orders = $this->get_orders($this->plugin->chunks_size);
				$orders_count = count($orders);
				foreach ( $orders as $order ) {
					$order_id = $this->import_order($order);
					if ( !is_wp_error($order_id) ) {
						$imported_orders_count++;
						$order_ids[] = $order_id;
					}
				}
				
				$this->plugin->progressbar->increment_current_count($orders_count);
				
				if ( defined('WP_CLI') ) {
					$progress_cli->tick($this->plugin->chunks_size);
				}
			} while ( ($orders != null) && ($orders_count > 0) );
			
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
			
			$this->plugin->display_admin_notice(sprintf(_n('%d order imported', '%d orders imported', $imported_orders_count, $this->plugin->get_plugin_name()), $imported_orders_count));
			
			// Hook for doing other actions after importing the orders
			do_action('fgp2wc_post_import_orders', $order_ids);
		}

		/**
		 * Get the order statuses
		 * 
		 * @since 4.21.0
		 * 
		 * @return array Order statuses
		 */
		private function get_order_statuses() {
			$statuses = array();
			
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT osl.id_order_state, osl.template
				FROM {$prefix}order_state_lang osl
				WHERE osl.id_lang = '{$this->plugin->current_language}'
			";
			$results = $this->plugin->prestashop_query($sql);
			foreach ( $results as $row ) {
				$statuses[$row['id_order_state']] = $row['template'];
			}
			return $statuses;
		}

		/**
		 * Import an order
		 * 
		 * @since 3.52.0
		 * 
		 * @param array $order Order
		 * @return int Order ID
		 */
		private function import_order($order) {
			$order_id = 0;
			
			if ( function_exists('wc_create_order') ) {
				
				// Order status
				if ( $order['current_state'] == 0 ) {
					// Look into the history table if the current_state is 0 (PrestaShop 1.4)
					$last_history = $this->get_order_history($order['id_order']);
					if ( !empty($last_history) ) {
						$current_state = $last_history['id_order_state'];
					} else {
						$current_state = 0;
					}
				} else {
					$current_state = $order['current_state'];
				}
				$order_status = $this->map_order_status($current_state);
				$customer_id = isset($this->customers[$order['id_customer']])? $this->customers[$order['id_customer']] : 0;

				$args = array(
					'customer_id'	=> $customer_id,
					'customer_note'	=> $order['note'],
				);
				$wc_order = wc_create_order($args);

				if ( !is_wp_error($wc_order) ) {
					$order_id = $wc_order->get_id();
					$wc_order = new FGPS_WC_Order($order_id); // for set_status()
					$order_key = $order['reference'];
					$wc_order->set_date_created($order['date_add']);
					$wc_order->set_date_modified($order['date_upd']);
					$wc_order->set_status($order_status);
					
					// Billing address
					$billing_address = $this->get_address($order['id_address_invoice']);
					if ( !empty($billing_address) ) {
						$customer = $this->get_user_by_id($customer_id);
						$email = $customer? $customer->user_email : '';
						$wc_order->set_billing_address(array(
							'first_name' => $billing_address['firstname'],
							'last_name' => $billing_address['lastname'],
							'company' => $billing_address['company'],
							'address_1' => $billing_address['address1'],
							'address_2' => $billing_address['address2'],
							'postcode' => $billing_address['postcode'],
							'city' => $billing_address['city'],
							'state' => $billing_address['state'],
							'country' => $billing_address['country'],
							'email' => $email,
							'phone' => !empty($billing_address['phone_mobile'])? $billing_address['phone_mobile'] : $billing_address['phone'],
						));
					}

					// Shipping address
					$shipping_address = $this->get_address($order['id_address_delivery']);
					if ( !empty($shipping_address) ) {
						$wc_order->set_shipping_address(array(
							'first_name' => $shipping_address['firstname'],
							'last_name' => $shipping_address['lastname'],
							'company' => $shipping_address['company'],
							'address_1' => $shipping_address['address1'],
							'address_2' => $shipping_address['address2'],
							'postcode' => $shipping_address['postcode'],
							'city' => $shipping_address['city'],
							'state' => $shipping_address['state'],
							'country' => $shipping_address['country'],
						));
					}
					
					$wc_order->set_payment_method($order['payment']);
					$wc_order->set_payment_method_title($order['payment']);
					$wc_order->set_shipping_total($order['total_shipping'] - $order['total_shipping_tax']);
					$wc_order->set_discount_total(isset($order['total_discounts_tax_excl'])? $order['total_discounts_tax_excl'] : $order['total_discounts']);
					$wc_order->set_cart_tax($order['total_tax']);
					$wc_order->set_shipping_tax($order['total_shipping_tax']);
					$wc_order->set_total($order['total_paid']);
					$wc_order->set_order_key($order_key);
					$wc_order->set_currency($order['currency']);
					$wc_order->set_prices_include_tax(false);
					$wc_order->set_customer_ip_address('');
					$wc_order->set_customer_user_agent('');
					$wc_order->set_recorded_coupon_usage_counts(true);
					$wc_order->set_date_paid($order['invoice_date']);
					$wc_order->set_date_completed($order['invoice_date']);
					
					// Order items
					$order_items = $this->get_order_items($order['id_order']);
					foreach ( $order_items as $order_item ) {
						$this->add_order_item($order_id, $order['reference'], $order_item, $customer_id, $order['date_add']);
					}
					
					// Discounts
					$this->add_discount_rows($order_id, $order);

					// Shipping
					$this->add_shipping_row($order_id, $order);

					// Taxes
					$this->add_tax_row($order_id, $order);

					// Order comments
					$this->import_order_comments($order_id, $order['id_order']);

					// Add the PrestaShop ID as a post meta and as a wc_orders_meta
					add_post_meta($order_id, '_fgp2wc_old_order_id', $order['id_order'], true);
					$wc_order->add_meta_data('_fgp2wc_old_order_id', $order['id_order'], true);

					// Update the WooCommerce Customers screen
					if ( (get_option('woocommerce_analytics_enabled') == 'yes') && method_exists('Automattic\WooCommerce\Admin\API\Reports\Orders\Stats\DataStore', 'sync_order') ) {
						Automattic\WooCommerce\Admin\API\Reports\Orders\Stats\DataStore::sync_order($order_id);
					}

					// Hook for doing other actions after inserting the order
					do_action('fgp2wc_post_insert_order', $order_id, $order, $billing_address, $shipping_address);

					$wc_order->save();
				}
			}
			
			// Increment the PrestaShop last imported order ID
			update_option('fgp2wc_last_order_id', $order['id_order']);
			
			return $order_id;
		}
		
		/**
		 * Mapping between PrestaShop and WooCommerce status
		 *
		 * @param string $ps_status PrestaShop order status
		 * @return string WooCommerce order status
		 */
		private function map_order_status($ps_status) {
			$status = '';
			if ( isset($this->order_statuses[$ps_status]) ) {
				// Determine the order status from the status template
				$status_template = $this->order_statuses[$ps_status];
				switch ( $status_template ) {
					case 'cheque':
					case 'bankwire':
					case 'cashondelivery':
						$status = 'wc-pending';
						break;
					
					case 'payment':
					case 'preparation':
						$status = 'wc-processing';
						break;
					
					case 'outofstock':
						$status = 'wc-on-hold';
						break;
					
					case 'order_canceled':
						$status = 'wc-cancelled';
						break;
					
					case 'payment_error':
						$status = 'wc-failed';
						break;
					
					case 'refund':
						$status = 'wc-refunded';
						break;
					
					case 'shipped':
						$status = 'wc-completed';
						break;
				}
			}
			if ( empty($status) ) {
				// Determine the order status from the status ID
				switch ( $ps_status ) {
					case '1': // waiting cheque
					case '10': // waiting bank wire
					case '11': // waiting Paypal
						$status = 'wc-pending'; break;
					case '2': // payment accepted
					case '3': // ongoing preparation
					case '12': // remote payment accepted
						$status = 'wc-processing'; break;
					case '9': // out of stock
						$status = 'wc-on-hold'; break;
					case '6': // cancelled
						$status = 'wc-cancelled'; break;
					case '8': // payment error
						$status = 'wc-failed'; break;
					case '7': // refund
						$status = 'wc-refunded'; break;
					case '4': // ongoing shipping
					case '5': // shipped
						$status = 'wc-completed'; break;
					default:
						$status = 'wc-pending'; break;
				}
			}
			$status = apply_filters('fgp2wc_map_order_status', $status, $ps_status);
			return $status;
		}
		
		/**
		 * Add an order item row into the order
		 * 
		 * @since 3.52.0
		 * 
		 * @param int $order_id Order ID
		 * @param string $order_key Order key
		 * @param array $order_item Order item
		 * @param int $user_id Customer ID
		 * @param date $order_date Order date
		 * @return int $wc_order_item_id Order item ID
		 */
		private function add_order_item($order_id, $order_key, $order_item, $user_id, $order_date) {
			$wc_order_item_id = wc_add_order_item($order_id, array(
				'order_item_name'	=> $order_item['product_name'],
				'order_item_type'	=> 'line_item',
			));
			if ( !empty($wc_order_item_id) ) {
				$product_id = isset($this->products_ids[$order_item['product_id']])? $this->products_ids[$order_item['product_id']]: 0;
				$variation_id = $this->get_variation_id($order_item['product_attribute_id']);
				$line_total = $order_item['product_price'];
				$line_tax = $order_item['product_tax'];
				wc_update_order_item_meta($wc_order_item_id, '_qty', $order_item['product_quantity']);
				wc_update_order_item_meta($wc_order_item_id, '_tax_class', $order_item['tax_name']);
				wc_update_order_item_meta($wc_order_item_id, '_product_id', $product_id);
				wc_update_order_item_meta($wc_order_item_id, '_variation_id', $variation_id);
				wc_update_order_item_meta($wc_order_item_id, '_line_subtotal', $line_total);
				wc_update_order_item_meta($wc_order_item_id, '_line_total', $line_total);
				wc_update_order_item_meta($wc_order_item_id, '_line_tax', $line_tax);
				wc_update_order_item_meta($wc_order_item_id, '_line_subtotal_tax', $line_tax);
				wc_update_order_item_meta($wc_order_item_id, '_line_tax_data', array(
					'total' => array((string)$line_tax),
					'subtotal' => array((string)$line_tax),
				));

				// Downloadable products
				if ( !empty($order_item['download_hash']) ) {
					// Create downloadable product permission rows
					$customer = $this->get_user_by_id($user_id);
					$customer_email = isset($customer->user_email)? $customer->user_email : '';
					$this->add_wc_downloadable_product_permission($order_item, $order_id, $order_date, $order_key, $product_id, $user_id, $customer_email);
				}

				// Hook for doing other actions after inserting the order item
				do_action('fgp2wc_post_insert_order_item', $wc_order_item_id, $order_item, $order_id, $product_id, $variation_id);
			}
			
			return $wc_order_item_id;
		}
		
		/**
		 * Get a user by his ID using the WP cache
		 * 
		 * @since 3.70.1
		 * 
		 * @param int $user_id User ID
		 * @return WP_User User | false
		 */
		private function get_user_by_id($user_id) {
			$cache_key = 'fgp2wc_user_' . $user_id;
			$user = wp_cache_get($cache_key);
			if ( $user === false ) {
				$user = get_user_by('id', $user_id);
				wp_cache_set($cache_key, $user);
			}
			return $user;
		}
		
		/**
		 * Get PrestaShop orders
		 * 
		 * @param int $limit Number of articles max
		 * @return array Orders
		 */
		private function get_orders($limit=1000) {
			$orders = array();

			$last_prestashop_order_id = (int)get_option('fgp2wc_last_order_id'); // to restore the import where it left

			$prefix = $this->plugin->plugin_options['prefix'];

			if ( version_compare($this->plugin->prestashop_version, '1.3', '<') ) {
				// PrestaShop 1.2 and less
				$sql = "
					SELECT o.id_order, '' AS reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, 0 AS current_state, o.payment, o.total_paid, o.total_paid - o.total_products - o.total_shipping - o.total_wrapping AS total_tax, o.total_products, o.total_shipping, 0 AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.secure_key, o.invoice_number, o.invoice_date, o.date_add, o.date_upd, '' AS note,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.id_order > '$last_prestashop_order_id'
					ORDER BY o.id_order
					LIMIT $limit
				";
			} elseif ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$sql = "
					SELECT o.id_order, '' AS reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, 0 AS current_state, o.payment, o.total_paid, o.total_products_wt - o.total_products AS total_tax, o.total_products, o.total_shipping, 0 AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.secure_key, o.invoice_number, o.invoice_date, o.date_add, o.date_upd, '' AS note,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.id_order > '$last_prestashop_order_id'
					ORDER BY o.id_order
					LIMIT $limit
				";
			} else {
				// PrestaShop 1.5+
				$extra_criteria = '';
				if ( $this->plugin->shop_id != 0 ) {
					$extra_criteria .= "AND o.id_shop = '{$this->plugin->shop_id}'";
				}
				$note_col = version_compare($this->plugin->prestashop_version, '1.7.8', '>=')? 'o.note' : "'' AS note";
				$sql = "
					SELECT o.id_order, o.reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, o.current_state, o.payment, o.total_paid, o.total_paid_tax_incl - o.total_paid_tax_excl AS total_tax, o.total_products, o.total_shipping, o.total_shipping_tax_incl - o.total_shipping_tax_excl AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.total_discounts_tax_excl, o.secure_key, o.invoice_number, o.invoice_date, o.date_add, o.date_upd, $note_col,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.id_order > '$last_prestashop_order_id'
					$extra_criteria
					ORDER BY o.id_order
					LIMIT $limit
				";
			}
			$sql = apply_filters('fgp2wc_get_orders_sql', $sql, $prefix, $last_prestashop_order_id);
			$orders = $this->plugin->prestashop_query($sql);

			return $orders;
		}

		/**
		 * Get PrestaShop order items
		 * 
		 * @param int $order_id Order ID
		 * @return array Order items
		 */
		private function get_order_items($order_id) {
			$order_items = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$sql = "
					SELECT d.id_order_detail, d.id_order, d.product_id, d.product_attribute_id, d.product_name, d.product_quantity, d.tax_name, d.product_price * d.tax_rate / 100 AS product_tax, d.product_price * d.product_quantity AS product_price, d.download_hash, d.download_nb, d.download_deadline
					FROM {$prefix}order_detail d
					WHERE d.id_order = '$order_id'
					ORDER BY id_order_detail
				";
			} else {
				// PrestaShop 1.5+
				$sql = "
					SELECT d.id_order_detail, d.id_order, d.product_id, d.product_attribute_id, d.product_name, d.product_quantity, d.tax_name, d.total_price_tax_incl - d.total_price_tax_excl AS product_tax, d.total_price_tax_excl AS product_price, d.download_hash, d.download_nb, d.download_deadline
					FROM {$prefix}order_detail d
					WHERE d.id_order = '$order_id'
					ORDER BY id_order_detail
				";
			}
			$order_items = $this->plugin->prestashop_query($sql);

			return $order_items;
		}

		/**
		 * Get PrestaShop order history
		 * 
		 * @param int $order_id Order ID
		 * @return array Order history
		 */
		private function get_order_history($order_id) {
			$order_history = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT h.id_order_state
				FROM {$prefix}order_history h
				WHERE h.id_order = '$order_id'
				ORDER BY h.date_add DESC
				LIMIT 1
			";
			$result = $this->plugin->prestashop_query($sql);
			if ( count($result) > 0 ) {
				$order_history = $result[0];
			}

			return $order_history;
		}

		/**
		 * Get a PrestaShop address
		 * 
		 * @param int $address_id PrestaShop address ID
		 * @return array Address fields
		 */
		private function get_address($address_id) {
			$address = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT a.company, a.lastname, a.firstname, a.address1, a.address2, a.postcode, a.city, a.phone, a.phone_mobile,
				c.iso_code AS country, s.iso_code AS state
				FROM {$prefix}address a
				LEFT JOIN {$prefix}country c ON c.id_country = a.id_country
				LEFT JOIN {$prefix}state s ON s.id_state = a.id_state
				WHERE a.id_address = '$address_id'
				LIMIT 1
			";
			$sql = apply_filters('fgp2wc_get_address_sql', $sql, $address_id, $prefix);
			$result = $this->plugin->prestashop_query($sql);
			if ( count($result) > 0 ) {
				$address = $result[0];
			}
			return $address;
		}
		
		/**
		 * Get the order discounts
		 * 
		 * @since 4.7.0
		 * 
		 * @param int $order_id Order ID
		 * @return array discounts
		 */
		private function get_discounts($order_id) {
			$discounts = array();
			
			if ( $this->plugin->table_exists('order_cart_rule') ) {
				$prefix = $this->plugin->plugin_options['prefix'];
				$sql = "
					SELECT ocr.id_order_cart_rule, cr.code, ocr.value, ocr.value_tax_excl
					FROM {$prefix}order_cart_rule ocr
					INNER JOIN {$prefix}cart_rule cr ON cr.id_cart_rule = ocr.id_cart_rule
					WHERE ocr.id_order = '$order_id'
				";
				$discounts = $this->plugin->prestashop_query($sql);
			}

			return $discounts;
		}
		
		/**
		 * Get PrestaShop shipment methods
		 * 
		 * @return array Shipment methods
		 */
		private function get_shipments_methods() {
			$shipment_methods = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT c.id_carrier, c.name
				FROM {$prefix}carrier c
			";
			$result = $this->plugin->prestashop_query($sql);
			foreach ( $result as $row ) {
				$shipment_methods[$row['id_carrier']] = $row['name'];
			}

			return $shipment_methods;
		}

		/**
		 * Get the WooCommerce variation ID
		 *
		 * @param int $product_attribute_id PrestaShop product attribute ID
		 * @return int WooCommerce variation ID
		 */
		private function get_variation_id($product_attribute_id) {
			global $wpdb;
			$variation_id = 0;
			
			$cache_key = 'fgp2wc_variation_id_' . $product_attribute_id;
			$variation_id = wp_cache_get($cache_key);
			if ( $variation_id === false ) {
				try {
					$sql = $wpdb->prepare("
						SELECT post_id
						FROM $wpdb->postmeta
						WHERE meta_key = '_fgp2wc_old_product_attribute_id'
						AND meta_value = %d
						LIMIT 1
					", $product_attribute_id);
					$variation_id = $wpdb->get_var($sql);
					wp_cache_set($cache_key, $variation_id);
					
				} catch ( PDOException $e ) {
					$this->plugin->display_admin_error(__('Error:', $this->plugin->get_plugin_name()) . $e->getMessage());
				}
			}
			return $variation_id;
		}

		/**
		 * Add downloadable product permission rows
		 * 
		 * @since 2.7.0
		 * 
		 * @param array $order_item Order item data
		 * @param int $order_id Order ID
		 * @param date $order_date Order creation date
		 * @param string $order_key Order key
		 * @param int $product_id Product ID
		 * @param int $user_id User ID
		 * @param string $customer_email Customer email
		 */
		private function add_wc_downloadable_product_permission($order_item, $order_id, $order_date, $order_key, $product_id, $user_id, $customer_email) {
			global $wpdb;
			$download_ids = $this->get_download_ids($product_id);
			foreach ( $download_ids as $download_id ) {
				$wpdb->insert($wpdb->prefix . 'woocommerce_downloadable_product_permissions', array(
					'download_id'			=> $download_id,
					'product_id'			=> $product_id,
					'order_id'				=> $order_id,
					'order_key'				=> $order_key,
					'user_email'			=> $customer_email,
					'user_id'				=> $user_id,
					'downloads_remaining'	=> $this->calculate_downloads_remaining($product_id, $order_item['download_nb']),
					'access_granted'		=> $order_date,
					'access_expires'		=> $order_item['download_deadline'],
					'download_count'		=> $order_item['download_nb'],
				));
			}
		}
		
		/**
		 * Get the download IDs of a product
		 * 
		 * @since 2.7.0
		 * 
		 * @param int $product_id Product ID
		 * @return array Download IDs
		 */
		private function get_download_ids($product_id) {
			$download_ids = array();
			$downloadable_files = get_post_meta($product_id, '_downloadable_files');
			if ( is_array($downloadable_files) ) {
				foreach ( $downloadable_files as $downloadable_file ) {
					$download_ids = array_merge($download_ids, array_keys($downloadable_file));
				}
			}
			return $download_ids;
		}
		
		/**
		 * Calculate the downloads remaining number
		 * 
		 * @since 2.7.0
		 * 
		 * @param int $product_id Product ID
		 * @param int $download_nb Downloads already processed
		 * @return int Downloads remaining
		 */
		private function calculate_downloads_remaining($product_id, $download_nb) {
			$downloads_remaining = '';
			$download_limit = get_post_meta($product_id, '_download_limit', true);
			if ( !empty($download_limit) ) {
				$downloads_remaining = $download_limit - $download_nb;
			}
			return $downloads_remaining;
		}
		
		/**
		 * Update the already imported orders
		 * 
		 * @since 3.22.0
		 * 
		 * @param date $last_update Last update date
		 */
		public function update_orders($last_update) {
			$orders = $this->get_updated_orders($last_update);

			$message = __('Updating orders...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, count($orders));
			} else {
				$this->plugin->log($message);
			}
			$this->order_statuses = $this->get_order_statuses();

			$updated_orders_count = 0;

			foreach ( $orders as $order ) {
				$order_id = $this->get_wp_order_id_from_prestashop_id($order['id_order']);
				if ( !empty($order_id) ) {
					// Order status
					$order_status = $this->map_order_status($order['current_state']);
					// Update the order status
					$wc_order = new WC_Order($order_id);
					$wc_order->set_status($order_status);
					$wc_order->save();
					$updated_orders_count++;
				}
				if ( defined('WP_CLI') ) {
					$progress_cli->tick(1);
				}
			}
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}

			// Hook for doing other actions after all orders are updated
			do_action('fgp2wc_post_update_orders');

			$this->plugin->display_admin_notice(sprintf(_n('%d order updated', '%d orders updated', $updated_orders_count, $this->plugin->get_plugin_name()), $updated_orders_count));
		}

		/**
		 * Get the orders updated after a date
		 * 
		 * @since 3.22.0
		 * 
		 * @param date $last_update
		 */
		private function get_updated_orders($last_update) {
			$orders = array();
			$prefix = $this->plugin->plugin_options['prefix'];

			if ( version_compare($this->plugin->prestashop_version, '1.3', '<') ) {
				// PrestaShop 1.2 and less
				$sql = "
					SELECT o.id_order, '' AS reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, 0 AS current_state, o.payment, o.total_paid, o.total_paid - o.total_products - o.total_shipping - o.total_wrapping AS total_tax, o.total_products, o.total_shipping, 0 AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.secure_key, o.date_add,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.date_upd > '$last_update'
					ORDER BY o.date_upd
				";
			} elseif ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$sql = "
					SELECT o.id_order, '' AS reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, 0 AS current_state, o.payment, o.total_paid, o.total_products_wt - o.total_products AS total_tax, o.total_products, o.total_shipping, 0 AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.secure_key, o.date_add,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.date_upd > '$last_update'
					ORDER BY o.date_upd
				";
			} else {
				// PrestaShop 1.5+
				$sql = "
					SELECT o.id_order, o.reference, o.id_carrier, o.id_customer, o.id_address_delivery, o.id_address_invoice, o.current_state, o.payment, o.total_paid, o.total_paid_tax_incl - o.total_paid_tax_excl AS total_tax, o.total_products, o.total_shipping, o.total_shipping_tax_incl - o.total_shipping_tax_excl AS total_shipping_tax, o.total_wrapping, o.total_discounts, o.secure_key, o.date_add,
					c.iso_code AS currency
					FROM {$prefix}orders o
					LEFT JOIN {$prefix}currency c ON c.id_currency = o.id_currency
					WHERE o.date_upd > '$last_update'
					ORDER BY o.date_upd
				";
			}
			$orders = $this->plugin->prestashop_query($sql);

			return $orders;
		}
		
		/**
		 * Returns the imported order ID corresponding to a PrestaShop ID
		 *
		 * @since 3.22.0
		 * 
		 * @param int $ps_order_id PrestaShop order ID
		 * @return int WordPress order ID
		 */
		public function get_wp_order_id_from_prestashop_id($ps_order_id) {
			$order_id = $this->plugin->get_wp_post_id_from_meta('_fgp2wc_old_order_id', $ps_order_id);
			return $order_id;
		}
		
		/**
		 * Add discount rows into the order
		 * 
		 * @since 4.43.0
		 * 
		 * @param int $order_id Order ID
		 * @param array $order Order
		 */
		private function add_discount_rows($order_id, $order) {
			$discounts = $this->get_discounts($order['id_order']);
			foreach ( $discounts as $discount ) {
				$wc_order_item_id = wc_add_order_item($order_id, array(
					'order_item_name'	=> $discount['code'],
					'order_item_type'	=> 'coupon',
				));
				if ( !empty($wc_order_item_id) ) {
					wc_update_order_item_meta($wc_order_item_id, 'discount_amount', $discount['value_tax_excl']);
					wc_update_order_item_meta($wc_order_item_id, 'discount_amount_tax', $discount['value'] - $discount['value_tax_excl']);
				}
			}
		}
		
		/**
		 * Add a shipping row into the order
		 * 
		 * @since 4.43.0
		 * 
		 * @param int $order_id Order ID
		 * @param array $order Order
		 */
		private function add_shipping_row($order_id, $order) {
			$order_item_name = isset($this->shipment_methods[$order['id_carrier']])? $this->shipment_methods[$order['id_carrier']] : '';
			$wc_order_item_id = wc_add_order_item($order_id, array(
				'order_item_name'	=> $order_item_name,
				'order_item_type'	=> 'shipping',
			));
			if ( !empty($wc_order_item_id) ) {
				wc_update_order_item_meta($wc_order_item_id, 'method_id', 0);
				wc_update_order_item_meta($wc_order_item_id, 'cost', $order['total_shipping'] - $order['total_shipping_tax']);
				wc_update_order_item_meta($wc_order_item_id, 'total_tax', $order['total_shipping_tax']);
				wc_update_order_item_meta($wc_order_item_id, 'taxes', array('total' => array($order['total_shipping_tax'])));
			}
		}
		
		/**
		 * Add a tax row into the order
		 * 
		 * @since 4.43.0
		 * 
		 * @param int $order_id Order ID
		 * @param array $order Order
		 */
		private function add_tax_row($order_id, $order) {
			$wc_order_item_id = wc_add_order_item($order_id, array(
				'order_item_name'	=> 'Tax',
				'order_item_type'	=> 'tax',
			));
			if ( !empty($wc_order_item_id) ) {
				wc_update_order_item_meta($wc_order_item_id, 'rate_id', 0);
				wc_update_order_item_meta($wc_order_item_id, 'label', 'Tax');
				wc_update_order_item_meta($wc_order_item_id, 'compound', 0);
				wc_update_order_item_meta($wc_order_item_id, 'tax_amount', $order['total_tax'] - $order['total_shipping_tax']);
				wc_update_order_item_meta($wc_order_item_id, 'shipping_tax_amount', $order['total_shipping_tax']);
			}
		}
		
		/**
		 * Import the order comments
		 * 
		 * @since 4.22.0
		 * 
		 * @param int $order_id Order ID
		 * @param int $ps_order_id PrestaShop Order ID
		 */
		private function import_order_comments($order_id, $ps_order_id) {
			$comments = $this->get_comments($ps_order_id);
			foreach ( $comments as $comment ) {
				// Insert the comment in the WP comments table
				$data = array(
					'comment_post_ID' => $order_id,
					'comment_content' => $comment['message'],
					'comment_type' => 'order_note',
					'comment_author' => '',
					'comment_author_email' => '',
					'comment_parent' => 0,
					'comment_agent' => 'WooCommerce',
					'comment_date' => $comment['date_add'],
					'comment_approved' => 1,
				);
				$comment_id = wp_insert_comment($data);
				
				if ( $comment_id ) {
					add_comment_meta($comment_id, '_fgp2wc_old_customer_message_id', $comment['id_customer_message']);
					if ( $comment['private'] == 0 ) {
						add_comment_meta($comment_id, 'is_customer_note', 1);
					}
				}
			}
		}
		
		/**
		 * Get the PrestaShop comments of an order
		 * 
		 * @since 4.22.0
		 * 
		 * @param int $order_id PrestaShop Order ID
		 * @return array Comments
		 */
		private function get_comments($order_id) {
			$comments = array();
			$prefix = $this->plugin->plugin_options['prefix'];
			
			$private = version_compare($this->plugin->prestashop_version, '1.5', '>=')? 'm.private' : '"" AS private';
			if ( $this->plugin->table_exists('customer_message') ) {
				$sql = "
					SELECT m.id_customer_message, m.id_employee, m.message, m.date_add, $private
					FROM {$prefix}customer_message m
					INNER JOIN {$prefix}customer_thread t ON t.id_customer_thread = m.id_customer_thread
					WHERE t.id_order = '$order_id'
					AND m.message IS NOT NULL
					AND m.message != ''
				";
				$sql .= " LIMIT 100"; // To avoid hangs due to orders with thousands of notes
				$comments = $this->plugin->prestashop_query($sql);
			}
			return $comments;
		}
		
	}
}
