<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package matx
 */

get_header(); ?>

	<div class="conetnt-404 text-center">
		<div class="vam">
			<h1>404</h1>
			<p><?php echo esc_html__( "Oops, This page couldn't be found !", 'matx' ); ?></p>
			<a href="<?php echo home_url('/'); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-default btn-highlight"><?php echo esc_html__( 'BACK TO HOME', 'matx' ); ?></a>
		</div>

	</div>

<?php
get_footer();
