<?php

/**
 * The main template file
 * Template Name: Главная
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
	<main>
		<div class="header-slider-wrapper">
			<div class="header-slider">
				<?php
				// Check rows exists.
				if (have_rows('main-slider')) :
					$ms_count = 1;
					// Loop through rows.
					while (have_rows('main-slider')) : the_row();

						// Load sub field value.
						$main_slider_bg = get_sub_field('main-slider__bg');
						$main_slider_mobile_img = get_sub_field('main-slider_mobile-img');
						// Do something...
				?>
						<div class="header-slider__item hs hs--<?php echo $ms_count; ?>">
							<style>
								@media (min-width: 575.98px){
									.hs--<?php echo $ms_count; ?> {
										background: url('<?php echo wp_get_attachment_image_src($main_slider_bg, 'full')[0]; ?>') no-repeat;
										background-size: cover;
									}
								}
								@media (min-width: 575.98px) and (max-width: 1199.98px){
									.hs--<?php echo $ms_count; ?> {
										background-position: 70% 50%;
									}
								}

								<?php if ( $ms_count == 2 ):?>
									@media (max-width: 1399.98px){
										.hs--2{
											background-position: 40% 50%;
										}
									}
									@media (max-width: 767.98px){
										.hs--2{
											background-position: 60% 50%;
										}
									}
									.hs--2 .hs__title, .hs--2 p {
										color: #fff;
									}
								<?php endif; ?>
							</style>
							<div class="header-slider__item-img img-wrapper">
								<img src="<?php echo $main_slider_mobile_img['url']; ?>" width="<?php echo $main_slider_mobile_img['width']; ?>" height="<?php echo $main_slider_mobile_img['height']; ?>" alt="<?php echo $main_slider_mobile_img['alt']; ?>" title="<?php echo $main_slider_mobile_img['title']; ?>">
							</div>
							<div class="hs-inner">
								<?php if ( $ms_count == 2 ):?>
									<h1 class="hs__title">
										<?php the_sub_field('main-slider__title'); ?>
									</h1>
								<?php else:?>
									<div class="hs__title">
										<?php the_sub_field('main-slider__title'); ?>
									</div>
								<?php endif; ?>
								<div class="hs__text">
									<?php the_sub_field('main-slider__text'); ?>
								</div>
								<div class="hs__text-mobile">
									<?php the_sub_field('main-slider_text-mobile'); ?>
								</div>
								<div class="header-group">
									<button class="hs__btn btn-2 sign-btn"><?php the_field('main-slider-btn-text'); ?></button>
									<?php if( have_rows('social', 14) ):?>
										<div class="social header__social">
											<?php while( have_rows('social', 14) ) : the_row();

												$social_link = get_sub_field('social-link');
												$social_svg = get_sub_field('social-icon');?>
												<a href="<?php echo $social_link; ?>" class="header__social-item" target='blank' title="<?php the_sub_field('social-link-title'); ?>">
													<?php echo $social_svg; ?>
												</a>
											<?php endwhile;?>
										</div>
									<?php endif;?>
								</div>
								<?php
									$bottom_text = get_sub_field('main-slider_text-bottom');
									if ( $bottom_text ):?>

										<div class="hs__text-bottom">
											<?php echo $bottom_text; ?>
										</div>

									<?php endif;
								?>
							</div>
						</div>
				<?php
						$ms_count = $ms_count + 1;
					// End loop.
					endwhile;

				endif;
				?>
			</div>
		</div>
		<svg class="common-svg-gradient">
			<defs>
				<linearGradient id="soc-gradient-1" x1="5.06799" y1="39.9274" x2="47.954" y2="27.0255" gradientUnits="userSpaceOnUse">
					<stop offset="0" stop-color="#3878B9" />
					<stop offset="1" stop-color="#008CE0" />
				</linearGradient>
			</defs>
		</svg>
		<?php
			$services_title = get_field('services-title');

			if ($services_title) { ?>
			<div class="container-xl mt-70" id="services">
				<div class='row justify-content-center align-items-center'>
					<div class="col-lg-10">
						<h2 class="align-center">
							<?php echo $services_title; ?>
						</h2>
					</div>
				</div>

				<?php if (have_rows('services-item')) : ?>

				<div class="services">
					<div class="services-slider">
						<?php while (have_rows('services-item')) : the_row(); //Parrent repeater
							// Load sub field value.
							$services_item_img = get_sub_field('services-item_img');
							// Do something...
						?>
							<div class="service-item">
								<div class="service-item__inner">
									<div class="service-item__img">
									<?php
										if( !empty( $services_item_img ) ): ?>
											<img width="<?php echo $services_item_img['width']; ?>" height="<?php echo $services_item_img['height']; ?>" class="image" loading="lazy" src="<?php echo esc_url($services_item_img['url']); ?>" alt="<?php echo esc_attr($services_item_img['alt']); ?>" title="<?php echo esc_attr($services_item_img['title']); ?>" />
										<?php endif; ?>
									</div>
									<div class="hiden-service">
										<div class="service-item__title"><?php the_sub_field('services-item_title'); ?></div>

										<?php if( have_rows('services-item_list') ):?>

											<div class="hiden-service__list">
												<?php while( have_rows('services-item_list') ) : the_row();
													$services_item_link = get_sub_field('services-item_list-item');?>

													<a href="<?php echo esc_url( $services_item_link['url'] ); ?>" class="hiden-service__list-item"><?php echo $services_item_link['title']; ?></a>

												<?php endwhile;?>
											</div>

										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php
							// End loop.
							endwhile;
						?>
					</div>
				</div>
				<?php endif; //конец проверки на наличие контента в блоке services ?>
			</div>

			<?php }
		?>



		<?php if (have_rows('specialist')) : ?>
			<div class="container-xl mt-70" id="specialists">
				<div class='row justify-content-center align-items-center'>
					<div class="col-lg-10">
						<h2 class="specialists-title align-center">
							<?php the_field('specialists-title'); ?>
						</h2>
					</div>
					<div class="col-lg-10">
						<div class="filters specialists-filters mt-25">
							<?php
								$sp_classes = array();
								$sp_number = 0;
							?>
							<?php while (have_rows('specialist')) : the_row(); //Обрабатываю repeater

								$specialist_classes = get_sub_field('specialist_classes');
								foreach( $specialist_classes as $specialist_clas ):
									$current_sp_class = $specialist_clas['value'];
									$current_sp_label = $specialist_clas['label'];

									//Проверю был ли добавлен в массив классов текущий класс и если не был, сгенерирую кнопку с нужными данными
									if (!in_array($current_sp_class, $sp_classes)):
										$sp_classes[] = $current_sp_class; ?>
										<input class="hidden radio-label" type="radio" name="spacialization" id='filter-<?php echo $sp_number; ?>' value="<?php echo $current_sp_class; ?>" />
										<label class="btn-4 filters__item" for="filter-<?php echo $sp_number; ?>">
											<?php echo $current_sp_label; ?>
										</label>
										<?php $sp_number++; ?>
									<?php endif; ?>

								<?php endforeach;

							endwhile; ?>

							<input class="hidden radio-label" type="radio" name="spacialization" id="filter-all" value="all" disabled/>
							<label class="btn-4 filters__item filters__item--all" for="filter-all">
								Показать всех
							</label>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-12">
						<div class="specialists-wrapper">
							<div class="specialists">
								<?php  $sp_btn_text =  get_field('specialists-btn-text'); ?>
								<?php while (have_rows('specialist')) : the_row(); //Parrent repeater
									// Image variables.
									$specialist_img = get_sub_field('specialist_img');
									$sp_img_2x_url = $specialist_img['url'];
									$sp_img_url = $specialist_img['sizes']['medium'];
									$sp_img_title = $specialist_img['title'];
									$sp_img_alt = $specialist_img['alt'];
									//Classes for block
									$sp_item_classes = get_sub_field('specialist_classes'); //array
									$sp_classes_string = ' ';
									foreach( $sp_item_classes as $sp_item_class ):
										$current_sp_class = $sp_item_class['value'];
										$current_sp_label = $sp_item_class['label'];
										$sp_classes_string = $sp_classes_string . ' ' . $sp_item_class['value'];
									endforeach;

									// Do something...
								?>
								<div class="specialists__item<?php echo $sp_classes_string; ?>">
									<div class="specialists__item-img img-wrapper">
										<picture>
											<source type="image/png" srcset='<?php echo $sp_img_url; ?> 1x,
												<?php echo $sp_img_2x_url; ?> 2x'>
											<img width="302" height="351" loading="lazy" src='<?php echo $sp_img_url; ?>' alt='<?php echo $sp_img_alt; ?>' title='<?php echo $sp_img_title; ?>'
													sizes='(min-width: 576px) 30vw, 50vw'
													srcset='<?php echo $sp_img_url; ?> 302w,
														<?php echo $sp_img_2x_url; ?> 604w'>
										</picture>
									</div>
									<div class="specialists__item-title"><?php the_sub_field('specialist_name'); ?></div>
									<div class="specialists__item-role"><?php the_sub_field('specialist_role'); ?></div>
									<a href="<?php the_sub_field('specialist_link'); ?>" class="specialists__item-btn"><?php echo $sp_btn_text; ?></a>
								</div>

								<?php
									// End loop.
									endwhile;
								?>
							</div>
						</div>
					</div>
				</div>

			</div>
		<?php endif; //конец проверки на наличие контента в блоке specialists?>

		<div class="container-xl">

			<?php get_template_part('template-parts/static-form'); ?>
		</div>

		<?php if (have_rows('social-network')) : ?>
			<div class="container-xl mt-70">

				<?php get_template_part('template-parts/social-inner'); ?>

			</div>
		<?php endif; ?>


		<?php if ( have_posts() ) : query_posts(array('posts_per_page' => 10, 'cat' => 4)); ?>


		<div class="container-xl articles mt-50" id="articles">
			<div class='row justify-content-center'>
				<div class="col-lg-10">
					<div class="articles-header t-block-header">
						<div class="art-title-group t-block-title-group">
							<h2 class="articles-title t-block-header">
								<a href='<?php echo get_home_url(); ?>/blog/'><?php single_cat_title(); ?></a>
							</h2>
							<div class="title-description articles__title-description t-block__title-description">
								<?php echo category_description(); ?>
							</div>
						</div>
						<div class="slider-btns articles-btns t-block__btns">
							<button disabled class="slider-btns__item articles-btns__item articles-btns__item--left">
								<svg width="30" height="12" viewBox="0 0 30 12" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M0.410149 6.12281L6.75246 11.3358V0.0839844L0.410149 6.12281Z" />
									<path d="M29.7613 4.253H5.27323V7.16609H29.7613V4.253Z" />
								</svg>
							</button>
							<button class="slider-btns__item articles-btns__item articles-btns__item--right">
								<svg width="31" height="12" viewBox="0 0 31 12" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M30.3488 6.12281L24.0065 11.3358V0.0839844L30.3488 6.12281Z" />
									<path d="M0.99762 4.253H25.4857V7.16609H0.99762V4.253Z" />
								</svg>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-50-30">
				<div class="col-md-4">
					<div class="art-preview-slider">
						<?php while (have_posts()) : the_post(); ?>
						<div class="art-preview__item">
							<div class="art-preview">
								<div class="art-preview__text">
									<?php custom_length_excerpt(30); ?>
								</div>
								<a class="art-preview__link" href="<?php the_permalink(); ?>"><?php the_field('blog-btn-text', 8); ?></a>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
		<?php endif; wp_reset_query();?>
				<div class="col-md-8">
					<div class="about-container">
						<div class="about-video">
							<?php
								$about_img = get_field('about-img');
							?>
							<img loading="lazy" width="<?php echo $about_img['width']; ?>" height="<?php echo $about_img['height']; ?>" src="<?php echo $about_img['url']; ?>" alt="<?php echo $about_img['alt']; ?>" title="<?php echo $about_img['title']; ?>" class="image">
							<a href='<?php the_field('about-link'); ?>' class="about-video__btn btn-6"><?php the_field('about-btn-text'); ?></a>
						</div>
						<div class="about-video__info">
							<div class="about-video__info-title"><?php the_field('about-title'); ?></div>
							<div class="about-video__info-text"><?php the_field('about-description'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( get_field('partners-title') ):?>
		<div class="container-xl partners mt-50">
			<div class="row">
				<div class="col-md-4">
					<h2><?php the_field('partners-title'); ?></h2>
				</div>
			<?php if( have_rows('partners-img') ): //repeater?>
				<div class="col-md-8">
					<div class="partners-wrapper">
						<div class="partners-slider">
							<?php while( have_rows('partners-img') ) : the_row();
								$partners_logo = get_sub_field('partners-img_item');
							?>

							<img width="138" height="69" loading="lazy" src="<?php echo $partners_logo['url']; ?>" alt="<?php echo $partners_logo['alt']; ?>" class="image partners-item">

							<?php endwhile;?>
						</div>
					</div>
				</div>
			<?php endif;?>
			</div>
		</div>
		<?php endif; ?>

		<?php if( get_field('consult-title') ):?>
		<div class="container-xl consult mt-50">
			<div class="row">
				<div class="col-sm-6">
					<div class="consult-container round-border">
						<h2><?php the_field('consult-title'); ?></h2>
						<div class="consult__info">
							<?php the_field('consult-text'); ?>
						</div>
						<a href='viber://chat?number=%2B<?php the_field('consult-phone-number'); ?>' class="consult__btn btn-7" target='blank'><?php the_field('consult-btn-text'); ?></a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="consult-img round-border">
						<?php $consult_img = get_field('consult-img'); ?>
						<img loading="lazy" width="<?php echo $consult_img['width']; ?>" height="<?php echo $consult_img['height']; ?>" src="<?php echo $consult_img['url']; ?>" alt="<?php echo $consult_img['alt']; ?>" class="image">
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if( get_field('foto-title') ):?>
		<div class="container-xl foto mt-50" id="foto">
			<div class='row justify-content-center'>
				<div class="col-lg-10">
					<div class="foto-header t-block-header">
						<div class="foto-title-group t-block-title-group">
							<h2 class="foto-title t-block-header">
								<?php the_field('foto-title'); ?>
							</h2>
						</div>
						<div class="slider-btns foto-btns t-block__btns">
							<button disabled class="slider-btns__item foto-btns__item foto-btns__item--left">
								<svg width="30" height="12" viewBox="0 0 30 12" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M0.410149 6.12281L6.75246 11.3358V0.0839844L0.410149 6.12281Z" />
									<path d="M29.7613 4.253H5.27323V7.16609H29.7613V4.253Z" />
								</svg>
							</button>
							<button class="slider-btns__item foto-btns__item foto-btns__item--right">
								<svg width="31" height="12" viewBox="0 0 31 12" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M30.3488 6.12281L24.0065 11.3358V0.0839844L30.3488 6.12281Z" />
									<path d="M0.99762 4.253H25.4857V7.16609H0.99762V4.253Z" />
								</svg>
							</button>
						</div>
					</div>
				</div>

				<?php $images = get_field('foto-img');
					if( $images ): ?>
						<div class="col-12">
							<div class="foto-slider-wrapper">
								<div class="foto-slider mt-50-30">
									<?php foreach( $images as $image ): ?>
										<a href="<?php the_field('foto-link'); ?>" class="foto-slider__item" target="_blank">
											<img width="412" height="275" loading="lazy" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" class="image round-border">
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif;
				?>
			</div>
		</div>
		<?php endif; ?>
		<?php $feedbacks_title = get_field('feedback-title');
		if( $feedbacks_title ):?>
			<div class="container-xl feedbacks mt-50">
				<div class='row justify-content-center'>
					<div class="col-lg-10">
						<div class="feedbacks-header t-block-header">
							<div class="feedbacks-title-group t-block-title-group">
								<h2 class="feedbacks-title t-block-header">
									<?php echo $feedbacks_title; ?>
								</h2>
							</div>
							<div class="slider-btns feedbacks-btns t-block__btns">
								<button disabled class="slider-btns__item feedbacks-btns__item feedbacks-btns__item--left">
									<svg width="30" height="12" viewBox="0 0 30 12" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path d="M0.410149 6.12281L6.75246 11.3358V0.0839844L0.410149 6.12281Z" />
										<path d="M29.7613 4.253H5.27323V7.16609H29.7613V4.253Z" />
									</svg>
								</button>
								<button class="slider-btns__item feedbacks-btns__item feedbacks-btns__item--right">
									<svg width="31" height="12" viewBox="0 0 31 12" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path d="M30.3488 6.12281L24.0065 11.3358V0.0839844L30.3488 6.12281Z" />
										<path d="M0.99762 4.253H25.4857V7.16609H0.99762V4.253Z" />
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="feedbacks-slider mt-50-30">
							<?php if ( have_posts() ) : query_posts(array('posts_per_page' => 3, 'post_type' => 'light-review', 'category_name' => 'm-feedbacks', 'paged' => $paged));
								while ( have_posts() ) : the_post();?>
									<div class="feedbacks-slider__item">
										<div class="feedback">
											<h3 class="feedback__title"><?php the_title(); ?></h3>
											<div class="feedback__text">
												<?php the_content(); ?>
											</div>
											<div class="feedback__date">
												<?php echo get_the_date(); ?>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query();?>
						</div>
						<?php
							$feedback_link = get_field('feedback-link');
							$feedback_url = $feedback_link['url'];
							$feedback_title = $feedback_link['title'];
							$feedback_target = $feedback_link['target'] ? $feedback_link['target'] : '_self';
							// print_r($feedback_link);
						?>
						<div class="feedbacks__link-wrapper">
							<a href="<?php echo $feedback_url; ?>" class="feedbacks__link"><?php echo $feedback_title; ?></a>
						</div>
						<?php echo do_shortcode('[light-reviews-short-code align="center" custom_css_class="home__review-btn"]'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( have_rows('faq') ):?>
			<div class="container-xl mt-50">
				<div class="faq-wrapper">
					<div class='row justify-content-center'>
						<div class="col-lg-10">
							<h2>
								<?php the_field('faq-title'); ?>
							</h2>
						</div>
						<div class="col-lg-10">
							<div class="faq">
								<?php while( have_rows('faq') ) : the_row();?>
								<div class="faq__item">
									<div class="faq__item-question question">
										<div class="faq__item-question-text"><?php the_sub_field('faq_question'); ?></div>
										<button class="faq__item-question-btn plus-btn">
											<svg width="43" height="42" viewBox="0 0 43 42" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<circle opacity="0.15" cx="21.6076" cy="21.0236" r="20.9143"
													fill="#3AADA7" />
												<rect class="plus-btn__vertical" x="20.6074" y="28.5537" width="14.582"
													height="2" transform="rotate(-90 20.6074 28.5537)" fill="#3AADA7" />
												<rect x="14.3164" y="20.2637" width="14.582" height="2"
													fill="#3AADA7" />
											</svg>
										</button>
									</div>
									<div class="faq__item-answer answer" style="display: none;">
										<?php the_sub_field('faq_answer'); ?>
									</div>
								</div>
								<?php endwhile;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>

		<?php if( get_field('c-logo') ):?>
			<div class="container-xl contacts mt-50" id="contacts">
			<div class='row justify-content-center'>
				<div class="col-sm-10 col-lg-5">
					<div class="contacts__logo">
						<?php $c_logo = get_field('c-logo'); ?>
						<img loading="lazy" width="<?php echo $c_logo['width']; ?>" height="<?php echo $c_logo['height']; ?>" class="image"  src="<?php echo $c_logo['url']; ?>" alt="<?php echo $c_logo['alt']; ?>" title="<?php echo $c_logo['title']; ?>">
					</div>
					<div class="contacts__text-line"><?php the_field('c-text-line'); ?></div>
					<div class="contacts-group">
						<div class="contacts__line contacts__line--time">
							<div class="contacts__line-icon">
								<img width="26" height="26" src="<?php echo get_template_directory_uri(); ?>/accets/images/icons/time.svg" alt="">
							</div>
							<div class="contacts__line-text">
								<div class="c-text-item c-text-item--first">
									<div class="c-text-item__left">пн — пт</div>
									<div class="c-text-item-spacer"></div>
									<div class="c-text-item__right"><?php the_field('c-time-1'); ?></div>
								</div>
								<div class="c-text-item">
									<div class="c-text-item__left">СБ</div>
									<div class="c-text-item-spacer"></div>
									<div class="c-text-item__right"><?php the_field('c-time-2'); ?></div>
								</div>
								<div class="c-text-item">
									<div class="c-text-item__left">ВС</div>
									<div class="c-text-item-spacer"></div>
									<div class="c-text-item__right"><?php the_field('c-time-3'); ?></div>
								</div>
							</div>
						</div>
						<div class="contacts__line contacts__line--phone">
							<div class="contacts__line-icon">
								<img width="26" height="26" src="<?php echo get_template_directory_uri(); ?>/accets/images/icons/phone.svg" alt="">
							</div>
							<div class="contacts__line-text">
								<?php while( have_rows('c-phone') ) : the_row();

									$c_phone_item = get_sub_field('c-phone_item');?>

									<div class="c-text-item c-text-item">
										<a class="c-text-item__phone" href='tel:+<?php echo preg_replace('~\D+~', '', $c_phone_item); ?>' rel='nofollow'><?php echo $c_phone_item; ?></a>
									</div>

								<?php endwhile;?>
							</div>
						</div>
						<div class="contacts__line contacts__line--location">
							<div class="contacts__line-icon">
								<img width="19" height="28" src="<?php echo get_template_directory_uri(); ?>/accets/images/icons/location.svg" alt="">
							</div>
							<div class="contacts__line-text">
								<div class="c-text-item c-text-item--first">
									<div class="c-text-item__left"><?php the_field('c-city'); ?></div>
								</div>
								<div class="c-text-item">
									<?php
										$c_link = get_field('c-link');
										$c_link_target = $c_link['target'] ? $c_link['target'] : '_self';
									?>
									<a class="c-text-item__phone" href='<?php echo $c_link['url']; ?>'
										rel='nofollow noopener' target="<?php echo $c_link_target; ?>"><?php echo $c_link['title']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<?php
						$c_map = get_field('c-map');
						$c_link_target = $c_link['target'] ? $c_link['target'] : '_self';
					?>
					<a href="<?php echo $c_link['url']; ?>" rel='nofollow noopener' class="map" target="<?php echo esc_attr( $c_link_target ); ?>">
						<img loading="lazy" width="<?php echo $c_map['width']; ?>" height="<?php echo $c_map['height']; ?>" src="<?php echo $c_map['url']; ?>" alt="<?php echo $c_map['alt']; ?>" title="<?php echo $c_map['title']; ?>">
					</a>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</main>
<?php
}
wp_reset_postdata(); //Сбрасываем открытый вначале код
?>
<?php get_footer(); ?>
