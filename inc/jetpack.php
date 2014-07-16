<?php
/**
 * Jetpack Related Features
 *
 * @package Alien Ship
 * @since 1.0.1
 */

/**
 * Add theme support for Infinite Scroll.
 * @see http://jetpack.me/support/infinite-scroll/
 */

add_theme_support( 'infinite-scroll', array(
	'container' => 'main',
	'footer'    => false,
	'render'    => 'alienship_infinite_scroll_init',
) );



/**
 * Loop for Infinite Scroll
 */
function alienship_infinite_scroll_init() {
	while ( have_posts() ) :
		the_post();
		get_template_part( '/templates/parts/content', get_post_format() );
	endwhile;
}