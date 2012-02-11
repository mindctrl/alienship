<?php
/** Load Bootstrap javascript modules
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
function bootstrap_js_loader() {
  // Core Bootstrap plugins
  wp_enqueue_script('prettify.js', get_template_directory_uri().'/js/prettify.js', array('jquery'),'1.0', true );
  wp_enqueue_script('transition.js', get_template_directory_uri().'/js/bootstrap-transition.js', array('jquery'),'1.0', true );
  wp_enqueue_script('alert.js', get_template_directory_uri().'/js/bootstrap-alert.js', array('jquery'),'1.0', true );
  wp_enqueue_script('modal.js', get_template_directory_uri().'/js/bootstrap-modal.js', array('jquery'),'1.0', true );
  wp_enqueue_script('dropdown.js', get_template_directory_uri().'/js/bootstrap-dropdown.js', array('jquery'),'1.0', true );
  wp_enqueue_script('scrollspy.js', get_template_directory_uri().'/js/bootstrap-scrollspy.js', array('jquery'),'1.0', true );
  wp_enqueue_script('tab.js', get_template_directory_uri().'/js/bootstrap-tab.js', array('jquery'),'1.0', true );
  wp_enqueue_script('tooltip.js', get_template_directory_uri().'/js/bootstrap-tooltip.js', array('jquery'),'1.0', true );
  wp_enqueue_script('popover.js', get_template_directory_uri().'/js/bootstrap-popover.js', array('tooltip.js'),'1.0', true );
  wp_enqueue_script('button.js', get_template_directory_uri().'/js/bootstrap-button.js', array('jquery'),'1.0', true );
  wp_enqueue_script('collapse.js', get_template_directory_uri().'/js/bootstrap-collapse.js', array('jquery'),'1.0', true );        
  wp_enqueue_script('carousel.js', get_template_directory_uri().'/js/bootstrap-carousel.js', array('jquery'),'1.0', true );    
  wp_enqueue_script('typeahead.js', get_template_directory_uri().'/js/bootstrap-typeahead.js', array('jquery'),'1.0', true );
}
add_action('wp_enqueue_scripts', 'bootstrap_js_loader');

function bootstrap_dropdown_helper() {
  // Add toggles to dropdown menus.
  wp_enqueue_script('alienship_dropdown-toggle.js', get_template_directory_uri().'/js/alienship_dropdown-toggle.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'bootstrap_dropdown_helper');