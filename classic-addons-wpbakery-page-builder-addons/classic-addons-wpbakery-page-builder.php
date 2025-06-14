<?php
/**
 * Plugin Name: Classic Addons - WPBakery Page Builder Addons
 * Plugin URI: https://classicaddons.com/
 * Description: A collection of beautiful and elegant UI addons for WPBakery Page Builder
 * Version: 3.5
 * Author: Classic Addons
 * Author URI: https://webcodingplace.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: classic-addons
 * Domain Path: /languages
 */

/*

  Copyright (C) 2025  WebCodingPlace  support@webcodingplace.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
*/

define('CAWPB_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define('CAWPB_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
define('CAWPB_VERSION', '3.5' );

/* ======= Plugin File Includes =========== */
if( file_exists( CAWPB_PATH.'/inc/helpers.php' )) include_once CAWPB_PATH.'/inc/helpers.php';
if( file_exists( CAWPB_PATH.'/inc/arrays.php' )) include_once CAWPB_PATH.'/inc/arrays.php';
if( file_exists( CAWPB_PATH.'/classes/addons.class.php' )) include_once CAWPB_PATH.'/classes/addons.class.php';
if( file_exists( CAWPB_PATH.'/classes/hooks.class.php' )) include_once CAWPB_PATH.'/classes/hooks.class.php';

if (class_exists('CAWPB_Classic_Addons_WPBakery')) {
    $classic_addons = new CAWPB_Classic_Addons_WPBakery;
}

if (class_exists('CAWPB_Hooks_Classic_Addons_WPBakery')) {
	$classic_addons_hooks = new CAWPB_Hooks_Classic_Addons_WPBakery;
}


/**
 * Update the options on plugin activation.
*/
register_activation_hook( __FILE__, 'cawpb_plugin_activation' );

function cawpb_plugin_activation() {

    if (get_option('caw_settings_update_status') != 'active') {        
        $addons = cawpb_get_addon_info();
        $settings = array();
        foreach ($addons as $slug => $addon) {
            $settings[$slug] = 'on';
        }

        update_option('caw_settings', $settings);
        update_option('caw_settings_update_status', 'active');
    }
}