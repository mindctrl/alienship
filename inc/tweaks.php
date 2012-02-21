<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */


/*  @since Alien Ship 0.3
 * We don't need to self-close these tags in html5: <img>, <input> */
function alienship_remove_self_closing_tags($input) {
  return str_replace(' />', '>', $input);
}
add_filter('get_avatar', 'alienship_remove_self_closing_tags');
add_filter('comment_id_fields', 'alienship_remove_self_closing_tags');
add_filter('post_thumbnail_html', 'alienship_remove_self_closing_tags');

/* Uncomment the following line to disable admin bar display on front end for all users. */
// add_filter('show_admin_bar', '__return_false');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Alien Ship 0.1
 */
/* function alienship_body_classes( $classes ) {
	// If this isn't a post or a page we'll add the convenient .indexed class
	if ( ! is_singular() ) {
		$classes[] = 'indexed';
	}
	// Adds a class of single-author to blogs with only 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'alienship_body_classes' );
*/
/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Alien Ship 0.1
 */
/* function alienship_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'alienship_enhanced_image_navigation', 10, 2 ); */