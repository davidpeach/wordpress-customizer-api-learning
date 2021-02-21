<?php
/**
 * Plugin Name: Customizer API Learning
 */

function peach_test_boolean_sanitize($value) {
	return $value;
}

function peach_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'peach_section', array(
	  	'title' => __( 'Peach Section' ),
	  	'description' => __( 'Add test controls in here' ),
	  	// 'panel' => '', // Not typically needed.
	  	'priority' => 160,
	  	'capability' => 'edit_theme_options',
	  	// 'theme_supports' => '', // Rarely needed.
	) );

  	$wp_customize->add_setting( 'peach_test_boolean', array(
	  	'type' => 'option', // ['theme_mod' | 'option']
	  	'capability' => 'edit_theme_options',
	  	// 'theme_supports' => '', // Rarely needed.
	  	'default' => '',
	  	'transport' => 'refresh', // or postMessage
	  	'sanitize_callback' => 'peach_test_boolean_sanitize',
	  	// 'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( 'peach_test_boolean', array(
  		'type' => 'checkbox',
	  	'priority' => 10, // Within the section.
	  	'section' => 'peach_section', // Required, core or custom.
	  	'label' => __( 'Peach Boolean Test' ),
	  	'description' => __( 'This is a test for boolan checkbox.' ),
	  	'input_attrs' => array(
	    	'class' => 'my-custom-class-for-js',
	    	'style' => 'border: 1px solid #900',
	    	// 'placeholder' => __( 'mm/dd/yyyy' ),
	  	),
	  	// 'active_callback' => 'is_front_page',
	) );
}

add_action( 'customize_register', 'peach_customize_register' );