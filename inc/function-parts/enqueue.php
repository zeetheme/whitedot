<?php
/**
 * Enqueue scripts and styles.
 */

//Customizer CSS
function whitedot_customizer_styles() {

	wp_register_style( 'whitedot-customizer-css', get_template_directory_uri() . '/css/minified/customizer.min.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'whitedot-customizer-css' );

}

//Script
function whitedot_scripts() {
	wp_enqueue_style( 'whitedot-style', get_stylesheet_uri() );

	wp_enqueue_style('font-awesome-min', get_stylesheet_directory_uri() . '/css/font-awesome.min.css'); 

	wp_enqueue_style('whitedot-style-minified', get_stylesheet_directory_uri() . '/css/minified/style.min.css'); 

	wp_enqueue_script('whitedot-main-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whitedot_customize_preview_js() {
	wp_enqueue_script( 'whitedot-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

/**
 * JS file for Customizer custom controls.
 */
function whitedot_customize_custom_js() {
	wp_enqueue_script( 'whitedot-customizer-custom', get_template_directory_uri() . '/js/customizer-custom.js', array( 'customize-preview' ), '20151215', true );
}

/**
 * Custom js for Theme Customizer Control
 */
function whitedot_customizer_control_js() {
    wp_enqueue_script( 'whitedot_customizer_control', get_template_directory_uri() . '/js/customizer-control.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
