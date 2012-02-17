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
		  
		    <div id="content" role="main" class="span9">

					<?php while ( have_posts() ) : the_post(); ?>

					<?php alienship_content_nav( 'nav-above' ); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php alienship_content_nav( 'nav-below' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
					?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
				<div class="span3">
			  	<?php get_sidebar(); ?>
				</div><!-- /span -->
		  </div><!-- /row -->
		</div><!-- #primary -->
<?php get_footer(); ?>