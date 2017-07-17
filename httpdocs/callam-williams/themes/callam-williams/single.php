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

<? $project_type = get_field( 'project_type' ); ?>
<? $project_link = get_field( 'project_link' ); ?>
<? $project_highlights = get_field( 'project_highlights' ); ?>
<? $project_blurb = get_field('project_blurb'); ?>

<?= $project_type ?>
<?= $project_link ?>
<?= $project_highlights ?>
<?= $project_blurb ?>

<? include( locate_template( '/project/project_banner.php' ) ); ?>
<? include( locate_template( '/project/project_content.php' ) ); ?>
<? include( locate_template( '/project/other_projects.php' ) ); ?>

<?php get_footer(); ?>