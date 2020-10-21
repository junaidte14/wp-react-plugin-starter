<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Codowpcalendar
 * @subpackage Codowpcalendar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Codowpcalendar
 * @subpackage Codowpcalendar/admin
 * @author     Junaid Hassan <#>
 */
class Codowpcalendar_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codowpcalendar-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'codowpcal-script', plugin_dir_url( __FILE__ ) . '../dist/bundle.js', array('jquery','wp-element'), $this->version );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codowpcalendar-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function codowpcal_admin_menu(){
		add_options_page(
			__( 'CODO WP Calendar', CODOWPCALENDAR_NAME ),
			__( 'CODO WP Calendar', CODOWPCALENDAR_NAME ),
			'manage_options',
			CODOWPCALENDAR_NAME,
			array($this, 'display_codowpcal_admin_page')
		);
	}

	public function display_codowpcal_admin_page(){
		?>
		<h1>Welcome..!</h1><br />
		<div id="root"></div>
		<?php
	}

}
