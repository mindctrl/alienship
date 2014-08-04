<?php
/**
 * Load Bootstrap javascript modules
 *
 * @package Alien Ship
 * @since 0.1
 */
function alienship_bootstrap_js_loader() {

	$alienship = wp_get_theme();

	/**
	 * Load the theme scripts
	 * If we're on the local environment or WP_DEBUG is enabled, load unminified versions
	 */
	if( 'true' == WP_DEBUG || 'true' == WP_LOCAL_DEV || 'true' == SCRIPT_DEBUG ) :

		wp_enqueue_script(
			'scripts',
			alienship_locate_template_uri( 'assets/js/scripts.js' ),
			array( 'jquery' ),
			$alienship['Version'],
			true
		);

	else :

		wp_enqueue_script(
			'scripts',
			alienship_locate_template_uri( 'assets/js/scripts.min.js' ),
			array( 'jquery' ),
			$alienship['Version'],
			true
		);

	endif;


	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'alienship_bootstrap_js_loader' );
