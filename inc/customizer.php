<?php
/**
 * Theme Customizer
 *
 * Code adapted from Underscores theme (underscores.me) and Otto's great tutorial (ottopress.com)
 *
 * @package Alien Ship
 */

/**
 * Sanitizes checkbox inputs
 */
function alienship_sanitize_checkbox( $input ) {
	if( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}


/**
 * Add custom sections, controls, and settings to the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function alienship_customize_register( $wp_customize ) {

	// Add postMessage support for site title and description for the Theme Customizer.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
	 * Navigation
	 */
	$wp_customize->add_setting( 'alienship_breadcrumbs', array(
		'default'    => false,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'alienship_breadcrumbs', array(
		'settings'          => 'alienship_breadcrumbs',
		'label'             => __( 'Display breadcrumb navigation?', 'alienship' ),
		'section'           => 'nav',
		'type'              => 'checkbox',
		'sanitize_callback' => 'alienship_sanitize_checkbox',
	) );

	$wp_customize->add_setting( 'alienship_display_masthead', array(
		'default'    => false,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'alienship_display_masthead', array(
		'settings'          => 'alienship_display_masthead',
		'label'             => __( 'Check to display the site title and description in a larger banner at the top of your site.', 'alienship' ),
		'section'           => 'title_tagline',
		'type'              => 'checkbox',
		'sanitize_callback' => 'alienship_sanitize_checkbox',
	) );
}
add_action( 'customize_register', 'alienship_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alienship_customize_preview_js() {

	wp_enqueue_script( 'alienship_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.2.0', true );
}
add_action( 'customize_preview_init', 'alienship_customize_preview_js' );
