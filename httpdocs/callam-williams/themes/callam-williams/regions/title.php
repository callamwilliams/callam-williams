<?php
$title = get_sub_field( 'title' );
?>

<section class="title">

	<article class="row">

		<div class="small-12 columns">

			<h1 class="heading">
				<? if ( $title ): ?>
					<?= $title ?>
				<? endif; ?>
			</h1>

		</div>

	</article>

</section>

