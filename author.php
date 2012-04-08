<?php
/**
 * The template for displaying Author Archive pages.
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

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="page-header">
					<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'alienship' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>
			<?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } // display content nav above posts? ?>

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
						get_template_part( 'content', $format );
					?>
					<?php alienship_loop_after(); ?>
				<?php endwhile; ?>

			<?php if ( of_get_option('alienship_content_nav_below',1) ) { alienship_content_nav( 'nav-below' ); } // display content nav below posts? ?>

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