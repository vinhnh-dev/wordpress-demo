<?php
/**
 * Online Learning theme — block theme bootstrap.
 *
 * @package OnlineLearningTheme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme supports and translations.
 */
function online_learning_theme_setup() {
	load_theme_textdomain( 'online-learning-theme', get_template_directory() . '/languages' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'block-template-parts' );
}
add_action( 'after_setup_theme', 'online_learning_theme_setup' );
