<?php
/**
 * The template for displaying front page.
 *
 * @package test theme
 */

get_header(); ?>


<div id="jumbo-home" class="jumbo" style="background-image: url(); ">
	<div class="jumbo-wrapper">
		<div class="jumbo-text">
			<h1></h1>	
		</div>
	</div>
</div>

<section id="home-info">
	<div class="home-text">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; // End of the loop. ?>	
	</div>
</section>

<section id="home-products">
	<div class="product">
		<a href="#">
			<img src="" alt="Vegetable Oils">
		</a>
		<a href="#">
			<h3>Vegetable Oils</h3>
			<p>Highest Standards. Highest Quality.</p>
		</a>
	</div>
	<div class="product">
		<a href="#">
			<img src="" alt="Fatty Acids">
		</a>
		<a href="#">
			<h3>Fatty Acids / Fatty Acid Esters</h3>
			<p>100% Natural. All the Time.</p>
		</a>
	</div>
	<div class="product">
		<a href="#">
			<img src="" alt="Vegetable Oils">

		<a href="#">
			<h3>Outstanding Selection</h3>
			<p>GMO Free. Certified Kosher.</p>
		</a>
	</div>
</section>


<?php get_footer(); ?>



