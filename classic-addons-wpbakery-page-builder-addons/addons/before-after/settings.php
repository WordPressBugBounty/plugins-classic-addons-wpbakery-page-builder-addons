<?php
/**
 * Before / After Image Comparison Addon Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cawpb_params = array(
	array(
		'type'       => 'attach_image',
		'heading'    => __( 'Before Image', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'before_image',
		'group'      => 'General',
		'description' => __( 'Image shown on the original/left/top side.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'attach_image',
		'heading'    => __( 'After Image', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'after_image',
		'group'      => 'General',
		'description' => __( 'Image revealed by the slider.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'img_size',
		'group'      => 'General',
		'value'      => function_exists( 'cawpb_get_image_sizes' ) ? cawpb_get_image_sizes() : array( 'Default' => '' ),
		'description' => __( 'WordPress image size for both images. Both images should be the same dimensions.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Orientation', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'orientation',
		'group'      => 'General',
		'value'      => array(
			__( 'Horizontal (slider moves left/right)', 'classic-addons-wpbakery-page-builder' ) => 'horizontal',
			__( 'Vertical (slider moves up/down)', 'classic-addons-wpbakery-page-builder' )      => 'vertical',
		),
		'std' => 'horizontal',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Interaction Mode', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'interaction',
		'group'      => 'General',
		'value'      => array(
			__( 'Drag handle', 'classic-addons-wpbakery-page-builder' )   => 'drag',
			__( 'Move on hover', 'classic-addons-wpbakery-page-builder' ) => 'hover',
		),
		'std' => 'drag',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Default Handle Position', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'start_position',
		'group'      => 'General',
		'value'      => '50',
		'description' => __( '0 - 100 (percent). Where the divider starts.', 'classic-addons-wpbakery-page-builder' ),
	),

	// Labels
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Overlay Labels', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_labels',
		'group'      => 'Labels',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Before Label', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'before_label',
		'group'      => 'Labels',
		'value'      => __( 'Before', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'After Label', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'after_label',
		'group'      => 'Labels',
		'value'      => __( 'After', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Label Text Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'label_color',
		'group'      => 'Labels',
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Label Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'label_bg',
		'group'      => 'Labels',
		'dependency' => array( 'element' => 'show_labels', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Style
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Divider Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'divider_color',
		'group'      => 'Design',
		'value'      => '#ffffff',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Divider Width', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'divider_width',
		'group'      => 'Design',
		'value'      => '3px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Handle Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'handle_bg',
		'group'      => 'Design',
		'value'      => '#ffffff',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Handle Arrow Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'handle_color',
		'group'      => 'Design',
		'value'      => '#333333',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Handle Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'handle_size',
		'group'      => 'Design',
		'value'      => '40px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
		'description' => __( 'Diameter of the circular handle.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Max Width', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'max_width',
		'group'      => 'Design',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
		'description' => __( 'e.g. 800px. Leave empty for full width.', 'classic-addons-wpbakery-page-builder' ),
	),
);
