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
    <?php alienship_loop_before(); ?>
    <?php get_template_part( 'content', 'heropage' ); ?>
    <?php alienship_loop_after(); ?>
    <?php endwhile; // end of the loop. ?>
  </div><!-- /hero-unit -->
  </div><!-- /container -->

<div class="container">
  <!-- Row of columns -->
  <div class="row">
    <?php get_sidebar('hero'); ?><p>&nbsp;</p>
    <div class="clear"></div>
  </div><!-- /row -->
  </div><!-- #container -->
      </div><!-- /container -->
<?php get_footer('hero'); ?>