<?php

/**
 * The main template file
 * Template Name: Фотогалерея
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */
?>
<?php get_header(); ?>

<main>
	<?php if (have_posts()) :

		while (have_posts()) : the_post(); ?>

			<div class="container-xl">
				<div class="row justify-content-center">
					<div class="col-12">
						<?php the_content(); ?>
					</div>
				</div>

				<?php get_template_part('template-parts/static-form'); ?>
			</div>

	<?php endwhile; // End of the loop.

	endif; ?>

</main><!-- #main -->

<?php
get_footer();
