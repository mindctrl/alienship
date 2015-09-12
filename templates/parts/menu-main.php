<?php
/**
 * The template used to load the Main Menu in header*.php
 *
 * @package Alien Ship
 */
?>
<!-- Main menu -->
	<nav class="<?php echo apply_filters( 'alienship_main_navbar_class' , 'navbar navbar-default main-navigation' ); ?>" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse navbar-ex2-collapse">
			<?php wp_nav_menu( array(
				'theme_location' => 'main',
				'depth'          => 2,
				'container'      => false,
				'menu_class'     => 'nav navbar-nav',
				'walker'         => new wp_bootstrap_navwalker(),
				'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
				)
			);
			?>
		</div>
	</nav>
<!-- End Main menu -->
