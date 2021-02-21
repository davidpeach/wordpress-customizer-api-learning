<?php

require_once __DIR__ . '/BaseSection.php';

class TestTextareaSetting extends BaseSection
{
	public function register()
	{
		$this->wp_customize->add_setting('test_textarea', array(
		  	'type' => 'option', // ['theme_mod' | 'option']
		  	'capability' => 'edit_theme_options',
		  	'default' => '',
		  	'transport' => 'refresh', // or postMessage
		) );

		$this->wp_customize->add_control('test_textarea', array(
	  		'type' => 'textarea',
		  	'priority' => 10, // Within the section.
		  	'section' => $this->section, // Required, core or custom.
		  	'label' => __( 'Test Textarea' ),
		  	'description' => __( 'This is a test for a textarea.' ),
		) );
	}
}