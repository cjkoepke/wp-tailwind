<?php
/**
 * Kickoff theme setup and build
 */

namespace WP_Tailwind;

define( 'WP_Tailwind_VERSION', wp_get_theme()->version );
define( 'WP_Tailwind_DIR', __DIR__ );
define( 'WP_Tailwind_URL', get_template_directory_uri() );

require_once( WP_Tailwind_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
