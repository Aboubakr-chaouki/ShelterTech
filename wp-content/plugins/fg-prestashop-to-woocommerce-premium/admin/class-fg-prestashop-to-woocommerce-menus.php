<?php

/**
 * Navigation menus module
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      3.6.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_PrestaShop_to_WooCommerce_Menus', false) ) {

	/**
	 * Navigation menus class
	 *
	 * @package    FG_PrestaShop_to_WooCommerce_Premium
	 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_PrestaShop_to_WooCommerce_Menus {

		const MAIN_MENU_NAME = 'Main menu';
		
		private $menus_count = 0;
		private $plugin;
		private $last_menu_item_position = 0;
		private $imported_cms_articles = array();
		private $imported_products = array();

		/**
		 * Initialize the class and set its properties.
		 *
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;
		}

		/**
		 * Import the navigation menus
		 * 
		 */
		public function import_menus() {
			if ( isset($this->plugin->premium_options['skip_menus']) && $this->plugin->premium_options['skip_menus'] ) {
				return;
			}
			if ( $this->plugin->import_stopped() ) {
				return;
			}
			
			$this->plugin->log(__('Importing menus...', $this->plugin->get_plugin_name()));
			
			// Set the list of previously imported menu items
			$imported_menus = $this->plugin->get_imported_ps_posts('_fgp2wc_old_menu_item_id');
			
			// Set the list of previously imported CMS articles
			$this->imported_cms_articles = $this->plugin->get_imported_ps_posts('_fgp2wc_old_cms_article_id');
			
			// Set the list of previously imported products
			$this->imported_products = $this->plugin->get_imported_ps_posts('_fgp2wc_old_product_id');
			
			// Set the list of previously imported categories
			$this->plugin->get_imported_cms_categories($this->plugin->current_language);
			
			// Set the list of previously imported product categories
			$this->plugin->get_imported_categories($this->plugin->current_language);
			
			do_action('fgp2wc_pre_import_menus');
			
			$menus = $this->get_menus();
			
			foreach ( $menus as $menu ) {
				if ( !array_key_exists($menu, $imported_menus) ) { // Don't import already imported menu
					$new_menu_id = $this->add_menu($menu);
					if ( !empty($new_menu_id) ) {
						$imported_menus[$menu] = $new_menu_id;
					}
				}
			}
			
			$this->plugin->display_admin_notice(sprintf(_n('%d menu item imported', '%d menu items imported', $this->menus_count, $this->plugin->get_plugin_name()), $this->menus_count));
		}
		
		/**
		 * Get the PrestaShop menus
		 * 
		 * @return array Menus
		 */
		private function get_menus() {
			$menus = array();
			
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') ) {
				$prefix = $this->plugin->plugin_options['prefix'];

				$sql = "
					SELECT c.value
					FROM {$prefix}configuration c
					WHERE c.name = 'MOD_BLOCKTOPMENU_ITEMS'
					ORDER BY c.id_shop DESC
				";
				$result = $this->plugin->prestashop_query($sql);
				if ( count($result) > 0 ) {
					$menus = explode(',', $result[0]['value']);
				}
			}
			return $menus;
		}
		
		/**
		 * Add a menu
		 *
		 * @param array $menu Nav menu
		 * @return int Menu item ID
		 */
		private function add_menu($menu) {
			$menu_item_id = 0;
			
			// Get the menu
			$menu_obj = wp_get_nav_menu_object(self::MAIN_MENU_NAME);
			
			if ( $menu_obj ) {
				$menu_id = $menu_obj->term_id;
			} else {
				// Create the menu
				$menu_id = wp_create_nav_menu(self::MAIN_MENU_NAME);
				add_term_meta($menu_id, '_fgp2wc_old_menu_id', self::MAIN_MENU_NAME);
				do_action('fgp2wc_post_create_nav_menu', $menu_id, $menu);
			}
			
			if ( !is_null($menu_id) && !is_a($menu_id, 'WP_Error') ) {
				// Optimization: to increase the speed of menu items insertion and avoid an exhausted memory
				$this->last_menu_item_position = $this->get_last_menu_item_position($menu_id);
				
				// Get the menu item data
				$menu_item = $this->get_menu_item($menu);
				if ( is_null($menu_item) ) {
					$menu_item = apply_filters('fgp2wc_get_menu_item', $menu_item, $menu);
				}
				if ( !is_null($menu_item) ) {
					// Create the menu item
					$menu_item_id = $this->add_menu_item($menu_item, $menu_id, 0);
					if ( !is_wp_error($menu_item_id) ) {
						add_post_meta($menu_item_id, '_fgp2wc_old_menu_item_id', $menu, true);
					}
				}
				
				do_action('fgp2wc_post_add_menu', $menu_item, $menu);
				
				return $menu_item_id;
			}
		}
		
		/**
		 * Get the last menu item position
		 * 
		 * @since 3.6.4
		 * 
		 * @return int Position
		 */
		private function get_last_menu_item_position($menu_id) {
			$menu_items = (array) wp_get_nav_menu_items($menu_id, array('post_status' => 'publish,draft'));
			$last_item = array_pop($menu_items);
			return ( $last_item && isset( $last_item->menu_order ) ) ? 1 + $last_item->menu_order : count( $menu_items );
		}
		
		/**
		 * Get the menu item data (object_id, type, object, title)
		 * 
		 * @param array $menu Menu item name
		 * @return array Menu item || null
		 */
		private function get_menu_item($menu) {
			$menu_item = null;
			$matches = array();
			
			if ( preg_match('/([A-Z]+)(\d+)/i', $menu, $matches) ) {
				$type = $matches[1];
				$id = $matches[2];
				switch ( $type ) {
					
					// Product category
					case 'CAT':
						if ( array_key_exists($id, $this->plugin->imported_categories[$this->plugin->current_language]) ) {
							$menu_item = $this->get_term_menu_item($this->plugin->imported_categories[$this->plugin->current_language][$id]);
						}
						break;
					
					// CMS category
					case 'CMS_CAT':
						if ( array_key_exists($id, $this->plugin->imported_cms_categories[$this->plugin->current_language]) ) {
							$menu_item = $this->get_term_menu_item($this->plugin->imported_cms_categories[$this->plugin->current_language][$id]);
						}
						break;
					
					// Product
					case 'PRD':
						if ( array_key_exists($id, $this->imported_products) ) {
							$menu_item = $this->get_post_menu_item($this->imported_products[$id]);
						}
						break;
					
					// CMS
					case 'CMS':
						if ( array_key_exists($id, $this->imported_cms_articles) ) {
							$menu_item = $this->get_post_menu_item($this->imported_cms_articles[$id]);
						}
						break;
				}
			}
			return $menu_item;
		}
		
		/**
		 * Get the term menu item data (object_id, type, object, title)
		 * 
		 * @param array $term_id Term ID
		 * @return array Menu item || null
		 */
		private function get_term_menu_item($term_id) {
			$term = get_term($term_id);
			if ( !is_wp_error($term) ) {
				return array(
					'object_id'	=> $term_id,
					'type'		=> 'taxonomy',
					'object'	=> $term->taxonomy,
					'title'		=> $term->name,
				);
			} else {
				return null;
			}
		}
		
		/**
		 * Get the post menu item data (object_id, type, object, title)
		 * 
		 * @param array $post_id Post ID
		 * @return array Menu item || null
		 */
		private function get_post_menu_item($post_id) {
			$post = get_post($post_id);
			if ( !empty($post) ) {
				return array(
					'object_id'	=> $post_id,
					'type'		=> 'post_type',
					'object'	=> $post->post_type,
					'title'		=> $post->post_title,
				);
			} else {
				return null;
			}
		}
		
		/**
		 * Add a menu item
		 * 
		 * @param array $menu_item Menu item
		 * @param int $menu_id WordPress menu ID
		 * @param int $menu_parent_id Menu parent ID
		 * @return int Menu item ID
		 */
		private function add_menu_item($menu_item, $menu_id, $menu_parent_id) {
			$menu_data = array(
				'menu-item-object-id'	=> $menu_item['object_id'],
				'menu-item-type'		=> $menu_item['type'],
				'menu-item-url'			=> isset($menu_item['url'])? $menu_item['url'] : '',
				'menu-item-db-id'		=> 0,
				'menu-item-object'		=> $menu_item['object'],
				'menu-item-parent-id'	=> $menu_parent_id,
				'menu-item-position'	=> ++$this->last_menu_item_position, // Optimization: to increase the speed of menu items insertion and avoid an exhausted memory
				'menu-item-title'		=> $menu_item['title'],
				'menu-item-description'	=> '',
				'menu-item-status'		=> 'publish',
			);
			$menu_item_id = wp_update_nav_menu_item($menu_id, 0, $menu_data);
			if ( is_int($menu_item_id) ) {
				$this->menus_count++;
				// Create submenus
				if ( $menu_item['type'] == 'taxonomy' ) {
					$this->add_category_submenus($menu_item, $menu_item_id, $menu_id);
					
					do_action('fgp2wc_post_create_nav_menu_item', $menu_item_id, $menu_item);
				}
			}
			return $menu_item_id;
		}
		
		/**
		 * Add submenus for a category
		 * 
		 * @param array $menu_item Menu item
		 * @param int $menu_item_id Menu item ID
		 * @param int $menu_id Menu ID
		 */
		private function add_category_submenus($menu_item, $menu_item_id, $menu_id) {
			// Get the subcategories
			$subcategories = get_terms(array(
				'taxonomy'		=> $menu_item['object'],
				'hide_empty'	=> false,
				'parent'		=> $menu_item['object_id'],
			));
			foreach ( $subcategories as $subcategory ) {
				$submenu_item = array(
					'object_id'	=> $subcategory->term_id,
					'type'		=> 'taxonomy',
					'object'	=> $subcategory->taxonomy,
					'title'		=> $subcategory->name,
				);
				$this->add_menu_item($submenu_item, $menu_id, $menu_item_id);
			}
		}
		
	}
}
