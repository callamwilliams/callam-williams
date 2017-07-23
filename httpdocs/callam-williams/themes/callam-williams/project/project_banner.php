<?
$banner_type = get_field( 'project_banner_type' );
$images      = get_field( 'project_gallery' );
?>

<? if ( $banner_type == 'image' ): ?>

	<section>
		<div class="banner banner--post">
			<div class="js-slider">
				<?php foreach ( $images as $image ): ?>

					<figure class="js-img lazyload banner__img" data-bg="<?= $image['sizes']['banner']; ?>">
						<? if ( $image['alt'] != '' ): ?>
							<figcaption class="seo">
								<?= $image['alt']; ?>
							</figcaption>
						<? endif; ?>
					</figure>

				<? endforeach; ?>
			</div>
		</div>
	</section>

<? elseif ( $banner_type == 'video' ): ?>

	<?
	$iframe   = get_field( 'project_video' );
	$autoplay = get_sub_field( 'project_autoplayTrue' );
	preg_match( '/src="(.+?)"/', $iframe, $matches );
	$src = $matches[1];
	preg_match( '/embed\/(.*)\?/', $src, $id_matches );
	$youtube_id = $id_matches[1];
	?>

	<? if ( $iframe ): ?>
		<section>
			<div class="banner banner--post">
				<div id="js-video" class="banner__video iframe" data-src="<?= $youtube_id ?>" data-autoplay="<?= $autoplay ?>">
					<div class="js-img" id="player" data-player="true"></div>
				</div>
				<figure class="js-img lazyload banner__img" data-bg="<?= $image['sizes']['banner']; ?>">
					<? if ( $image['alt'] != '' ): ?>
						<figcaption class="seo">
							<?= $image['alt']; ?>
						</figcaption>
					<? endif; ?>
				</figure>
			</div>
		</section>
	<? endif; ?>
<? endif; ?>
