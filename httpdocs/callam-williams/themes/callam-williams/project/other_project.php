<?
$ids = get_field( 'other_projects', false, false );

$args = [
	'post_type'      => 'project',
	'posts_per_page' => 3,
	'post__in'       => $ids,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
];
$loop = new WP_Query( $args ); ?>

<section class="other">
	<h1 class="other__title">Other Projects</h1>
	<div class="other__inner">
		<div class="other__pattern">
			<? include get_template_directory() . '/assets/svg/pattern4.svg' ?>
		</div>

		<? while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?
			$image      = get_field( 'project_image', $loop->ID );
			$type       = get_field( 'project_type', $loop->ID );
			?>

			<article class="project project--other">
				<div class="js-img project__image image image--project lazyload" data-bg="<?= $image['sizes']['card'] ?>"></div>
				<a class="project__content" href="<?= get_post_permalink( $loop->ID ); ?>">
					<div class="project__text">
						<header class="project__header">
							<h1 class="project__title"><?= $loop->post_title; ?></h1>
							<h2 class="project__type"><?= $type ?></h2>
						</header>
					</div>
					<div class="project__link">
						View Project
						<span class="icon-angle-double-right"></span>
					</div>
				</a>
			</article>

		<?php endwhile; ?>
		<div class="other__pattern other__pattern--alt">
			<? include get_template_directory() . '/assets/svg/pattern3.svg' ?>
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>


