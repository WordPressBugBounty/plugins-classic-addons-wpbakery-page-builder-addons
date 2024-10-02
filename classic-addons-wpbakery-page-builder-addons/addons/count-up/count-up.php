<?php
/**
 * CountUp Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Count_Up extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'heading'             => 'The Title',
			'value'               => '2500',
			'start_from'          => '0',
			'speed'               => '2000',
			'decimal'             => '0',
			'icon_position'       => 'center',
			'divider_color'       => '',
			'divider_width'       => '25px',
			'divider_height'      => '1px',
			'heading_position'    => 'bottom',
			'icon_border'         => '',
			'extra_classes'       => '',
			'icon_type'           => 'fontawesome',
			'icon_boxsize'        => '100px',
			'icon_imgsize'        => '',
			'cssbox'              => '',
		), $attrs ) );

		$addon_base = $this->settings['base'];
		$addon_handle = str_replace("_", "-", $this->settings['base']);
		
		wp_enqueue_style($addon_handle, CAWPB_URL.'/addons/count-up/count-up.css');
		wp_enqueue_script('caw-countup-lib', CAWPB_URL.'/addons/count-up/countTo.min.js', array('jquery'));
		wp_enqueue_script('caw-countup-trigger', CAWPB_URL.'/addons/count-up/trigger.js', array('jquery'));
		
		$cssbox          = cawpb_add_inline_style($cssbox, $addon_base, $attrs, $addon_handle);
		$icon_border_css = cawpb_add_inline_style($icon_border, $addon_base, $attrs, $addon_handle);

		$icon_class = cawpb_get_icon_class('icon', $icon_type, $attrs);
		$icon_css   = cawpb_icon_styles('icon', $attrs, array('font-size' => '20px'));

		$icon_wrapperclass = 'caw-countup-icon';
		if ($icon_type == 'imageicon') {
	        $icon_wrapperclass = 'caw-countup-img';
	        $img_border = $icon_border_css;
	        $icon_border_css = '';
		}

		$icon_istyle = '';
		$img_istyle  = '';
		$icon_istyle .= 'display:inline-block;';
		$icon_radius = cawpb_get_border_radius_css('icon', $attrs);
		if ($icon_type != 'imageicon') {
			$icon_istyle .= $icon_css;
			$icon_istyle .= $icon_radius;			
		}else{
			$img_istyle .= $icon_radius;
			if ( $icon_imgsize ) {
				$img_istyle .= 'max-width:' . esc_attr( $icon_imgsize ) . ';';
			}
		}

		$h_istyle = cawpb_get_typo_styles('heading', $attrs, array('font-size' => '18px'));
		$count_istyle = cawpb_get_typo_styles('counter', $attrs, array('font-size' => '40px'));

		$divider_istyle = '';
		if ( $divider_height ) {
			$divider_istyle .= 'border-bottom: '. $divider_height . ' solid ' .$divider_color . ';';
		}
		if ( $divider_width ) {
			$divider_istyle .= 'max-width:' . $divider_width . ';';
		}

		if ($icon_position == 'left') {
			$icon_istyle .= 'margin-right: 16px;';
		}elseif ($icon_position == 'right') {
			$icon_istyle .= 'margin-left: 16px;';
		}

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-countup-wrapper';
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $extra_classes;

		?>

		<?php ob_start(); ?>
		<?php if ($icon_position != 'center'){ ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-countup-inner caw-countup-style-1">			
					<?php if ($icon_position == 'left'){ ?>

						<?php if ($icon_class){ ?>
							<div class="<?php echo esc_attr($icon_wrapperclass); ?>">
								<div class="<?php echo esc_attr($icon_border_css); ?>"  style="<?php echo esc_attr( $icon_istyle ); ?>">
									<?php if ($icon_type == 'imageicon') { ?>
										<img src="<?php echo esc_url($icon_class); ?>" style="<?php echo esc_attr($img_istyle); ?>" class="<?php echo esc_attr($img_border); ?>" >
									<?php } else { ?>
										<i class="<?php echo esc_attr($icon_class); ?>"></i>
									<?php } ?>								
								</div>
							</div>
						<?php } ?>

					<?php } ?>
					<div class="caw-countup-box">
						<span
							class="caw-time-counter"
							data-decimals="<?php echo esc_attr($decimal); ?>"
							data-speed="<?php echo esc_attr($speed); ?>"
							data-to="<?php echo esc_attr($value); ?>"
							data-from="<?php echo esc_attr($start_from); ?>"
							style="<?php echo esc_attr($count_istyle); ?>" 
						>
							<?php echo esc_attr( $start_from ); ?>
						</span>
						<?php if(!empty($divider_color)){ ?>
							<span class="caw-countup-line" style="<?php echo esc_attr($divider_istyle); ?>"></span>
	                	<?php } ?>
						<span style="<?php echo esc_attr($h_istyle); ?>">
							<?php echo esc_attr( $heading ); ?>
						</span>
					</div>
					<?php if ($icon_position == 'right'){ ?>

						<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>

					<?php } ?>
				</div>
			</div>

			<?php }else{ ?>

			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-countup-inner">
					<?php if($heading_position == 'top') { ?>
						<span style="<?php echo esc_attr($h_istyle); ?>">
							<?php echo esc_attr( $heading ); ?>
						</span>
						<?php if(!empty($divider_color)){ ?>
							<span class="caw-countup-line" style="<?php echo esc_attr($divider_istyle); ?>"></span>
	                	<?php } ?>
					<?php } ?>										
					
					<?php do_action( 'caw_render_icon_component', $attrs, $addon_base, false ); ?>

					<div class="caw-countup-box">
						<span
							class="caw-time-counter"
							data-decimals="<?php echo esc_attr($decimal); ?>"
							data-speed="<?php echo esc_attr($speed); ?>"
							data-to="<?php echo esc_attr($value); ?>"
							data-from="<?php echo esc_attr($start_from); ?>"
							style="<?php echo esc_attr($count_istyle); ?>" 
						>
							<?php echo esc_attr( $start_from ); ?>
						</span>

						<?php if($heading_position == 'bottom') {
		                    if(!empty($divider_color)){ ?>
							<span class="caw-countup-line" style="<?php echo esc_attr($divider_istyle); ?>"></span>
		                	<?php } ?>
							<span style="<?php echo esc_attr($h_istyle); ?>">
								<?php echo esc_attr( $heading ); ?>
							</span>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } return ob_get_clean();
	}
}