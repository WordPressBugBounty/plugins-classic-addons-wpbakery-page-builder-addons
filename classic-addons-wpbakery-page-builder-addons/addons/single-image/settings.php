<?php
/**
 * Single Image Addon Settings
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
		"type" 			=> 	"textarea_html",
		"heading" 		=> 	__( 'Content', 'classic-addons' ),
		"param_name" 	=> 	"content",
		"description" 	=> 	__( 'Provide content to show on image.', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Footer Text', 'classic-addons' ),
		"param_name" 	=> 	"footer_text",
		"description" 	=> 	__( 'Provide text on footer area of the image', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Content Position', 'classic-addons'),
		"param_name" 	=> "content_position",
		"description" 	=> __( 'Select content position over image.', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Top Left'	=>	'caw-single-image-top-left-c',
			'Top Right'	=>	'caw-single-image-top-right-c',
			'Center'	=>	'caw-single-image-content-center',
			
		),
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Footer Text Position', 'classic-addons'),
		"param_name" 	=> "footer_txt_position",
		"description" 	=> __( 'Select bottom text position over image.', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Left'	   =>	'caw-textleft',
			'Right'	   =>	'caw-textright',
			'Center'   =>	'caw-textcenter',
			
		),
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Image Style', 'classic-addons'),
		"param_name" 	=> "image_effects",
		"description" 	=> __( 'Select image style.', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'None'         =>	'none',
			'Image Hover'         =>	'image_hover',
			'Image Black/White'	  =>	'img_bw_effect',
			'Image Popup'         =>	'popop',
			'Zoom on Hover'       =>	'zoom',
			'Open Custom Link'    =>	'img_custom_link',
			
		),
	),
	array(
		'type' => 'href',
		'heading' => esc_html__( 'Image link', 'classic-addons' ),
		'param_name' => 'link',
		'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'classic-addons'),
		'dependency' => array(
			'element' => 'image_effects',
			'value'   => array('img_custom_link'),
		),
		"group" => 	'General',
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Link Target', 'classic-addons' ),
		'param_name' => 'img_link_target',
		'value' 		=> array(
			'Current Window' =>	'_self',
			'New Window'	 =>	'_blank',
		),
		'dependency' => array(
			'element' => 'image_effects',
			'value'   => array('img_custom_link'),
		),
		"group" 		=> 	'General',
	),
    array(
		'type' 			=> 'checkbox',
		'param_name' 	=> 'image_ribbon',
		'heading' 		=> __( 'Ribbon on Image', 'classic-addons' ),
		"description" 	=> __("Ribbon will appear on the top right corner", "classic-addons"),
        'default'  		=> '0',	
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
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Padding In Hover', 'classic-addons' ),
		"param_name" 	=> 	"image_hover_pd",
		"description" 	=> 	__( 'Provide Padding of image on hover eg:15px', 'classic-addons' ),
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"dependency" => array(
			'element' => "image_effects", 
			'value' => array('image_hover')
		),
		"group" 		=> 	'Image Hover',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Color', 'classic-addons' ),
		"param_name" 	=> 	"img_hoverclr",
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"description" 	=> 	__( 'Choose image hover color.', 'classic-addons' ),
		"dependency" => array(
			'element' => "image_effects", 
			'value'   => array('image_hover')
		),
		"group" 		=> 	'Image Hover',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Content Color', 'classic-addons' ),
		"param_name" 	=> 	"caption_hoverclr",
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"description" 	=> 	__( 'Choose color for caption', 'classic-addons' ),
		"dependency" => array(
			'element' => "image_effects", 
			'value'   => array('image_hover')
		),
		"group" 		=> 	'Image Hover',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Footer Text Color', 'classic-addons' ),
		"param_name" 	=> 	"bottom_txthoverclr",
		"edit_field_class" => "vc_col-xs-6 vc_column",
		"description" 	=> 	__( 'Choose image bottom text hover color.', 'classic-addons' ),
		"dependency" => array(
			'element' => "image_effects", 
			'value' => array('image_hover')
		),
		"group" 		=> 	'Image Hover',
	),
);