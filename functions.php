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
  locate_template('/inc/template-tags.php', true);

  /* Clean up header output */
  locate_template('/inc/cleanup.php', true);

  /* Hooks */
  locate_template('/inc/hooks.php', true);

  /* Register the navigation menus. */
  locate_template('/inc/menus.php', true);

  /* Register sidebars */
  locate_template('/inc/sidebars.php', true);

  /* Shortcodes */
  locate_template('/inc/shortcodes.php', true);

  /* Header image */
  locate_template('/inc/header-image.php', true);

    /* Load theme options framework */
  locate_template('/inc/options-panel.php', true);

  /* Breadcrumbs */
  if ( of_get_option('alienship_breadcrumbs',1) ) {
    locate_template('/inc/breadcrumbs.php', true);
  }

  /* Custom functions that act independently of the theme templates */
  locate_template('/inc/tweaks.php', true);

  /* Load Bootstrap javascript */
  locate_template('/inc/bootstrap-js.php', true);

  /* Load Theme Layouts extension and add theme support for desired layouts */
  locate_template('/inc/theme-layouts.php', true);
  add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ) );

  /* PHPMailer rewrite */
  locate_template('/inc/phpmailer-rewrite.php', true);


  /**
   * Make theme available for translation
   * Translations can be filed in the /languages/ directory
   * If you're building a theme based on alienship, use a find and replace
   * to change 'alienship' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'alienship', get_template_directory() . '/languages' );


  /* Add default posts and comments RSS feed links to head */
  add_theme_support( 'automatic-feed-links' );


  /* Add support for post-thumbnails */
  add_theme_support('post-thumbnails');


  /* Add support for post formats. To be styled in later release. */
  add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ));

}
endif; // alienship_setup
add_action( 'after_setup_theme', 'alienship_setup' );


if( file_exists( get_template_directory() . '/custom/custom_functions.php' ) && !is_child_theme()) {
  include_once( get_template_directory() . '/custom/custom_functions.php' );
}


/* Change footer text in admin dashboard */
if ( ! function_exists( 'alienship_change_admin_footer_content' ) ) {
  function alienship_change_admin_footer_content () {
    echo 'Copyright &copy ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.';
  }
}
add_filter('admin_footer_text', 'alienship_change_admin_footer_content');


/*
 * Allow "a", "embed" and "script" tags in theme options textareas
 */
function optionscheck_change_sanitize() {
  remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
  add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
  remove_filter( 'of_sanitize_text', 'sanitize_text_field' );
  add_filter( 'of_sanitize_text', 'custom_sanitize_text' );
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
  $custom_allowedtags["a"] = array(
    "href" => array(),
    "target" => array(),
    "id" => array(),
    "class" => array() );
    $custom_allowedtags["script"] = array();
    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
    $output = wp_kses( $input, $custom_allowedtags);
  return $output;
}

function custom_sanitize_text($input) {
  global $allowedposttags;
  $custom_allowedtags["a"] = array(
    "href" => array(),
    "target" => array(),
    "id" => array(),
    "class" => array() );
    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
    $output = wp_kses( $input, $custom_allowedtags);
  return $output;
}



/* Only show WordPress update nag to admins */
function alienship_proper_update_nag() {
  if ( !current_user_can( 'manage_options' ) ) {
    remove_action ( 'admin_notices', 'update_nag', 3 );
  }
}
add_action ( 'admin_notices', 'alienship_proper_update_nag', 1 );



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


/**
 * Snatched from future release code in WordPress repo.
 *
 * Retrieve the URI of the highest priority template file that exists.
 *
 * Searches in the stylesheet directory before the template directory so themes
 * which inherit from a parent theme can just overload one file.
 *
 * @param string|array $template_names Template file(s) to search for, in order.
 * @return string The URI of the file if one is located.
 */
if ( ! function_exists( 'alienship_locate_template_uri' ) ):
function alienship_locate_template_uri( $template_names ) {
 $located = '';
 foreach ( (array) $template_names as $template_name ) {
   if ( !$template_name )
     continue;
   if ( file_exists(get_stylesheet_directory() . '/' . $template_name)) {
     $located = get_stylesheet_directory_uri() . '/' . $template_name;
     break;
   } else if ( file_exists(get_template_directory() . '/' . $template_name) ) {
     $located = get_template_directory_uri() . '/' . $template_name;
     break;
   }
 }

 return $located;
}
endif;



/**
 * Alien Ship RSS Feed Dashboard Widget
 *
 * Retrieve the latest news from Alien Ship home page
 *
 * @since Alien Ship .63
 *
 */
function alienship_rss_dashboard_widget() {
  if ( function_exists('fetch_feed') ) {
    include_once (ABSPATH . WPINC . '/feed.php'); // include the required file
    $feed = fetch_feed('http://www.johnparris.com/alienship/feed/'); // specify the source feed
    $limit = $feed->get_item_quantity(3); // specify number of items
    $items = $feed->get_items(0, $limit); // create an array of items
  }
  if ( $limit == 0 ) echo '<div>The RSS Feed is either empty or currently unavailable.</div>'; // fallback message
  else foreach ($items as $item) : ?>

  <h4 style="margin-bottom: 0;">
  <a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_date('j F Y @ g:i a'); ?>" target="_blank">
  <?php echo $item->get_title(); ?>
  </a>
  </h4>
  <p style="margin-top: 0.5em;">
  <?php echo wp_html_excerpt(substr($item->get_description(), 0, 200), 200) . ' [...]'; ?>
  </p>
  <?php endforeach;
}
/* Load custom dashboard widget
 * Add your custom widget functions here to have them load. */
function alienship_custom_dashboard_widgets() {
  wp_add_dashboard_widget('alienship_rss_dashboard_widget', 'Alien Ship News', 'alienship_rss_dashboard_widget');
}
add_action('wp_dashboard_setup', 'alienship_custom_dashboard_widgets');

/* Set RSS update time to every 6 hours */
add_filter( 'wp_feed_cache_transient_lifetime', create_function('$a', 'return 21600;') );

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
