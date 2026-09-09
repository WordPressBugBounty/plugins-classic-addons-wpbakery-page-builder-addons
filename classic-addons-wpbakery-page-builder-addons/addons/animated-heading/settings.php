<?php
/**
 * Animated Headings Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
    array(
        "type"          => "dropdown",
        "heading"       => __( 'Heading', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    => "heading_tag",
        "description"   => __( 'Choose heading tag', 'classic-addons-wpbakery-page-builder' ),
        "value"         => array(
            'Heading 1'     =>  'h1',
            'Heading 2'     =>  'h2',
            'Heading 3'     =>  'h3',
            'Heading 4'     =>  'h4',
            'Heading 5'     =>  'h5',
            'Heading 6'     =>  'h6',
        )
    ),
    array(
        "type" => "textfield",
        "param_name" => "before_heading",
        "heading" => __("Before Text", "classic-addons-wpbakery-page-builder"),
        "value" => "We are here to",
        "description" => __("Provide text to display before animated words", "classic-addons-wpbakery-page-builder"),
    ),
    array(
        "type" => "exploded_textarea",
        "param_name" => "spin_headings",
        "heading" => __("Animated Headings", "classic-addons-wpbakery-page-builder"),
        "value" => __("Help\nAssist\nGuide\nTake care of", "classic-addons-wpbakery-page-builder"),
        "description" => __("Provide headings for spin, each per line", "classic-addons-wpbakery-page-builder"),
    ),
    array(
        "type" => "textfield",
        "param_name" => "after_heading",
        "heading" => __("After Text", "classic-addons-wpbakery-page-builder"),
        "value" => "you...",
        "description" => __("Provide text to display after animated words", "classic-addons-wpbakery-page-builder"),
    ),
    array(
        "type"          => "dropdown",
        "heading"       => __( 'Animation Style', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    => "animation_style",
        "description"   => __( 'Choose animation style for spinning words', 'classic-addons-wpbakery-page-builder' ),
        "value"         => array(
            __( 'Slide', 'classic-addons-wpbakery-page-builder' )  =>  'slide',
            __( 'Type', 'classic-addons-wpbakery-page-builder' )  =>  'type',
            __( 'Fade', 'classic-addons-wpbakery-page-builder' )  =>  'fade',
        )
    ),
    array(
        "type" => "textfield",
        "param_name" => "spin_timer",
        "heading" => __("Spin Timer", "classic-addons-wpbakery-page-builder"),
        "description" => __("Set Spin timer in ms eg: 3000", "classic-addons-wpbakery-page-builder"),
    ),
     array(
        "type" => "textfield",
        "param_name" => "after_margin",
        "heading" => __("Heading Margin Bottom", "classic-addons-wpbakery-page-builder"),
        "description" => __("Provide margin bottom after text eg: 10px", "classic-addons-wpbakery-page-builder"),
    ),
    array(
        "type" => "textarea_html",
        "param_name" => "content",
        "value" => "An optional subheading goes here",
        "heading" => __("Description", "classic-addons-wpbakery-page-builder"),
        "description" => __("Provide contents to show under heading", "classic-addons-wpbakery-page-builder"),
    ),
    array(
		"type" 			=> 	"textfield",
		"heading" 		=> 	__( 'Extra CSS classes', 'classic-addons-wpbakery-page-builder' ),
		"param_name" 	=> 	"extra_classes",
		"description" 	=> 	__( 'Provide the extra classes for custom style.', 'classic-addons-wpbakery-page-builder' ),
	),
);