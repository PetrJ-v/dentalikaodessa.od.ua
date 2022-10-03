<?php

/**
 * The main template file
 * Template Name: О нас
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
<main class="about">
	<div class="container-xl">
		<?php
			$about_img = get_field('about-img');
		?>
		<div class="row">
			<div class="col-12">
				<div class="about-img img-wrapper rounded-30">
					<picture>
						<source srcset='<?php echo $about_img['sizes']['large']; ?>'
								media='(min-width: 575.98px)'>
						<source srcset='<?php echo $about_img['sizes']['medium']; ?>'
								media='(max-width: 575.98px)'>
						<img width='<?php echo $about_img['width']; ?>' height='<?php echo $about_img['height']; ?>' src='<?php echo $about_img['sizes']['large']; ?>' alt='<?php echo $about_img['alt']; ?>' title='<?php echo $about_img['title']; ?>'
								sizes='(min-width: 575.98px) 100vw, 100vw'
								srcset='<?php echo $about_img['sizes']['medium']; ?> 576w,
									<?php echo $about_img['sizes']['large']; ?> 1296w'>
					</picture>
					<h1 class="about__title">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mt-50-30">
			<div class="col-lg-11 col-xl-10 content">
				<?php the_content(); ?>
			</div>
		</div>

		<?php if (have_rows('social-network', 8)) : ?>
			<div class="container-xl mt-50-30">

				<?php get_template_part('template-parts/social-inner'); ?>

			</div>
		<?php endif; ?>

	</div>
</main>

<?php
	}
	wp_reset_postdata(); //Сбрасываем открытый вначале код
?>
<?php get_footer(); ?>
