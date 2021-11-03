<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stellar
 */

?>


<!DOCTYPE HTML>

<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/noscript.css" /></noscript>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class('is-preload'); ?>>
	<?php wp_body_open(); ?> 

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1><?php bloginfo( 'name' ); ?></h1>
						<p><?php echo get_bloginfo( 'description', 'display' ); ?></p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<!-- <ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">First Section</a></li>
							<li><a href="#second">Second Section</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul> -->
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav>

					<div id="main">