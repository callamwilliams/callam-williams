<? if ( have_rows( 'project_content' ) ): ?>
	<section class="post__detail">

		<? $count = 0; ?>
		<? $i = 0; ?>
		<?php while ( have_rows( 'project_content' ) ): the_row();

			$count ++;
			$i ++;
			$text  = get_sub_field( 'text' );
			$image = get_sub_field( 'image' );
			?>

			<article class="post__row">

				<? if ( ( $count % 2 ) === 0 ): ?>

					<div class="post__img">
						<figure class="js-img lazyload" data-bg="<?= $image['sizes']['card']; ?>">
							<? if ( $image['alt'] != '' ): ?>
								<figcaption class="seo">
									<?= $image['alt']; ?>
								</figcaption>
							<? endif; ?>
						</figure>
					</div>

				<? endif; ?>

				<div class="post__text <?= ( ( $count % 2 ) == 1 ) ? '' : 'post__text--right' ?>">
					<? include get_template_directory() . '/assets/svg/pattern' . $i . '.svg' ?>
					<?= $text ?>
				</div>

				<? if ( ( $count % 2 ) === 1 ): ?>

					<div class="post__img">
						<figure class="js-img lazyload" data-bg="<?= $image['sizes']['card']; ?>">
							<? if ( $image['alt'] != '' ): ?>
								<figcaption class="seo">
									<?= $image['alt']; ?>
								</figcaption>
							<? endif; ?>
						</figure>
					</div>

				<? endif; ?>

			</article>

		<?php endwhile; ?>
	</section>
<?php endif; ?>