<?php
/**
 * Count Up Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Heading', 'classic-addons' ),
		"param_name" 	=> 	"heading",
		"description" 	=> 	__( 'Provide heading to display under counter.', 'classic-addons' ),
		"value" 		=> 	__( 'The Title', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Counter Value', 'classic-addons' ),
		"param_name" 	=> 	"value",
		"value" 		=> 	"2500",
		"description" 	=> 	__( 'Provide counter value', 'classic-addons' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Start From', 'classic-addons' ),
		"param_name" 	=> 	"start_from",
		"value" 		=> 	"0",
		"description" 	=> 	__( 'Provide counter start value, default: 0', 'classic-addons' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Speed', 'classic-addons' ),
		"param_name" 	=> 	"speed",
		"value" 		=> 	"2000",
		"description" 	=> 	__( 'Provide time to complete counter in ms, default: 2000', 'classic-addons' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Decimal Place', 'classic-addons' ),
		"value" 		=> 	"0",
		"param_name" 	=> 	"decimal",
		"description" 	=> 	__( 'Provide decimal places after digits, default: 0', 'classic-addons' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Heading Position', 'classic-addons' ),
		"param_name" 	=> 	"heading_position",
		"description" 	=> 	__( 'Select the heading position', 'classic-addons' ),
		'value' => array(
            __('Bottom', 'classic-addons')  => 'bottom',
            __('Top', 'classic-addons')     => 'top',
        ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra class name', 'landz' ),
		"param_name" 	=> 	"extra_class",
		"description" 	=> 	__( 'Provide extra class to add custom css.', 'classic-addons' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Color', 'classic-addons' ),
		"param_name" 	=> 	"divider_color",
		"description" 	=> 	__( 'Choose color for divider.', 'classic-addons' ),
		"group" 		=> 	'Divider line',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Width', 'classic-addons' ),
		"param_name" 	=> 	"divider_width",
		"description" 	=> 	__( 'Provide the width of divider with units eg 18px', 'classic-addons' ),
		"group" 		=> 	'Divider line',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Height', 'classic-addons' ),
		"param_name" 	=> 	"divider_height",
		"description" 	=> 	__( 'Provide the height of divider with units eg 2px', 'classic-addons' ),
		"group" 		=> 	'Divider line',
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Icon Position', 'classic-addons' ),
		"param_name" 	=> 	"icon_position",
		"description" 	=> 	__( 'Select the icon/image position.', 'classic-addons' ),
		'value' => array(
            __('Center', 'classic-addons') => 'center',
            __('Left', 'classic-addons') => 'left',
            __('Right', 'classic-addons') => 'right',
        ),
		"group" 		=> 	'Icon',
	),
);