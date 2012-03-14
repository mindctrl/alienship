<?php
/** 
 * Register widgetized area and update sidebar with default widgets
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
if ( ! function_exists( 'alienship_widgets_init' ) ):
function alienship_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'alienship' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Hero Widgets', 'alienship' ),
		'id' => 'herowidgets-1',
		'before_widget' => '<div class="span4">',
		'after_widget' => "</div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'alienship' ),
		'id' => 'footer-1',
		'before_widget' => '<div class="span4">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'alienship_widgets_init' );
endif;