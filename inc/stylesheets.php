<?php
/**
 * Register and enqueue the front end CSS
 *
 * @package Alien Ship
 * @since 1.0
 */


// Load frontend theme styles
function alienship_theme_styles() {

	$alienship = wp_get_theme();

	// Load core Bootstrap CSS
	wp_enqueue_style( 'bootstrap', alienship_locate_template_uri( 'css/bootstrap.min.css' ), array(), $alienship['Version'], 'all' );

	/* Load theme styles */
	wp_enqueue_style( 'alienship-style', get_stylesheet_uri(), array( 'bootstrap' ), $alienship['Version'], 'all' );
}
add_action( 'wp_enqueue_scripts', 'alienship_theme_styles' );



// Load admin styles
function alienship_admin_styles() {

	wp_enqueue_style( 'alienship-admin-style', alienship_locate_template_uri( 'css/admin.css' ), array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'alienship_admin_styles' );