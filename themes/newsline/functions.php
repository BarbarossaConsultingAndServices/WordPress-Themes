<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once get_stylesheet_directory() . '/inc/setup-content.php';
add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	add_theme_support( 'responsive-embeds' );
} );
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'newsline-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
} );
add_action( 'init', function () {
	register_block_pattern_category( 'newsline', array( 'label' => __( 'Newsline', 'newsline' ) ) );
	register_block_pattern_category( 'news-pages', array( 'label' => __( 'Pages', 'newsline' ) ) );
	register_block_pattern_category( 'news-sections', array( 'label' => __( 'Sections', 'newsline' ) ) );
} );
