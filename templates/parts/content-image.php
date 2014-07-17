<?php
/**
 * @package Alien Ship
 * @since 1.0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_entry_header' ); ?>

	<div class="entry-content">

	<?php
	// If we have a featured image
	if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
			<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
		</a>
	<?php }

		the_content();

		wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php do_action( 'alienship_entry_footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
