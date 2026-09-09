<?php
/**
 * Tab Item Settings
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
		'value'       => __( 'Tab', 'classic-addons-wpbakery-page-builder' ),
		'admin_label' => true,
	),
	array(
		'type'        => 'textarea_html',
		'heading'     => __( 'Content', 'classic-addons-wpbakery-page-builder' ),
		'holder'      => 'div',
		'param_name'  => 'content',
		'group'       => 'General',
		'value'       => __( 'Tab content goes here. You can add any HTML, shortcodes, images, etc.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'iconpicker',
		'heading'    => __( 'Tab Icon', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'icon',
		'group'      => 'General',
		'settings'   => array(
			'emptyIcon'    => true,
			'iconsPerPage' => 500,
		),
		'description' => __( 'Shown only when "Show Icons" is enabled on the parent Tabs element.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Open by Default', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'is_default',
		'group'      => 'General',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'description'=> __( 'If multiple tabs have this enabled, the first one wins.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => __( 'Tab Anchor ID', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'tab_id',
		'group'       => 'General',
		'description' => __( 'Optional custom HTML ID so you can deep-link to this tab with #my-id.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => __( 'Extra CSS Class', 'classic-addons-wpbakery-page-builder' ),
		'param_name'  => 'extra_class',
		'group'       => 'General',
	),
);
