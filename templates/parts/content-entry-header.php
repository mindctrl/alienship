<?php
/**
 * The template part for displaying the post entry header
 * containing the published date and author byline.
 */
?>
<header class="entry-header">
	<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	<?php if( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php alienship_posted_on(); ?>
		</div>
	<?php endif; ?>
</header>