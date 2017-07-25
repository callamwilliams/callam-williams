<?php

/**
 * default functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wppt
 */

/**
 * @desc Initial set up of scripts and styles
 */

include 'functions/setup/scripts.php';

/**
 * @desc Adding robots function to allow sitemap.xml to work properly across multisite
 */

include 'functions/setup/robots.php';

/**
 * @desc Clean up WordPress extras
 */
include 'functions/setup/restrictions.php';

/**
 * @desc Setup formatting for posts
 */
include 'functions/setup/utils.php';

/**
 * @desc Setup image sizes
 */
include 'functions/setup/images.php';

/**
 * @desc Setup custom posts
 */
include 'functions/setup/settings.php';

/**
 * @desc Setup menus
 */
include 'functions/setup/menus.php';

/**
 * @desc ACF Fields Config - For Child Theming
 */

include 'functions/setup/acf.php';


/**
 * @desc Adds functions which relate to wp-admin area
 */

//include 'functions/admin/login.php';

/**
 * @desc Adding registering of custom post types
 */

include 'functions/register/custom-post-types.php';

/**
 * @desc Adding registering of custom taxonomies
 */

include 'functions/register/custom-taxonomies.php';

/**
 * @desc Adding registering of menus
 */

include 'functions/register/menus.php';


