<?php
/**
 * Info Table Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Info_Table extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		
		extract( shortcode_atts( array(
			'ex_classes'       => '',			
			'heading'          => 'Heading',
			'subheading'       => 'Write your dreams',			
			'header_bgclr'     => '',
			'btn_text'         => 'Click Me!',
			'btn_link'         => '',
			'footer_bgclr'     => '',
			'header_border'    => '',
			'header_padding'   => '',
			'footer_border'    => '',
			'footer_padding'   => '',
			'btn_border'       => '',
			'btn_margin'       => '',
			'btn_padding'      => '',
			'cssbox'           => '',
		), $attrs ) );

		$addon_base   = $this->settings['base'];
		$addon_handle = str_replace("_", "-", $this->settings['base']);
		$addon_id     = cawpb_get_unique_class('caw-info-table');

		$attrs['addon_id'] = $addon_id;

		wp_enqueue_style($addon_base, CAWPB_URL.'/addons/info-table/info-table.css');

		$cssbox           = cawpb_add_inline_style($cssbox, $addon_base, $attrs);
		$header_border_css  = cawpb_add_inline_style($header_border, $addon_base, $attrs, $addon_base);
		$header_padding_css  = cawpb_add_inline_style($header_padding, $addon_base, $attrs, $addon_base);
		$footer_border_css  = cawpb_add_inline_style($footer_border, $addon_base, $attrs, $addon_base);
		$footer_padding_css  = cawpb_add_inline_style($footer_padding, $addon_base, $attrs, $addon_base);
		$btn_border_css  = cawpb_add_inline_style($btn_border, $addon_base, $attrs, $addon_base);
		$btn_margin_css  = cawpb_add_inline_style($btn_margin, $addon_base, $attrs, $addon_base);
		$btn_padding_css  = cawpb_add_inline_style($btn_padding, $addon_base, $attrs, $addon_base);
		
		$button_link = vc_build_link($btn_link);
		
		// Header Inline Style
		$header_istyle = '';
		if ( $header_bgclr ) {
			$header_istyle .= 'background:' . esc_attr( $header_bgclr ) . ';';
		}

		// Heading Inline Style
		$heading_istyle = cawpb_get_typo_styles('heading', $attrs, array('font-size' => '20px'));
		
		// SubHeading Inline Style
		$subh_istyle = cawpb_get_typo_styles('subheading', $attrs, array('font-size' => '18px'));		

		// Footer Inline Style
		$footer_istyle = '';
		if ( $footer_bgclr ) {
			$footer_istyle .= 'background:' . esc_attr( $footer_bgclr ) . ';';
		}

		// Button Inline Style
		$btn_css = cawpb_get_btn_css('btn', $attrs);
		$btn_istyle = '';
		$btn_istyle .= 'display:inline-block;';
		$btn_istyle .= $btn_css;

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-it-wrapper';
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $ex_classes;
		$wrapper_classes[] = $addon_id;

		ob_start(); ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-it-inner">

					<!-- Header Section -->
					<div class="caw-it-header <?php echo esc_attr($header_border_css); ?> <?php echo esc_attr($header_padding_css); ?>" style="<?php echo esc_attr($header_istyle); ?>">

						<?php if(!empty($heading)){?>
						<h3 style="<?php echo esc_attr($heading_istyle); ?>">
							<?php echo esc_html($heading); ?>
						</h3>
						<?php } ?>
						<?php if(!empty($subheading)){?>
						<h5 style="<?php echo esc_attr($subh_istyle); ?>"><?php echo esc_html($subheading); ?></h5>
						<?php } ?>
					</div>

					<!-- Icon -->
					<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, true ); ?>

					<!-- footer -->
					<?php if (!empty($content) || !empty($btn_text)): ?>
					<div class="caw-it-footer <?php echo esc_attr($footer_border_css); ?> <?php echo esc_attr($footer_padding_css); ?>" style="<?php echo esc_attr($footer_istyle); ?>">

						<?php if (!empty($content)): ?>							
							<div>
								<?php echo wp_kses_post($content); ?>
							</div>
						<?php endif ?>

						<!-- Button Component -->
						<?php do_action( 'caw_render_button_component', $attrs, $addon_base, true ); ?>						
					</div>
					<?php endif ?>

				</div>
			</div>
		<?php return ob_get_clean();
	}
}