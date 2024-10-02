<?php
/**
 * Button Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Button extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'btn_style'     => 'animated',
			'btn_alignment' => 'left',
			'cssbox'        => 'left',
		), $attrs ) );
    	
    	$addon_id = cawpb_get_unique_class('button-addon');

		wp_enqueue_style('caw-button-addon', CAWPB_URL.'/addons/button/hover.css');	

    	$cssbox  = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs);

		// Wrapper Style
		$wrapper_istyle = '';
		if ( $btn_alignment ) {
			$wrapper_istyle .= 'text-align:' . esc_attr( $btn_alignment ) . ';';
		}

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-button-wrapper';
		$wrapper_classes[] = 'caw-'.$addon_id;
		$wrapper_classes[] = $cssbox;		

		ob_start(); ?>		
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" style="<?php echo esc_attr($wrapper_istyle); ?>">
			<?php $this->display_button($attrs, $addon_id); ?>			
		</div>
		<?php
		return ob_get_clean();
	}

	function display_button($attrs, $addon_id){

		extract( shortcode_atts( array(
			'btn_style'                => 'animated',
			'animated_style'           => 'transition',
			'animated_trans'           => 'hvr-grow',
			'background_trans'         => 'hvr-fade',
			'shadow_trans'             => 'hvr-shadow',
			'border_trans'             => 'hvr-underline-from-left',
			'bubble_trans'             => 'hvr-bubble-top',
			'btn_link'                 => '',
			'btn_text'                 => 'Click Me!',
			'btn_border'               => '',
			'btn_hvr_color'            => '',
			'btn_hvr_background_color' => '',
			'border_trans_clr'         => '#81d742',
			'btn_background_color'     => '',
			'fontawsome_icon'          => 'fa fa-home',
			'icon_linecons'            => '',
			'btn_margin'               => '',
			'btn_padding'              => '',
			'btn_icontype'             => 'fontawesome',
			'btn_iconpos'		       => 'left',
		), $attrs ) );

			$btn_margin_css  = cawpb_add_inline_style($btn_margin, $this->settings['base'], $attrs, 'caw-button-addon');
			$btn_padding_css = cawpb_add_inline_style($btn_padding, $this->settings['base'], $attrs, 'caw-button-addon');

			$icon_name = cawpb_get_icon_class('btn', $btn_icontype, $attrs);
			$btn_border_css  = cawpb_add_inline_style($btn_border, $this->settings['base'], $attrs, 'caw-button-addon');

			$button_link = vc_build_link($btn_link);

			$btn_css  = cawpb_get_btn_css('btn', $attrs, array('background-color'=> '#b2b2b2','color'=>'#fff'));


			$btn_istyle   = '';
			$style_class  = '';
			$hover_class  = '';
			$inline_style = '';
			$btn_istyle  .= $btn_css;
			switch ($animated_style) {
				case 'transition':
					$style_class = $animated_trans;
					$hover_class = 'caw-btn-trans-hover';					
					break;
				case 'bg_transition':
					$style_class = $background_trans;
					$inline_style=	'.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{
							background-color: ".esc_attr($btn_hvr_background_color).";color:".esc_attr($btn_hvr_color)." !important;
						}";
					$inline_style.= '.caw-'.esc_attr($addon_id). " a.".esc_attr($style_class).":hover{ color:".esc_attr($btn_hvr_color)." !important;}";
					break;
				case 'shadow':
					$style_class = $shadow_trans;
					$hover_class = 'caw-btn-trans-hover';
					break;
				case 'brdr_transition':
					$style_class = $border_trans;
					$hover_class = 'caw-btn-trans-hover';
					$inline_style =	'.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{
								background-color: ".esc_attr($border_trans_clr).";
							}";
					break;
				case 'speech_bubbles':
					$style_class = $bubble_trans;
					break;
			}

			if ($hover_class == 'caw-btn-trans-hover') {
				$inline_style .= '.caw-'.esc_attr($addon_id). " a.caw-btn-trans-hover:hover{ color:".esc_attr($btn_hvr_color)." !important;background-color:".$btn_hvr_background_color."!important;}";
			}

			switch ($style_class) {
				case 'hvr-bubble-top':
				case 'hvr-bubble-float-top':
					$inline_style = '.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{border-color: transparent transparent ". esc_attr($btn_background_color). " transparent;}";
					break;
				case 'hvr-bubble-right':
				case 'hvr-bubble-float-right':
					$inline_style = '.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{border-color: transparent transparent transparent ".esc_attr($btn_background_color).";}";
					break;
				case 'hvr-bubble-bottom':
				case 'hvr-bubble-float-bottom':
					$inline_style = '.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{border-color: ".esc_attr($btn_background_color)." transparent transparent transparent;}";
					break;
				case 'hvr-bubble-left':
				case 'hvr-bubble-float-left':
					$inline_style = '.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{border-color: transparent ".esc_attr($btn_background_color)." transparent transparent;}";
					break;
				case 'hvr-fade':
					$inline_style = '.caw-'.esc_attr($addon_id). " a.hvr-fade:hover{ color:".esc_attr($btn_hvr_color)." !important;background-color:".esc_attr($btn_hvr_background_color)."!important;}";
					break;
				case 'hvr-reveal':
						$inline_style = '.caw-'.esc_attr($addon_id). " .".esc_attr($style_class).":before{
							border-color: ".esc_attr($border_trans_clr).";
						}";
					break;
				case 'hvr-back-pulse':
					$inline_style = "@-webkit-keyframes hvr-back-pulse {
					  50% {
					    background-color:" .esc_attr($btn_hvr_background_color). ";
					  }
					}
					@keyframes hvr-back-pulse {
					  50% {
					    background-color:". esc_attr($btn_hvr_background_color) .";
					  }
					}";
					$inline_style .= '.caw-'.esc_attr($addon_id). " a.hvr-back-pulse:hover{ color:".esc_attr($btn_hvr_color)." !important;}";
					break;
			}
		?>
		<a 			
			href="<?php echo esc_url($button_link['url']); ?>" 
			target="<?php echo esc_attr( $button_link['target'] ); ?>" 
			title="<?php echo esc_attr($button_link['title']); ?>" 
			class="caw-btn <?php echo esc_attr($btn_border_css); ?> <?php echo esc_attr($hover_class); ?> <?php echo esc_attr( $style_class ); ?> <?php echo esc_attr($btn_padding_css); ?> <?php echo esc_attr($btn_margin_css); ?>"
			style="<?php echo esc_attr($btn_istyle); ?>" 
		>
		<?php 
		if ($btn_iconpos =='left'){ 
		?>
			<i class="<?php echo esc_attr($icon_name); ?>"></i>
		<?php		
		}

		echo esc_html($btn_text);

		if($btn_iconpos =='right'){
		?>
			<i class="<?php echo esc_attr($icon_name); ?>"></i>
		<?php
		} 
		?>
		</a>

		<?php
		wp_add_inline_style( 'caw-button-addon', $inline_style );
	}
}