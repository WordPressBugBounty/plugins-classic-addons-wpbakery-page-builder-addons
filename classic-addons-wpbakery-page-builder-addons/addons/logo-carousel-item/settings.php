<?php
/**
 * Logo Carousel Addon Child Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
		"type" 			=> 	"attach_image",
		"heading" 		=> 	__( 'Select Image', 'classic-addons' ),
		"param_name" 	=> 	"image_id",
		"description" 	=> 	__( 'Upload image to display.', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Image size', 'classic-addons' ),
		'param_name' => 'img_size',
		'value' => 'full',
		'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). default: full', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Footer Text', 'classic-addons' ),
		"param_name" 	=> 	"img_bt_text",
		"description" 	=> 	__( 'It will display under the image', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		'type' => 'href',
		'heading' => esc_html__( 'Image link', 'classic-addons' ),
		'param_name' => 'link',
		'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'classic-addons'),
		"group" => 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Image Border Radius', 'classic-addons' ),
		"param_name" 	=> 	"img_border",
		"description" 	=> 	__( 'Enter image border radius e.g: 50px', 'classic-addons' ),
		"group" => 	'General',
	),
);