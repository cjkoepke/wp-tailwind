<?php

namespace WP_Tailwind;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

	$min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// JS
	wp_enqueue_script(
		'wp_tailwind_js',
		WP_Tailwind_URL . "/dist/main{$min_ext}.js",
		[],
		WP_Tailwind_VERSION,
		true
	);

	// CSS
	wp_enqueue_style(
		'wp_tailwind_css',
		WP_Tailwind_URL . "/dist/main{$min_ext}.css",
		[],
		WP_Tailwind_VERSION,
		''
	);

} );