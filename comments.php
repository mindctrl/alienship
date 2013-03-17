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
<?php if ( ! comments_open() ) {
  return;
} ?>

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
    <nav id="comment-nav-above" class="pager">
      <h3 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'alienship' ); ?></h3>
      <div class="nav-previous pull-left"><?php previous_comments_link( __( '&larr; Older Comments', 'alienship' ) ); ?></div>
      <div class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alienship' ) ); ?></div>
    </nav>
    <?php endif; // check for comment navigation ?>

    <ol class="commentlist">
      <?php
        /* Loop through and list the comments. Tell wp_list_comments()
         * to use alienship_comment() to format the comments.
         * If you want to overload this in a child theme then you can
         * define alienship_comment() and that will be used instead.
         * See alienship_comment() in inc/template-tags.php for more.
         */
        wp_list_comments( array( 'callback' => 'alienship_comment' ) );
      ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-below" class="pager">
      <h3 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'alienship' ); ?></h3>
      <div class="nav-previous pull-left"><?php previous_comments_link( __( '&larr; Older Comments', 'alienship' ) ); ?></div>
      <div class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alienship' ) ); ?></div>
    </nav>
    <?php endif; // check for comment navigation ?>

  <?php endif; // have_comments() ?>

  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <div class="alert alert-block fade in">
      <p class="nocomments"><?php _e( 'Comments are closed.', 'alienship' ); ?></p>
    </div>
  <?php endif; ?>

<?php
  // If comments are open
  if ( comments_open() ) { ?>
  <section id="respond">
    <?php
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text = sprintf( ' ' . __('Required fields are marked %s', 'alienship'), '<span class="required">*</span>' );
    $comment_form_args = array(
      'id_form'              => 'commentform',
      'id_submit'            => 'commentsubmit',
      'title_reply'          => __( 'Leave a Reply', 'alienship' ),
      'title_reply_to'       => __( 'Leave a Reply to %s', 'alienship' ),
      'cancel_reply_link'    => __( 'Cancel Reply', 'alienship' ),
      'label_submit'         => __( 'Post Comment', 'alienship' ),
      'comment_field'        => '<label for="comment" class="comment-label">' . _x( 'Comment', 'noun', 'alienship' ) . '</label><div class="input-prepend"><span class="add-on"><i class="icon-comment"></i></span><textarea class="input-large" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
      'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
      'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
      'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'alienship' ) . ( $req ? $required_text : '' ) . '</p>',
      'comment_notes_after'  => '',
      'fields'               => apply_filters( 'comment_form_default_fields', array(
                                              'author' => '' . '<label for="author" class="comment-label">' . __( 'Name', 'alienship' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<div class="input-prepend"><span class="add-on"><i class="icon-user"></i> </span><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                                              'email'  => '<label for="email" class="comment-label">' . __( 'Email', 'alienship' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i> </span><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
                                              'url'    => '<label for="url" class="comment-label">' . __( 'Website', 'alienship' ) . '</label>' . '<div class="input-prepend"><span class="add-on"><i class="icon-home"></i> </span><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>' )
                                              )
                );

    comment_form( $comment_form_args ); ?>
  </section><!-- #respond -->
<?php } //comments_open ?>
</div>
