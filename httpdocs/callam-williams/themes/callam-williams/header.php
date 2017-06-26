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
	<meta name="theme-color" content="#fecb77">
	<base href="<?= home_url(); ?>">

	<? if ( PM::get_option( 'site', 'analytics' ) ) : ?>

		<? $analytics = explode( "\n", PM::get_option( 'site', 'analytics' ) ); ?>

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
            ga('<?= $key ?>.send', 'pageview',<?= ( $page == "page-not-found" ) ? "'/404/?url='+document.location.pathname+document.location.search+'&ref='+document.referrer" : "document.location.pathname" ?>);
			<? endforeach ?>
		</script>

	<? endif; ?>

	<?php wp_head(); ?>

</head>

<body itemscope itemtype="http://schema.org/WebPage">

<header class="header">
	<nav>
		<?php bem_menu( 'navigation', 'navigation__list' ); ?>
	</nav>
</header>

<section id="js-wrapper">
	<div class="js-container main">
		<main id="main" class="<?= ! is_front_page() ? 'main--away' : null; ?>">
