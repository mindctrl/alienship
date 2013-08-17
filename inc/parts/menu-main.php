<?php
/**
 * The template used to load the Main Menu in header*.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.70
 */
?>
<!-- Main menu -->
	<nav class="navbar" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if (of_get_option('alienship_name_in_navbar',1) ) { ?>
				<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php } ?>
		</div>

		<div class="<?php echo apply_filters( 'alienship_top_navbar_class', 'collapse navbar-collapse navbar-ex2-collapse' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new alienship_Navbar_Nav_Walker(), 'fallback_cb' => false ) ); ?>
		</div>
	</nav>
<!-- End Main menu -->
