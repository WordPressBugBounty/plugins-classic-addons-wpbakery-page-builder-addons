<?php

$params = array(
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Select Style', 'classic-addons' ),
		"param_name" 	=> "style",
		"description" 	=> __( 'Choose the style here', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Style 1' =>	'1',
			'Style 2' =>	'2',
			'Style 3' =>	'3',
			'Style 4' =>	'4',
			'Style 5' =>	'5',
			'Style 6' =>	'6',
		)
	),		
	array(
		"type" 			=> "textfield",
		"heading" 		=> __( 'Heading', 'classic-addons' ),
		"param_name" 	=> "heading",
		"description" 	=> __( 'Provide title for the banner.', 'classic-addons' ),
		"value"			=>	"Custom Heading",
		"group" 		=> 'General',
	),
	array(
		"type" 			=> 	"textarea_html",
		"heading" 		=> 	__( 'Content', 'classic-addons' ),
		'holder' 		=> 'div',
		"param_name" 	=> 	"content",
		"value"			=>	"<p>Provide some description here.</p>",
		"group" 		=> 	'General',
	),
	array(
        "type" 			=> 	"vc_link",
		"heading" 		=> 	__( 'Link URL', 'classic-addons' ),
		"param_name" 	=> 	"attach_link",
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
);