<?php

/**
 * The main template file
 * Template Name: Расширенная страница
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
					<div class="row s-header">
						<div class="col-sm-7 col-md-8 s-header__left-wrapper">
							<div class="s-header__left s-header__left--green">
								<div class="s-header-name">Dentalika</div>
								<h1 class="s-header__title"><?php the_title(); ?></h1>
							</div>
						</div>
						<div class="col-sm-5 col-md-4">
							<div class="s-header__right img-wrapper">
								<?php the_post_thumbnail('medium'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="container-xl mt-50">
					<div class='row justify-content-center'>
						<div class="col-lg-11 col-xl-10 content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php get_template_part('template-parts/construct'); ?>

					<?php get_template_part('template-parts/static-form'); ?>

				</div>
			<?php endwhile; // End of the loop.

		endif; ?>
	</main>

<?php get_footer(); ?>
