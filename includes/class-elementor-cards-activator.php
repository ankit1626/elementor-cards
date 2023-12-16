<?php

/**
 * Fired during plugin activation
 *
 * @link       https://ankitparekh.dv
 * @since      1.0.0
 *
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/includes
 * @author     Ankit Parekh <ankitparekh96.ap@gmail.com>
 */
class Elementor_Cards_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( ! is_plugin_active( 'elementor/elementor.php' ) ) {
			wp_die( __( 'Please install and Activate Elementor.', 'elementor-cards' ), 'Plugin dependency check', array( 'back_link' => true ) );
		}
	}
}
