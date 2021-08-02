<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$comment_count = get_comments_number();

?>

<div id="comments" class="container bg-secondary">
	<?php
	if ( have_comments() ) :
		?>
		<h3><?php _e('Comments', TEXT_DOMAIN); ?> </h3><!-- .comments-title -->

		<div class="container">
			<?php
			wp_list_comments(
				array(
					'style'       => 'div',
					'short_ping'  => true,
				)
			);
			?>
		</div><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => ' ',
				'mid_size'           => 0,
				'prev_text'          => esc_html__( 'Older comments', 'twentytwentyone' ),
				'next_text'          => esc_html__( 'Newer comments', 'twentytwentyone' ),
			)
		);
		?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Add a comment', TEXT_DOMAIN),
			'title_reply_before' => '<strong>',
			'title_reply_after'  => '</strong>',
		)
	);
	?>

</div><!-- #comments -->
