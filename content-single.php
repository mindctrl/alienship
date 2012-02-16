<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a class="entry-title" title="<?php the_title();?>" rel="bookmark" href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alienship' ), 'after' => '</div>' ) ); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <div class="entry-meta">
	  <?php alienship_posted_on(); ?>
	</div><!-- .entry-meta -->
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list( __( ', ', 'alienship' ) );

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', ', ' );

      alienship_post_categories(); // display the post categories
      alienship_post_tags(); // display the post tags
		?>

		<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link"> | ', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
