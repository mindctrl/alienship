<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

if ( ! function_exists( 'alienship_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Alien Ship 0.1
 */
function alienship_content_nav( $nav_id ) {
	global $wp_query;

	$nav_class = 'site-navigation paging-navigation pager';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation pager';

	?>
	
	<nav id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h1 class="assistive-text"><?php _e( 'Post navigation', 'alienship' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous pull-left">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'alienship' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next pull-right">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'alienship' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous pull-left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'alienship' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next pull-right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'alienship' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // alienship_content_nav

if ( ! function_exists( 'alienship_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Alien Ship 0.1
 */
function alienship_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'alienship' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'alienship' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'alienship' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'alienship' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'alienship' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'alienship' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for alienship_comment()

if ( ! function_exists( 'alienship_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Alien Ship 0.1
 */
function alienship_posted_on() {
	printf( __( '<i class="icon-calendar" title="Published date"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="sep">&nbsp; &nbsp;</span><span class="byline"><span class="sep">&nbsp; &nbsp;</span><i class="icon-user"></i> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a><span class="sep">&nbsp; &nbsp;</span></span></span>', 'alienship' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'alienship' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Alien Ship 0.1
 */
function alienship_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so alienship_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so alienship_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in alienship_categorized_blog
 *
 * @since Alien Ship 0.1
 */
function alienship_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'alienship_category_transient_flusher' );
add_action( 'save_post', 'alienship_category_transient_flusher' );

/**
 * Customize the list of categories and tags displayed on index and on a post
 * @since Alien Ship 0.3
 */
function alienship_post_tags() {
  global $alienship_design;
  $post_tags = get_the_tags();
  if ($post_tags) {
    echo "\t<span class=\"tag-links\"><span class=\"sep\">&nbsp; &nbsp;</span><i class=\"icon-tags\" title=\"Tags\"></i>&nbsp;\n";
    $num_tags = count($post_tags);
    $tag_count = 1;
    $nofollow = ' nofollow'; // tell search engines to not index tag url
    foreach ($post_tags as $tag) {
    $html_before = "\t\t\t\t\t<a href=\"" . get_tag_link($tag->term_id) . "\" rel=\"tag$nofollow\" class=\"label\">";
    $html_after = '</a>';
    if ($tag_count < $num_tags)
      $sep = "\n";
    elseif ($tag_count == $num_tags)
    $sep = "\n";
    echo $html_before . $tag->name . $html_after . $sep;
    $tag_count++;
    }
    echo "\t\t\t\t</span>\n";
  }
}

function alienship_post_categories() {
  global $alienship_design;
  $post_categories = get_the_category();
  if ($post_categories) {
    echo "\t<span class=\"cat-links\"><i class=\"icon-folder-open\" title=\"Categories\"></i>&nbsp;\n";
    $num_categories = count($post_categories);
    $category_count = 1;
    foreach ($post_categories as $category) {
    // "category tag" is only proposed at this point - $html_before = "\t\t<a href=\"" . get_category_link($category->term_id) . "\" rel=\"category tag\" class=\"label\">";
    $html_before = "\t\t<a href=\"" . get_category_link($category->term_id) . "\" class=\"label\">";
    $html_after = '</a>';
    if ($category_count < $num_categories)
      $sep = "\n";
    elseif ($category_count == $num_categories)
    $sep = "\n";
    echo $html_before . $category->name . $html_after . $sep;
    $category_count++;
    }
    echo "\t\t\t</span><span class=\"sep\">&nbsp; &nbsp;</span>\n";
  }
}