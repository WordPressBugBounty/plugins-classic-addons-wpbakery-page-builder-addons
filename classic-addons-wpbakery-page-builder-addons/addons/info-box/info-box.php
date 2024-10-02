<?php
/**
 * Info Box Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Info_Box extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'style' 			=> 'caw_info_box_style_1',
			'shadow'			=> 'caw_info_box_shadow0',
			'hovershadow'		=> '',
			'link' 				=> 'none',
			'readmore_txt' 		=> '',
			'readmore_txtclr' 	=> '',
			'heading' 		    => esc_html__('Custom heading', 'classic-addons'),
			'attach_link' 		=> '',
			'cssbox' 		 	=> '',
		), $attrs ));

		$addon_base = $this->settings['base'];

		wp_enqueue_style('caw-info-box', CAWPB_URL.'/addons/info-box/info-box.css');

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-info-box');

		$heading_istyle = cawpb_get_typo_styles('heading', $attrs, array());
		$content_istyle = cawpb_get_typo_styles('subheading', $attrs, array());
		
		$attach_link = vc_build_link($attach_link);

		$rm_istyle = '';
		if ( $readmore_txtclr ) {
			$rm_istyle .= 'color:' . esc_attr( $readmore_txtclr ) . ';';
		}

		$wrapper_classes = array();
		$wrapper_classes[] = $style;		
		$wrapper_classes[] = $shadow;
		$wrapper_classes[] = $hovershadow;
		$wrapper_classes[] = $cssbox;
		
		ob_start(); ?>		
		<?php if ($link == 'box') { ?>
			<a 
				href="<?php echo esc_url($attach_link['url']); ?>"
				title="<?php echo esc_attr($attach_link['title']); ?>" 
				ref="<?php echo esc_attr($attach_link['rel']); ?>" 
				target="<?php echo esc_attr($attach_link['target']); ?>" 
				style="text-decoration: none;color: #000;"
			>
			<?php } ?>
				<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">

					<!-- Icon -->
					<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>
					
					<div class="caw-info-box-content">

						<h3 class="caw-info-box-title" style="<?php echo esc_attr($heading_istyle); ?>">
							<?php echo esc_attr( $heading ); ?>
						</h3>
						<span class="caw-info-box-desc" style="<?php echo esc_attr($content_istyle); ?>">
							<?php echo wp_kses_post($content); ?>
						</span>

						<?php if ($link == 'readmore_btn') { ?>
						<a 
							href="<?php echo esc_url($attach_link['url']); ?>"
							class="caw-readmore-btn" title="<?php echo esc_attr($attach_link['title']); ?>" 
							ref="<?php echo esc_attr($attach_link['rel']); ?>" 
							target="<?php echo esc_attr($attach_link['target']); ?>" 
							style="<?php echo esc_attr($rm_istyle); ?>"
						>
						<?php echo esc_attr( $readmore_txt ); ?>
						</a>
						<?php } ?>

					</div>
					<div class="clearfix"></div>
				</div>
			<?php if ($link == 'box') { ?>
			</a>
			<?php } ?>
		<?php
		return ob_get_clean();
	}
}