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

		<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
		<![endif]-->

		<?php
		wp_head();
		do_action( 'alienship_head' ); ?>
	</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]><p class="browsehappy alert alert-danger">You are using an outdated browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

	<?php
	if ( of_get_option('alienship_show_top_navbar',1) ) {
		get_template_part( '/templates/parts/menu', 'top' );
	}

	// If not using Hero template, do header image and menu stuff
	if ( ! is_page_template( 'templates/page-hero.php' ) ) { ?>

		<div id="page" class="container hfeed">

			<?php do_action( 'alienship_header_before' ); ?>
			<header id="masthead" role="banner">
				<?php
				do_action( 'alienship_header_inside' );
				alienship_header_title_and_description();

				// Check for header image
				$header_image = get_header_image();
				global $featured_header_image;

				// We have a header image
				if ( $header_image ) {

					$header_image_width = get_theme_support( 'custom-header', 'width' );
					$header_image_height = get_theme_support( 'custom-header', 'height' ); ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						// Check if this is a post or page, if it has a thumbnail, and if it's a big one
						if ( is_singular() && has_post_thumbnail( $post->ID ) /* $src, $width, $height */ && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_height ) ) ) && $image[1] >= $header_image_width ) {

							// We have a LARGE image
							$featured_header_image = 'yes';
							echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );

						} else {

							$featured_header_image = 'no';
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height; ?>
							<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" class="header-image" alt="" />
						<?php } ?>
					</a>

				<?php // end check for header image
				} else {
					// We didn't have a header image enabled at all
					$featured_header_image = 'no';
				}

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
