<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LHS
 */

get_header(); ?>

	<?php

		$jumbo = get_field( 'jumbo_image' );
	
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="jumbo-page" class="jumbo" style="background-image: url(<?=$jumbo?>); ">
				<div class="jumbo-wrapper">
					<div class="jumbo-text">
						<h1><?php the_field('jumbo_text'); ?></h1>
					</div>
				</div>
			</div>
			<div class="page-section">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'lhs' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
			</div>
			<?php         
				
				$contact = is_page('contact');

				if ( ! $contact ) { ?>
					
					<section id='contact'>
						<div class='contact-us'>
							<h3>Contact Us</h3>
							<?php echo do_shortcode( '[contact-form-7 id="49" title="Contact Us"]' ); ?>
						</div>
					</section>
					
					<?php
				
				} else { } 

			?>
				
			</div>
		
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
