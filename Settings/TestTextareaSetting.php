<?php

class TestTextareaSetting
{
	private $section;

	private $wp_customize;

	public function addToSection($section)
	{
		$this->section = $section;
	}

	public function useCustomizerObject($wp_customize)
	{
		$this->wp_customize = $wp_customize;
	}

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