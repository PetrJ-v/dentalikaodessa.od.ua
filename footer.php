<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dentalika
 */

?>

<footer>
	<div class="footer">
		<div class="container-xl">
			<div class="row">
				<div class="col-12">
					<div class="footer-inner">
						<nav class="menu-wrapper footer__menu-wrapper">
							<?php
							if (is_front_page()) :
								$menu = 'main_menu';
							else :
								$menu = 'secondary_menu';
							endif;
							wp_nav_menu(
								array(
									'theme_location'     => $menu,
									'menu_id'            => '',
									'container'         => '',
									'container_class'    => '',
									'depth'                => 0,
								)
							);
							?>
						</nav>
						<div class="footer__bottom-line">
							<div class="social footer__social">
								<?php if (have_rows('social', 14)) : ?>
									<div class="social footer__social">
										<?php $id_num = 2; ?>
										<?php while (have_rows('social', 14)) : the_row();
											$social_link = get_sub_field('social-link');
											// Выполню замену id иконки, чтобы он не повторялся с таковым в шапке (soc-gradient-1) и не вызывал проблемы с валидностью страницы
											$social_svg = get_sub_field('social-icon');
											if (str_contains($social_svg, 'soc-gradient-1')) {
												$replace_string = 'soc-gradient-' . $id_num;
												$social_svg = str_replace('soc-gradient-1', $replace_string, $social_svg);
											};
										?>
											<a href="<?php echo $social_link; ?>" class="footer__social-item" target='blank' title="<?php the_sub_field('social-link-title'); ?>">
												<?php echo $social_svg; ?>
											</a>
											<?php $id_num++; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="footer__copyright">© 2022 DENTALIKA</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="top-btn img-wrapper">
		<svg viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle cx="58" cy="58" r="56" fill="white" stroke="#EEB83B" stroke-width="4" />
			<path d="M44.0796 52.1689L44 52.2852L54.5198 52.1444L54.9791 86L62.9394 85.896L62.4802 52.0343L72.8653 51.8996L73 51.8935L58.2796 31.0857L58.2183 31L44.0796 52.1689Z" fill="#EEB83B" />
		</svg>
	</div>
	<div class="popup-wrapper popup"></div>
</footer>
<?php
	if ( get_field('call-btn-code', 14) ) {
		the_field('call-btn-code', 14);
	};
?>

<?php wp_footer(); ?>

</body>

</html>
