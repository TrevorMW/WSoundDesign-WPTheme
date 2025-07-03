<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php echo site_global_description(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/media/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="wrapper headerBar" id="header">
		<header class="container">
			<div class="mobileMenuTrigger">
				<a href="" data-mobile-nav-trigger><span class="material-symbols-rounded">reorder</span></a>
			</div>
			<div class="logo">
				LOGO HERE
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>" alt="" /></a>
				<h1 class="screenReader">W Sound Design</h1>
			</div>
			<div class="alignRight">
				<nav class="mainNav">
					<ul>
						<?php wp_nav_menu(array(
							'menu' => 'primary',
							'theme_location' => 'primary',
							'container' => false,
							'items_wrap' => '%3$s',
							'depth' => 0
						)) ?>
					</ul>
				</nav>
			</div>
		</header>
	</div>

	<?php if (is_front_page()) { ?>
		<main class="wrapper noPadTop">
		<?php } else { ?>
			<main class="wrapper mainContent noPadTop">
			<?php }
	wp_reset_postdata(); ?>