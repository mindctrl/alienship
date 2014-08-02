<?php
/**
 * The template part for displaying the post entry footer
 * containing the categories, tags, and comment link/information.
 */
?>
<footer class="entry-footer">
	<?php
	if( 'post' == get_post_type() ) :

		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'alienship' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'alienship' ) );

		if ( '' != $tag_list ) {
			$meta_text = '<span class="cat-links"><i class="glyphicon glyphicon-folder-open" title="'. __( 'Categories', 'alienship' ) .'"></i> ';
			$meta_text .= __( '%1$s' );
			$meta_text .= ' <span class="tags-links"><i class="glyphicon glyphicon-tags" title="'. __( 'Tags', 'alienship' ) .'"></i> ';
			$meta_text .= __( '%2$s' );

		} else {
			$meta_text = '<span class="cat-links"><i class="glyphicon glyphicon-folder-open" title="'. __( 'Categories', 'alienship' ) .'"></i> ';
			$meta_text .= __( '%1$s' );
		}

		printf(
			$meta_text,
			$category_list,
			$tag_list
		);

		if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
			<span class="comments-link">
				<i class="glyphicon glyphicon-comment"></i>
				<?php comments_popup_link( __( ' Leave a comment', 'alienship' ), __( ' 1 Comment', 'alienship' ), __( ' % Comments', 'alienship' ) ); ?>
			</span>
		<?php }

	endif; ?>

	<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link pull-right">', '</span>' ); ?>
</footer><!-- .entry-footer -->