<?php
/**
 * FlipBook Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
	    "type" => "dropdown",
	    "heading" => __("Book Style", "classic-addons"),
	    "param_name" => "style",
	    "description" => __("Choose the particular mode of book", "classic-addons"),
	    'value' => array(
	        __('Dual Pages', 'classic-addons') => 'caw_fb_dual_pages',
	        __('Single Pages', 'classic-addons') => 'caw_fb_single_pages',
	    ),
    	'std' => 'dual_pages',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Arrows', 'classic-addons' ),
		'param_name' => 'arrows',
		'description' => __( 'Check to display arrows with book', 'classic-addons' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Tabs', 'classic-addons' ),
		'param_name' => 'tabs',
		'description' => __( 'Check to display navigation tabs under book', 'classic-addons' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Width', 'classic-addons' ),
		'param_name' => 'width',
		'description' => __( 'Provide width for book in pixels, eg 700', 'classic-addons' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Height for Desktop', 'classic-addons' ),
		'param_name' => 'height_desktop',
		'description' => __( 'Provide height for desktop, eg 350px ', 'classic-addons' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Height for Mobile', 'classic-addons' ),
		'param_name' => 'height_mobile',
		'description' => __( 'Provide height for mobile devices, eg 250px', 'classic-addons' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Mobile Screen Size', 'classic-addons' ),
		'param_name' => 'mobile_size',
		'value' => '450px',
		'description' => __( 'Provide width from where mobile size starts', 'classic-addons' ),
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra Classes', 'classic-addons' ),
		"param_name" 	=> 	"ex_classes",
		"description" 	=> 	__( 'Provide the extra classes name for custom styling.', 'classic-addons' ),
	),
);