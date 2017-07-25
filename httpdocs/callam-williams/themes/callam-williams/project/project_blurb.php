<? $project_blurb = get_field( 'project_blurb' ); ?>
<? $highlights = get_field( 'project_highlights' ); ?>

<header class="post__head">
	<div class="post__blurb">
		<?= $project_blurb ?>
	</div>
	<div class="post__pattern">
		<? include get_template_directory() . '/assets/svg/pattern4.svg' ?>
	</div>

	<? if ( $highlights != '' ): ?>
		<div class="post__highlights">
			<? foreach ( $highlights as $key => $highlight ): ?>
				<span><?= $highlights[ $key ]['highlight']; ?></span>
			<? endforeach; ?>
		</div>
	<? endif; ?>
</header>