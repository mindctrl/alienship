<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Alien Ship
 */

/**
 * We don't need to self-close these tags in html5: <img>, <input>
 */
function alienship_remove_self_closing_tags( $input ) {

	return str_replace(' />', '>', $input);
}
add_filter( 'get_avatar', 'alienship_remove_self_closing_tags' );
add_filter( 'comment_id_fields', 'alienship_remove_self_closing_tags' );
add_filter( 'post_thumbnail_html', 'alienship_remove_self_closing_tags' );



/**
 * Style comment reply links as buttons
 */
function alienship_comment_reply_link( $link ) {

	return str_replace( 'comment-reply-link', 'btn btn-default btn-xs', $link );
}
add_filter( 'comment_reply_link', 'alienship_comment_reply_link' );


/**
 * Style the excerpt continuation
 */
function alienship_excerpt_more( $more ) {

	return ' ... <a href="'. get_permalink( get_the_ID() ) . '">'. __( 'Continue Reading ', 'alienship' ) .' &raquo;</a>';
}
add_filter('excerpt_more', 'alienship_excerpt_more');



/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function alienship_enhanced_image_navigation( $url, $id ) {

	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'alienship_enhanced_image_navigation', 10, 2 );



/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function alienship_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'alienship_setup_author' );



/**
 * Adds the page name to the body class.
 * Used for targeting CSS.
 */
function alienship_body_class( $classes ) {

	if( ! is_page() )
		return $classes;

	global $post;
	$classes[] = $post->post_name;
	return $classes;
}
add_filter( 'body_class', 'alienship_body_class' );



/**
 * Removes theme layout support from certain content types.
 */
function alienship_remove_theme_layout_support() {

	// Remove theme layout support from certain post types
	remove_post_type_support( 'attachment', 'theme-layouts' );
	remove_post_type_support( 'page', 'theme-layouts' );
}
add_action( 'init', 'alienship_remove_theme_layout_support', 11 );
