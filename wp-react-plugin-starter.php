<?php

/**
 * @wordpress-plugin
 * Plugin Name:       wp-react-plugin-starter
 * Plugin URI:        https://codoplex.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Junaid Hassan
 * Author URI:        https://codoplex.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-react-plugin-starter
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Action to add menu in settings page.
add_action( 'admin_menu', 'codowpreact_admin_menu' );

/**
 * Function to add new menu in settings
 *
 * @since   1.0.0
 */
function codowpreact_admin_menu() {
	add_options_page(
		__( 'CODO WP REACT', 'codowpreact' ),
		__( 'CODO WP REACT', 'codowpreact' ),
		'manage_options',
		'codowpreact',
		'display_codowpreact_admin_page'
	);
}

/**
 * Callback function of Settings Page
 *
 * @since    1.0.0
 */
function display_codowpreact_admin_page() {
	?>
	<h1>Welcome to codowpreact! Following is the rendered REACT app.</h1><br />
    <div id="root"></div>
	<?php
}

// Action to add scripts to admin side.
add_action( 'admin_enqueue_scripts', 'codowpreact_enqueue_admin_scripts' );

/**
 * Function to add the scripts and styles to admin page.
 *
 * @since 1.0.0
 */
function codowpreact_enqueue_admin_scripts() {
	wp_enqueue_script( 'codowpreact-script', plugin_dir_url( __FILE__ ) . '/dist/bundle.js', array(
		'jquery',
		'wp-element'
	), '1.0.0' );
}