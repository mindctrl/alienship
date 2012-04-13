<?php
/** Load Bootstrap javascript modules
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
function alienship_bootstrap_js_loader() {
  // Core Bootstrap plugins
  // wp_enqueue_script('prettify.js', get_template_directory_uri().'/js/prettify.js', array('jquery'),'1.0', true );

  if ( of_get_option('alienship_transitions_plugin',1) ) {
    wp_enqueue_script('transition.js', get_template_directory_uri().'/js/bootstrap-transition.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_alerts_plugin',1) ) {
    wp_enqueue_script('alert.js', get_template_directory_uri().'/js/bootstrap-alert.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_modals_plugin',1) ) {
    wp_enqueue_script('modal.js', get_template_directory_uri().'/js/bootstrap-modal.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_dropdowns_plugin',1) ) {
    wp_enqueue_script('dropdown.js', get_template_directory_uri().'/js/bootstrap-dropdown.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_scrollspy_plugin') ) {
    wp_enqueue_script('scrollspy.js', get_template_directory_uri().'/js/bootstrap-scrollspy.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_tabs_plugin',1) ) {
    wp_enqueue_script('tab.js', get_template_directory_uri().'/js/bootstrap-tab.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_tooltips_plugin',1) ) {
    wp_enqueue_script('tooltip.js', get_template_directory_uri().'/js/bootstrap-tooltip.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_popovers_plugin',1) ) {
    wp_enqueue_script('popover.js', get_template_directory_uri().'/js/bootstrap-popover.js', array('tooltip.js'),'2.02', true );
  }

  if ( of_get_option('alienship_buttons_plugin',1) ) {
    wp_enqueue_script('button.js', get_template_directory_uri().'/js/bootstrap-button.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_collapse_plugin',1) ) {
    wp_enqueue_script('collapse.js', get_template_directory_uri().'/js/bootstrap-collapse.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_carousel_plugin',1) ) {
    wp_enqueue_script('carousel.js', get_template_directory_uri().'/js/bootstrap-carousel.js', array('jquery'),'2.02', true );
  }

  if ( of_get_option('alienship_typeahead_plugin') ) {
    wp_enqueue_script('typeahead.js', get_template_directory_uri().'/js/bootstrap-typeahead.js', array('jquery'),'2.02', true );
  }

  wp_enqueue_script('alienship_page-links.js', get_template_directory_uri().'/js/alienship_page-links.js', array('jquery'),'1.0', true);
  
}
add_action('wp_enqueue_scripts', 'alienship_bootstrap_js_loader');

/* Add toggles to dropdown menus. - Currently disabled. Using custom walker instead. */
/* function bootstrap_dropdown_helper() {
  wp_enqueue_script('alienship_dropdown-toggle.js', get_template_directory_uri().'/js/alienship_dropdown-toggle.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'bootstrap_dropdown_helper'); */
