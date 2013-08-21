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
 * with appropriate grid classes depending on which are activated
 *
 * @since 1.0
 */
function alienship_do_sidebar( $prefix = false ) {

	if ( ! $prefix )
		_doing_it_wrong( __FUNCTION__, __( 'You must specify a prefix when using alienship_do_sidebar.', 'alienship' ), '1.0' );


	if ( current_theme_supports( 'theme-layouts' ) && !is_admin() && 'layout-no-footer-widgets' !== theme_layouts_get_layout() || !current_theme_supports( 'theme-layouts' ) ):

		// Get our grid class
		$sidebar_class = alienship_sidebar_class( $prefix );

		if ( $sidebar_class ): ?>

			<div class="<?php echo $prefix; ?>-sidebar-row row">
				<div id="<?php echo $prefix; ?>-sidebar-wrapper" class="complementary col-sm-12 <?php echo $prefix; ?>-wrapper">
					<?php do_action( 'alienship_sidebar_container_inside_top' );

					if ( is_active_sidebar( $prefix.'-1' ) ): ?>
						<aside id="<?php echo $prefix; ?>-sidebar-1" class="sidebar<?php echo $sidebar_class; ?>">
							<?php dynamic_sidebar( $prefix.'-1' ); ?>
						</aside>
					<?php endif;


					if ( is_active_sidebar( $prefix.'-2' ) ): ?>
						<aside id="<?php echo $prefix; ?>-sidebar-2" class="sidebar<?php echo $sidebar_class; ?>">
							<?php dynamic_sidebar( $prefix.'-2' ); ?>
						</aside>
					<?php endif;


					if ( is_active_sidebar( $prefix.'-3' ) ): ?>
						<aside id="<?php echo $prefix; ?>-sidebar-3" class="sidebar<?php echo $sidebar_class; ?>">
							<?php dynamic_sidebar( $prefix.'-3' ); ?>
						</aside>
					<?php endif;


					if ( is_active_sidebar( $prefix.'-4' ) ): ?>
						<aside id="<?php echo $prefix; ?>-sidebar-4" class="sidebar<?php echo $sidebar_class; ?>">
							<?php dynamic_sidebar( $prefix.'-4' ); ?>
						</aside>
					<?php endif;

					do_action( 'alienship_sidebar_container_inside_bottom' ); ?>
				</div> <!-- .complementary -->
				<?php do_action( 'alienship_sidebar_container_after' ); ?>
			</div><!-- .row -->

		<?php endif; //$sidebar_class

	endif; //current_theme_supports
}



/**
 * Set title to H1 if in single view, otherwise set it to H2
 * @since .75
 */
function alienship_do_entry_title() {

	$title = get_the_title();

	if ( strlen( $title ) == 0 )
		return;

	if ( is_singular() ) {
		$entry_title = '<header class="entry-header">';
		$entry_title .= sprintf( '<h1 class="entry-title">%s</h1>', $title );
		$entry_title .= '</header><!-- .entry-header -->';
	} else {
		$entry_title = '<header class="entry-header">';
		$entry_title .= sprintf( '<h2 class="entry-title"><a class="entry-title" title="%s" rel="bookmark" href="%s">%s</a></h2>', the_title_attribute( 'echo=0' ), get_permalink(), $title );
		$entry_title .= '</header><!-- .entry-header -->';
	}
	echo apply_filters( 'alienship_entry_title_text', $entry_title );
}
add_action( 'alienship_entry_title', 'alienship_do_entry_title' );



if ( ! function_exists( 'alienship_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since 0.1
 */
function alienship_content_nav( $nav_id ) {

	global $wp_query;

	$nav_class = 'site-navigation paging-navigation pager';

	if ( is_single() )
		$nav_class = 'site-navigation post-navigation pager';
	?>

	<nav id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'alienship' ); ?></h3>
		<ul>
		<?php
		if ( is_single() ) : // navigation links for single posts ?>

			<ul class="pager">
				<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&laquo;', 'Previous post link', 'alienship' ) . '</span> %title' );
				next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&raquo;', 'Next post link', 'alienship' ) . '</span>' ); ?>
			</ul>

		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages

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

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for alienship_comment()



/**
 * Returns true if a blog has more than 1 category
 *
 * @since 0.1
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
 * @since 0.1
 */
function alienship_category_transient_flusher() {

	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'alienship_category_transient_flusher' );
add_action( 'save_post', 'alienship_category_transient_flusher' );



if ( ! function_exists( 'alienship_do_post_author' ) ) :
/**
 * Prints HTML with meta information for the current post's author.
 *
 * @since 0.59
 */
function alienship_do_post_author() {

	printf( __( '<span class="byline"><i class="glyphicon glyphicon-user"></i> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'alienship' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'alienship' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
add_action( 'alienship_post_author', 'alienship_do_post_author' );
endif;



if ( ! function_exists( 'alienship_do_posted_on' ) ) :
/**
 * Prints HTML with date posted information for the current post.
 *
 * @since 0.1
 */
function alienship_do_posted_on() {

	printf( __( '<span class="published-date"><i class="glyphicon glyphicon-calendar" title="Published date"></i> <a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', 'alienship' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'alienship_posted_on', 'alienship_do_posted_on' );
endif;



if ( ! function_exists( 'alienship_do_post_tags' ) ):
/**
 * Customize the list of tags displayed on index and on a post
 * @since 0.3
 */
function alienship_do_post_tags() {

	$post_tags = get_the_tags();
	if ( $post_tags ) {

		echo '<span class="tags-links"><i class="glyphicon glyphicon-tags" title="Tags"></i> ';
		$num_tags = count( $post_tags );
		$tag_count = 1;

		foreach( $post_tags as $tag ) {
			$html_before = '<a href="' . get_tag_link($tag->term_id) . '" rel="tag nofollow" class="tag-text">';
			$html_after = '</a>';

			if ( $tag_count < $num_tags )
				$sep = ', ';
			elseif ( $tag_count == $num_tags )
				$sep = '';

			echo $html_before . $tag->name . $html_after . $sep;
			$tag_count++;
		}
		echo '</span>';
	}
}
add_action( 'alienship_post_tags', 'alienship_do_post_tags' );
endif;



if ( ! function_exists( 'alienship_do_post_categories' ) ):
/**
 * Customize the list of categories displayed on index and on a post
 * @since 0.3
 */
function alienship_do_post_categories() {

	$post_categories = get_the_category();
	if ( $post_categories ) {

		echo '<span class="cat-links"><i class="glyphicon glyphicon-folder-open" title="Categories"></i> ';
		$num_categories = count( $post_categories );
		$category_count = 1;

		foreach ( $post_categories as $category ) {
			$html_before = '<a href="' . get_category_link( $category->term_id ) . '" class="cat-text">';
			$html_after = '</a>';

			if ( $category_count < $num_categories )
				$sep = ', ';
			elseif ( $category_count == $num_categories )
				$sep = '';
				echo $html_before . $category->name . $html_after . $sep;
				$category_count++;
			}
		echo '</span>';
	}
}
add_action( 'alienship_post_categories', 'alienship_do_post_categories' );
endif;



if ( ! function_exists( 'alienship_do_post_comments_link' ) ):
/**
 * Display the "Leave a comment" message
 * @since .74
 */
function alienship_do_post_comments_link() {

	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="comments-link">
			<i class="glyphicon glyphicon-comment"></i>
			<?php comments_popup_link( __( ' Leave a comment', 'alienship' ), __( ' 1 Comment', 'alienship' ), __( ' % Comments', 'alienship' ) ); ?>
		</span>
	<?php }
}
add_action( 'alienship_post_comments_link', 'alienship_do_post_comments_link' );
endif;



if ( ! function_exists( 'alienship_header_title_and_description' ) ):
/**
 * Display site title and description below Top Menu navbar
 * @since .55
 */
function alienship_header_title_and_description() {

	if ( !is_front_page() || !is_home() ) { ?>
		<hgroup>
			<p id="site-title" class="site-title">
				<span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
				</span>
			</p>
			<p id="site-description" class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
		</hgroup>

	<?php } else { ?>

		<hgroup>
			<h1 id="site-title" class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
			</h1>
			<h2 id="site-description" class="site-description"><?php echo get_bloginfo( 'description' ); ?></h2>
		</hgroup>

	<?php }
}
endif;



if ( ! function_exists( 'alienship_featured_posts_grid' ) ):
/**
 * Display featured posts in a grid
 * @since .59
 */
function alienship_featured_posts_grid() {

	$featured_query = new WP_Query( 'tag_id=' . of_get_option( 'alienship_featured_posts_tag' ) . '&posts_per_page=' . of_get_option( 'alienship_featured_posts_maxnum' ) . '' );

	if ( $featured_query->have_posts() ) { ?>
		<ul id="featured-posts-grid" class="block-grid mobile two-up">

			<?php while ( $featured_query->have_posts() ) : $featured_query->the_post();
				get_template_part( '/templates/parts/content', 'fp-grid' );
			endwhile; ?>

		</ul>
	<?php }
}
endif;



if ( ! function_exists( 'alienship_featured_posts_slider' ) ):
/**
 * Display featured posts in a slider
 * @since .59 (The function. The feature @since .4)
 */
function alienship_featured_posts_slider() {

	$featured_query = new WP_Query( 'tag_id=' . of_get_option( 'alienship_featured_posts_tag' ) . '&posts_per_page=' . of_get_option( 'alienship_featured_posts_maxnum' ) . '' );

	if ( $featured_query->have_posts() ) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div id="featured-carousel" class="carousel slide">
					<div class="carousel-inner">

						<?php while ( $featured_query->have_posts() ) : $featured_query->the_post();
							get_template_part( '/templates/parts/content', 'featured' );
						endwhile; ?>

					</div><!-- .carousel-inner -->
					<a class="left carousel-control" href="#featured-carousel" data-slide="prev"><span class="icon-prev"></span></a>
					<a class="right carousel-control" href="#featured-carousel" data-slide="next"><span class="icon-next"></span></a>
				</div><!-- #featured-carousel -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->

		<script type="text/javascript">
			jQuery(function() {
				// Activate the first carousel item //
				jQuery("div.item:first").addClass("active");
				// Start the Carousel //
				jQuery('.carousel').carousel();
			});
		</script>
	<?php } // if(have_posts()) ?>
	  <!-- End featured listings -->
<?php }
endif;



if ( ! function_exists( 'alienship_do_archive_page_title' ) ):
/**
 * Display page title on archive pages
 * @since .592
 */
function alienship_do_archive_page_title() { ?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			if ( is_category() ) {
				printf( __( 'Category Archives: %s', 'alienship' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			} elseif ( is_tag() ) {
				printf( __( 'Tag Archives: %s', 'alienship' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			} elseif ( is_author() ) {
				printf( __( 'Author Archives: %s', 'alienship' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );

			} elseif ( is_day() ) {
				printf( __( 'Daily Archives: %s', 'alienship' ), '<span>' . get_the_date() . '</span>' );

			} elseif ( is_month() ) {
				printf( __( 'Monthly Archives: %s', 'alienship' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			} elseif ( is_year() ) {
				printf( __( 'Yearly Archives: %s', 'alienship' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			} else {
				_e( 'Archives', 'alienship' );

			} ?>
		</h1>

		<?php
		if ( is_category() ) {
			// show an optional category description
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo apply_filters( 'alienship_category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

			} elseif ( is_tag() ) {
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'alienship_tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
			} ?>
	</header>
<?php }
add_action( 'alienship_archive_page_title', 'alienship_do_archive_page_title' );
endif;



if ( ! function_exists( 'alienship_archive_sticky_posts' ) ):
/**
 * Display sticky posts on archive pages
 * @since .594
 */
function alienship_archive_sticky_posts() {

	$sticky = get_option( 'sticky_posts' );
	if ( ! empty( $sticky ) ) {
		global $do_not_duplicate, $page, $paged;
		$do_not_duplicate = array();

		if ( is_category() ) {
			$cat_ID = get_query_var( 'cat' );
			$sticky_args = array(
				'post__in'    => $sticky,
				'cat'         => $cat_ID,
				'post_status' => 'publish',
				'paged'       => $paged
			);

		} elseif ( is_tag() ) {
			$current_tag = single_tag_title( "", false );
			$sticky_args = array(
				'post__in'     => $sticky,
				'tag_slug__in' => array( $current_tag ),
				'post_status'  => 'publish',
				'paged'        => $paged
			);
		}

		if ( ! empty( $sticky_args ) ):
			$sticky_posts = new WP_Query( $sticky_args );

			if ( $sticky_posts->have_posts() ):
				global $post;

				while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();
					array_push( $do_not_duplicate, $post->ID );
					$format = get_post_format();
					if ( false === $format )
					$format = 'standard';
					get_template_part( '/templates/parts/content', $format );
				endwhile;
			endif; // if have posts
		endif; // if ( ! empty( $sticky_args ) )
	} //if not empty sticky
}
endif;



if ( ! function_exists( 'alienship_archive_get_posts' ) ):
/**
 * Display archive posts and exclude sticky posts
 * @since .594
 */
function alienship_archive_get_posts() {

	global $do_not_duplicate, $page, $paged;

	if ( is_category() ) {
		$cat_ID = get_query_var( 'cat' );
		$args = array(
			'cat'                 => $cat_ID,
			'post_status'         => 'publish',
			'post__not_in'        => array_merge( $do_not_duplicate, get_option( 'sticky_posts' ) ),
			'ignore_sticky_posts' => 1,
			'paged'               => $paged
		);
		$wp_query = new WP_Query( $args );

	} elseif (is_tag() ) {
		$current_tag = single_tag_title( "", false );
		$args = array(
			'tag_slug__in'        => array( $current_tag ),
			'post_status'         => 'publish',
			'post__not_in'        => array_merge( $do_not_duplicate, get_option( 'sticky_posts' ) ),
			'ignore_sticky_posts' => 1,
			'paged'               => $paged
		);
		$wp_query = new WP_Query( $args );

	} else {
	  new WP_Query();
	}
}
endif;



if ( ! function_exists( 'alienship_get_first_link' ) ):
/**
 * Get the first link in a post
 * Used to link the title to external links on the "Link" post format
 * @since .64
 */
function alienship_get_first_link() {

	global $link_url, $post_content;
	$content = get_the_content();
	$link_start = stristr( $content, "http" );
	$link_end = stristr( $link_start, "\n" );

	if ( ! strlen( $link_end ) == 0 ) {
		$link_url = substr( $link_start, 0, -( strlen( $link_end ) + 1 ) );
	} else {
		$link_url = $link_start;
	}

	$post_content = substr( $content, strlen( $link_url ) );
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
