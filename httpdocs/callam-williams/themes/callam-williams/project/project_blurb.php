<? $project_blurb = get_field( 'project_blurb' ); ?>
<? $project_highlights = get_field( 'project_highlights' ); ?>

<header class="post__head">
	<div class="post__blurb">
		<?= $project_blurb ?>
	</div>
	<div class="post__highlights">
		<? if ( $project_highlights != '' ): ?>
			<div class="project__highlights">
				<? foreach ( $project_highlights as $key => $highlight ): ?>
					<span><?= $project_highlights[ $key ]['highlight']; ?></span>
				<? endforeach; ?>
			</div>
		<? endif; ?>
	</div>
	<div class="post__pattern">
		<? include get_template_directory() . '/assets/svg/pattern4.svg' ?>
	</div>
</header>