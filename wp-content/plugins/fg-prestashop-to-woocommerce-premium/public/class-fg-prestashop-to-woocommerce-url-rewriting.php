<?php

/**
 * URL Rewriting module
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_PrestaShop_to_WooCommerce_Premium
 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/public
 */

if ( !class_exists('FG_PrestaShop_to_WooCommerce_URL_Rewriting', false) ) {

	/**
	 * URL Rewriting class
	 *
	 * @package    FG_PrestaShop_to_WooCommerce_Premium
	 * @subpackage FG_PrestaShop_to_WooCommerce_Premium/public
	 * @author     Frédéric GILLES
	 */
	class FG_PrestaShop_to_WooCommerce_URL_Rewriting {

		private static $rewrite_rules = array(
			array( 'rule' => '^.*/(\d+)-(.+?)\.html$',	'method' => 'id',	'view' => 'post', 'meta_key' => '_fgp2wc_old_product_id'), // Product ID
			array( 'rule' => '^.*/\d+[-_](.+?)$',		'method' => 'slug'), // Product or term slug
			array( 'rule' => '^/(?:\w{2}/)?(\d+)[-_]',	'method' => 'id',	'view' => 'term', 'meta_key' => '_fgp2wc_old_product_category_id'), // Category ID with optional language in prefix
			array( 'rule' => '[-_](\d+)\.html$',		'method' => 'id',	'view' => 'post', 'meta_key' => '_fgp2wc_old_product_id'), // Product ID
			array( 'rule' => '.*/(.+?)[-_]\d+$',		'method' => 'slug'), // Product or term slug
			array( 'rule' => '^.*/(.+?)(\.html)?$',		'method' => 'slug'), // Product or term slug
			array( 'rule' => '^.*/(\d+)-',				'method' => 'id',	'view' => 'post', 'meta_key' => '_fgp2wc_old_product_id'), // Product ID
		);
		
		/**
		 * Sets up the plugin
		 *
		 */
		public function __construct() {
			$premium_options = get_option('fgp2wcp_options');
			$do_redirect = isset($premium_options['url_redirect']) && !empty($premium_options['url_redirect']);
			$do_redirect = apply_filters('fgp2wcp_do_redirect', $do_redirect);
			if ( $do_redirect ) {
				// Hook on template redirect
				add_action('template_redirect', array($this, 'template_redirect'));
				// for PrestaShop non SEF URLs
				add_filter('query_vars', array($this, 'add_query_vars'));
				add_action('fgp2wcp_pre_404_redirect', array($this, 'pre_404_redirect'));
			}
		}
		
		/**
		 * Add the query vars
		 *
		 * @param array $vars Query vars
		 * @return array $vars Query vars
		 */
		public function add_query_vars($vars) {
			
			// Parameters used in PrestaShop configured without friendly URLs
			$vars[] = 'id_product'; // Product ID
			$vars[] = 'id_category'; // Product category ID
			$vars[] = 'id_cms'; // CMS article ID
			$vars[] = 'id_cms_category'; // CMS category ID
			return $vars;
		}
		
		/**
		 * Redirection to the new URL
		 */
		public function template_redirect() {
			$matches = array();
			do_action('fgp2wcp_pre_404_redirect');
			
			if ( !is_404() ) { // A page is found, don't redirect
				return;
			}
			
			do_action('fgp2wcp_post_404_redirect');

			// Process the rewrite rules
			$rewrite_rules = apply_filters('fgp2wcp_rewrite_rules', self::$rewrite_rules);
			// PrestaShop configured with SEF URLs
			$base_url = get_home_url();
			$base_url = preg_replace('#.*' . preg_quote($_SERVER['HTTP_HOST']) . '#', '', $base_url);
			$uri = $_SERVER['REQUEST_URI'];
			if ( !empty($base_url) ) {
				$uri = preg_replace('#.*' . preg_quote(untrailingslashit($base_url)) . '#', '', $uri);
			}
			$default_language = get_option('fgp2wc_default_language', 1);
			
			foreach ( $rewrite_rules as $rewrite_rule ) {
				if ( preg_match('#' . $rewrite_rule['rule'] . '#', $uri, $matches) ) {
					do_action('fgp2wcp_process_rewrite_rule', $rewrite_rule, $uri, $matches, $default_language);
					switch ( $rewrite_rule['method'] ) {
						case 'id':
							$old_id = $matches[1];
							if ( $rewrite_rule['view'] == 'term' ) {
								$rewrite_rule['meta_key'] .= '-lang' . $default_language; // Add the default language to the meta key
							}
							self::redirect($rewrite_rule['meta_key'], $old_id, $rewrite_rule['view']);
							break;
						
						case 'slug':
							$slug = $matches[1];
							self::redirect_slug($slug);
							break;
					}
				}
			}
		}
		
		/**
		 * Try to redirect the PrestaShop non SEF URLs
		 */
		public function pre_404_redirect() {
			// Product URLs: id_product=xxx
			$id_product = get_query_var('id_product');
			if ( !empty($id_product) ) {
				self::redirect('_fgp2wc_old_product_id', $id_product, 'post');
				
			} else {
				$default_language = get_option('fgp2wc_default_language', 1);
				
				// Product category URLs: id_category=xxx
				$id_category = get_query_var('id_category');
				if ( !empty($id_category) ) {
					self::redirect('_fgp2wc_old_product_category_id-lang' . $default_language, $id_category, 'term');

				} else {
					// CMS article URLs: id_cms=xxx
					$id_cms = get_query_var('id_cms');
					if ( !empty($id_cms) ) {
						self::redirect('_fgp2wc_old_cms_article_id', $id_cms, 'post');
						
					} else {
						// CMS category URLs: id_cms_category=xxx
						$id_cms_category = get_query_var('id_cms_category');
						if ( !empty($id_cms_category) ) {
							self::redirect('_fgp2wc_old_cms_category_id-lang' . $default_language, $id_cms_category, 'term');
						}
					}
				}
			}
		}
		
		/**
		 * Query and redirect to the new URL
		 *
		 * @param string $meta_key Meta Key to search in the postmeta or termmeta table
		 * @param int $old_id PrestaShop ID
		 * @param string $view post|term
		 */
		public static function redirect($meta_key, $old_id, $view='post') {
			if ( !empty($old_id) ) {
				switch ( $view ) {
					case 'post':
						// Get the post by its old ID
						$known_post_types = array_keys(get_post_types(array('public' => 1)));
						query_posts(array(
							'post_type' => $known_post_types,
							'meta_key' => $meta_key,
							'meta_value' => $old_id,
							'ignore_sticky_posts' => 1,
						));
						if ( have_posts() ) {
							self::redirect_to_post();
						}
						break;
					
					case 'term':
						// Search a term by its id
						$args = array(
							'hide_empty' => false, // also retrieve terms which are not used yet
							'meta_query' => array(
								array(
								   'key'       => $meta_key,
								   'value'     => $old_id,
								   'compare'   => '='
								)
							)
						);
						$terms = get_terms($args);
						if ( count($terms) > 0 ) {
							self::redirect_to_category($terms[0]);
						}
						break;
				}
				// else continue the normal workflow
			}
		}
		
		/**
		 * Search a post by its slug and redirect to it if found
		 *
		 * @param string $slug Slug to search
		 */
		public static function redirect_slug($slug) {
			if ( !empty($slug) ) {
				// Try to find a post by its slug
				query_posts(array(
					'post_type' => array('post', 'page', 'product'),
					'name' => $slug,
					'ignore_sticky_posts' => 1,
				));
				if ( have_posts() ) {
					self::redirect_to_post();
					
				} else {
					// Try to find a term by its slug
					$taxonomies = array('product_cat', 'product_brand', 'brand', 'pwb-brand');
					foreach ( $taxonomies as $taxonomy ) {
						$cat = get_term_by('slug', $slug, $taxonomy);
						if ( $cat !== false ) {
							self::redirect_to_category($cat);
						}
					}
				}
				// else continue the normal workflow
				wp_reset_query();
			}
		}
		
		/**
		 * Redirect to the new product URL if a post is found
		 */
		protected static function redirect_to_post() {
			the_post();
			$url = get_permalink();
//			die($url);
			wp_redirect($url, 301);
			wp_reset_query();
			exit;
		}
		
		/**
		 * Redirect to the new category URL if a category is found
		 */
		protected static function redirect_to_category($term) {
			$url = get_term_link($term);
			if ( !is_wp_error($url) ) {
//				die($url);
				wp_redirect($url, 301);
				wp_reset_query();
				exit;
			}
		}
		
	}
}
