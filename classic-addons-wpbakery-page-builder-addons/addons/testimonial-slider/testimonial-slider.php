<?php
/**
 * Testimonial Slider Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Testimonial_Slider_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'type'          => 'slider',
			'style'         => '1',
			'stars_color'   => '',
			'text_color'    => '',
			'bg_color'      => '',
			'title_color'   => '',
			'company_color' => '',
			'arrows_color'  => '#000',
			'slidestoshow'  => '',
			'speed'         => '',
			'autoplay'      => '',
			'autoplayspeed' => '',
			'cssbox'        => '',		
		), $attrs ) );

		cawpb_icon_fonts_enqueue('fontawesome');
		wp_enqueue_style('caw-testimonials-addon', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/css/styles.css' );

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-info-table');
		
		$row_class    = '';
		$column_class = '';
		$data_attr    = '';
		$r_id         = rand();

		switch ($type) {
			case 'masonry':
				wp_enqueue_style( 'caw-masonry-grid', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/css/simplegrid.css' );
				wp_enqueue_script( 'caw-masonry-js', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/js/masonry.js', array('jquery', 'jquery-masonry') );
				$row_class = 'grid masonry-wrap';
				break;
			case 'slider':
				wp_enqueue_style( 'caw-slick-lib', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/css/slick.css' );
				wp_enqueue_script( 'caw-slick-lib', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/js/slick.min.js', array('jquery') );
				wp_enqueue_script( 'caw-script-js', plugin_dir_url( dirname(__FILE__) ).'/testimonial-slider/js/script.js', array('jquery') );
				$row_class = 'caw-slick-trigger';
				$column_class = '';
				if (is_array($attrs)) {
			        foreach ($attrs as $p_name => $p_val) {
			            $data_attr .= ' data-'.esc_attr($p_name).' = '.esc_attr($p_val);
			        }
				}
				break;
		}

		// Add Inline Styles
		$istyle  = '';
		if ($stars_color != '') {
			$istyle .= "#st-{$r_id} .st-rating { color:  ".esc_attr($stars_color)."; }";
		}
		if ($text_color != '') {			
			$istyle .= "#st-{$r_id} .st-testimonial-content { color:  ".esc_attr($text_color)."; }";
			$istyle .= "#st-{$r_id} .st-testimonial-content p { color:  ".esc_attr($text_color)."; }";
		}
		if ($bg_color != '') {
			$istyle .= "#st-{$r_id} .st-testimonial-bg { background-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .style1 .arrow { border-top-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .style3 .arrow { border-top-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .style10 .arrow { border-top-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .style7 { border-bottom-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .style7::before { background-color: ".esc_attr($bg_color)."; }";
			$istyle .= "#st-{$r_id} .st-style17 .st-testimonial-bg::before { border-color: transparent transparent transparent ".esc_attr($bg_color)."; }";
		}
		if ($title_color != '') {			
			$istyle .= "#st-{$r_id} .st-testimonial-title { color: ".esc_attr($title_color)."; }";
		}
		if ($arrows_color != '') {			
			$istyle .= "#st-{$r_id} .slick-prev:before, #st-{$r_id} .slick-next:before { color: ".esc_attr($arrows_color)."; }";
		}
		if ($company_color != '') {		
			$istyle .= "#st-{$r_id} .st-testimonial-company { color: ".esc_attr($company_color)."; }";
			$istyle .= "#st-{$r_id} .st-testimonial-company a{ color: ".esc_attr($company_color)." !important; }";
		}

		wp_add_inline_style( 'caw-testimonials-addon', $istyle );

		ob_start(); ?>
			<div class="stars-testimonials <?php echo esc_attr($cssbox); ?>" id="st-<?php echo esc_attr($r_id); ?>">
				<div class="<?php echo esc_attr($row_class); ?>" <?php echo esc_attr($data_attr); ?>>
					<?php echo wp_kses_post(do_shortcode( $content )); ?>			
				</div>
			</div>
		<?php
		return ob_get_clean();
	}
}