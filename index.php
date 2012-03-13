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

      <?php if ( of_get_option('alienship_featured_posts',1) ) { ?>
      <!-- Featured listings -->
      <div class="row-fluid">
      <div class="span12">
        <div id="featured-carousel" class="carousel slide">
          <div class="carousel-inner">

            <?php $featured_query = new WP_Query( 'tag_id='.of_get_option('alienship_featured_posts_tag').'&posts_per_page='.of_get_option('alienship_featured_posts_maxnum').'' );
            while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

            <?php get_template_part( 'content', 'featured' ); ?>

            <?php endwhile; ?>
          </div><!-- .carousel-inner -->
          <a class="left carousel-control" href="#featured-carousel" data-slide="prev">&lsaquo;</a>
          <a class="right carousel-control" href="#featured-carousel" data-slide="next">&rsaquo;</a>
        </div><!-- #featured-carousel -->
      </div><!-- .span12 -->
      </div><!-- .row-fluid -->
      <script type="text/javascript">
        jQuery(function() {
          // Activate the first carousel item //
          jQuery("div.item:first").addClass("active");
          // Start the Carousel //
          jQuery('.carousel').carousel();
        });
      </script>
      <!-- End featured listings -->
      <?php } ?>

        <?php 
        /* Check to see if we should duplicate featured posts in the body
         *
         * Do not display */
        if ( of_get_option('alienship_featured_posts_show_dupes',0) == 0 ) {
          $args = array(
            'tag__not_in' => array ( of_get_option('alienship_featured_posts_tag') )
            );
          $query = new WP_Query( $args );

        } else {

          /* Duplicate featured posts in the body */
          $args = array(
            'post_status' => 'publish'
            );
          $query = new WP_Query( $args );
          
        } ?>

        <?php /* Start the Loop */ ?>

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
