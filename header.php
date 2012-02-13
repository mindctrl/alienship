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
 require( get_template_directory() . '/inc/bootstrap-css.php' );
 ?>

<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<?php if (is_child_theme()) { ?>
  <!-- Include Child theme CSS file -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
  <?php } ?>
<?php
// <!--  Check for custom.css and if it exists, load it. -->
$customcss = (get_stylesheet_directory()).'/custom/custom.css';
if(file_exists($customcss) && !is_child_theme()){
echo '<link rel="stylesheet" type="text/css" media="all" href="' . get_bloginfo ( 'stylesheet_directory' ) . '/custom/custom.css" />';
} ?>

</head>

<body <?php body_class(); ?> onload="prettyPrint()">
  <!--[if lt IE 8]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->


<!-- Load Top Menu -->
  <div class="navbar" data-scrollspy="scrollspy">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar-text">Menu</span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <div class="nav-collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav' ) ); ?>
        </div><!-- /nav-collapse -->
      </div><!-- /container -->
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
<!-- End Top Menu -->

<!-- Site title and description in masthead -->
<div id="page" class="container-fluid hfeed">
  <?php do_action( 'before' ); ?>
	<header id="masthead" role="banner">
	  <hgroup>
	    <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	  </hgroup><br />
<!-- End Site title and description in masthead -->
    </header><!-- #masthead -->
  <div id="main">
