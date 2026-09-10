<?php
/**
 * Kindred Foundation — minimal setup. Design lives in theme.json + blocks,
 * demo site content is built by inc/setup-content.php on activation.
 *
 * @package Kindred_Foundation
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
		'kindred-foundation-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

add_action( 'init', function () {
	register_block_pattern_category( 'kindred-foundation', array( 'label' => __( 'Kindred Foundation', 'kindred-foundation' ) ) );
	register_block_pattern_category( 'kindred-pages', array( 'label' => __( 'Pages', 'kindred-foundation' ) ) );
	register_block_pattern_category( 'kindred-sections', array( 'label' => __( 'Sections', 'kindred-foundation' ) ) );
} );
