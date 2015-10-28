<?php
/**
 * The template for displaying the footer.
 *
 * Contains the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LHS
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="ft">
				<?php if ( ! dynamic_sidebar('footer-hq') ) : ?>
				// This will output the footer left widget
				<?php endif; ?>
			</div>
			<div class="ft">
				<?php if ( ! dynamic_sidebar('footer-contact') ) : ?>
				   // This will output the footer left widget
				<?php endif; ?>
			</div>
			<div class="ft"><nav id="footer-nav" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
			</nav></div>
			<div class="ft-copy">&copy; <?php the_time('Y') ?> Lee H. Smith & Company. All rights reserved.</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
