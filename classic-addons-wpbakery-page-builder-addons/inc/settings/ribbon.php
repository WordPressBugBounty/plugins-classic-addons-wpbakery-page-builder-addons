<?php
/**
 * Global Ribbon Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$el_support = array(
	'basic',
);

foreach ($settings as $typoData) {

	$support = isset($typoData['support']) ? $typoData['support'] : $el_support;
	$group   = isset($typoData['group']) ? $typoData['group'] : 'General';	

	if (in_array("basic", $support)) {

		$ribbon_params[] = array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Ribbon Text', 'button' ),
			"param_name" 	=> $typoData['key']."_text",
			"description" 	=> __( 'Provide ribbon text.', 'button' ),
			"group" 		=> $group,
		);
		$ribbon_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_font_size",
			"description" 	=> 	__( 'Provide the ribbon font size with units e.g 18px', 'classic-addons' ),
			"group"         => $group,
		);
		$ribbon_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose ribbon text color.', 'classic-addons' ),
			"group"         => $group,
		);
		$ribbon_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'classic-addons' ),
			"param_name" 	=> 	$typoData['key']."_background_color",
			"description" 	=> 	__( 'Choose ribbon background color.', 'classic-addons' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $group,
		);
	}
}