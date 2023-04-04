<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://robecorp.org
 * @since             1.0.0
 * @package           Item_Customizer_To_Sell
 *
 * @wordpress-plugin
 * Plugin Name:       Robe First Plugin
 * Plugin URI:        https://robecorp.org
 * Description:       This is a plugin to help the user customize the appearance of the item they decide to buy
 * Version:           1.0.0
 * Author:            Roberto Lopez
 * Author URI:        https://robecorp.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       item-customizer-to-sell
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ITEM_CUSTOMIZER_TO_SELL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-item-customizer-to-sell-activator.php
 */
function activate_item_customizer_to_sell() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-item-customizer-to-sell-activator.php';
	Item_Customizer_To_Sell_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-item-customizer-to-sell-deactivator.php
 */
function deactivate_item_customizer_to_sell() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-item-customizer-to-sell-deactivator.php';
	Item_Customizer_To_Sell_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_item_customizer_to_sell' );
register_deactivation_hook( __FILE__, 'deactivate_item_customizer_to_sell' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-item-customizer-to-sell.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_item_customizer_to_sell() {

	$plugin = new Item_Customizer_To_Sell();
	$plugin->run();

}
run_item_customizer_to_sell();
