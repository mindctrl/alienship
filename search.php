<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

    <section id="primary">
      <div class="row-fluid">
      <?php alienship_content_before(); ?>
      <div id="content" role="main" class="<?php echo apply_filters('alienship_content_container_class', 'span9'); ?>">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'alienship' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>

        <?php if ( of_get_option('alienship_content_nav_above') ) { alienship_content_nav( 'nav-above' ); } // display content nav above posts? ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php alienship_loop_before(); ?>
          <?php $format = get_post_format();
            if ( false === $format )
            $format = 'standard';
            get_template_part( '/inc/parts/content', $format ); ?>

          <?php alienship_loop_after(); ?>
        <?php endwhile; ?>

        <?php if ( of_get_option('alienship_content_nav_below',1) ) { alienship_content_nav( 'nav-below' ); } // display content nav below posts? ?>

      <?php else : ?>

      <?php /* No results */ get_template_part( '/inc/parts/content', 'none' ); ?>

      <?php endif; ?>

      <?php alienship_content_after(); ?>
      </div><!-- #content -->
      <?php get_sidebar(); ?>
      </div><!-- .row-fluid -->
    </section><!-- #primary -->
<?php get_footer(); ?>