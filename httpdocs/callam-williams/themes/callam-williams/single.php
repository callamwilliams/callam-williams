<?php
/**
 * The template for displaying a single post.
 *
 * @link http://wphierarchy.com/
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wppt
 */

get_header(); ?>

	<main id="main">
		<? if ( have_rows( 'main_layout' ) ) {
			while ( have_rows( 'main_layout' ) ) {
				the_row();

				include get_template_directory() . '/regions/' . get_row_layout() . '.php';
			}
		} else {
			echo '<p>Please add a new layout field to the main_layout group in ACF and then build a new module within regions/ to echo the content .</p>';
		} ?>
	</main>

<?php get_footer(); ?>