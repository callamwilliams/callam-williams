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
	<? $i = 0; ?>
	<? if ( isset( $article[ $i ] ) ): ?>
		<?
		$image      = get_field( 'project_image', $article[ $i ]->ID );
		$type       = get_field( 'project_type', $article[ $i ]->ID );
		$highlights = get_field( 'project_highlights', $article[ $i ]->ID );
		?>

		<article class="">
			<div class="js-img lazyload image image--project" data-bg="<?= $image['sizes']['card'] ?>"></div>
			<a class="" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
				<header>
					<h1 class=""><?= $article[ $i ]->post_title; ?></h1>
					<h2><?= $type ?></h2>
				</header>
				<? if ($highlights != '' ): ?>
					<? foreach ( $highlights as $key => $highlight ): ?>
						<span><?= $highlights[ $key ]['highlight']; ?></span>
					<? endforeach; ?>
				<? endif; ?>
			</a>
		</article>
	<? endif; ?>

	<? $i ++; ?>
	<? if ( isset( $article[ $i ] ) ): ?>
		<?
		$image      = get_field( 'project_image', $article[ $i ]->ID );
		$type       = get_field( 'project_type', $article[ $i ]->ID );
		$highlights = get_field( 'project_highlights', $article[ $i ]->ID );
		?>
		<article class="">
			<div class="js-img lazyload image image--project" data-bg="<?= $image['sizes']['card'] ?>"></div>
			<a class="" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
				<header>
					<h1 class=""><?= $article[ $i ]->post_title; ?></h1>
					<h2><?= $type ?></h2>
				</header>
				<? if ( isset( $highlights ) ): ?>
					<? foreach ( $highlights as $key => $highlight ): ?>
						<span><?= $highlights[ $key ]['highlight']; ?></span>
					<? endforeach; ?>
				<? endif; ?>
			</a>
		</article>
	<? endif; ?>

	<? $i ++; ?>
	<? if ( isset( $article[ $i ] ) ): ?>
		<?
		$image      = get_field( 'project_image', $article[ $i ]->ID );
		$type       = get_field( 'project_type', $article[ $i ]->ID );
		$highlights = get_field( 'project_highlights', $article[ $i ]->ID );
		?>
		<article class="">
			<div class="js-img lazyload image image--project" data-bg="<?= $image['sizes']['card'] ?>"></div>
			<a class="" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
				<header>
					<h1 class=""><?= $article[ $i ]->post_title; ?></h1>
					<h2><?= $type ?></h2>
				</header>
				<? if ( isset( $highlights ) ): ?>
					<? foreach ( $highlights as $key => $highlight ): ?>
						<span><?= $highlights[ $key ]['highlight']; ?></span>
					<? endforeach; ?>
				<? endif; ?>
			</a>
		</article>
	<? endif; ?>
<? endforeach; ?>



<?php wp_reset_postdata(); ?>
