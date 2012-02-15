<?php
/**
 * Alien Ship functions and definitions
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Alien Ship 0.1
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'alienship_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Alien Ship 0.1
 */
function alienship_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Shortcodes
	 */
	require( get_template_directory() . '/inc/shortcodes.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Breadcrumbs
	 */
	require( get_template_directory() . '/inc/breadcrumbs.php');

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

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

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Register the navigation menus.
	 */
	 require( get_template_directory() .'/inc/menus.php' );

	/** 
   * Register sidebars
   */
   require( get_template_directory() .'/inc/sidebars.php' );

  /** 
   * Load Bootstrap javascript
   */
   require( get_template_directory() .'/inc/bootstrap-js.php');


	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // alienship_setup
add_action( 'after_setup_theme', 'alienship_setup' );



if ( ! function_exists( 'alienship_change_admin_footer_content' ) ) {
/**
 * Change footer text in admin dashboard
 */
  function alienship_change_admin_footer_content () {
    echo 'Copyright &copy ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.';
  }
}
add_filter('admin_footer_text', 'alienship_change_admin_footer_content');


// Uncomment the following section, or add it to your child theme's functions.php, to set a custom logo on the login page //
// Custom login logo for wp-admin screen //
//	function pic_custom_login_logo() {
//    	echo '<style type="text/css">
//        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/custom-logo.png) !important; }
//    	</style>';
//	}
// add_action('login_head', 'pic_custom_login_logo');