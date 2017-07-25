<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wppt
 */

get_header();

?>

<section class="banner banner--fullscreen lazyload">
	<figure class="banner__content">
		<figcaption>
			<h1 class="banner__title">
				<span>You're</span> Lost!
			</h1>
			<h2 class="banner__subtitle">
				<a href="/">Get back home</a>
			</h2>
		</figcaption>
	</figure>
	<div class="banner__links">
		<a class="banner__link" href="//www.github.com/callamwilliams" target="_blank" rel="noopener">
			<span class="icon-github"></span><span class="small-hide">/callamwilliams</span>
		</a>
		<a class="banner__link" href="https://stackoverflow.com/users/822671/callam" target="_blank" rel="noopener">
			<span class="icon-stack-overflow"></span><span class="small-hide">/callamwilliams</span>
		</a>
		<a class="banner__link" href="//www.twitter.com/callamwilliams" target="_blank" rel="noopener">
			<span class="icon-twitter"></span><span class="small-hide">@callamwilliams</span>
		</a>
	</div>
</section>


<? get_footer();