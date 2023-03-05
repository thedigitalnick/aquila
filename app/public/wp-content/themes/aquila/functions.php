<?php
/**
 * Theme Functions
 * 
 * @package Aquila
 */


 if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
    DEFINE( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
 }

 if ( ! defined( 'AQUILA_DIR_URI' ) ) {
    DEFINE( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
 }

 require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

 function aquila_get_theme_instance() {
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
 }

 aquila_get_theme_instance();


 function aquila_enqueue_scripts() {
    // Register Styles
    wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css'), 'all' );
    wp_register_style( 'bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    //Register Scripts
    wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', [], filemtime( AQUILA_DIR_PATH . '/assets/main.js'), true );
    wp_register_script( 'bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', [ 'jquery' ] , false, true);

    // Enqueue Style
    wp_enqueue_style( 'style-css' );
    wp_enqueue_style( 'bootstrap-css' );

    // Enqueue Script
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
   
 }
 add_action( 'wp_enqueue_scripts','aquila_enqueue_scripts' );

 ?>