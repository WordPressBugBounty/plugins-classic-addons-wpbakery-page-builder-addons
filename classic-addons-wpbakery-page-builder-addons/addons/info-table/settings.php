<?php
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Heading', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"heading",
		"description" 	=> 	__( 'Provide heading for info table', 'classic-addons-wpbakery-page-builder' ),
		"value" 		=> 	'Heading',
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Sub Heading', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"subheading",
		"value" 	    => 	"Provide subheading",
		"description" 	=> 	__( 'Provide sub heading for info table', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textarea_html",
		"heading" 		=> 	__( 'Footer Content', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"content",
		"description" 	=> 	__( 'Provide content to show in footer area.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra class name', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"ex_classes",
		"description" 	=> 	__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'General',
	),
	array(
		"type" 			=> 	"caw_margin_style",
		"heading" 		=> 	__( 'Margin', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"icon_margin",
		"group" 		=> 	'Icon',
	),
	array(
		"type" 			=> "caw_section",
		"section_title" => __( 'Header Area', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> "header_st_section",
		"group" 		=> 'Styles',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"header_bgclr",
		"description" 	=> 	__( 'Choose header background color.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"cawpb_border_style",
		"heading" 		=> 	__( 'Border Setting', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"header_border",
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"caw_padding_style",
		"heading" 		=> 	__( 'Padding', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"header_padding",
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> "caw_section",
		"section_title" => __( 'Body Area', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> "body_st_section",
		"group" 		=> 'Styles',
	),		
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"body_bgclr",
		"description" 	=> 	__( 'Choose body background color.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"cawpb_border_style",
		"heading" 		=> 	__( 'Border Setting', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"body_border",
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"caw_padding_style",
		"heading" 		=> 	__( 'Padding', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"body_padding",
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> "caw_section",
		"section_title" => __( 'Footer Area', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> "footer_st_section",
		"group" 		=> 'Styles',
	),
	array(
		"type" 			=> 	"colorpicker",
		"heading" 		=> 	__('Background Color', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"footer_bgclr",
		"description" 	=> 	__( 'Choose footer area background color.', 'classic-addons-wpbakery-page-builder' ),
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"cawpb_border_style",
		"heading" 		=> 	__( 'Border Setting', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"footer_border",
		"group" 		=> 	'Styles',
	),
	array(
		"type" 			=> 	"caw_padding_style",
		"heading" 		=> 	__( 'Padding', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"footer_padding",
		"group" 		=> 	'Styles',
	),
);