<?php
/**
 * Info Banner Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Info_Banner extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'style'		            => 'default',
			'image_id'				=> '',
			'ribbon_text'			=> '',
			'ribbon_clr'			=> '',
			'ribbon_bg'				=> '',
			'content_width'			=> '50',
			'img_area_w'			=> '50',
			'img_padding'			=> '',
			'content_padding'		=> '',
			'ex_classes'			=> '',
			'img_size'              => 'full',
			'img_hover_effect'      => '',
			'cssbox'			    => '',
		), $attrs ) );

		$addon_base   = $this->settings['base'];

		$addon_handle = str_replace("_", "-", $this->settings['base']);
		$addon_id = cawpb_get_unique_class('caw-infobanner');


		$attrs['addon_id'] = $addon_id;

		wp_enqueue_style( $addon_base, CAWPB_URL.'/addons/info-banner/info-banner.css');
		wp_enqueue_style( 'caw-img-effect', CAWPB_URL. '/addons/info-banner/image-hover-effect.css');

		$cssbox     = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, $addon_base);
		$img_padding_css = cawpb_add_inline_style($img_padding, $this->settings['base'], $attrs, $addon_base);
		$content_pd_css = cawpb_add_inline_style($content_padding, $this->settings['base'], $attrs, $addon_base);

		$img = cawpb_get_image_by_size( array(
			'attach_id'  => $image_id,
			'thumb_size' => $img_size,
			'class'      => 'caw-single-image',
		));
		
		$content_istyle = '';
		if ( $content_width && $style != 'default') {
			$content_istyle .= 'width:' . esc_attr( $content_width ) . '%;';
		}

		$img_istyle = '';
		if ( $img_area_w && $style != 'default') {
			$img_istyle .= 'width:' . esc_attr( $img_area_w ) . '%;';
		}
		if ( $style != 'default' ) {
			$img_istyle .= 'float:' . esc_attr( $style ) . ';';
		}

		$ribbon_istyle = '';
		if ( $ribbon_clr ) {
			$ribbon_istyle .= 'color:' . esc_attr( $ribbon_clr ) . ';';
		}
		if ( $ribbon_bg ) {
			$ribbon_istyle .= 'background-color:' . esc_attr( $ribbon_bg ) . ';';
		}

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $ex_classes;
		$wrapper_classes[] = $addon_id;
		$wrapper_classes[] = 'wpb_content_element';
		$wrapper_classes[] = 'caw-infobanner-wrapper';			
		
		if ($style == 'default') {
			$wrapper_classes[] = 'caw-infobanner-default-style';
		}

		ob_start(); ?>
		<?php if ($style == 'left' || $style == 'right') { ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-infobanner-ribbon">
					<span style="<?php echo esc_attr($ribbon_istyle); ?>">
						<?php echo esc_attr( $ribbon_text ); ?>
					</span>
				</div>
				<div class="caw-infobanner-img-section <?php echo esc_attr($img_hover_effect) ?> <?php echo esc_attr($img_padding_css); ?>" style="<?php echo esc_attr($img_istyle); ?>">
					<?php echo wp_kses_post($img['thumbnail']); ?>
				</div>
				<div class="caw-infobanner-content-section <?php echo esc_attr($content_pd_css); ?>" style="<?php echo esc_attr($content_istyle); ?>">
					
					<div class="caw-infobanner-content">						
						<?php echo wp_kses_post($content, true); ?>
					</div>

					<!-- Button Component -->
					<?php do_action( 'caw_render_button_component', $attrs, $addon_base, true ); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>

		<?php if ($style == 'default') { ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-infobanner-ribbon">
					<span style="<?php echo esc_attr($ribbon_istyle); ?>">
						<?php echo esc_attr( $ribbon_text ); ?>
					</span>
				</div>
				<?php if(isset($img['thumbnail'])) { ?>
				<div class="caw-infobanner-img-section <?php echo esc_attr($img_hover_effect) ?> <?php echo esc_attr($img_padding_css); ?>" style="<?php echo esc_attr($img_istyle); ?>">
					<?php echo wp_kses_post($img['thumbnail']); ?>
				</div>
				<?php } ?>

				<div class="caw-infobanner-content-section <?php echo esc_attr($content_pd_css); ?>" style="<?php echo esc_attr($content_istyle); ?>">
					
					<div class="caw-infobanner-content">						
						<?php echo wpb_js_remove_wpautop($content, true); ?>
					</div>

					<!-- Button Component -->
					<?php do_action( 'caw_render_button_component', $attrs, $addon_base, true ); ?>				
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>

		<?php return ob_get_clean();
	}
}