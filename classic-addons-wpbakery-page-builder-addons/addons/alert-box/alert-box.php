<?php
/**
 * Alert Box Addon Template
*/
if( ! defined('ABSPATH') ){ exit; }

class WPBakeryShortCode_CAW_Alert_Box extends WPBakeryShortCode {

    protected function content( $attrs, $content = null ) {
        $atts = shortcode_atts( array(
            'style'         => 'top-icon',
            'title'         => 'Alert Box Title',
            'bg_color'      => '',
            'text_color'    => '',
            'icon_library'  => 'fontawesome',
            'icon'          => '',
            'icon_image'    => '',
            'icon_size'     => '32px',
            'dismissible'   => '',
            'border_style'  => 'none',
            'border_color'  => '',
            'cssbox'        => '',
            'css_animation'        => '',
        ), $attrs );
        
        // Extract variables
        extract( $atts );

        $addon_base = $this->settings['base'];
        
        // Unique ID for the element
        $uid = 'caw-alert-' . uniqid();

        // Get the animation class from WPBakery
        $css_animation = !empty($atts['css_animation']) && $atts['css_animation'] !== 'none'
                         ? preg_replace('/[^a-zA-Z0-9_-]/', '', $atts['css_animation'])
                         : '';

        // This replicates what the old vc_get_css_animation() output looked like
        $anim_classes = $css_animation
          ? ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation
          : '';
        
        // Enqueue styles and scripts
        wp_enqueue_style('caw-alert-box', CAWPB_URL.'/addons/alert-box/alert-box.css');

        if ($dismissible === 'yes') {
            wp_enqueue_script('caw-alert-box', CAWPB_URL.'/addons/alert-box/alert-box.js', array('jquery'));
        }

        wp_enqueue_script( 'vc_waypoints' );
        wp_enqueue_style( 'vc_animate-css' );        

        $title_typo = cawpb_get_typo_styles('title', $attrs, array());
        $content_typo = cawpb_get_typo_styles('content', $attrs, array());

        $spacing_classes = array();
        $spacing_fields = [
            'title' => ['margin', 'padding'],
            'content' => ['margin', 'padding'],
        ];

        foreach ($spacing_fields as $prefix => $properties) {
            foreach ($properties as $property) {
                $field = "{$prefix}_{$property}";
                $spacing_classes[$prefix][] = isset($attrs[$field]) ? cawpb_add_inline_style($attrs[$field], $addon_base, $attrs, 'caw-alert-box'): '';
            }
            $spacing_classes[$prefix] = implode(' ', array_filter($spacing_classes[$prefix])); // Combine margin & padding classes
        }
        
        if (function_exists('vc_icon_element_fonts_enqueue')) {
            vc_icon_element_fonts_enqueue($icon_library);
        }
        
        // Prepare CSS classes with predesigned alert types
        $classes = array(
            'caw-alert-box',
            'caw-style-' . esc_attr($style),
            $dismissible === 'yes' ? 'caw-dismissible' : '',
            esc_attr( $anim_classes ),
            vc_shortcode_custom_css_class($cssbox, ' ') 
        );
        
        
        // Process content
        $content = wpb_js_remove_wpautop($content, true);
        
        ob_start(); ?>
        
        <div id="<?php echo esc_attr($uid); ?>" 
             class="<?php echo implode(' ', array_filter($classes)); ?>">
            
            <?php if ($dismissible === 'yes') : ?>
                <button type="button" class="caw-alert-close" data-dismiss-target="#<?php echo esc_attr($uid); ?>">&times;</button>
            <?php endif; ?>
            
            <?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>
            
            <div class="caw-alert-content">
                <?php if ($title) : ?>
                    <h3 class="caw-alert-title <?php echo esc_attr($spacing_classes['title']); ?>" style="<?php echo esc_attr($title_typo); ?>"><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
                
                <?php if ($content) : ?>
                    <div class="caw-alert-text <?php echo esc_attr($spacing_classes['content']); ?>" style="<?php echo esc_attr($content_typo); ?>"><?php echo $content; ?></div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
        return ob_get_clean();
    }
} 