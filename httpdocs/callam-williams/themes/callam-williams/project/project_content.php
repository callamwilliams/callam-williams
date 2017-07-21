<? if ( have_rows( 'project_content' ) ): ?>
	<section class="row">
		<div class="small-12">
			<div class="row small-up-1 medium-up-2 small-collapse">
				<? $count = 0; ?>
				<?php while ( have_rows( 'project_content' ) ): the_row();

					$count ++;
					$text  = get_sub_field( 'text' );
					$image = get_sub_field( 'image' );
					?>

					<? if ( ( $count % 2 ) === 0 ): ?>

						<div class="column">
							<figure class="js-img js-parallax lazyload" data-bg="<?= $image['sizes']['card']; ?>">
								<? if ( $image['alt'] != '' ): ?>
									<figcaption class="seo">
										<?= $image['alt']; ?>
									</figcaption>
								<? endif; ?>
							</figure>
						</div>

					<? endif; ?>

					<div class="column <?= ( ( $count % 2 ) == 1 ) ? 'small-order-2 medium-order-reset' : null ?>">
						<?= $text ?>
					</div>

					<? if ( ( $count % 2 ) === 1 ): ?>

						<div class="column small-order-1 medium-order-reset">
							<figure class="js-img js-parallax lazyload" data-bg="<?= $image['sizes']['card']; ?>">
								<? if ( $image['alt'] != '' ): ?>
									<figcaption class="seo">
										<?= $image['alt']; ?>
									</figcaption>
								<? endif; ?>
							</figure>
						</div>

					<? endif; ?>

				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>