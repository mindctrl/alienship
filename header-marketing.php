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
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php do_action( 'alienship_head' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 8]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
