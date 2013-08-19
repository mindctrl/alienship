<?php
/**
 * Template Name: Hero
 * The template for displaying full-width Hero pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.2
 */

get_header('hero'); ?>
	<div class="container">
		<div class="jumbotron">
			<?php
			while ( have_posts() ) : the_post();

				do_action( 'alienship_loop_before' );

				get_template_part( '/inc/parts/content', 'heropage' );

				do_action( 'alienship_loop_after' );

			endwhile; ?>
		</div><!-- /jumbotron -->

		<div id="hero-widgets-container" class="widget widget-area" role="complementary">
			<?php
			do_action( 'before_sidebar' );
			alienship_do_sidebar( 'herowidgets' ); ?>
		</div>
	</div><!-- /container -->
</div><!-- #main -->
<?php get_footer('hero'); ?>