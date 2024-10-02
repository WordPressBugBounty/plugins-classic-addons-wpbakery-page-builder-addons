<?php

$params = array(
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Select Style', 'classic-addons' ),
		"param_name" 	=> "style",
		"description" 	=> __( ' ', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Icon at Top'	 =>	'caw_info_box_style_1',
			'Icon at Left' =>	'caw_info_box_style_2',
		)
	),		
	array(
		"type" 			=> "textfield",
		"heading" 		=> __( 'Heading', 'classic-addons' ),
		"param_name" 	=> "heading",
		"description" 	=> __( 'Add title for this info box.', 'classic-addons' ),
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
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Box Shadow', 'classic-addons' ),
		"param_name" 	=> "shadow",
		"group" 		=> 'General',
		"value"			=>	array(
			"No"	=>	"caw_info_box_shadow0",
			"Yes"	=>	"caw_info_box_shadow1",
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Box Hover Shadow', 'classic-addons' ),
		"param_name" 	=> "hovershadow",
		"group" 		=> 'General',
		"value"			=>	array(
			"No"	=>		"",
			"Yes"	=>		"caw_info_box_hvr_shadow",				)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Link To', 'classic-addons' ),
		"param_name" 	=> "link",
		"group" 		=> 'General',
		"value"			=>	array(
				"None"			=>		"none",
				"Complete Box"	=>		"box",
				"Read More"		=>		"readmore_btn",
			)
	),
	array(
        "type" 			=> 	"vc_link",
		"heading" 		=> 	__( 'Url Link', 'classic-addons' ),
		"param_name" 	=> 	"attach_link",
		"dependency"    => array(
			'element' => "link", 
			'value'   => array('box', 'readmore_btn')
		),
		"group" 		=> 	'General',
    ),
	array(
        "type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Read More Text', 'classic-addons' ),
		"param_name" 	=> 	"readmore_txt",
		"description" 	=> 	__( 'Provide read more button text.', 'classic-addons' ),
		"dependency"    => array( 'element' => "link", 'value' => 'readmore_btn' ),
		"group" 		=> 	'General',
    ),
    array(
        "type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Read More color', 'classic-addons' ),
		"param_name" 	=> 	"readmore_txtclr",
		"description" 	=> 	__( 'Set read more text color.', 'classic-addons' ),
		"dependency"    => array('element' => "link", 'value' => 'readmore_btn'),
		"group" 		=> 	'General',
    ),
);