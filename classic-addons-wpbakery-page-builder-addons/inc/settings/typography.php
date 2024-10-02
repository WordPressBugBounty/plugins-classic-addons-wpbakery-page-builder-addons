<?php
/**
 * Global Typography Settings
*/
if( ! defined('ABSPATH' ) ){ exit; }

$typo_support = array(
	'basic',
	'fontfamily',
);

foreach ($settings as $typoData) {

	$support = isset($typoData['support']) ? $typoData['support'] : $typo_support;
	$group   = isset($typoData['group']) ? $typoData['group'] : 'General';

	if (in_array("basic", $support)) {

		$typo_params[] = array(
					"type" 			=> "caw_section",
					"section_title" => $typoData['title'],
					"param_name" 	=> $typoData['key']."_typo_section",
					"group"         => $group,
				);

		$typo_params[] = array(
					"type" 			=> 	"textfield",
					"heading" 		=> 	__( 'Font Size', 'classic-addons' ),
					"param_name" 	=> 	$typoData['key']."_font_size",
					"description" 	=> 	__( 'Provide the heading font size with units e.g 18px', 'classic-addons' ),
					"group"         => $group,
				);

		$typo_params[] = array(
					"type" 			=> 	"colorpicker",
					"heading" 		=> 	__( 'Color', 'classic-addons' ),
					"param_name" 	=> 	$typoData['key']."_color",
					"description" 	=> 	__( 'Choose heading text color.', 'classic-addons' ),
					"group"         => $group,
				);
	}

	if (in_array("fontfamily", $support)) {

		$typo_params[] = array(
					'type'         => 'checkbox',
					'heading'      => esc_html__( 'Use custom font family?', 'classic-addons' ),
					'param_name'   => $typoData['key'].'_themefont',
					'value'        => array( esc_html__( 'Yes', 'classic-addons' ) => 'yes' ),
					'description' => esc_html__( 'Do you want to use custom fonts?.', 'classic-addons' ),
					"group" 	  => 	'Typography',
				);

		$typo_params[] = array(
				'type' => 'google_fonts',
				'param_name' => $typoData['key'].'_font_family',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'classic-addons' ),
						'font_style_description' => esc_html__( 'Select font styling.', 'classic-addons' ),
					),
				),
				'dependency' => array(
					'element'            => $typoData['key'].'_themefont',
					'value' => 'yes',
				),
				"group"   => 	'Typography',
			);
	}
}