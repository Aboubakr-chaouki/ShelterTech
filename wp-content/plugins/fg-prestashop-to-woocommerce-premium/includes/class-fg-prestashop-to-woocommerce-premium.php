<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.0
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/includes
 * @author     Frédéric GILLES
 */
class FG_PrestaShop_to_WooCommerce_Premium {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      FG_PrestaShop_to_WooCommerce_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;
	protected $parent_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function __construct() {

		if ( defined( 'FGP2WCP_PLUGIN_VERSION' ) ) {
			$this->version = FGP2WCP_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'fgp2wcp';
		$this->parent_plugin_name = 'fg-prestashop-to-woocommerce';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - FG_PrestaShop_to_WooCommerce_Loader. Orchestrates the hooks of the plugin.
	 * - FG_PrestaShop_to_WooCommerce_i18n. Defines internationalization functionality.
	 * - FG_PrestaShop_to_WooCommerce_Admin. Defines all hooks for the admin area.
	 * - FG_PrestaShop_to_WooCommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-prestashop-to-woocommerce-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-prestashop-to-woocommerce-i18n.php';

		// Load Importer API
		require_once ABSPATH . 'wp-admin/includes/import.php';
		if ( !class_exists( 'WP_Importer' ) ) {
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			if ( file_exists( $class_wp_importer ) ) {
				require_once $class_wp_importer;
			}
		}

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-premium-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-prestashop-to-woocommerce-tools.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-compatibility.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-modules-check.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-progressbar.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-debug-info.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-download.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-download-fs.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-download-ftp.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-download-http.php';

		/**
		 *  FTP functions
		 */
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-ftpext.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-ftp.php';

		/**
		 *  Premium features
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-users.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-attributes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-virtual-products.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-orders.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-reviews.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-vouchers.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-menus.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-accessories.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-taxes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-prestashop-to-woocommerce-cli.php';
		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-fg-prestashop-to-woocommerce-url-rewriting.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-fg-prestashop-to-woocommerce-users-authenticate.php';

		$this->loader = new FG_PrestaShop_to_WooCommerce_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the FG_PrestaShop_to_WooCommerce_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new FG_PrestaShop_to_WooCommerce_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );
		$plugin_i18n->load_plugin_textdomain();

		// Load parent translation file
		$plugin_i18n_parent = new FG_PrestaShop_to_WooCommerce_i18n();
		$plugin_i18n_parent->set_domain( $this->get_parent_plugin_name() );
		$plugin_i18n_parent->load_plugin_textdomain();

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		global $fgp2wcp;
		
		// Add links to the plugin page
		$this->loader->add_filter( 'plugin_action_links_fg-prestashop-to-woocommerce-premium/fg-prestashop-to-woocommerce-premium.php', $this, 'plugin_action_links' );
		
		/**
		 * The plugin is hooked to the WordPress importer
		 */
		if ( !defined('WP_LOAD_IMPORTERS') && !defined('DOING_AJAX') && !defined('DOING_CRON') && !defined('WP_CLI') ) {
			return;
		}

		$plugin_admin = new FG_PrestaShop_to_WooCommerce_Premium_Admin( $this->get_plugin_name(), $this->get_version() );
		$fgp2wcp = $plugin_admin; // Used by add-ons

		/*
		 * WP CLI
		 */
		if ( defined('WP_CLI') && WP_CLI ) {
			$plugin_cli = new FG_PrestaShop_to_WooCommerce_WPCLI($plugin_admin);
			WP_CLI::add_command('import-prestashop', $plugin_cli);
		}
		
		$this->loader->add_action( 'admin_init', $plugin_admin, 'init' );
		$this->loader->add_filter( 'fgp2wc_sql_pre_query', $plugin_admin, 'convert_zero_date', 10, 1 );
		$this->loader->add_action( 'fgp2wc_post_get_plugin_options', $plugin_admin, 'get_premium_options' );
		$this->loader->add_action( 'fgp2wc_post_test_database_connection', $plugin_admin, 'get_prestashop_info', 9 );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_admin, 'delete_woocommerce_data' );
		$this->loader->add_action( 'load-importer-fgp2wc', $plugin_admin, 'add_help_tab', 20 );
		$this->loader->add_action( 'fgp2wc_import_notices', $plugin_admin, 'display_media_count', 10 );
		$this->loader->add_action( 'admin_footer', $plugin_admin, 'display_notices', 20 );
		$this->loader->add_action( 'wp_ajax_fgp2wcp_import', $plugin_admin, 'ajax_importer' );
		$this->loader->add_filter( 'fgp2wc_pre_import_check', $plugin_admin, 'pre_import_check', 10, 1 );
		$this->loader->add_filter( 'fgp2wc_get_option_names', $plugin_admin, 'get_option_names', 10, 1 );
		$this->loader->add_action( 'fgp2wc_post_insert_product_category', $plugin_admin, 'import_product_category_thumbnails', 10, 2);
		
		/*
		 * Modules checker
		 */
		$plugin_modules_check = new FG_PrestaShop_to_WooCommerce_Modules_Check( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_test_database_connection', $plugin_modules_check, 'check_modules' );
		
		/*
		 * FTP connection
		 */
		$plugin_ftp = new FG_PrestaShop_to_WooCommerce_FTP( $plugin_admin );
		$this->loader->add_filter( 'fgp2wc_post_display_settings_options', $plugin_ftp, 'display_ftp_settings' );
		$this->loader->add_filter( 'fgp2wc_post_save_plugin_options', $plugin_ftp, 'save_ftp_settings' );
		$this->loader->add_action( 'fgp2wc_dispatch', $plugin_ftp, 'test_ftp_connection', 10, 1 );
		$this->loader->add_filter( 'fgp2wc_get_option_names', $plugin_ftp, 'get_option_names', 10, 1 );
		
		/*
		 * Premium features
		 */
		$this->loader->add_action( 'fgp2wc_pre_display_admin_page', $plugin_admin, 'process_admin_page' );
		$this->loader->add_action( 'fgp2wc_post_display_medias_box', $plugin_admin, 'display_texture_option' );
		$this->loader->add_filter( 'fgp2wc_get_database_info', $plugin_admin, 'get_premium_database_info' );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_admin, 'set_truncate_option' );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_admin, 'delete_wpseo_taxonomy_meta');
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_admin, 'delete_yoastseo_data' );
		$this->loader->add_action( 'fgp2wc_post_save_plugin_options', $plugin_admin, 'save_premium_options' );
		$this->loader->add_action( 'fgp2wc_post_save_plugin_options', $plugin_admin, 'update_shops' );
		$this->loader->add_action( 'fgp2wc_pre_test_database_connection', $plugin_admin, 'set_shop_id');
		$this->loader->add_action( 'fgp2wc_post_test_database_connection_click', $plugin_admin, 'append_shops' );
		$this->loader->add_action( 'fgp2wc_pre_get_total_elements_count', $plugin_admin, 'set_shop_id');
		$this->loader->add_action( 'fgp2wc_pre_import', $plugin_admin, 'set_shop_id');
		$this->loader->add_action( 'fgp2wc_pre_update', $plugin_admin, 'set_shop_id');
		$this->loader->add_action( 'fgp2wc_pre_import', $plugin_admin, 'remove_transients' ); // The transients may cause bugs in the front attributes drop-down lists.
		$this->loader->add_action( 'fgp2wc_post_insert_post', $plugin_admin, 'set_meta_seo', 10, 2);
		$this->loader->add_action( 'fgp2wc_post_insert_product_category', $plugin_admin, 'set_product_cat_meta_seo', 10, 2);
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_admin, 'set_meta_seo', 10, 2);
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_admin, 'set_product_primary_category', 10, 3);
		$this->loader->add_action( 'fgp2wc_dispatch', $plugin_admin, 'update', 10, 1 );
		$this->loader->add_filter( 'fgp2wc_get_products_count_sql', $plugin_admin, 'get_products_count_sql', 10, 1 );
		$this->loader->add_filter( 'fgp2wc_get_products_sql', $plugin_admin, 'get_products_sql', 10, 1 );
			
		/*
		 * Users
		 */
		$plugin_users = new FG_PrestaShop_to_WooCommerce_Users( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_users, 'delete_users', 10, 1 );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_users, 'reset_customers' );
		$this->loader->add_action( 'fgp2wc_pre_import', $plugin_users, 'import_users' );
		$this->loader->add_filter( 'fgp2wc_get_total_elements_count', $plugin_users, 'get_total_elements_count' );
		$this->loader->add_action( 'fgp2wc_post_update', $plugin_users, 'update_customers', 10, 1 );
		$this->loader->add_filter( 'wp_pre_insert_user_data', $plugin_users, 'force_user_login_change', 99, 4 );
			
		/*
		 * Attributes, features and variations
		 */
		$plugin_attributes = new FG_PrestaShop_to_WooCommerce_Attributes( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_pre_import_products', $plugin_attributes, 'import_attributes' );
		$this->loader->add_action( 'fgp2wc_pre_update_products', $plugin_attributes, 'update_attributes' );
		$this->loader->add_action( 'fgp2wc_pre_import_products', $plugin_attributes, 'import_features' );
		$this->loader->add_action( 'fgp2wc_pre_update_products', $plugin_attributes, 'update_features' );
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_attributes, 'import_product_attributes', 10, 2 );
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_attributes, 'import_product_variations', 10, 2 );
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_attributes, 'import_product_features', 10, 2 );
		$this->loader->add_action( 'fgp2wc_post_update_product', $plugin_attributes, 'update_product_variations_stocks', 20, 2 );
			
		/*
		 * Virtual products
		 */
		$plugin_virtual_products = new FG_Prestashop_to_WooCommerce_VirtualProducts( $plugin_admin );
		$this->loader->add_filter( 'fgp2wc_pre_import_check', $plugin_virtual_products, 'check_ftp_for_downloadable_products', 10, 1 );
		$this->loader->add_action( 'fgp2wc_pre_import', $plugin_virtual_products, 'init_multidownload_manager' );
		$this->loader->add_action( 'fgp2wc_pre_update', $plugin_virtual_products, 'init_multidownload_manager' );
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_virtual_products, 'import_virtual_products', 10, 2 );
		
		/*
		 * Accessories
		 */
		$plugin_accessories = new FG_Prestashop_to_WooCommerce_Accessories( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_import', $plugin_accessories, 'import_accessories' );
		
		/*
		 * Orders
		 */
		$plugin_orders = new FG_PrestaShop_to_WooCommerce_Orders( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_orders, 'reset_orders' );
		$this->loader->add_action( 'fgp2wc_post_import', $plugin_orders, 'import_orders' );
		$this->loader->add_filter( 'fgp2wc_get_total_elements_count', $plugin_orders, 'get_total_elements_count' );
		$this->loader->add_action( 'fgp2wc_post_update', $plugin_orders, 'update_orders', 10, 1 );
			
		/*
		 * Reviews
		 */
		$plugin_reviews = new FG_PrestaShop_to_WooCommerce_Reviews( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_reviews, 'reset_reviews' );
		$this->loader->add_action( 'fgp2wc_post_import', $plugin_reviews, 'import_reviews' );
		$this->loader->add_filter( 'fgp2wc_get_total_elements_count', $plugin_reviews, 'get_total_elements_count' );
			
		/*
		 * Vouchers
		 */
		$plugin_vouchers = new FG_PrestaShop_to_WooCommerce_Vouchers( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_empty_database', $plugin_vouchers, 'reset_vouchers' );
		$this->loader->add_action( 'fgp2wc_post_import', $plugin_vouchers, 'import_vouchers' );
		$this->loader->add_filter( 'fgp2wc_get_total_elements_count', $plugin_vouchers, 'get_total_elements_count' );
		
		/*
		 * Menus
		 */
		$plugin_menus = new FG_PrestaShop_to_WooCommerce_Menus( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_post_import', $plugin_menus, 'import_menus', 50 );

		/*
		 * Taxes
		 */
		$plugin_taxes = new FG_Prestashop_to_WooCommerce_Taxes( $plugin_admin );
		$this->loader->add_action( 'fgp2wc_pre_import_products', $plugin_taxes, 'import_tax_rules_groups', 10 );
		$this->loader->add_action( 'fgp2wc_post_insert_product', $plugin_taxes, 'update_product_tax_class', 10, 2 );

	}

	/**
	 * Customize the links on the plugins list page
	 *
	 * @param array $links Links
	 * @return array Links
	 */
	public function plugin_action_links($links) {
		// Add the import link
		$import_link = '<a href="admin.php?import=fgp2wc">'. __('Import', $this->plugin_name) . '</a>';
		array_unshift($links, $import_link);
		return $links;
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		/*
		 * URL rewriting
		 */
		new FG_PrestaShop_to_WooCommerce_URL_Rewriting();

		/*
		 * Users authentication
		 */
		$plugin_users_authenticate = new FG_PrestaShop_to_WooCommerce_Users_Authenticate();
		$this->loader->add_filter('authenticate', $plugin_users_authenticate, 'auth_signon', 30, 3);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The name of the parent plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_parent_plugin_name() {
		return $this->parent_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.0.0
	 * @return    FG_PrestaShop_to_WooCommerce_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
