<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<section id="primary" class="<?php echo apply_filters( 'alienship_primary_container_class', 'content-area col-sm-8' ); ?>">

		<?php do_action( 'alienship_main_before' ); ?>
		<main id="main" role="main" class="site-main">

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

		} //have_posts ?>

		</main><!-- #main -->
		<?php do_action( 'alienship_main_after' ); ?>

	</section><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>