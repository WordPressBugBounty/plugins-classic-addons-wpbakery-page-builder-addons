<?php
/**
 * Accordion Container Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$params = array(
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style', 'classic-addons' ),
		'param_name' => 'style',
		'group'      => 'General',
		'value'      => array(
			__( 'Modern', 'classic-addons' )     => 'modern',
			__( 'Classic', 'classic-addons' )    => 'classic',
			__( 'Bordered', 'classic-addons' )   => 'bordered',
			__( 'Boxed', 'classic-addons' )      => 'boxed',
			__( 'Minimal', 'classic-addons' )    => 'minimal',
			__( 'Separated', 'classic-addons' )  => 'separated',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Icon Position', 'classic-addons' ),
		'param_name' => 'icon_position',
		'group'      => 'General',
		'value'      => array(
			__( 'Right', 'classic-addons' ) => 'right',
			__( 'Left', 'classic-addons' )  => 'left',
			__( 'None', 'classic-addons' )  => 'none',
		),
	),
	array(
		'type'       => 'iconpicker',
		'heading'    => __( 'Expand Icon', 'classic-addons' ),
		'param_name' => 'expand_icon',
		'group'      => 'General',
		'value'      => 'fa fa-plus',
		'settings'   => array(
			'emptyIcon'    => false,
			'iconsPerPage' => 200,
		),
		'dependency' => array( 'element' => 'icon_position', 'value_not_equal_to' => 'none' ),
	),
	array(
		'type'       => 'iconpicker',
		'heading'    => __( 'Collapse Icon', 'classic-addons' ),
		'param_name' => 'collapse_icon',
		'group'      => 'General',
		'value'      => 'fa fa-minus',
		'settings'   => array(
			'emptyIcon'    => false,
			'iconsPerPage' => 200,
		),
		'dependency' => array( 'element' => 'icon_position', 'value_not_equal_to' => 'none' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Allow Multiple Open', 'classic-addons' ),
		'param_name' => 'allow_multiple',
		'group'      => 'Behavior',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Close Others On Open', 'classic-addons' ),
		'param_name' => 'close_others',
		'group'      => 'Behavior',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'dependency' => array( 'element' => 'allow_multiple', 'is_empty' => true ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Title Color', 'classic-addons' ),
		'param_name'       => 'title_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Title Background', 'classic-addons' ),
		'param_name'       => 'title_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Active Title Color', 'classic-addons' ),
		'param_name'       => 'title_active_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Active Title Background', 'classic-addons' ),
		'param_name'       => 'title_active_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Content Color', 'classic-addons' ),
		'param_name'       => 'content_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Content Background', 'classic-addons' ),
		'param_name'       => 'content_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Border Color', 'classic-addons' ),
		'param_name'       => 'border_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Icon Color', 'classic-addons' ),
		'param_name'       => 'icon_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Title Font Size', 'classic-addons' ),
		'param_name'       => 'title_font_size',
		'group'            => 'Typography',
		'description'      => __( 'e.g. 16px', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Content Font Size', 'classic-addons' ),
		'param_name'       => 'content_font_size',
		'group'            => 'Typography',
		'description'      => __( 'e.g. 14px', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Border Radius', 'classic-addons' ),
		'param_name'       => 'border_radius',
		'group'            => 'Typography',
		'description'      => __( 'e.g. 6px', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'textfield',
		'heading'          => __( 'Item Spacing', 'classic-addons' ),
		'param_name'       => 'spacing',
		'group'            => 'Typography',
		'description'      => __( 'Gap between items, e.g. 10px', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
);
