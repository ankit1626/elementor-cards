<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ankitparekh.in
 * @since      1.0.0
 *
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Elementor_Cards
 * @subpackage Elementor_Cards/public
 * @author     Ankit Parekh <ankitparekh96.ap@gmail.com>
 */
class Elementor_Cards_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
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
		 * defined in Elementor_Cards_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elementor_Cards_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-css', plugin_dir_url( __FILE__ ) . 'css/elementor-cards-public.css', array( 'bootstrap-css' ), $this->version, 'all' );
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
		 * defined in Elementor_Cards_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elementor_Cards_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/elementor-cards-public.js', array( 'jquery' ), $this->version, false );
	}
	/** This function check dependenncies */
	public function check_dependencies() {
		if ( ! is_plugin_active( 'elementor/elementor.php' ) ) {
			deactivate_plugins( 'elementor-cards/elementor-cards.php' );
		}
	}
}
