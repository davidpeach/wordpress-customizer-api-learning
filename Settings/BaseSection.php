<?php

abstract class BaseSection
{
	protected $section;

	protected $wp_customize;

	public function addToSection($section)
	{
		$this->section = $section;
	}

	public function useCustomizerObject($wp_customize)
	{
		$this->wp_customize = $wp_customize;
	}
}