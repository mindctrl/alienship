<?php
/**
 * Register and enqueue the front end CSS
 *
 * @package Alien Ship
 * @since 1.0
 */


/* Load Bootstrap CSS */
function alienship_bootstrap_styles() {
    wp_enqueue_style( 'bootstrap', alienship_locate_template_uri( 'css/bootstrap.min.css' ), array(), '2.12', 'all' );

    if ( of_get_option( 'alienship_responsive', 1 ) ) {
        wp_enqueue_style( 'bootstrap-responsive', alienship_locate_template_uri( 'css/bootstrap-responsive.min.css' ), array( 'bootstrap' ), '2.12', 'all' );
    }

}
add_action( 'wp_enqueue_scripts', 'alienship_bootstrap_styles', 1 );



/* Load theme styles */
function alienship_theme_styles() {
    wp_enqueue_style( 'alienship-style', get_stylesheet_uri() );

    /* Check for custom.css and if it exists and we're not using a child theme, load it. */
    if ( file_exists( get_template_directory() . '/custom/custom.css' ) && !is_child_theme() ) {
        wp_enqueue_style( 'alienship-custom', alienship_locate_template_uri( 'custom/custom.css' ) );
    }

}
add_action( 'wp_enqueue_scripts', 'alienship_theme_styles', 2 );