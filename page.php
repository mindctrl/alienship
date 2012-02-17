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
  <div class="row-fluid">
    <div class="span9">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'page' ); ?>

            <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

    </div>
    <div class="span3">

        <?php get_sidebar(); ?>

    </div>
  </div>

        <?php get_footer(); ?>

</div>
</body>