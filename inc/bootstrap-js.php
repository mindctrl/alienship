<?php
/**
 * Load Bootstrap javascript modules
 *
 * @package Alien Ship
 * @since 0.1
 */
function alienship_bootstrap_js_loader() {

	wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.0.0-wip', true );

/* @todo
   function alienship_enable_popovers() { ?>
	  <script type="text/javascript">
	  // Enable Bootstrap popover //
		jQuery(function() {
		  jQuery("a[rel=popover]")
		  .popover()
		  .click(function(e) {
		  e.preventDefault()
		  })
		});
	  </script>
	<?php } //alienship_enable_popovers
	add_action( 'wp_footer', 'alienship_enable_popovers' );
  }*/

	wp_enqueue_script('alienship_page-links.js', get_template_directory_uri().'/js/alienship_page-links.js', array('jquery'),'1.0', true);

}
add_action('wp_enqueue_scripts', 'alienship_bootstrap_js_loader');