<?php
/**
 * Sterling Cole — minimal setup. Design lives in theme.json + blocks,
 * demo site content is built by inc/setup-content.php on activation.
 *
 * @package Sterling_Cole
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
		'sterling-cole-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

add_action( 'init', function () {
	register_block_pattern_category( 'sterling-cole', array( 'label' => __( 'Sterling Cole', 'sterling-cole' ) ) );
	register_block_pattern_category( 'sterling-pages', array( 'label' => __( 'Pages', 'sterling-cole' ) ) );
	register_block_pattern_category( 'sterling-sections', array( 'label' => __( 'Sections', 'sterling-cole' ) ) );
} );
