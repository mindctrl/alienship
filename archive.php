<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

		<section id="primary">
			<div class="row-fluid">
			<?php alienship_content_before(); ?>
			<div id="content" role="main" class="span9">

			<?php if ( have_posts() ) : ?>
				<?php alienship_archive_page_title();	?>
				<?php rewind_posts(); ?>

				<?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php alienship_loop_before(); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						$format = get_post_format();
            if ( false === $format )
            $format = 'standard';
						get_template_part( 'content', $format ); ?>
					<?php alienship_loop_after(); ?>
				<?php endwhile; ?>
			<?php if ( of_get_option('alienship_content_nav_below',1) ) { alienship_content_nav( 'nav-below' ); } ?>

			<?php else : ?>

			<?php /* No results */ get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
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
		</section><!-- #primary -->

<?php get_footer(); ?>