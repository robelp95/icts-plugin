<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://robecorp.org
 * @since      1.0.0
 *
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 * @author     Roberto Lopez <robelp1095@gmail.com>
 */
class Item_Customizer_To_Sell_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	    Item_Customizer_To_Sell_Deactivator::dropTableElement();
        Item_Customizer_To_Sell_Deactivator::dropTableImage();
        Item_Customizer_To_Sell_Deactivator::dropTableImageElement();

	}

	public static function dropTableElement(){
	            global $wpdb;
        $table_name = $wpdb->prefix . 'element';
        $sql = "DROP TABLE $table_name";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public static function dropTableImage(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'image';
        $sql = "DROP TABLE $table_name";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public static function dropTableImageElement(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'image_element';
        $sql = "DROP TABLE $table_name";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
