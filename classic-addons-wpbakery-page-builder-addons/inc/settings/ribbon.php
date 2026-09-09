<?php
/**
 * Global Ribbon Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_el_support = array(
	'basic',
);

foreach ($settings as $cawpb_typoData) {

	$cawpb_support = isset($cawpb_typoData['support']) ? $cawpb_typoData['support'] : $cawpb_el_support;
	$cawpb_group   = isset($cawpb_typoData['group']) ? $cawpb_typoData['group'] : 'General';	

	if (in_array("basic", $cawpb_support)) {

		$cawpb_ribbon_params[] = array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Ribbon Text', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_text",
			"description" 	=> __( 'Provide ribbon text.', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
		$cawpb_ribbon_params[] = array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_font_size",
			"description" 	=> 	__( 'Provide the ribbon font size with units e.g 18px', 'classic-addons-wpbakery-page-builder' ),
			"group"         => $cawpb_group,
		);
		$cawpb_ribbon_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_color",
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"description" 	=> 	__( 'Choose ribbon text color.', 'classic-addons-wpbakery-page-builder' ),
			"group"         => $cawpb_group,
		);
		$cawpb_ribbon_params[] = array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_background_color",
			"description" 	=> 	__( 'Choose ribbon background color.', 'classic-addons-wpbakery-page-builder' ),
			"edit_field_class" => "vc_col-xs-6 vc_column",
			"group" 		=> $cawpb_group,
		);
	}
}