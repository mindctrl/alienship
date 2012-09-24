<?php
/**
 * The template is for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

<!-- Main -->
  <?php do_action( 'alienship_content_before' ); ?>
  <div class="row-fluid">
    <div id="content" class="<?php echo apply_filters( 'alienship_content_container_class', 'span9' ); ?>">

        <?php while ( have_posts() ) : the_post(); ?>
            <?php do_action( 'alienship_loop_before' ); ?>
            <?php get_template_part( '/inc/parts/content', 'page' ); ?>
            <?php do_action( 'alienship_loop_after' ); ?>
            <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

    <?php do_action( 'alienship_content_after' ); ?>
    </div><!-- #content -->
    <?php get_sidebar(); ?>
  </div><!-- .row-fluid -->
<?php get_footer(); ?>