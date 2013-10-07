<?php
/**
 * Template Name: Full width
 * The template for displaying full-width pages with no sidebar.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>
	<div id="primary">
		<?php do_action( 'alienship_content_before' ); ?>
		<div id="content" role="main">

			<?php
			while ( have_posts() ) : the_post();

				do_action( 'alienship_loop_before' );

				get_template_part( '/templates/parts/content', 'page' );

				do_action( 'alienship_loop_after' );

				comments_template( '', true );

			endwhile; ?>

		</div><!-- #content -->
		<?php do_action( 'alienship_content_after' ); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>