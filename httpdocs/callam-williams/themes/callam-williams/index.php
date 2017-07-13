<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://wphierarchy.com/
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppt
 */


get_header(); ?>


<?php if ( have_rows( 'layout' ) ) {

	while ( have_rows( 'layout' ) ) {

		the_row();

		include( locate_template( '/regions/' . get_row_layout() . '.php' ) );

	}

} ?>

<?php get_footer(); ?>