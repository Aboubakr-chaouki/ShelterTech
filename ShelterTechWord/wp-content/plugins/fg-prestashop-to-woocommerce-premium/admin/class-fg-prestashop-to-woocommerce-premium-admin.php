<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
 * @author     Frédéric GILLES
 */
class FG_PrestaShop_to_WooCommerce_Premium_Admin extends FG_PrestaShop_to_WooCommerce_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	public $premium_options = array();				// Options specific for the Premium version
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param    string    $plugin_name       The name of this plugin.
	 * @param    string    $version           The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		parent::__construct($plugin_name, $version);
		
		$this->faq_url = 'https://www.fredericgilles.net/fg-prestashop-to-woocommerce/faq/';
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		if ( !defined('WP_CLI') ) { // deactivate_plugins() doesn't work with WP CLI on Windows
			$this->deactivate_free_version();
		}
		parent::init();
	}

	/**
	 * Get the Premium options
	 */
	public function get_premium_options() {
		// Default options values
		$this->premium_options = array(
			'cookie_key'				=> '',
			'import_textures'			=> false,
			'texture_as_featured_image'	=> false,
			'import_meta_seo'			=> false,
			'url_redirect'				=> false,
			'shop'						=> null,
			'skip_cms'					=> false,
			'skip_products_categories'	=> false,
			'skip_products'				=> false,
			'skip_disabled_products'	=> false,
			'skip_attributes'			=> false,
			'skip_accessories'			=> false,
			'skip_downloadable'			=> false,
			'skip_users'				=> false,
			'skip_orders'				=> false,
			'skip_reviews'				=> false,
			'skip_vouchers'				=> false,
			'skip_menus'				=> false,
			'skip_prices_update'		=> false,
			'update_stock_only'			=> false,
			'accessories'				=> 'as_crosssells',
		);
		$this->premium_options = apply_filters('fgp2wcp_post_init_premium_options', $this->premium_options);
		$options = get_option('fgp2wcp_options');
		if ( is_array($options) ) {
			$this->premium_options = array_merge($this->premium_options, $options);
		}
	}
	
	/**
	 * Get the WP options name
	 * 
	 * @since 4.0.0
	 * 
	 * @param array $option_names Option names
	 * @return array Option names
	 */
	public function get_option_names($option_names) {
		$option_names = parent::get_option_names($option_names);
		$option_names[] = 'fgp2wcp_options';
		return $option_names;
	}

	/**
	 * Deactivate the free version of FG PrestaShop to WooCommerce to avoid conflicts between both plugins
	 */
	private function deactivate_free_version() {
		deactivate_plugins( 'fg-prestashop-to-woocommerce/fg-prestashop-to-woocommerce.php' );
	}
	
	/**
	 * Add information to the admin page
	 * 
	 * @param array $data
	 * @return array
	 */
	public function process_admin_page($data) {
		$data['title'] = __('Import PrestaShop Premium', $this->plugin_name);
		$data['description'] = __('This plugin will import products, categories, tags, images, CMS, employees, customers and orders from PrestaShop to WooCommerce/WordPress.', $this->plugin_name);
		$data['description'] .= "<br />\n" . sprintf(__('For any issue, please read the <a href="%s" target="_blank">FAQ</a> first.', $this->plugin_name), $this->faq_url);

		// Premium options
		foreach ( $this->premium_options as $key => $value ) {
			$data[$key] = $value;
		}

		// List of shops
		$shops = $this->get_list_of_shops();
		$data['shops_options'] = $shops['shops'];
		return $data;
	}

	/**
	 * Get the WordPress database info
	 * 
	 * @since 3.0.0
	 * 
	 * @param string $database_info Database info
	 * @return string Database info
	 */
	public function get_premium_database_info($database_info) {
		// Users
		$count_users = count_users();
		$users_count = $count_users['total_users'];
		$database_info .= sprintf(_n('%d user', '%d users', $users_count, $this->plugin_name), $users_count) . "<br />";
		
		// Orders
		$orders_count = $this->count_posts('shop_order') + $this->count_posts('shop_order_placehold');
		$database_info .= sprintf(_n('%d order', '%d orders', $orders_count, $this->plugin_name), $orders_count) . "<br />";
		
		return $database_info;
	}
	
	/**
	 * Save the Premium options
	 *
	 */
	public function save_premium_options() {
		$this->premium_options = array_merge($this->premium_options, $this->validate_form_premium_info());
		update_option('fgp2wcp_options', $this->premium_options);
	}

	/**
	 * Validate POST info
	 *
	 * @return array Form parameters
	 */
	private function validate_form_premium_info() {
		$result = array(
			'cookie_key'				=> filter_input(INPUT_POST, 'cookie_key', FILTER_SANITIZE_SPECIAL_CHARS),
			'import_textures'			=> filter_input(INPUT_POST, 'import_textures', FILTER_VALIDATE_BOOLEAN),
			'texture_as_featured_image'	=> filter_input(INPUT_POST, 'texture_as_featured_image', FILTER_SANITIZE_SPECIAL_CHARS),
			'import_meta_seo'			=> filter_input(INPUT_POST, 'import_meta_seo', FILTER_VALIDATE_BOOLEAN),
			'url_redirect'				=> filter_input(INPUT_POST, 'url_redirect', FILTER_VALIDATE_BOOLEAN),
			'shop'						=> filter_input(INPUT_POST, 'shop', FILTER_VALIDATE_INT),
			'skip_cms'					=> filter_input(INPUT_POST, 'skip_cms', FILTER_VALIDATE_BOOLEAN),
			'skip_products_categories'	=> filter_input(INPUT_POST, 'skip_products_categories', FILTER_VALIDATE_BOOLEAN),
			'skip_products'				=> filter_input(INPUT_POST, 'skip_products', FILTER_VALIDATE_BOOLEAN),
			'skip_disabled_products'	=> filter_input(INPUT_POST, 'skip_disabled_products', FILTER_VALIDATE_BOOLEAN),
			'skip_attributes'			=> filter_input(INPUT_POST, 'skip_attributes', FILTER_VALIDATE_BOOLEAN),
			'skip_accessories'			=> filter_input(INPUT_POST, 'skip_accessories', FILTER_VALIDATE_BOOLEAN),
			'skip_downloadable'			=> filter_input(INPUT_POST, 'skip_downloadable', FILTER_VALIDATE_BOOLEAN),
			'skip_users'				=> filter_input(INPUT_POST, 'skip_users', FILTER_VALIDATE_BOOLEAN),
			'skip_orders'				=> filter_input(INPUT_POST, 'skip_orders', FILTER_VALIDATE_BOOLEAN),
			'skip_reviews'				=> filter_input(INPUT_POST, 'skip_reviews', FILTER_VALIDATE_BOOLEAN),
			'skip_vouchers'				=> filter_input(INPUT_POST, 'skip_vouchers', FILTER_VALIDATE_BOOLEAN),
			'skip_menus'				=> filter_input(INPUT_POST, 'skip_menus', FILTER_VALIDATE_BOOLEAN),
			'skip_prices_update'		=> filter_input(INPUT_POST, 'skip_prices_update', FILTER_VALIDATE_BOOLEAN),
			'update_stock_only'			=> filter_input(INPUT_POST, 'update_stock_only', FILTER_VALIDATE_BOOLEAN),
			'accessories'				=> filter_input(INPUT_POST, 'accessories', FILTER_SANITIZE_SPECIAL_CHARS),
		);
		$result = apply_filters('fgp2wcp_validate_form_premium_info', $result);
		return $result;
	}

	/**
	 * Delete all the Yoast SEO data
	 * 
	 * @since 3.58.0
	 * 
	 * @global object $wpdb WPDB object
	 * @param string $action Action
	 */
	public function delete_yoastseo_data($action) {
		global $wpdb;
		if ( $action == 'all' ) {
			$wpdb->hide_errors();
			$sql_queries = array();
			
			// Delete the Yoast SEO tables
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_indexable";
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_indexable_hierarchy";
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_migrations";
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_primary_term";
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_seo_links";
			$sql_queries[] = "TRUNCATE {$wpdb->prefix}yoast_seo_meta";
			
			// Execute SQL queries
			if ( count($sql_queries) > 0 ) {
				foreach ( $sql_queries as $sql ) {
					$wpdb->query($sql);
				}
			}
		}
	}
	
	/**
	 * Set the shop ID
	 * 
	 * @since 3.56.0
	 */
	public function set_shop_id() {
		$this->shop_id = $this->premium_options['shop'];
	}
	
	/**
	 * Set the truncate option in order to keep use the "keep PrestaShop ID" feature
	 * 
	 * @param string $action	newposts = removes only new imported posts
	 * 							all = removes all
	 */
	public function set_truncate_option($action) {
		if ( $action == 'all' ) {
			update_option('fgp2wc_truncate_posts_table', 1);
		} else {
			delete_option('fgp2wc_truncate_posts_table');
		}
	}

	/**
	 * Remove the WordPress transients
	 */
	public function remove_transients() {
		global $wpdb;
		$sql = "
			DELETE FROM $wpdb->options
			WHERE option_name LIKE '_transient%'
		";
		$wpdb->query($sql);
	}

	/**
	 * Sets the SEO meta fields
	 * 
	 * @param int $new_post_id WordPress ID
	 * @param array $post PrestaShop Post
	 */
	public function set_meta_seo($new_post_id, $post) {
		if ( $this->premium_options['import_meta_seo'] ) {
			if ( array_key_exists('meta_title', $post) && !empty($post['meta_title']) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					update_post_meta($new_post_id, '_yoast_wpseo_title', $post['meta_title']);
				}
				if ( class_exists('RankMath') ) { // RankMath
					update_post_meta($new_post_id, 'rank_math_title', $post['meta_title']);
				}
			}
			if ( array_key_exists('meta_description', $post) && !empty($post['meta_description']) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					update_post_meta($new_post_id, '_yoast_wpseo_metadesc', $post['meta_description']);
				}
				if ( class_exists('RankMath') ) { // RankMath
					update_post_meta($new_post_id, 'rank_math_description', $post['meta_description']);
				}
			}
			if ( array_key_exists('meta_keywords', $post) && !empty($post['meta_keywords']) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					update_post_meta($new_post_id, '_yoast_wpseo_metakeywords', $post['meta_keywords']);
				}
			}
			if ( array_key_exists('indexation', $post) && ($post['indexation'] == 0) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					update_post_meta($new_post_id, '_yoast_wpseo_meta-robots-noindex', 1);
				}
				if ( class_exists('RankMath') ) { // RankMath
					update_post_meta($new_post_id, 'rank_math_robots', array('noindex'));
				}
			}
		}
	}

	/**
	 * Delete the Yoast SEO taxonomy meta data (title, description, keywords)
	 * 
	 * @since 3.48.0
	 */
	public function delete_wpseo_taxonomy_meta() {
		delete_option('wpseo_taxonomy_meta');
	}
	
	/**
	 * Sets the product categories SEO meta fields
	 * 
	 * @since 3.48.0
	 * 
	 * @param int $new_term_id WordPress term ID
	 * @param array $product_category PrestaShop product category
	 */
	public function set_product_cat_meta_seo($new_term_id, $product_category) {
		if ( $this->premium_options['import_meta_seo'] &&
			( array_key_exists('meta_title', $product_category) ||
			  array_key_exists('meta_description', $product_category) ||
			  array_key_exists('meta_keywords', $product_category)
			)
		) {
			$wpseo_taxonomy_meta = get_option('wpseo_taxonomy_meta');
			if ( array_key_exists('meta_title', $product_category) && !empty($product_category['meta_title']) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					$wpseo_taxonomy_meta['product_cat'][$new_term_id]['wpseo_title'] = $product_category['meta_title'];
				}
				if ( class_exists('RankMath') ) { // RankMath
					update_term_meta($new_term_id, 'rank_math_title', $product_category['meta_title']);
				}
			}
			if ( array_key_exists('meta_description', $product_category) && !empty($product_category['meta_description']) ) {
				if ( defined('WPSEO_VERSION') ) { // Yoast SEO
					$wpseo_taxonomy_meta['product_cat'][$new_term_id]['wpseo_desc'] = $product_category['meta_description'];
				}
				if ( class_exists('RankMath') ) { // RankMath
					update_term_meta($new_term_id, 'rank_math_description', $product_category['meta_description']);
				}
			}
			if ( array_key_exists('meta_keywords', $product_category) && !empty($product_category['meta_keywords']) ) {
				$wpseo_taxonomy_meta['product_cat'][$new_term_id]['wpseo_metakey'] = $product_category['meta_keywords'];
			}
			if ( defined('WPSEO_VERSION') ) { // Yoast SEO
				update_option('wpseo_taxonomy_meta', $wpseo_taxonomy_meta);
			}
		}
	}
	
	/**
	 * Sets the primary category for the product (used by the Yoast SEO plugin)
	 * 
	 * @since 3.30.0
	 * 
	 * @param int $new_post_id WordPress ID
	 * @param array $post PrestaShop Post
	 * @param string $language Language
	 */
	public function set_product_primary_category($new_post_id, $post, $language) {
		if ( isset($this->imported_categories[$language]) && isset($post['id_category_default']) && isset($this->imported_categories[$language][$post['id_category_default']]) ) {
			update_post_meta($new_post_id, '_yoast_wpseo_primary_product_cat', $this->imported_categories[$language][$post['id_category_default']]);
		}
	}

	/**
	 * Get the WooCommerce products
	 *
	 * @return array of products mapped with the PrestaShop products ids
	 */
	public function get_woocommerce_products() {
		global $wpdb;
		$products = array();

		try {
			$sql = "
				SELECT post_id, meta_value
				FROM $wpdb->postmeta
				WHERE meta_key = '_fgp2wc_old_product_id'
			";
			$rows = $wpdb->get_results($sql);
			foreach ( $rows as $row ) {
				if ( !isset($products[$row->meta_value]) ) {
					$products[$row->meta_value] = $row->post_id;
				}
			}
		} catch ( PDOException $e ) {
			$this->plugin->display_admin_error(__('Error:', $this->plugin->get_plugin_name()) . $e->getMessage());
		}
		return $products;
	}

	/**
	 * Display the texture image options
	 * 
	 * @since 3.3.0
	 * 
	 * @param array $data Form data
	 */
	public function display_texture_option($data) {
		print '<input id="import_textures" name="import_textures" type="checkbox" value="1" ' . checked($data['import_textures'], 1, false) . ' /> <label for="import_textures">' . __("Import the product textures", $this->plugin_name) . '</label> <small>' . __("Check only if you use textures, otherwise it can slow down the import.", $this->plugin_name) . '</small><br />';
		print '<input id="texture_as_featured_image" name="texture_as_featured_image" type="checkbox" value="1" ' . checked($data['texture_as_featured_image'], 1, false) . ' /> <label for="texture_as_featured_image">' . __("Use the product texture as the featured image", $this->plugin_name) . '</label><br />';
	}
	
	/**
	 * Append the lists of shops to an array
	 * 
	 * @since 3.56.0
	 * 
	 * @param array $result Array
	 * @return array Same array with the shops appended
	 */
	public function append_shops($result) {
		$shops = $this->get_list_of_shops();
		if ( $shops !== false ) {
			$result = array_merge($result, $shops);
		}
		return $result;
	}
	
	/**
	 * Get the lists of shops
	 * 
	 * @since 3.56.0
	 * 
	 * @return array Shops
	 */
	private function get_list_of_shops() {
		$shops = get_option('fgp2wc_shops', array());
		if ( empty($shops) ) {
			$shops_options = '<option value="0">' . __('All', $this->plugin_name) . '</option>';
		} else {
			$shops_options = $this->format_options($shops, $this->premium_options['shop']);
		}
		return array(
			'shops' => $shops_options,
		);
	}
	
	/**
	 * Update the shops
	 * 
	 * @since 3.56.0
	 */
	public function update_shops() {
		if ( $this->prestashop_connect() ) {
			$shops = $this->get_shops();
			if ( !empty($shops) ) {
				if ( count($shops) > 1 ) {
					// Add "all shops"
					$all_shops_item = array(
						'id' => 0,
						'name' => __('All', $this->plugin_name),
					);
					$shops = array_merge(array($all_shops_item), $shops);
				}
				if ( !isset($this->premium_options['shop']) ) {
					$this->premium_options['shop'] = isset($shops[0]['id'])? $shops[0]['id'] : 0;
				}
			}
			update_option('fgp2wc_shops', $shops);
		}
	}
	
	/**
	 * Get the list of PrestaShop shops
	 * 
	 * @since 3.56.0
	 * 
	 * @return array List of shops
	 */
	public function get_shops() {
		$shops = array();
		if ( $this->table_exists('shop') ) {
			$prefix = $this->plugin_options['prefix'];

			$sql = "
				SELECT s.id_shop AS id, s.name
				FROM {$prefix}shop s
				WHERE s.active = 1
				AND s.deleted = 0
				ORDER BY s.id_shop
			";
			$shops = $this->prestashop_query($sql);
		}
		return $shops;
	}
	
	/**
	 * Print the options of the shops select box
	 * 
	 * @since 3.56.0
	 * 
	 * @param array $items PrestaShop items
	 * @param int $selected_value Selected value
	 * @return string Options
	 */
	private function format_options($items, $selected_value) {
		$options = '';
		foreach ( $items as $item ) {
			if ( isset($item['id']) ) {
				$selected = is_null($selected_value)? $item['is_default'] == 1 : $item['id'] == $selected_value;
				$options .= '<option value="' . $item['id'] . '"' . ($selected? 'selected="selected"': '') . '>' . $item['name'] . '</option>' . "\n";
			}
		}
		return $options;
	}
	
	/**
	 * Update the already imported products and orders
	 * 
	 * @since 3.22.0
	 * 
	 * @param string $action Action
	 */
	public function update($action) {
		if ( $action != 'update' ) {
			return;
		}
		
		if ( defined('WP_CLI') || defined('DOING_CRON') || check_admin_referer( 'parameters_form', 'fgp2wc_nonce') ) { // Security check
			if ( !defined('WP_CLI') && !defined('DOING_CRON') ) {
				// Save database options
				$this->save_plugin_options();
			}
		
			if ( $this->prestashop_connect() ) {
				$this->pre_import();
				
				$last_update = get_option('fgp2wc_last_update');
				
				// Hook for doing other actions before the update
				do_action('fgp2wc_pre_update', $last_update);

				$this->update_products($last_update);
				
				do_action('fgp2wc_post_update', $last_update);
				
				update_option('fgp2wc_last_update', date('Y-m-d H:i:s'));
			}
		}
	}
	
	/**
	 * Update the already imported products
	 * 
	 * @since 3.22.0
	 * 
	 * @param date $last_update Last update date
	 */
	private function update_products($last_update) {
		do_action('fgp2wc_pre_update_products');
		
		$products = $this->get_updated_products($last_update);
		
		$message = __('Updating products...', $this->plugin_name);
		if ( defined('WP_CLI') ) {
			$progress_cli = \WP_CLI\Utils\make_progress_bar($message, count($products));
		} else {
			$this->log($message);
		}

		$updated_products_count = 0;

		$this->get_imported_categories($this->current_language);
		
		foreach ( $products as $product ) {
			// Get the WordPress product ID
			$post_id = $this->get_wp_product_id_from_prestashop_id($product['id_product']);
			if ( !empty($post_id) ) {
				if ( $this->update_product($post_id, $product, $this->current_language) ) {
					$updated_products_count++;
					
					// Hook for doing other actions after updating the post
					do_action('fgp2wc_post_update_product', $post_id, $product);
				}
			}
			if ( defined('WP_CLI') ) {
				$progress_cli->tick(1);
			}
		}
		if ( defined('WP_CLI') ) {
			$progress_cli->finish();
		}
		$this->display_admin_notice(sprintf(_n('%d product updated', '%d products updated', $updated_products_count, $this->plugin_name), $updated_products_count));

		// Hook for doing other actions after all products are updated
		do_action('fgp2wc_post_update_products');
	}
	
	/**
	 * Get the products updated after a date
	 * 
	 * @since 3.22.0
	 * 
	 * @param date $last_update Last update date
	 */
	private function get_updated_products($last_update) {
		$products = array();

		$prefix = $this->plugin_options['prefix'];
		$lang = $this->current_language;
		$location_field = $this->column_exists('product', 'location')? 'p.location': '"" AS location';
		if ( version_compare($this->prestashop_version, '1.5', '<') ) {
			if ( version_compare($this->prestashop_version, '1.4', '<') ) {
				// PrestaShop 1.3 and less
				$width_field = '0 AS width';
				$height_field = '0 AS height';
				$depth_field = '0 AS depth';
				$reduction_fields = ', p.reduction_price, p.reduction_percent, p.reduction_from, p.reduction_to';
				$available_for_order_field = '1 AS available_for_order';
			} else {
				// PrestaShop 1.4+
				$width_field = 'p.width';
				$height_field = 'p.height';
				$depth_field = 'p.depth';
				$reduction_fields = '';
				$available_for_order_field = 'p.available_for_order';
			}
			$sql = "
				SELECT p.id_product, p.id_supplier, p.id_manufacturer, p.id_category_default, p.on_sale, p.quantity, p.price, p.reference, p.ean13, p.supplier_reference, $location_field, $width_field, $height_field, $depth_field, p.weight, p.out_of_stock, p.active, $available_for_order_field, 'both' AS visibility, 0 AS is_virtual, p.date_add AS date, pl.name, pl.link_rewrite AS slug, pl.description, pl.description_short, pl.meta_description, pl.meta_keywords, pl.meta_title
				$reduction_fields
				FROM {$prefix}product p
				INNER JOIN {$prefix}product_lang AS pl ON pl.id_product = p.id_product AND pl.id_lang = '$lang'
				WHERE p.date_upd > '$last_update'
				ORDER BY p.date_upd
			";
		} else {
			// PrestaShop 1.5+
			$extra_join_product_lang = '';
			$extra_join_product_shop = '';
			if ( $this->shop_id != 0 ) {
				$extra_join_product_lang .= "AND pl.id_shop = '{$this->shop_id}'";
				$extra_join_product_shop .= "AND ps.id_shop = '{$this->shop_id}'";
			}
			$sql = "
				SELECT DISTINCT p.id_product, p.id_supplier, p.id_manufacturer, ps.id_category_default, ps.on_sale, 0 AS quantity, ps.price, p.reference, p.ean13, p.supplier_reference, $location_field, p.width, p.height, p.depth, p.weight, 0 AS out_of_stock, ps.active, ps.available_for_order, ps.visibility, p.is_virtual, ps.date_add AS date, p.date_upd, pl.name, pl.link_rewrite AS slug, pl.description, pl.description_short, pl.meta_description, pl.meta_keywords, pl.meta_title
				FROM {$prefix}product p
				INNER JOIN {$prefix}product_shop AS ps ON ps.id_product = p.id_product $extra_join_product_shop
				INNER JOIN {$prefix}product_lang AS pl ON pl.id_product = p.id_product AND pl.id_lang = '$lang' $extra_join_product_lang
				WHERE p.date_upd > '$last_update'
				ORDER BY p.date_upd
			";
		}
		$sql = apply_filters('fgp2wc_get_products_sql', $sql, $prefix);
		$products = $this->prestashop_query($sql);

		return $products;
	}
	
	/**
	 * Update a product
	 * 
	 * @since 3.22.0
	 * 
	 * @param int $post_id WP post ID
	 * @param array $product PrestaShop product ID
	 * @param int $language Language ID
	 * @return bool Product updated?
	 */
	public function update_product($post_id, $product, $language) {
		$result = false;
		
		if ( $this->premium_options['update_stock_only'] ) {
			// Update the stock and backorders only
			$result = $this->update_product_stock_and_backorders($post_id, $product);
			
		} else {
			// Update all data
			$product_medias = array();
			$post_media = array();

			// Date
			$date = $product['date'];

			// Product images
			if ( !$this->plugin_options['skip_media'] ) {

				$images = $this->get_product_images($product['id_product']);
				foreach ( $images as $image ) {
					$image_name = !empty($image['legend'])? $image['legend'] : $product['name'];
					$image_filenames = $this->build_image_filenames('product', $image['id_image'], $product['id_product']); // Get the potential filenames
					$media_id = $this->guess_import_media($image_name, $image_filenames, $date, $image['id_image']);
					if ( $media_id !== false ) {
						$product_medias[] = $media_id;
					}
				}

				// Import content media
				$post_media = $this->import_media_from_content($product['description'], $date);
			}

			// Product categories
			$categories_ids = array();
			$product_categories = $this->get_product_categories($product['id_product']);
			foreach ( $product_categories as $cat ) {
				if ( isset($this->imported_categories[$language]) && array_key_exists($cat['id_category'], $this->imported_categories[$language]) ) {
					$categories_ids[] = $this->imported_categories[$language][$cat['id_category']];
				}
			}
			$position = isset($product_categories[0])? $product_categories[0]['position'] : 0;

			// Tags
			$tags = $this->get_product_tags($product['id_product']);
			if ( $this->plugin_options['meta_keywords_in_tags'] && !empty($product['meta_keywords']) ) {
				$tags = array_merge($tags, explode(',', $product['meta_keywords']));
			}
			$this->import_tags($tags, 'product_tag');

			// Process content
			$content = isset($product['description'])? $product['description'] : '';
			$content = $this->process_content($content, $post_media);
			$excerpt = isset($product['description_short'])? $product['description_short'] : '';

			// Status
			$status = (($product['active'] == 1) && ($product['available_for_order'] == 1))? 'publish': 'draft';

			// Update the post
			$new_post = array(
				'ID'				=> $post_id,
				'post_content'		=> $content,
				'post_date'			=> $date,
				'post_excerpt'		=> $excerpt,
				'post_status'		=> $status,
				'post_title'		=> $product['name'],
				'post_name'			=> $product['slug'],
				'post_type'			=> 'product',
				'menu_order'		=> $position,
				'tax_input'			=> array(
					'product_cat'	=> $categories_ids,
					'product_tag'	=> $tags,
				),
			);

			// Hook for modifying the WordPress post just before the insert
			$new_post = apply_filters('fgp2wc_pre_update_product', $new_post, $product);

			$new_post_id = wp_update_post($new_post);

			if ( $new_post_id ) {
				// Product type (simple or variable)
				$product_type = $this->product_types['simple'];
				wp_set_object_terms($new_post_id, intval($product_type), 'product_type', true);

				// Product visibility
				$this->set_product_visibility($new_post_id, $product['visibility']);

				// Product galleries
				$medias_id = array();
				foreach ($product_medias as $media) {
					$medias_id[] = $media;
				}
				if ( $this->plugin_options['first_image_not_in_gallery'] ) {
					// Don't include the first image into the product gallery
					array_shift($medias_id);
				}
				$gallery = implode(',', $medias_id);

				// Prices
				if ( !$this->premium_options['skip_prices_update'] ) {
					$product['specific_prices'] = $this->get_specific_prices($product['id_product']);
					$prices = $this->calculate_prices($product);
					$reduction_from = isset($product['reduction_from'])? strtotime($product['reduction_from']): '';
					$reduction_to = isset($product['reduction_to'])? strtotime($product['reduction_to']): '';
				}

				// SKU = Stock Keeping Unit
				$sku = $this->get_sku($product);
				if ( empty($sku) ) {
					$sku = $this->get_product_supplier_reference($product['id_product']);
				}

				// Stock and backorders
				$this->update_product_stock_and_backorders($new_post_id, $product);

				// Update the meta data
				if ( !$this->premium_options['skip_prices_update'] ) {
					update_post_meta($new_post_id, '_regular_price', $prices['regular_price']);
					update_post_meta($new_post_id, '_price', $prices['price']);
					if ( $prices['special_price'] != $prices['regular_price'] ) {
						update_post_meta($new_post_id, '_sale_price', $prices['special_price']);
						update_post_meta($new_post_id, '_sale_price_dates_from', $reduction_from);
						update_post_meta($new_post_id, '_sale_price_dates_to', $reduction_to);
					} else {
						delete_post_meta($new_post_id, '_sale_price');
						delete_post_meta($new_post_id, '_sale_price_dates_from');
						delete_post_meta($new_post_id, '_sale_price_dates_to');
					}
				}
				update_post_meta($new_post_id, '_weight', floatval($product['weight']));
				update_post_meta($new_post_id, '_length', floatval($product['depth']));
				update_post_meta($new_post_id, '_width', floatval($product['width']));
				update_post_meta($new_post_id, '_height', floatval($product['height']));
				update_post_meta($new_post_id, '_sku', $sku);
				update_post_meta($new_post_id, '_product_image_gallery', $gallery);
				update_post_meta($new_post_id, '_virtual', 'no');
				update_post_meta($new_post_id, '_downloadable', 'no');

				// Add the reference value
				if ( ($this->plugin_options['sku'] != 'reference') && !empty($product['reference']) ) {
					update_post_meta($new_post_id, 'reference', $product['reference']);
				}

				// Add the EAN-13 value
				if ( !empty($product['ean13']) ) {
					if ( ($this->plugin_options['sku'] != 'ean13') ) {
						update_post_meta($new_post_id, 'ean13', $product['ean13']);
					}
					// Barcode
					update_post_meta($new_post_id, 'barcode', $product['ean13']);
					// Product GTIN (EAN, UPC, ISBN) for WooCommerce
					update_post_meta($new_post_id, '_wpm_gtin_code', $product['ean13']);
					// EAN for WooCommerce
					update_post_meta($new_post_id, '_alg_ean', $product['ean13']);
					// WP-Lister Lite for Amazon
					update_post_meta($new_post_id, '_amazon_product_id', $product['ean13']);
				}

				// Add links between the post and its medias
				delete_post_meta($new_post_id, '_thumbnail_id');
				$this->add_post_media($new_post_id, $product_medias, $date);
				$this->add_post_media($new_post_id, $this->get_attachment_ids($post_media), $date, false);

				// Remove the product attributes before reimporting them
				$this->remove_product_attributes($new_post_id);

				// Remove the product variations before reimportin them
				$this->remove_product_variations($new_post_id);

				// Hook for doing other actions after inserting the post
				do_action('fgp2wc_post_insert_product', $new_post_id, $product, $language);
				$result = true;
			}
		}
		return $result;
	}
	
	/**
	 * Update the product stock and backorders
	 * 
	 * @since 3.71.0
	 * 
	 * @param int $post_id WP post ID
	 * @param array $product PS product
	 * @param int $product_attribute_id PS product attribute ID
	 * @return bool Product updated?
	 */
	public function update_product_stock_and_backorders($post_id, $product, $product_attribute_id=0) {
		$manage_stock = $this->plugin_options['stock_management']? 'yes': 'no';
		$quantity = 0;
		$out_of_stock_value = 0;
		if ( version_compare($this->prestashop_version, '1.5', '<') ) {
			$quantity = $product['quantity'];
			$out_of_stock_value = $product['out_of_stock'];
		} else {
			$stock = $this->get_product_stock($product['id_product'], $product_attribute_id, $this->shop_id);
			if ( !empty($stock) ) {
				$quantity = $stock['quantity'];
				$out_of_stock_value = $stock['out_of_stock'];
			}
		}
		$stock_status = (!$this->plugin_options['stock_management'] || ($quantity > 0))? 'instock': 'outofstock';
		
		// Backorders
		$backorders = $this->allow_backorders($out_of_stock_value);
		
		update_post_meta($post_id, '_stock_status', $stock_status);
		update_post_meta($post_id, '_stock', $quantity);
		update_post_meta($post_id, '_manage_stock', $manage_stock);
		update_post_meta($post_id, '_backorders', $backorders);
		
		return true;
	}
	
	/**
	 * Remove the WooCommerce product attributes
	 * 
	 * @since 3.22.0
	 * 
	 * @param int $product_id Product ID
	 */
	private function remove_product_attributes($product_id) {
		delete_post_meta($product_id, '_product_attributes');
		
		$taxonomies = get_post_taxonomies($product_id);
		$attributes_taxonomies = array();
		foreach ( $taxonomies as $taxonomy ) {
			if ( strpos($taxonomy, 'pa_') === 0 ) {
				$attributes_taxonomies[] = $taxonomy;
			}
		}
		wp_delete_object_term_relationships($product_id, $attributes_taxonomies);
	}
	
	/**
	 * Remove the WooCommerce product variations
	 * 
	 * @since 3.22.0
	 * 
	 * @param int $product_id Product ID
	 */
	private function remove_product_variations($product_id) {
			$product_variations = get_children(array(
			'numberposts'    => -1,
			'post_parent'    => $product_id,
			'post_status'    => 'any',
			'post_type'      => 'product_variation',
		));
		foreach ( $product_variations as $product_variation ) {
			wp_delete_post($product_variation->ID, true);
		}
	}
	
	/**
	 * Modify the SQL request which counts the products
	 * 
	 * @since 3.59.0
	 * 
	 * @param string $sql SQL request
	 * @return string SQL request
	 */
	public function get_products_count_sql($sql) {
		if ( $this->premium_options['skip_disabled_products'] ) {
			$sql .= "\nWHERE p.active = 1";
		}
		return $sql;
	}
	
	/**
	 * Modify the SQL request which gets the products
	 * 
	 * @since 3.59.0
	 * 
	 * @param string $sql SQL request
	 * @return string SQL request
	 */
	public function get_products_sql($sql) {
		if ( $this->premium_options['skip_disabled_products'] ) {
			$sql = preg_replace('/ORDER BY/', "AND p.active = 1\nORDER BY", $sql);
		}
		return $sql;
	}
	
}
