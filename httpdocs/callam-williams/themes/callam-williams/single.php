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

<? include( locate_template( '/project/project_banner.php' ) ); ?>

<? $project_highlights = get_field( 'project_highlights' ); ?>
<? $project_blurb = get_field( 'project_blurb' ); ?>

<?= $project_blurb ?>
<?= $project_highlights ?>

<? include( locate_template( '/project/project_content.php' ) ); ?>
<? include( locate_template( '/project/other_projects.php' ) ); ?>

<?php get_footer(); ?>


