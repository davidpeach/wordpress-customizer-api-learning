<?php

require_once __DIR__ . '/BaseSection.php';

class TestBooleanSetting extends BaseSection
{
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