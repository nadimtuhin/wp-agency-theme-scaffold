<?php
/**
 * The header template
 *
 * @package AgencyScaffold
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'l-site' ); ?>>
<?php wp_body_open(); ?>

<header class="c-header" role="banner">
    <div class="l-container c-header__container">
        <a class="c-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <span class="c-header__logo-text"><?php bloginfo( 'name' ); ?></span>
        </a>

        <button class="c-header__toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'agency-scaffold' ); ?>">
            <span class="c-header__toggle-bar"></span>
            <span class="c-header__toggle-bar"></span>
            <span class="c-header__toggle-bar"></span>
        </button>

        <nav class="c-nav" id="primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'agency-scaffold' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'c-nav__list',
                    'fallback_cb'    => false,
                    'depth'          => 2,
                ] );
            }
            ?>
        </nav>
    </div>
</header>

<main class="l-main" id="main-content" role="main">
