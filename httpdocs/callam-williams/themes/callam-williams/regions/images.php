<? $images = get_sub_field('images');

if ( $images ): ?>
	<section>
		<div class="row align-center">
			<? $count = count( $images ); ?>

			<?php foreach ( $images as $image ): ?>
				<?
				switch ( $count ) {
					case 1:
						$image_count  = "image--single";
						$image_size   = 'background';
						$image_layout = "small-12 columns";
						break;
					case 2:
						$image_count  = "image--double";
						$image_size   = 'half';
						$image_layout = "small-12 medium-6 columns";
						break;
					case 3:
						$image_count  = "image--triple";
						$image_size   = 'triple';
						$image_layout = "small-12 medium-4 columns";
						break;
					case 4:
						$image_count  = "image--quarter";
						$image_size   = 'triple';
						$image_layout = "small-12 medium-3 columns";
						break;
				}
				?>
				<article class="<?= $image_layout; ?>">
					<figure class="js-img lazyload image <?= $image_count; ?>"
					        data-bg="<?php echo $image['sizes'][ $image_size ]; ?>">
						<? if ( $image['alt'] != ''): ?>
							<figcaption class="seo">
								<?= $image['alt']; ?>
							</figcaption>
						<? endif; ?>
					</figure>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
