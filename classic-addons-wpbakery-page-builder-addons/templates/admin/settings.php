<?php
/**
 * Global Classic Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$addons = cawpb_get_addon_info();

$get_settings  = get_option('caw_settings');
?>

<div class="caw-settings-wrapper wrap">  
    <h1><?php _e( 'Classic Addons Enable/Disable', 'caw' ); ?></h1>    
    <form class="caw-settings-form">
        <div class="caw-settings-wrapper">
            <input type="hidden" name="action" value="caw_settings_action">
            <?php 
            foreach ($addons as $id => $meta) {
                $name = isset($meta['name']) ? $meta['name'] : '';
                $checked = isset($get_settings[$id]) ? $get_settings[$id]: '';
            ?>  
                <div class="caw-settings-wrap">
                    <div class="caw-single-setting">
                        <label class="caw-switcher-checkbox">
                            <input 
                                type="checkbox"
                                name="caw_settings[<?php echo esc_attr($id); ?>]"                
                                id="<?php echo esc_attr($id); ?>"  
                                <?php checked($checked, 'on', true); ?>                      
                            >   
                            <span></span>
                            <?php echo esc_html($name); ?>
                        </label>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="caw-clearboth"></div>
        <div class="caw-submit-btn">
            <input type="submit" value="<?php _e( 'Save Changes', 'caw' ); ?>" class="button button-primary">
            <span class="spinner" style="display: none;"></span>
            <span class="spinner-msg"><?php echo _e('Settings Saved!','caw') ?></span>
        </div>
    </form>
</div>