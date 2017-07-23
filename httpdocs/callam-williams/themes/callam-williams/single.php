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


<?
$project_type = get_field( 'project_type' );
$project_link = get_field( 'project_link' );
?>
<section class="post">
	<div class="post__info">
		<div class="post__labels">
			<h1 class="post__title"><? the_title(); ?></h1>
			<h2 class="post__subtitle"><?= $project_type ?></h2>
		</div>

		<a href="<?= $project_link ?>" class="btn">
			View Project
			<span class="icon-angle-double-right"></span>
		</a>
	</div>

	<? include( locate_template( '/project/project_banner.php' ) ); ?>

	<? $project_blurb = get_field( 'project_blurb' ); ?>
	<? $project_highlights = get_field( 'project_highlights' ); ?>

	<header class="post__head">
		<div class="post__blurb">
			<?= $project_blurb ?>
		</div>
		<div class="post__highlights">
			<? if ( $project_highlights != '' ): ?>
				<div class="project__highlights">
					<? foreach ( $project_highlights as $key => $highlight ): ?>
						<span><?= $project_highlights[ $key ]['highlight']; ?></span>
					<? endforeach; ?>
				</div>
			<? endif; ?>
		</div>
		<div class="post__pattern">
			<? include get_template_directory() . '/assets/svg/pattern4.svg' ?>
		</div>
	</header>

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


