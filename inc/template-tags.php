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

			<div class="<?php echo $prefix; ?>-sidebar-row row">
				<?php do_action( 'alienship_sidebar_row_top' );

				if ( is_active_sidebar( $prefix.'-1' ) ): ?>
					<aside id="<?php echo $prefix; ?>-sidebar-1" class="sidebar widget<?php echo $sidebar_class; ?>">
						<?php dynamic_sidebar( $prefix.'-1' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( $prefix.'-2' ) ): ?>
					<aside id="<?php echo $prefix; ?>-sidebar-2" class="sidebar widget<?php echo $sidebar_class; ?>">
						<?php dynamic_sidebar( $prefix.'-2' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( $prefix.'-3' ) ): ?>
					<aside id="<?php echo $prefix; ?>-sidebar-3" class="sidebar widget<?php echo $sidebar_class; ?>">
						<?php dynamic_sidebar( $prefix.'-3' ); ?>
					</aside>
				<?php endif;


				if ( is_active_sidebar( $prefix.'-4' ) ): ?>
					<aside id="<?php echo $prefix; ?>-sidebar-4" class="sidebar widget<?php echo $sidebar_class; ?>">
						<?php dynamic_sidebar( $prefix.'-4' ); ?>
					</aside>
				<?php endif;

				do_action( 'alienship_sidebar_row_bottom' ); ?>
			</div><!-- .row -->

		<?php endif; //$sidebar_class

	endif; //current_theme_supports
}



/**
 * Print the opening markup for the entry header.
 *
 * @since 1.2.0
 *
 */
function alienship_entry_header_markup_open() {
	echo '<header class="entry-header">';
}
add_action( 'alienship_entry_header', 'alienship_entry_header_markup_open', 5 );



/**
 * Set title to H1 if in single view, otherwise set it to H2
 * @since .75
 */
function alienship_do_entry_title() {

	$title = get_the_title();

	if ( 0 === mb_strlen( $title ) )
		return;

	if ( is_singular() ) {
		$entry_title = sprintf( '<h1 class="entry-title">%s</h1>', $title );

	} else {
		$entry_title = sprintf( '<h2 class="entry-title"><a class="entry-title" title="%s" rel="bookmark" href="%s">%s</a></h2>', the_title_attribute( 'echo=0' ), get_permalink(), $title );

	}
	echo apply_filters( 'alienship_entry_title_text', $entry_title );
}
add_action( 'alienship_entry_header', 'alienship_do_entry_title' );



/**
 * Print the closing markup for the entry header.
 *
 * @since 1.2.0
 */
function alienship_entry_header_markup_close() {
	echo '</header>';
}
add_action( 'alienship_entry_header', 'alienship_entry_header_markup_close', 15 );




if ( ! function_exists( 'alienship_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since 0.1
 */
function alienship_content_nav( $nav_id ) {

	// Return early if theme options are set to hide nav
	if ( 'nav-below' == $nav_id && ! of_get_option( 'alienship_content_nav_below', 1 )
	|| 'nav-above' == $nav_id && ! of_get_option( 'alienship_content_nav_above' ) )
		return;

	global $wp_query;

	$nav_class = 'site-navigation paging-navigation pager';

	if ( is_single() )
		$nav_class = 'site-navigation post-navigation pager';
	?>

	<nav id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'alienship' ); ?></h3>
		<ul class="pager">
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



/**
 * Print the opening markup for the entry footer.
 *
 * @since 1.2.0
 *
 */
function alienship_entry_footer_markup_open() {
	echo '<footer class="entry-footer">';
}
add_action( 'alienship_entry_footer', 'alienship_entry_footer_markup_open', 5 );



if ( ! function_exists( 'alienship_do_posted_on' ) ) :
/**
 * Prints HTML with date posted information for the current post.
 *
 * @since 0.1
 */
function alienship_do_posted_on() {

	// Return early if theme options are set to hide date
	if ( ! of_get_option( 'alienship_published_date', 1 ) )
		return;

	printf( __( '<span class="published-date"><i class="glyphicon glyphicon-calendar" title="Published date"></i> <a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', 'alienship' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'alienship_entry_footer', 'alienship_do_posted_on', 6 );
endif;



if ( ! function_exists( 'alienship_do_post_author' ) ) :
/**
 * Prints HTML with meta information for the current post's author.
 *
 * @since 0.59
 */
function alienship_do_post_author() {

	// Return early if theme options are set to hide author
	if ( ! of_get_option('alienship_post_author', 1 ) )
		return;

	printf( __( '<span class="byline"><i class="glyphicon glyphicon-user"></i> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'alienship' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'alienship' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
add_action( 'alienship_entry_footer', 'alienship_do_post_author', 7 );
endif;



if ( ! function_exists( 'alienship_do_post_categories' ) ):
/**
 * Customize the list of categories displayed on index and on a post
 * @since 0.3
 */
function alienship_do_post_categories() {

	// Return early if theme options are set to hide categories
	if ( ! of_get_option( 'alienship_post_categories', 1 ) )
		return;

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
add_action( 'alienship_entry_footer', 'alienship_do_post_categories', 8 );
endif;



if ( ! function_exists( 'alienship_do_post_tags' ) ):
/**
 * Customize the list of tags displayed on index and on a post
 * @since 0.3
 */
function alienship_do_post_tags() {

	// Return early if theme options are set to hide tags
	if ( ! of_get_option( 'alienship_post_tags', 1 ) )
		return;

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
add_action( 'alienship_entry_footer', 'alienship_do_post_tags', 9 );
endif;



if ( ! function_exists( 'alienship_do_post_comments_link' ) ):
/**
 * Display the "Leave a comment" message
 * @since .74
 */
function alienship_do_post_comments_link() {

	// Return early if theme options are set to hide comment link
	if ( ! of_get_option( 'alienship_post_comments_link', 1 ) )
		return;

	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="comments-link">
			<i class="glyphicon glyphicon-comment"></i>
			<?php comments_popup_link( __( ' Leave a comment', 'alienship' ), __( ' 1 Comment', 'alienship' ), __( ' % Comments', 'alienship' ) ); ?>
		</span>
	<?php }
}
add_action( 'alienship_entry_footer', 'alienship_do_post_comments_link', 15 );
endif;



/**
 * Print the closing markup for the entry header.
 *
 * @since 1.2.0
 */
function alienship_entry_footer_markup_close() {
	echo '</footer>';
}
add_action( 'alienship_entry_footer', 'alienship_entry_footer_markup_close', 15 );



if ( ! function_exists( 'alienship_header_title_and_description' ) ):
/**
 * Display site title and description below Top Menu navbar
 *
 * @since .55
 * @deprecated since 1.1.1. Use do_action('alienship_site_title') and do_action('alienship_site_description') instead.
 */
function alienship_header_title_and_description() {

	if ( !is_front_page() || !is_home() ) { ?>
		<p id="site-title" class="site-title">
			<span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
			</span>
		</p>
		<p id="site-description" class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>

	<?php } else { ?>

		<h1 id="site-title" class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
		</h1>
		<h2 id="site-description" class="site-description"><?php echo get_bloginfo( 'description' ); ?></h2>

	<?php }
}
endif;



if ( ! function_exists( 'alienship_do_site_title' ) ):
/**
 * Displays site title at top of page
 *
 * @since 1.1.1
 */
function alienship_do_site_title() {

	// Use H1 on home, paragraph elsewhere
	$element = is_front_page() || is_home() ? 'h1' : 'p';

	// Title content that goes inside wrapper
	$site_name = sprintf( '<a href="%s" title="%s" rel="home">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), get_bloginfo( 'name' ) );

	// Put it all together
	$title = '<' . $element . ' id="site-title" class="site-title">' . $site_name . '</' . $element .'>';

	// Echo the title
	echo apply_filters( 'alienship_site_title_content', $title );
}
add_action( 'alienship_site_title', 'alienship_do_site_title' );
endif;



if( ! function_exists( 'alienship_do_site_description' ) ):
/**
 * Displays site description at top of page
 *
 * @since 1.1.1
 */
function alienship_do_site_description() {

	// Use H2 on home, paragraph elsewhere
	$element = is_front_page() || is_home() ? 'h2' : 'p';

	// Put it all together
	$description = '<' . $element . ' id="site-description" class="site-description">' . esc_html( get_bloginfo( 'description' ) ) . '</' . $element . '>';

	// Echo the description
	echo apply_filters( 'alienship_site_description_content', $description );
}
add_action( 'alienship_site_description', 'alienship_do_site_description' );
endif;



/**
 * Gets featured posts
 *
 * @since 1.2.4
 */
function alienship_get_featured_posts() {

	// Check for cached featured posts
	$featured_query = get_transient( 'alienship_featured_posts' );

	if ( false == $featured_query ) {
		// No featured posts in cache
		$args = array(
			'tag_id'         => of_get_option( 'alienship_featured_posts_tag' ),
			'posts_per_page' => of_get_option( 'alienship_featured_posts_maxnum' ),
		);
		$featured_query = new WP_Query( $args );

		// Save featured posts in cache for one hour
		set_transient( 'alienship_featured_posts', $featured_query, 3600 );
	}
	return $featured_query;
}


if ( ! function_exists( 'alienship_featured_posts_grid' ) ):
/**
 * Display featured posts in a grid
 * @since .59
 */
function alienship_featured_posts_grid() {

	$featured_query = alienship_get_featured_posts();

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

	$featured_query = alienship_get_featured_posts();

	if ( $featured_query->have_posts() ) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div id="featured-carousel" class="carousel slide">

				<?php // Featured post indicators?
				if ( of_get_option( 'alienship_featured_posts_indicators', 0 ) ) { ?>
					<ol class="carousel-indicators">

					<?php
						$indicators = $featured_query->post_count;
						$count = 0;
						while ( $count != $indicators ) {
							echo '<li data-target="#featured-carousel" data-slide-to="' . $count . '"></li>';
							$count++;
						}
					?>

					</ol>
				<?php } // alienship_featured_posts_indicators ?>

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
				jQuery("ol.carousel-indicators").children("li:first").addClass("active");
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
add_action( 'alienship_archive_page_title', 'alienship_do_archive_page_title' );
endif;



if ( ! function_exists( 'alienship_get_first_link' ) ):
/**
 * Get the first link in a post
 * Used to link the title to external links on the "Link" post format
 * @since .64
 * @deprecated since 1.0.1. Use 'alienship_link_format_helper' instead.
 */
function alienship_get_first_link() {

	_deprecated_function( __FUNCTION__, '1.0.1', 'alienship_link_format_helper()' );

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



if ( ! function_exists( 'alienship_get_header_image' ) ):
/**
 * Returns header image and accompanying markup
 *
 * @since 1.1.1
 * @return array $header_image_attributes (filtered) Header image attributes
 */
function alienship_get_header_image() {

	global $post;
	$output = '';

	// Get the header image
	if ( get_header_image() ) {

		$header_image_width = get_theme_support( 'custom-header', 'width' );
		$header_image_height = get_theme_support( 'custom-header', 'height' );

		$output = '<a href="' . esc_url( home_url( '/' ) ) . '">';

			// Check if this is a post or page, if it has a thumbnail, and if it's a big one
			if ( is_singular() && has_post_thumbnail( $post->ID )
				/* $src, $width, $height */
				&& ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_height ) ) )
				&& $image[1] >= $header_image_width ) {

				// We have a LARGE image
				$featured_header_image = 'yes';
				$output .= get_the_post_thumbnail( $post->ID, 'post-thumbnail' );

			} else {

				$featured_header_image = 'no';
				$header_image_width  = get_custom_header()->width;
				$header_image_height = get_custom_header()->height;
				$output .= '<img src="' . get_header_image() . '" width="' . $header_image_width . '" height="' . $header_image_height . '" class="header-image" alt="">';
			}
		$output .= '</a>';

		$header_image_attributes = array(
			'width'    => $header_image_width,
			'height'   => $header_image_height,
			'featured' => $featured_header_image,
			'output'   => $output,
		);

		return apply_filters( 'alienship_header_image_attributes', $header_image_attributes );

	}

}
endif;



if( ! function_exists( 'alienship_do_header_image' ) ):
/**
 * Echoes the header image and accompanying markup
 *
 * @since 1.1.1
 */
function alienship_do_header_image() {

	$output = alienship_get_header_image();
	if ( $output )
		echo apply_filters( 'alienship_header_image_output', $output['output'] );
}
add_action( 'alienship_header_image', 'alienship_do_header_image' );
endif;
