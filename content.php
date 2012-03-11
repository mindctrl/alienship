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
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'alienship' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alienship' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
	  <?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php alienship_posted_on(); ?>

			<?php
			if ( is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'alienship' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			alienship_post_categories(); // display the post categories
			alienship_post_tags(); // display the post tags
			} // end if ( is_single() ) ?>

			<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
			<span class="comments-link"><span class="sep">&nbsp;&nbsp;</span><i class="icon-comment"></i>&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'alienship' ), __( '1 Comment', 'alienship' ), __( '% Comments', 'alienship' ) ); ?>&nbsp;</span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- #entry-meta -->
	<?php alienship_post_inside_after(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php alienship_post_after(); ?>