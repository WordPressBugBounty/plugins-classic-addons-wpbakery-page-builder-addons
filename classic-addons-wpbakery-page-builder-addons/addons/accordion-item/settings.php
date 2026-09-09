<?php
/**
 * Accordion Item Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cawpb_params = array(
	array(
		'type'        => 'textfield',
		'heading'     => __( 'Title', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'title',
		'group'       => 'General',
		'value'       => __( 'Accordion Item', 'classic-addons-wpbakery-page-builder' ),
		'admin_label' => true,
	),
	array(
		'type'        => 'textarea_html',
		'heading'     => __( 'Content', 'classic-addons-wpbakery-page-builder' ),
		'holder'      => 'div',
		'param_name'  => 'content',
		'group'       => 'General',
		'value'       => __( 'Item content goes here. You can add any HTML, shortcodes, images, etc.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Open by Default', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'is_open',
		'group'      => 'General',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => __( 'Extra CSS Class', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'extra_class',
		'group'       => 'General',
		'description' => __( 'Style this item differently — add a class name and refer to it in custom CSS.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'        => 'iconpicker',
		'heading'     => __( 'Override Expand Icon', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'expand_icon',
		'group'       => 'Icons',
		'settings'    => array(
			'emptyIcon'    => true,
			'iconsPerPage' => 200,
		),
		'description' => __( 'Optional. Overrides the accordion-level expand icon for this item only.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'        => 'iconpicker',
		'heading'     => __( 'Override Collapse Icon', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'collapse_icon',
		'group'       => 'Icons',
		'settings'    => array(
			'emptyIcon'    => true,
			'iconsPerPage' => 200,
		),
		'description' => __( 'Optional. Overrides the accordion-level collapse icon for this item only.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Title Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'title_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Title Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'title_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Content Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'content_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => __( 'Content Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name'       => 'content_bg_color',
		'group'            => 'Colors',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
);
