<?php
/**
 * Register the navigation menus. This theme uses wp_nav_menu() in three locations.
 */
register_nav_menus( array(
	'top'           => __( 'Top Menu', 'alienship' ),
	'main'          => __( 'Main Menu', 'alienship' ),
	'bottom'        => __( 'Bottom Menu', 'alienship' )
) );
