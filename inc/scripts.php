<?php
/**
 * Loads the theme's javascript
 *
 * @package Alien Ship
 */
function alienship_js_loader() {

	$alienship = wp_get_theme();

	/**
	 * Load the theme scripts
	 * If we're on the local environment or WP_DEBUG is enabled, load unminified versions
	 */
	$script = ( 'true' == WP_DEBUG || 'true' == WP_LOCAL_DEV || 'true' == SCRIPT_DEBUG ) ? 'assets/js/scripts.js' : 'assets/js/scripts.min.js';

		wp_enqueue_script(
			'scripts',
			alienship_locate_template_uri( $script ),
			array( 'jquery' ),
			$alienship['Version'],
			true
		);

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Set some variables if we have featured content
	if( is_front_page() && alienship_has_featured_posts() ) {
		$featured_content = 'true';
	} else {
		$featured_content = 'false';
	}

	wp_localize_script( 'scripts', 'alienship_js_vars', array(
		'featured_content' => $featured_content
	) );
}
add_action( 'wp_enqueue_scripts', 'alienship_js_loader' );
