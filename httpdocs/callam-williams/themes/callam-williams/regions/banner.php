<?
$type             = get_sub_field( 'banner_type' );
$height           = get_sub_field( 'banner_height' );
$show_text        = get_sub_field( 'show_text' );
$text_orientation = get_sub_field( 'text_orientation' );
$title            = get_sub_field( 'title' );
$text             = get_sub_field( 'text' );

$link_type     = get_sub_field( 'link_type' );
$link_text     = get_sub_field( 'link_text' );
$page_link     = get_sub_field( 'internal_link' );
$external_link = get_sub_field( 'external_link' );
$file_link     = get_sub_field( 'file_link' );

switch ( $height ) {
	case 'Standard':
		$banner_height = 'banner--standard';
		break;
	case 'Small':
		$banner_height = 'banner--small';
		break;
	case 'Homepage':
		$banner_height = 'banner--main';
		break;
	default:
		$banner_height = 'banner--standard';
		break;
}

switch ( $link_type ) {
	case 'Internal':
		$link      = $page_link;
		$link_type = null;
		break;
	case 'External':
		$link      = $external_link;
		$link_type = null;
		break;
	case 'File':
		$link      = $file_link['url'];
		$link_type = '_blank';
		break;
	default:
		$link      = null;
		$link_type = null;
		break;
}

?>

<? if ( $type == 'Image' ):

	if ( $height != 'Homepage' ):

		$images = get_sub_field( 'images' );

		?>

		<section>
			<div class="row row--large">
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
						<? if ( $show_text === true ): ?>
							<div class="banner__modules banner__modules--<?= strtolower( $text_orientation ); ?>">
								<article class="banner__card">
									<div class="banner__content">
										<h1 class="banner__title heading--beta"><?= $title ?></h1>
										<div class="banner__text"><?= $text ?></div>
										<? if ( $link != null ): ?>
											<div class="link">
												<?= $link_text ?>
											</div>
										<? endif; ?>
									</div>
								</article>
							</div>
						<? endif; ?>
					</div>
				</div>
			</div>
		</section>

	<? else: ?>

		<? get_template_part( 'regions/homepage_banner' ); ?>


	<? endif; ?>
<? elseif ( $type == 'Video' ): ?>

	<?
	$iframe   = get_sub_field( 'video' );
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
					<div class="banner__modules">
						<article class="banner__card banner__card--<?= strtolower( $text_orientation ); ?>">
							<div class="banner__content">
								<h1 class="banner__title heading--beta"><?= $title ?></h1>
								<div class="banner__text"><?= $text ?></div>
								<? if ( $link != null ): ?>
									<div class="link">
										<?= $link_text ?>
									</div>
								<? endif; ?>
							</div>
						</article>
					</div>
				</div>
			</div>
		</section>
	<? endif; ?>


<? elseif ( $type == 'Map' ): ?>

	<? $locations = get_sub_field( 'map' ); ?>


	<section>
		<div class="row row--large">
			<div class="small-12">
				<div class="banner banner--map  <?= $banner_height ?>">

					<div id="google-map" class="acf-map" data-lat="<?= $location['lat'] ?>" data-lng="<?= $location['lng'] ?>">
					</div>

				</div>
				<div class="banner__modules">
					<article class="banner__card banner__card--<?= strtolower( $text_orientation ); ?>">
						<div class="banner__content">
							<h1 class="banner__title heading--beta"><?= $title ?></h1>
							<div class="banner__text"><?= $text ?></div>
							<? if ( $link != null ): ?>
								<div class="link">
									<?= $link_text ?>
								</div>
							<? endif; ?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

<? endif; ?>



