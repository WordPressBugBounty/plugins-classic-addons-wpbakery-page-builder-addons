<?php
/**
 * Before / After Image Comparison Addon Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$params = array(
	array(
		'type'       => 'attach_image',
		'heading'    => __( 'Before Image', 'classic-addons' ),
		'param_name' => 'before_image',
		'group'      => 'General',
		'description' => __( 'Image shown on the original/left/top side.', 'classic-addons' ),
	),
	array(
		'type'       => 'attach_image',
		'heading'    => __( 'After Image', 'classic-addons' ),
		'param_name' => 'after_image',
		'group'      => 'General',
		'description' => __( 'Image revealed by the slider.', 'classic-addons' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Size', 'classic-addons' ),
		'param_name' => 'img_size',
		'group'      => 'General',
		'value'      => function_exists( 'cawpb_get_image_sizes' ) ? cawpb_get_image_sizes() : array( 'Default' => '' ),
		'description' => __( 'WordPress image size for both images. Both images should be the same dimensions.', 'classic-addons' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Orientation', 'classic-addons' ),
		'param_name' => 'orientation',
		'group'      => 'General',
		'value'      => array(
			__( 'Horizontal (slider moves left/right)', 'classic-addons' ) => 'horizontal',
			__( 'Vertical (slider moves up/down)', 'classic-addons' )      => 'vertical',
		),
		'std' => 'horizontal',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Interaction Mode', 'classic-addons' ),
		'param_name' => 'interaction',
		'group'      => 'General',
		'value'      => array(
			__( 'Drag handle', 'classic-addons' )   => 'drag',
			__( 'Move on hover', 'classic-addons' ) => 'hover',
		),
		'std' => 'drag',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Default Handle Position', 'classic-addons' ),
		'param_name' => 'start_position',
		'group'      => 'General',
		'value'      => '50',
		'description' => __( '0 - 100 (percent). Where the divider starts.', 'classic-addons' ),
	),

	// Labels
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Overlay Labels', 'classic-addons' ),
		'param_name' => 'show_labels',
		'group'      => 'Labels',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Before Label', 'classic-addons' ),
		'param_name' => 'before_label',
		'group'      => 'Labels',
		'value'      => __( 'Before', 'classic-addons' ),
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'After Label', 'classic-addons' ),
		'param_name' => 'after_label',
		'group'      => 'Labels',
		'value'      => __( 'After', 'classic-addons' ),
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Label Text Color', 'classic-addons' ),
		'param_name' => 'label_color',
		'group'      => 'Labels',
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Label Background', 'classic-addons' ),
		'param_name' => 'label_bg',
		'group'      => 'Labels',
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Style
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Divider Color', 'classic-addons' ),
		'param_name' => 'divider_color',
		'group'      => 'Design',
		'value'      => '#ffffff',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Divider Width', 'classic-addons' ),
		'param_name' => 'divider_width',
		'group'      => 'Design',
		'value'      => '3px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Handle Background', 'classic-addons' ),
		'param_name' => 'handle_bg',
		'group'      => 'Design',
		'value'      => '#ffffff',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Handle Arrow Color', 'classic-addons' ),
		'param_name' => 'handle_color',
		'group'      => 'Design',
		'value'      => '#333333',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Handle Size', 'classic-addons' ),
		'param_name' => 'handle_size',
		'group'      => 'Design',
		'value'      => '40px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
		'description' => __( 'Diameter of the circular handle.', 'classic-addons' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Max Width', 'classic-addons' ),
		'param_name' => 'max_width',
		'group'      => 'Design',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
		'description' => __( 'e.g. 800px. Leave empty for full width.', 'classic-addons' ),
	),
);
