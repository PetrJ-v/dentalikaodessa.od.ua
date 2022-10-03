<?php

/**
 * The main template file
 * Template Name: Специалист
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
	<main class="specialist">
		<div class="container-xl">
			<div class="row">
				<div class="col-12">
					<div class="sp-info">
						<div class="sp-info__left">
							<div class="sp-info__pretitle"><?php the_field('specialists-deco', 8); ?></div>
							<h1 class="sp-info__title"><?php the_title(); ?></h1>
							<div class="sp-info__subtitle">
								<?php the_field('sp-role'); ?>
							</div>
						</div>
						<div class="sp-info__image">
							<?php
								$sp_img = get_field('sp-foto');
								$sp_img_2x_url = $sp_img['url'];
								$sp_img_url = $sp_img['sizes']['medium'];
							?>
							<picture>
								<source type="image/png" srcset='<?php echo $sp_img_url; ?> 1x,
									<?php echo $sp_img_2x_url; ?> 2x'>
								<img width="<?php echo $specialist_img['width']; ?>" height="<?php echo $specialist_img['height']; ?>" class="image" src='<?php echo $sp_img_url; ?>' alt='<?php echo $sp_img['alt'];; ?>' title='<?php echo $sp_img['title'];; ?>'
										sizes='(min-width: 576px) 30vw, 50vw'
										srcset='<?php echo $sp_img_url; ?> 428w,
											<?php echo $sp_img_2x_url; ?> 856w,'>
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-xl sp-content mt-50-30">
			<div class='row justify-content-center'>
				<div class="col-lg-11 col-xl-10">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="container-xl mt-50-30">
			<?php get_template_part('template-parts/static-form'); ?>
		</div>

	</main>
<?php
}
wp_reset_postdata(); //Сбрасываем открытый вначале код
?>
<?php get_footer(); ?>
