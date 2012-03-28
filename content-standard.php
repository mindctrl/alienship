<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php alienship_post_before(); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php alienship_post_inside_before(); ?>
  <header class="entry-header">
    <h2 class="entry-title"><a class="entry-title" title="<?php the_title();?>" rel="bookmark" href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'alienship' ) .'<div class="pagination"><ul>', 'link_before' => '<li>', 'link_after' => '</li>', 'after' => '</ul></div>' ) ); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
  <?php
  if (of_get_option('alienship_published_date',1) ) { alienship_posted_on(); } // show published date?
  if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { alienship_post_categories(); } // show post categories?
  if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { alienship_post_tags(); } // show post tags?
  edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); // display the edit link
  ?>
  </footer><!-- .entry-meta -->
  <?php alienship_post_inside_after(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php alienship_post_after(); ?>