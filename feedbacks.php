<?php

/**
 * The main template file
 * Template Name: Отзывы
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
?>
	<main class="feedbacks">
		<div class="container-xl">
			<div class="row s-header">
				<div class="col-sm-7 col-md-8 s-header__left-wrapper">
					<div class="s-header__left s-header__left--service">
						<h1 class="s-header__title"><?php the_title(); ?></h1>
						<?php
							$offer = (get_field('service-offer', $id) != '') ? get_field('service-offer', $id) : 'Здесь должен быть коротокий оффер';
						?>
						<div class="s-header__offer">
							<?php echo $offer; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-5 col-md-4">
					<div class="s-header__right">
						<?php
						$service_img = get_field('service-img', $id);

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
				<!-- <div class="col-lg-11 col-xl-10"> -->
				<div class="col-12">
				<?php echo do_shortcode('[light-reviews-short-code align="left" custom_css_class="feedback__review-btn"]'); ?>
					<div class="reviews mt-50">
						<?php
							if ( have_posts() ) : query_posts(array('posts_per_page' => 20, 'post_type' => 'light-review', 'paged' => $paged));
								while ( have_posts() ) : the_post();?>
								<div class="review mt-30">
									<h2 class="review__title"><?php the_title(); ?></h2>
									<div class="review__date"><?php echo get_the_date(); ?></div>
									<div class="review__content mt-25">
										<?php the_content(); ?>
									</div>
								</div>
								<?php endwhile;?>
								
								<?php get_template_part('template-parts/pagination'); ?>

							<?php endif; wp_reset_query();
						?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
