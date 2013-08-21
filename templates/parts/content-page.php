<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_post_inside_before' );

	do_action( 'alienship_entry_title' ); ?>

	<div class="entry-content">
		<?php
		the_content( __( 'Continue Reading &rarr;', 'alienship' ) );

		wp_link_pages();

		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' );

		do_action( 'alienship_post_inside_after' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>