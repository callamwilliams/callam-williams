<?

$args = [
	'post_type'   => 'project',
	'orderby'     => 'meta',
	'order'       => 'DESC',
	'post_status' => 'publish'
];

$loop = new WP_Query( $args );

?>
<div class="projects">

	<? foreach ( array_chunk( $loop->posts, 3, false ) as $article ) : ?>
		<div class="projects__break">
			<div class="projects__pattern">
				<? include get_template_directory() . '/assets/svg/pattern4.svg' ?>
			</div>
		</div>
		<? $i = 0; ?>
		<? if ( isset( $article[ $i ] ) ): ?>
			<?
			$image      = get_field( 'project_image', $article[ $i ]->ID );
			$type       = get_field( 'project_type', $article[ $i ]->ID );
			$highlights = get_field( 'project_highlights', $article[ $i ]->ID );
			?>

			<article class="project project--left">
				<div class="js-img project__image image image--project lazyload" data-bg="<?= $image['sizes']['card'] ?>"></div>
				<? include get_template_directory() . '/assets/svg/pattern2.svg' ?>
				<a class="project__content" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
					<div class="project__text">
						<header class="project__header">
							<h1 class="project__title"><?= $article[ $i ]->post_title; ?></h1>
							<h2 class="project__type"><?= $type ?></h2>
						</header>
						<? if ( $highlights != '' ): ?>
							<div class="project__highlights">
								<? foreach ( $highlights as $key => $highlight ): ?>
									<span><?= $highlights[ $key ]['highlight']; ?></span>
								<? endforeach; ?>
							</div>
						<? endif; ?>
					</div>
					<div class="project__link">
						View Project
						<span class="icon-angle-double-right"></span>
					</div>
				</a>
				<? include get_template_directory() . '/assets/svg/pattern3.svg' ?>
			</article>
		<? endif; ?>



		<? $i ++; ?>
		<? if ( isset( $article[ $i ] ) ): ?>
			<?
			$image      = get_field( 'project_image', $article[ $i ]->ID );
			$type       = get_field( 'project_type', $article[ $i ]->ID );
			$highlights = get_field( 'project_highlights', $article[ $i ]->ID );
			?>
			<article class="project project--right">
				<div class="js-img project__image image image--project lazyload" data-bg="<?= $image['sizes']['card'] ?>"></div>
				<a class="project__content" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
					<div class="project__text">
						<header class="project__header">
							<h1 class="project__title"><?= $article[ $i ]->post_title; ?></h1>
							<h2 class="project__type"><?= $type ?></h2>
						</header>
						<? if ( $highlights != '' ): ?>
							<div class="project__highlights">
								<? foreach ( $highlights as $key => $highlight ): ?>
									<span><?= $highlights[ $key ]['highlight']; ?></span>
								<? endforeach; ?>
							</div>
						<? endif; ?>
					</div>
					<div class="project__link">
						View Project
						<span class="icon-angle-double-right"></span>
					</div>
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
			<article class="project project--center">
				<div class="project__full">
					<div class="js-img project__image image image--project lazyload" data-bg="<?= $image['sizes']['card'] ?>"></div>
					<a class="project__content" href="<?= get_post_permalink( $article[ $i ]->ID ); ?>">
						<div class="project__text">
							<header class="project__header">
								<h1 class="project__title"><?= $article[ $i ]->post_title; ?></h1>
								<h2 class="project__type"><?= $type ?></h2>
							</header>
							<? if ( $highlights != '' ): ?>
								<div class="project__highlights">
									<? foreach ( $highlights as $key => $highlight ): ?>
										<span><?= $highlights[ $key ]['highlight']; ?></span>
									<? endforeach; ?>
								</div>
							<? endif; ?>
						</div>
						<div class="project__link">
							View Project
							<span class="icon-angle-double-right"></span>
						</div>
					</a>
				</div>
				<? include get_template_directory() . '/assets/svg/pattern1.svg' ?>
			</article>
		<? endif; ?>
	<? endforeach; ?>
</div>

<?php wp_reset_postdata(); ?>
