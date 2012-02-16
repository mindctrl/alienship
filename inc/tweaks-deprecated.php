<?php
/* Deprecated functions */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Alien Ship 0.1
 */
/* function alienship_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'alienship_page_menu_args' ); */

/** Tweak menu output
 *  
 * @since Alien Ship 0.3
 */
/* Add <ul class="nav"> to first <ul> occurrence on wp_page_menu output 
function alienship_add_page_menu_class($ulclass) {
  return preg_replace('/<ul>/', '<ul class="nav">', $ulclass, 1);
}
add_filter('wp_page_menu','alienship_add_page_menu_class'); */

/* Replace class="children" with class="dropdown-menu" on wp_page_menu output 
function alienship_replace_page_menu_class($ulclass) {
  return preg_replace('/<ul class=\'children\'>/', '<ul class="dropdown-menu">', $ulclass);
}
add_filter('wp_page_menu','alienship_replace_page_menu_class'); */

/* Replace class="sub-menu" with class="dropdown-menu" on wp_nav_menu output 
function alienship_replace_wp_nav_menu_class($ulclass) {
  return preg_replace('/<ul class="sub-menu">/', '<ul class="dropdown-menu">', $ulclass);
}
add_filter('wp_nav_menu','alienship_replace_wp_nav_menu_class'); */


/* function alienship_nav_menu_args($args = '') {
  $args['container']  = false;
  $args['depth']      = 2;
  $args['items_wrap'] = '<ul class="nav">%3$s</ul>';
  if (!$args['walker']) {
    $args['walker'] = new alienship_Nav_Walker();
  }
  return $args;
}
add_filter('wp_nav_menu_args', 'alienship_nav_menu_args'); */


