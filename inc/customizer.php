<?php
/**
 * Theme Customizer
 *
 * Code adapted from Underscores theme (underscores.me) and Otto's great tutorial (ottopress.com)
 *
 * @package Alien Ship
 * @since 1.2.0
 */

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
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_show_top_navbar]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'alienship_show_top_navbar', array(
		'settings' => 'optionsframework_alienship[alienship_show_top_navbar]',
		'label'    => __( 'Display the Top Menu navigation bar, even if there\'s no menu assigned.', 'alienship' ),
		'section'  => 'nav',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'optionsframework_alienship[alienship_search_bar]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add search bar control to nav section
	$wp_customize->add_control( 'alienship_search_bar', array(
		'settings' => 'optionsframework_alienship[alienship_search_bar]',
		'label'    => __( 'Display search box in the Top Menu', 'alienship' ),
		'section'  => 'nav',
		'type'     => 'checkbox',
	) );



	/**
	 * Miscellaneous
	 */
	$wp_customize->add_section( 'alienship_misc_options', array(
		'title'    => __( 'Miscellaneous', 'alienship' ),
		'priority' => 120,
	) );

	// Add published date setting
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_published_date]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add published date control
	$wp_customize->add_control( 'alienship_published_date', array(
		'settings' => 'optionsframework_alienship[alienship_published_date]',
		'label'    => __( 'Display published date under each post', 'alienship' ),
		'section'  => 'alienship_misc_options',
		'type'     => 'checkbox',
	) );



	// Add post author setting
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_post_author]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add post author control
	$wp_customize->add_control( 'alienship_post_author', array(
		'settings' => 'optionsframework_alienship[alienship_post_author]',
		'label'    => __( 'Display post author name under each post', 'alienship' ),
		'section'  => 'alienship_misc_options',
		'type'     => 'checkbox',
	) );



	// Add post category setting
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_post_categories]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add post category control
	$wp_customize->add_control( 'alienship_post_categories', array(
		'settings' => 'optionsframework_alienship[alienship_post_categories]',
		'label'    => __( 'Display post categories under each post', 'alienship' ),
		'section'  => 'alienship_misc_options',
		'type'     => 'checkbox',
	) );



	// Add post tag setting
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_post_tags]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add post tags control
	$wp_customize->add_control( 'alienship_post_tags', array(
		'settings' => 'optionsframework_alienship[alienship_post_tags]',
		'label'    => __( 'Display post tags under each post', 'alienship' ),
		'section'  => 'alienship_misc_options',
		'type'     => 'checkbox',
	) );



	// Add post comments link setting
	$wp_customize->add_setting( 'optionsframework_alienship[alienship_post_comments_link]', array(
		'default'    => '1',
		'type'       => 'option',
		'transport'  => 'postMessage',
		'capability' => 'edit_theme_options',
	) );

	// Add post comments link control
	$wp_customize->add_control( 'alienship_post_comments_link', array(
		'settings' => 'optionsframework_alienship[alienship_post_comments_link]',
		'label'    => __( 'Display "Leave a Comment" text under each post', 'alienship' ),
		'section'  => 'alienship_misc_options',
		'type'     => 'checkbox',
	) );
}
add_action( 'customize_register', 'alienship_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alienship_customize_preview_js() {

	wp_enqueue_script( 'alienship_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.2.0', true );
}
add_action( 'customize_preview_init', 'alienship_customize_preview_js' );
