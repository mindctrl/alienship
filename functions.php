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

  /* Header image */
  require_once locate_template('/inc/header-image.php');

	/* Breadcrumbs */
	require_once locate_template('/inc/breadcrumbs.php');

  /* Load theme options framework */
  require_once locate_template('/inc/options-panel.php');

  /* Custom functions that act independently of the theme templates */
  require_once locate_template('/inc/tweaks.php');

	/* Load Bootstrap javascript */
  require_once locate_template('/inc/bootstrap-js.php');

  /* PHPMailer rewrite */
  require_once locate_template('/inc/phpmailer-rewrite.php');

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


/*
 * Allow embed and script tags in theme options textareas
 */
function optionscheck_change_sanitize() {
  remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
  add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
add_action('admin_init','optionscheck_change_sanitize', 100);

function custom_sanitize_textarea($input) {
  global $allowedposttags;
  $custom_allowedtags["embed"] = array(
    "src" => array(),
    "type" => array(),
    "allowfullscreen" => array(),
    "allowscriptaccess" => array(),
    "height" => array(),
        "width" => array()
    );
    $custom_allowedtags["script"] = array();
    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
    $output = wp_kses( $input, $custom_allowedtags);
  return $output;
}


/* Display a notice about menu functionality */
function alienship_admin_notice_menus() {
  global $current_user ;
  global $pagenow;
    $user_id = $current_user->ID;
    /* Check that we're an admin, that we're on the menus page, and that the user hasn't already ignored the message */
  if ( current_user_can('administrator') && $pagenow =='nav-menus.php' && ! get_user_meta($user_id, 'alienship_admin_notice_menus_ignore_notice') ) {
    echo '<div class="updated"><p>';
    printf(__('Dropdown menus work a little differently in Alien Ship. They do not activate on mouse hover, but on click instead. This means that the top/parent menu item does not click through to a page, but only activates the dropdown. Also, the nested menus only go one level deep (Parent > Sub item and NOT Parent > Sub item > Sub sub item. Design your menus with this in mind. For more information, read the <a href="http://www.johnparris.com/alienship/documentation" target="_blank">Alien Ship documentation</a> online. | <a href="%1$s">Hide this notice</a>'), '?alienship_admin_notice_menus_ignore=0');
    echo "</p></div>";
  }
}
add_action('admin_notices', 'alienship_admin_notice_menus');

function alienship_admin_notice_menus_ignore() {
  global $current_user;
    $user_id = $current_user->ID;
    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset($_GET['alienship_admin_notice_menus_ignore']) && '0' == $_GET['alienship_admin_notice_menus_ignore'] ) {
      add_user_meta($user_id, 'alienship_admin_notice_menus_ignore_notice', 'true', true);
  }
}
add_action('admin_init', 'alienship_admin_notice_menus_ignore');


if ( ! function_exists( 'alienship_options_scripts' ) ):
function alienship_options_scripts() { ?>
  <script type="text/javascript">
    jQuery(document).ready(function() {

    jQuery('#alienship_enable_custom_colors').click(function() {
      jQuery("[id^=section-alienship_color_]").fadeToggle(400);
    });
  
    if (jQuery('#alienship_enable_custom_colors:checked').val() !== undefined) {
      jQuery("[id^=section-alienship_color_]").show();
    }
  
    });
  </script>

<?php
}
add_action('optionsframework_custom_scripts', 'alienship_options_scripts');
endif;

/* Stop WordPress from adding those annoying closing paragraph tags */
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );


/* Allow PHP in widgets
 * Used for testing. Potentially dangerous. Uncomment at your own risk. */
/* function alienship_execute_php_in_widgets($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}
add_filter('widget_text','alienship_execute_php_in_widgets',100); */