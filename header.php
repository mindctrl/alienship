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
<?php get_template_part( '/inc/parts/meta' ); ?>
<?php get_template_part( '/inc/parts/title' ); ?>

<?php /* Load Bootstrap CSS */
locate_template('/inc/bootstrap-css.php', true); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />

<?php
/* Check for custom.css and if it exists and we're not using a child theme, load it. */
if( file_exists( get_template_directory() . '/custom/custom.css' ) && !is_child_theme()) {
  echo '<link rel="stylesheet" type="text/css" media="all" href="' . get_template_directory_uri() . '/custom/custom.css" />';
} ?>

<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php alienship_head(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 8]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<?php if ( of_get_option('alienship_show_top_navbar',1) ) {
  get_template_part( '/inc/parts/menu', 'top' );
} ?>

<!-- Site title and description in masthead -->
<div id="page" class="container-fluid hfeed">
  <?php do_action( 'before' ); ?>
  <?php alienship_header_before(); ?>
	<header id="masthead" role="banner">
    <?php alienship_header_inside(); ?>
    <?php alienship_header_title_and_description(); ?>
    <?php
      // Check to see if the header image has been removed
      $header_image = get_header_image();
      if ( ! empty( $header_image ) ) :
    ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <?php
        // The header image
        // Check if this is a post or page, if it has a thumbnail, and if it's a big one
        if ( is_singular() &&
            has_post_thumbnail( $post->ID ) &&
            ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) && $image[1] >= HEADER_IMAGE_WIDTH ) :
          // Houston, we have a new header image!
          echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
        else : ?>
        <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" class="header-image" alt="" />
      <?php endif; // end check for featured image or standard header ?>
    </a>
    <?php endif; // end check for removed header image ?>

<!-- End Site title and description in masthead -->

  <?php if ( has_nav_menu('main') ) {
    get_template_part( '/inc/parts/menu', 'main' );
  } ?>
  </header><!-- #masthead -->
  <?php alienship_header_after(); ?>

  <?php if ( function_exists('alienship_breadcrumbs') && !is_front_page() ) { alienship_breadcrumbs(); } ?>

  <?php alienship_main_before(); ?>
  <div id="main">
