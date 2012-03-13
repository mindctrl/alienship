<?php
/**
 * Alien Ship functions and definitions
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 * @since Alien Ship 0.1
 */
if ( ! isset( $content_width ) )
	$content_width = 940; /* pixels */


if ( ! function_exists( 'alienship_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 * @since Alien Ship 0.1
 */
function alienship_setup() {

	/* Custom template tags for this theme. */
	require_once locate_template('/inc/template-tags.php');

	/* Clean up header output */
	require_once locate_template('/inc/cleanup.php');

	/* Hooks */
	require_once locate_template('/inc/hooks.php');

	/* Register the navigation menus. */
	require_once locate_template('/inc/menus.php');

	/* Register sidebars */
  require_once locate_template('/inc/sidebars.php');

	/* Shortcodes */
	require_once locate_template('/inc/shortcodes.php');

	/* Custom functions that act independently of the theme templates */
	require_once locate_template('/inc/tweaks.php');

	/* Breadcrumbs */
	require_once locate_template('/inc/breadcrumbs.php');

	/* Load Bootstrap javascript */
  require_once locate_template('/inc/bootstrap-js.php');

  /* Load theme options framework */
  require_once locate_template('/inc/options-panel.php');

	/* WordPress.com-specific functions and definitions */
	//require_once locate_template('/inc/wpcom.php');

	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on alienship, use a find and replace
	 * to change 'alienship' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'alienship', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	
	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );


	/* Add support for post-thumbnails */
	add_theme_support('post-thumbnails');


	/* Add support for post formats. To be styled in later release. */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ));

}
endif; // alienship_setup
add_action( 'after_setup_theme', 'alienship_setup' );


/* Change footer text in admin dashboard */
if ( ! function_exists( 'alienship_change_admin_footer_content' ) ) {
  function alienship_change_admin_footer_content () {
    echo 'Copyright &copy ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.';
  }
}
add_filter('admin_footer_text', 'alienship_change_admin_footer_content');


/* Stop WordPress from adding those annoying closing paragraph tags */
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

// Uncomment the following section, or add it to your child theme's functions.php, to set a custom logo on the login page //
// Custom login logo for wp-admin screen //
//	function pic_custom_login_logo() {
//    	echo '<style type="text/css">
//        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/custom-logo.png) !important; }
//    	</style>';
//	}
// add_action('login_head', 'pic_custom_login_logo');