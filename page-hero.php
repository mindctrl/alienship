<?php
/**
 * Template Name: Hero
 * The template for displaying full-width Hero pages.
 *
 * @package Alien Ship
 * @since Alien Ship 0.2
 */

get_header('hero'); ?>
<div class="container">
  <div class="hero-unit">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php do_action( 'alienship_loop_before' ); ?>
    <?php get_template_part( '/inc/parts/content', 'heropage' ); ?>
    <?php do_action( 'alienship_loop_after' ); ?>
    <?php endwhile; // end of the loop. ?>
  </div><!-- /hero-unit -->
  <div id="hero-widgets-row" class="row">
    <div id="hero-widgets-container" class="widget widget-area" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'herowidgets-1' ) ?>
    </div><!-- #hero-widgets-container -->
  </div><!-- #hero-widgets-row -->
  </div><!-- /container -->

</div><!-- #main -->
<?php get_footer('hero'); ?>