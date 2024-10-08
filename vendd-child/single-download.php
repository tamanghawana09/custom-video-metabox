<?php
/**
 * The template for displaying all single downloads.
 *
 * @package Vendd
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content/content', 'download' ); ?>

			<?php
				// comments on downloads? (customizer)
				if ( get_theme_mod( 'vendd_download_comments' ) ) :

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;

				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php // get_sidebar( 'download' ); ?>
<?php get_footer(); ?>
