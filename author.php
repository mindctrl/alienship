<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<section id="primary">
		<div class="row">
			<?php do_action( 'alienship_content_before' ); ?>
			<div id="content" role="main" class="<?php echo apply_filters( 'alienship_content_container_class', 'col-sm-9' ); ?>">

				<?php if ( have_posts() ) {

					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post(); ?>

					<header class="page-header">
						<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'alienship' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
					</header>

					<?php
					  /* Since we called the_post() above, we need to
					   * rewind the loop back to the beginning that way
					   * we can run the loop properly, in full.
					   */
					  rewind_posts();

					alienship_content_nav( 'nav-above' ); // display content nav above posts?

					// Start the Loop
					while ( have_posts() ) : the_post();
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
			</div><!-- #content -->
			<?php do_action( 'alienship_content_after' );

			get_sidebar(); ?>
		</div><!-- .row -->
	</section><!-- #primary -->

<?php get_footer(); ?>