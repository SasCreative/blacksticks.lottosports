<?php
/**
 * blacksticks enqueue scripts
 *
 * @package blacksticks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'blacksticks_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function blacksticks_scripts() {
		// Get the theme data.
		wp_enqueue_style( 'font-awsome', get_stylesheet_directory_uri() .'/vender/fontawesome/css/all.min.css', array(), '5.1' );
		wp_enqueue_style( 'bootstrap-styles', get_stylesheet_directory_uri() .'/vender/bootstrap/css/bootstrap.min.css', array(),'4.1'   );
		wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/style.min.css', array() );
		wp_enqueue_style( 'blacksticks-theme', get_stylesheet_uri() );
		

		wp_enqueue_script( 'font-awsome', get_template_directory_uri() . '/vender/fontawesome/js/all.min.js', array(), '5.1' , true );
		wp_enqueue_script( 'jquery-scripts', get_template_directory_uri() . '/vender/jquery/jquery.js', array(),'3.4.1', false);
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/vender/popper/popper.min.js', array(),'1.1', false);
		wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/vender/bootstrap/js/bootstrap.min.js', array(),'3.1', false);
		wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme.js', array() , true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'blacksticks_scripts' ).

add_action( 'wp_enqueue_scripts', 'blacksticks_scripts' );
