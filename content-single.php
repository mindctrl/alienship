<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a class="entry-title" title="<?php the_title();?>" rel="permalink" href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
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

	    if ( ! alienship_categorized_blog() ) {
	    // This blog only has 1 category so we just need to worry about tags in the meta text
	      if ( '' != $tag_list ) {
	        $meta_text = __( 'This entry was tagged %2$s.', 'alienship' );
			} else {
			  $meta_text = __( '', 'alienship' );
			}

			} else {
			  // But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
				  $meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'alienship' );
				} else {
				  $meta_text = __( 'This entry was posted in %1$s.', 'alienship' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link"> | ', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
