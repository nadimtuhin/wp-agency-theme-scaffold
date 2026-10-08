<?php
namespace AgencyTheme;

class ThemeSetup {
    public static function init(): void {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
        add_theme_support( 'responsive-embeds' );

        register_nav_menus( [
            'primary' => esc_html__( 'Primary Navigation', 'agency-scaffold' ),
            'footer'  => esc_html__( 'Footer Navigation', 'agency-scaffold' ),
        ] );

        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_assets' ] );
    }

    public static function enqueue_assets(): void {
        $min = defined( 'WP_DEBUG' ) && WP_DEBUG ? '' : '.min';
        $ver = wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'agency-scaffold-main',
            get_template_directory_uri() . "/assets/css/main{$min}.css",
            [],
            $ver
        );

        wp_enqueue_script(
            'agency-scaffold-main',
            get_template_directory_uri() . "/assets/js/main{$min}.js",
            [],
            $ver,
            true
        );

        // Pass localized data for vanilla JS fetch requests
        wp_localize_script(
            'agency-scaffold-main',
            'AgencyConfig',
            [
                'ajaxUrl' => esc_url( admin_url( 'admin-ajax.php' ) ),
                'restUrl' => esc_url_raw( rest_url( 'agency/v1' ) ),
                'nonce'   => wp_create_nonce( 'agency_ajax_nonce' ),
            ]
        );
    }
}
