<?php
/**
 * Load Bootstrap javascript modules
 *
 * @package Alien Ship
 * @since 0.1
 */
function alienship_bootstrap_js_loader() {

	// Bootstrap JS components - Drop a custom build in your child theme 'js' folder to override this one.
	wp_enqueue_script( 'bootstrap.js', alienship_locate_template_uri( 'js/bootstrap.min.js' ), array( 'jquery' ), '3.0.0-wip', true );

	// Post pagination links helper script for adding 'active' class to current page
	wp_enqueue_script('alienship_page-links.js', alienship_locate_template_uri( 'js/alienship_page-links.js' ), array('jquery'),'1.0', true);
}
add_action('wp_enqueue_scripts', 'alienship_bootstrap_js_loader');