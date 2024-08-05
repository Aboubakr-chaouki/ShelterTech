			<tr>
				<th scope="row"><?php _e('Accessories:', 'fgp2wcp'); ?></th>
				<td>
					<?php _e('Import the accessories:', 'fgp2wcp'); ?>
					<input type="radio" name="accessories" id="accessories_as_crosssells" value="as_crosssells"<?php checked($data['accessories'], 'as_crosssells', 1); ?> /><label for="accessories_as_crosssells"><?php _e('as cross sells', 'fgp2wcp'); ?></label>&nbsp;
					<input type="radio" name="accessories" id="accessories_as_upsells" value="as_upsells"<?php checked($data['accessories'], 'as_upsells', 1); ?> /><label for="accessories_as_upsells"><?php _e('as up sells', 'fgp2wcp'); ?></label>&nbsp;
					<input type="radio" name="accessories" id="accessories_as_both" value="as_both"<?php checked($data['accessories'], 'as_both', 1); ?> /><label for="accessories_as_both"><?php _e('as both', 'fgp2wcp'); ?></label>&nbsp;
				</td>
			</tr>
			
			<tr>
				<th scope="row"><?php _e('SEO:', 'fgp2wcp'); ?></th>
				<td>
					<input id="import_meta_seo" name="import_meta_seo" type="checkbox" value="1" <?php checked($data['import_meta_seo'], 1); ?> /> <label for="import_meta_seo" ><?php _e('Import the SEO meta data (compatible with Yoast SEO and Rank Math SEO)', 'fgp2wcp'); ?></label>
					<br />
					<input id="url_redirect" name="url_redirect" type="checkbox" value="1" <?php checked($data['url_redirect'], 1); ?> /> <label for="url_redirect" ><?php _e("Redirect the PrestaShop product URLs", 'fgp2wcp'); ?></label>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><?php _e('Multishops:', 'fgp2wcp'); ?></th>
				<td>
					<label for="shop" ><?php _e('Import the shop:', 'fgp2wcp'); ?></label>
					<select id="shop" name="shop">
						<?php echo $data['shops_options']; ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><?php _e('Partial import:', 'fgp2wcp'); ?></th>
				<td>
					 <div id="partial_import_toggle" style="text-decoration: underline; cursor: pointer; margin-bottom: 4px;"><?php _e('expand / collapse', 'fgp2wcp'); ?></div>
					<div id="partial_import">
					<input id="skip_cms" name="skip_cms" type="checkbox" value="1" <?php checked($data['skip_cms'], 1); ?> /> <label for="skip_cms" ><?php _e('Don\'t import the CMS', 'fgp2wcp'); ?></label>
					<br />
						<input id="skip_products_categories" name="skip_products_categories" type="checkbox" value="1" <?php checked($data['skip_products_categories'], 1); ?> /> <label for="skip_products_categories" ><?php _e('Don\'t import the products categories', 'fgp2wcp'); ?></label>
						<br />
					<input id="skip_products" name="skip_products" type="checkbox" value="1" <?php checked($data['skip_products'], 1); ?> /> <label for="skip_products" ><?php _e('Don\'t import the products', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_disabled_products" name="skip_disabled_products" type="checkbox" value="1" <?php checked($data['skip_disabled_products'], 1); ?> /> <label for="skip_disabled_products" ><?php _e('Don\'t import the disabled products', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_attributes" name="skip_attributes" type="checkbox" value="1" <?php checked($data['skip_attributes'], 1); ?> /> <label for="skip_attributes" ><?php _e('Don\'t import the product attributes', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_accessories" name="skip_accessories" type="checkbox" value="1" <?php checked($data['skip_accessories'], 1); ?> /> <label for="skip_accessories" ><?php _e('Don\'t import the product accessories', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_downloadable" name="skip_downloadable" type="checkbox" value="1" <?php checked($data['skip_downloadable'], 1); ?> /> <label for="skip_downloadable" ><?php _e('Don\'t import the downloadable products', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_users" name="skip_users" type="checkbox" value="1" <?php checked($data['skip_users'], 1); ?> /> <label for="skip_users" ><?php _e('Don\'t import the users', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_orders" name="skip_orders" type="checkbox" value="1" <?php checked($data['skip_orders'], 1); ?> /> <label for="skip_orders" ><?php _e('Don\'t import the orders', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_reviews" name="skip_reviews" type="checkbox" value="1" <?php checked($data['skip_reviews'], 1); ?> /> <label for="skip_reviews" ><?php _e('Don\'t import the reviews', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_vouchers" name="skip_vouchers" type="checkbox" value="1" <?php checked($data['skip_vouchers'], 1); ?> /> <label for="skip_vouchers" ><?php _e('Don\'t import the vouchers', 'fgp2wcp'); ?></label>
					<br />
					<input id="skip_menus" name="skip_menus" type="checkbox" value="1" <?php checked($data['skip_menus'], 1); ?> /> <label for="skip_menus" ><?php _e('Don\'t import the menus', 'fgp2wcp'); ?></label>
					<?php do_action('fgp2wc_post_display_partial_import_options', $data); ?>
					</div>
				</td>
			</tr>
