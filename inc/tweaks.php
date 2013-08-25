<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */



if ( ! function_exists( 'alienship_remove_self_closing_tags' ) ):
/**
 * We don't need to self-close these tags in html5: <img>, <input>
 * @since Alien Ship 0.3
 */
function alienship_remove_self_closing_tags( $input ) {

	return str_replace(' />', '>', $input);
}
add_filter( 'get_avatar', 'alienship_remove_self_closing_tags' );
add_filter( 'comment_id_fields', 'alienship_remove_self_closing_tags' );
add_filter( 'post_thumbnail_html', 'alienship_remove_self_closing_tags' );
endif;



if ( ! function_exists( 'alienship_comment_reply_link' ) ):
/**
 * Style comment reply links as buttons
 * @since 1.0
 */
function alienship_comment_reply_link( $link ) {

	return str_replace( 'comment-reply-link', 'btn btn-default btn-xs', $link );
}
add_filter( 'comment_reply_link', 'alienship_comment_reply_link' );
endif;



if ( ! function_exists( 'alienship_nice_search_redirect' ) ):
/**
 * Pretty search URL. Changes /?s=foo to /search/foo. http://txfx.net/wordpress-plugins/nice-search/
 * @since Alien Ship 0.3
 */
function alienship_nice_search_redirect() {

	if ( is_search() && get_option( 'permalink_structure' ) != '' && strpos( $_SERVER['REQUEST_URI'], '/wp-admin/' ) === false && strpos( $_SERVER['REQUEST_URI'], '/search/' ) === false ) {
		wp_redirect( home_url( '/search/' . str_replace( array( ' ', '%20' ),  array( '+', '+' ), get_query_var( 's' ) ) ) );
		exit();
	}
}
add_action( 'template_redirect', 'alienship_nice_search_redirect' );
endif;



if ( ! function_exists( 'alienship_search_query' ) ):
function alienship_search_query($escaped = true) {

	$query = apply_filters( 'alienship_search_query', get_query_var( 's' ) );
	if ($escaped) {
		$query = esc_attr($query);
	}
	return urldecode($query);
}
add_filter('get_search_query', 'alienship_search_query');
endif;



if ( ! function_exists( 'alienship_excerpt_more') ):
/*
 * Style the excerpt continuation
 */
function alienship_excerpt_more( $more ) {

	return ' ... <a href="'. get_permalink( get_the_ID() ) . '">'. __( 'Continue Reading ', 'alienship' ) .' &raquo;</a>';
}
add_filter('excerpt_more', 'alienship_excerpt_more');
endif;



/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Alien Ship 0.1
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