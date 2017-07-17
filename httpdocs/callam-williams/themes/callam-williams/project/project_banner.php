<?
$project_banner_type = get_field( 'project_banner_type' );

?>

<? if ( $project_banner_type == 'Image' ):

	$images = get_field( 'project_gallery' );

	?>

	<section>
		<div class="row">
			<div class="small-12">
				<div class="banner <?= $banner_height ?>">
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
			</div>
		</div>
	</section>


<? elseif ( $project_banner_type == 'Video' ): ?>

	<?
	$iframe   = get_field( 'project_video' );
	$autoplay = get_sub_field( 'autoplay' );
	preg_match( '/src="(.+?)"/', $iframe, $matches );
	$src = $matches[1];
	preg_match( '/embed\/(.*)\?/', $src, $id_matches );
	$youtube_id = $id_matches[1];
	?>

	<? if ( $iframe ): ?>
		<section>
			<div class="row row--large">
				<div class="small-12">
					<div class="banner  <?= $banner_height ?>">
						<div id="js-video" class="banner__video iframe" data-src="<?= $youtube_id ?>" data-autoplay="<?= $autoplay ?>">
							<div class="js-img" id="player" data-player="true"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<? endif; ?>
<? endif; ?>
