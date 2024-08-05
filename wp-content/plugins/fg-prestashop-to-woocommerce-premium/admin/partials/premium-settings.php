				<tr>
					<th scope="row"><label for="prefix"><?php _e('Cookie key', 'fg-prestashop-to-woocommerce'); ?></label></th>
					<td><input id="cookie_key" name="cookie_key" type="text" size="70" value="<?php echo esc_attr($data['cookie_key']); ?>" /><br />
						<small><?php _e('The cookie key is used to authenticate the customers on WordPress with their PrestaShop password.', 'fgp2wcp'); ?> <?php _e('PrestaShop < 1.7 only', 'fgp2wcp'); ?></small>
					</td>
				</tr>
