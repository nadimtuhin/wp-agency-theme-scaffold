<?php
/**
 * BEM Card Component
 *
 * @package AgencyScaffold
 */
?>
<article class="c-card">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="c-card__media">
			<?php
			the_post_thumbnail(
				'medium_large',
				[
					'class'   => 'c-card__image',
					'loading' => 'lazy',
				]
			);
			?>
		</div>
	<?php endif; ?>
	<div class="c-card__body">
		<h2 class="c-card__title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="c-card__link"><?php the_title(); ?></a>
		</h2>
		<p class="c-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
		<span class="c-card__meta"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
</article>
