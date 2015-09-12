<?php
/**
 * Register widgetized areas and widgets
 *
 * @package Alien Ship
 */
function alienship_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'alienship' ),
		'description'   => __( 'The main widget area displayed in the sidebar.', 'alienship' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Hero Widgets', 'alienship' ),
		'description'   => __( 'Displayed on pages created with the Hero template', 'alienship' ),
		'id'            => 'herowidgets-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Hero Widgets 2', 'alienship' ),
		'description'   => __( 'Displayed on pages created with the Hero template', 'alienship' ),
		'id'            => 'herowidgets-2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Hero Widgets 3', 'alienship' ),
		'description'   => __( 'Displayed on pages created with the Hero template', 'alienship' ),
		'id'            => 'herowidgets-3',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'alienship' ),
		'description'   => __( 'The footer widget area displayed after all content.', 'alienship' ),
		'id'            => 'footer-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'alienship' ),
		'description'   => __( 'The second footer widget area, displayed below the Footer widget area.', 'alienship' ),
		'id'            => 'footer-2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'alienship' ),
		'description'   => __( 'The third footer widget area, displayed below the Footer widget area.', 'alienship' ),
		'id'            => 'footer-3',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'alienship_widgets_init' );



/* Register Alien Ship widgets */
function alienship_register_widgets() {

	/* Load the stacked pills menu widget */
	locate_template( '/inc/widgets/widget-nav-stacked-pills-menu.php', true );

	/* Register the nav list menu widget */
	register_widget( 'Nav_Stacked_Pills_Menu_Widget' );

}
add_action( 'widgets_init', 'alienship_register_widgets' );
