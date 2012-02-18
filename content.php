<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
			<span class="comments-link"><span class="sep"> | </span><?php comments_popup_link( __( 'Leave a comment', 'alienship' ), __( '1 Comment', 'alienship' ), __( '% Comments', 'alienship' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	  <?php endif; ?>
		<?php endif; ?>		
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
