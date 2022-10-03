<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dentalika
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="title" content="Dentalika - безупречность в деталях">
	<meta property="og:title" content="Dentalika - безупречность в деталях">
	<meta property="og:description" content="Комфортное и безболезненное лечение для безупречного результата с гарантией в оптимальные сроки.">
	<meta property="og:url" content="https://dentalikaodessa.od.ua/">
	<meta property="og:site_name" content="https://dentalikaodessa.od.ua/">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/accets/images/logo-meta.jpg">
	<meta property="og:image:secure_url" content="<?php echo get_template_directory_uri(); ?>/accets/images/logo-meta.jpg">
	<meta property="og:image:width" content="283">
	<meta property="og:image:height" content="283">
	<meta property="og:image:type" content="image/jpeg">
	<link rel="canonical" href="https://dentalikaodessa.od.ua/">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/accets/libs/bootstrap/dist/css/bootstrap-grid.min.css" as="style">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/accets/libs/slick-carousel/slick.css" as="style">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/accets/libs/slick-carousel/slick.min.js" as="script">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="top-line">
						<div class="hamburger-wrapper">
							<div class="hamburger hamburger--elastic">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</div>
						<a href="<?php echo get_home_url(); ?>" class="header-logo" rel="home" aria-current="page">
							<?php the_field('logo-svg', 14); ?>
						</a>
						<div class="top-line__right">
							<nav class="menu-wrapper header__menu-wrapper">
								<?php
									if( is_front_page() ):
										$menu = 'main_menu';
									else:
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
							<a href="tel:+<?php the_field('header-btn-number', 8); ?>" class="top-line__btn btn-1"><?php the_field('header-btn-text', 8); ?></a>
							<div class="lang-btns top-line__lang-btns">
								<?php echo do_shortcode( '[sc_msls]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
