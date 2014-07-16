<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up to <div id="content">
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( '/templates/parts/meta' ); ?>
<title><?php wp_title( '&#8226;', true, 'right' ); ?></title>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/assets/javascripts/html5shiv.js" type="text/javascript"></script><![endif]-->

<?php
wp_head();
do_action( 'alienship_head' ); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 9]><p class="browsehappy alert alert-danger">You are using an outdated browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

	<?php
	if ( of_get_option( 'alienship_show_top_navbar', 1 ) )
		get_template_part( '/templates/parts/menu', 'top' ); ?>

	<div id="page" class="container hfeed site">

		<?php do_action( 'alienship_header_before' ); ?>
		<header id="masthead" class="site-header" role="banner">
			<?php

			/**
			 * Display site title and description.
			 * Hooked in /inc/template-tags.php
			 */
			do_action( 'alienship_site_title' );
			do_action( 'alienship_site_description' );

			// Header image
			do_action( 'alienship_header_image' );

			// Main menu
			if ( has_nav_menu('main') ) {
				get_template_part( '/templates/parts/menu', 'main' );
			} ?>
		</header><!-- #masthead -->
		<?php do_action( 'alienship_header_after' );

	do_action( 'alienship_content_before' ); ?>
	<div id="content" class="site-content row">

	<?php if ( function_exists( 'breadcrumb_trail' ) && !is_front_page() )
		breadcrumb_trail( array(
			'container'   => 'div',
			'separator'   => '/',
			'show_browse' => false
			)
		);
