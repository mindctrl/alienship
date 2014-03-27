<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
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

		// On archive views, display post thumbnail, if available, and excerpt.
		if ( ! is_singular() ) {

			if ( has_post_thumbnail() ) { ?>

				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'alignleft', 'title' => "" ) ); ?>
				</a>
			<?php
			} // has_post_thumbnail()

			the_excerpt();

		} // if ( ! is_singular() )

		// On singular views, display post thumbnails in the post body if it's not big enough to be a header image
		else {
			$header_image = alienship_get_header_image( get_the_ID() );
			if ( has_post_thumbnail() && 'yes' != $header_image['featured'] ) { ?>

				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
					<?php echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'alignright', 'title' => "" ) ); ?>
				</a>
			<?php
			}

			the_content();
		}

		wp_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php
	do_action( 'alienship_entry_content_after' );
	do_action( 'alienship_entry_footer' );
	do_action( 'alienship_post_bottom' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>