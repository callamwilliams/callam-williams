<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * To use this, duplicate this file and add a -slug suffix for your current page
 *
 * This template is now used for acf to load in your layout templates
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