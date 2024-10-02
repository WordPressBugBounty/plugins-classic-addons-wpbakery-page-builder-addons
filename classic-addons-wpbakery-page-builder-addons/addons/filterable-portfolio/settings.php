<?php
/**
 * Filterable Portfolio Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
    array(
        "type" => "exploded_textarea",
        "param_name" => "menu_items",
        "value" => "Basic,Premium,Pro,Extreme",
        "heading" => __("Menu Items", "classic-addons"),
        "description" => __("Provide names here each per line", "classic-addons"),
    ),
    array(
        "type" => "dropdown",
        "param_name" => "enable_all_btn",
        "heading" => __("All Button", "classic-addons"),
        "description" => __("Enable/Disable all filtering button", "classic-addons"),
        'value' => array(
            __('Enable', 'classic-addons') => 'enable',
            __('Disable', 'classic-addons') => 'disable',
        ),
    ),
    array(
        "type"          =>  "textfield",
        "heading"       =>  __( 'Extra class name', 'classic-addons' ),
        "param_name"    =>  "extra_class",
        "description"   =>  __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'classic-addons' ),
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Color', 'classic-addons' ),
        "param_name"    =>  "btn_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose button text color.', 'classic-addons' ),         
        "group"         =>  'Button Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Background Color', 'classic-addons' ),
        "param_name"    =>  "btn_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose button background color.', 'classic-addons' ),           
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Color', 'classic-addons' ),
        "param_name"    =>  "btn_hoverclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover button text color.', 'classic-addons' ),           
        "group"         =>  'Button Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Background Color', 'classic-addons' ),
        "param_name"    =>  "btn_hover_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover button background color', 'classic-addons' ),         
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Active Color', 'classic-addons' ),
        "param_name"    =>  "btn_activeclr",
        "description"   =>  __( 'Choose button active color', 'classic-addons' ),           
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Color', 'classic-addons' ),
        "param_name"    =>  "hover_imgbg_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover background image color.', 'classic-addons' ),         
        "group"         =>  'Image Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Icons Color', 'classic-addons' ),
        "param_name"    =>  "hover_img_icons_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image icons color', 'classic-addons' ),           
        "group"         =>  'Image Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Button Background Color', 'classic-addons' ),
        "param_name"    =>  "hover_img_btn_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image button background color', 'classic-addons' ),       
        "group"         =>  'Image Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Icons Hover Color', 'classic-addons' ),
        "param_name"    =>  "hover_img_icon_hover_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image icon hover color', 'classic-addons' ),          
        "group"         =>  'Image Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Button Hover BG Color', 'classic-addons' ),
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "param_name"    =>  "hover_img_btn_hover_bgclr",
        "description"   =>  __( 'Choose hover background color', 'classic-addons' ),            
        "group"         =>  'Image Styles',
    ),
    array(
        'type' => 'css_editor',
        'heading' => __( 'CSS Box', 'classic-addons' ),
        'param_name' => 'cssbox',
        'group' => __( 'Design Options', 'classic-addons' ),
    ),
);