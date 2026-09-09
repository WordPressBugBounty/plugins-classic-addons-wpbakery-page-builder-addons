<?php
/**
 * Global Typography Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_typo_support = array(
	'basic',
	'fontfamily',
);

foreach ($settings as $cawpb_typoData) {

	$cawpb_support = isset($cawpb_typoData['support']) ? $cawpb_typoData['support'] : $cawpb_typo_support;
	$cawpb_group   = isset($cawpb_typoData['group']) ? $cawpb_typoData['group'] : 'General';

	if (in_array("basic", $cawpb_support)) {

		$cawpb_typo_params[] = array(
					"type" 			=> "caw_section",
					"section_title" => $cawpb_typoData['title'],
					"param_name" 	=> $cawpb_typoData['key']."_typo_section",
					"group"         => $cawpb_group,
				);

		$cawpb_typo_params[] = array(
					"type" 			=> 	"textfield",
					"heading" 		=> 	__( 'Font Size', 'classic-addons-wpbakery-page-builder' ),
					"param_name" 	=> 	$cawpb_typoData['key']."_font_size",
					"description" 	=> 	__( 'Provide the heading font size with units e.g 18px', 'classic-addons-wpbakery-page-builder' ),
					"group"         => $cawpb_group,
				);

		$cawpb_typo_params[] = array(
					"type" 			=> 	"colorpicker",
					"heading" 		=> 	__( 'Color', 'classic-addons-wpbakery-page-builder' ),
					"param_name" 	=> 	$cawpb_typoData['key']."_color",
					"description" 	=> 	__( 'Choose heading text color.', 'classic-addons-wpbakery-page-builder' ),
					"group"         => $cawpb_group,
					'settings'      => array( 'default_colorpicker_color' => '#EBEBEB' ),
				);
	}

	if (in_array("fontfamily", $cawpb_support)) {

		$cawpb_typo_params[] = array(
					'type'         => 'checkbox',
					'heading'      => esc_html__( 'Use custom font family?', 'classic-addons-wpbakery-page-builder' ),
					'param_name'   => $cawpb_typoData['key'].'_themefont',
					'value'        => array( esc_html__( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
					'description' => esc_html__( 'Do you want to use custom fonts?.', 'classic-addons-wpbakery-page-builder' ),
					"group" 	  => 	'Typography',
				);

		$cawpb_typo_params[] = array(
				'type' => 'google_fonts',
				'param_name' => $cawpb_typoData['key'].'_font_family',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'classic-addons-wpbakery-page-builder' ),
						'font_style_description' => esc_html__( 'Select font styling.', 'classic-addons-wpbakery-page-builder' ),
					),
				),
				'dependency' => array(
					'element'            => $cawpb_typoData['key'].'_themefont',
					'value' => 'yes',
				),
				"group"   => 	'Typography',
			);
	}

	if (in_array("spacing", $cawpb_support)) {
		$cawpb_typo_params[] = array(
			"type" 			=> "caw_section",
			"section_title" => $cawpb_typoData['title'].' '.__( 'Spacing', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> $cawpb_typoData['key']."_spacing_section",
			"group" 		=> $cawpb_group,
		);
		$cawpb_typo_params[] = array(
			"type" 			=> 	"caw_padding_style",
			"heading" 		=> 	__( 'Padding', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_padding",
			"description" 	=> 	__( 'Provide padding along with units. Eg: 5px', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
		$cawpb_typo_params[] = array(
			"type" 			=> 	"caw_margin_style",
			"heading" 		=> 	__( 'Margin', 'classic-addons-wpbakery-page-builder' ),
			"param_name" 	=> 	$cawpb_typoData['key']."_margin",
			"description" 	=> 	__( 'Provide margin along with units. Eg: 5px', 'classic-addons-wpbakery-page-builder' ),
			"group" 		=> $cawpb_group,
		);
	}
}