<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<section id="primary" class="<?php echo apply_filters( 'alienship_primary_container_class', 'content-area col-sm-8' ); ?>">

		<?php do_action( 'alienship_main_before' ); ?>
		<main id="main" class="site-main" role="main">
			<?php
			do_action( 'alienship_archive_page_title' );

			if ( have_posts() ) {

				alienship_content_nav( 'nav-above' );

				// Start the Loop
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
					do_action( 'alienship_loop_before' );

					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( '/templates/parts/content', get_post_format() );

					do_action( 'alienship_loop_after' );
				endwhile;

				// Show navigation below post content
				alienship_content_nav( 'nav-below' );

			} else {

				// No results
				get_template_part( '/templates/parts/content', 'none' );

			} //have_posts ?>
		</main><!-- #main -->
		<?php do_action( 'alienship_main_after' ); ?>

	</section><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>