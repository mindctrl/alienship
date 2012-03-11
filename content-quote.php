<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.4
 */
?>
  <?php alienship_post_before(); ?>
  <article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php alienship_post_inside_before(); ?>

    <div class="format-quote">
    <div class="entry-content"><div class="entry-meta"><?php alienship_quote_posted_on(); ?></div>
      <blockquote>
        <p><?php the_content(); ?></p>
      </blockquote>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alienship' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    </div><!-- .format-quote -->

    <footer class="entry-meta">
      <div class="entry-meta">
        <?php
        if ( is_single() ) {
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list( __( ', ', 'alienship' ) );

        /* translators: used between list items, there is a space after the comma */
        $tag_list = get_the_tag_list( '', ', ' );

        alienship_post_categories(); // display the post categories
        alienship_post_tags(); // display the post tags
        } // end if ( is_single() )
        edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); // display the edit link
        ?>
      </div><!-- .entry-meta -->
  </footer><!-- .entry-meta -->
  <?php alienship_post_inside_after(); ?>
  </article><!-- #post -->
  <?php alienship_post_after(); ?>