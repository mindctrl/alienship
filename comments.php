<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to alienship_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Alien Ship
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="comments-area">
		<h2 class="comments-title">
			<?php
			printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'alienship' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'alienship' ); ?></h1>
				<ul class="pager">
					<li class="previous"><?php previous_comments_link( __( '&laquo; Older Comments', 'alienship' ) ); ?></li>
					<li class="next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'alienship' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
		<?php
			/* Loop through and list the comments. Tell wp_list_comments()
			 * to use alienship_comment() to format the comments.
			 * If you want to override this in a child theme then you can
			 * define alienship_comment() and that will be used instead.
			 * See alienship_comment() in inc/template-tags.php for more.
			 */
			wp_list_comments( array( 'callback' => 'alienship_comment' ) );
		?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'alienship' ); ?></h1>
				<ul class="pager">
					<li class="pull-right"><?php previous_comments_link( __( 'Older Comments &raquo;', 'alienship' ) ); ?></li>
					<li class="pull-left"><?php next_comments_link( __( '&laquo; Newer Comments', 'alienship' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	</div><!-- #comments -->
<?php endif; // have_comments() ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'alienship' ); ?></p>
	<?php endif;

	$args = array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="12" aria-required="true"></textarea></p>',
		'fields'        => array(
			'author' => '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input class="form-control input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true"></p>',
			'email'  => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input class="form-control input-comment-email" id="email" name="email" type="text" value="" size="30" aria-required="true"></p>',
			'url'    => '<p class="comment-form-url"><label for="url">Website</label> <input class="form-control input-comment-url" id="url" name="url" type="text" value="" size="30"></p>',
		),
	);

	comment_form( $args ); ?>
