<?php
/**
 * Evermore Weddings — minimal setup. Design lives in theme.json + blocks,
 * demo site content is built by inc/setup-content.php on activation.
 *
 * @package Evermore_Weddings
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
		'evermore-weddings-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

add_action( 'init', function () {
	register_block_pattern_category( 'evermore-weddings', array( 'label' => __( 'Evermore Weddings', 'evermore-weddings' ) ) );
	register_block_pattern_category( 'evermore-pages', array( 'label' => __( 'Pages', 'evermore-weddings' ) ) );
	register_block_pattern_category( 'evermore-sections', array( 'label' => __( 'Sections', 'evermore-weddings' ) ) );
} );
