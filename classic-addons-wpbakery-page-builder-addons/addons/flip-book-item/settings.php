<?php
/**
 * FlipBook Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
	array(
		'type' => 'textarea_html',
		'heading' => __( 'Contents', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'content',
		'group' => 'Contents',
		'description' => __( 'Insert contents for this page', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'CSS Box', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'cssbox',
		'group' => __( 'Design Options', 'classic-addons-wpbakery-page-builder' ),
	),
);