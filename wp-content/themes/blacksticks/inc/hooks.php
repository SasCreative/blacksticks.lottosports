<?php
/**
 * Custom hooks
 *
 * @package blacksticks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'blacksticks_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function blacksticks_site_info() {
		do_action( 'blacksticks_site_info' );
	}
}

if ( ! function_exists( 'blacksticks_add_site_info' ) ) {
	add_action( 'blacksticks_site_info', 'blacksticks_add_site_info' );

	/**
	 * Add site info content.
	 */
	function blacksticks_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'blacksticks' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'blacksticks' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'blacksticks' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://blacksticks.com', 'blacksticks' ) ) . '">blacksticks.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'blacksticks' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'blacksticks_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
