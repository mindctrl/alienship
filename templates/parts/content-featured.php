<?php
/**
 * Featured listings
 * @since Alien Ship 0.4
 */
?>
	<div class="item">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
			<?php echo get_the_post_thumbnail( ''. $post->ID .'', array( of_get_option( 'alienship_featured_posts_image_width' ), of_get_option( 'alienship_featured_posts_image_height' ) ), array( 'title' => "" ) ); ?>
		</a>
		<?php // Featured post captions?
		if ( of_get_option( 'alienship_featured_posts_captions', 1 ) ) { ?>
			<div class="carousel-caption">
				<h3><?php the_title(); ?></h3>
			</div><!-- .carousel-caption -->
		<?php } ?>
	</div><!-- .item -->
