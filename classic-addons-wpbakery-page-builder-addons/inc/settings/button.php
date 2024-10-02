<?php
/**
 * Global Button Settings
*/

if( ! defined('ABSPATH' ) ){ exit; }

$el_support = array(
	'basic',
	'hover_effect',	
	'icons',
	'border',
	'spacing',
);

foreach ($settings as $typoData) {

	$support = isset($typoData['support']) ? $typoData['support'] : $el_support;
	$group   = isset($typoData['group']) ? $typoData['group'] : 'General';	

	if (in_array("basic", $support)) {
		$btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Basic', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_basic_section",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_text",
			"description" 	=> __( 'Provide button text.', 'classic-addons' ),
			"group" 		=> $group,
			'value'	        => __('Click Me!', 'classic-addons')
		);
		$btn_params[] = array(
			"type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'URL', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_link",
			"description" 	=> 	__( 'Provide link to button.', 'classic-addons' ),
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Font Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose button text color.', 'classic-addons' ),
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_background_color",
			"description" 	=> 	__( 'Choose button background color.', 'classic-addons' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_font_size",
			"description" 	=> 	__( 'Provide the button font size with units e.g 18px', 'classic-addons' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Radius', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_border_radius",
			"description" 	=> 	__( 'Provide button border radius in units e.g 50px.', 'classic-addons' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $group,
		);		
	}

	if (in_array("hover_effect", $support)) {

		$btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Hover Effect', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_hover_effect_section",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Font Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_hvr_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose button text hover color.', 'classic-addons' ),
			"group" 		=> $group,
		);		
		$btn_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Background Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_hvr_background_color",
			"description" 	=> 	__( 'Choose button background hover color.', 'classic-addons' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $group,
		);
	}

	if (in_array("icons", $support)) {
		$btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Icon', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_icon_section",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Choose Icon', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_icontype",						
			"group" 		=> $group,
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"value" 		=> array(
				'Font Awesome'	=> 'fontawesome',
				'Line Icons'	=> 'linecons',
			)
		);
		$btn_params[] = array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Icon Alignment', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_iconpos",
			"description" 	=> 	__( 'Choose icon position.', 'classic-addons' ),
			"group" 		=> $group,
			"edit_field_class" => "vc_col-xs-6 vc_column",
				"value" => array(
					"None"	 => "none",
					"Left"	 => "left",
					"Right"	 => "right",
				)
		);

		$btn_params[] =	array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( "Font Awesome Icon", "classic-addons" ),
			"param_name" 	=> $typoData['key']."_fontawesome",
			"description" 	=> __( "Select the font icon", "classic-addons" ),
			"group" 		=> $group,
			"dependency"    => array(
				"element" => $typoData['key']."_icontype", 
				'value'   => "fontawesome"
			),
		);

		$btn_params[] = array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Line Icon', 'classic-addons' ),
			'param_name' => $typoData['key'].'_linecons',
			"group" 	 => $group,			
			'settings'   => array(
				'type'         => 'linecons',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => $typoData['key']."_icontype",
				'value'   => 'linecons',
			),
		);		
	}

	if (in_array("border", $support)) {
		$btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Border Effect', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_border_section",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"cawpb_border_style",
			"heading" 		=> 	__( 'Border', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_border",
			"description" 	=> 	__( 'Provide border width along with units. Eg: 2px', 'classic-addons' ),
			"group" 		=> $group,
		);
	}

	if (in_array("spacing", $support)) {
		$btn_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => __( 'Spacing', 'classic-addons' ),
			"param_name" 	=> $typoData['key']."_spacing_section",
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"caw_padding_style",
			"heading" 		=> 	__( 'Padding', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_padding",
			"description" 	=> 	__( 'Provide padding along with units. Eg: 5px', 'classic-addons' ),
			"group" 		=> $group,
		);
		$btn_params[] = array(
			"type" 			=> 	"caw_margin_style",
			"heading" 		=> 	__( 'Margin', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_margin",
			"description" 	=> 	__( 'Provide margin along with units. Eg: 5px', 'classic-addons' ),
			"group" 		=> $group,
		);
	}
}