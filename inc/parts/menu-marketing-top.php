<?php
/**
 * The template used to load the Top Navbar Menu in the Marketing Page template
 *
 * @package Alien Ship
 * @subpackage Templates
 * @since .93
 */
?>
	<?php wp_nav_menu( array( 'theme_location' => 'marketing-top', 'container' => false, 'menu_class' => 'nav nav-pills pull-right', 'fallback_cb' => false ) ); ?>