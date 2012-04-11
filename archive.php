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
			<?php alienship_archive_page_title();	?>
			<?php 
      // global $wp_query;
      // $temp = $wp_query;
      alienship_archive_sticky_posts(); // sticky post query ?>
			<?php if ( have_posts() ) : ?>
				
				<?php rewind_posts(); ?>

				<?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } ?>

				<?php // do the main query without stickies
         // $wp_query = $temp;
        if ( is_category() ) {
					$cat_ID = get_query_var('cat');
        	$args = array(
        		'cat' => $cat_ID,
            'post_status' => 'publish',
            'post__not_in' => array_merge($do_not_duplicate,get_option( 'sticky_posts' )),
            'ignore_sticky_posts' => 1,
            'paged' => $paged
            );
        	$wp_query = new WP_Query( $args );
        }
        elseif (is_tag() ) {
          $current_tag = single_tag_title("", false);
          $args = array(
            'tag_slug__in' => array($current_tag),
            'post_status' => 'publish',
            'post__not_in' => array_merge($do_not_duplicate,get_option( 'sticky_posts' )),
            'ignore_sticky_posts' => 1,
            'paged' => $paged
            );
          $wp_query = new WP_Query( $args );
        } else {
          new WP_Query();
        }
          ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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