<?
$project_type = get_field( 'project_type' );
$project_link = get_field( 'project_link' );
?>

<div class="post__info">
	<div class="post__labels">
		<h1 class="post__title"><? the_title(); ?></h1>
		<h2 class="post__subtitle"><?= $project_type ?></h2>
	</div>

	<a class="btn" href="<?= $project_link; ?>" target="_blank" rel="noopener">
		Visit Site
		<span class="icon-angle-double-right"></span>
	</a>
</div>