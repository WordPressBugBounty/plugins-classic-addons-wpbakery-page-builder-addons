<?php
/**
 * Global Icon Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_icon_support = array(
	'icons',
	'size',
	'boxsize',
	'color',
	'bgcolor',
	'imgsize',
	'border_radius',
	'border'
);

foreach ($settings as $cawpb_typoData) {

	$cawpb_support = isset($cawpb_typoData['support']) ? $cawpb_typoData['support'] : $cawpb_icon_support;
	$cawpb_group   = isset($cawpb_typoData['group']) ? $cawpb_typoData['group'] : 'General';

	if (in_array("icons", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Icon library', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> $cawpb_typoData['key']."_type",						
				"group" 		=> $cawpb_group,
				"value" 		=> array(
					esc_html__( 'Font Awesome 6', 'classic-addons-wpbakery-page-builder' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'classic-addons-wpbakery-page-builder' ) => 'openiconic',
					esc_html__( 'Typicons', 'classic-addons-wpbakery-page-builder' ) => 'typicons',
					esc_html__( 'Entypo', 'classic-addons-wpbakery-page-builder' ) => 'entypo',
					esc_html__( 'Linecons', 'classic-addons-wpbakery-page-builder' ) => 'linecons',
					esc_html__( 'Mono Social', 'classic-addons-wpbakery-page-builder' ) => 'monosocial',
					esc_html__( 'Material', 'classic-addons-wpbakery-page-builder' ) => 'material',
					esc_html__( 'Custom Image', 'classic-addons-wpbakery-page-builder' ) => 'imageicon',
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select icon library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_fontawesome",
				'value' => 'fas fa-adjust',
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "fontawesome"
				),
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 500,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_openiconic",
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "openiconic"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_typicons",
				'value' => 'typcn typcn-adjust-brightness',
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "typicons"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'typicons',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_entypo",
				'value' => 'entypo-icon entypo-icon-note',
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "entypo"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'entypo',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] = array(
				'type'       => 'iconpicker',
				'heading'    => __( 'Icon', 'classic-addons-wpbakery-page-builder' ),
				'param_name' => $cawpb_typoData['key'].'_linecons',
				'value' => 'vc_li vc_li-heart',
				"group" 	 => $cawpb_group,			
				'settings'   => array(
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_monosocial",
				'value' => 'vc-mono vc-mono-fivehundredpx',
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "monosocial"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);	

		$cawpb_icon_params[] =	array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( "Icon", "classic-addons-wpbakery-page-builder" ),
				"param_name" 	=> $cawpb_typoData['key']."_material",
				'value' => 'vc-mono vc-mono-fivehundredpx',
				"group" 		=> $cawpb_group,
				"dependency"    => array(
					"element" => $cawpb_typoData['key']."_type", 
					'value'   => "material"
				),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'material',
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'classic-addons-wpbakery-page-builder' ),
			);

		$cawpb_icon_params[] = array(
				"type" 			=> 	"attach_image",
				"heading" 		=> 	__( 'Upload Image Icon', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_imageicon",
				'dependency' => array( 
					'element' => $cawpb_typoData['key']."_type" , 
					'value'   => 'imageicon'
				),
				"group" => 	$cawpb_group,
			);
	}

	if (in_array("size", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Font Size', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_font_size",
				"description" 	=> 	__( 'Provide icon font size with unit e.g: 25px', 'classic-addons-wpbakery-page-builder' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$cawpb_group,
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'monosocial', 'material' )
				),
			);
	}

	if (in_array("boxsize", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Box Size', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_boxsize",
				"description" 	=> 	__( 'Provide icon box size with unit e.g: 25px', 'classic-addons-wpbakery-page-builder' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$cawpb_group,
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'monosocial', 'material' )
				),
			);
	}

	if (in_array("color", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Color', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key'] ."_color",
				"description" 	=> 	__( 'Choose font icon color.', 'classic-addons-wpbakery-page-builder' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$cawpb_group,
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'monosocial', 'material' )
				),
			);
	}

	if (in_array("bgcolor", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']. "_background_color",
				"description" 	=> 	__( 'Choose icon box background color.', 'classic-addons-wpbakery-page-builder' ),
				"edit_field_class" => "vc_col-xs-6 vc_column",
				"group" 		=> 	$cawpb_group,
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'monosocial', 'material' )
				),
			);
	}
	
	if (in_array("imgsize", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Image Size', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_imgsize",
				"description" 	=> 	__( 'Provide image size with unit e.g: 150px', 'classic-addons-wpbakery-page-builder' ),
				"group" 		=> 	$cawpb_group,
				'dependency' => array(
					'element' => $cawpb_typoData['key']."_type",
					'value'   => 'imageicon',
				),
			);
	}

	if (in_array("border_radius", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Border Radius', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_border_radius",
				"description" 	=> 	__( 'Choose icon border radius eg: 1px', 'classic-addons-wpbakery-page-builder' ),
				"group" 		=> 	$cawpb_group,
				
			);
	}

	if (in_array("border", $cawpb_support)) {

		$cawpb_icon_params[] = array(
				"type" 			=> 	"cawpb_border_style",
				"heading" 		=> 	__( 'Border Setting', 'classic-addons-wpbakery-page-builder' ),
				"param_name" 	=> 	$cawpb_typoData['key']."_border",
				"group" 		=> 	$cawpb_group,
			);
	}

}