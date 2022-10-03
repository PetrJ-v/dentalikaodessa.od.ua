<?php

/**
 * The main template file
 * Template Name: Оборудование
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
	<main class="equipments">
		<div class="container-xl">
			<div class="row s-header">
				<div class="col-sm-7 col-md-8 s-header__left-wrapper">
					<div class="s-header__left s-header__left--equipments">
						<h1 class="s-header__title"><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="col-sm-5 col-md-4">
					<div class="s-header__right">

						<?php
							$equipments_img = get_field('equipments-img');?>
							<picture>
								<source type="image/jpeg" srcset='<?php echo $equipments_img['sizes']['medium']; ?> 1x,
										<?php echo $equipments_img['url']; ?> 2x'>
								<img width="416" height="474" class="image" src='<?php echo $equipments_img['url']; ?>' alt='<?php echo $equipments_img['alt']; ?>' title='<?php echo $equipments_img['title']; ?>' sizes='(min-width: 576px) 40vw, 100vw' srcset='<?php echo $equipments_img['sizes']['medium']; ?> 416w,
												<?php echo $equipments_img['url']; ?> 832w'>
							</picture>
					</div>
				</div>
			</div>
		</div>
		<div class="container-xl">
			<div class='row justify-content-center'>
				<div class="col-lg-11 col-xl-10">
				<?php
					// Check rows exists.
					if( have_rows('equipment-item') ):

						// Loop through rows.
						while( have_rows('equipment-item') ) : the_row();

							// Load sub field value.
							$eq_img = get_sub_field('equipment-item_img');?>

							<div class="eq">

								<?php if ($eq_img):?>
									<div class="eq__img">
										<img loading="lazy" class="image rounded-30" src="<?php echo $eq_img['sizes']['medium']; ?>" alt="<?php echo $eq_img['alt']; ?>" title="<?php echo $eq_img['title']; ?>">
									</div>
								<?php endif; ?>

								<h2 class="eq__title">
									<?php the_sub_field('equipment-item_title'); ?>
								</h2>
								<div class="eq__info">
									<?php the_sub_field('equipment-item_content'); ?>
								</div>
							</div>

						<?php endwhile;

					endif;?>
				</div>
			</div>

			<?php get_template_part('template-parts/static-form'); ?>
		</div>
	</main>

	<?php }

	wp_reset_postdata(); //Сбрасываем открытый вначале код
?>
<?php get_footer(); ?>
