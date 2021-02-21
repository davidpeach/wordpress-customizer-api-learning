<?php

class TestBooleanSetting
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
		$this->wp_customize->add_setting( 'peach_test_boolean', array(
		  	'type' => 'option', // ['theme_mod' | 'option']
		  	'capability' => 'edit_theme_options',
		  	'default' => '',
		  	'transport' => 'refresh', // or postMessage
		) );

		$this->wp_customize->add_control( 'peach_test_boolean', array(
	  		'type' => 'checkbox',
		  	'priority' => 10, // Within the section.
		  	'section' => $this->section, // Required, core or custom.
		  	'label' => __( 'Peach Boolean Test' ),
		  	'description' => __( 'This is a test for boolan checkbox.' ),
		) );
	}
}