<?php
namespace AgencyTheme;

class AjaxFilter {
	public static function init(): void {
		add_action( 'wp_ajax_agency_filter_projects', [ __CLASS__, 'handle_filter' ] );
		add_action( 'wp_ajax_nopriv_agency_filter_projects', [ __CLASS__, 'handle_filter' ] );
	}

	public static function handle_filter(): void {
		check_ajax_referer( 'agency_ajax_nonce', 'nonce' );

		$category = isset( $_POST['category'] ) ? sanitize_key( wp_unslash( $_POST['category'] ) ) : '';
		$page     = isset( $_POST['page'] ) ? max( 1, absint( $_POST['page'] ) ) : 1;

		$args = [
			'post_type'      => 'project',
			'post_status'    => 'publish',
			'posts_per_page' => 6,
			'paged'          => $page,
		];

		if ( ! empty( $category ) && 'all' !== $category ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'project_category',
					'field'    => 'slug',
					'terms'    => $category,
				],
			];
		}

		$query = new \WP_Query( $args );
		ob_start();

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'template-parts/components/card', 'post' );
			}
			wp_reset_postdata();
		} else {
			echo '<p class="c-empty-state">' . esc_html__( 'No projects found.', 'agency-scaffold' ) . '</p>';
		}

		$html = ob_get_clean();

		wp_send_json_success(
			[
				'html'        => $html,
				'max_pages'   => $query->max_num_pages,
				'total_found' => $query->found_posts,
			]
		);
	}
}
