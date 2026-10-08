<?php
/**
 * The footer template
 *
 * @package AgencyScaffold
 */
?>
</main><!-- #main-content -->

<footer class="c-footer" role="contentinfo">
    <div class="l-container c-footer__container">
        <p class="c-footer__copyright">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'agency-scaffold' ); ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
