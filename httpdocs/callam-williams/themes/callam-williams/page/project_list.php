<?

$args = [
	'post_type'   => 'project',
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_status' => 'publish'
];

$loop = new WP_Query( $args );
$i    = 0;
while ( $loop->have_posts() ) : $loop->the_post();
	$i ++;
	?>

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

<?php wp_reset_postdata(); ?>
