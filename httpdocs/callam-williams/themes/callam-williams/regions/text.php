<?
$text_width = get_sub_field( 'text_width' );
$text_full  = get_sub_field( 'text_full' );
$text_left  = get_sub_field( 'text_left' );
$text_right = get_sub_field( 'text_right' );
?>

<section>
	<div class="row align-center mt20 mb20">
		<?
		switch ( $text_width ) {
			case 'Split width':
				$text_layout = "small-12 large-6 columns";
				break;
			default:
				$text_layout = "small-12 columns";
				break;
		}
		?>
		<? if ( $text_full ): ?>
			<article class="<?= $text_layout; ?>">
				<?= $text_full ?>
			</article>
		<? endif; ?>

		<? if ( $text_left ): ?>
			<article class="<?= $text_layout; ?>">
				<?= $text_left ?>
			</article>
		<? endif; ?>
		<? if ( $text_right ): ?>
			<article class="<?= $text_layout; ?>">
				<?= $text_right ?>
			</article>
		<? endif; ?>
	</div>
</section>


