<?php
/**
 * @package Alien Ship
 * @since 1.0.1
 */

do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_top' );
	do_action( 'alienship_entry_header' );
	do_action( 'alienship_entry_content_before' );
	?>
	<div class="entry-content">

	<?php
	// If we have a featured image
	if ( has_post_thumbnail() ) { ?>

		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
			<?php echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'alignnone', 'title' => "" ) ); ?>
		</a>

	<?php }

		the_content();

		wp_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php
	do_action( 'alienship_entry_content_after' );
	do_action( 'alienship_entry_footer' );
	do_action( 'alienship_post_bottom' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>