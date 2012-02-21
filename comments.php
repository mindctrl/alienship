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
 * @since Alien Ship 0.1
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'alienship' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'alienship' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'alienship' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'alienship' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alienship' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use alienship_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define alienship_comment() and that will be used instead.
				 * See alienship_comment() in alienship/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'alienship_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'alienship' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'alienship' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alienship' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<div class="alert alert-block fade in">
    	<a class="close" data-dismiss="alert">x</a>
			<p class="nocomments"><?php _e( 'Comments are closed.', 'alienship' ); ?></p>
		</div>
	<?php endif; ?>


<?php
	// If comments are open
	if (comments_open()) { ?>
  <section id="respond">
    <h3><?php comment_form_title(__('Leave a Reply', 'alienship'), __('Leave a Reply to %s', 'alienship')); ?></h3>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) { ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'alienship'), wp_login_url(get_permalink())); ?></p>
   	<?php } else { ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  <?php if (is_user_logged_in()) { ?>
    <p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'alienship'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'alienship'); ?>"><?php _e('Log out &raquo;', 'alienship'); ?></a></p>
  <?php } else { ?>
  
    <label for="author" class="control-label"><?php _e('Name', 'alienship'); if ($req) _e(' (required)', 'alienship'); ?></label>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i> </span><input type="text" class="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
    </div><!-- /input-prepend -->

    <label for="email" class="control-group"><?php _e('Email (will not be published)', 'alienship'); if ($req) _e(' (required)', 'alienship'); ?></label>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i> </span><input type="email" class="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
    </div><!-- /input-prepend -->

		<label for="url" class="control-label"><?php _e('Website', 'alienship'); ?></label>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-home"></i> </span><input type="url" class="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
    </div><!-- /input-prepend -->

  <?php } ?>

  <label for="comment" class="control-label"><?php _e('Comment', 'alienship'); ?></label>
  <div class="input-prepend">
  <span class="add-on"><i class="icon-comment"></i> </span><textarea name="comment" id="comment" class="input-large" rows="6" tabindex="4"></textarea>
  </div><!-- /input-prepend -->

  <input name="submit" class="btn btn-primary" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'alienship'); ?>">
  <?php comment_id_fields(); ?>
  <?php do_action('comment_form', $post->ID); ?>
</form>
<?php } // if registration required and not logged in ?>
</section><!-- #respond -->
<?php } ?>
</div>