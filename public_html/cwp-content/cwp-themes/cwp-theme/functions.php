<?php
/**
 * CWP Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package CWP Theme
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'CWP_THEME_VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function cwp_theme_setup() {
	/**
	 * Makes CWP Theme available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on CWP Theme, use a find and replace
	 * to change 'cwp_theme' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'cwp_theme', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'cwp_theme_setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function cwp_theme_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'cwp_theme', get_template_directory_uri() . "/assets/js/cwp_theme{$postfix}.js", array(), CWP_THEME_VERSION, true );
		
	wp_enqueue_style( 'cwp_theme', get_template_directory_uri() . "/assets/css/cwp_theme{$postfix}.css", array(), CWP_THEME_VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'cwp_theme_scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function cwp_theme_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'cwp_theme_humans', $humans );
 }
 add_action( 'wp_head', 'cwp_theme_header_meta' );