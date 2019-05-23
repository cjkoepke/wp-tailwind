<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_Tailwind;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri() . '/assets/images/favicon.png'; ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( [
			'items_wrap'      => '<button class="toggle absolute pin-t pin-r mt-4 mr-4 button button-sm">Close</button><ul id="%1$s" class="%2$s">%3$s</ul>',
			'theme_location'  => 'primary',
			'container'       => 'nav',
			'container_class' => 'nav-mobile',
			'container_id'    => 'mobile-menu',
			'menu_class'      => 'list-reset m-12'
		] );
	}?>

	<header class="header">
		<div class="container mx-auto">
			<?php
			$tag = 'p';
			if ( is_front_page() || is_home() ) {
				$tag = 'h1';
			}

			printf( '<%1$s class="text-h1 m-0"><a class="text-xl no-underline uppercase" href="%2$s" rel="home">%3$s</a></%1$s>',
				$tag,
				esc_url( home_url( '/' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);

			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu([
					'theme_location'  => 'primary',
					'container'       => 'nav',
					'container_class' => 'nav-primary ml-auto',
					'menu_class'      => 'list-reset m-0 md:flex md:justify-end md:items-center'
				]);
			} ?>
			<div class="menu-item">
				<button class="toggle highlight">Menu</button>
			</div>
		</div>
	</header>

	<main>