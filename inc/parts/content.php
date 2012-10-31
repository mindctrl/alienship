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

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div><!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
    <?php the_content( __( '<button class="btn btn-mini">Read More <i class="icon-arrow-right"></i></button>', 'alienship' ) ); ?>
    <?php alienship_wp_link_pages(); ?>
  </div><!-- .entry-content -->
  <?php endif; ?>

  <footer class="entry-meta">
    <?php if ( 'post' == get_post_type() ) : ?>
      <?php
      if (of_get_option('alienship_published_date',1) ) { do_action( 'alienship_posted_on' ); } // Show published date?
      if (of_get_option('alienship_post_author',1) ) { do_action( 'alienship_post_author' ); } // Show post author?
      if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { do_action( 'alienship_post_categories' ); } // show post categories?
      if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { do_action( 'alienship_post_tags' ); } // show post tags?
      if (of_get_option('alienship_post_comments_link',1) ) { do_action( 'alienship_post_comments_link' ); }
      edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); ?>
    <?php endif; ?>
  </footer><!-- #entry-meta -->
  <?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>