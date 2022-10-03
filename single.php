<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dentalika
 */
?>
<?php get_header(); ?>
<main class="post">
	<?php while (have_posts()) : the_post(); ?>
		<div class="container-xl">
			<div class="row s-header">
				<div class="col-sm-7 col-md-8 s-header__left-wrapper">
					<div class="s-header__left s-header__left--green">
						<h1 class="s-header__title mt-0"><?php the_title(); ?></h1>
						<?php if (get_field('offer')):?>
							<div class="s-header__offer mt-25">
									<?php the_field('offer');?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-5 col-md-4">
					<div class="s-header__right img-wrapper">
						<?php if ( get_the_post_thumbnail() ):
							the_post_thumbnail($size = 'medium');?>
						<?php else:?>
							<img src="<?php echo get_template_directory_uri(); ?>/accets/images/post-gap.jpg">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container-xl sp-content mt-50-30">
			<div class='row justify-content-center'>
				<div class="col-lg-11 col-xl-10 content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="container-xl mt-50">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-xl-10 content">
					<?php get_template_part('template-parts/construct'); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<div class="container-xl mt-50-30">
		<?php get_template_part('template-parts/static-form'); ?>
	</div>

</main>

<?php
get_footer();
