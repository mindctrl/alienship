<?php
/**
 * The template for displaying all single posts.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

		<div id="primary">
		  <div class="row-fluid">
		  	<?php alienship_content_before(); ?>
		    <div id="content" role="main" class="span9">

					<?php while ( have_posts() ) : the_post(); ?>

					<?php alienship_content_nav( 'nav-above' ); ?>
					<?php alienship_loop_before(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<?php alienship_loop_after(); ?>
					<?php alienship_content_nav( 'nav-below' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
					?>

					<?php endwhile; // end of the loop. ?>

				<?php alienship_content_after(); ?>
				</div><!-- #content -->
				<?php alienship_sidebar_before(); ?>
				<div id="sidebar" class="span3">
					<?php alienship_sidebar_inside_before(); ?>
			  	<?php get_sidebar(); ?>
			  	<?php alienship_sidebar_inside_after(); ?>
				</div><!-- #sidebar -->
				<?php alienship_sidebar_after(); ?>
		  </div><!-- .row-fluid -->
		</div><!-- #primary -->
<?php get_footer(); ?>