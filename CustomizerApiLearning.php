<?php

require_once __DIR__ . '/Settings/TestBooleanSetting.php';
require_once __DIR__ . '/Settings/TestTextareaSetting.php';

class CustomizerApiLearning
{
	private $sections;

	private $settings;

	public function __construct()
	{
		$this->sections = [
			[
				'key'   => 'test_section',
				'label' => 'Test Section',
			]
		];

		$this->settings = [
			'test_section' => [
				TestBooleanSetting::class,
				TestTextareaSetting::class,
			],
		];
	}

	public function boot()
	{
		add_action('customize_register', array($this, 'test_customize_register') );
	}

	public function test_customize_register($wp_customize) {

		foreach ($this->sections as $section) {
			$wp_customize->add_section( $section['key'], array(
			  	'title' => __( $section['label'] ),
			  	'description' => __( 'Add test controls in here' ),
			  	'priority' => 160,
			  	'capability' => 'edit_theme_options',
			) );
		}

		foreach ($this->settings as $section => $settings) {
			
			foreach ($settings as $setting) {
				$settingClass = new $setting;
				$settingClass->addToSection($section);
				$settingClass->useCustomizerObject($wp_customize);
				$settingClass->register();
			}
		}

		
	}

	
}