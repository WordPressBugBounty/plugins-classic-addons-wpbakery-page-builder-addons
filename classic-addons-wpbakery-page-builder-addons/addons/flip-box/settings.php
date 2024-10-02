<?php
/**
 * FlipBox Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(

	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Flip Style', 'classic-addons' ),
		"param_name" 	=> "flip_style",
		"description" 	=> __( 'Choose the flip box rotation style.', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Left To Right' =>	'left-right',
			'Top To Bottom' =>	'top-bottom',
			'Right To Left' =>	'right-left',
			'Bottom To Top' =>	'bottom-top',			
		)
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> __( 'Flip Box Size', 'classic-addons' ),
		"param_name" 	=> "flip_width",
		"description" 	=> __( 'Provide the flipbox max size. e.g: 300px', 'classic-addons' ),
		"group" 		=> 'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra Classes', 'classic-addons' ),
		"param_name" 	=> 	"ex_classes",
		"description" 	=> 	__( 'Provide the extra classes name for custom styling.', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textarea_raw_html",
		"heading" 		=> 	__( 'Content', 'classic-addons' ),
		"param_name" 	=> 	"front_content",
		"description" 	=> 	__( 'Provide body content with your own design. You can use the HTML Tags.', 'classic-addons' ),
		"group" 		=> 	'Front',
	),
	array(
        "type" 			=> 	"attach_image",
		"heading" 		=> 	__( 'Upload Image', 'classic-addons' ),
		"param_name" 	=> 	"front_image",
		"description" 	=> 	__( 'Select image for banner.', 'classic-addons' ),
		"group" 		=> 	'Front',
    ),
    array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Image size', 'classic-addons' ),
		'param_name' => 'front_imgsize',
		'value' => 'full',
		'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). default: full', 'classic-addons' ),
		"group" 		=> 	'Front',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __( 'Box Color', 'classic-addons' ),
		"param_name" 	=> "front_bgclr",
		"group" 		=> 'Front',
	),
	array(
		"type" 			=> 	"cawpb_border_style",
		"heading" 		=> 	__( 'Border', 'classic-addons' ),
		"description" 	=> 	__( 'Provide border style.', 'classic-addons' ),
		"param_name" 	=> 	"front_border",
		"group" 		=> 	'Front',
	),
	array(
        "type" 			=> 	"textarea_html",
		"heading" 		=> 	__( 'Content', 'classic-addons' ),
		"param_name" 	=> 	"content",
		"description" 	=> 	__( 'Provide the content to display on the back area.', 'classic-addons' ),
		"group" 		=> 	'Back',
		"value"			=> '<h3>Caption Text Here</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __( 'Box Color', 'classic-addons' ),
		"param_name" 	=> "back_bgclr",
		"description" 	=> __( 'Choose the flip back area color.', 'classic-addons' ),
		"group" 		=> 'Back',
	),
	array(
		"type" 			=> 	"cawpb_border_style",
		"heading" 		=> 	__( 'Border', 'classic-addons' ),
		"description" 	=> 	__( 'Provide border style.', 'classic-addons' ),
		"param_name" 	=> 	"back_border",
		"group" 		=> 	'Back',
	),
);