<?php
/**
 * Filterable Portfolio Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$cawpb_params = array(
    array(
        "type" => "exploded_textarea",
        "param_name" => "menu_items",
        "value" => "Basic,Premium,Pro,Extreme",
        "heading" => __("Menu Items", "classic-addons-wpbakery-page-builder"),
        "description" => __("Provide names here each per line", "classic-addons-wpbakery-page-builder"),
    ),
    array(
        "type" => "dropdown",
        "param_name" => "enable_all_btn",
        "heading" => __("All Button", "classic-addons-wpbakery-page-builder"),
        "description" => __("Enable/Disable all filtering button", "classic-addons-wpbakery-page-builder"),
        'value' => array(
            __('Enable', 'classic-addons-wpbakery-page-builder') => 'enable',
            __('Disable', 'classic-addons-wpbakery-page-builder') => 'disable',
        ),
    ),
    array(
        "type"          =>  "textfield",
        "heading"       =>  __( 'Extra class name', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "extra_class",
        "description"   =>  __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "btn_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose button text color.', 'classic-addons-wpbakery-page-builder' ),         
        "group"         =>  'Button Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Background Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "btn_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose button background color.', 'classic-addons-wpbakery-page-builder' ),           
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "btn_hoverclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover button text color.', 'classic-addons-wpbakery-page-builder' ),           
        "group"         =>  'Button Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Background Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "btn_hover_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover button background color', 'classic-addons-wpbakery-page-builder' ),         
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Active Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "btn_activeclr",
        "description"   =>  __( 'Choose button active color', 'classic-addons-wpbakery-page-builder' ),           
        "group"         =>  'Button Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "hover_imgbg_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover background image color.', 'classic-addons-wpbakery-page-builder' ),         
        "group"         =>  'Image Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Icons Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "hover_img_icons_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image icons color', 'classic-addons-wpbakery-page-builder' ),           
        "group"         =>  'Image Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Button Background Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "hover_img_btn_bgclr",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image button background color', 'classic-addons-wpbakery-page-builder' ),       
        "group"         =>  'Image Styles',
    ),
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Icons Hover Color', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "hover_img_icon_hover_color",
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "description"   =>  __( 'Choose hover image icon hover color', 'classic-addons-wpbakery-page-builder' ),          
        "group"         =>  'Image Styles',
    ),      
    array(
        "type"          =>  "colorpicker",
        "heading"       =>  __( 'Hover Image Button Hover BG Color', 'classic-addons-wpbakery-page-builder' ),
        "edit_field_class" => "vc_col-xs-6 vc_column",
        "param_name"    =>  "hover_img_btn_hover_bgclr",
        "description"   =>  __( 'Choose hover background color', 'classic-addons-wpbakery-page-builder' ),            
        "group"         =>  'Image Styles',
    ),
    array(
        'type' => 'css_editor',
        'heading' => __( 'CSS Box', 'classic-addons-wpbakery-page-builder' ),
        'param_name' => 'cssbox',
        'group' => __( 'Design Options', 'classic-addons-wpbakery-page-builder' ),
    ),
);