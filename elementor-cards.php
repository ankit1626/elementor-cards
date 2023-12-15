<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ankitparekh.dv
 * @since             1.0.0
 * @package           Elementor_Cards
 *
 * @wordpress-plugin
 * Plugin Name:       Elementor Cards
 * Plugin URI:        https://example.com
 * Description:       A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.
 * Version:           1.0.0
 * Author:            Ankit Parekh
 * Author URI:        https://ankitparekh.dv/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elementor-cards
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
define( 'ELEMENTOR_CARDS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elementor-cards-activator.php
 */
function activate_elementor_cards() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-cards-activator.php';
	Elementor_Cards_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elementor-cards-deactivator.php
 */
function deactivate_elementor_cards() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-cards-deactivator.php';
	Elementor_Cards_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elementor_cards' );
register_deactivation_hook( __FILE__, 'deactivate_elementor_cards' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elementor-cards.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elementor_cards() {

	$plugin = new Elementor_Cards();
	$plugin->run();

}
run_elementor_cards();
