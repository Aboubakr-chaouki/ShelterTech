=== FG PrestaShop to WooCommerce Premium ===
Contributors: Kerfred
Plugin Uri: https://www.fredericgilles.net/fg-prestashop-to-woocommerce/
Tags: prestashop, woocommerce, importer, converter, dropshipping
Requires at least: 4.5
Tested up to: 6.5.3
Stable tag: 4.54.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to migrate PrestaShop e-commerce solution to WooCommerce

== Description ==

This plugin migrates products, categories, tags, images, CMS, employees, customers and orders from PrestaShop to WooCommerce/WordPress.

It has been tested with **PrestaShop versions 1.0 to 8.1** and the latest version of WordPress. It is compatible with multisite installations.

Major features include:

* migrates PrestaShop products
* migrates PrestaShop product images
* migrates PrestaShop product categories
* migrates PrestaShop product tags
* migrates PrestaShop product features
* migrates PrestaShop product attributes
* migrates PrestaShop product attribute images
* migrates PrestaShop product accessories
* migrates PrestaShop product combinations
* migrates PrestaShop virtual products
* migrates PrestaShop downloadable products
* migrates PrestaShop CMS (as posts or pages)
* migrates PrestaShop employees
* migrates PrestaShop customers
* migrates PrestaShop orders
* migrates PrestaShop ratings and reviews
* migrates PrestaShop discounts/vouchers (cart rules)
* migrates PrestaShop menus
* migrates the tax rules groups
* SEO: Redirect the PrestaShop URLs to the new WordPress URLs
* SEO: Import meta data (browser title, description, keywords, robots)
* the employees and customers can authenticate to WordPress using their PrestaShop passwords
* ability to do a partial import
* ability to run the import automatically from the cron (for dropshipping for example)
* ability to run the import by WP CLI
* compatible with PrestaShop multishops

No need to subscribe to an external web site.

= Add-ons =

The Premium version allows the use of add-ons that enhance functionality:

* Attachments: imports the product attachments
* Brands: imports the manufacturers
* Suppliers: imports the suppliers
* Customer Groups: imports the customer groups and the wholesale prices
* Cost of Goods: import the products cost
* Custom Order Numbers: imports the PrestaShop order references
* Internationalization: imports the translations to WPML
* Tiered prices: imports the tiered prices based on quantity
* Units: imports the product units

== Installation ==

= Requirements =
WooCommerce must be installed and activated before running the migration.

= Installation =
1. Install the plugin in the Admin => Plugins menu => Add New => Upload => Select the zip file => Install Now
2. Activate the plugin in the Admin => Plugins menu
3. Run the importer in Tools > Import > PrestaShop
4. Configure the plugin settings. You can find the PrestaShop database parameters in the PrestaShop file settings.inc.php (PrestaShop 1.5+) or in the PrestaShop Preferences > Database tab (PrestaShop 1.4 and less)
5. Test the database connection
6. Click on the import button

== Automatic import from cron ==
In the crontab, add this row to run the import every day at 0:00:
0 0 * * * php /path/to/wp/wp-content/plugins/fg-prestashop-to-woocommerce-premium/cron_import.php >>/dev/null

== WP CLI Usage ==

wp import-prestashop empty              Empty the imported data | empty all : Empty all the WordPress data
wp import-prestashop import             Import the data
wp import-prestashop update             Update the data
wp import-prestashop test_database      Test the database connection

== Screenshots ==

1. Parameters screen

== Translations ==
* English (default)
* French (fr_FR)
* Hungarian (hu_HU)
* Russian (ru_RU)
* other can be translated

== Changelog ==

= 4.54.0 =
* Fixed: Incorrect DATETIME value: '0000-00-00 00:00:00'

= 4.53.0 =
* New: Import the EAN13 field to be compatible with the plugin WP-Lister Lite for Amazon
* Tested with WordPress 6.5.3

= 4.52.0 =
* New: Add the hook "fgp2wc_get_products_add_extra_cols"
* New: Add the hook "fgp2wc_get_products_add_extra_joins"
* New: Add the hook "fgp2wc_get_product_attributes_sql"
* Fixed: Files whose filename is longer than 255 characters were not imported

= 4.51.1 =
* Fixed: Images were not imported by File System method

= 4.51.0 =
* New: Import the order completed date
* New: Check if we need the Internationalization add-on
* Fixed: Extra note with a wrong date was added by WooCommerce about the "completed" order status
* Tested with WordPress 6.5.2

= 4.50.0 =
* New: Add the option "Don't import the downloadable products"

= 4.49.0 =
* New: Run the plugin during the hook "plugins_loaded"
* Tweak: Replace rand() by wp_rand()
* Tweak: Replace file_get_contents() by wp_remote_get()
* Tweak: Replace file_get_contents() + json_decode() by wp_json_file_decode()
* Tweak: Replace json_encode() by wp_json_encode()
* Tweak: Remove the deprecated argument of get_terms() and wp_count_terms()
* Tested with WordPress 6.5

= 4.48.0 =
* Fixed: Unsafe SQL calls

= 4.47.0 =
* Fixed: Rename the log file with a random name to avoid a Sensitive Data Exposure

= 4.46.0 =
* New: Import the order payment date

= 4.45.1 =
* Fixed: When WooCommerce Analytics is disabled: Fatal error: Uncaught Error: Call to undefined method WC_Order::get_report_customer_id()
* Tested with WordPress 6.4.3

= 4.45.0 =
* New: Don't import the images in duplicate
* Fixed: Plugin log can be deleted with a CSRF
* Fixed: Attribute values counters were equal to 0
* Fixed: Found 2 elements with non-unique id #fgp2wc_nonce
* Tested with WordPress 6.4.2

= 4.44.5 =
* Fixed: Wrong error message about FTP connection and downloadable products
* Fixed: Deprecated: Creation of dynamic property FG_PrestaShop_to_WooCommerce_Menus::$imported_cms_articles is deprecated
* Fixed: Deprecated: Creation of dynamic property FG_PrestaShop_to_WooCommerce_Menus::$imported_products is deprecated

= 4.44.4 =
* Fixed: Wrong sale price if there are group prices

= 4.44.3 =
* Fixed: Emails about orders were sent to customers
* Fixed: Wrong old order ID stored in the order meta data
* Fixed: Deprecated: preg_replace(): Passing null to parameter #3 ($subject) of type array|string is deprecated
* Fixed: Deprecated: Creation of dynamic property FG_Prestashop_to_WooCommerce_Orders::$order_statuses

= 4.44.2 =
* Fixed: Number of orders equals 0 if HPOS is used without compatibility mode
* Tested with WordPress 6.4.1

= 4.44.1 =
* Fixed: Sale price was taking into account the customer specific price when using the Tiered Prices add-on
* Fixed: Don't set the sale price if it is equal to the regular price

= 4.44.0 =
* Change: Import the users and customers before the products
* New: Add the hook "fgp2wc_get_specific_prices_sql"
* New: Add the hook "fgp2wcp_post_import_users"
* Tested with WordPress 6.4

= 4.43.0 =
* New: Compatibility with WooCommerce HPOS
* New: Import the order update date
* New: Import the order note
* Fixed: Tax not displayed on the order line item
* Tested with WordPress 6.3.2

= 4.42.1 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'unity' in 'where clause'
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'vat_number' in 'where clause'
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dni' in 'where clause'

= 4.42.0 =
* New: Add the hook "fgp2wcp_process_rewrite_rule"
* Tested with WordPress 6.3.1

= 4.41.0 =
* New: Import the EAN13 code in the variations
* New: Update the EAN13 code in the products
* Fixed: Don't import the EAN13 if it is empty

= 4.40.0 =
* Change: Import the customer's last address as his shipping address

= 4.39.0 =
* New: Import the EAN13 field to be compatible with the plugin EAN for WooCommerce
* Fixed: Product category thumbnail was not imported in the translations

= 4.38.0 =
* Compatible with PrestaShop 8 & 8.1
* Fixed: Notice: Trying to access array offset on value of type null with WP-CLI
* Tested with WordPress 6.3

= 4.37.1 =
* Fixed: Warning: Undefined array key "specific_prices"

= 4.37.0 =
* New: Import the meta title and meta description to Rank Math SEO

= 4.36.6 =
* Fixed: Wrong sale price when there are several reductions

= 4.36.5 =
* Fixed: Category URLs were not redirected in translated languages

= 4.36.4 =
* Fixed: Attribute slug too long (28 characters max)

= 4.36.3 =
* Fixed: FTP connection failed with password containing special characters
* Fixed: Wrong specific prices imported

= 4.36.2 =
* Fixed: Product attributes not imported

= 4.36.1 =
* Fixed: Memory full when there are thousands of values per attribute
* Tested with WordPress 6.2.2

= 4.36.0 =
* New: Import the products sort order

= 4.35.1 =
* Tweak: Clear WooCommerce Analytics cache

= 4.35.0 =
* New: Update the WooCommerce Customers screen
* Compatibility with PHP 8.2

= 4.34.2 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'c.id_lang' in 'on clause'
* Tested with WordPress 6.2

= 4.34.1 =
* New: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'ps.id_category_default' in 'field list'

= 4.34.0 =
* New: Add the argument $media_id in the hook "fgp2wc_post_create_woocommerce_attribute_value" (useful for the Variations Swatches add-on)

= 4.33.3 =
* Fixed: Product sale prices not imported if there is only one shop

= 4.33.2 =
* Fixed: Brands URLs were redirected to a category if the manufacturer ID is the same as a category ID

= 4.33.1 =
* Fixed: Configuration not loaded before the update. Consequence: product brands were not updated

= 4.33.0 =
* New: Add the hook "fgp2wc_import_configuration"
* Compatibility with PHP 8.2

= 4.32.2 =
* Fixed: Wrong sale prices when PrestaShop has several shops

= 4.32.1 =
* Fixed: The option "Import the media with duplicate names" didn't work anymore (regression from 4.31.0). So wrong images were imported.

= 4.32.0 =
* New: Update the customer nickname
* Fixed: User login not updated when the customer changes his email in PrestaShop
* Fixed: Notice: Undefined index: id_lang
* Fixed: Notice: Undefined index: iso_code

= 4.31.2 =
* Fixed: User login not updated when the customer changes his email in PrestaShop
* Tested with WordPress 6.1.1

= 4.31.1 =
* Tested with WordPress 6.1

= 4.31.0 =
* New: Import the user languages in their profile if different from the PrestaShop default language
* Tweak: Shorten the filenames if the option "Import the media with duplicate names" is selected
* Tested with WordPress 6.0.3

= 4.30.0 =
* Tweak: Add order_id, product_id and variation_id in the hook "fgp2wc_post_insert_order_item"
* Tweak: Use the WooCommerce native function wc_update_order_item_meta()

= 4.29.2 =
* Fixed: Order messages not imported for PrestaShop version < 1.5
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'm.private' in 'field list'

= 4.29.1 =
* Fixed: Current user lost his administrator role
* Tested with WordPress 6.0.2

= 4.29.0 =
* New: Check if we need the Variations Swatches module
* Tested with WordPress 6.0.1

= 4.28.1 =
* Fixed: Current user deleted when removing previously imported data

= 4.28.0 =
* Fixed: The widget "Filter Products by Attribute" was empty on the front-end
* Tested with WordPress 6.0

= 4.27.0 =
* New: If duplicated users exist in the original database, import the one with the last update date
* New: Empty the table wc_product_attributes_lookup when emptying the WordPress content
* Fixed: Unknown function "wc_delete_product_transients" when WooCommerce is not active
* Fixed: [ERROR] Error:SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group' at line 1

= 4.26.0 =
* New: Add the WordPress path in the Debug Info

= 4.25.2 =
* Fixed: Tax not displayed in the order items
* Tested with WordPress 5.9.3

= 4.25.1 =
* Fixed: Allow the non valid SSL certificates
* Tested with WordPress 5.9.2

= 4.25.0 =
* New: Don't delete the theme's customizations (WP 5.9) when removing all WordPress content
* Tested with WordPress 5.9

= 4.24.0 =
* New: Add a spinner during importing data, updating data, emptying WordPress content, testing the database, download method and FTP connections and saving parameters
* Tweak: Better handle the errors triggered during the FTP connection test
* Tested with WordPress 5.8.3

= 4.23.0 =
* New: Allow multiple customer addresses (with the Multiple addresses add-on)

= 4.22.0 =
* New: Import the order comments

= 4.21.1 =
* Fixed: "Fatal error: Uncaught Error: Call to a member function is_dir() on null" when there are downloadable products but with a wrong FTP connection
* Tested with WordPress 5.8.2

= 4.21.0 =
* New: Determine the order status from the order state template
* Tested with WordPress 5.8.1

= 4.20.2 =
* Fixed: Don't update the user password if it has already been changed in WordPress
* Fixed: Tax missing in the order items
* Fixed: Data were not updated if the products were skipped

= 4.20.1 =
* Fixed: Fatal error: Uncaught Error: Call to a member function copy() on null
* Fixed: Progress bar exceeds 100% when running the import again
* Fixed: Some variables were not escaped before displaying
* Tested with WordPress 5.8

= 4.20.0 =
* New: Import the "Condition" field as an attribute

= 4.19.0 =
* New: Check if we need the Suppliers module
* Fixed: During the import by cron or by WP CLI, the admin user could be wrong
* Tested with WordPress 5.7.2

= 4.18.2 =
* Fixed: Tax not displayed in the order items
* Tested with WordPress 5.7.1

= 4.18.1 =
* Fixed: Featured image duplicated in the gallery when importing all shops

= 4.18.0 =
* Tweak: Remove the "wp_insert_post" hook that consumes a lot of CPU and memory
* Tested with WordPress 5.7

= 4.17.0 =
* New: Check if we need the EU VAT add-on
* New: Check if we need the NIF add-on

= 4.16.1 =
* Fixed: The mobile phone number was not imported in the order
* Tested with WordPress 5.6.2
* Tested with WooCommerce 5

= 4.16.0 =
* New: Ability to download the media by http, ftp or file system

= 4.15.0 =
* New: Add WP-CLI support
* New: Add the hook "fgp2wc_post_import_products"
* Tested with WordPress 5.6.1

= 4.14.0 =
* New: Add the hooks "fgp2wc_pre_import_orders" and "fgp2wc_post_import_orders"
* Fixed: Images inserted in the post content with width and height = 0 when the option "Don't generate the thumbnails" is selected

= 4.13.0 =
* New: Update the existing customers

= 4.12.0 =
* Fixed: Plugin and add-ons not displayed in the debug informations on Windows
* Tweak: Add a parameter to the hook "fgp2wc_post_insert_variation"

= 4.11.2 =
* Fixed: Plugin and add-ons not shown on the Debug Info tab if the plugins are not installed in the standard plugins directory

= 4.11.1 =
* Tested with WordPress 5.6

= 4.11.0 =
* New: Check if we need the Units add-on
* Fixed: JQuery Migrate warning: jQuery.fn.load() is deprecated

= 4.10.1 =
* Fixed: Visitors specific prices not imported

= 4.10.0 =
* New: Check if we need the Tiered Prices add-on
* Fixed: Wrong sale price if the minimum quantity to get the discount is > 1

= 4.9.0 =
* New: Ability to change the default import timeout by adding `define('IMPORT_TIMEOUT', 7200);` in the wp-config.php file
* Fixed: Character " not displayed in the settings
* Fixed: The process was not stopped when clicking on "Stop" during the categories import
* Tested with WordPress 5.5.3

= 4.8.0 =
* New: Import the second customer address as the shipping address

= 4.7.0 =
* New: Redirect the brand pages
* New: Import the order discounts

= 4.6.5 =
* Fixed: URLs without .html were not redirected

= 4.6.4 =
* Fixed: Reviews not counting

= 4.6.3 =
* Fixed: Progress bar at 0% if the site is in https and the WordPress general settings are in http
* Fixed: Tax classes not assigned to products after resuming the import

= 4.6.2 =
* Fixed: Don't manage the stock at product level if there are variations
* Fixed: Wrong prices imported when importing inclusive of tax
* Fixed: Wrong reduction tax with PrestaShop 1.5 and 1.6
* Fixed: Wrong order shipping tax

= 4.6.1 =
* Fixed: Notice: Trying to get property 'taxonomy' of non-object in /wp-content/plugins/wordpress-seo/src/builders/indexable-hierarchy-builder.php
* Fixed: Notice: Trying to get property 'parent' of non-object in /wp-content/plugins/wordpress-seo/src/builders/indexable-hierarchy-builder.php
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'd.physically_filename' in 'field list'
* Fixed: Wrong stock imported
* Tested with WordPress 5.5.1

= 4.6.0 =
* Compatible with WordPress 5.5
* New: Add an option to not generate the images thumbnails
* New: Make the max_allowed_packet human readable
* Change: Set the default media timeout to 20 seconds
* Fixed: Timezone was not the same between the start and the end time in the logs

= 4.5.0 =
* New: Don't add a prefix to the attribute slug if the attribute name is not too long

= 4.4.2 =
* New: Redirect URLs containing the separator "_"

= 4.4.1 =
* Fixed: Regression from 4.4.0: URLs not redirected when WordPress is located in the root directory

= 4.4.0 =
* New: Redirect the product categories URLs even after changing their slug on WordPress

= 4.3.0 =
* New: Import the users registered date

= 4.2.0 =
* New: Add the hook "fgp2wc_get_customer_address_sql"

= 4.1.0 =
* New: Display the PHP errors in the logs
* Tweak: Don't download the downloadable files again if they have already been downloaded

= 4.0.0 =
* New: Add an help tab
* New: Add a debug info tab

= 3.72.0 =
* New: Add the hooks "fgp2wc_get_orders_sql" and "fgp2wc_get_address_sql"

= 3.71.0 =
* New: Option to update the products stocks only

= 3.70.2 =
* Fixed: Column 'post_content' cannot be null

= 3.70.1 =
* Fixed: Deprecated function update_woocommerce_term_meta
* Performance improvements
* Tested with WordPress 5.4.2

= 3.70.0 =
* New: Ability to import all shops
* New: Avoid duplicates

= 3.69.1 =
* Fixed: Import hangs because function transliterator_transliterate() does not exist (regression from 3.68.0)

= 3.69.0 =
* New: Add the hook "get_customer_address_sql"
* Fixed: Customers import counter not reset when deleting the imported data

= 3.68.0 =
* New: Compatible with Hebrew language
* Fixed: Sale price was set as current price even if the sale period is ended
* Fixed: "[ERROR] Unable to create directory" if the uploads are not organized into month- and year-based folders

= 3.67.0 =
* New: Russian translation (thanks to Alex)
* Tested with WordPress 5.4.1

= 3.66.1 =
* Fixed: Notice: Trying to access array offset on value of type bool

= 3.66.0 =
* Fixed: Logs were not displayed
* Fixed: Product attributes missing
* Tested with WordPress 5.4

= 3.65.0 =
* Fixed: In multisite, when deleting the imported data, it deletes all the users from all sites
* Tested with WooCommerce 4.0

= 3.64.0 =
* New: Add the hook "fgp2wc_post_import_product_category"
* Tweak: Refactoring

= 3.63.2 =
* Fixed: Unable to purchase variations on backorder

= 3.63.1 =
* Fixed: Notice: date_default_timezone_set(): Timezone ID '' is invalid
* Fixed: Logs were not displayed due to mod_security

= 3.63.0 =
* Import invoices numbers and invoices dates (for the Custom Order Numbers add-on)

= 3.62.0 =
* New: Import the backorders status of the product variations

= 3.61.1 =
* Fixed: Some categories images were not imported

= 3.61.0 =
* New: Add a third argument to the hook "fgp2wc_post_insert_variation" useful for the Custom Stock Status add-on

= 3.60.0 =
* New: Import the EAN13 field to be compatible with the plugin Product GTIN (EAN, UPC, ISBN) for WooCommerce
* Tested with WordPress 5.3.2

= 3.59.2 =
* Fixed: Product variations not imported correctly

= 3.59.1 =
* Fixed: CMS not imported
* Tested with WordPress 5.3

= 3.59.0 =
* New: Add an option to not import the disabled products
* Fixed: [ERROR] Error:SQLSTATE[HY000]: General error: 3065 Expression #1 of ORDER BY clause is not in SELECT list, references column 'p.date_upd' which is not in SELECT list; this is incompatible with DISTINCT

= 3.58.3 =
* Fixed: Deleted images in PrestaShop were not deleted in WordPress during the update
* Fixed: Products not updated
* Fixed: Date was GMT instead of local date

= 3.58.2 =
* Fixed: Images not imported for PrestaShop 1.3 and less

= 3.58.1 =
* Fixed: Regression since 3.51.0: Products not imported for PrestaShop 1.3 and less

= 3.58.0 =
* New: Delete the Yoast SEO data when emptying all the WordPress content
* Tested with WordPress 5.2.4

= 3.57.0 =
* New: Check if we need the Attachments add-on

= 3.56.1 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'l.id_shop' in 'where clause' with PrestaShop 1.5
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'cl.id_shop' in 'where clause' with PrestaShop 1.5

= 3.56.0 =
* New: Option to choose the shop to import
* Fixed: Logs were not displayed if the URL is wrong in the WordPress general settings
* Fixed: Vouchers not imported

= 3.55.1 =
* Fixed: Import only the main group sale price

= 3.55.0 =
* New: Download the media even if they are redirected

= 3.54.0 =
* New: Compatible with the new WooCommerce tax classes

= 3.53.1 =
* Fixed: The attributes counters were 0

= 3.53.0 =
* New: Add the hook "fgp2wc_attribute_type" used by Variations Swatches
* New: Add the hook "fgp2wc_attribute_images" used by Variations Gallery
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 't.deleted' in 'where clause'
* Fixed: Sales prices not imported
* Tested with WordPress 5.2.3

= 3.52.2 =
* Fixed: Sometimes product features were not translated when the import was resumed
* Fixed: The progress bar may exceed 100% when resuming the import

= 3.52.1 =
* Fixed: Product features not translated

= 3.52.0 =
* New: Add the hook "fgp2wc_post_insert_order"
* New: Add the hook "fgp2wc_post_insert_order_item"
* Tweak: Refactoring of the orders class

= 3.51.1 =
* Fixed: The tax rules groups were not reimported after emptying the WordPress content

= 3.51.0 =
* New: Import the tax rules groups

= 3.50.0 =
* New: Update the WooCommerce product meta lookup table

= 3.49.1 =
* Fixed: Specific prices not imported for variations
* Tested with WordPress 5.2.2

= 3.49.0 =
* New: Allow the backorder stock status

= 3.48.2 =
* Tested with WordPress 5.2.1

= 3.48.1 =
* Fixed: Download limit and download expiry were set to 0 instead of unlimited and never respectively

= 3.48.0 =
* New: Import the product categories SEO meta data (meta description, meta title)

= 3.47.5 =
* Fixed: Wrong SKU for product attributes

= 3.47.4 =
* Fixed: The category URLs were not redirected if the default language in PrestaShop is not 1
* Tested with WordPress 5.1.1

= 3.47.3 =
* Fixed: The default language can be wrong if several shops are defined with a different default language

= 3.47.2 =
* Fixed: When running the import in cron, the categories were not assigned to the products
* Tested with WordPress 5.0.3

= 3.47.1 =
* Fixed: Some NGINX servers were blocking the images downloads
* Tested with WordPress 5.0.2

= 3.47.0 =
* New: Redirect the products URLs whose pattern is {slug}_{id}.html
* Tested with WordPress 5.0.1

= 3.46.0 =
* New: Redirect the product categories URLs whose pattern is {slug}_{id}

= 3.45.0 =
* Tested with WordPress 5.0

= 3.44.0 =
* New: Option to not import the product categories

= 3.43.1 =
* Fixed: Some NGINX servers were blocking the images downloads

= 3.43.0 =
* New: Generate the audio and video meta data (ID3 tag, featured image)
* Fixed: Notice: Trying to get property of non-object in woocommerce/includes/wc-attribute-functions.php on line 172

= 3.42.0 =
* New: Support the Bengali alphabet
* Fixed: Wrong products pagination with out of stock products

= 3.41.3 =
* Fixed: Some URLs were not redirected

= 3.41.2 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'p.reduction_tax' in 'field list'

= 3.41.1 =
* Fixed: Fatal error: "Uncaught Error: Call to a member function getTimestamp() on null" when downloading a downloadable product

= 3.41.0 =
* New: Import the images contained in the product short description
* Tested with WordPress 4.9.8

= 3.40.0 =
* New: Supports the SFTP connection. It requires the WP Filesystem SSH2 plugin https://www.fredericgilles.net/wp-filesystem-ssh2/

= 3.39.1 =
* Fixed: WordPress database error: [Cannot truncate a table referenced in a foreign key constraint (`wp_wc_download_log`, CONSTRAINT `fk_wc_download_log_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `wp_woocommerce_downloadable_product_permission)]

= 3.39.0 =
* New: Redirect the URLs containing parameters
* Tested with WordPress 4.9.7

= 3.38.1 =
* Fixed: [Cannot truncate a table referenced in a foreign key constraint (`wp_wc_download_log`, CONSTRAINT `fk_wc_download_log_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `wp_woocommerce_downloadable_product_permission)]

= 3.38.0 =
* New: Enable the product features translations

= 3.37.0 =
* New: Redirect the non friendly product category URLs
* New: Redirect the non friendly CMS URLs
* New: Redirect the non friendly CMS category URLs

= 3.36.1 =
* Fixed: Notice: Undefined index: id_category_default

= 3.36.0 =
* New: Import the product accessories as cross-sells or as up-sells
* Fixed: The tax amount was not displayed in the order item rows
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'p.id_specific_price_rule' in 'where clause' for PrestaShop 1.4
* Tested with WordPress 4.9.6

= 3.35.3 =
* Fixed: Wrong sale prices if many specific price rules are used

= 3.35.2 =
* Fixed: Wrong redirect from a category page to an attachment page if their slug is the same

= 3.35.1 =
* Fixed: Some variations were incomplete (due to the crc32() function that can return negative numbers)

= 3.35.0 =
* New: Support the Arabic language
* Tweak: Delete the wc_var_prices transient when cleaning the imported data
* Tested with WordPress 4.9.5

= 3.34.0 =
* New: Avoid duplicated SKU in the product attributes
* Tested with WordPress 4.9.2

= 3.33.0 =
* New: Add an option to not update the product prices (used for dropshipping)

= 3.32.0 =
* New: Ability to run the import automatically from the cron (for dropshipping for example)
* Fixed: Notice: Undefined index: id_category_default
* Tweak: Use WP_IMPORTING

= 3.31.0 =
* New: Add the fgp2wc_map_order_status filter

= 3.30.0 =
* New: Import the product primary categories

= 3.29.0 =
* New: Display the number of imported media
* Tested with WordPress 4.9.1

= 3.28.0 =
* New: Add some hooks for the Cost of Goods add-on

= 3.27.3 =
* Fixed: The passwords containing a backslash were not recognized
* Tested with WordPress 4.9

= 3.27.2 =
* Fixed: Some attributes were not assigned to products

= 3.27.1 =
* Fixed: The states (except for the USA) were imported as a code instead of as a text
* Tested with WordPress 4.8.3

= 3.27.0 =
* New: Import the products visibility

= 3.26.0 =
* Fixed: Wrong sale price if the reductions were applied after the tax (PrestaShop 1.6+)
* Tweak: Import the attribute public name to the WooCommerce attribute label and the attribute name to the WooCommerce attribute slug

= 3.25.0 =
* New: Use the attribute public name instead of the attribute name

= 3.24.0 =
* New: Add an option to import the product textures
* Tested with WordPress 4.8.2

= 3.23.0 =
* New: Allow HTML in term descriptions

= 3.22.1 =
* Fixed: Sales prices were not imported for multi countries stores with sales prices defined for all countries

= 3.22.0 =
* New: Add a button to update the existing products and orders
* New: Import the barcode (compatible with the WooCommerce Barcode ISBN plugin)
* New: Set the products as draft if they are not available for order

= 3.21.1 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'deleted' in 'where clause' (PrestaShop 1.3)
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'title' in 'field list' (PrestaShop 1.3)
* Tweak: code refactoring

= 3.21.0 =
* New: Add hooks for the Customer Groups add-on
* New: Check if we need the Customer Groups add-on

= 3.20.1 =
* Fixed: Wrong sale price for products with reduction prices defined for several countries

= 3.20.0 =
* Fixed: Security cross-site scripting (XSS) vulnerability in the Ajax importer

= 3.19.1 =
* Fixed: Wrong number of customers and employees displayed
* Tested with WordPress 4.8.1

= 3.19.0 =
* New: Import the image caption in the media attachment page

= 3.18.1 =
* Fixed: Some product features were not imported

= 3.18.0 =
* New: Authenticate the imported users by their email

= 3.17.0 =
* New: Authenticate users created on PrestaShop 1.7

= 3.16.0 =
* New: Block the import if the URL field is empty and if the media are not skipped
* New: Add error messages and information

= 3.15.1 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'p.id_product_attribute' in 'field list'

= 3.15.0 =
* New: Add the percentage in the progress bar
* New: Display the progress and the log when returning to the import page
* Change: Restyling the progress bar
* Fixed: Typo - replace "complete" by "completed"
* Tested with WordPress 4.8

= 3.14.1 =
* Fixed: Users not imported from PrestaShop 1.2: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'c.deleted' in 'where clause'

= 3.14.0 =
* New: Compatibility with PrestaShop 1.0

= 3.13.0 =
* New: Import the mobile phone. If the mobile phone is empty, import the home phone.
* Tested with WordPress 4.7.5

= 3.12.0 =
* New: Add a choice to import either the thumbnail product images or the full size product images
* Fixed: the FTP connection always failed

= 3.11.5 =
* Fixed: Notice: Undefined index: hostname
* New: Display an error message if the database contains downloadable products and the FTP connection is invalid
* Tested with WordPress 4.7.4

= 3.11.4 =
* Fixed: Fatal error: Cannot use object of type WP_Term as array

= 3.11.3 =
* Fixed: the prices were all on sale when importing the prices with tax

= 3.11.2 =
* Fixed: The specific reduction start date and end date were not imported for each variation

= 3.11.1 =
* Fixed: A specific price for only a variation was imported for all the product variations

= 3.11.0 =
* New: Remove accents in the file names
* New: Import the specific prices for PrestaShop versions 1.4 and more
* New: Import the attributes translations (with the WPML add-on)

= 3.10.2 =
* Fixed: Import hangs if some CMS articles have no content

= 3.10.1 =
* Fixed: The reviews were not imported in the main language

= 3.10.0 =
* Fixed: The downloadable products files were not imported from PrestaShop 1.3 and 1.4
* Tweak: Clear WooCommerce transients when emptying WordPress content

= 3.9.0 =
* New: Test if we need the Brands add-on
* New: Test if we need the WPML add-on
* Tested with WordPress 4.7.3

= 3.8.2 =
* Fixed: Stock not imported when using multishops

= 3.8.1 =
* Fixed: Term meta data not deleted when we delete the imported data only

= 3.8.0 =
* New: Display the number of products categories and CMS categories found in PrestaShop
* Fixed: The categories with duplicate names were not imported

= 3.7.4 =
* Fixed: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'p.reduction_price' in 'field list'

= 3.7.3 =
* Fixed: Images with Hebraic characters or encoded characters were not imported

= 3.7.2 =
* Fixed: Rounding error when importing with tax included

= 3.7.1 =
* Fixed: PrestaShop 1.4 products not imported

= 3.7.0 =
* New: Import the variations weights
* Tested with WordPress 4.7.2

= 3.6.4 =
* Fixed: Some menus were not imported
* Fixed: Memory exhausted when importing the sub-menus
* Tweak: Menus import speed improvement

= 3.6.3 =
* Fixed: The positive attribute values were not imported if negative attribute values were existing with the same absolute values
* Fixed: The attributes and attribute values were imported unordered
* Fixed: Progress bar doesn't reach 100%
* Tweak: Code refactoring

= 3.6.2 =
* Fixed: Existing images attached to imported products were removed when deleting the imported data
* Tested with WordPress 4.7

= 3.6.1 =
* Fixed: Some images with Greek characters were not imported

= 3.6.0 =
* New: Import the PrestaShop menus

= 3.5.0 =
* New: Compatibility with PrestaShop 1.7

= 3.4.0 =
* New: Import the reduced prices from PrestaShop 1.1, 1.2 and 1.3
* Fixed: "Notice: Object of class WP_Error could not be converted to int" when WooCommerce is not activated
* Fixed: Wrong progress bar color

= 3.3.2 =
* Fixed: Wrong product variations images imported

= 3.3.1 =
* Fixed: The progress bar didn't move during the first import
* Fixed: The log window was empty during the first import

= 3.3.0 =
* New: Optimization: don't reimport the images that were already imported
* New: Add an option to use the product texture as the featured image
* Fixed: Images of product variations duplicated in the media library

= 3.2.2 =
* Fixed: The "IMPORT COMPLETE" message was still displayed when the import was run again

= 3.2.1 =
* Fixed: Database passwords containing "<" were not accepted

= 3.2.0 =
* New: Code refactoring to enable the manufacturers translations

= 3.1.1 =
* Fixed: PrestaShop 1.5 compatibility issue: [ERROR] Error:SQLSTATE[42S02]: Base table or view not found: 1146 Table 'ps_product_comment' doesn't exist
* Fixed: PrestaShop 1.4 compatibility issue: [ERROR] Error:SQLSTATE[42S22]: Column not found: 1054 Unknown column 'cl.id_shop' in 'on clause'

= 3.1.0 =
* New: Authorize the connections to Web sites that use invalid SSL certificates
* Fixed: Duplicated products when PrestaShop contains more than one shop
* Fixed: Duplicated product variations when PrestaShop contains more than one shop
* Fixed: Some vouchers were not imported. Error: Column 'post_excerpt' cannot be null
* Tweak: If the import is blocked, stop sending AJAX requests

= 3.0.0 =
* New: Run the import in AJAX
* New: Add a progress bar
* New: Add a logger frame to see the logs in real time
* New: Ability to stop the import
* New: Compatible with PHP 7

= 2.8.1 =
* Tweak: Remove the accents from the image filenames because that could generate problems on some hosts

= 2.8.0 =
* New: Option to delete only the new imported data
* Fixed: Review link broken
* Fixed: Warning: Invalid argument supplied for foreach()

= 2.7.3 =
* Fixed: Notice: Undefined offset
* Fixed: Wrong number of comments displayed
* Tested with WordPress 4.6.1

= 2.7.2 =
* Tested with WordPress 4.6

= 2.7.1 =
* Fixed: Store the downloads in the protected woocommerce_uploads directory

= 2.7.0 =
* New: Import the vouchers restricted to categories
* New: Display the downloads in the user downloads section
* New: Display the download links in the user orders history
* Fixed: The download link was missing in the email and in the thank you page
* Fixed: Extra message displayed when testing the FTP connection

= 2.6.4 =
* Fixed: Warning: call_user_func_array() expects parameter 1 to be a valid callback, class 'fgp2wcp_users_authenticate' not found, when authenticating a user the first time with his PrestaShop password

= 2.6.3 =
* Fixed: Allow bad characters like "²" in the attribute names

= 2.6.2 =
* Tweak: Increase the speed of counting the terms

= 2.6.1 =
* Tweak: Replace spaces by dashes because images with spaces are not displayed on iPhones
* Tested with WordPress 4.5.3

= 2.6.0 =
* New: Compatible with WooCommerce 2.6.0
* New: Remove the Donate button

= 2.5.1 =
* Fixed: Invalid characters in the images filenames prevent these images to upload

= 2.5.0 =
* New: Accept the Hebrew characters in the file names
* Tested with WordPress 4.5.2

= 2.4.2 =
* Fixed: Add total_sales, _downloadable and _virtual postmetas to be compatible with the Avada theme

= 2.4.1 =
* Fixed: Notice: Undefined index: id_cms
* Tested with WordPress 4.5

= 2.4.0 =
* New: Don't import the Root category
* Fixed: Undefined index: is_virtual

= 2.3.1 =
* Fixed: Column 'post_content' cannot be null

= 2.3.0 =
* New: Import the virtual and downloadable products
* New: Add a FTP connection box used for the downloadable products
* Tweak: Code refactoring

= 2.2.1 =
* Tested with WordPress 4.4.2

= 2.2.0 =
* New: Compatibility with the WooCommerce Layered Nav widget

= 2.1.1 =
* Tested with WordPress 4.4.1

= 2.1.0 =
* New: Import the location field as a product attribute

= 2.0.0 =
* Tweak: Restructure the whole code using the BoilerPlate foundation

= 1.24.2 =
* Fixed: Fatal error: Call to undefined function add_term_meta()

= 1.24.1 =
* Fixed: Wrong parent categories assigned
* Fixed: Categories with null description were not imported

= 1.24.0 =
* New: Add the option to not import the attributes
* Tweak: Use the WordPress 4.4 term metas

= 1.23.4 =
* Tested with WordPress 4.4

= 1.23.3 =
* New: Support the attributes with Greek characters
* Fixed: Don't round the variation prices

= 1.23.2 =
* Fixed: The Manage stock checkbox was always checked in the variations

= 1.23.1 =
* Fixed: The stock status was not imported in the variations

= 1.23.0 =
* New: Option to enable/disable the stock management

= 1.22.0 =
* New: Option to import the EAN13 as the SKU

= 1.21.0 =
* New: Import filenames with Greek characters
* New: Add a link to the FAQ in the connection error message
* Fixed: Notice: Undefined index: country

= 1.20.0 =
* New: Add an Import link on the plugins list page

= 1.19.2 =
* Fixed: Error: unknown column s.name

= 1.19.1 =
* New: Redirect category URLs with "99-slug" or "slug-99" pattern

= 1.19.0 =
* New: Redirect URLs with -99.html pattern

= 1.18.0 =
* Tweak: code optimization
* New add-on: WPML to import the translations

= 1.17.5 =
* Tested with PrestaShop 1.2

= 1.17.4 =
* Fixed: Plugin can't activate on HHVM. Fatal error: Switch statements may only contain one default: clause
* Tested on HHVM

= 1.17.3 =
* Tested with WordPress 4.3.1

= 1.17.2 =
* New: Import the meta title, meta description and meta keywords of the products

= 1.17.1 =
* New: Reset the wp_users autoincrement
* Fixed: Cache issue with the product categories
* Fixed: Prevent the change password email to be sent when the users log in for the first time

= 1.17.0 =
* New: Make the link between the order item and its variation
* Fixed: Some medias with accents were not imported
* Tested with WordPress 4.3

= 1.16.6 =
* Tested with WordPress 4.2.4

= 1.16.5 =
* Fixed: Item price was wrong in the order when the quantity was not 1 (on PrestaShop 1.4)

= 1.16.4 =
* Tested with WordPress 4.2.3

= 1.16.3 =
* Fixed: Attributes were imported with a wrong language
* Fixed: Attributes not assigned correctly to the products

= 1.16.2 =
* Fixed: Orders were all imported as pending in PrestaShop 1.4 and less
* Tweak: Improve the method of importing users

= 1.16.1 =
* Fixed: Accept the filenames with Cyrillic characters

= 1.16.0 =
* New: Compatible with PrestaShop 1.1
* Tested with WordPress 4.2.2

= 1.15.0 =
* New: Import the product attributes textures
* Fixed: Product attribute names longer than 29 characters were lost when saving the product

= 1.14.1 =
* Fixed: Orders were not imported

= 1.14.0 =
* Fixed: Notice: Undefined offset
* Fixed: Duplicated attributes images
* New: Import the images at the thickbox size instead of the original size
* Tested with WordPress 4.2

= 1.13.0 =
* New: Import the product attribute images
* Fixed: Don't import twice the same medias

= 1.12.1 =
* Fixed: Wrong hook used after product insert (fgp2wc_post_insert_product and not fgp2wc_post_insert_post)

= 1.12.0 =
* Fixed: The product variations were duplicated when the import was run twice
New add-on: Brands to import the PrestaShop manufacturers as WooCommerce brands

= 1.11.0 =
* New: Create variation SKU using product SKU and attribute value
* Fixed: Change the default database prefix to ps_
* FAQ updated

= 1.10.1 =
* Fixed: Wrong images imported when the image legends are not unique

= 1.10.0 =
* New: Log the messages to wp-content/debug.log
* FAQ updated

= 1.9.1 =
* New: Test the presence of WooCommerce before importing
* Tested with WordPress 4.1.1

= 1.9.0 =
* Fixed: Duplicate products when using more than one shop (PrestaShop 1.5+)
* Fixed: Wrong categories assigned to products when there are category slugs duplicates
* Fixed: The variable products were always tax excluded
* Fixed: the prestashop_query() function was returning only one row
* FAQ updated

= 1.8.2 =
* Fixed: Some images were imported as question marks
* Fixed: Wrong storage directory for the images without a date

= 1.8.1 =
* Tweak: Optimize the speed of images transfer. Don't try to guess the images location for each image.
* Fixed: The products count didn't include the inactive products
* Fixed: Notice: register_taxonomy was called incorrectly. Taxonomies cannot exceed 32 characters in length

= 1.8.0 =
* New: Compatible with PrestaShop 1.3

= 1.7.0 =
* New: Import the quantities at variations level
* Tested with WordPress 4.1

= 1.6.0 =
* New: SEO: Redirect to the product or category even if the ID is not in the URL
* Tweak: Don't display the timeout field if the medias are skipped

= 1.5.1 =
* Fixed: Fatal error: Cannot use object of type WP_Error as array
* FAQ updated
* Tested with WordPress 4.0.1

= 1.5.0 =
* New: Import the discounts/vouchers (cart rules)

= 1.4.0 =
* New: Import the product ratings & reviews
* Fixed: WordPress database error: [Duplicate entry 'xxx-yyy' for key 'PRIMARY']

= 1.3.1 =
* Fixed: Some images were not imported on PrestaShop 1.4

= 1.3.0 =
* Fixed: Set the products with a null quantity as "Out of stock"
* New: Import the product features
* New: Import the product supplier reference as SKU if the product reference is empty
* New: Import the product attribute supplier reference as SKU if the product attribute reference is empty

= 1.2.0 =
* New: Import the product combinations (attributes and variations)
* Fixed: Some images were not imported

= 1.1.2 =
* Fixed: URLs were not redirected when using FastCGI (http://php.net/manual/fr/function.filter-input.php#77307)

= 1.1.1 =
* Fixed: The order statuses were always pending (PrestaShop 1.4)

= 1.1.0 =
* Compatible with WooCommerce 2.2
* New: Import PrestaShop employees, customers and orders
* New: The employees and customers can authenticate to WordPress using their PrestaShop passwords
* New: SEO: Redirect the PrestaShop URLs
* New: SEO: Import meta data to WordPress SEO
* New: Ability to do a partial import

= 1.0.0 =
* Initial version: Import PrestaShop products, categories, tags, images and CMS
