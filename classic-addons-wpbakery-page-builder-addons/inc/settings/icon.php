<?php
/**
 * Global Icon Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$icon_support = array(
	'icons',
	'size',
	'boxsize',
	'color',
	'bgcolor',
	'imgsize',
	'border_radius',
	'border'
);

foreach ($settings as $typoData) {

	$support = isset($typoData['support']) ? $typoData['support'] : $icon_support;
	$group   = isset($typoData['group']) ? $typoData['group'] : 'General';

	if (in_array("icons", $support)) {

		$icon_params[] = array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Choose Icon', 'classic-addons' ),
				"param_name" 	=> $typoData['key']."_type",						
				"group" 		=> $group,
				"value" 		=> array(
					// 'Choose Type'	=> '',
					'Font Awesome'	=> 'fontawesome',
					'Image Icon'	=> 'imageicon',
					'Line Icons'	=> 'linecons',
				)
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Font Awesome icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_fontawesome",
				"description" 	=> __( "Select the font icon", "classic-addons" ),
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "fontawesome"
				),
			);

		$icon_params[] = array(
				'type'       => 'iconpicker',
				'heading'    => __( 'Line Icon', 'classic-addons' ),
				'param_name' => $typoData['key'].'_linecons',
				"group" 	 => $group,			
				'settings'   => array(
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value'   => 'linecons',
				),
			);

		$icon_params[] = array(
				"type" 			=> 	"attach_image",
				"heading" 		=> 	__( 'Upload Image Icon', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_imageicon",
				'dependency' => array( 
					'element' => $typoData['key']."_type" , 
					'value'   => 'imageicon'
				),
				"group" => 	$group,
			);
	}

	if (in_array("size", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Font Size', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_font_size",
				"description" 	=> 	__( 'Provide icon font size with unit e.g: 25px', 'classic-addons' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$group,
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value' => array( 'fontawesome', 'linecons' )
				),
			);
	}

	if (in_array("boxsize", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Box Size', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_boxsize",
				"description" 	=> 	__( 'Provide icon box size with unit e.g: 25px', 'classic-addons' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$group,
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value' => array( 'fontawesome', 'linecons' )
				),
			);
	}

	if (in_array("color", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Color', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key'] ."_color",
				"description" 	=> 	__( 'Choose font icon color.', 'classic-addons' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$group,
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value' => array( 'fontawesome', 'linecons' )
				),
			);
	}

	if (in_array("bgcolor", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Background Color', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']. "_background_color",
				"description" 	=> 	__( 'Choose icon box background color.', 'classic-addons' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$group,
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value' => array( 'fontawesome', 'linecons' )
				),
			);
	}
	
	if (in_array("imgsize", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Image Size', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_imgsize",
				"description" 	=> 	__( 'Provide image size with unit e.g: 150px', 'classic-addons' ),
				"group" 		=> 	$group,
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value'   => 'imageicon',
				),
			);
	}

	if (in_array("border_radius", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Border Radius', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_border_radius",
				"description" 	=> 	__( 'Choose icon border radius eg: 1px', 'classic-addons' ),
				"group" 		=> 	$group,
				
			);
	}

	if (in_array("border", $support)) {

		$icon_params[] = array(
				"type" 			=> 	"cawpb_border_style",
				"heading" 		=> 	__( 'Border Setting', 'classic-addons' ),
				"param_name" 	=> 	$typoData['key']."_border",
				"group" 		=> 	$group,
			);
	}

}