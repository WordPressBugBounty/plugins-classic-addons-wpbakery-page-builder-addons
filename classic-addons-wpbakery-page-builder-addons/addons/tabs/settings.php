<?php
/**
 * Tabs Container Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cawpb_params = array(
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'style',
		'group'      => 'General',
		'value'      => array(
			__( 'Underline', 'classic-addons-wpbakery-page-builder' )   => 'line',
			__( 'Boxed', 'classic-addons-wpbakery-page-builder' )       => 'boxed',
			__( 'Pills', 'classic-addons-wpbakery-page-builder' )       => 'pills',
			__( 'Buttons', 'classic-addons-wpbakery-page-builder' )     => 'buttons',
			__( 'Minimal', 'classic-addons-wpbakery-page-builder' )     => 'minimal',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Orientation', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'orientation',
		'group'      => 'General',
		'value'      => array(
			__( 'Horizontal', 'classic-addons-wpbakery-page-builder' ) => 'horizontal',
			__( 'Vertical', 'classic-addons-wpbakery-page-builder' )   => 'vertical',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Alignment', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'alignment',
		'group'      => 'General',
		'value'      => array(
			__( 'Left', 'classic-addons-wpbakery-page-builder' )       => 'left',
			__( 'Center', 'classic-addons-wpbakery-page-builder' )     => 'center',
			__( 'Right', 'classic-addons-wpbakery-page-builder' )      => 'right',
			__( 'Justify', 'classic-addons-wpbakery-page-builder' )    => 'justify',
		),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Icons', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_icons',
		'group'      => 'General',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Auto Rotate Tabs', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'auto_rotate',
		'group'      => 'Behavior',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Rotate Speed (ms)', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'rotate_speed',
		'group'      => 'Behavior',
		'value'      => '5000',
		'dependency' => array( 'element' => 'auto_rotate', 'value' => 'yes' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Tab Title Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'title_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Active Tab Title Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'title_active_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Active Tab Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'active_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Active Tab Accent Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'active_border',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Content Text Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'content_color',
		'group'      => 'Colors',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Tab Title Font Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'title_font_size',
		'group'            => 'Typography',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Content Font Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'content_font_size',
		'group'            => 'Typography',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Tab Padding', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'tab_padding',
		'group'            => 'Typography',
		'description'      => __( 'e.g. 12px 20px', 'classic-addons-wpbakery-page-builder' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Content Padding', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'content_padding',
		'group'            => 'Typography',
		'description'      => __( 'e.g. 20px', 'classic-addons-wpbakery-page-builder' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
);
