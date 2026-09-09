<?php
/**
 * Count Up Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Heading', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"heading",
		"description" 	=> 	__( 'Provide heading to display under counter.', 'classic-addons-wpbakery-page-builder' ),
		"value" 		=> 	__( 'The Title', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Counter Value', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"value",
		"value" 		=> 	"2500",
		"description" 	=> 	__( 'Provide counter value', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Start From', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"start_from",
		"value" 		=> 	"0",
		"description" 	=> 	__( 'Provide counter start value, default: 0', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Speed', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"speed",
		"value" 		=> 	"2000",
		"description" 	=> 	__( 'Provide time to complete counter in ms, default: 2000', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Decimal Place', 'classic-addons-wpbakery-page-builder' ),
		"value" 		=> 	"0",
		"param_name" 	=> 	"decimal",
		"description" 	=> 	__( 'Provide decimal places after digits, default: 0', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Heading Position', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"heading_position",
		"description" 	=> 	__( 'Select the heading position', 'classic-addons-wpbakery-page-builder' ),
		'value' => array(
            __('Bottom', 'classic-addons-wpbakery-page-builder')  => 'bottom',
            __('Top', 'classic-addons-wpbakery-page-builder')     => 'top',
        ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra class name', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"extra_class",
		"description" 	=> 	__( 'Provide extra class to add custom css.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Color', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"divider_color",
		"description" 	=> 	__( 'Choose color for divider.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Divider line',
		'settings' 		=> array( 'default_colorpicker_color' => '#EBEBEB' ),
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Width', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"divider_width",
		"description" 	=> 	__( 'Provide the width of divider with units eg 18px', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Divider line',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Height', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"divider_height",
		"description" 	=> 	__( 'Provide the height of divider with units eg 2px', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Divider line',
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Icon Position', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"icon_position",
		"description" 	=> 	__( 'Select the icon/image position.', 'classic-addons-wpbakery-page-builder' ),
		'value' => array(
            __('Center', 'classic-addons-wpbakery-page-builder') => 'center',
            __('Left', 'classic-addons-wpbakery-page-builder') => 'left',
            __('Right', 'classic-addons-wpbakery-page-builder') => 'right',
        ),
		"group" 		=> 	'Icon',
	),
	array(
		"type"        => "textfield",
		"heading"     => __( 'Prefix', 'classic-addons-wpbakery-page-builder' ),
		"param_name"  => "prefix",
		"description" => __( 'Text shown before the number, e.g. $ or +.', 'classic-addons-wpbakery-page-builder' ),
		"group"       => 'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type"        => "textfield",
		"heading"     => __( 'Suffix', 'classic-addons-wpbakery-page-builder' ),
		"param_name"  => "suffix",
		"description" => __( 'Text shown after the number, e.g. + or K.', 'classic-addons-wpbakery-page-builder' ),
		"group"       => 'General',
		"edit_field_class" => "vc_col-xs-6 vc_column",
	),
	array(
		"type"        => "textfield",
		"heading"     => __( 'Thousands Separator', 'classic-addons-wpbakery-page-builder' ),
		"param_name"  => "separator",
		"description" => __( 'Character to group thousands (e.g. , or .). Leave blank for none.', 'classic-addons-wpbakery-page-builder' ),
		"group"       => 'General',
	),
	array(
		"type"       => "vc_link",
		"heading"    => __( 'Link', 'classic-addons-wpbakery-page-builder' ),
		"param_name" => "attach_link",
		"description" => __( 'Optional — wraps the counter in a link.', 'classic-addons-wpbakery-page-builder' ),
		"group"      => 'General',
	),
);