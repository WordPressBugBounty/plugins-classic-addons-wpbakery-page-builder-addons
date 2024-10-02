<?php
/**
 * Testimonial Slider Child Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
    array(
        "type" => "attach_image",
        "param_name" => "image_id",
        "heading" => __("Picture", "classic-addons"),
        "description" => __("Choose picture here", "classic-addons"),
    ),
    array(
        "type" => "textfield",
        "param_name" => "title",
        "heading" => __("Name", "classic-addons"),
        "description" => __("Provide name of client", "classic-addons"),
    ),
    array(
        "type" => "textfield",
        "param_name" => "company",
        "heading" => __("Rank", "classic-addons"),
        "description" => __("Provide rank or Company of client", "classic-addons"),
    ),
    array(
        "type" => "textfield",
        "param_name" => "url",
        "heading" => __("URL", "classic-addons"),
        "description" => __("Link Company name with url, leave blank to disable", "classic-addons"),
    ),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Testimonial Style', 'classic-addons' ),
		"param_name" 	=> 	"style",
		"description" 	=> 	__( 'Choose single testimonial style here', 'classic-addons' ),
		"group" 		=> 	'Display Settings',
		"value" 		=> array(
			"Style 1"		=> "1",
			"Style 2"		=> "2",
			"Style 3"		=> "3",
			"Style 4"		=> "4",
			"Style 5"		=> "5",
			"Style 6"		=> "6",
			"Style 7"		=> "7",
			"Style 8"		=> "8",
			"Style 9"		=> "9",
			"Style 10"		=> "10",
			"Style 11"		=> "11",
			"Style 12"		=> "12",
			"Style 13"		=> "13",
			"Style 14"		=> "14",
			"Style 15"		=> "15",
			"Style 16"		=> "16",
			"Style 17"		=> "17",
		)
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Rating', 'classic-addons' ),
		"param_name" 	=> 	"stars",
		"description" 	=> 	__( 'Choose rating', 'classic-addons' ),
		// "group" 		=> 	'Display Settings',
		"value" 		=> array(
			"5.0"		=> "5.0",
			"4.5"		=> "4.5",
			"4.0"		=> "4.0",
			"3.5"		=> "3.5",
			"3.0"		=> "3.0",
			"2.5"		=> "2.5",
			"2.0"		=> "2.0",
			"1.5"		=> "1.5",
			"1.0"		=> "1.0",
			"0.5"		=> "0.5",
		)
	),	    
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Column Space', 'classic-addons' ),
		"param_name" 	=> 	"cols",
		"description" 	=> 	__( 'How many space this testimonial should take in 12 columns Grid. It will work for Grid only', 'classic-addons' ),
		"group" 		=> 	'Display Settings',
		"value" 		=> array(
			"1 Column"		=> "1",
			"2 Columns"		=> "2",
			"3 Columns"		=> "3",
			"4 Columns"		=> "4",
			"5 Columns"		=> "5",
			"6 Columns"		=> "6",
			"7 Columns"		=> "7",
			"8 Columns"		=> "8",
			"9 Columns"		=> "9",
			"10 Columns"		=> "10",
			"11 Columns"		=> "11",
			"12 Columns"		=> "12",
		),
	),
    array(
        "type"          =>  "textarea_html",
        "heading"       =>  __( 'Content or Feedback', 'classic-addons' ),
        "param_name"    =>  "content",
        "description"   =>  __( 'Provide content to show in testimonial', 'classic-addons' ),
    ),		

    array(
		'type' => 'css_editor',
		'heading' => __( 'CSS Box', 'classic-addons' ),
		'param_name' => 'cssbox',
		'group' => __( 'Design Options', 'classic-addons' ),
	),
);