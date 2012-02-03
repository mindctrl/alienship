<?php
/**
 * Template Name: One left sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php get_header(); ?>
<!-- Main -->
  <div class="row-fluid">
    <div class="span2 leftsidebar-margin">

        <?php get_sidebar(); ?>

    </div>
    <div class="span9 offset1">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'page' ); ?>

            <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

    </div>
  </div>

        <?php get_footer(); ?>

</div>
</body>