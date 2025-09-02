<?php

$params = array(

    // Content Fields
    array(
        "type" => "textfield",
        "heading" => __('Title', 'classic-addons'),
        "param_name" => "title",
        "description" => __('Add title for alert box', 'classic-addons'),
        "value" => "Alert Box Title",
        "group" => 'General',
    ),
    array(
        "type" => "textarea_html",
        "heading" => __('Content', 'classic-addons'),
        'holder' => 'div',
        "param_name" => "content",
        "value" => "<p>Provide some description here.</p>",
        "group" => 'General',
    ),

    // Style Selection
    array(
        "type" => "dropdown",
        "heading" => __('Select Style', 'classic-addons'),
        "param_name" => "style",
        "description" => __('Choose a layout style', 'classic-addons'),
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
        "heading" => __('Dismissible?', 'classic-addons'),
        "param_name" => "dismissible",
        "value" => array(__('Yes', 'classic-addons') => 'yes'),
        "group" => 'Dismissal',
    ),

    // WPBakery built-in animation dropdown
    array_merge(
        vc_map_add_css_animation(),
        array( 'group' => __( 'General', 'classic-addons' ) )
    ),

);