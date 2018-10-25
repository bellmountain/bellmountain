<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matx
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

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'matx' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'matx' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'matx' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="comment-list">
			<?php wp_list_comments('type=comment&avatar_size=60&callback=matx_comment_walker'); ?>
		</ul>
		<!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'matx' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'matx' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'matx' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'matx' ); ?></p>

	<?php

	endif;

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$submit_class = 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-black btn-default btn-submit';

	$args = array(
		'id_form'           	=> 'commentform',
		'class_form'      		=> 'comment-form matx-form-valid', 
		'class_submit'      	=> $submit_class, 
		'comment_notes_before' 	=> '',
		'comment_notes_after' 	=> '',
		'title_reply' 			=> esc_html__( 'Leave a comment', 'matx' ),
		'cancel_reply_link' 	=> esc_html__( 'Cancel Reply', 'matx' ),

	  	'comment_field' 		=>  '<div class="row"><div class="col-lg-12"><div class="mdl-textfield mdl-js-textfield mdl-textarea"><textarea id="comment" name="comment" aria-required="true" class="mdl-textfield__input"></textarea><label class="mdl-textfield__label" for="comment">Message</label></div></div></div>',

		'fields' 				=> apply_filters('comment_form_default_fields', 
			array(

				'author' 	=> '<div class="row"><div class="col-lg-4"><div class="mdl-textfield mdl-js-textfield"><input id="author" name="author" class="mdl-textfield__input" value="'.esc_attr( $commenter['comment_author'] ).'"  '.$aria_req.' /><label class="mdl-textfield__label" for="author">Name '.( $req ? '*' : '').'</label></div></div>',

				'email' 	=> '<div class="col-lg-4"><div class="mdl-textfield mdl-js-textfield"><input id="email" name="email" type="text" class="mdl-textfield__input" value="'.esc_attr(  $commenter['comment_author_email'] ).'" '.$aria_req.'/><label class="mdl-textfield__label" for="email">Email '.( $req ? '*' :'').'</label></div></div>',

				'url' 	=> '<div class="col-lg-4"><div class="mdl-textfield mdl-js-textfield"><input id="url" name="url" class="mdl-textfield__input" type="text" value="'.esc_attr( $commenter['comment_author_url'] ).'" /><label class="mdl-textfield__label" for="url">Website</label></div></div></div>'
			)
		) // end apply_filters
	);

	/* start comment comment form */
		echo '<div class="clearfix white-box comment-form cu-form">';
			echo '<div class="comment-form-group">';
				comment_form($args);
			echo '</div>';
		echo '</div>';
	/* end comment comment form */


	?>

</div><!-- #comments -->
