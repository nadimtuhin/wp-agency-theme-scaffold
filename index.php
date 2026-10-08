<?php
get_header();
?>
<section class="l-section">
    <div class="l-container">
        <h1 class="u-visually-hidden"><?php esc_html_e( 'Latest Posts', 'agency-scaffold' ); ?></h1>
        <div class="l-grid l-grid--3-col">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/components/card', 'post' );
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
