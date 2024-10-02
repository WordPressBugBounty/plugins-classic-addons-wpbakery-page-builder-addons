<?php
/**
 * FlipBox Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Flip_Box extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'flip_style'     => 'left-right',
			'front_content'  => '',
			'front_bgclr'    => '',
			'back_bgclr'     => '',
			'front_border'   => '',
			'back_border'    => '',
			'front_image'    => '',
			'front_imgsize'  => 'full',
			'flip_width'     => '',
			'ex_classes'     => '',
			'cssbox'         => '',
		), $attrs ) );

		$addon_base = $this->settings['base'];

		$addon_id     = cawpb_get_unique_class('caw-flipbox');

		$attrs['addon_id'] = $addon_id;

		wp_enqueue_style($addon_base, CAWPB_URL.'/addons/flip-box/flipbox.css');

		$cssbox     = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs);
		$front_border_css = cawpb_add_inline_style($front_border, $this->settings['base'], $attrs, $addon_base);
		$back_border_css  = cawpb_add_inline_style($back_border, $this->settings['base'], $attrs, $addon_base);

		$front_istyle = '';
		if ( $front_bgclr ) {
			$front_istyle .= 'background-color: '. $front_bgclr . ';';
		}

		$back_istyle = '';
		if ( $back_bgclr ) {
			$back_istyle .= 'background-color: '. $back_bgclr . ';';
		}

		$wrapper_istyle = '';
		if ( $flip_width ) {
			$wrapper_istyle .= 'max-width: '. $flip_width . ';';
		}

		$img = wpb_getImageBySize( array(
			'attach_id' => $front_image,
			'thumb_size' => $front_imgsize,
			'class' => 'caw-single-image',
		));

		$fcontent_istyle = cawpb_get_typo_styles('fcontent', $attrs, array());
		$bcontent_istyle = cawpb_get_typo_styles('bcontent', $attrs, array());

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-flipbox-wrapper';
		$wrapper_classes[] = $ex_classes;
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $addon_id;

		// Main Wrapper Classes
		$rotate_classes = array();
		$rotate_classes[] = 'caw-flipbox-rotation';
		$rotate_classes[] = 'caw-flipbox-'.$flip_style;

		$front_rawhtml = rawurldecode( base64_decode( wp_strip_all_tags( $front_content ) ) );

		ob_start(); ?>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" style="<?php echo esc_attr($wrapper_istyle); ?>">
		    <div class="caw-flipbox-inner">
		        <div class="<?php echo cawpb_sanitize_html_classes($rotate_classes); ?>">
		            <div class="caw-flipbox-action easing_easeInOutCirc">
		                <div class="caw-flipbox-content">
		                    <div class="caw-flipbox-front <?php echo esc_attr($front_border_css); ?> caw-flipbox-style-1" style="<?php echo esc_attr($front_istyle); ?>">
		                        <div class="caw-flipbox-front-inner">
		                        	<?php if (isset($img['thumbnail']) && $img['thumbnail'] !=''){ ?>		                        		
			                        	<div class="caw-flipbox-front-img">
			                        		<?php echo wp_kses_post($img['thumbnail']); ?>
			                        	</div>
		                        	<?php } ?>
		                        	
		                        	<!-- Icon -->
									<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>

								<?php if ($front_rawhtml){ ?>
		                            <div class="caw-flipbox-front-content caw-textcenter" style="<?php echo esc_attr($fcontent_istyle); ?>">
		                            	<?php echo wp_kses_post( $front_rawhtml ); ?>
		                            </div>
								<?php } ?>
		                        </div>
		                    </div>
		                    <div class="caw-flipbox-back <?php echo esc_attr($back_border_css); ?>" style="<?php echo esc_attr($back_istyle); ?>">
		                    	<div class="caw-flipbox-back-inner">
		                    		<?php if ($content): ?>
			                    		<div class="caw-flipbox-back-content caw-textcenter" style="<?php echo esc_attr($bcontent_istyle); ?>">
			                    			<?php echo wp_kses_post($content); ?>
			                    		</div>
		                    		<?php endif ?>

		                    		<!-- Button Component -->
									<?php do_action( 'caw_render_button_component', $attrs, $addon_base, true ); ?>	
		                    		
		                    	</div>                        
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<?php
		return ob_get_clean();
	}
}