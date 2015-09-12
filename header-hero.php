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

	<?php get_template_part( '/templates/parts/menu', 'top' ); ?>
	<div id="content" class="site-content jumbotron">
