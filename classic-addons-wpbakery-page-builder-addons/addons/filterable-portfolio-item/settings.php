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
        "type"          =>  "attach_image",
        "heading"       =>  __( 'Select Image', 'classic-addons' ),
        "param_name"    =>  "image_id",
        "description"   =>  __( 'Provide the image from gallery.', 'classic-addons' ),
    ),
    array(
        "type"          =>  "href",
        "heading"       =>  __( 'Link', 'classic-addons' ),
        "param_name"    =>  "link",
        "description"   =>  __( 'Provide URL to link', 'classic-addons' ),
    ),
    array(
        "type"          =>  "textfield",
        "heading"       =>  __( 'Category Names', 'classic-addons' ),
        "param_name"    =>  "category",
        "description"   =>  __( 'Provide category name.', 'classic-addons' ),
    ),
);