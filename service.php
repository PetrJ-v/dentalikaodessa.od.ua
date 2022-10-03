<?php

/**
 * The main template file
 * Template Name: Услуга
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */
?>
<?php get_header(); ?>

<?php
$id = get_the_ID();
$posts = get_posts(array(
	'numberposts' => 1,
	'include' => array($id),
	'post_type' => 'page',
));

foreach ($posts as $post) {
	setup_postdata($post);
?>
	<main class="service">
		<div class="container-xl">
			<div class="row s-header">
				<div class="col-sm-7 col-md-8 s-header__left-wrapper">
					<div class="s-header__left s-header__left--service">
						<div class="s-header-name"><?php the_field('service-category'); ?></div>
						<h1 class="s-header__title"><?php the_title(); ?></h1>
						<?php
							$offer = (get_field('service-offer') != '') ? get_field('service-offer') : 'Здесь должен быть коротокий оффер';
						?>
						<div class="s-header__offer">
							<?php echo $offer; ?>
						</div>
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
								<source type="image/jpeg" srcset="<?php echo get_template_directory_uri(); ?>/accets/images/service-header.jpg 1x,
										<?php echo get_template_directory_uri(); ?>/accets/images/service-header-f.jpg 2x">
								<img class="image" src="<?php echo get_template_directory_uri(); ?>/accets/images/service-header-f.jpg" alt="Услуги клиники Dentalika" title="Услуги Dentalika" sizes="(min-width: 576px) 40vw, 100vw" srcset="<?php echo get_template_directory_uri(); ?>/accets/images/service-header.jpg 416w,
												<?php echo get_template_directory_uri(); ?>/accets/images/service-header-f.jpg 832w" width="416" height="474">
							</picture>
						<?php
						endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container-xl mt-50">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-xl-10 content">
					<?php get_template_part('template-parts/construct'); ?>
				</div>
			</div>

			<?php get_template_part('template-parts/static-form'); ?>

		</div>
	</main>
<?php
}
wp_reset_postdata(); //Сбрасываем открытый вначале код
?>
<?php get_footer(); ?>
