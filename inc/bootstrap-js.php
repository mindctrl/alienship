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

	// Bootstrap helper script
	wp_enqueue_script('alienship-helper.js', alienship_locate_template_uri( 'js/alienship-helper.js' ), array('jquery'),'1.0', true);
}
add_action('wp_enqueue_scripts', 'alienship_bootstrap_js_loader');