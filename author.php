<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package Alien Ship
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8">

		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

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

			else :

				// No results
				get_template_part( '/templates/parts/content', 'none' );

			endif; ?>
		</main><!-- #main -->

	</section><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>
