<div class="popup-inner rounded-30">
	<div class="close-btn popup__close-btn">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" xml:space="preserve">
			<path d="M990,57.1L942.9,10L500,452.9L57.1,10L10,57.1L452.9,500L10,942.9L57.1,990L500,547.1L942.9,990l47.1-47.1L547.1,500L990,57.1z">
			</path>
		</svg>
	</div>
	<div class="popup-inner__left"></div>
	<div class="popup-inner__right">
		<div class="popup-inner__right-content">
			<div class="popup__logo img-wrapper">
				<?php $popup_logo = get_field('popup-logo', 8); ?>
				<img src="<?php echo $popup_logo['url']; ?>" width="184" height="48" alt="<?php echo $popup_logo['alt']; ?>" title="<?php echo $popup_logo['title']; ?>">
			</div>
			<div class="popup__title"><?php the_field('popup-title', 8); ?></div>
			<div class="popup__subtitle"><?php the_field('popup-subtitle', 8); ?></div>
			<div class="popup-social popup__social">
				<?php if (have_rows('popup-social', 8)) : ?>
					<?php while (have_rows('popup-social', 8)) : the_row();

						$social_link = get_sub_field('popup-social_link');
						$social_svg = get_sub_field('popup-social_img'); ?>
						<a href="<?php the_sub_field('popup-social_link'); ?>" class="popup-social__item" target="blank" title="telegram">
							<div class="popup-social__item-img img-wrapper">
								<img src="<?php echo $social_svg['url']; ?>" alt="<?php echo $social_svg['alt']; ?>">
							</div>
							<div class="popup-social__item-legend"><?php the_sub_field('popup-social_name'); ?></div>
						</a>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
