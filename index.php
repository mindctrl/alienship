<?php
/**
 * The main template file.
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	    <div class="row-fluid">
	    	<?php alienship_content_before(); ?>
    		<div id="content" role="main" class="span9">

			<?php if ( have_posts() ) : ?>

				<?php alienship_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php alienship_loop_before(); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
					<?php alienship_loop_after(); ?>
				<?php endwhile; ?>
				
				<?php alienship_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'alienship' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'alienship' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

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
    <?php get_footer(); ?>
