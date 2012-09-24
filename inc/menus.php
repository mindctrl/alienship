<?php
/**
 * Register the navigation menus. This theme uses wp_nav_menu() in three locations.
 */
 register_nav_menus( array(
   'top'    => __( 'Top Menu', 'alienship' ),
   'main'   => __( 'Main Menu', 'alienship' ),
   'bottom' => __( 'Bottom Menu', 'alienship' )
 ) );


/* Custom Walker for Top and Main menus */
class alienship_Navbar_Nav_Walker extends Walker_Nav_Menu {

  public $dropdown_enqueued;

  /**
   * Check if required script queued.
   */
  function __construct() {

    $this->dropdown_enqueued = wp_script_is( 'bootstrap-dropdown', 'queue' );
  }

  /**
   * Adjust classes for individual menu items.
   */
  function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

    if ( $element->current )
      $element->classes[] = 'active';

    $element->is_dropdown = ! empty( $children_elements[$element->ID] );

    if ( $element->is_dropdown ) {

      if( 0 == $depth  )
        $element->classes[] = 'dropdown';
      elseif( 1 == $depth )
        $element->classes[] = 'dropdown-submenu';
    }

    parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

  /**
   * Enqueue script and set class for list.
   */
  function start_lvl( &$output, $depth ) {

    if ( ! $this->dropdown_enqueued ) {
      wp_enqueue_script( 'bootstrap-dropdown' );
      $this->dropdown_enqueued = true;
    }

    $indent  = str_repeat( "\t", $depth );
    $class   = ( $depth < 2 ) ? 'dropdown-menu' : 'unstyled';
    $output .= "\n{$indent}<ul class='{$class}'>\n";
  }

  /**
   * Adjust markup for top level dropdown menu item.
   */
  function start_el( &$output, $item, $depth, $args ) {

    $item_html = '';
    parent::start_el( $item_html, $item, $depth, $args );

    if ( $item->is_dropdown && ( 0 == $depth ) ) {
      $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
      $item_html = str_replace( '</a>', '<b class="caret"></b></a>', $item_html );
      $item_html = str_replace( esc_attr( $item->url ), '#', $item_html );
    }

    $output .= $item_html;
  }
}