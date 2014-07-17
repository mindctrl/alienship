<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_entry_header' ); ?>

	<div class="entry-content">
		<?php
		the_content( __( 'Continue Reading &raquo;', 'alienship' ) );

		wp_link_pages();

		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' );

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
