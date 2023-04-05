<?php

/**
 * Fired during plugin activation
 *
 * @link       https://robecorp.org
 * @since      1.0.0
 *
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/includes
 * @author     Roberto Lopez <robelp1095@gmail.com>
 */
class Item_Customizer_To_Sell_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
	    Item_Customizer_To_Sell_Activator::CreateTableElement();
	    Item_Customizer_To_Sell_Activator::CreateTableImage();
	    Item_Customizer_To_Sell_Activator::CreateTableImageElement();
	}

    private static function CreateTableElement(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'element';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        src varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    private static function CreateTableImage(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'image';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        src varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    private static function CreateTableImageElement(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'image_element';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        image_id mediumint(9) NOT NULL,
        element_id mediumint(9) NOT NULL,
        pos mediumint(9) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

}
