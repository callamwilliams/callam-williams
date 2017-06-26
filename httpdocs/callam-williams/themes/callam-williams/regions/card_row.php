<? if ( have_rows( 'cards' ) ): ?>
	<section class="row row--large collapse align-center">

		<? $count = 0; ?>
		<?php while ( have_rows( 'cards' ) ): the_row();

			// vars
			$count ++;
			$image         = get_sub_field( 'image' );
			$logo          = get_sub_field( 'logo' );
			$title         = get_sub_field( 'title' );
			$text          = get_sub_field( 'text' );
			$link_type     = get_sub_field( 'link_type' );
			$link_text     = get_sub_field( 'link_text' );
			$page_link     = get_sub_field( 'internal_link' );
			$external_link = get_sub_field( 'external_link' );
			$file_link     = get_sub_field( 'file_link' );

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


			<div class="column">

				<article class="card card--row">
					<? if ( $link != null ): ?>
					<a class="" href="<?= $link ?>" <?= ( $link_type ) != null ? 'target="_blank" rel="noopener"' : null ?>>
						<? endif; ?>

						<div class="js-img lazyload card__background" data-bg="<?= $image['sizes']['card_row']; ?>"></div>

						<figure class="card__module">

							<? if ( $logo !== 'None' ): ?>
								<div class="js-img lazyload lazyload--clear card__logo"
								     data-bg="<?= get_template_directory_uri() . '/assets/img/svg/' . strtolower( $logo ) . '.svg' ?>">
								</div>
							<? endif; ?>

							<figcaption class="card__title fs--alpha">
								<?= $title ?>
							</figcaption>
							<div class="card__text"><?= $text ?></div>
							<? if ( $link != null ): ?>
								<div class="card__link">
									<?= $link_text ?>
								</div>
							<? endif; ?>
						</figure>
						<? if ( $link != null ): ?>
					</a>
				<? endif; ?>
				</article>

			</div>

		<?php endwhile; ?>


	</section>
<?php endif; ?>