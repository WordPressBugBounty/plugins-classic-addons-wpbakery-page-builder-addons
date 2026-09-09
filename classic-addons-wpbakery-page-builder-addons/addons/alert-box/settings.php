<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// WPBakery 9.0 deprecated vc_map_add_css_animation() in favour of
// vc_config()->get_css_animation(). Prefer the new API when present and
// fall back to the legacy helper for older WPBakery versions.
if ( function_exists( 'vc_config' ) && method_exists( vc_config(), 'get_css_animation' ) ) {
    $cawpb_css_animation = vc_config()->get_css_animation();
} elseif ( function_exists( 'vc_map_add_css_animation' ) ) {
    $cawpb_css_animation = vc_map_add_css_animation();
} else {
    $cawpb_css_animation = array();
}

$cawpb_params = array(

    // Content Fields
    array(
        "type" => "textfield",
        "heading" => __('Title', 'classic-addons-wpbakery-page-builder'),
        "param_name" => "title",
        "description" => __('Add title for alert box', 'classic-addons-wpbakery-page-builder'),
        "value" => "Alert Box Title",
        "group" => 'General',
    ),
    array(
        "type" => "textarea_html",
        "heading" => __('Content', 'classic-addons-wpbakery-page-builder'),
        'holder' => 'div',
        "param_name" => "content",
        "value" => "<p>Provide some description here.</p>",
        "group" => 'General',
    ),

    // Style Selection
    array(
        "type" => "dropdown",
        "heading" => __('Select Style', 'classic-addons-wpbakery-page-builder'),
        "param_name" => "style",
        "description" => __('Choose a layout style', 'classic-addons-wpbakery-page-builder'),
        "group" => 'Design',
        "value" => array(
            'Top Icon' => 'top-icon',
            'Left Icon' => 'left-icon',
            'Right Icon' => 'right-icon',
            'Modern Card' => 'modern-card',
        )
    ),
    

    // Advanced Features
    array(
        "type" => "checkbox",
        "heading" => __('Dismissible?', 'classic-addons-wpbakery-page-builder'),
        "param_name" => "dismissible",
        "value" => array(__('Yes', 'classic-addons-wpbakery-page-builder') => 'yes'),
        "group" => 'Dismissal',
    ),

    // WPBakery built-in animation dropdown
    array_merge(
        $cawpb_css_animation,
        array( 'group' => __( 'General', 'classic-addons-wpbakery-page-builder' ) )
    ),

);