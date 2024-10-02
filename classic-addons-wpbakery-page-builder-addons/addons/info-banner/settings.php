<?php
/**
 * Info Banner Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
        "type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Style', 'classic-addons' ),
		"param_name" 	=> 	"style",
		"description" 	=> 	__( 'Choose styles for info banner', 'classic-addons' ),
		"group" 		=> 	'General',
		"value" 		=>  array(
			'Default'     =>  'default',
			'Image Left'  =>  'left',
			'Image Right' =>  'right',
		)
    ),
    array(
        "type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Zoom Effect', 'classic-addons' ),
		"param_name" 	=> 	"img_hover_effect",
		"description" 	=> 	__( 'Choose image zoom effect.', 'classic-addons' ),
		"group" 		=> 	'General',
		"value" 		=>  array(
			'None'     =>  '',
			'Effect 1' =>  'caw-imgzoom-effect1',			
			'Effect 2' =>  'caw-imgzoom-effect2',			
			'Effect 3' =>  'caw-imgzoom-effect3',			
			'Effect 4' =>  'caw-imgzoom-effect4',			
		)
    ),
    array(
        "type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Image Section Width', 'classic-addons' ),
		"param_name" 	=> 	"img_area_w",
		"description" 	=> 	__( 'Provide the image section width in percentage, e.g: 50', 'classic-addons' ),
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"dependency" => array(
						'element' => "style", 
						'value' => array('left', 'right')
					),
		"value"			=> "50",
		"suffix" 		=> '%',
		"group" 		=> 	'General',
    ),
    array(
        "type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Content Section width', 'classic-addons' ),
		"param_name" 	=> 	"content_width",
		"description" 	=> 	__( 'Provide the image section width in percentage, e.g: 50', 'classic-addons' ),
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"dependency" => array(
							'element' => "style", 
							'value' => array('left', 'right')
						),
		"value"			=>	"50",
		"suffix" 		=> 	'%',
		"group" 		=> 	'General',
    ),
    array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra Classes', 'classic-addons' ),
		"param_name" 	=> 	"ex_classes",
		"description" 	=> 	__( 'Provide the extra classes name for custom styling.', 'classic-addons' ),
		"group" 		=> 	'General',
	),
    array(
        "type" 			=> 	"attach_image",
		"heading" 		=> 	__( 'Upload Image', 'classic-addons' ),
		"param_name" 	=> 	"image_id",
		"description" 	=> 	__( 'Select image for banner.', 'classic-addons' ),
		"group" 		=> 	'Image',
    ),
    array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Image size', 'classic-addons' ),
		'param_name' => 'img_size',
		'value' => 'full',
		'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). default: full', 'classic-addons' ),
		"group" 		=> 	'Image',
	),
	array(
		"type" 			=> 	"caw_padding_style",
		"heading" 		=> 	__( 'Padding', 'classic-addons' ),
		"description" 	=> 	__( 'Provide image section inner padding.', 'classic-addons' ),
		"param_name" 	=> 	"img_padding",
		"group" 		=> 	'Image',
	),
    array(
        "type" 			=> 	"textarea_html",
		"heading" 		=> 	__( 'Description', 'classic-addons' ),
		"param_name" 	=> 	"content",
		"description" 	=> 	__( 'write detail about info banner', 'classic-addons' ),
		"group" 		=> 	'Content',
		"value"			=> '<h2>Title Goes Here</h2><p>and a little caption...</p>'
    ),
    array(
		"type" 			=> 	"caw_padding_style",
		"heading" 		=> 	__( 'Padding', 'classic-addons' ),
		"description" 	=> 	__( 'Provide content section inner padding.', 'classic-addons' ),
		"param_name" 	=> 	"content_padding",
		"group" 		=> 	'Content',
	),
    array(
		"type" 			=> "textfield",
		"heading" 		=> __( 'Ribbon Text', 'classic-addons' ),
		"param_name" 	=> "ribbon_text",
		"description" 	=> __( 'Provide the ribbon text for special offer.', 'classic-addons' ),
		"group" 		=> 'Ribbon',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __( 'Text Color', 'classic-addons' ),
		"param_name" 	=> "ribbon_clr",
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"description" 	=> __( 'Choose the ribbon text color.', 'classic-addons' ),
		"group" 		=> 'Ribbon',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __( 'Background color', 'classic-addons' ),
		"param_name" 	=> "ribbon_bg",
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"description" 	=> __( 'Choose the ribbon background color.', 'classic-addons' ),
		"group" 		=> 'Ribbon',
	),
);