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

			global $featured_header_image;
			if ( has_post_thumbnail() && 'no' == $featured_header_image ) { ?>

				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
					<?php echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'alignright', 'title' => "" ) ); ?>
				</a>
			<?php
			}

			the_content();
		}

		wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
		do_action( 'alienship_posted_on' ); // show published date
		do_action( 'alienship_post_author' ); // show post author
		do_action( 'alienship_post_categories' ); // show post categories
		do_action( 'alienship_post_tags' ); // show post tags
		do_action( 'alienship_post_comments_link' ); // show comment link
		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link
		?>
	</footer>

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>