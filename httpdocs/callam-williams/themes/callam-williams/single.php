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
<? $image = get_field( 'project_image' ); ?>
<div class="banner banner--header">
	<div class="js-img banner__img lazyload" data-bg="<?= $image['sizes']['banner']; ?>"></div>
</div>

<section class="post">

	<? include( locate_template( '/project/project_info.php' ) ); ?>
	<? include( locate_template( '/project/project_banner.php' ) ); ?>
	<? include( locate_template( '/project/project_blurb.php' ) ); ?>



	<? include( locate_template( '/project/project_content.php' ) ); ?>

	<div class="post__link">
		<a href="<?= $project_link ?>" class="btn btn--alt">
			View Project
			<span class="icon-angle-double-right"></span>
		</a>
	</div>

	<? include( locate_template( '/project/other_project.php' ) ); ?>

</section>
<?php get_footer(); ?>


