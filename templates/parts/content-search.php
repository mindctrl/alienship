<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_inside_before' );

	do_action( 'alienship_entry_title' ); ?>

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'alignleft', 'title' => "" ) ); ?></a>
		<?php }

		// Show full content on certain post formats if it doesn't have an excerpt.
		if ( has_post_format( array( 'image', 'gallery', 'video', 'audio' ) )  && ! has_excerpt() ) {
			the_content( __( 'Continue Reading &raquo;', 'alienship' ) );

		// Show only excerpt on the rest.
		} else {
			the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e( 'Continue Reading &raquo;', 'alienship' ); ?></a>
		<?php }

		wp_link_pages(); ?>
	</div>

	<footer class="entry-meta">
		<?php
		do_action( 'alienship_posted_on' ); // show published date
		do_action( 'alienship_post_author' ); // show post author
		do_action( 'alienship_post_categories' ); // show post categories
		do_action( 'alienship_post_tags' ); // show post tags
		do_action( 'alienship_post_comments_link' ); // show comment link
		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link
		?>
	</footer><!-- .entry-meta -->

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>