<?php

/**
 * The main template file
 * Template Name: Блог
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */
?>

<?php get_header(); ?>

	<main id="main" class="blog-page">
		<div class="container-xl">
			<div class="row">
				<div class="col-12">
					<h1 class="blog-page__title"><?php echo get_cat_name( 4 ); ?></h1>
				</div>
			</div>
			<div class="row posts-preview">
				<?php
					if ( have_posts() ) : query_posts(array('posts_per_page' => 21, 'cat' => 4, 'paged' => $paged));

						while ( have_posts() ) : the_post();?>
							<a href="<?php the_permalink(); ?>" class="col-sm-6 col-lg-4 posts-preview__item">
								<div class="img-wrapper">
									<?php the_post_thumbnail($size = 'medium'); ?>
									<h2 class="post-preview__title"><?php the_title(); ?></h2>
								</div>
								<div class="post-preview__description">
									<?php custom_length_excerpt(15); ?>
								</div>
							</a>

						<?php endwhile;?>

						<?php get_template_part('template-parts/pagination'); ?>
				<?php
					endif; wp_reset_query();
				?>
			</div>

			<?php get_template_part('template-parts/static-form'); ?>

		</div>
	</main>

<?php
get_footer();
