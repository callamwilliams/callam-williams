<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wppt
 */

get_header(); ?>

<?php esc_html_e( 'That page can&rsquo;t be found.', 'wppt' ); ?>

<?php esc_html_e( 'It looks like you&rsquo;re lost. Maybe try one of the links below' . esc_url( get_permalink() ) . '', 'wppt' ); ?>

<?php
get_footer();