<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wppt
 */

?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="cleartype" content="on"/>
	<meta name="msapplication-tap-highlight" content="no">
	<link rel="dns-prefetch" href="//<?= home_url(); ?>">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="//js-agent.newrelic.com">
	<link rel="dns-prefetch" href="//use.typekit.net">
	<link rel="dns-prefetch" href="https://www.google-analytics.com">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="revisit-after" content="14 days">
	<meta name="robots" content="all">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<meta name="url" content="<?= home_url(); ?>">
	<meta name="theme-color" content="#544D6B">
	<base href="<?= home_url(); ?>">

	<? $analytics = explode( "\n", 'UA-XXXXX-X' ); ?>

	<script>
		// Google Analytics
		window.gaKey = [];
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o), m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
		<? foreach($analytics as $key => $code): ?>window.gaKey.push('<?= $key ?>');
		ga('create', '<?= trim( $code ) ?>', 'auto', '<?= $key ?>');
		ga('<?= $key?>.send', 'pageview'<?= ( is_404() ) ? ",'/404/?url=' + document.location.pathname + document.location.search + '&ref=' + document.referrer" : "" ?>);
		<? endforeach ?>
	</script>

	<link href="https://file.myfontastic.com/PDWcbVKP7RVffhs7RkawMA/icons.css" rel="stylesheet">

	<?php wp_head(); ?>

</head>

<body itemscope itemtype="http://schema.org/WebPage">

<? if ( is_front_page() ): ?>
	<? include( locate_template( '/page/banner.php' ) ); ?>
<? endif; ?>

<header class="header">
	<div class="header__content">
		<h1 class="header__title small-hide">
			<a href="/">
				<span>Callam</span> Williams
			</a>
		</h1>

		<div class="header__navigation">
			<?= bem_menu( 'primary-navigation', 'navigation' ); ?>

			<a class="navigation__item" href="mailto:callam.williams@outlook@@com"
			   onmouseover="this.href=this.href.replace('@@','.')">
				Contact
			</a>
			<span class="icon-github"></span>
			<span class="icon-stack-overflow"></span>
			<span class="icon-twitter"></span>

			<a href="//www.github.com/callamwilliams" target="_blank" rel="noopener">
				<span class="icon-github"></span>
			</a>
			<a href="https://stackoverflow.com/users/822671/callam" target="_blank" rel="noopener">
				<span class="icon-stack-overflow"></span>
			</a>
			<a href="//www.twitter.com/callamwilliams" target="_blank" rel="noopener">
				<span class="icon-twitter"></span>
			</a>
		</div>
	</div>
</header>

<main id="main" class="<?= ! is_front_page() ? 'main--away' : null; ?>">
