<?php
/**
 * The main template file.
 *
 * @package Alien Ship
 */

get_header(); ?>

		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">
			<?php
				if( is_front_page() && alienship_has_featured_posts() ) {
					// Load featured post content
					get_template_part( '/templates/parts/featured-content' );
				}

				if ( have_posts() ) :

					// Start the Loop
					while ( have_posts() ) : the_post();

						do_action( 'alienship_loop_before' );

						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme then include a file called content-___.php
						 * (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( '/templates/parts/content', get_post_format() );

						do_action( 'alienship_loop_after' );

					endwhile;

					alienship_content_nav( 'nav-below' ); // display content nav below posts?

				else :

					// No results
					get_template_part( '/templates/parts/content', 'none' );

				endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>