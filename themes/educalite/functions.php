<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	add_theme_support( 'responsive-embeds' );
} );
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'educalite-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
} );
add_action( 'init', function () {
	register_block_pattern_category( 'educalite', array( 'label' => __( 'Educalite', 'educalite' ) ) );
	register_block_pattern_category( 'edu-pages', array( 'label' => __( 'Pages', 'educalite' ) ) );
	register_block_pattern_category( 'edu-sections', array( 'label' => __( 'Sections', 'educalite' ) ) );
} );
