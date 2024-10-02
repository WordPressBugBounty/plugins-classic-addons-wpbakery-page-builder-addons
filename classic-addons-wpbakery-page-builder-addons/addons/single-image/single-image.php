<?php
/**
 * Single Image Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Single_Image extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			
			'image_id'                    => '',
			'img_size'                    => '',
			'ex_classes'                  => '',
			'design_box'                  => '',
			'img_custom_link'             => '',
			'link'                        => '',
			'img_link_target'             => '_self',
			'img_ribbon_background_color' => '',
			'image_hover_pd'              => '',
			'img_hoverclr'                => '',
			'caption_hoverclr'            => '',
			'bottom_txthoverclr'          => '',
			'footer_text'                 => '',
			'footer_txt_position'         => 'caw-textleft',
			'image_effects'               => 'none',
			'image_ribbon'                => '',
			'content_position'            => 'caw-single-image-top-left-c',
			'img_ribbon_text'             => 'Demo',
			'ribbon_clr'                  => '',
			'ribbon_bg_clr'               => '',
			'ribbon_size'                 => '10px',				
			'cssbox'                      => '',
		), $attrs ) );

		$addon_id = cawpb_get_unique_class('single-image');

		wp_enqueue_style('caw-singleimage', CAWPB_URL.'/addons/single-image/css/single-image.css');

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-singleimage');

		$img = cawpb_get_image_by_size( array(
			'attach_id' => $image_id,
			'thumb_size' => $img_size,
			'class' => 'caw-single-image',
		));

		$ribbon_istyle  = cawpb_get_typo_styles('img_ribbon', $attrs, array('font-size' => '12px'));
		$caption_istyle = cawpb_get_typo_styles('caption', $attrs);
		$bttxt_istyle   = cawpb_get_typo_styles('bt_txt', $attrs);

		// Main Wrapper Classes
		$wrapper_classes = array();		
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $ex_classes;
		$wrapper_classes[] = 'caw-single-image-wrapper';
		$wrapper_classes[] = 'wpb_content_element';
		$wrapper_classes[] = $addon_id;
		$wrapper_classes[] = $content_position;
		
		if($image_effects == 'zoom'){
			wp_enqueue_script('caw-zoom-lib', CAWPB_URL.'/js/jquery.zoom.js', array('jquery'));
			$wrapper_classes[] = 'caw-single-image-zoom';
		}

		if ($image_effects == 'img_bw_effect') {
			$wrapper_classes[] = 'caw-single-image-black-n-white';
		}

		if($image_effects == 'popop'){
			wp_enqueue_style('caw-popop-lib', CAWPB_URL.'/css/simple-lightbox.css');
			wp_enqueue_script('caw-popop-lib', CAWPB_URL.'/js/simple-lightbox.js', array('jquery'), '1.0', true);
			$wrapper_classes[] = 'caw-single-image-popop';
		}

		if (!empty($image_hover_pd)) {
			$wrapper_classes[] = 'caw-single-image-hr-padding';
		}
		
		wp_enqueue_script('caw-singleimage', CAWPB_URL.'/addons/single-image/js/sm-script.js', array('jquery'), '1.0', true);
	
		ob_start(); 
		?>
		<style type="text/css">
		
			/*== Image Hover == */
			<?php if ($image_effects == 'image_hover'): ?>				
			.<?php echo esc_attr($addon_id); ?>:hover:before {
				background-color: <?php echo esc_attr($img_hoverclr); ?>;	 
			}
			.<?php echo esc_attr($addon_id); ?>:hover .caw-single-image-content {
				color: <?php echo esc_attr($caption_hoverclr); ?> !important;
			}
			.<?php echo esc_attr($addon_id); ?>.caw-single-image-hr-padding:hover img {
				padding: <?php echo esc_attr($image_hover_pd); ?> !important;
			}			
			.<?php echo esc_attr($addon_id); ?>:hover .caw-single-image-bottom span{
				color: <?php echo esc_attr($bottom_txthoverclr); ?> !important;
			}
			<?php endif ?>
			
			/*== Ribbon ==*/
			<?php if($image_ribbon){ ?>
			.<?php echo esc_attr($addon_id); ?> .caw-single-image-ribbon span:before {
				border-left-color: <?php echo esc_attr($img_ribbon_background_color); ?>;
				border-top-color: <?php echo esc_attr($img_ribbon_background_color); ?>;
			}
			.<?php echo esc_attr($addon_id); ?> .caw-single-image-ribbon span:after {
				border-right-color: <?php echo esc_attr($img_ribbon_background_color); ?>;
				border-top-color: <?php echo esc_attr($img_ribbon_background_color); ?>;
			}
			<?php } ?>

		</style>
		
		<?php if(!empty($img['thumbnail'])) { ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" >

				<div class="caw-single-image-content" style="<?php echo esc_attr($caption_istyle); ?>">
					<?php echo wp_kses_post($content); ?>
				</div>

				<?php if($image_ribbon){ ?>
					<div class="caw-single-image-ribbon">
						<span style="<?php echo esc_attr($ribbon_istyle); ?>">
							<?php echo esc_attr($img_ribbon_text); ?>
						</span>
					</div>
				<?php } ?>

				<div class="caw-single-image-image">					
					<?php if ($image_effects == 'img_custom_link'){ ?>
						<a target="<?php echo esc_attr($img_link_target); ?>" href="<?php echo esc_url($link); ?>">
							<?php echo wp_kses_post($img['thumbnail']); ?>
						</a>
					<?php } else if ($image_effects == 'popop' || $image_effects == 'zoom') { ?>
						<a href="<?php echo esc_url($img['image_url']); ?>">
							<?php echo wp_kses_post($img['thumbnail']); ?>
						</a>
					<?php } else { ?>
						<?php echo wp_kses_post($img['thumbnail']); ?>
					<?php } ?>
				</div>

				<div class="caw-single-image-bottom <?php echo esc_attr($footer_txt_position); ?>">
					<span style="<?php echo esc_attr($bttxt_istyle); ?>"> <?php echo esc_attr($footer_text); ?> </span>
				</div>
			</div>
		<?php } ?>
			
		<?php return ob_get_clean();
	}
}