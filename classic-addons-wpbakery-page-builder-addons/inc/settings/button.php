<?php
/**
 * Global Button Settings
*/

if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_el_support = array(
	'basic',
	'hover_effect',	
	'icons',
	'border',
	'spacing',
);

foreach ($settings as $cawpb_typoData) {

	$cawpb_support = isset($cawpb_typoData['support']) ? $cawpb_typoData['support'] : $cawpb_el_support;
	$cawpb_group   = isset($cawpb_typoData['group']) ? $cawpb_typoData['group'] : 'General';	

	if (in_array("basic", $cawpb_support)) {
		$cawpb_btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Basic', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_basic_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_text",
			"description" 	=> __( 'Provide button text.', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
			'value'	        => __('Click Me!', 'classic-addons-wpbakery-page-builder')
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'URL', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_link",
			"description" 	=> 	__( 'Provide link to button.', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Font Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose button text color.', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
			'settings' 		=> array( 'default_colorpicker_color' => '#FFFFFF' ),
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_background_color",
			"description" 	=> 	__( 'Choose button background color.', 'classic-addons-wpbakery-page-builder' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			'settings' 		=> array( 'default_colorpicker_color' => '#EBEBEB' ),
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_font_size",
			"description" 	=> 	__( 'Provide the button font size with units e.g 18px', 'classic-addons-wpbakery-page-builder' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Radius', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_border_radius",
			"description" 	=> 	__( 'Provide button border radius in units e.g 50px.', 'classic-addons-wpbakery-page-builder' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $cawpb_group,
		);		
	}

	if (in_array("hover_effect", $cawpb_support)) {

		$cawpb_btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Hover Effect', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_hover_effect_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Font Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_hvr_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose button text hover color.', 'classic-addons-wpbakery-page-builder' ),
			'settings' 		=> array( 'default_colorpicker_color' => '#EBEBEB' ),
			"group" 		=> $cawpb_group,
		);		
		$cawpb_btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Background Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_hvr_background_color",
			"description" 	=> 	__( 'Choose button background hover color.', 'classic-addons-wpbakery-page-builder' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			'settings' 		=> array( 'default_colorpicker_color' => '#FFFFFF' ),
			"group" 		=> $cawpb_group,
		);
	}

	if (in_array("icons", $cawpb_support)) {
		$cawpb_btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Icon', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_icon_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Choose Icon', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_icontype",						
			"group" 		=> $cawpb_group,
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"value" 		=> array(
				esc_html__( 'Font Awesome 6', 'classic-addons-wpbakery-page-builder' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'classic-addons-wpbakery-page-builder' ) => 'openiconic',
				esc_html__( 'Typicons', 'classic-addons-wpbakery-page-builder' ) => 'typicons',
				esc_html__( 'Entypo', 'classic-addons-wpbakery-page-builder' ) => 'entypo',
				esc_html__( 'Linecons', 'classic-addons-wpbakery-page-builder' ) => 'linecons',
				esc_html__( 'Mono Social', 'classic-addons-wpbakery-page-builder' ) => 'monosocial',
				esc_html__( 'Material', 'classic-addons-wpbakery-page-builder' ) => 'material',
			)
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Icon Alignment', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_iconpos",
			"description" 	=> 	__( 'Choose icon position.', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
			"edit_field_class" => "vc_col-xs-6 vc_column",
				"value" => array(
					"None"	 => "none",
					"Left"	 => "left",
					"Right"	 => "right",
				)
		);

		$cawpb_btn_params[] =	array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( "Font Awesome Icon", "classic-addons-wpbakery-page-builder" ),
			"param_name" 	=> $cawpb_typoData['key']."_fontawesome",
			"description" 	=> __( "Select the font icon", "classic-addons-wpbakery-page-builder" ),
			"group" 		=> $cawpb_group,
			"dependency"    => array(
				"element" => $cawpb_typoData['key']."_icontype", 
				'value'   => "fontawesome"
			),
		);

		$cawpb_btn_params[] = array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Line Icon', 'classic-addons-wpbakery-page-builder' ),
			'param_name' => $cawpb_typoData['key'].'_linecons',
			"group" 	 => $cawpb_group,			
			'settings'   => array(
				'type'         => 'linecons',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => $cawpb_typoData['key']."_icontype",
				'value'   => 'linecons',
			),
		);		
	}

	if (in_array("border", $cawpb_support)) {
		$cawpb_btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Border Effect', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_border_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"cawpb_border_style",
			"heading" 		=> 	__( 'Border', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_border",
			"description" 	=> 	__( 'Provide border width along with units. Eg: 2px', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
	}

	if (in_array("spacing", $cawpb_support)) {
		$cawpb_btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Spacing', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_spacing_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"caw_padding_style",
			"heading" 		=> 	__( 'Padding', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_padding",
			"description" 	=> 	__( 'Provide padding along with units. Eg: 5px', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
		$cawpb_btn_params[] = array(
			"type" 			=> 	"caw_margin_style",
			"heading" 		=> 	__( 'Margin', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_margin",
			"description" 	=> 	__( 'Provide margin along with units. Eg: 5px', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
	}
}