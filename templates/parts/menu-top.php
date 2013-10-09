<?php
/**
 * The template used to load the Top Navbar Menu in header*.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.70
 */
?>
<!-- Top Menu -->
	<nav class="<?php echo apply_filters( 'alienship_top_navbar_class' , 'navbar navbar-default top-navigation' ); ?>" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if (of_get_option('alienship_name_in_navbar',1) ) { ?>
				<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php } ?>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'depth'          => 2,
				'container'      => false,
				'menu_class'     => 'nav navbar-nav',
				'walker'         => new wp_bootstrap_navwalker(),
				'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
				)
			);

			if ( of_get_option( 'alienship_search_bar', '1' ) ) { ?>
				<form id="searchform" class="navbar-form navbar-right" role="search" action="<?php echo site_url(); ?>" method="get">
					<div class="form-group">
						<input id="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'alienship' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
					</div>
					<button id="searchsubmit" type="submit" name="submit" class="btn btn-default">Submit</button>
				</form>
			<?php } ?>

		</div>
	</nav>
<!-- End Top Menu -->
