<?php
/**
 * Template Name: Full width
 * The template for displaying full-width pages with no sidebar.
 *
 * @package Alien Ship
 */

get_header(); ?>
	<div id="primary" class="col-xs-12">

		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			do_action( 'alienship_loop_before' );

			get_template_part( '/templates/parts/content', 'page' );

			do_action( 'alienship_loop_after' );

			comments_template( '', true );

		endwhile; ?>

		</main><!-- #main -->

	</div><!-- #primary -->
<?php get_footer(); ?>
