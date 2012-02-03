<?php
/**
 * _s functions and definitions
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

if ( ! function_exists( '_s_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Alien Ship 0.1
 */
function _s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

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
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	/** register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) ); */
	register_nav_menus( array(
		'top' => __( 'Top Menu', '_s' ),
	) );


	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Alien Ship 0.1
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', '_s' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'init', '_s_widgets_init' );

function bootstrapwp_js_loader() {
		wp_enqueue_script('prettify.js', get_template_directory_uri().'/docs/assets/js/google-code-prettify/prettify.js', array('jquery'),'1.0', true );
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
		wp_enqueue_script('html5.js', get_template_directory_uri().'/js/html5.js', array('jquery'),'1.0', true );
	}
		add_action('wp_enqueue_scripts', 'bootstrapwp_js_loader');