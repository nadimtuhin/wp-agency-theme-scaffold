<?php
/**
 * Template Name: Custom Agency Landing Page
 * Description: Custom page template built to Figma specifications with hero, interactive AJAX filter, and client inquiry block.
 *
 * @package AgencyScaffold
 */

get_header();
?>

<section class="c-hero">
    <div class="l-container c-hero__inner">
        <span class="c-hero__badge"><?php esc_html_e( 'Custom Web Solutions', 'agency-scaffold' ); ?></span>
        <h1 class="c-hero__title"><?php the_title(); ?></h1>
        <div class="c-hero__lead"><?php the_content(); ?></div>
        <div class="c-hero__actions">
            <a href="#inquiry" class="c-btn c-btn--primary"><?php esc_html_e( 'Request a Quote', 'agency-scaffold' ); ?></a>
        </div>
    </div>
</section>

<section class="l-section c-portfolio" id="portfolio">
    <div class="l-container">
        <div class="c-section-header">
            <h2 class="c-section-header__title"><?php esc_html_e( 'Featured Client Projects', 'agency-scaffold' ); ?></h2>
            <div class="c-filter-nav" role="tablist">
                <button class="c-filter-nav__item c-filter-nav__item--active" data-filter="all"><?php esc_html_e( 'All Works', 'agency-scaffold' ); ?></button>
                <button class="c-filter-nav__item" data-filter="ecommerce"><?php esc_html_e( 'WooCommerce', 'agency-scaffold' ); ?></button>
                <button class="c-filter-nav__item" data-filter="custom-dev"><?php esc_html_e( 'Custom Plugins', 'agency-scaffold' ); ?></button>
            </div>
        </div>

        <div class="l-grid l-grid--3-col c-portfolio__grid" id="project-results">
            <!-- Loaded dynamically via vanilla JS fetch or static loop -->
        </div>
    </div>
</section>

<?php
get_footer();
