<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<section id="primary">
		<div class="row">

			<?php do_action( 'alienship_content_before' ); ?>
			<div id="content" role="main" class="<?php echo apply_filters( 'alienship_content_container_class', 'col-sm-9' ); ?>">

				<?php if ( have_posts() ) { ?>

					<header id="search-results-header" class="page-header">
						<h1 id="search-results-title" class="page-title"><?php printf( __( 'Search Results for: %s', 'alienship' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>

					<?php
					alienship_content_nav( 'nav-above' ); // display content nav above posts?

					// Start the Loop
					while ( have_posts() ) : the_post();

						do_action( 'alienship_loop_before' );

						get_template_part( '/templates/parts/content', 'search' );

						do_action( 'alienship_loop_after' );

					endwhile;

					alienship_content_nav( 'nav-below' ); // display content nav below posts?

				} else {

					// No results
					get_template_part( '/templates/parts/content', 'none' );

				} //have_posts

			do_action( 'alienship_content_after' ); ?>
			</div><!-- #content -->

			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</section><!-- #primary -->

<?php get_footer(); ?>