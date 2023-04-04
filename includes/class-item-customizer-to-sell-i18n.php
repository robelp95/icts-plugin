<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://robecorp.org
 * @since      1.0.0
 *
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 * @author     Roberto Lopez <robelp1095@gmail.com>
 */
class Item_Customizer_To_Sell_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'item-customizer-to-sell',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
