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
  <?php alienship_content_before(); ?>
  <div class="row-fluid">
    <div id="content" class="span9">

        <?php while ( have_posts() ) : the_post(); ?>
            <?php alienship_loop_before(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php alienship_loop_after(); ?>
            <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

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