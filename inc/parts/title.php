<?php
/**
 * The template used to load the <title> data in header*.php
 * With various configurations possibly needed for SEO, we put
 * it here to make it simple to change only the title without
 * maintaining an entirely separate header in a child theme.
 *
 * @package Alien Ship
 * @since Alien Ship 0.70
 */
?>
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'alienship' ), max( $paged, $page ) );

  ?></title>