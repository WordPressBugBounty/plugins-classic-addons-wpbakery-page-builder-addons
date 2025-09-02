<?php
/**
 * Alert Box Addon Template
*/
if( ! defined('ABSPATH') ){ exit; }

class WPBakeryShortCode_CAW_Icon_Box_3d extends WPBakeryShortCode {

    protected function content( $attrs, $content = null ) {
        $atts = shortcode_atts( array(
            'box_bg_color'         => '',
            'box_border_radius'         => '',
            'box_shadow'         => '',
            'icon_library'  => 'fontawesome',
            'icon'          => '',
            'icon_image'    => '',
            'icon_size'     => '32px',
            'box_width'     => '',
            'box_height'     => '',
            'cssbox'        => '',
        ), $attrs );
        
        // Extract variables
        extract( $atts );

        $addon_base = $this->settings['base'];
        
        // Enqueue styles and scripts
        wp_enqueue_style('caw-icon-box', CAWPB_URL.'/addons/icon-box-3d/icon-box-3d.css');
        
        if (function_exists('vc_icon_element_fonts_enqueue')) {
            vc_icon_element_fonts_enqueue($icon_library);
        }
        
        // Prepare CSS classes with predesigned alert types
        $classes = array(
            'caw-icon-box-3d',
            vc_shortcode_custom_css_class($cssbox, ' ')
        );

        $inline_styles = array();

        if ($box_bg_color) {
            $inline_styles[] = "background-color:".esc_attr($box_bg_color);
        }

        if ($box_border_radius) {
            $inline_styles[] = "border-radius:".esc_attr($box_border_radius);
        }

        if ($box_shadow) {
            $inline_styles[] = "box-shadow:".esc_attr($box_shadow);
        }

        if ($box_width) {
            $inline_styles[] = "width:".esc_attr($box_width);
        }

        if ($box_height) {
            $inline_styles[] = "height:".esc_attr($box_height);
        }
        
        ob_start(); ?>
        <div class="<?php echo implode(' ', array_filter($classes)); ?>">
          <div class="caw-icon-box-3d-inner" style="width: <?php echo esc_attr( $box_width ) ?>; height: <?php echo esc_attr( $box_height ) ?>">
            
            <!-- Floor / base -->
            <div class="caw-outer-box"  <?php if (!empty($inline_styles)) echo 'style="' . implode('; ', $inline_styles) . '"'; ?>>
              <!-- Reflection -->
              <div class="caw-reflection">
                <?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>
              </div>
            </div>

            <!-- Main icon -->
            <div class="caw-main-icon">
              <?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>
            </div>
          </div>
        </div>
        <?php
        return ob_get_clean();
    }
}