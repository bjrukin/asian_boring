<?php
/*
 * The template for displaying comments.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<div class="comments-section comment-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'fasindus' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation fasindus-comment-navigation" role="navigation">
			<h2 class="fasindus-screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'fasindus' ); ?></h2>
			<div class="fasindus-nav-links">
				<div class="fasindus-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'fasindus' ) ); ?></div>
				<div class="fasindus-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'fasindus' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ol class="comments">
			<?php wp_list_comments('type=all&callback=fasindus_comment_modification'); ?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="fasindus-comment-nav-below" class="navigation fasindus-comment-navigation" role="navigation">
			<h2 class="fasindus-screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'fasindus' ); ?></h2>
			<div class="fasindus-nav-links">
				<div class="fasindus-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'fasindus' ) ); ?></div>
				<div class="fasindus-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'fasindus' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.
	endif;
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="fasindus-no-comments"><?php echo esc_html__( 'Comments are closed.', 'fasindus' ); ?></p>
	<?php endif; ?>
	</div><!-- .comments-section -->
	<?php
	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div id="respond" class="leave-comment comment-form comment-respond">
		<?php
		$post_comment_text = cs_get_option('post_comment_text');
		$post_comment_text = $post_comment_text ? $post_comment_text : esc_html__( 'Post Comment', 'fasindus' );
		$fields = array(
			'author' => '<div class="form-inputs no-padding-left"><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" placeholder="' . esc_attr__( 'Name', 'fasindus' ) . '"/>',
			'email' => '<input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" placeholder="' . esc_attr__( 'Email', 'fasindus' ) . '"/>',
			'URL' => '<input type="text" id="url" name="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" tabindex="3" placeholder="' . esc_attr__( 'Website', 'fasindus' ) . '"/></div>',
		);
		$defaults = array(
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'fields' => apply_filters( 'comment_form_default_fields', $fields),
      'id_form'              => 'commentform',
      'id_submit'            => 'submit',
      'title_reply'          => esc_html__( 'Add your Comment', 'fasindus' ),
      'title_reply_to'       => wp_kses( __( 'Leave a Reply to %s', 'fasindus' ), array( 'a' => array( 'href' => array(), 'title' => array() ) ) ),
      'cancel_reply_link'    => '<i class="ti-close"></i>',
      'label_submit'         => $post_comment_text,
      'comment_field' 			 => '<div class="form-textarea no-padding-right"><textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="' . esc_attr__( 'Write your comment...', 'fasindus' ) . '" ></textarea></div>'
    );
		comment_form($defaults);
		?>
	</div>
	<?php } ?>
</div><!-- #comments -->
<?php
