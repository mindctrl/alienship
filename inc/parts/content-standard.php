<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php do_action( 'alienship_post_inside_before' ); ?>

  <?php do_action( 'alienship_entry_title' ); ?>

  <div class="entry-content">
    <?php do_action( 'alienship_content' ); ?>
    <?php alienship_wp_link_pages(); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php
    if (of_get_option('alienship_published_date',1) ) { do_action( 'alienship_posted_on' ); } // show published date?
    if (of_get_option('alienship_post_author',1) ) { do_action( 'alienship_post_author' ); } // Show post author?
    if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { do_action( 'alienship_post_categories' ); } // show post categories?
    if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { do_action( 'alienship_post_tags' ); } // show post tags?
    if (of_get_option('alienship_post_comments_link',1) ) { do_action( 'alienship_post_comments_link' ); }
    edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); // display the edit link
    ?>
  </footer><!-- .entry-meta -->
  <?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>