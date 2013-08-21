<?php
/**
 * Header for the Marketing page template
 *
 * @package Alien Ship
 * @subpackage Templates
 * @since .93
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<?php get_template_part( '/inc/parts/meta' ); ?>
		<title><?php wp_title( '&#8226;', true, 'right' ); ?></title>

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
		<![endif]-->

		<?php wp_head(); ?>
		<?php do_action( 'alienship_head' ); ?>
	</head>

	<body <?php body_class(); ?>>
		<!--[if lt IE 8]><p class="browsehappy alert alert-danger">You are using an outdated browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
