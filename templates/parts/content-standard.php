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
		global $featured_header_image;

		// If we have a featured image and it's not a fatty
		if ( has_post_thumbnail() && $featured_header_image == 'no' ) {

			$size = '';
			$align = '';

			// Do medium, aligned right on singular views
			if ( is_singular() ) {

				$size = 'medium';
				$align = 'alignright';

			// Do thumbnail, aligned left on archive views
			} else {

				$size = 'thumbnail';
				$align = 'alignleft';

			} ?>


			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
				<?php echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => $align, 'title' => "" ) ); ?>
			</a>

		<?php }

		if ( ! is_singular() ) {

			// Show excerpts on non-singular views
			the_excerpt();

			if ( has_excerpt() ) { // We have to add a link below manual excerpts since WP doesn't. ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e( 'Continue Reading &raquo;', 'alienship' ); ?></a>
			<?php }

		} else {

			// Show full content on singular views
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
		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link ?>
	</footer>

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>