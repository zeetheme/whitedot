<?php
/**
 * Enqueue scripts and styles.
 */


//LifterLMS Custom CSS
function whitedot_lifterlms_custom(){
	wp_enqueue_style('whitedot-lifterlms-custom', get_stylesheet_directory_uri() . '/css/lifterlms-custom.css'); 
}

//Font Awesome
function whitedot_add_font_awesome_min(){
	wp_enqueue_style('whitedot-font-awesome-min', get_stylesheet_directory_uri() . '/css/font-awesome.min.css'); 
}

//Google Font
function whitedot_add_google_fonts() {
wp_enqueue_style( 'whitedot_google_fonts', 'https://fonts.googleapis.com/css?family=Varela+Round', false ); 
}

//Customizer CSS
function whitedot_customizer_styles() {

	wp_register_style( 'whitedot-customizer-css', get_template_directory_uri() . '/css/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'whitedot-customizer-css' );

}





//Script
function whitedot_scripts() {
	wp_enqueue_style( 'whitedot-style', get_stylesheet_uri() );

	wp_enqueue_script('whitedot-main-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true );

	wp_enqueue_script( 'whitedot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

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
