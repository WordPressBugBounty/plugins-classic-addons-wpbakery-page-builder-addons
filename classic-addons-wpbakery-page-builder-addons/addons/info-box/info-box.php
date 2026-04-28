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
			'readmore_bgclr' 	=> '',
			'readmore_padding' 	=> '',
			'readmore_class' 	=> '',
			'heading' 		    => esc_html__('Custom heading', 'classic-addons'),
			'heading_tag' 		=> 'h3',
			'attach_link' 		=> '',
			'hover_effect' 		=> '',
			'content_align' 	=> '',
			'box_bg_color' 		=> '',
			'box_border_color' 	=> '',
			'box_border_width' 	=> '',
			'box_border_radius' => '',
			'box_padding' 		=> '',
			'cssbox' 		 	=> '',
		), $attrs ));

		$addon_base = $this->settings['base'];

		wp_enqueue_style('caw-info-box', CAWPB_URL.'/addons/info-box/info-box.css', array(), CAWPB_VERSION);

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-info-box');

		$heading_istyle = cawpb_get_typo_styles('heading', $attrs, array());
		$content_istyle = cawpb_get_typo_styles('subheading', $attrs, array());
		
		$attach_link = vc_build_link($attach_link);

		$spacing_classes = array();
		$spacing_fields = [
		    'heading' => ['margin', 'padding'],
		    'subheading' => ['margin', 'padding'],
		];

		foreach ($spacing_fields as $prefix => $properties) {
		    foreach ($properties as $property) {
		        $field = "{$prefix}_{$property}";
		        $spacing_classes[$prefix][] = isset($attrs[$field]) ? cawpb_add_inline_style($attrs[$field], $this->settings['base'], $attrs, 'caw-info-box'): '';
		    }
		    $spacing_classes[$prefix] = implode(' ', array_filter($spacing_classes[$prefix])); // Combine margin & padding classes
		}

		$rm_istyle = '';
		if ( $readmore_txtclr ) {
			$rm_istyle .= 'color:' . esc_attr( $readmore_txtclr ) . ';';
			$rm_istyle .= 'background-color:' . esc_attr( $readmore_bgclr ) . ';';
			$rm_istyle .= 'padding:' . esc_attr( $readmore_padding ) . ';';
		}

		$wrapper_classes = array();
		$wrapper_classes[] = $style;
		$wrapper_classes[] = $shadow;
		$wrapper_classes[] = $hovershadow;
		if ( $hover_effect !== '' ) {
			$wrapper_classes[] = 'caw-info-box-hover-' . sanitize_html_class( $hover_effect );
		}
		if ( $content_align !== '' ) {
			$wrapper_classes[] = 'caw-info-box-align-' . sanitize_html_class( $content_align );
		}
		$wrapper_classes[] = $cssbox;

		$box_istyle = '';
		if ( $box_bg_color !== '' ) {
			$box_istyle .= 'background-color:' . esc_attr( $box_bg_color ) . ';';
		}
		if ( $box_border_width !== '' || $box_border_color !== '' ) {
			$bw = $box_border_width !== '' ? $box_border_width : '1px';
			$bc = $box_border_color !== '' ? $box_border_color : '#e5e7eb';
			$box_istyle .= 'border:' . esc_attr( $bw ) . ' solid ' . esc_attr( $bc ) . ';';
		}
		if ( $box_border_radius !== '' ) {
			$box_istyle .= 'border-radius:' . esc_attr( $box_border_radius ) . ';';
		}
		if ( $box_padding !== '' ) {
			$box_istyle .= 'padding:' . esc_attr( $box_padding ) . ';';
		}

		$allowed_heading_tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'p', 'span' );
		$heading_tag = in_array( strtolower( $heading_tag ), $allowed_heading_tags, true ) ? strtolower( $heading_tag ) : 'h3';

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
				<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" style="<?php echo esc_attr($box_istyle); ?>">

					<!-- Icon -->
					<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>

					<div class="caw-info-box-content">

						<<?php echo esc_attr($heading_tag); ?> class="caw-info-box-title <?php echo esc_attr($spacing_classes['heading']); ?>" style="<?php echo esc_attr($heading_istyle); ?>">
							<?php echo esc_attr( $heading ); ?>
						</<?php echo esc_attr($heading_tag); ?>>
						<div class="caw-info-box-desc <?php echo esc_attr($spacing_classes['subheading']); ?>" style="<?php echo esc_attr($content_istyle); ?>">
							<?php echo wp_kses_post($content); ?>
						</div>

						<?php if ($link == 'readmore_btn') { ?>
						<a 
							href="<?php echo esc_url($attach_link['url']); ?>"
							class="caw-readmore-btn <?php echo esc_attr($readmore_class); ?>" title="<?php echo esc_attr($attach_link['title']); ?>" 
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