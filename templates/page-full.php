<?php
/**
 * Template Name: Full width
 * The template for displaying full-width pages with no sidebar.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>
	<div id="primary" class="col-sm-12">

		<?php do_action( 'alienship_main_before' ); ?>
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			do_action( 'alienship_loop_before' );

			get_template_part( '/templates/parts/content', 'page' );

			do_action( 'alienship_loop_after' );

			comments_template( '', true );

		endwhile; ?>

		</main><!-- #main -->
		<?php do_action( 'alienship_main_after' ); ?>

	</div><!-- #primary -->
<?php get_footer(); ?>
