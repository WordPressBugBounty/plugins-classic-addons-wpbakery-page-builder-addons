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
				"heading" 		=> __( 'Icon library', 'classic-addons' ),
				"param_name" 	=> $typoData['key']."_type",						
				"group" 		=> $group,
				"value" 		=> array(
					esc_html__( 'Font Awesome 5', 'classic-addons' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'classic-addons' ) => 'openiconic',
					esc_html__( 'Typicons', 'classic-addons' ) => 'typicons',
					esc_html__( 'Entypo', 'classic-addons' ) => 'entypo',
					esc_html__( 'Linecons', 'classic-addons' ) => 'linecons',
					esc_html__( 'Mono Social', 'classic-addons' ) => 'monosocial',
					esc_html__( 'Material', 'classic-addons' ) => 'material',
					esc_html__( 'Custom Image', 'classic-addons' ) => 'imageicon',
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select icon library.', 'classic-addons' ),
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_fontawesome",
				'value' => 'fas fa-adjust',
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "fontawesome"
				),
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 500,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_openiconic",
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "openiconic"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_typicons",
				'value' => 'typcn typcn-adjust-brightness',
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "typicons"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'typicons',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_entypo",
				'value' => 'entypo-icon entypo-icon-note',
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "entypo"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'entypo',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);

		$icon_params[] = array(
				'type'       => 'iconpicker',
				'heading'    => __( 'Icon', 'classic-addons' ),
				'param_name' => $typoData['key'].'_linecons',
				'value' => 'vc_li vc_li-heart',
				"group" 	 => $group,			
				'settings'   => array(
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => $typoData['key']."_type",
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_monosocial",
				'value' => 'vc-mono vc-mono-fivehundredpx',
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "monosocial"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
			);	

		$icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons" ),
				"param_name" 	=> $typoData['key']."_material",
				'value' => 'vc-mono vc-mono-fivehundredpx',
				"group" 		=> $group,
				"dependency"    => array(
					"element" => $typoData['key']."_type", 
					'value'   => "material"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'material',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons' ),
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