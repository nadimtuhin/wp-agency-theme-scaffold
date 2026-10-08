<?php
/**
 * Agency Theme Scaffold - Functions & Definitions
 *
 * @package AgencyScaffold
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

require_once __DIR__ . '/includes/class-theme-setup.php';
require_once __DIR__ . '/includes/class-ajax-filter.php';

// Initialize core theme subsystems
add_action( 'after_setup_theme', function() {
    \AgencyTheme\ThemeSetup::init();
} );

add_action( 'init', function() {
    \AgencyTheme\AjaxFilter::init();
} );
