<?php
/**
 * Testimonial Slider Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Testimonial Type', 'classic-addons' ),
		"param_name" 	=> 	"type",
		"description" 	=> 	__( 'Choose how you want to display testimonials', 'classic-addons' ),
		"group" 		=> 	'General',
		"value" 		=> array(
			"Slider" 	=> "slider",
			"Masonry Grid" 	=> "masonry",
			)
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Number of Columns', 'classic-addons' ),
		"param_name" 	=> 	"slidestoshow",
		"description" 	=> 	__( 'How many testimonials at a time', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Slides to Scroll', 'classic-addons' ),
		"param_name" 	=> 	"slidestoscroll",
		"description" 	=> 	__( 'How many testimonial scroll at a time', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Slider Speed', 'classic-addons' ),
		"param_name" 	=> 	"speed",
		"description" 	=> 	__( 'Provide slide speed in ms', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"checkbox",
		"heading" 		=> 	__( 'Bottom Dots', 'classic-addons' ),
		"param_name" 	=> 	"dots",
		"description" 	=> 	__( 'Check to enable dots', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"checkbox",
		"heading" 		=> 	__( 'Arrows', 'classic-addons' ),
		"param_name" 	=> 	"arrows",
		"description" 	=> 	__( 'Check to enable navigation arrows', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"checkbox",
		"heading" 		=> 	__( 'Auto Play', 'classic-addons' ),
		"param_name" 	=> 	"autoplay",
		"description" 	=> 	__( 'Check to enable auto play', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Auto Play Speed', 'classic-addons' ),
		"param_name" 	=> 	"autoplayspeed",
		"description" 	=> 	__( 'Auto Play speed in ms Eg: 3000', 'classic-addons' ),
		"group" 		=> 	'Slider Settings',
		'dependency' => array( 'element' => 'type', 'value' => array('slider') ),
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Stars Color', 'classic-addons' ),
		"param_name" 	=> 	"stars_color",
		"description" 	=> 	__( 'Choose Stars rating color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Text Color', 'classic-addons' ),
		"param_name" 	=> 	"text_color",
		"description" 	=> 	__( 'Choose testimonial text color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Background Color', 'classic-addons' ),
		"param_name" 	=> 	"bg_color",
		"description" 	=> 	__( 'Choose testimonial background color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Title Color', 'classic-addons' ),
		"param_name" 	=> 	"title_color",
		"description" 	=> 	__( 'Choose testimonial title color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Company Name Color', 'classic-addons' ),
		"param_name" 	=> 	"company_color",
		"description" 	=> 	__( 'Choose testimonial company name color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Slider Arrows', 'classic-addons' ),
		"param_name" 	=> 	"arrows_color",
		"description" 	=> 	__( 'Choose testimonial slider arrows color here', 'classic-addons' ),
		"group" 		=> 	'Colors',
	),
);