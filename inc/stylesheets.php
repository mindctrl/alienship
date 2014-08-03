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

	/**
	 * Load the theme styles.
	 * If we're on the local environment or WP_DEBUG is enabled, load unminified version
	 */
	if( 'true' == WP_DEBUG || 'true' == WP_LOCAL_DEV ) {
		wp_enqueue_style( 'alienship-style', get_stylesheet_uri(), array(), $alienship['Version'], 'all' );

	} else {
		wp_enqueue_style( 'alienship-style', alienship_locate_template_uri( 'style.min.css' ), array(), $alienship['Version'], 'all' );

	}

}
add_action( 'wp_enqueue_scripts', 'alienship_theme_styles' );
