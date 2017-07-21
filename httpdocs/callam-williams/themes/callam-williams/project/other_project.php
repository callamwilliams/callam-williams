<?
$args = [
	'post_type'      => 'project',
	'posts_per_page' => 4,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
];
$loop = new WP_Query( $args ); ?>

<section class="">

	<? while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<? $project_image = get_field( 'project_image', $loop->ID ); ?>
		<? $project_blurb = get_field( 'project_blurb', $loop->ID ); ?>

		<article class="">
			<a class="" href="<? the_permalink(); ?>">
				<figure class="js-img" data-bg="<?= $project_image; ?>">
					<figcaption>
						<h1 class=""><? the_title(); ?></h1>
						<p><?= $project_blurb ?></p>
					</figcaption>
				</figure>
			</a>
		</article>

	<?php endwhile; ?>

</section>

<?php wp_reset_postdata(); ?>


