<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Vendd
 */
?>
		</div><!-- .page-inner [content] -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-container">
			<div class="top-footer">
				<?php if ( is_active_sidebar( 'footer-widget-one' ) ) { ?>
					<div class="top-footer-section one">
						<?php dynamic_sidebar( 'footer-widget-one' ); ?>
					</div>
				<?php } ?>
				<div class="top-footer-section two">
				<?php dynamic_sidebar( 'footer-widget-two' ); ?>
				</div>
				<?php if ( is_active_sidebar( 'footer-widget-three' ) ) { ?>
					<div class="top-footer-section three">
						<?php dynamic_sidebar( 'footer-widget-three' ); ?>
					</div>
				<?php } ?>
			</div>
			<div class="page-inner">
				<div class="site-info">
					<?php
						$site_info = get_bloginfo( 'description' ) . ' - ' . get_bloginfo( 'name' ) . ' &copy; ' . date( 'Y' );
						if ( '' != get_theme_mod( 'vendd_credits_copyright' ) ) :
							echo get_theme_mod( 'vendd_credits_copyright' );
						else :
							echo $site_info;
						endif;
					?>
				</div><!-- .site-info -->
			</div><!-- .page-inner [footer] -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
