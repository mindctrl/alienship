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
		the_content( __( 'Continue Reading &rarr;', 'alienship' ) );

		wp_link_pages(); ?>
	</div>

	<footer class="entry-meta">
		<?php
		if (of_get_option('alienship_published_date',1) ) { do_action( 'alienship_posted_on' ); } // show published date?
		if (of_get_option('alienship_post_author',1) ) { do_action( 'alienship_post_author' ); } // Show post author?
		if (of_get_option('alienship_post_categories',1) && is_single() || of_get_option('alienship_post_categories_posts_page',1) && !is_single() ) { do_action( 'alienship_post_categories' ); } // show post categories?
		if (of_get_option('alienship_post_tags',1) && is_single() || of_get_option('alienship_post_tags_posts_page',1) && !is_single() ) { do_action( 'alienship_post_tags' ); } // show post tags?
		if (of_get_option('alienship_post_comments_link',1) ) { do_action( 'alienship_post_comments_link' ); }
		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link ?>
	</footer><!-- .entry-meta -->

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>