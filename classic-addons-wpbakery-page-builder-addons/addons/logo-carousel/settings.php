<?php
/**
 * Logo Carousel Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
    array(
        "type" => "dropdown",
        "param_name" => "columns",
        "heading" => __("Slides To Show", "classic-addons"),
        "description" => __("Number of picture show in slider", "classic-addons"),
        'value' => array(
            __('1', 'classic-addons') => '1',
            __('2', 'classic-addons') => '2',
            __('3', 'classic-addons') => '3',
            __('4', 'classic-addons') => '4',
            __('5', 'classic-addons') => '5',
            __('6', 'classic-addons') => '6',
            __('7', 'classic-addons') => '7',
            __('8', 'classic-addons') => '8',
            __('9', 'classic-addons') => '9',
            __('10', 'classic-addons') => '10',
            __('11', 'classic-addons') => '11',
            __('12', 'classic-addons') => '12',
        ),
    ),
    array(
        "type" => "dropdown",
        "param_name" => "slides",
        "heading" => __("Slides to Scroll", "classic-addons"),
        "description" => __("Select the number of picture to scroll", "classic-addons"),
        'value' => array(
            __('1', 'classic-addons') => '1',
            __('2', 'classic-addons') => '2',
            __('3', 'classic-addons') => '3',
            __('4', 'classic-addons') => '4',
            __('5', 'classic-addons') => '5',
            __('6', 'classic-addons') => '6',
            __('7', 'classic-addons') => '7',
            __('8', 'classic-addons') => '8',
            __('9', 'classic-addons') => '9',
            __('10', 'classic-addons') => '10',
            __('11', 'classic-addons') => '11',
            __('12', 'classic-addons') => '12',

            
        ),
    ),
    array(
    	'type' => 'checkbox',
    	'param_name' => 'dots',
    	'heading' => __( 'Bottom Dots', 'classic-addons' ),
    	"description" => __("Enable/Disable Bottom Dots feature", "classic-addons"),
        'default'  		=> '0',
    ),
    array(
    	'type' => 'checkbox',
    	'param_name' => 'arrow_feature',
    	'heading' => __( 'Arrows', 'classic-addons' ),
    	"description" => __("Enable/Disable Arrow feature", "classic-addons"),
        'default'  		=> '0',
    ),
    array(
    	'type' => 'dropdown',
    	'param_name' => 'arrow_style',
    	'heading' => __( 'Arrow position', 'classic-addons' ),
    	"description" => __("Select the arrow position", "classic-addons"),
        'value' => array(
            __('Style 1', 'classic-addons') => '1',
            __('Style 2', 'classic-addons') => '2',
        ),
    ),
    array(
        "type" 		  => "checkbox",
        "param_name"  => "autoplay",
        "heading"     => __("AutoPlay", "classic-addons"),
        "description" => __("Enable/Disable Autoplay feature", "classic-addons"),
        'default'  	  => '0',
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'AutoPlay Speed', 'classic-addons' ),
    	"param_name" 	=> 	"autoplay_speed",
    	"description" 	=> 	__( 'Set auto play speed eg: 500', 'classic-addons' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'Speed', 'classic-addons' ),
    	"param_name" 	=> 	"speed",
    	"description" 	=> 	__( 'Set slider move speed e.g: 500.', 'classic-addons' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'cssEase', 'classic-addons' ),
    	"param_name" 	=> 	"cssease",
    	"description" 	=> 	__( 'Set cssEase name.', 'classic-addons' ),
    ),
    array(
    	"type" 			=> 	"textfield",
    	"heading" 		=> 	__( 'Extra class name', 'classic-addons' ),
    	"param_name" 	=> 	"ex_classes",
    	"description" 	=> 	__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'classic-addons' ),
    ),
    array(
        "type"       => "checkbox",
        "heading"    => __( 'Pause on Hover', 'classic-addons' ),
        "param_name" => "pauseonhover",
        "value"      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
    ),
    array(
        "type"       => "checkbox",
        "heading"    => __( 'RTL Direction', 'classic-addons' ),
        "param_name" => "rtl",
        "value"      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Center Mode', 'classic-addons' ),
        "param_name"  => "center_mode",
        "value"       => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Fade Transition', 'classic-addons' ),
        "param_name"  => "fade",
        "description" => __( 'Forces 1 slide per view.', 'classic-addons' ),
        "value"       => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
    ),
    array(
        "type"        => "checkbox",
        "heading"     => __( 'Grayscale Logos (color on hover)', 'classic-addons' ),
        "param_name"  => "grayscale",
        "value"       => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Large (≤1200px)', 'classic-addons' ),
        "param_name"  => "responsive_lg",
        "description" => __( 'Slides per row on large screens.', 'classic-addons' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Tablet (≤768px)', 'classic-addons' ),
        "param_name"  => "responsive_md",
        "description" => __( 'Slides per row on tablets.', 'classic-addons' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
    array(
        "type"        => "textfield",
        "heading"     => __( 'Slides on Mobile (≤480px)', 'classic-addons' ),
        "param_name"  => "responsive_sm",
        "description" => __( 'Slides per row on phones.', 'classic-addons' ),
        "edit_field_class" => "vc_col-xs-4 vc_column",
    ),
);