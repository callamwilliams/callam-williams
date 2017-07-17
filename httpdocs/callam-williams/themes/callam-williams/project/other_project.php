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

	<? while ( $loop->have_posts() ) : $loop->the_post();
		$i ++ ?>

		<article class="">
			<a class="" href="<? the_permalink(); ?>">
				<header>
					<h1 class="">
						<?php the_title(); ?>
					</h1>
				</header>
			</a>
		</article>

	<?php endwhile; ?>

</section>

<?php wp_reset_postdata(); ?>


