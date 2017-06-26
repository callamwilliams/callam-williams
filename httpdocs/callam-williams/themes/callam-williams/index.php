<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://wphierarchy.com/
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppt
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

	<?php
	the_archive_title( '<h2>', '</h2>' );
	the_archive_description( '<div>', '</div>' );
	?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class( ' entry ' ); ?>>

			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>

				<?php the_time( 'l, F jS, Y' ); ?>

			<?php endif; ?>

			<?php the_excerpt(); ?>

		</article>

	<?php endwhile; ?>

	<?php pagination_bar( $post ); ?>

<?php else : ?>

	<h1>Sorry, no matching results</h1>

<?php endif; ?>

<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>


<?php
get_footer();