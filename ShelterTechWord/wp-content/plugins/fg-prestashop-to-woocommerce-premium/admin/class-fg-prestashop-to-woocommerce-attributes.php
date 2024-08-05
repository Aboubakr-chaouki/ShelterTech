<?php
/**
 * Attributes class
 *
 * @link       https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
 * @since      2.0.0
 *
 * @package    FG_Prestashop_to_WooCommerce_Premium
 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
 */

if ( !class_exists('FG_Prestashop_to_WooCommerce_Attributes', false) ) {

	/**
	 * Product attributes class
	 *
	 * @package    FG_Prestashop_to_WooCommerce_Premium
	 * @subpackage FG_Prestashop_to_WooCommerce_Premium/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Prestashop_to_WooCommerce_Attributes {

		private $plugin;
		private $attribute_values = array();
		private static $feature_values = array();
		
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
		 * Update the PrestaShop features
		 *
		 * @since 3.71.0
		 */
		public function update_features() {
			if ( !$this->plugin->premium_options['update_stock_only'] ) {
				$this->import_features();
			}
		}
		
		/**
		 * Import the PrestaShop features
		 *
		 */
		public function import_features() {
			self::$feature_values = array();

			if ( isset($this->plugin->premium_options['skip_products']) && $this->plugin->premium_options['skip_products'] ) {
				return;
			}

			if ( isset($this->plugin->premium_options['skip_attributes']) && $this->plugin->premium_options['skip_attributes'] ) {
				return;
			}

			if ( $this->plugin->import_stopped() ) {
				return;
			}
			
			$this->plugin->log(__('Importing features...', $this->plugin->get_plugin_name()));
			$imported_features_count = 0;
			
			$features = $this->get_features();
			foreach ( $features as $feature ) {

				if ( $this->plugin->import_stopped() ) {
					break;
				}
				
				if ( $this->is_custom_attribute($feature) ) {
					continue; // Don't import the custom attributes as predefined attributes
				}

				// Create the attribute
				$taxonomy = $this->create_woocommerce_attribute($feature['name'], $feature['name'], 'select');

				// Create the feature values
				$feature_values = $this->get_feature_values($feature['id_feature']);
				$terms = array();
				foreach ( $feature_values as $feature_value ) {
					$meta_value = sanitize_title($taxonomy . '-' . $feature_value['value']);
					$meta_value = substr($meta_value, 0, 200);
					$attribute_values_term_id = $this->create_woocommerce_attribute_value($taxonomy, $feature_value['value'], '_fgp2wc_feature', $meta_value, 0);
					if ( $attribute_values_term_id != 0 ) {
						$terms[] = $attribute_values_term_id;
						do_action('fgp2wc_post_create_woocommerce_feature_value', $attribute_values_term_id, $taxonomy, intval($feature_value['id_feature_value']));
					}
				}

				$imported_features_count++;
				
				// Update cache
				if ( !empty($terms) ) {
					clean_term_cache($terms, $taxonomy);
				}
			}

			// Empty attribute taxonomies cache
			delete_transient('wc_attribute_taxonomies');
			wp_cache_flush();
			
			self::$feature_values = $this->get_imported_attribute_values('_fgp2wc_feature');
			
			$this->plugin->display_admin_notice(sprintf(_n('%d feature imported', '%d features imported', $imported_features_count, $this->plugin->get_plugin_name()), $imported_features_count));
		}

		/**
		 * Check if the attribute needs to be a custom attribute
		 * 
		 * @since 4.36.1
		 * 
		 * @param array $feature Feature
		 * @return bool Is it a custom attribute?
		 */
		private function is_custom_attribute($feature) {
			$nb = $this->get_feature_values_count($feature['id_feature']);
			if ( $nb > 1000 ) { // If too many values, we consider it is a custom attribute
				return true;
			}
			$max_length = $this->get_feature_values_max_length($feature['id_feature']);
			if ( $max_length > 200 ) { // If the feature value max length is too high, we consider it is a custom attribute
				return true;
			}
			
			return false;
		}
		
		/**
		 * Count the number of PrestaShop feature values
		 *
		 * @since 4.36.1
		 * 
		 * @param int $feature_id Feature ID
		 * @return int Number of features values
		 */
		private function get_feature_values_count($feature_id) {
			$count = 0;
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb
				FROM {$prefix}feature_value fv
				WHERE fv.id_feature = '$feature_id'
			";
			$result = $this->plugin->prestashop_query($sql);
			$count = (count($result) > 0)? $result[0]['nb'] : 0;
			
			return $count;
		}
		
		/**
		 * Get the max length of PrestaShop feature values
		 *
		 * @since 4.36.1
		 * 
		 * @param int $feature_id Feature ID
		 * @return int Max length
		 */
		private function get_feature_values_max_length($feature_id) {
			$max_length = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			$sql = "
				SELECT MAX(LENGTH(fvl.value)) AS max_length
				FROM {$prefix}feature_value_lang fvl
				INNER JOIN {$prefix}feature_value fv ON fv.id_feature_value = fvl.id_feature_value
				WHERE fv.id_feature = '$feature_id'
				AND fvl.id_lang = '$lang'
			";
			$result = $this->plugin->prestashop_query($sql);
			$max_length = (count($result) > 0)? $result[0]['max_length'] : 0;
			
			return $max_length;
		}
		
		/**
		 * Update the PrestaShop attributes
		 *
		 * @since 3.71.0
		 */
		public function update_attributes() {
			if ( !$this->plugin->premium_options['update_stock_only'] ) {
				$this->import_attributes();
			}
		}
		
		/**
		 * Import the PrestaShop attributes
		 *
		 */
		public function import_attributes() {
			$this->attribute_values = array();

			if ( isset($this->plugin->premium_options['skip_products']) && $this->plugin->premium_options['skip_products'] ) {
				return;
			}

			if ( isset($this->plugin->premium_options['skip_attributes']) && $this->plugin->premium_options['skip_attributes'] ) {
				return;
			}

			if ( $this->plugin->import_stopped() ) {
				return;
			}
			
			$this->plugin->log(__('Importing attributes...', $this->plugin->get_plugin_name()));
			$imported_attributes_count = 0;
			
			$attribute_groups = $this->get_attribute_groups();
			foreach ( $attribute_groups as $attribute_group ) {

				if ( $this->plugin->import_stopped() ) {
					break;
				}
				
				// Create the attribute
				$attribute_type = apply_filters('fgp2wc_attribute_type', 'select', $attribute_group);
				$taxonomy = $this->create_woocommerce_attribute($attribute_group['public_name'], $attribute_group['name'], $attribute_type);

				// Create the attributes values
				$attributes = $this->get_attributes($attribute_group['id_attribute_group']);
				$terms = array();
				foreach ( $attributes as $attribute ) {
					// Attribute texture
					$media_id = false;
					if ( !$this->plugin->plugin_options['skip_media'] && $this->plugin->premium_options['import_textures']) {
						$image_name = $attribute_group['name'] . ' ' . $attribute['name'];
						$image_filenames = $this->plugin->build_image_filenames('attribute_texture', $attribute['id_attribute']); // Get the potential filenames
						$media_id = $this->plugin->guess_import_media($image_name, $image_filenames);
					}
					
					$meta_value = intval($attribute['id_attribute']);
					$attribute_values_term_id = $this->create_woocommerce_attribute_value($taxonomy, $attribute['name'], '_fgp2wc_attribute', $meta_value, $attribute['position']);
					if ( $attribute_values_term_id != 0 ) {
						$terms[] = $attribute_values_term_id;
						do_action('fgp2wc_post_create_woocommerce_attribute_value', $attribute_values_term_id, $taxonomy, intval($attribute['id_attribute']), $attribute, $media_id);

						if ( $media_id !== false ) {
							add_term_meta($attribute_values_term_id, 'attribute_texture', $media_id, true);
						}
					}
				}
				$imported_attributes_count++;

				// Update cache
				if ( !empty($terms) ) {
					clean_term_cache($terms, $taxonomy);
				}
			}
			
			if ( !$this->plugin->import_stopped() ) {
				
				// Create the "location" attribute
				$location_values = $this->get_distinct_product_column_values('location');
				if ( !empty($location_values) ) {
					$terms = array();
					$taxonomy = $this->create_woocommerce_attribute('Location', 'location', 'text');
					foreach ( $location_values as $value ) {
						$attribute_values_term_id = $this->create_woocommerce_attribute_value($taxonomy, $value, '_fgp2wc_attribute', 'location-' . $value, 0);
						$terms[] = $attribute_values_term_id;
					}
					// Update cache
					if ( !empty($terms) ) {
						clean_term_cache($terms, $taxonomy);
					}
				}
				
				// Create the "condition" attribute
				$conditions_values = $this->get_distinct_product_column_values('condition');
				if ( count($conditions_values) > 1 ) { // Don't import the condition if there is only one distinct value
					$terms = array();
					$taxonomy = $this->create_woocommerce_attribute('Condition', 'condition', 'text');
					foreach ( $conditions_values as $value ) {
						$attribute_values_term_id = $this->create_woocommerce_attribute_value($taxonomy, $value, '_fgp2wc_attribute', 'condition-' . $value, 0);
						$terms[] = $attribute_values_term_id;
					}
					// Update cache
					if ( !empty($terms) ) {
						clean_term_cache($terms, $taxonomy);
					}
				}
			}

			// Empty attribute taxonomies cache
			delete_transient('wc_attribute_taxonomies');
			wp_cache_flush();
			
			$this->attribute_values = $this->get_imported_attribute_values('_fgp2wc_attribute');
			
			$this->plugin->display_admin_notice(sprintf(_n('%d attribute imported', '%d attributes imported', $imported_attributes_count, $this->plugin->get_plugin_name()), $imported_attributes_count));
		}

		/**
		 * Create a product attribute
		 *
		 * @param string $attribute_label Attribute label
		 * @param string $attribute_name Attribute name
		 * @param string $attribute_type select | text
		 * @return string Taxonomy
		 */
		private function create_woocommerce_attribute($attribute_label, $attribute_name, $attribute_type) {
			global $wpdb;
			global $wc_product_attributes;

			$attribute_name = $this->normalize_attribute_name($attribute_name);
			$taxonomy = 'pa_' . $attribute_name;

			if ( !array_key_exists($taxonomy, $wc_product_attributes) ) {
				// Create the taxonomy
				$attribute_taxonomy = array(
					'attribute_name'	=> $attribute_name,
					'attribute_label'	=> $attribute_label,
					'attribute_type'	=> $attribute_type,
					'attribute_orderby'	=> 'menu_order',
				);
				$wpdb->insert($wpdb->prefix . 'woocommerce_attribute_taxonomies', $attribute_taxonomy);

				// Register the taxonomy
				register_taxonomy($taxonomy,
					apply_filters('woocommerce_taxonomy_objects_' . $taxonomy, array('product')),
					apply_filters('woocommerce_taxonomy_args_' . $taxonomy, array(
						'hierarchical' => true,
						'show_ui' => false,
						'query_var' => true,
						'rewrite' => array(),
					))
				);
				$wc_product_attributes[$taxonomy] = (object)$attribute_taxonomy; // useful for wc_set_term_order()
			}
			return $taxonomy;
		}

		/**
		 * Normalize the attribute name
		 * 
		 * @param string $attribute_label Attribute label
		 * @return string Normalized attribute name
		 */
		public function normalize_attribute_name($attribute_label) {
			$attribute_label = trim($attribute_label);
			$attribute_label = str_replace(',', '_', $attribute_label); // To avoid duplicates between 1,2 and 12 for example
			$attribute_label = str_replace('-', '_', $attribute_label); // To get both the negative and positive values if they have the same absolute value
			$attribute_name = sanitize_key(FG_PrestaShop_to_WooCommerce_Tools::convert_to_latin($attribute_label));

			// Add a CRC prefix if the attribute name has more than 28 characters
			// to avoid the duplicates due to the truncation of long labels
			$max_attribute_length = 28;
			if ( strlen($attribute_name) > $max_attribute_length ) {
				$crc = hash("crc32b", $attribute_label);
				$short_crc = substr($crc, 0, 2); // Keep only the 2 first characters (should be enough)
				$attribute_name = $short_crc . '-' . $attribute_name;
			}
			$attribute_name = str_replace('pa_', 'paa_', $attribute_name); // Workaround to WooCommerce bug that doesn't process well the attributes containing "pa_". Issue opened on WooCommerce: https://github.com/woocommerce/woocommerce/issues/22101
			$attribute_name = substr($attribute_name, 0, $max_attribute_length); // The taxonomy is limited to 32 characters in WordPress
			return $attribute_name;
		}
		
		/**
		 * Create an attribute value
		 *
		 * @param string $taxonomy Taxonomy
		 * @param string $attribute_value Attribute value
		 * @param string $meta_key Meta key to store in the termmeta table
		 * @param string $meta_value Meta value to store in the termmeta table
		 * @param int $attribute_value_ordering Attribute value ordering
		 * @return int Term ID created
		 */
		public function create_woocommerce_attribute_value($taxonomy, $attribute_value, $meta_key, $meta_value, $attribute_value_ordering = 0) {
			$term_id = 0;
			
			$attribute_value = trim($attribute_value);
			if ( !empty($attribute_value) ) {
				// Create one term by custom value
				$attribute_value = substr($attribute_value, 0, 197); // term name is limited to 200 characters (minus 3 for the language code)
				$attribute_value_slug = $this->normalize_attribute_name($attribute_value);
				$attribute_value_slug = apply_filters('fgp2wc_attribute_value_slug', $attribute_value_slug, $taxonomy);
				$term = get_term_by('slug', $attribute_value_slug, $taxonomy);
				if ( $term !== false ) {
					$term_id = $term->term_id;
					$old_values = get_term_meta($term_id, $taxonomy);
					if ( !in_array($meta_value, $old_values) ) {
						add_term_meta($term_id, $meta_key, $meta_value, false);
					}
				} else {
					$newterm = wp_insert_term($attribute_value, $taxonomy, array('slug' => $attribute_value_slug));
					if ( !is_wp_error($newterm) ) {
						$term_id = $newterm['term_id'];
						add_term_meta($term_id, $meta_key, $meta_value, true);

						// Category ordering
						if ( function_exists('wc_set_term_order') ) {
							wc_set_term_order($term_id, $attribute_value_ordering, $taxonomy);
						}
					}
				}
			}
			return $term_id;
		}
		
		/**
		 * Get the imported attribute values
		 * 
		 * @since 3.11.0
		 * 
		 * @param string $meta_key Meta key
		 * @param bool $with_taxonomy Set a taxonomy dimension
		 * @return array Attribute values map table
		 */
		private function get_imported_attribute_values($meta_key, $with_taxonomy=false) {
			global $wpdb;
			$metas = array();
			
			$sql = $wpdb->prepare("
				SELECT tt.term_taxonomy_id, tm.meta_value, tt.taxonomy, t.slug
				FROM {$wpdb->termmeta} tm
				INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_id = tm.term_id
				INNER JOIN {$wpdb->terms} t ON t.term_id = tm.term_id
				WHERE tm.meta_key = %s
			", $meta_key);
			$results = $wpdb->get_results($sql);
			foreach ( $results as $result ) {
				$value = array(
					'term_id' => $result->term_taxonomy_id,
					'slug' => $result->slug,
				);
				if ( $with_taxonomy ) {
					$metas[$result->taxonomy][$result->meta_value] = $value;
				} else {
					$metas[$result->meta_value] = $value;
				}
			}
			ksort($metas);
			return $metas;
		}
		
		/**
		 * Get the different values for a column
		 * 
		 * @since 4.20.0
		 * 
		 * @param string $column Table column
		 * @return array Distinct values found
		 */
		private function get_distinct_product_column_values($column) {
			$values = array();
			
			if ( $this->plugin->column_exists('product', $column) ) {
				$prefix = $this->plugin->plugin_options['prefix'];
				$sql = "
					SELECT DISTINCT p.`$column`
					FROM {$prefix}product p
					WHERE p.`$column` IS NOT NULL
					AND p.`$column` != ''
				";
				$results = $this->plugin->prestashop_query($sql);
				foreach ( $results as $row ) {
					$values[] = $row[$column];
				}
			}
			return $values;
		}
		
		/**
		 * Import the PrestaShop product features
		 *
		 * @param int $new_product_id WordPress ID
		 * @param array $product PrestaShop product
		 */
		public function import_product_features($new_product_id, $product) {
			
			if ( isset($this->plugin->premium_options['skip_attributes']) && $this->plugin->premium_options['skip_attributes'] ) {
				return;
			}
			
			$product_features = $this->get_product_features($product['id_product']);
			foreach ( $product_features as $product_feature ) {
				$must_create_predefined_attribute = false;
				$must_create_custom_attribute = false;
				$custom_attribute_value = '';
				$attribute_name = $this->normalize_attribute_name($product_feature['name']);
				$taxonomy = 'pa_' . $attribute_name;
				$is_visible = 1;
				$is_variation = 0;
				
				$lang = apply_filters('fgp2wc_get_feature_value_language', $this->plugin->current_language, $taxonomy);
				$product_feature_values = $this->get_product_feature_values($product['id_product'], $product_feature['id_feature'], $lang);
				foreach ( $product_feature_values as $product_feature_value ) {
					$feature_value_key = sanitize_title($taxonomy . '-' . $product_feature_value['value']);
					$feature_value_key = apply_filters('fgp2wc_attribute_value_slug', $feature_value_key, $taxonomy);
					if ( isset(self::$feature_values[$feature_value_key]) ) {
						$this->set_object_terms($new_product_id, self::$feature_values[$feature_value_key]['term_id'], 0);
						$must_create_predefined_attribute = true;
					} else {
						$custom_attribute_value = $product_feature_value['value'];
						$must_create_custom_attribute = true;
					}
				}
				
				// Create the product attribute only if a value was found
				if ( $must_create_predefined_attribute || $must_create_custom_attribute ) {
					$args = array(
						'position'		=> strval($product_feature['position']),
						'is_visible'	=> $is_visible,
						'is_variation'	=> $is_variation,
					);

					if ( !$must_create_predefined_attribute ) {
						// Create a custom attribute
						$args = array_merge($args, array(
							'value'			=> $custom_attribute_value,
							'is_taxonomy'	=> '0',
						));
						$taxonomy = $product_feature['name'];
					}
					$args = apply_filters('fgp2wc_args_pre_create_woocommerce_product_attribute', $args, $product_feature, $taxonomy);
					if ( !empty($args) ) {
						$this->create_woocommerce_product_attribute($new_product_id, $taxonomy, $args);
					}
				}
			}
		}

		/**
		 * Import the PrestaShop products attributes
		 *
		 * @param int $new_product_id WordPress ID
		 * @param array $product PrestaShop product
		 */
		public function import_product_attributes($new_product_id, $product) {
			
			if ( isset($this->plugin->premium_options['skip_attributes']) && $this->plugin->premium_options['skip_attributes'] ) {
				return;
			}

			// Assign the attribute group to the product
			$product_attribute_groups = $this->get_attribute_groups_from_product($product['id_product']);
			foreach ( $product_attribute_groups as $product_attribute_group ) {
				$attribute_name = $this->normalize_attribute_name($product_attribute_group['name']);
				$taxonomy = 'pa_' . $attribute_name;
				$args = array(
					'position'		=> strval($product_attribute_group['position']),
					'is_visible'	=> 1,
					'is_variation'	=> 1,
				);
				$this->create_woocommerce_product_attribute($new_product_id, $taxonomy, $args);
			}

			// Set the relationship between the product and the attribute values
			$product_attributes = $this->get_attributes_from_product($product['id_product']);
			$i = 0;
			foreach ( $product_attributes as $attribute_value ) {
				$attribute_value = $this->check_and_get_imported_attribute_value($attribute_value);
				if ( !empty($attribute_value) && isset($this->attribute_values[$attribute_value]) ) {
					$this->set_object_terms($new_product_id, $this->attribute_values[$attribute_value]['term_id'], $i++);
				}
			}
			
			// Import the location as a product attribute
			if ( !empty($product['location']) ) {
				$taxonomy = 'pa_location';
				$args = array(
					'position'		=> 0,
					'is_visible'	=> 0,
					'is_variation'	=> 0,
				);
				$this->create_woocommerce_product_attribute($new_product_id, $taxonomy, $args);
				$attribute_value = 'location-' . $product['location'];
				if ( isset($this->attribute_values[$attribute_value]) ) {
					$this->set_object_terms($new_product_id, $this->attribute_values[$attribute_value]['term_id'], $i++);
				}
			}
			
			// Import the condition as a product attribute
			if ( !empty($product['condition']) ) {
				$taxonomy = 'pa_condition';
				$args = array(
					'position'		=> 0,
					'is_visible'	=> !empty($product['show_condition']),
					'is_variation'	=> 0,
				);
				$this->create_woocommerce_product_attribute($new_product_id, $taxonomy, $args);
				$attribute_value = 'condition-' . $product['condition'];
				if ( isset($this->attribute_values[$attribute_value]) ) {
					$this->set_object_terms($new_product_id, $this->attribute_values[$attribute_value]['term_id'], $i++);
				}
			}
		}
		
		/**
		 * Check if the attribute value is imported
		 * 
		 * @since 3.11.0
		 * 
		 * @param string $attribute_value Attribute value
		 * @return string Attribute value
		 */
		private function check_and_get_imported_attribute_value($attribute_value) {
			$attribute_value_original = $attribute_value;
			$attribute_value = apply_filters('fgp2wc_attribute_value_slug', $attribute_value); // Append the language code
			if ( isset($this->attribute_values[$attribute_value]) ) {
				return $attribute_value;
			} elseif ( isset($this->attribute_values[$attribute_value_original]) ) {
				return $attribute_value_original;
			} else {
				return '';
			}
		}
		
		/**
		 * Create a product attribute
		 *
		 * @param string $product_id Product ID
		 * @param string $taxonomy Taxonomy
		 * @param array $args Product attribute arguments
		 */
		protected function create_woocommerce_product_attribute($product_id, $taxonomy, $args) {
			// Assign the attribute to the product
			$product_attributes = get_post_meta($product_id, '_product_attributes', true);
			if ( empty($product_attributes) ) {
				$product_attributes = array();
			}
			if ( !array_key_exists($taxonomy, $product_attributes) ) {
				$default_args = array(
					'name'			=> $taxonomy,
					'value'			=> '',
					'position'		=> '0',
					'is_visible'	=> '0',
					'is_variation'	=> '0',
					'is_taxonomy'	=> '1',
				);
				$args = array_merge($default_args, $args);
				$product_attribute = array($taxonomy => $args);
				$product_attributes = array_merge($product_attributes, $product_attribute);
				update_post_meta($product_id, '_product_attributes', $product_attributes);
			}
		}
		
		/**
		 * Same function as wp_set_object_terms but with the term_order parameter
		 *
		 * @param int $object_id Object ID
		 * @param int $term_taxonomy_id Term taxonomy ID
		 * @param int $term_order Term order
		 */
		public function set_object_terms($object_id, $term_taxonomy_id, $term_order) {
			global $wpdb;

			$wpdb->hide_errors(); // to prevent the display of an error if the term relashionship already exists
			$wpdb->insert($wpdb->prefix . 'term_relationships', array(
				'object_id'			=> $object_id,
				'term_taxonomy_id'	=> $term_taxonomy_id,
				'term_order'		=> $term_order,
			));
			$wpdb->show_errors();
		}

		/**
		 * Import the PrestaShop product variations
		 *
		 * @param int $new_product_id WordPress ID
		 * @param array $product PrestaShop product
		 */
		public function import_product_variations($new_product_id, $product) {
			
			if ( isset($this->plugin->premium_options['skip_attributes']) && $this->plugin->premium_options['skip_attributes'] ) {
				return;
			}

			// Prices
			$min_variation_price = null;
			$max_variation_price = null;
			$product_reduction_from = isset($product['reduction_from'])? strtotime($product['reduction_from']): '';
			$product_reduction_to = isset($product['reduction_to'])? strtotime($product['reduction_to']): '';
			
			$product_attributes = $this->get_product_attributes($product['id_product']);

			// Create the variations (posts)
			$i = 0;
			$default_attributes = array();
			foreach ( $product_attributes as $product_attribute ) {
				$i++;
				$product_reference = !empty($product_attribute['reference'])? $product_attribute['reference'] : $product['name'];
				$new_post = array(
					'post_title'	=> "Variation # of $product_reference",
					'post_name'		=> "product-$new_product_id-variation" . (($i == 1)? '': "-$i"),
					'post_parent'	=> $new_product_id,
					'menu_order'	=> 0,
					'post_type'		=> 'product_variation',
					'post_status'	=> 'publish',
				);
				$new_post_id = wp_insert_post($new_post);

				if ( $new_post_id ) {
					$attributes = $this->get_attributes_from_product_attribute($product_attribute['id_product_attribute']);
					$attributes_values = ''; // Used for the variation SKU
					foreach ( $attributes as $attribute_group => $attribute_id ) {
						$attribute_name = $this->normalize_attribute_name($attribute_group);
						$taxonomy = 'pa_' . $attribute_name;
						$attribute_id = $this->check_and_get_imported_attribute_value($attribute_id);
						if ( !empty($attribute_id) ) {
							$attribute_value = $this->attribute_values[$attribute_id]['slug'];
							$attributes_values .= $attribute_value;
							add_post_meta($new_post_id, 'attribute_' . $taxonomy, strtolower($attribute_value), true);

							// Set the default attributes
							if ( $product_attribute['default_on'] ) {
								$default_attributes[$taxonomy] = $attribute_value;
							}

							// Attribute texture
							if ( $this->plugin->premium_options['texture_as_featured_image'] ) {
								$media_id = get_term_meta($this->attribute_values[$attribute_id]['term_id'], 'attribute_texture', true);
								if ( $media_id ) {
									add_post_meta($new_post_id, '_thumbnail_id', $media_id, true);
								}
							}
						}
					}

					// Prices
					$reduction_price = isset($product['reduction_price']) && !empty($product['reduction_price']) && ($product['reduction_price'] != '0.00')? $product['reduction_price'] + $product_attribute['price']: '0.00';
					$prices = $this->plugin->calculate_prices(array_merge($product, array(
						'id_product_attribute' => $product_attribute['id_product_attribute'],
						'price' => $product['price'] + $product_attribute['price'],
						'reduction_price' => $reduction_price,
						'reduction_percent' => isset($product['reduction_percent'])? $product['reduction_percent']: '',
					)));
					// Minimum variation price
					if ( !isset($min_variation_price) || ($prices['price'] < $min_variation_price) ) {
						$min_variation_price = $prices['price'];
					}
					// Maximum variation price
					if ( !isset($max_variation_price) || ($prices['price'] > $max_variation_price) ) {
						$max_variation_price = $prices['price'];
					}
					
					// Reduction dates
					$reduction_from = $product_reduction_from;
					$reduction_to = $product_reduction_to;
					if ( isset($product['specific_prices']) ) {
						foreach ( $product['specific_prices'] as $specific_price ) {
							if ( $specific_price['id_product_attribute'] == $product_attribute['id_product_attribute'] ) {
								// Specific reduction dates for this attribute
								$reduction_from = $specific_price['from'];
								$reduction_to = $specific_price['to'];
								break;
							}
						}
					}
					if ( $reduction_from == '0000-00-00 00:00:00' ) {
						$reduction_from = '';
					}
					if ( $reduction_to == '0000-00-00 00:00:00' ) {
						$reduction_to = '';
					}
					
					// SKU = Stock Keeping Unit
					$sku = $this->plugin->get_sku($product_attribute);
					if ( empty($sku) ) {
						$sku = $this->get_product_attribute_supplier_reference($product_attribute['id_product_attribute']);
					}
					if ( empty($sku) ) {
						$sku = $product['reference'] . '-' . $attributes_values; // Product SKU + attributes values
					}

					// Product attribute images
					if ( !$this->plugin->plugin_options['skip_media'] ) {
						$images = $this->get_product_attribute_images($product_attribute['id_product_attribute']);
						if ( count($images) > 0 ) {
							// Insert the first image as the variation image
							$image = array_shift($images);
							$image_name = !empty($image['legend'])? $image['legend'] : $product['name'] . '-' . $image['id_image'];
							$image_filenames = $this->plugin->build_image_filenames('product', $image['id_image'], $image['id_product']); // Get the potential filenames
							$media_id = $this->plugin->guess_import_media($image_name, $image_filenames, $product['date'], $image['id_image']);
							add_post_meta($new_post_id, '_thumbnail_id', $media_id, true);
							
							do_action('fgp2wc_attribute_images', $new_post_id, $images, $product, $new_product_id); // Used by the Variations Gallery module
						}
					}

					// Stock
					$manage_stock = $this->plugin->plugin_options['stock_management']? 'yes': 'no';
					$quantity = version_compare($this->plugin->prestashop_version, '1.5', '<')? $product_attribute['quantity'] : $this->get_product_attribute_quantity($product_attribute['id_product_attribute']);
					$stock_status = (!$this->plugin->plugin_options['stock_management'] || ($quantity > 0))? 'instock': 'outofstock';

					// Backorders
					$backorders = get_post_meta($new_product_id, '_backorders', true);
					if ( ($backorders == 'yes') && ($stock_status == 'outofstock') ) {
						$stock_status = 'onbackorder';
					}
					
					add_post_meta($new_post_id, '_regular_price', $prices['regular_price'], true);
					add_post_meta($new_post_id, '_price', $prices['price'], true);
					add_post_meta($new_post_id, '_sale_price', $prices['special_price'], true);
					add_post_meta($new_post_id, '_sale_price_dates_from', $reduction_from, true);
					add_post_meta($new_post_id, '_sale_price_dates_to', $reduction_to, true);
					add_post_meta($new_post_id, '_sku', $sku, true);
					add_post_meta($new_post_id, '_manage_stock', $manage_stock, true);
					add_post_meta($new_post_id, '_stock_status', $stock_status, true);
					if ( $this->plugin->plugin_options['stock_management'] ) {
						add_post_meta($new_post_id, '_stock', $quantity, true);
					}
					add_post_meta($new_post_id, '_backorders', $backorders, true);
					
					// Weight
					if ( !empty($product_attribute['weight']) ) {
						$weight = $product['weight'] + $product_attribute['weight'];
						add_post_meta($new_post_id, '_weight', floatval($weight), true);
					}
					
					// Add the reference value
					if ( ($this->plugin->plugin_options['sku'] != 'reference') && !empty($product_attribute['reference']) ) {
						add_post_meta($new_post_id, 'reference', $product_attribute['reference'], true);
					}

					// Add the EAN-13 value
					if ( !empty($product_attribute['ean13']) ) {
						if ( ($this->plugin->plugin_options['sku'] != 'ean13') ) {
							add_post_meta($new_post_id, 'ean13', $product_attribute['ean13'], true);
						}
						// Barcode
						add_post_meta($new_post_id, 'barcode', $product_attribute['ean13'], true);
						// Product GTIN (EAN, UPC, ISBN) for WooCommerce
						add_post_meta($new_post_id, '_wpm_gtin_code', $product_attribute['ean13'], true);
						// EAN for WooCommerce
						add_post_meta($new_post_id, '_alg_ean', $product_attribute['ean13'], true);
						// WP-Lister Lite for Amazon
						add_post_meta($new_post_id, '_amazon_product_id', $product_attribute['ean13'], true);
					}

					// Add the Product attribute ID as a reference. It will be used for the order items.
					add_post_meta($new_post_id, '_fgp2wc_old_product_attribute_id', $product_attribute['id_product_attribute'], true);
					
					// Hook for doing other actions after inserting the variation
					do_action('fgp2wc_post_insert_variation', $new_post_id, $product_attribute, $product, $new_product_id);
				}

				// Set the product type as "variable"
				wp_set_object_terms($new_product_id, $this->plugin->product_types['variable'], 'product_type', false);
				// Don't manage the stock at the product level
				update_post_meta($new_product_id, '_manage_stock', 'no');
				update_post_meta($new_product_id, '_stock_status', 'instock');
				wp_remove_object_terms($new_product_id, $this->plugin->product_visibilities['outofstock'], 'product_visibility');
			}

			// Store the default attributes
			if ( !empty($default_attributes) ) {
				add_post_meta($new_product_id, '_default_attributes', $default_attributes);
			}
			
			// Store the min and max variation prices
			if ( isset($min_variation_price) ) {
				add_post_meta($new_product_id, '_min_variation_price', $min_variation_price);
			}
			if ( isset($max_variation_price) ) {
				add_post_meta($new_product_id, '_max_variation_price', $max_variation_price);
			}
		}

		/**
		 * Get the PrestaShop attribute groups
		 *
		 * @return array of attribute groups
		 */
		private function get_attribute_groups() {
			$attribute_groups = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$position = '0 AS position';
				$order_by = '';
			} else {
				// PrestaShop 1.5+
				$position = 'g.position';
				$order_by = 'ORDER BY g.position';
			}
			$sql = "
				SELECT g.id_attribute_group, g.is_color_group, $position, gl.name, gl.public_name
				FROM {$prefix}attribute_group g
				INNER JOIN {$prefix}attribute_group_lang gl ON gl.id_attribute_group = g.id_attribute_group AND gl.id_lang = '$lang'
				WHERE 1 = 1
				$order_by
			";
			$attribute_groups = $this->plugin->prestashop_query($sql);

			return $attribute_groups;
		}

		/**
		 * Get the PrestaShop attributes
		 *
		 * @param int $attribute_group_id Attribute group ID
		 * @return array of attributes
		 */
		private function get_attributes($attribute_group_id) {
			$attributes = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$position = 'a.id_attribute AS position';
				$order_by = 'ORDER BY a.id_attribute';
			} else {
				// PrestaShop 1.5+
				$position = 'a.position';
				$order_by = 'ORDER BY a.position';
			}
			$sql = "
				SELECT a.id_attribute, a.color, $position, al.name
				FROM {$prefix}attribute a
				INNER JOIN {$prefix}attribute_lang al ON al.id_attribute = a.id_attribute AND al.id_lang = '$lang'
				WHERE a.id_attribute_group = '$attribute_group_id'
				$order_by
			";
			$attributes = $this->plugin->prestashop_query($sql);

			return $attributes;
		}

		/**
		 * Get the PrestaShop product attributes
		 *
		 * @param int $product_id Product ID
		 * @return array of product attributes
		 */
		private function get_product_attributes($product_id) {
			$product_attributes = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$sql = "
					SELECT pa.id_product_attribute, pa.reference, pa.ean13, pa.supplier_reference, pa.price, pa.wholesale_price, pa.weight, pa.quantity, pa.default_on
					FROM {$prefix}product_attribute pa
					WHERE pa.id_product = '$product_id'
				";
			} else {
				// PrestaShop 1.5+
				$extra_criteria = '';
				if ( $this->plugin->shop_id != 0 ) {
					$extra_criteria .= "AND pas.id_shop = '{$this->plugin->shop_id}'";
				}
				$sql = "
					SELECT pa.id_product_attribute, pa.reference, pa.ean13, pa.supplier_reference, pas.price, pas.wholesale_price, pas.weight, 0 AS quantity, pas.default_on
					FROM {$prefix}product_attribute pa
					INNER JOIN {$prefix}product p ON p.id_product = pa.id_product
					INNER JOIN {$prefix}product_attribute_shop pas ON pas.id_product_attribute = pa.id_product_attribute
					WHERE pa.id_product = '$product_id'
					$extra_criteria
				";
			}
			$sql = apply_filters('fgp2wc_get_product_attributes_sql', $sql);
			$product_attributes = $this->plugin->prestashop_query($sql);

			return $product_attributes;
		}

		/**
		 * Get the PrestaShop attributes from a product
		 *
		 * @param int $product_id Product ID
		 * @return array of product attributes
		 */
		private function get_attributes_from_product($product_id) {
			$product_attributes = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') && ($this->plugin->shop_id != 0) ) {
				// PrestaShop 1.5+
				$extra_joins = "INNER JOIN {$prefix}product_attribute_shop pas ON pas.id_product_attribute = pa.id_product_attribute";
				$extra_criteria = "AND pas.id_shop = '{$this->plugin->shop_id}'";
			}
			$sql = "
				SELECT DISTINCT pac.id_attribute
				FROM {$prefix}product_attribute pa
				INNER JOIN {$prefix}product_attribute_combination pac ON pac.id_product_attribute = pa.id_product_attribute
				$extra_joins
				WHERE pa.id_product = '$product_id'
				$extra_criteria
			";
			$result = $this->plugin->prestashop_query($sql);
			foreach ( $result as $row ) {
				$product_attributes[] = $row['id_attribute'];
			}

			return $product_attributes;
		}

		/**
		 * Get the PrestaShop product attributes from a product attribute ID
		 *
		 * @param int $product_attribute_id Product attribute ID
		 * @return array of product attributes
		 */
		private function get_attributes_from_product_attribute($product_attribute_id) {
			$product_attributes = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->default_language;
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') && ($this->plugin->shop_id != 0) ) {
				// PrestaShop 1.5+
				$extra_joins .= "INNER JOIN {$prefix}attribute_shop ats ON ats.id_attribute = a.id_attribute";
				$extra_criteria = "AND ats.id_shop = '{$this->plugin->shop_id}'";
			}
			$sql = "
				SELECT pac.id_attribute, al.name, agl.name AS group_name
				FROM {$prefix}product_attribute_combination pac
				INNER JOIN {$prefix}attribute a ON a.id_attribute = pac.id_attribute
				INNER JOIN {$prefix}attribute_lang al ON al.id_attribute = a.id_attribute AND al.id_lang = '$lang'
				INNER JOIN {$prefix}attribute_group_lang agl ON agl.id_attribute_group = a.id_attribute_group AND agl.id_lang = '$lang'
				$extra_joins
				WHERE pac.id_product_attribute = '$product_attribute_id'
				$extra_criteria
			";
			$result = $this->plugin->prestashop_query($sql);
			foreach ( $result as $row ) {
				$product_attributes[$row['group_name']] = $row['id_attribute'];
			}

			return $product_attributes;
		}

		/**
		 * Get the PrestaShop product attribute groups
		 *
		 * @param int $product_id Product ID
		 * @return array of product attribute groups
		 */
		private function get_attribute_groups_from_product($product_id) {
			$product_attribute_groups = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->default_language;
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$position = 'ag.id_attribute_group AS position';
			} else {
				// PrestaShop 1.5+
				$position = 'ag.position';
			}
			$sql = "
				SELECT DISTINCT agl.name, $position
				FROM {$prefix}product_attribute pa
				INNER JOIN {$prefix}product_attribute_combination pac ON pac.id_product_attribute = pa.id_product_attribute
				INNER JOIN {$prefix}attribute a ON a.id_attribute = pac.id_attribute
				INNER JOIN {$prefix}attribute_group ag ON ag.id_attribute_group = a.id_attribute_group
				INNER JOIN {$prefix}attribute_group_lang agl ON agl.id_attribute_group = ag.id_attribute_group AND agl.id_lang = '$lang'
				WHERE pa.id_product = '$product_id'
			";
			$product_attribute_groups = $this->plugin->prestashop_query($sql);

			return $product_attribute_groups;
		}

		/**
		 * Get the product attribute supplier reference (PrestaShop 1.5+)
		 *
		 * @param int $product_attribute_id PrestaShop product attribute ID
		 * @return string Supplier reference
		 */
		private function get_product_attribute_supplier_reference($product_attribute_id) {
			$supplier_reference = '';

			if ( version_compare($this->plugin->prestashop_version, '1.5', '>=') ) {
				// PrestaShop 1.5+
				$prefix = $this->plugin->plugin_options['prefix'];
				$sql = "
					SELECT ps.product_supplier_reference
					FROM {$prefix}product_supplier ps
					WHERE ps.id_product_attribute = '$product_attribute_id'
					LIMIT 1
				";
				$result = $this->plugin->prestashop_query($sql);
				if ( count($result) > 0) {
					$supplier_reference = $result[0]['product_supplier_reference'];
				}
			}
			return $supplier_reference;
		}

		/**
		 * Get the product attribute images
		 *
		 * @param int $product_attribute_id PrestaShop product attribute ID
		 * @return array Images
		 */
		private function get_product_attribute_images($product_attribute_id) {
			$images = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			$sql = "
				SELECT i.id_image, i.id_product, il.legend
				FROM {$prefix}product_attribute_image pai
				INNER JOIN {$prefix}image i ON i.id_image = pai.id_image
				LEFT JOIN {$prefix}image_lang il ON il.id_image = i.id_image AND il.id_lang = '$lang'
				WHERE pai.id_product_attribute = '$product_attribute_id'
				ORDER BY i.position
			";
			$images = $this->plugin->prestashop_query($sql);
			return $images;
		}

		/**
		 * Get the product attribute quantity
		 * 
		 * @since 3.8.2
		 * 
		 * @param int $product_attribute_id Product attribute ID
		 * @return int Quantity
		 */
		private function get_product_attribute_quantity($product_attribute_id) {
			$quantity = 0;
			$prefix = $this->plugin->plugin_options['prefix'];
			$extra_criteria = '';
			if ( $this->plugin->shop_id != 0 ) {
				$extra_criteria .= "AND (s.id_shop = '{$this->plugin->shop_id}' OR s.id_shop = 0)";
			}
			$sql = "
				SELECT s.quantity
				FROM {$prefix}stock_available s
				WHERE s.id_product_attribute = '$product_attribute_id'
				$extra_criteria
				ORDER BY s.id_shop DESC
				LIMIT 1
			";
			$result = $this->plugin->prestashop_query($sql);
			if ( count($result) > 0 ) {
				$quantity = $result[0]['quantity'];
			}
			
			return $quantity;
		}
		
		/**
		 * Get the PrestaShop features
		 *
		 * @return array of features
		 */
		private function get_features() {
			$features = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$position = '0 AS position';
			} else {
				// PrestaShop 1.5+
				if ( $this->plugin->shop_id != 0 ) {
					$extra_joins .= "INNER JOIN {$prefix}feature_shop fs ON fs.id_feature = f.id_feature";
					$extra_criteria = "AND fs.id_shop = '{$this->plugin->shop_id}'";
				}
				$position = 'f.position';
			}
			$sql = "
				SELECT f.id_feature, $position, fl.name
				FROM {$prefix}feature f
				INNER JOIN {$prefix}feature_lang fl ON fl.id_feature = f.id_feature AND fl.id_lang = '$lang'
				$extra_joins
				$extra_criteria
			";
			$features = $this->plugin->prestashop_query($sql);

			return $features;
		}

		/**
		 * Get the PrestaShop feature values
		 *
		 * @param int $feature_id Attribute group ID
		 * @return array of feature values
		 */
		private function get_feature_values($feature_id) {
			$feature_values = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$lang = $this->plugin->current_language;
			$sql = "
				SELECT fvl.id_feature_value, fvl.value
				FROM {$prefix}feature_value_lang fvl
				INNER JOIN {$prefix}feature_value fv ON fv.id_feature_value = fvl.id_feature_value
				WHERE fv.id_feature = '$feature_id'
				AND fvl.id_lang = '$lang'
			";
			$feature_values = $this->plugin->prestashop_query($sql);

			return $feature_values;
		}

		/**
		 * Get the PrestaShop product features
		 *
		 * @param int $product_id Product ID
		 * @return array of product features
		 */
		public function get_product_features($product_id) {
			$product_features = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$feature_lang = $this->plugin->default_language;
			$extra_joins = '';
			$extra_criteria = '';
			if ( version_compare($this->plugin->prestashop_version, '1.5', '<') ) {
				// PrestaShop 1.4
				$position = '0 AS position';
				$order = '';
			} else {
				// PrestaShop 1.5+
				if ( $this->plugin->shop_id != 0 ) {
					$extra_joins .= "INNER JOIN {$prefix}feature_shop fs ON fs.id_feature = f.id_feature";
					$extra_criteria = "AND fs.id_shop = '{$this->plugin->shop_id}'";
				}
				$position = 'f.position';
				$order = 'ORDER BY f.position';
			}
			$sql = "
				SELECT DISTINCT f.id_feature, fl.name, $position
				FROM {$prefix}feature_product fp
				INNER JOIN {$prefix}feature f ON f.id_feature = fp.id_feature
				INNER JOIN {$prefix}feature_lang fl ON fl.id_feature = fp.id_feature AND fl.id_lang = '$feature_lang'
				$extra_joins
				WHERE fp.id_product = '$product_id'
				$extra_criteria
				$order
			";
			$product_features = $this->plugin->prestashop_query($sql);

			return $product_features;
		}

		/**
		 * Get the PrestaShop product feature values
		 *
		 * @since 3.52.1
		 * 
		 * @param int $product_id Product ID
		 * @param int $feature_id Feature ID
		 * @param int $lang Language code
		 * @return array of product feature values
		 */
		public function get_product_feature_values($product_id, $feature_id, $lang) {
			$product_feature_values = array();

			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT fvl.id_feature_value, fvl.value
				FROM {$prefix}feature_product fp
				INNER JOIN {$prefix}feature_value_lang fvl ON fvl.id_feature_value = fp.id_feature_value AND fvl.id_lang = '$lang'
				WHERE fp.id_product = '$product_id'
				AND fp.id_feature = '$feature_id'
			";
			$product_feature_values = $this->plugin->prestashop_query($sql);

			return $product_feature_values;
		}

		/**
		 * Update the product variations stocks
		 * 
		 * @since 3.71.0
		 * 
		 * @param int $product_id WP product ID
		 * @param array $product PrestaShop product
		 */
		public function update_product_variations_stocks($product_id, $product) {
			if ( $this->plugin->premium_options['update_stock_only'] ) {
				$variations = $this->get_imported_product_variations($product_id);
				foreach ( $variations as $variation ) {
					if ( $this->plugin->update_product_stock_and_backorders($variation->ID, $product, $variation->product_attribute_id) ) {
						do_action('fgp2wc_post_update_variation', $variation);
					}
				}
			}
		}
		
		/**
		 * Get the imported variations of a product
		 * 
		 * @since 3.71.0
		 * 
		 * @param int $product_id WP product ID
		 * @return array Product variations
		 */
		private function get_imported_product_variations($product_id) {
			global $wpdb;
			$product_variations = array();
			
			$sql = $wpdb->prepare("
				SELECT p.ID, pm.meta_value AS product_attribute_id
				FROM {$wpdb->posts} p
				LEFT JOIN {$wpdb->postmeta} pm ON pm.post_id = p.ID AND pm.meta_key = '_fgp2wc_old_product_attribute_id'
				WHERE p.post_parent = %d
			", $product_id);
			$product_variations = $wpdb->get_results($sql);
			
			return $product_variations;
		}
		
	}
}
