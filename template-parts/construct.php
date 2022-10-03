<?php if (have_rows('service-content')) :

	// Loop through rows.
	while (have_rows('service-content')) : the_row();

		// Case: wp-content layout.
		if (get_row_layout() == 'wp-content') :
			$text = get_sub_field('wp-content_item'); ?>

			<?php echo $text; ?>

			<!-- Case: combo-img layout. -->
		<?php elseif (get_row_layout() == 'combo-img') :
			$left_img = get_sub_field('combo-img_left');
			$right_img = get_sub_field('combo-img_right'); ?>

			<div class='row combo-img justify-content-center'>
				<div class="col-sm-6 mt-40-30">
					<div class="rounded-30 img-wrapper">
						<img src="<?php echo $left_img['sizes']['medium_large']; ?>" width="<?php echo $left_img['width']; ?>" height="<?php echo $left_img['height']; ?>" loading="lazy" alt="<?php echo $left_img['alt']; ?>" title="<?php echo $left_img['title']; ?>">
					</div>
				</div>
				<div class="col-sm-6 mt-40-30">
					<div class="rounded-30 img-wrapper">
						<img src="<?php echo $right_img['sizes']['medium_large']; ?>" width="<?php echo $right_img['width']; ?>" height="<?php echo $right_img['height']; ?>" loading="lazy"  alt="<?php echo $right_img['alt']; ?>" title="<?php echo $right_img['title']; ?>">
					</div>
				</div>
			</div>

			<!-- Case: full-img layout. -->
		<?php elseif (get_row_layout() == 'full-img') :
			$full_img = get_sub_field('full-img_item'); ?>

			<div class="full-image img-wrapper rounded-30 mt-50-30">
				<picture>
					<source srcset='<?php echo $full_img['sizes']['content']; ?>' media='(min-width: 575.98px)'>
					<source srcset='<?php echo $full_img['sizes']['medium']; ?>' media='(max-width: 575.98px)'>
					<img width='<?php echo $full_img['width']; ?>' height='<?php echo $full_img['height']; ?>' src='<?php echo $full_img['sizes']['content']; ?>' loading="lazy" alt='<?php echo $full_img['alt']; ?>' title='<?php echo $full_img['title']; ?>' sizes='(min-width: 575.98px) 100vw, 100vw' srcset='<?php echo $full_img['sizes']['medium']; ?> 540w,
							<?php echo $full_img['sizes']['content']; ?> 1076w'>
				</picture>
			</div>

			<!-- Case: deco-list layout. -->
			<?php elseif (get_row_layout() == 'deco-list') :

				// Check rows exists.
				if (have_rows('deco-list_item')) : ?>
					<ul class="list-block__list">

						<?php while (have_rows('deco-list_item')) : the_row();

							$s_list_number = get_sub_field('deco-list_item-number');
							$s_list_content = get_sub_field('deco-list_item-content'); ?>

							<li class="list-block__item">
								<div class="list-block__item-left"><?php echo $s_list_number; ?></div>
								<div class="list-block__item-right">
									<?php echo $s_list_content; ?>
								</div>
							</li>

						<?php endwhile; ?>

					</ul>
					<!-- Loop through rows. -->

			<?php endif; ?>

			<!-- Case: float image layout. -->
			<?php elseif (get_row_layout() == 'float-image') :?>

				<div class="<?php the_sub_field('float-image_float'); ?>">
					<div class="<?php the_sub_field('float-image_float'); ?>__img <?php the_sub_field('float-image_float'); ?>__img--<?php the_sub_field('float-image_width'); ?>">
						<?php
							$float_img = get_sub_field('float-image_img');
						?>
						<img src="<?php echo $float_img['sizes']['medium']; ?>" class="image" loading="lazy" width="<?php echo $float_img['width']; ?>" height="<?php echo $float_img['height']; ?>" alt="<?php echo $float_img['alt']; ?>" title="<?php echo $float_img['title']; ?>">
					</div>
					<?php the_sub_field('float-image_content'); ?>
				</div>

			<!-- Case: image 60-40 layout. -->
			<?php elseif (get_row_layout() == 'block-3') :?>
				<div class='block-3 mt-40-30'>
					<?php
						$b3_left_img = get_sub_field('block-3_left');
						$b3_right_img = get_sub_field('block-3_right');
					?>
					<div class="block-3__left">
						<div class="img-wrapper">
							<img src="<?php echo $b3_left_img['url']; ?>" loading="lazy" width="<?php echo $b3_left_img['width']; ?>" height="<?php echo $b3_left_img['height']; ?>" alt="<?php echo $b3_left_img['alt']; ?>" title="<?php echo $b3_left_img['title']; ?>">
						</div>
					</div>
					<div class="block-3__right">
						<div class="img-wrapper">
							<img src="<?php echo $b3_right_img['url']; ?>" loading="lazy" width="<?php echo $b3_right_img['width']; ?>" height="<?php echo $b3_right_img['height']; ?>" alt="<?php echo $b3_right_img['alt']; ?>" title="<?php echo $b3_right_img['title']; ?>">
						</div>
					</div>
				</div>

			<!-- Case: triple image layout. -->
			<?php elseif (get_row_layout() == 'triple-img') :?>
				<div class="triple-img">
					<?php
						$left_img = get_sub_field('triple-img_left');
						$center_img = get_sub_field('triple-img_center');
						$right_img = get_sub_field('triple-img_right');
					?>
					<div class="triple-img__item img-wrapper">
						<img src="<?php echo $left_img['sizes']['medium_large']; ?>" width="<?php echo $left_img['width']; ?>" height="<?php echo $left_img['height']; ?>" loading="lazy" alt="<?php echo $left_img['alt']; ?>" title="<?php echo $left_img['title']; ?>">
					</div>
					<div class="triple-img__item img-wrapper">
						<img src="<?php echo $center_img['sizes']['medium_large']; ?>" width="<?php echo $center_img['width']; ?>" height="<?php echo $center_img['height']; ?>" loading="lazy" alt="<?php echo $center_img['alt']; ?>" title="<?php echo $center_img['title']; ?>">
					</div>
					<div class="triple-img__item img-wrapper">
						<img src="<?php echo $right_img['sizes']['medium_large']; ?>" width="<?php echo $right_img['width']; ?>" height="<?php echo $right_img['height']; ?>" loading="lazy" alt="<?php echo $right_img['alt']; ?>" title="<?php echo $right_img['title']; ?>">
					</div>
				</div>

		<?php endif;

	// End loop.
	endwhile; ?>

<?php endif; ?>
