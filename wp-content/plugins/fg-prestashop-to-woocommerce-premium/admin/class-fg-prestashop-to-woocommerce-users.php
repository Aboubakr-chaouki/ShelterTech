<?php

/**
 * Users module
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_PrestaShop_to_WooCommerce_Users', false) ) {

	/**
	 * Users class
	 *
	 * @package    FG_PrestaShop_to_WooCommerce_Premium
	 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_PrestaShop_to_WooCommerce_Users {

		private $plugin;
		private $users = array();
		private $users_count = 0;
		private $wp_languages = array();

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    2.0.0
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;
			$this->wp_languages = array('en' => 'en_US'); // Default WP language
			foreach ( get_available_languages() as $language ) {
				$language_code = strtolower(substr($language, 0, 2));
				$this->wp_languages[$language_code] = $language;
			}

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
			if ( !isset($this->plugin->premium_options['skip_users']) || !$this->plugin->premium_options['skip_users'] ) {
				$count += $this->plugin->get_employees_count();
				$count += $this->plugin->get_customers_count();
			}
			return $count;
		}

		/**
		 * Delete all users except the current user
		 *
		 */
		public function delete_users($action) {
			global $wpdb;
			
			$sql_queries = array();

			$current_user = get_current_user_id();
			
			if ( $action == 'all' ) {
				
				// Delete all users except the current user
				if ( is_multisite() ) {
					$blogusers = get_users(array('exclude' => $current_user));
					foreach ( $blogusers as $user ) {
						wp_delete_user($user->ID);
					}
				} else { // monosite (quicker)
					$sql_queries[] = $wpdb->prepare(<<<SQL
-- Delete User meta
DELETE FROM $wpdb->usermeta
WHERE user_id != %d
SQL,
					$current_user);

				$sql_queries[] = $wpdb->prepare(<<<SQL
-- Delete Users
DELETE FROM $wpdb->users
WHERE ID != %d
SQL,
					$current_user);

					// Execute SQL queries
					if ( count($sql_queries) > 0 ) {
						foreach ( $sql_queries as $sql ) {
							$wpdb->query($sql);
						}
					}
				}
				$this->reset_users_autoincrement();
				
			} else {
				
				// Delete only the imported users
				
				if ( is_multisite() ) {
					$users = array_merge($this->plugin->get_imported_prestashop_employees(), $this->plugin->get_imported_prestashop_customers());
					foreach ( $users as $user_id ) {
						if ( $user_id != $current_user ) {
							wp_delete_user($user_id);
						}
					}
				} else { // monosite (quicker)
					
					// Truncate the temporary table
					$sql_queries[] = <<<SQL
TRUNCATE {$wpdb->prefix}fg_data_to_delete;
SQL;

					// Insert the imported users IDs in the temporary table
					$sql_queries[] = $wpdb->prepare(<<<SQL
INSERT IGNORE INTO {$wpdb->prefix}fg_data_to_delete (`id`)
SELECT user_id FROM $wpdb->usermeta
WHERE meta_key LIKE '_fgp2wc_%'
AND user_id != %d
SQL,
					$current_user);
				
					$sql_queries[] = <<<SQL
-- Delete Users and user metas
DELETE u, um
FROM $wpdb->users u
LEFT JOIN $wpdb->usermeta um ON um.user_id = u.ID
INNER JOIN {$wpdb->prefix}fg_data_to_delete del
WHERE u.ID = del.id;
SQL;

					// Execute SQL queries
					if ( count($sql_queries) > 0 ) {
						foreach ( $sql_queries as $sql ) {
							$wpdb->query($sql);
						}
					}
				}
			}
			wp_cache_flush();
			
			// Reset the PrestaShop last imported user ID
			update_option('fgp2wc_last_customer_id', 0);

			$this->plugin->display_admin_notice(__('Users deleted', $this->plugin->get_plugin_name()));
		}

		/**
		 * Reset the wp_users autoincrement
		 */
		private function reset_users_autoincrement() {
			global $wpdb;

			$sql = "SELECT IFNULL(MAX(ID), 0) + 1 FROM $wpdb->users";
			$max_id = $wpdb->get_var($sql);
			$sql = $wpdb->prepare("ALTER TABLE $wpdb->users AUTO_INCREMENT = %d", $max_id);
			$wpdb->query($sql);
		}

		/**
		 * Reset the Prestashop last imported customer ID
		 *
		 */
		public function reset_customers() {
			update_option('fgp2wc_last_customer_id', 0);
		}
		
		/**
		 * Import users
		 *
		 */
		public function import_users() {
			
			if ( isset($this->plugin->premium_options['skip_users']) && $this->plugin->premium_options['skip_users'] ) {
				return;
			}
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			do_action('fgp2wcp_pre_import_users');
			
			$this->import_employees();
			$this->import_customers();
			$this->plugin->display_admin_notice(sprintf(_n('%d user imported', '%d users imported', $this->users_count, $this->plugin->get_plugin_name()), $this->users_count));
			do_action('fgp2wcp_post_import_users');
		}

		/**
		 * Import employees
		 *
		 */
		private function import_employees() {
			$message = __('Importing employees...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, $this->plugin->get_employees_count());
			} else {
				$this->plugin->log($message);
			}
			
			$employees = $this->get_employees();
			$employees_count = count($employees);
			foreach ( $employees as $employee ) {
				$user_id = $this->add_user($employee['firstname'], $employee['lastname'], $employee['email'], $employee['passwd'], $employee['id_employee'], $employee['last_passwd_gen'], 'editor');
				if ( !is_wp_error($user_id) ) {
					// Link between the PrestaShop ID and the WordPress user ID
					add_user_meta($user_id, 'prestashop_employee_id', $employee['id_employee'], true);
					// Update the user's language
					$this->update_user_language($user_id, $employee['id_lang'], $employee['iso_code']);
				}
				if ( defined('WP_CLI') ) {
					$progress_cli->tick(1);
				}
			}
			$this->plugin->progressbar->increment_current_count($employees_count);
			
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
		}

		/**
		 * Import customers
		 *
		 */
		private function import_customers() {

			// Hook for other actions
			do_action('fgp2wcp_pre_import_customers');
			
			$message = __('Importing customers...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, $this->plugin->get_customers_count());
			} else {
				$this->plugin->log($message);
			}
			
			do {
				if ( $this->plugin->import_stopped() ) {
					break;
				}
				$customers = $this->get_customers($this->plugin->chunks_size);
				$customers_count = count($customers);
				foreach ( $customers as $customer ) {
					$user_id = $this->add_user($customer['firstname'], $customer['lastname'], $customer['email'], $customer['passwd'], $customer['id_customer'], $customer['date_add'], 'customer', $customer['date_upd']);
					if ( !is_wp_error($user_id) ) {
						// Link between the PrestaShop ID and the WordPress user ID
						update_user_meta($user_id, 'prestashop_customer_id', $customer['id_customer']);
						
						$this->update_customer_meta($user_id, $customer);
						
						do_action('fgp2wcp_post_add_customer', $user_id, $customer);
					}
					// Increment the PrestaShop last imported customer ID
					update_option('fgp2wc_last_customer_id', $customer['id_customer']);
				}
				$this->plugin->progressbar->increment_current_count($customers_count);
				
				if ( defined('WP_CLI') ) {
					$progress_cli->tick($this->plugin->chunks_size);
				}
			} while ( ($customers != null) && ($customers_count > 0) );
			
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
		}

		/**
		 * Add a user if it does not exists
		 *
		 * @param string $firstname User's first name
		 * @param string $lastname User's last name
		 * @param string $email User's email
		 * @param string $password User's password in PrestaShop
		 * @param int $ps_user_id User's id in PrestaShop
		 * @param date $register_date Registration date
		 * @param string $role User's role - default: subscriber
		 * @param date $update_date Update date
		 * @return int User ID
		 */
		private function add_user($firstname, $lastname, $email='', $password='', $ps_user_id='', $register_date='', $role='subscriber', $update_date='') {
			$email = sanitize_email($email);
			$login = $email; // Use the email as login
			$display_name = $firstname . ' ' . $lastname;

			$user = get_user_by('email', $email);
			if ( !$user ) {
				// Create a new user
				$userdata = array(
					'user_login'		=> $login,
					'user_pass'			=> wp_generate_password( 12, false ),
					'user_nicename'		=> $login,
					'user_email'		=> $email,
					'nickname'			=> $firstname,
					'display_name'		=> $display_name,
					'first_name'		=> $firstname,
					'last_name'			=> $lastname,
					'user_registered'	=> $register_date,
					'role'				=> $role,
				);
				$user_id = wp_insert_user( $userdata );
				if ( is_wp_error($user_id) ) {
//					$this->plugin->display_admin_error(sprintf(__('Creating user %s: %s', $this->plugin->get_plugin_name()), $login, $user_id->get_error_message()));
				} else {
					$this->users_count++;
					add_user_meta($user_id, '_fgp2wc_old_user_id', $ps_user_id, true);
					if ( !empty($update_date) ) {
						// Update date
						add_user_meta($user_id, '_fgp2wc_ps_date_upd', $update_date, true);
					}
					if ( !empty($password) ) {
						// PrestaShop password to authenticate the users
						add_user_meta($user_id, 'prestashop_pass', $password, true);
					}
//					$this->plugin->display_admin_notice(sprintf(__('User %s created', $this->plugin->get_plugin_name()), $login));
				}
			}
			else {
				$user_id = $user->ID;
				global $blog_id;
				if ( is_multisite() && $blog_id && !is_user_member_of_blog($user_id) ) {
					// Add user to the current blog (in multisite)
					add_user_to_blog($blog_id, $user_id, $role);
					$this->users_count++;
				}
				
				// Update the user if the update date is newer
				$old_update_date = get_user_meta($user_id, '_fgp2wc_ps_date_upd', true);
				if ( $update_date > $old_update_date ) {
					$user->data->user_nicename = $login;
					$user->data->display_name = $display_name;
					$user->data->first_name = $firstname;
					$user->data->last_name = $lastname;
					$user->data->user_registered = $register_date;
					$user_id = wp_update_user($user);
					$user->add_role($role);
					update_user_meta($user_id, '_fgp2wc_old_user_id', $ps_user_id);
					if ( !empty($update_date) ) {
						// Update date
						update_user_meta($user_id, '_fgp2wc_ps_date_upd', $update_date);
					}
					if ( !empty($password) ) {
						// PrestaShop password to authenticate the users
						update_user_meta($user_id, 'prestashop_pass', $password);
					}
				}
				
			}
			return $user_id;
		}
		
		/**
		 * Update the customer meta data
		 * 
		 * @since 4.13.0
		 * 
		 * @param int $user_id WP user ID
		 * @param array $customer Customer data
		 */
		private function update_customer_meta($user_id, &$customer) {
			// Add the customer web site
			wp_update_user(array('ID' => $user_id, 'user_url' => $customer['website']));

			// Add the address fields
			$addresses = $this->get_customer_addresses($customer['id_customer']);
			$customer['addresses'] = $addresses;
			if ( isset($addresses[0]) ) {
				$billing_address = $addresses[0];
				$customer['billing_address'] = $billing_address; // Append the billing address in the customer data
				$phone = !empty($billing_address['phone_mobile'])? $billing_address['phone_mobile'] : $billing_address['phone'];
				update_user_meta($user_id, 'billing_company', $billing_address['company']);
				update_user_meta($user_id, 'billing_last_name', $billing_address['lastname']);
				update_user_meta($user_id, 'billing_first_name', $billing_address['firstname']);
				update_user_meta($user_id, 'billing_phone', $phone);
				update_user_meta($user_id, 'billing_address_1', $billing_address['address1']);
				update_user_meta($user_id, 'billing_address_2', $billing_address['address2']);
				update_user_meta($user_id, 'billing_city', $billing_address['city']);
				update_user_meta($user_id, 'billing_state', $this->process_state_code($billing_address['state'], $billing_address['country']));
				update_user_meta($user_id, 'billing_country', $billing_address['country']);
				update_user_meta($user_id, 'billing_postcode', $billing_address['postcode']);
				update_user_meta($user_id, 'billing_email', $customer['email']);
				
				$addresses_count = count($addresses);
				$shipping_address = $addresses[$addresses_count - 1]; // Use the last address as the shipping address
				if ( $addresses_count > 1 ) {
					$customer['shipping_address'] = $shipping_address; // Append the shipping address in the customer data
				}
				update_user_meta($user_id, 'shipping_company', $shipping_address['company']);
				update_user_meta($user_id, 'shipping_last_name', $shipping_address['lastname']);
				update_user_meta($user_id, 'shipping_first_name', $shipping_address['firstname']);
				update_user_meta($user_id, 'shipping_address_1', $shipping_address['address1']);
				update_user_meta($user_id, 'shipping_address_2', $shipping_address['address2']);
				update_user_meta($user_id, 'shipping_city', $shipping_address['city']);
				update_user_meta($user_id, 'shipping_state', $this->process_state_code($shipping_address['state'], $shipping_address['country']));
				update_user_meta($user_id, 'shipping_country', $shipping_address['country']);
				update_user_meta($user_id, 'shipping_postcode', $shipping_address['postcode']);
				
				// Update the user's language
				$this->update_user_language($user_id, $customer['id_lang'], $customer['iso_code']);
			}
		}
		
		/**
		 * Update the user's language
		 * 
		 * @since 4.31.0
		 * 
		 * @param int $user_id WP user ID
		 * @param int $lang_id User language ID
		 * @param string $language_code User language code (ex: fr)
		 */
		private function update_user_language($user_id, $lang_id, $language_code) {
			if ( ($lang_id != $this->plugin->default_language) && isset($this->wp_languages[$language_code]) ) {
				update_user_meta($user_id, 'locale', $this->wp_languages[$language_code]);
			}
		}
		
		/**
		 * Process the state code before saving it
		 * 
		 * @since 3.27.1
		 * 
		 * @param string $state_code State code
		 * @param string $country Country code
		 * @return string State code
		 */
		private function process_state_code($state_code, $country) {
			if ( !empty($country) && !empty($state_code) && ($country != 'US') ) {
				$state_code = preg_replace('#^' . preg_quote($country) . '-#', '', $state_code); // Remove the country prefix from the state code
			}
			return $state_code;
		}
		
		/**
		 * Get the PrestaShop employees
		 * 
		 * @return array of employees
		 */
		private function get_employees() {
			$employees = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') && ($this->plugin->shop_id != 0) ) {
				// PrestaShop 1.5+
				$extra_joins = "INNER JOIN {$prefix}employee_shop es ON es.id_employee = e.id_employee";
				$extra_criteria = "AND es.id_shop = '{$this->plugin->shop_id}'";
			}
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') ) {
				$extra_joins .= " LEFT JOIN {$prefix}lang l ON l.id_lang = e.id_lang";
				$lang_fields = 'l.id_lang, l.iso_code';
			} else {
				$lang_fields = "'' AS id_lang, '' AS iso_code";
			}
			$sql = "
				SELECT e.id_employee, e.lastname, e.firstname, e.email, e.passwd, e.last_passwd_gen, $lang_fields
				FROM {$prefix}employee e
				$extra_joins
				WHERE e.active = 1
				$extra_criteria
			";
			$employees = $this->plugin->prestashop_query($sql);

			return $employees;
		}

		/**
		 * Get the PrestaShop customers
		 * 
		 * @param int $limit Number of customers max
		 * @return array of customers
		 */
		private function get_customers($limit=1000) {
			$customers = array();

			$last_customer_id = (int)get_option('fgp2wc_last_customer_id'); // to restore the import where it left
			$prefix = $this->plugin->plugin_options['prefix'];
			if ( $this->plugin->column_exists('customer', 'website') ) {
				$website_field = 'c.website';
			} else {
				$website_field = "'' AS website";
			}
			$deleted = '';
			if ( $this->plugin->column_exists('customer', 'deleted') ) {
				$deleted = 'AND c.deleted = 0';
			}
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') && ($this->plugin->shop_id != 0) ) {
				// PrestaShop 1.5+
				$extra_criteria = "AND c.id_shop = '{$this->plugin->shop_id}'";
			}
			if ( $this->plugin->column_exists('customer', 'id_lang') ) {
				$extra_joins = "LEFT JOIN {$prefix}lang l ON l.id_lang = c.id_lang";
				$lang_fields = 'l.id_lang, l.iso_code';
			} else {
				$lang_fields = "'' AS id_lang, '' AS iso_code";
			}
			$sql = "
				SELECT c.id_customer, c.firstname, c.lastname, c.email, c.passwd, $website_field, c.date_add, c.date_upd, $lang_fields
				FROM {$prefix}customer c
				$extra_joins
				WHERE c.active = 1
				AND c.id_customer > '$last_customer_id'
				$extra_criteria
				$deleted
				ORDER BY c.id_customer
				LIMIT $limit
			";
			$sql = apply_filters('fgp2wc_get_customers_sql', $sql);

			$customers = $this->plugin->prestashop_query($sql);

			return $customers;
		}

		/**
		 * Get PrestaShop customer addresses
		 * 
		 * @param int $customer_id Customer ID
		 * @return array Addresses
		 */
		private function get_customer_addresses($customer_id) {
			$addresses = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT a.id_address, a.company, a.lastname, a.firstname, a.address1, a.address2, a.postcode, a.city, a.phone, a.phone_mobile,
				c.iso_code AS country, s.iso_code AS state
				FROM {$prefix}address a
				LEFT JOIN {$prefix}country c ON c.id_country = a.id_country
				LEFT JOIN {$prefix}state s ON s.id_state = a.id_state
				WHERE a.id_customer = '$customer_id'
				AND a.active = 1
				AND a.deleted = 0
				ORDER BY a.id_address
			";
			$sql = apply_filters('fgp2wc_get_customer_addresses_sql', $sql, $customer_id);
			$addresses = $this->plugin->prestashop_query($sql);

			return $addresses;
		}

		/**
		 * Update the already imported customers
		 * 
		 * @since 4.13.0
		 * 
		 * @param date $last_update Last update date
		 */
		public function update_customers($last_update) {
			$customers = $this->get_updated_customers($last_update);
			
			$message = __('Updating customers...', $this->plugin->get_plugin_name());
			if ( defined('WP_CLI') ) {
				$progress_cli = \WP_CLI\Utils\make_progress_bar($message, count($customers));
			} else {
				$this->plugin->log($message);
			}

			$updated_customers_count = 0;

			$imported_customers = $this->plugin->get_imported_prestashop_customers();
			foreach ( $customers as $customer ) {
				if ( isset($imported_customers[$customer['id_customer']]) ) {
					$user_id = $imported_customers[$customer['id_customer']];
					$email = sanitize_email($customer['email']);
					$display_name = $customer['firstname'] . ' ' . $customer['lastname'];
					$userdata = array(
						'ID'				=> $user_id,
						'user_login'		=> $email,
						'user_nicename'		=> $email,
						'user_email'		=> $email,
						'nickname'			=> $customer['firstname'],
						'display_name'		=> $display_name,
						'first_name'		=> $customer['firstname'],
						'last_name'			=> $customer['lastname'],
					);
					wp_update_user($userdata);
					if ( !empty($customer['passwd']) && !empty(get_user_meta($user_id, 'prestashop_pass', true)) ) {
						// PrestaShop password to authenticate the users
						update_user_meta($user_id, 'prestashop_pass', $customer['passwd']);
					}
					$this->update_customer_meta($user_id, $customer);
					
					do_action('fgp2wcp_post_update_customer', $user_id, $customer);
					$updated_customers_count++;
				}
				if ( defined('WP_CLI') ) {
					$progress_cli->tick(1);
				}
			}
			if ( defined('WP_CLI') ) {
				$progress_cli->finish();
			}
			
			// Hook for doing other actions after all customers are updated
			do_action('fgp2wc_post_update_customers');

			$this->plugin->display_admin_notice(sprintf(_n('%d customer updated', '%d customers updated', $updated_customers_count, $this->plugin->get_plugin_name()), $updated_customers_count));
		}

		/**
		 * Get the customers updated after a date
		 * 
		 * @since 4.13.0
		 * 
		 * @param date $last_update
		 */
		private function get_updated_customers($last_update) {
			$customers = array();
			$prefix = $this->plugin->plugin_options['prefix'];

			if ( $this->plugin->column_exists('customer', 'website') ) {
				$website_field = 'c.website';
			} else {
				$website_field = "'' AS website";
			}
			$extra_joins = '';
			if ( $this->plugin->column_exists('customer', 'id_lang') ) {
				$extra_joins = "LEFT JOIN {$prefix}lang l ON l.id_lang = c.id_lang";
				$lang_fields = 'l.id_lang, l.iso_code';
			} else {
				$lang_fields = "'' AS id_lang, '' AS iso_code";
			}
			$sql = "
				SELECT c.id_customer, c.firstname, c.lastname, c.email, c.passwd, $website_field, c.date_add, $lang_fields
				FROM {$prefix}customer c
				$extra_joins
				WHERE c.date_upd > '$last_update'
				ORDER BY c.date_upd
			";
			$customers = $this->plugin->prestashop_query($sql);

			return $customers;
		}
		
		/**
		 * Force the change of the user_login
		 * 
		 * @since 4.32.0
		 * 
		 * @param string $data User data
		 * @param bool $update Update?
		 * @param int $user_id User ID
		 * @param array $userdata Original user data
		 * @return array User data
		 */
		public function force_user_login_change($data, $update, $user_id, $userdata) {
			if ( !empty($userdata['user_login']) ) {
				$data['user_login'] = $userdata['user_login'];
			}
			return $data;
		}
		
	}
}
