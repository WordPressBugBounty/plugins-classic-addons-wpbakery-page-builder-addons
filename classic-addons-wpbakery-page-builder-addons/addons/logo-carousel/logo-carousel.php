<?php
/**
 * Logo Carousel Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Logo_Carousel_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'columns'   => '3',
			'slides'    => '1',
			'autoplay'  => 'false',
			'autoplay_speed' => '3000',
			'dots'           => 'false',
			'arrow_feature'  => 'false',
			'arrow_style'    => '1',
      		'margin_image'   => '',
      		'speed'          => '500',
      		'cssease'        => 'linear',			
			'cssbox'     => '',
			'ex_classes'     => '',				
		), $attrs ) );

		cawpb_icon_fonts_enqueue('fontawesome');
		wp_enqueue_style('caw-logo-carousel', CAWPB_URL.'/addons/logo-carousel/logo-carousel.css');
		wp_enqueue_style('caw-slick-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick.css');
		wp_enqueue_style('caw-slick-theme-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick-theme.css');

		wp_enqueue_script('caw-slick-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick.min.js', array('jquery'));
		wp_enqueue_script('caw-logo-carousel', CAWPB_URL.'/addons/logo-carousel/js/logo-carousel.js', array('jquery'));

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-logo-carousel');

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-logo-carousel-outer-wrapper';
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $ex_classes;
		

		ob_start(); ?>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" >
			
			<?php 
			$arrow_btn = "";
			if($arrow_style == 2 && $arrow_feature == 'true' ) {
				$arrow_btn = ',"prevArrow": ".pp", "nextArrow": ".nn" ';
			?>
				<div class="caw-logo-carousel-arrow">	
					<button class="pp"><i class="fa fa-chevron-left"></i></button>
					<button class="nn"><i class="fa fa-chevron-right"></i></button>
				</div>	
			<?php } ?>

			<div 
				class="caw-logo-carousel-js"
				data-slick='{"dots": <?php echo esc_attr($dots); ?>, "autoplay": <?php echo esc_attr($autoplay) ?>,"autoplaySpeed": <?php echo esc_attr($autoplay_speed) ?>, "arrows": <?php echo esc_attr($arrow_feature) ?>, "infinite": true, "speed":<?php echo esc_attr($speed) ?>, "cssEase":"linear", "slidesToShow":<?php echo esc_attr($columns) ?>, "slidesToScroll": <?php echo esc_attr($slides); ?>
				<?php echo esc_attr($arrow_btn); ?>}'
			>
				<?php echo wp_kses_post(do_shortcode( $content )); ?>					
			</div>

		</div>	
		<?php
		return ob_get_clean();
	}
}