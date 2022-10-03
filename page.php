<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */

get_header();
?>

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
						<div class="s-header__right">
							<?php
							$service_img = get_field('service-img');

							if ($service_img) : ?>
								<picture>
									<source type="image/jpeg" srcset='<?php echo $service_img['sizes']['medium']; ?> 1x,
										<?php echo $service_img['url']; ?> 2x'>
									<img width="416" height="474" class="image" src='<?php echo $service_img['url']; ?>' alt='<?php echo $service_img['alt']; ?>' title='<?php echo $service_img['title']; ?>' sizes='(min-width: 576px) 40vw, 100vw' srcset='<?php echo $service_img['sizes']['medium']; ?> 416w,
												<?php echo $service_img['url']; ?> 832w'>
								</picture>
							<?php
							else : ?>
								<picture>
									<source type="image/jpeg" srcset="<?php echo get_template_directory_uri(); ?>/accets/images/page-header.jpg 1x,
										<?php echo get_template_directory_uri(); ?>/accets/images/page-header-f.jpg 2x">
									<img class="image" src="<?php echo get_template_directory_uri(); ?>/accets/images/page-header-f.jpg" alt="Услуги клиники Dentalika" title="Услуги Dentalika" sizes="(min-width: 576px) 40vw, 100vw" srcset="<?php echo get_template_directory_uri(); ?>/accets/images/page-header.jpg 416w,
												<?php echo get_template_directory_uri(); ?>/accets/images/page-header-f.jpg 832w" width="416" height="474">
								</picture>
							<?php
							endif; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center mt-50">
					<div class="col-lg-11 col-xl-10">
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
