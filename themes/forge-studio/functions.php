<?php
/**
 * Forge Studio — minimal setup. Design lives in theme.json + blocks,
 * demo site content is built by inc/setup-content.php on activation.
 *
 * @package Forge_Studio
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
		'forge-studio-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

add_action( 'init', function () {
	register_block_pattern_category( 'forge-studio', array( 'label' => __( 'Forge Studio', 'forge-studio' ) ) );
	register_block_pattern_category( 'forge-pages', array( 'label' => __( 'Pages', 'forge-studio' ) ) );
	register_block_pattern_category( 'forge-sections', array( 'label' => __( 'Sections', 'forge-studio' ) ) );
} );
