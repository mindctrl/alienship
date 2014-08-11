<?php
/**
 * Custom template tags for this theme.
 *
 * @package Alien Ship
 * @since 0.1
 */


/**
 * Count the number of active widgets to determine dynamic wrapper class
 *
 * @since 1.0
 */
function alienship_sidebar_class( $prefix = false ) {

	if ( ! $prefix )
		_doing_it_wrong( __FUNCTION__, __( 'You must specify a prefix when using alienship_sidebar_class.', 'alienship' ), '1.0' );

	$count = 0;

	if ( is_active_sidebar( $prefix.'-1' ) )
		$count++;

	if ( is_active_sidebar( $prefix.'-2' ) )
		$count++;

	if ( is_active_sidebar( $prefix.'-3' ) )
		$count++;

	if ( is_active_sidebar( $prefix.'-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = ' col-sm-12';
			break;

		case '2':
			$class = ' col-sm-6';
			break;

		case '3':
			$class = ' col-sm-4';
			break;

		case '4':
			$class = ' col-sm-3';
			break;
	}

  if ( $class )
	  return $class;
}



/**
 * Determines the theme layout and active sidebars, and prints the HTML structure
 * with appropriate grid classes depending on which are activated.
 *
 * @since 1.0
 * @uses alienship_sidebar_class()
 * @param string $prefix Prefix of the widget to be displayed. Example: "footer" for footer-1, footer-2, etc.
 */
function alienship_do_sidebar( $prefix = false ) {

	if ( ! $prefix )
		_doing_it_wrong( __FUNCTION__, __( 'You must specify a prefix when using alienship_do_sidebar.', 'alienship' ), '1.0' );


	if ( current_theme_supports( 'theme-layouts' ) && 'layout-1c' !== theme_layouts_get_layout() || 'footer' == $prefix || !current_theme_supports( 'theme-layouts' ) ):

		// Get our grid class
		$sidebar_class = alienship_sidebar_class( $prefix );

		if ( $sidebar_class ): ?>

			<div class="<?php echo esc_attr( $prefix ); ?>-sidebar-row row widget-area">
				<?php if ( is_active_sidebar( esc_attr( $prefix ).'-1' ) ): ?>
					<aside id="<?php echo esc_attr( $prefix ); ?>-sidebar-1" class="sidebar widget<?php echo esc_attr( $sidebar_class ); ?>">
						<?php dynamic_sidebar( esc_attr( $prefix ).'-1' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( esc_attr( $prefix ).'-2' ) ): ?>
					<aside id="<?php echo esc_attr( $prefix ); ?>-sidebar-2" class="sidebar widget<?php echo esc_attr( $sidebar_class ); ?>">
						<?php dynamic_sidebar( esc_attr( $prefix ).'-2' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( esc_attr( $prefix ).'-3' ) ): ?>
					<aside id="<?php echo esc_attr( $prefix ); ?>-sidebar-3" class="sidebar widget<?php echo esc_attr( $sidebar_class ); ?>">
						<?php dynamic_sidebar( esc_attr( $prefix ).'-3' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( esc_attr( $prefix ).'-4' ) ): ?>
					<aside id="<?php echo esc_attr( $prefix ); ?>-sidebar-4" class="sidebar widget<?php echo esc_attr( $sidebar_class ); ?>">
						<?php dynamic_sidebar( esc_attr( $prefix ).'-4' ); ?>
					</aside>
				<?php endif; ?>
			</div><!-- .row -->

		<?php endif; //$sidebar_class

	endif; //current_theme_supports
}



if ( ! function_exists( 'alienship_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since 0.1
 */
function alienship_content_nav( $nav_id ) {

	global $wp_query;

	$nav_class = 'site-navigation paging-navigation';

	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';
	?>

	<nav id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'alienship' ); ?></h3>
		<ul>
		<?php
		if ( is_single() ) : // navigation links for single posts

			previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&laquo;', 'Previous post link', 'alienship' ) . '</span> %title' );
			next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&raquo;', 'Next post link', 'alienship' ) . '</span>' );

		elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages

			if ( get_next_posts_link() ) : ?>
				<li class="pull-right"><?php next_posts_link( __( 'Next page <span class="meta-nav">&raquo;</span>', 'alienship' ) ); ?></li>
			<?php endif;

			if ( get_previous_posts_link() ) : ?>
				<li class="pull-left"><?php previous_posts_link( __( '<span class="meta-nav">&laquo;</span> Previous page', 'alienship' ) ); ?></li>
			<?php endif;

		endif; ?>
		</ul>
	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // alienship_content_nav



if ( ! function_exists( 'alienship_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function alienship_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'alienship' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'alienship' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'alienship' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'alienship' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for alienship_comment()



if ( ! function_exists( 'alienship_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function alienship_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'alienship' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'alienship' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;



if ( ! function_exists( 'alienship_archive_page_title' ) ):
/**
 * Display page title on archive pages
 * @since .592
 */
function alienship_archive_page_title() { ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php
			if ( is_category() ) {
				single_cat_title();

			} elseif ( is_tag() ) {
				single_tag_title();

			} elseif ( is_author() ) {
				printf( __( 'Author: %s', 'alienship' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );

			} elseif ( is_day() ) {
				printf( __( 'Day: %s', 'alienship' ), '<span>' . get_the_date() . '</span>' );

			} elseif ( is_month() ) {
				printf( __( 'Month: %s', 'alienship' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			} elseif ( is_year() ) {
				printf( __( 'Year: %s', 'alienship' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
				_e( 'Asides', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				_e( 'Galleries', 'alienship');

			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				_e( 'Images', 'alienship');

			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				_e( 'Videos', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				_e( 'Quotes', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				_e( 'Links', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				_e( 'Statuses', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				_e( 'Audios', 'alienship' );

			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				_e( 'Chats', 'alienship' );

			} else {
				_e( 'Archives', 'alienship' );

			} ?>
		</h1>

		<?php
		// show an optional category description
		$term_description = term_description();
		if ( ! empty( $term_description ) )
			printf( '<div class="taxonomy-description">%s</div>', $term_description ); ?>

	</header>
<?php }
endif;



if ( ! function_exists( 'alienship_link_format_helper' ) ) :
/**
 * Returns the first post link and/or post content without the link.
 * Used for the "Link" post format.
 *
 * @since 1.0.1
 * @param string $output "link" or "post_content"
 * @return string Link or Post Content without link.
 */
function alienship_link_format_helper( $output = false ) {

	if ( ! $output )
		_doing_it_wrong( __FUNCTION__, __( 'You must specify the output you want - either "link" or "post_content".', 'alienship' ), '1.0.1' );

	$post_content = get_the_content();
	$link_start = stristr( $post_content, "http" );
	$link_end = stristr( $link_start, "\n" );

	if ( ! strlen( $link_end ) == 0 ) {
		$link_url = substr( $link_start, 0, -( strlen( $link_end ) + 1 ) );
	} else {
		$link_url = $link_start;
	}

	$post_content = substr( $post_content, strlen( $link_url ) );

	// Return the first link in the post content
	if ( 'link' == $output )
		return $link_url;

	// Return the post content without the first link
	if ( 'post_content' == $output )
		return $post_content;
}
endif;



if ( ! function_exists( 'alienship_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function alienship_the_attached_image() {

	$post                = get_post();
	$attachment_size     = apply_filters( 'alienship_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
