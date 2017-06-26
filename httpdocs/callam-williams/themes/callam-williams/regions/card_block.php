<?
$background_type = get_sub_field( 'background_type' );
$background      = get_sub_field( 'card_background' );
$sidetitle       = get_sub_field( 'sidetitle' );
?>

<? if ( $background_type == 'Image' ): ?>
<section class="content content--overflow">
	<? if ( $background ): ?>
		<div class="js-img lazyload image image--background"
		     data-bg="<?= $background['sizes']['background'] ?>">
		</div>
	<? endif; ?>
	<? endif; ?>
	<? if ( have_rows( 'cards' ) ): ?>
		<section class="row">
			<div class="small-12">
				<div class="card">
					<div class="sidetitle <?= ( $background_type === 'No Image') ? 'sidetitle--primary' : null ?>">
						<div class="sidetitle__inside">
							<?= $sidetitle ?>
						</div>
					</div>
					<div class="card__inner">
						<div class="row small-up-1 medium-up-2 small-collapse">
							<? $count = 0; ?>
							<?php while ( have_rows( 'cards' ) ): the_row();

								// vars
								$count ++;
								$image         = get_sub_field( 'image' );
								$title         = get_sub_field( 'title' );
								$subtitle      = get_sub_field( 'subtitle' );
								$text          = get_sub_field( 'text' );
								$link_type     = get_sub_field( 'link_type' );
								$page_link     = get_sub_field( 'internal_link' );
								$external_link = get_sub_field( 'external_link' );
								$file_link     = get_sub_field( 'file_link' );
								$link_text     = get_sub_field( 'link_text' );

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

								<? if ( ( $count % 2 ) == 1 ): ?>

									<div class="column">
										<div class="card__img card__img--left">
											<figure class="js-parallax lazyload card__picture" data-scroll="2" style="background-image:url(<?= $image['sizes']['card']; ?>)">
												<? if ( $image['alt'] != '' ): ?>
													<figcaption class="seo">
														<?= $image['alt']; ?>
													</figcaption>
												<? endif; ?>
											</figure>
										</div>
									</div>

								<? endif; ?>

								<div class="column <?= ( ( $count % 2 ) == 0 ) ? 'small-order-2 medium-order-reset' : null ?>">
									<? if ( $link != null ): ?>
									<a class="" href="<?= $link ?>" <?= ( $link_type ) != null ? 'target="_blank" rel="noopener"' : null ?>>
										<? endif; ?>
										<div class="card__content">
											<div class="card__inside">
												<h1 class="card__title text--charlie text--upper"><?= $title ?></h1>
												<div class="card__text"><?= $text ?></div>
												<? if ( $link != null ): ?>
													<div class="link card__link">
														<?= $link_text ?>
													</div>
												<? endif; ?>
											</div>
										</div>
										<? if ( $link != null ): ?>
									</a>
								<? endif; ?>
								</div>

								<? if ( ( $count % 2 ) == 0 ): ?>

									<div class="column small-order-1 medium-order-reset">

										<div class="card__img card__img--right">
											<figure class="js-img js-parallax lazyload card__picture" data-scroll="4" data-bg="<?= $image['sizes']['card']; ?>">
												<? if ( $image['alt'] != '' ): ?>
													<figcaption class="seo">
														<?= $image['alt']; ?>
													</figcaption>
												<? endif; ?>
											</figure>
										</div>
									</div>

								<? endif; ?>

							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>

		</section>
	<?php endif; ?>
	<? if ( $background_type == 'Image' ): ?>
</section>
<? endif; ?>
