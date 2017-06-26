<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wppt
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php printf( esc_html__( 'Search Results for: %s', 'wppt' ), '<span>' . get_search_query() . '</span>' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class( ' entry ' ); ?>>

			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>

				<?php the_time( 'l, F jS, Y' ); ?>

			<?php endif; ?>

			<?php the_excerpt(); ?>

		</article>

	<? endwhile; ?>

	<?php pagination_bar( $post ); ?>

<?php else : ?>

	<h1>Sorry, no results</h1>

<?php endif; ?>

<?php
get_footer();
