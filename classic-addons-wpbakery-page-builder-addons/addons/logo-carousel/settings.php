<?php
/**
 * Logo Carousel Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
    array(
        "type" => "dropdown",
        "param_name" => "columns",
        "heading" => __("Slides To Show", "classic-addons-wpbakery-page-builder"),
        "description" => __("Number of picture show in slider", "classic-addons-wpbakery-page-builder"),
        'value' => array(
            __('1', 'classic-addons-wpbakery-page-builder') => '1',
            __('2', 'classic-addons-wpbakery-page-builder') => '2',
            __('3', 'classic-addons-wpbakery-page-builder') => '3',
            __('4', 'classic-addons-wpbakery-page-builder') => '4',
            __('5', 'classic-addons-wpbakery-page-builder') => '5',
            __('6', 'classic-addons-wpbakery-page-builder') => '6',
            __('7', 'classic-addons-wpbakery-page-builder') => '7',
            __('8', 'classic-addons-wpbakery-page-builder') => '8',
            __('9', 'classic-addons-wpbakery-page-builder') => '9',
            __('10', 'classic-addons-wpbakery-page-builder') => '10',
            __('11', 'classic-addons-wpbakery-page-builder') => '11',
            __('12', 'classic-addons-wpbakery-page-builder') => '12',
        ),
    ),
    array(
        "type" => "dropdown",
        "param_name" => "slides",
        "heading" => __("Slides to Scroll", "classic-addons-wpbakery-page-builder"),
        "description" => __("Select the number of picture to scroll", "classic-addons-wpbakery-page-builder"),
        'value' => array(
            __('1', 'classic-addons-wpbakery-page-builder') => '1',
            __('2', 'classic-addons-wpbakery-page-builder') => '2',
            __('3', 'classic-addons-wpbakery-page-builder') => '3',
            __('4', 'classic-addons-wpbakery-page-builder') => '4',
            __('5', 'classic-addons-wpbakery-page-builder') => '5',
            __('6', 'classic-addons-wpbakery-page-builder') => '6',
            __('7', 'classic-addons-wpbakery-page-builder') => '7',
            __('8', 'classic-addons-wpbakery-page-builder') => '8',
            __('9', 'classic-addons-wpbakery-page-builder') => '9',
            __('10', 'classic-addons-wpbakery-page-builder') => '10',
            __('11', 'classic-addons-wpbakery-page-builder') => '11',
            __('12', 'classic-addons-wpbakery-page-builder') => '12',

            
        ),
    ),
    array(
    	'type' => 'checkbox',
    	'param_name' => 'dots',
    	'heading' => __( 'Bottom Dots', 'classic-addons-wpbakery-page-builder' ),
    	"description" => __("Enable/Disable Bottom Dots feature", "classic-addons-wpbakery-page-builder"),
        'default'  		=> '0',
    ),
    array(
    	'type' => 'checkbox',
    	'param_name' => 'arrow_feature',
    	'heading' => __( 'Arrows', 'classic-addons-wpbakery-page-builder' ),
    	"description" => __("Enable/Disable Arrow feature", "classic-addons-wpbakery-page-builder"),
        'default'  		=> '0',
    ),
    array(
    	'type' => 'dropdown',
    	'param_name' => 'arrow_style',
    	'heading' => __( 'Arrow position', 'classic-addons-wpbakery-page-builder' ),
    	"description" => __("Select the arrow position", "classic-addons-wpbakery-page-builder"),
        'value' => array(
            __('Style 1', 'classic-addons-wpbakery-page-builder') => '1',
            __('Style 2', 'classic-addons-wpbakery-page-builder') => '2',
        ),
    ),
    array(
        "type" 		  => "checkbox",
        "param_name"  => "autoplay",
        "heading"     => __("AutoPlay", "classic-addons-wpbakery-page-builder"),
        "description" => __("Enable/Disable Autoplay feature", "classic-addons-wpbakery-page-builder"),
        'default'  	  => '0',
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'AutoPlay Speed', 'classic-addons-wpbakery-page-builder' ),
    	"param_name" 	=> 	"autoplay_speed",
    	"description" 	=> 	__( 'Set auto play speed eg: 500', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'Speed', 'classic-addons-wpbakery-page-builder' ),
    	"param_name" 	=> 	"speed",
    	"description" 	=> 	__( 'Set slider move speed e.g: 500.', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'cssEase', 'classic-addons-wpbakery-page-builder' ),
    	"param_name" 	=> 	"cssease",
    	"description" 	=> 	__( 'Set cssEase name.', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'Extra class name', 'classic-addons-wpbakery-page-builder' ),
    	"param_name" 	=> 	"ex_classes",
    	"description" 	=> 	__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
        "type"       => "checkbox",
        "heading"    => __( 'Pause on Hover', 'classic-addons-wpbakery-page-builder' ),
        "param_name" => "pauseonhover",
        "value"      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
    ),
    array(
        "type"       => "checkbox",
        "heading"    => __( 'RTL Direction', 'classic-addons-wpbakery-page-builder' ),
        "param_name" => "rtl",
        "value"      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Center Mode', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "center_mode",
        "value"       => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Fade Transition', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "fade",
        "description" => __( 'Forces 1 slide per view.', 'classic-addons-wpbakery-page-builder' ),
        "value"       => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Grayscale Logos (color on hover)', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "grayscale",
        "value"       => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Large (≤1200px)', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "responsive_lg",
        "description" => __( 'Slides per row on large screens.', 'classic-addons-wpbakery-page-builder' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Tablet (≤768px)', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "responsive_md",
        "description" => __( 'Slides per row on tablets.', 'classic-addons-wpbakery-page-builder' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Mobile (≤480px)', 'classic-addons-wpbakery-page-builder' ),
        "param_name"  => "responsive_sm",
        "description" => __( 'Slides per row on phones.', 'classic-addons-wpbakery-page-builder' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
);