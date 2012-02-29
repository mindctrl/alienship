<?php
/**
 * Template Name: Full width. No sidebar.
 * The template for displaying full-width pages with no sidebar.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>
  <?php alienship_content_before(); ?>
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php alienship_loop_before(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php alienship_loop_after(); ?>
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
      <?php alienship_content_after(); ?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>