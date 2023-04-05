<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://robecorp.org
 * @since      1.0.0
 *
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Item_Customizer_To_Sell
 * @subpackage Item_Customizer_To_Sell/public
 * @author     Roberto Lopez <robelp1095@gmail.com>
 */
class Item_Customizer_To_Sell_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Item_Customizer_To_Sell_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Item_Customizer_To_Sell_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/item-customizer-to-sell-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Item_Customizer_To_Sell_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Item_Customizer_To_Sell_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/item-customizer-to-sell-public.js', array( 'jquery' ), $this->version, false );
        $this->icts_insert_js();
	}

    private function icts_insert_js(){

        if (!is_home()) return;

//        wp_register_script('dcms_miscript',get_stylesheet_directory_uri(). '/js/script.js', array('jquery'), '1', true );
//        wp_enqueue_script('dcms_miscript');

//        wp_localize_script('dcms_miscript','dcms_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
        wp_localize_script($this->plugin_name,'icts_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
    }

    function icts_send_image_url()
    {
        $array = $_POST['array'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'image_element';
        $sql = "SELECT * FROM $table_name WHERE image_id IN (SELECT image_id FROM $table_name WHERE element_id IN ($element_id) AND pos IN ($pos)) AND element_id IN ($element_id) AND pos IN ($pos)";
        $result = $wpdb->get_results($sql);
        return $result;
    }

}
