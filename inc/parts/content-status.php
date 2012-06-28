<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */
?>
  <?php alienship_post_before(); ?>
  <article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php alienship_post_inside_before(); ?>
    <div class="entry-content">
        <p><?php alienship_content(); ?></p>
      <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'alienship' ) .'<div class="pagination"><ul>', 'link_before' => '<li>', 'link_after' => '</li>', 'after' => '</ul></div>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
    <?php
    if (of_get_option('alienship_published_date',1) ) { alienship_posted_on(); } // show published date?
    if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { alienship_post_categories(); } // show post categories?
    if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { alienship_post_tags(); } // show post tags?
    if (of_get_option('alienship_post_comments_link',1) ) { alienship_post_comments_link(); }
    edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); // display the edit link ?>
    </footer><!-- .entry-meta -->
  <?php alienship_post_inside_after(); ?>
  </article><!-- #post -->
  <?php alienship_post_after(); ?>