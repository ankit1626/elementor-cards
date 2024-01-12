<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ankitparekh.in
 * @since      1.0.0
 *
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/includes
 * @author     Ankit Parekh <ankitparekh96.ap@gmail.com>
 */
class Elementor_Cards_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'elementor-cards',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
