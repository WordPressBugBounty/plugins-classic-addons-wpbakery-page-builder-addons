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
        "type"          =>  "attach_image",
        "heading"       =>  __( 'Select Image', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "image_id",
        "description"   =>  __( 'Provide the image from gallery.', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
        "type"          =>  "href",
        "heading"       =>  __( 'Link', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "link",
        "description"   =>  __( 'Provide URL to link', 'classic-addons-wpbakery-page-builder' ),
    ),
    array(
        "type"          =>  "textfield",
        "heading"       =>  __( 'Category Names', 'classic-addons-wpbakery-page-builder' ),
        "param_name"    =>  "category",
        "description"   =>  __( 'Provide category name.', 'classic-addons-wpbakery-page-builder' ),
    ),
);