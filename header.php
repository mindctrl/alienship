<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up to <div id="main">
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

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
		<![endif]-->

		<?php
		wp_head();
		do_action( 'alienship_head' ); ?>
	</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 9]><p class="browsehappy alert alert-danger">You are using an outdated browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

	<?php
	if ( of_get_option( 'alienship_show_top_navbar', 1 ) )
		get_template_part( '/templates/parts/menu', 'top' );

	// If not using Hero template, do header image and menu stuff
	if ( ! is_page_template( 'templates/page-hero.php' ) ) { ?>

		<div id="page" class="container hfeed">

			<?php do_action( 'alienship_header_before' ); ?>
			<header id="masthead" role="banner">
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

			if ( function_exists( 'breadcrumb_trail' ) && !is_front_page() ) {
				breadcrumb_trail( array( 'container' => 'div', 'separator' => '/', 'show_browse' => false ) );
			}

	} // !is_page_template( 'templates/page-hero.php' )

	do_action( 'alienship_main_before' ); ?>
	<div id="main">
