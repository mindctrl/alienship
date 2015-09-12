<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up to <div id="content">
 *
 * @package Alien Ship
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( '/templates/parts/meta' ); ?>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.min.js" type="text/javascript"></script><![endif]-->

<?php
wp_head();
do_action( 'alienship_head' ); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 9]><p class="browsehappy alert alert-danger">You are using an outdated browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<?php
	get_template_part( '/templates/parts/menu', 'top' );

	if( get_option( 'alienship_display_masthead', false ) ) : ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</header><!-- #masthead -->
	<?php endif;

	// Main menu
	if ( has_nav_menu('main') ) {
		get_template_part( '/templates/parts/menu', 'main' );
	} ?>

	<div id="page" class="container hfeed site">
		<div id="content" class="site-content row">

		<?php if ( function_exists( 'breadcrumb_trail' ) && !( is_front_page() || is_search() ) ) {
			breadcrumb_trail( array(
				'container'   => 'div',
				'separator'   => '/',
				'show_browse' => false
				)
			);
		}
