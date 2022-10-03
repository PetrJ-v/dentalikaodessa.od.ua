<?php
/**
 * Template part for displaying social block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */

?>
		<div class='row justify-content-center social-preview-wrapper'>
			<div class="col-lg-10">
				<h2 class="align-center"><?php the_field('social-network_title', 8); ?></h2>
				<div class="social-preview mt-50-30">

					<?php while( have_rows('social-network', 8) ) : the_row();
						$soc_net_img = get_sub_field('social-network_img', 8); ?>

						<a href="<?php the_sub_field('social-network_link', 8); ?>" class="social-preview__item img-wrapper" target="blank">
							<picture>
								<source srcset='<?php echo $soc_net_img['sizes']['medium']; ?> 1x,
											<?php echo $soc_net_img['url']; ?> 2x'
										media='(min-width: 575.98px)'>
								<source srcset='<?php echo $soc_net_img['sizes']['medium']; ?>'
										media='(max-width: 575.98px)'>
								<img width="359" height="697" loading="lazy" src='<?php echo $soc_net_img['sizes']['medium']; ?>' alt='<?php echo $soc_net_img['alt']; ?>' title='<?php echo $soc_net_img['title']; ?>'
										sizes='(min-width: 575.98px) 30vw, 30vw'
										srcset='<?php echo $soc_net_img['sizes']['medium']; ?> 301w,
											<?php echo $soc_net_img['url']; ?> 602w'>
							</picture>
							<div class="social-preview__item-legend"><?php the_sub_field('social-network_signature', 8); ?></div>
						</a>
					<?php endwhile; ?>

				</div>
			</div>
		</div>
