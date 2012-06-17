<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

if ( ! function_exists('alienship_excerpt_or_content') ):
/**
 * Displays post content or excerpt
 * @since Alien Ship .593
 */
function alienship_excerpt_or_content() {
  if ( !is_singular() && of_get_option('alienship_archive_display', "full") == "excerpt" ) {
    if ( has_post_thumbnail() ) {
      global $post; ?>
      <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'alignleft', 'title' => "")); ?></a>
    <?php } // has_post_thumbnail ?>
    <?php
    the_excerpt();
  } else {
    the_content();
  }
}
add_action('alienship_content', 'alienship_excerpt_or_content');
endif;



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
    <div class="nav-previous pull-right"><?php next_posts_link( __( 'Next page <span class="meta-nav">&rarr;</span>', 'alienship' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next pull-left"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Previous page', 'alienship' ) ); ?></div>
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
          <?php printf( __( '%s', 'alienship' ), sprintf( '<cite class="name">%s</cite>', get_comment_author_link() ) ); ?>
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



if ( ! function_exists( 'alienship_post_author' ) ) :
/**
 * Prints HTML with meta information for the current post's author.
 *
 * @since Alien Ship 0.59
 */
function alienship_post_author() {
  printf( __( '<span class="byline"><i class="icon-user"></i> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a><span class="sep">&nbsp; &nbsp; &nbsp;</span></span></span>', 'alienship' ),
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'alienship' ), get_the_author() ) ),
    esc_html( get_the_author() )
  );
}
endif;



if ( ! function_exists( 'alienship_posted_on' ) ) :
/**
 * Prints HTML with date posted information for the current post.
 *
 * @since Alien Ship 0.1
 */
function alienship_posted_on() {
  printf( __( '<i class="icon-calendar" title="Published date"></i> <a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="sep">&nbsp; &nbsp; &nbsp;</span>', 'alienship' ),
    esc_url( get_permalink() ),
    esc_attr( get_the_time() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() )
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


if ( ! function_exists( 'alienship_post_tags' ) ):
/**
 * Customize the list of tags displayed on index and on a post
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
    $html_before = "\t\t\t\t\t<a href=\"" . get_tag_link($tag->term_id) . "\" rel=\"tag$nofollow\" class=\"label label-info\">";
    $html_after = '</a>';
    if ($tag_count < $num_tags)
      $sep = "\n";
    elseif ($tag_count == $num_tags)
    $sep = "\n";
    echo $html_before . $tag->name . $html_after . $sep;
    $tag_count++;
    }
    echo "\t\t\t</span><span class=\"sep\">&nbsp; &nbsp;</span>\n";
  }
}
endif;


if ( ! function_exists( 'alienship_post_categories' ) ):
/**
 * Customize the list of categories displayed on index and on a post
 * @since Alien Ship 0.3
 */
function alienship_post_categories() {
  global $alienship_design;
  $post_categories = get_the_category();
  if ($post_categories) {
    echo "\t<span class=\"cat-links\"><i class=\"icon-folder-open\" title=\"Categories\"></i>&nbsp;\n";
    $num_categories = count($post_categories);
    $category_count = 1;
    foreach ($post_categories as $category) {
    // "category tag" is only proposed at this point - $html_before = "\t\t<a href=\"" . get_category_link($category->term_id) . "\" rel=\"category tag\" class=\"label\">";
    $html_before = "\t\t<a href=\"" . get_category_link($category->term_id) . "\" class=\"label label-info\">";
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
endif;


if ( ! function_exists('alienship_header_title_and_description') ):
/**
 * Display site title and description below Top Menu navbar
 * @since Alien Ship .55
 */
function alienship_header_title_and_description() {
  $home_url = esc_url( home_url( '/' ) );
  $site_name = esc_attr( get_bloginfo( 'name', 'display' ) );
  $site_description = get_bloginfo( 'description' );
  echo <<<TITLE_AND_DESC
    <hgroup>
      <h1 id="site-title" class="site-title"><span><a href="{$home_url}" title="{$site_name}" rel="home">{$site_name}</a></span></h1>
      <h2 id="site-description" class="site-description">{$site_description}</h2>
    </hgroup>
TITLE_AND_DESC;
} endif;



if ( ! function_exists('alienship_featured_posts_grid') ):
/**
 * Display featured posts in a grid
 * @since Alien Ship .59
 */
function alienship_featured_posts_grid() {
  $featured_query = new WP_Query( 'tag_id='.of_get_option('alienship_featured_posts_tag').'&posts_per_page='.of_get_option('alienship_featured_posts_maxnum').'' ); ?>
  <?php if ( $featured_query->have_posts() ) {
  echo "\t<ul id=\"featured-posts-grid\" class=\"block-grid mobile two-up\">"; ?>

  <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

    <?php get_template_part( '/inc/parts/content', 'fp-grid' ); ?>

  <?php endwhile; ?>
  <?php echo "</ul>";
  }
}
endif;


if ( ! function_exists('alienship_featured_posts_slider') ):
/**
 * Display featured posts in a slider
 * @since Alien Ship .59 (The function. The feature @since Alien Ship .4)
 */
function alienship_featured_posts_slider() {
  $featured_query = new WP_Query( 'tag_id='.of_get_option('alienship_featured_posts_tag').'&posts_per_page='.of_get_option('alienship_featured_posts_maxnum').'' ); ?>
  <?php if ( $featured_query->have_posts() ) {
    echo "\t<div class=\"row-fluid\">";
      echo "\t<div class=\"span12\">";
        echo "\t<div id=\"featured-carousel\" class=\"carousel slide\">";
          echo "\t<div class=\"carousel-inner\">"; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

            <?php get_template_part( '/inc/parts/content', 'featured' ); ?>

            <?php endwhile; ?>
          <?php echo "\t</div><!-- .carousel-inner -->"; ?>
          <?php echo "\t<a class=\"left carousel-control\" href=\"#featured-carousel\" data-slide=\"prev\">&lsaquo;</a>";
          echo "\t<a class=\"right carousel-control\" href=\"#featured-carousel\" data-slide=\"next\">&rsaquo;</a>";
        echo "\t</div><!-- #featured-carousel -->";
      echo "\t</div><!-- .span12 -->";
    echo "\t</div><!-- .row-fluid -->"; ?>
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


if ( ! function_exists('alienship_archive_page_title') ):
/**
 * Display page title on archive pages
 * @since Alien Ship .592
 */
function alienship_archive_page_title() { ?>
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
        echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

    } elseif ( is_tag() ) {
      // show an optional tag description
      $tag_description = tag_description();
      if ( ! empty( $tag_description ) )
        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
    }
  ?>
</header>
<?php }
endif;



if ( ! function_exists('alienship_archive_sticky_posts') ):
/**
 * Display sticky posts
 * @since Alien Ship .594
 */
function alienship_archive_sticky_posts() {
  $sticky = get_option( 'sticky_posts' );
  if ( ! empty( $sticky ) ) {
    global $do_not_duplicate;
    global $page, $paged;
    $do_not_duplicate = array();

    if (is_category() ) {
      $cat_ID = get_query_var('cat');
      $sticky_args = array (
        'post__in' => $sticky,
        'cat' => $cat_ID,
        'post_status' => 'publish',
        'paged' => $paged
      );

    } elseif (is_tag() ) {
      $current_tag = single_tag_title("", false);
        $sticky_args = array(
          'post__in' => $sticky,
          'tag_slug__in' => array($current_tag),
          'post_status' => 'publish',
          'paged' => $paged
        );
    }
  if ( ! empty( $sticky_args ) ):
  $sticky_posts = new WP_Query( $sticky_args );
    if ( $sticky_posts->have_posts() ):
      global $post;
      while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();
        array_push($do_not_duplicate, $post->ID);
        $format = get_post_format();
        if ( false === $format )
        $format = 'standard';
        get_template_part( '/inc/parts/content', $format );
      endwhile;
    endif; // if have posts
    endif; // if ( ! empty( $sticky_args ) )
  } //if not empty sticky
}
endif;



if ( ! function_exists('alienship_archive_get_posts') ):
/**
 * Display archive posts and exclude sticky posts
 * @since Alien Ship .594
 */
function alienship_archive_get_posts() {
  global $do_not_duplicate;
  global $page, $paged;
  if ( is_category() ) {
    $cat_ID = get_query_var('cat');
    $args = array(
      'cat' => $cat_ID,
      'post_status' => 'publish',
      'post__not_in' => array_merge($do_not_duplicate,get_option( 'sticky_posts' )),
      'ignore_sticky_posts' => 1,
      'paged' => $paged
      );
    $wp_query = new WP_Query( $args );
  } elseif (is_tag() ) {
      $current_tag = single_tag_title("", false);
      $args = array(
        'tag_slug__in' => array($current_tag),
        'post_status' => 'publish',
        'post__not_in' => array_merge($do_not_duplicate,get_option( 'sticky_posts' )),
        'ignore_sticky_posts' => 1,
        'paged' => $paged
        );
      $wp_query = new WP_Query( $args );
  } else {
      new WP_Query();
  }
}
endif;


if ( ! function_exists('alienship_get_first_link') ):
/**
 * Get the first link in a post
 * Used to link the title to external links on the "Link" post format
 * @since Alien Ship .64
 */
function alienship_get_first_link() {
  global $link_url;
  global $post_content;
  $content = get_the_content();
  $link_start = stristr($content, "http" );
  $link_end = stristr($link_start, "\n");
  if ( ! strlen( $link_end ) == 0 ):
  $link_url = substr($link_start, 0, -(strlen($link_end) + 1));
  else:
  $link_url = $link_start;
  endif;
  $post_content = substr($content, strlen($link_url));
}
endif;
/*
function alienship_page_nav($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 4;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }
  echo $before.'<nav id="numbered-nav-below" class="pagination"><ul class="alienship_page_nav">'."";
  if ($start_page >= 2 && $pages_to_show < $max_page) {
    $first_page_text = "First";
    echo '<li class="alienship-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
  }
  echo '<li class="alienship-prev-link">';
  previous_posts_link('&laquo;');
  echo '</li>';
  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="alienship-current-page-link active">'.$i.'</li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="alienship-next-link">';
  next_posts_link('&raquo;');
  echo '</li>';
  if ($end_page < $max_page) {
    $last_page_text = "Last";
    echo '<li class="alienship-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
  }
  echo '</ul></nav>'.$after."";
}
*/
