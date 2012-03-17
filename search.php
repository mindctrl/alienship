<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>
	<div class="row-fluid">
		<div class="span9">
		<section id="primary">
			<?php alienship_content_before(); ?>
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'alienship' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php if ( of_get_option('alienship_content_nav_above') ) { ?>
				<?php alienship_content_nav( 'nav-above' ); ?>
				<?php } ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php alienship_loop_before(); ?>
					<?php get_template_part( 'content', 'search' ); ?>
					<?php alienship_loop_after(); ?>
				<?php endwhile; ?>

				<?php if ( of_get_option('alienship_content_nav_below',1) ) { ?>
				<?php alienship_content_nav( 'nav-below' ); ?>
				<?php } ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'alienship' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'alienship' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			<?php alienship_content_after(); ?>
			</div><!-- #content -->
		</section><!-- #primary -->
</div><!-- span9 -->
<?php alienship_sidebar_before(); ?>
<div id="sidebar" class="span3">
	<?php alienship_sidebar_inside_before(); ?>
	<?php get_sidebar(); ?>
	<?php alienship_sidebar_inside_after(); ?>
</div><!-- #sidebar -->
<?php alienship_sidebar_after(); ?>
</div><!-- .row-fluid -->
<?php get_footer(); ?>