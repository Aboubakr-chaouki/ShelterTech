<?php

/**
 * Users authentication module
 * Authenticate the WordPress users using the imported PrestaShop passwords
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/public
 */

if ( !class_exists('FG_PrestaShop_to_WooCommerce_Users_Authenticate', false) ) {

	/**
	 * Users authentication class
	 *
	 * @package    FG_PrestaShop_to_WooCommerce_Premium
	 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/public
	 * @author     Frédéric GILLES
	 */
	class FG_PrestaShop_to_WooCommerce_Users_Authenticate {

		/**
		 * Authenticate a user using his PrestaShop password
		 *
		 * @param WP_User $user User data
		 * @param string $username User login entered
		 * @param string $password Password entered
		 * @return WP_User User data
		 */
		public static function auth_signon($user, $username, $password) {
			
			if ( is_a($user, 'WP_User') ) {
				// User is already identified
				return $user;
			}
			
			if ( empty($username) || empty($password) ) {
				return $user;
			}
			
			$wp_user = get_user_by('login', $username); // Try to find the user by his login
			if ( !is_a($wp_user, 'WP_User') ) {
				$wp_user = get_user_by('email', $username); // Try to find the user by his email
				if ( !is_a($wp_user, 'WP_User') ) {
					// username not found in WP users
					return $user;
				}
			}
			
			// Get the imported prestashop_pass
			$prestashop_pass = get_user_meta($wp_user->ID, 'prestashop_pass', true);
			if ( empty($prestashop_pass) ) {
				return $user;
			}
			
			// Authenticate the user using the PrestaShop password
			if ( self::auth_prestashop($password, $prestashop_pass) ) {
				// Update WP user password
				add_filter('send_password_change_email', '__return_false'); // Prevent an email to be sent
				wp_update_user(array('ID' => $wp_user->ID, 'user_pass' => $password));
				// To prevent the user to log in again with his PrestaShop password once he has successfully logged in. The following times, his password stored in WordPress will be used instead.
				delete_user_meta($wp_user->ID, 'prestashop_pass');
				
				return $wp_user;
			}
			
			return $user;
		}
		
		/**
		 * PrestaShop user authentication
		 *
		 * @param string $password Password entered
		 * @param string $prestashop_pass Password stored in the WP usermeta table
		 */
		private static function auth_prestashop($password, $prestashop_pass) {
			$result = false;
			
			$password = stripslashes($password);
			
			$options = get_option('fgp2wcp_options');
			$salt = isset($options['cookie_key'])? $options['cookie_key'] : '';
			if ( md5($salt . $password) == $prestashop_pass ) { // MD5 (PrestaShop < 1.7)
				$result = true;
			} elseif ( function_exists('password_verify') && password_verify($password, $prestashop_pass) ) { // BCRYPT (PrestaShop 1.7+)
				$result = true;
			}
			
			return $result;
		}
	}
}
