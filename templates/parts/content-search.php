<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_top' );

	if ( has_post_format( 'link' ) ) { ?>
	<header class="entry-header">
		<h2 class="entry-title">
			<a class="entry-title" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" href="<?php echo alienship_link_format_helper( 'link' ); ?>">
				<?php the_title(); ?>&rarr;
			</a>
		</h2>
	</header><!-- .entry-header -->
	<?php } else {

		do_action( 'alienship_entry_header' );
	}
	do_action( 'alienship_entry_content_before' );
	?>
	<div class="entry-content">
		<?php if ( has_post_thumbnail() && ! has_post_format( 'gallery' ) ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'alignleft', 'title' => "" ) ); ?></a>
		<?php }

		// Show full content on certain post formats if it doesn't have an excerpt.
		if ( has_post_format( array( 'image', 'gallery', 'video', 'audio' ) )  && ! has_excerpt() ) {
			the_content( __( 'Continue Reading &raquo;', 'alienship' ) );

		// Show only excerpt on the rest.
		} else {
			the_excerpt(); ?>
		<?php }

		wp_link_pages(); ?>
	</div>
	<?php
	do_action( 'alienship_entry_content_after' );
	do_action( 'alienship_entry_footer' );
	do_action( 'alienship_post_bottom' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>
