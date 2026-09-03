<?php
/**
 * Nova Business — minimal setup. All design lives in theme.json + blocks.
 *
 * @package Nova_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/setup-content.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	add_theme_support( 'responsive-embeds' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'nova-business-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

add_action( 'init', function () {
	register_block_pattern_category( 'nova-business', array( 'label' => __( 'Nova Business', 'nova-business' ) ) );
	register_block_pattern_category( 'nova-pages', array( 'label' => __( 'Pages', 'nova-business' ) ) );
	register_block_pattern_category( 'nova-sections', array( 'label' => __( 'Sections', 'nova-business' ) ) );
} );
