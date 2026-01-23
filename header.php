<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package project-london
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
		.site-header-wrapper .header-right a {
			color: #221F1C;
		}
		
		.site-header-wrapper.active .main-logo-svg path {
		fill: #fff;
		}

		.header-open-change svg path {
		transition: all .3s ease;
		}

		.site-header-wrapper-main.on-dark .header-logo svg path {
		fill: #fff;
		}

		.site-header-wrapper-main.on-dark .header-open-change svg path,
		.header-open.active .header-open-change svg path {
		stroke: #fff;
		}

		.site-header-wrapper-main.on-dark .header-right a, .site-header-wrapper-main.on-dark .header-right .header-open-change span ,
		.site-header-wrapper.active .header-right a,  .header-open.active .header-open-close,  
		.header-open.active .header-open-menu {
		color: #fff;
		}
		
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="site-header-wrapper">
				<div class="site-header-wrapper-main <?php if ( is_front_page() ): ?> on-dark <?php endif; ?>">
					<a href="/" class="header-logo">
					<svg xmlns="http://www.w3.org/2000/svg" width="82" height="32" viewBox="0 0 82 32" fill="none" class="main-logo-svg">
					<g clip-path="url(#clip0_286_6964)">
						<path d="M0 8.2935V23.0185H1.57225V9.20298L14.7566 1.79942L27.9002 9.44273V24.2407L29.4712 23.1996V8.54758L14.7697 0L0 8.2935Z" fill="#221F1C"/>
						<path d="M26.5866 25.111V10.1958L14.737 3.41504L2.88477 10.1397V23.0184H4.4557V11.0453L14.7344 5.21446L25.0157 11.0974V26.1534L26.5866 25.111Z" fill="#221F1C"/>
						<path d="M7.44984 12.6376L14.7323 8.41336L22.0201 12.6885V28.1392L23.591 27.0969V11.7985L14.7376 6.60352L5.87891 11.7412V23.0185H7.44984V12.6376Z" fill="#221F1C"/>
						<path d="M10.4472 14.291L14.7309 11.8271L19.0815 14.3953V30.0884L20.6524 29.046V13.5066L14.7414 10.0186L8.875 13.392V23.0184H10.4472V14.291Z" fill="#221F1C"/>
						<path d="M13.2741 16.1806L14.7348 15.3037L16.1955 16.1806V32.0001L17.7677 30.9577V15.3011L14.7348 13.4795L11.7031 15.3011V23.0186H13.2741V16.1806Z" fill="#221F1C"/>
						<path d="M33.1458 23.0581V8.20533H37.0069L37.3691 10.6615H37.4597C37.9427 9.78324 38.6015 9.09396 39.4348 8.59492C40.2695 8.09588 41.3089 7.8457 42.557 7.8457C43.8051 7.8457 44.8892 8.12063 45.754 8.66919C46.6189 9.21905 47.2777 10.0074 47.7292 11.0354C48.182 12.0635 48.4077 13.3261 48.4077 14.8232V23.0581H43.8839V15.2414C43.8839 14.0844 43.6581 13.1905 43.2054 12.5612C42.7526 11.9319 42.0032 11.6178 40.9585 11.6178C40.3155 11.6178 39.7472 11.7677 39.2537 12.0674C38.7603 12.3671 38.3744 12.801 38.0923 13.3704C37.8101 13.9398 37.6697 14.6238 37.6697 15.4213V23.0581H33.1445H33.1458Z" fill="#221F1C"/>
						<path d="M73.9886 20.0032C74.4716 20.0032 74.8981 19.9237 75.2708 19.7635C75.6423 19.6032 75.9599 19.3895 76.221 19.1198C76.4822 18.8501 76.6935 18.536 76.8549 18.1764C77.0163 17.8168 77.1358 17.4285 77.2171 17.0089H74.2918C73.7695 17.0089 73.3416 17.0741 73.0096 17.2031C72.6776 17.3334 72.4308 17.5132 72.2707 17.7412C72.1093 17.9719 72.0292 18.2455 72.0292 18.5647C72.0292 18.8839 72.1093 19.1484 72.2707 19.3582C72.4308 19.568 72.6631 19.7283 72.965 19.8377C73.2668 19.9485 73.608 20.0032 73.99 20.0032M72.4807 23.417C71.2746 23.417 70.2785 23.2177 69.495 22.8177C68.7115 22.4189 68.138 21.8847 67.7758 21.215C67.4135 20.5465 67.2324 19.8025 67.2324 18.9843C67.2324 18.0865 67.4582 17.2917 67.9109 16.6037C68.3637 15.9144 69.0724 15.3711 70.037 14.9711C71.0016 14.5724 72.2392 14.3717 73.7472 14.3717H77.4271C77.4271 13.6928 77.3366 13.1391 77.1554 12.7104C76.9743 12.2817 76.6882 11.9612 76.2958 11.7514C75.9034 11.5416 75.3863 11.4374 74.742 11.4374C74.0372 11.4374 73.4296 11.5872 72.9177 11.8869C72.4046 12.1866 72.0883 12.6557 71.9675 13.2941H67.6235C67.7246 12.197 68.0855 11.2432 68.7089 10.4341C69.3323 9.62623 70.1617 8.99168 71.1972 8.53303C72.2327 8.07438 73.4243 7.84375 74.7708 7.84375C76.2184 7.84375 77.4809 8.07307 78.5571 8.53303C79.6319 8.99298 80.4666 9.67575 81.0611 10.5839C81.6543 11.4921 81.9509 12.6049 81.9509 13.9235V23.0574H78.2106L77.6975 20.8111H77.6069C77.3247 21.2502 77.0032 21.6293 76.641 21.9486C76.2788 22.2678 75.8824 22.5375 75.4493 22.7577C75.0162 22.9779 74.5543 23.1421 74.0621 23.2515C73.5687 23.361 73.0411 23.417 72.4781 23.417" fill="#221F1C"/>
						<path d="M54.7641 13.4908C55.0856 12.8823 55.5331 12.4028 56.1066 12.0536C56.6802 11.7044 57.3377 11.5298 58.0818 11.5298C58.8259 11.5298 59.4847 11.7044 60.057 12.0536C60.6305 12.4028 61.0714 12.8875 61.3838 13.5064C61.6948 14.1253 61.851 14.8237 61.851 15.6029C61.851 16.4225 61.6948 17.13 61.3838 17.7294C61.0714 18.3288 60.6292 18.807 60.057 19.1666C59.4834 19.5262 58.8246 19.706 58.0818 19.706C57.339 19.706 56.6802 19.5314 56.1066 19.1822C55.5331 18.833 55.0856 18.3496 54.7641 17.7294C54.4425 17.1105 54.2811 16.4121 54.2811 15.6329C54.2811 14.8146 54.4412 14.1006 54.7641 13.4921M54.0409 20.6924H54.1315C54.4937 21.2514 54.9255 21.7361 55.4281 22.1452C55.9308 22.5543 56.5148 22.8697 57.1776 23.0886C57.8416 23.3075 58.5753 23.4182 59.3798 23.4182C60.7866 23.4182 62.019 23.0834 63.0742 22.4149C64.1293 21.7465 64.9548 20.8279 65.548 19.6604C66.1412 18.4929 66.4378 17.1509 66.4378 15.6329C66.4378 14.1149 66.1412 12.7728 65.548 11.6054C64.9548 10.4379 64.1254 9.51928 63.0597 8.84955C61.9941 8.18111 60.7473 7.84625 59.3194 7.84625C58.1934 7.84625 57.2182 8.05603 56.3941 8.47559C55.5686 8.89515 54.9163 9.41504 54.4333 10.0327C54.4373 7.56741 54.4399 5.10347 54.4438 2.63822C52.932 1.7587 51.4201 0.880491 49.9082 0.000976562C49.9082 7.68728 49.9082 15.3736 49.9082 23.0586H53.7391L54.0409 20.6924Z" fill="#221F1C"/>
					</g>
					<defs>
						<clipPath id="clip0_286_6964">
						<rect width="81.9512" height="32" fill="#221F1C"/>
						</clipPath>
					</defs>
					</svg>
					</a>
				<div class="header-right"  data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
					<a href="/contact">
						Contact
					</a>
					<button class="header-open">
				
					
					<div class="header-open-change">
						<span class="header-open-menu">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M0 4H18" stroke="#221F1C" stroke-linejoin="round"/>
					<path d="M0 10H18" stroke="#221F1C" stroke-linejoin="round"/>
					<path d="M0 16H18" stroke="#221F1C" stroke-linejoin="round"/>
					</svg>
						Menu
					</span>
					<span class="header-open-close">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M2.63672 16.3643L15.3646 3.63634" stroke="#221F1C" stroke-linejoin="round"/>
					<path d="M2.63672 3.63574L15.3646 16.3637" stroke="#221F1C" stroke-linejoin="round"/>
					</svg>
						Close
					</span>
					</div>
					
				</button>
				</div>
				
				</div>
			</div>
	<div class="header-burger-menu">
			<div class="header-burger-menu-wrapper">

				<?php
				$menu_items = [];

				if (have_rows('header_menu', 'header_options')) {
				while (have_rows('header_menu', 'header_options')) { the_row();

					$link = get_sub_field('link');

					$submenu = [];
					if (have_rows('submenu')) {
					while (have_rows('submenu')) { the_row();
						$sub = get_sub_field('sub_link');
						if ($sub && !empty($sub['url'])) {
						$submenu[] = $sub;
						}
					}
					}

					$overview = get_sub_field('overview_link');

					if ($link && !empty($link['url'])) {
					$menu_items[] = [
						'link'     => $link,
						'submenu'  => $submenu,
						'overview' => ($overview && !empty($overview['url'])) ? $overview : null,
					];
					}
				}
				}
				?>

				<div class="hb-grid">
				<div class="hb-side">
					<div class="hb-menu-with-img">

					<!-- ================= MAIN MENU ================= -->
					<?php if (!empty($menu_items)): ?>
						<nav class="hb-menu" aria-label="Header menu">

						<div class="hb-menu__list">
							<?php foreach ($menu_items as $idx => $item):
							$link    = $item['link'];
							$hasSub  = !empty($item['submenu']);
							$subId   = 'hb-sub-' . $idx;
							?>
							<a
								class="hb-menu__link <?php echo $hasSub ? 'has-submenu' : ''; ?>"
								href="<?php echo esc_url($link['url']); ?>"
								target="<?php echo esc_attr($link['target'] ?: '_self'); ?>"
								<?php if ($hasSub): ?>
								aria-haspopup="true"
								aria-expanded="false"
								data-open-submenu="<?php echo esc_attr($subId); ?>"
								data-submenu-id="<?php echo esc_attr($subId); ?>"
								<?php endif; ?>
							>
								<?php echo esc_html($link['title']); ?>
							</a>
							<?php endforeach; ?>
						</div>

						<!-- ================= DESKTOP RIGHT ================= -->
						<div class="hb-right">
							<div class="hb-submenus">
							<?php foreach ($menu_items as $idx => $item):
								if (empty($item['submenu'])) continue;

								$subId = 'hb-sub-' . $idx;
								$link  = $item['link'];
							?>
								<div class="hb-submenu-panel" id="<?php echo esc_attr($subId); ?>">
								<div class="hb-submenu__list">
									<?php foreach ($item['submenu'] as $sub): ?>
									<a class="hb-submenu__link" href="<?php echo esc_url($sub['url']); ?>">
										<?php echo esc_html($sub['title']); ?>
									</a>
									<?php endforeach; ?>
								</div>
								</div>
							<?php endforeach; ?>
							</div>

							<?php $static_img = get_field('mega_menu_image', 'header_options'); ?>
							<?php if ($static_img): ?>
							<div class="hb-static-media">
								<img
								class="hb-static-media__img"
								src="<?php echo esc_url($static_img['url']); ?>"
								alt="<?php echo esc_attr($static_img['alt'] ?? ''); ?>"
								/>
							</div>
							<?php endif; ?>
						</div>

						</nav>
					<?php endif; ?>

					<!-- ================= MOBILE SUBMENUS ================= -->
					<?php foreach ($menu_items as $idx => $item):
					if (empty($item['submenu'])) continue;

					$subId = 'hb-sub-' . $idx;
					$link  = $item['link'];

					$subs = $item['submenu'];

					$bottom_link = null;
					if (!empty($subs)) {
						$bottom_link = array_pop($subs);
					}
					?>
					<div class="hb-submenu-panel hb-submenu-panel--mobile" id="<?php echo esc_attr($subId); ?>-mobile">

						<button class="hb-back" type="button" data-back>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
						</svg>

						<?php echo esc_html($link['title']); ?>
						</button>

						<div class="hb-submenu__list">
						<?php foreach ($subs as $sub): ?>
							<a class="hb-submenu__link" href="<?php echo esc_url($sub['url']); ?>">
							<?php echo esc_html($sub['title']); ?>
							</a>
						<?php endforeach; ?>
						</div>

						<?php if ($bottom_link): ?>
						<div class="hb-submenu__bottom">
							<a class="hb-submenu__link hb-submenu__link--bottom" href="<?php echo esc_url($bottom_link['url']); ?>">
							<?php echo esc_html($bottom_link['title']); ?>
							</a>
						</div>
						<?php endif; ?>

					</div>
					<?php endforeach; ?>


					</div>
				</div>
				</div>

			</div>
			</div>

		</header>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		document.querySelectorAll('.header-logo').forEach(svg => {
		requestAnimationFrame(() => svg.classList.add('is-animate'));
		});
	});

	(function () {
	var header = document.querySelector('.site-header-wrapper-main');
	if (!header) return;

	var DARK_SELECTOR = '[data-theme="dark"], .bg-dark, .section--dark';

	function isHeaderOverDarkByTop() {
		var hb = header.getBoundingClientRect();
		var sampleY = Math.max(0, Math.round(hb.top + 20)); 

		var darks = document.querySelectorAll(DARK_SELECTOR);
		for (var i = 0; i < darks.length; i++) {
		var r = darks[i].getBoundingClientRect();
		if (r.top <= sampleY && r.bottom >= sampleY) return true;
		}
		return false;
	}

	var ticking = false;
	function update() {
		ticking = false;
		header.classList.toggle('on-dark', isHeaderOverDarkByTop());
	}

	function onScroll() {
		if (!ticking) {
		ticking = true;
		requestAnimationFrame(update);
		}
	}

	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll);
	document.addEventListener('DOMContentLoaded', update);
	update();
	})();
</script>