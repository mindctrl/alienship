<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */
?>
<?php alienship_get_first_link(); // get the link from the post body
global $link_url; global $post_content; ?>
<?php do_action (' alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php do_action (' alienship_post_inside_before' ); ?>
  <header class="entry-header">
    <h2 class="entry-title"><a class="entry-title" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" href="<?php echo $link_url; ?>"><?php the_title(); ?>&rarr;</a></h2>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php echo $post_content; // displays post content without the link ?>
    <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'alienship' ) .'<div class="pagination"><ul>', 'link_before' => '<li>', 'link_after' => '</li>', 'after' => '</ul></div>' ) ); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php
    if (of_get_option('alienship_published_date',1) ) { alienship_posted_on(); } // show published date?
    if (of_get_option('alienship_post_author',1) ) { alienship_post_author(); } // Show post author?
    if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { alienship_post_categories(); } // show post categories?
    if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { alienship_post_tags(); } // show post tags?
    if (of_get_option('alienship_post_comments_link',1) ) { alienship_post_comments_link(); }
    edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); // display the edit link
    ?>
  </footer><!-- .entry-meta -->
  <?php do_action (' alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action (' alienship_post_after' ); ?>