<?

$args = [
	'post_type'   => 'project',
	'orderby'     => 'meta',
	'order'       => 'DESC',
	'post_status' => 'publish'
];

$loop = new WP_Query( $args );

?>

<? foreach ( array_chunk( $loop->posts, 3, false ) as $article ) : ?>
	<? if ( isset( $article[0] ) ): ?>
		<article class="">
			<a class="" href="<?= get_post_permalink( $article[0]->ID ); ?>">
				<header>
					<h1 class="">
						<?= $article[0]->post_title; ?>
					</h1>
				</header>
			</a>
		</article>
	<? endif; ?>

	<? if ( isset( $article[1] ) ): ?>
		<article class="">
			<a class="" href="<?= get_post_permalink( $article[1]->ID ); ?>">
				<header>
					<h1 class="">
						<?= $article[1]->post_title; ?>
					</h1>
				</header>
			</a>
		</article>
	<? endif; ?>

	<? if ( isset( $article[2] ) ): ?>
		<article class="">
			<a class="" href="<?= get_post_permalink( $article[2]->ID ); ?>">
				<header>
					<h1 class="">
						<?= $article[2]->post_title; ?>
					</h1>
				</header>
			</a>
		</article>
	<? endif; ?>
<? endforeach; ?>



<?php wp_reset_postdata(); ?>
