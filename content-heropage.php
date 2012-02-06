<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alienship' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->

