<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- Try overriding IE8/9 "Display all websites in Compatibility View" option -->
<!--[if IE 8]> <meta http-equiv="X-UA-Compatible" content="IE=8" /> <![endif]-->
<!--[if IE 9]> <meta http-equiv="X-UA-Compatible" content="IE=9" /> <![endif]-->
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'alienship' ), max( $paged, $page ) );

  ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php /* Load Bootstrap CSS */
  require_once locate_template('/inc/bootstrap-css.php');
?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />

<?php
// <!--  Check for custom.css and if it exists and we're not using a child theme, load it. -->
$customcss = (get_stylesheet_directory()).'/custom/custom.css';
if(file_exists($customcss) && !is_child_theme()){
echo '<link rel="stylesheet" type="text/css" media="all" href="' . get_bloginfo ( 'stylesheet_directory' ) . '/custom/custom.css" />';
} ?>

<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php alienship_head(); ?>
<?php wp_head(); ?>
<?php if ( of_get_option('alienship_enable_custom_fonts') ) { require_once locate_template('/inc/typography.php'); } /* Custom fonts */ ?>
<?php if ( of_get_option('alienship_enable_custom_colors') ) { require_once locate_template('/inc/colors.php'); } /* Custom colors */ ?>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 8]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<?php if ( of_get_option('alienship_show_top_navbar',1) ) { ?>
<!-- Load Top Menu -->
  <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span></span>
          <span class="icon-bar-text">Menu</span>
          <span></span>
          </a>
          <?php if (of_get_option('alienship_name_in_navbar',1) ) { // Show site name in navbar? ?>
          <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          <?php } // site name in navbar ?>
          <div class="nav-collapse">
            <?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav', 'walker' => new alienship_Navbar_Nav_Walker(), 'fallback_cb' => 'alienship_menu_fallback' ) ); ?>
            <?php if ( of_get_option('alienship_search_bar', '1') ) { ?>
            <form role="search" class="navbar-search pull-right" action="<?php echo site_url(); ?>" id="searchform" method="get">
              <label class="assistive-text" for="s">Search</label>
              <input type="text" placeholder="Search ..." id="s" name="s" class="search-query">
              <input type="submit" value="Search" id="searchsubmit" name="submit" class="btn btn-primary">
            </form>
            <?php } // end if search bar ?>
          </div><!-- /nav-collapse -->
        </div><!-- /container -->
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
<!-- End Top Menu -->
<?php } // if of_get_option('alienship_show_top_navbar') ?>

  <?php do_action( 'before' ); ?>
  <?php alienship_header_before(); ?>
  <div id="main">