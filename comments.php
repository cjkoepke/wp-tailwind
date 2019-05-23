<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Freeshifter
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
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wp-tailwind' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h2>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wp-tailwind' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html( 'Older Comments' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html( 'Newer Comments' ) ); ?></div>
				</div>
			</nav>
		<?php
		endif; ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) ); ?>
		</ol>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wp-tailwind' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html( 'Older Comments' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html( 'Newer Comments' ) ); ?></div>
				</div>
			</nav>
		<?php
		endif; ?>

	<?php
	endif; ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html( 'Comments are closed.' ); ?></p>
		<?php
	endif; ?>

	<?php
	comment_form(); ?>
</div>
