<?php
/**
 * The main template file.
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

      <div id="main-row" class="row-fluid">
        <?php alienship_content_before(); ?>
        <div id="content" role="main" class="<?php echo apply_filters('alienship_content_container_class', 'span9'); ?>">

      <?php if ( have_posts() ) : ?>

        <?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } // display content nav above posts? ?>

        <?php if ( of_get_option('alienship_featured_posts') ) {
          if ( of_get_option('alienship_featured_posts_display_type',1) == "1" ) { alienship_featured_posts_slider();
            } else { alienship_featured_posts_grid(); }
          } // if (of_get_option('alienship_featured_posts') ) ?>

        <?php
        /* Check to see if we should duplicate featured posts in the body
         *
         * Do not display */
        if ( of_get_option('alienship_featured_posts') && of_get_option('alienship_featured_posts_show_dupes') == "0" ) {
          $args = array(
            'tag__not_in' => array ( of_get_option('alienship_featured_posts_tag') ),
            'paged' => $paged
            );
          $query = new WP_Query( $args );

        } else {

          /* Duplicate featured posts (Show all posts) */
          $args = array(
            'post_status' => 'publish',
            'paged' => $paged
            );
          $query = new WP_Query( $args );

        } ?>

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
            get_template_part( '/inc/parts/content', $format );
          ?>
          <?php alienship_loop_after(); ?>
        <?php endwhile; ?>

        <?php if ( of_get_option('alienship_content_nav_below',1) ) { alienship_content_nav( 'nav-below' ); } // display content nav below posts? ?>

      <?php else : ?>

      <?php /* No results */ get_template_part( '/inc/parts/content', 'none' ); ?>

      <?php endif; ?>
        <?php alienship_content_after(); ?>
        </div><!-- #content -->
        <?php alienship_sidebar_before(); ?>
        <div id="sidebar" class="<?php echo apply_filters('alienship_sidebar_container_class', 'span3'); ?>">
          <?php alienship_sidebar_inside_before(); ?>
        <?php get_sidebar(); ?>
        <?php alienship_sidebar_inside_after(); ?>
    </div><!-- #sidebar -->
    <?php alienship_sidebar_after(); ?>
      </div><!-- .row-fluid -->
    <?php get_footer(); ?>
