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
			'columns'        => '3',
			'slides'         => '1',
			'autoplay'       => 'false',
			'autoplay_speed' => '3000',
			'dots'           => 'false',
			'arrow_feature'  => 'false',
			'arrow_style'    => '1',
			'margin_image'   => '',
			'speed'          => '500',
			'cssease'        => 'linear',
			'pauseonhover'   => '',
			'rtl'            => '',
			'center_mode'    => '',
			'fade'           => '',
			'grayscale'      => '',
			'responsive_lg'  => '',
			'responsive_md'  => '',
			'responsive_sm'  => '',
			'cssbox'         => '',
			'ex_classes'     => '',
		), $attrs ) );

		cawpb_icon_fonts_enqueue('fontawesome');
		wp_enqueue_style('caw-logo-carousel', CAWPB_URL.'/addons/logo-carousel/logo-carousel.css', array(), CAWPB_VERSION);
		wp_enqueue_style('caw-slick-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick.css', array(), CAWPB_VERSION);
		wp_enqueue_style('caw-slick-theme-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick-theme.css', array(), CAWPB_VERSION);

		wp_enqueue_script('caw-slick-lib', CAWPB_URL.'/addons/logo-carousel/js/slick/slick/slick.min.js', array('jquery'), CAWPB_VERSION);
		wp_enqueue_script('caw-logo-carousel', CAWPB_URL.'/addons/logo-carousel/js/logo-carousel.js', array('jquery'), CAWPB_VERSION);

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-logo-carousel');

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-logo-carousel-outer-wrapper';
		if ( $grayscale === 'yes' ) {
			$wrapper_classes[] = 'caw-logo-carousel-grayscale';
		}
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $ex_classes;

		$slick_config = array(
			'dots'          => ( $dots === 'true' || $dots === true || $dots === 'yes' ),
			'autoplay'      => ( $autoplay === 'true' || $autoplay === true || $autoplay === 'yes' ),
			'autoplaySpeed' => (int) $autoplay_speed,
			'arrows'        => ( $arrow_feature === 'true' || $arrow_feature === true || $arrow_feature === 'yes' ),
			'infinite'      => true,
			'speed'         => (int) $speed,
			'cssEase'       => $cssease !== '' ? $cssease : 'linear',
			'slidesToShow'  => (int) $columns,
			'slidesToScroll'=> (int) $slides,
			'pauseOnHover'  => ( $pauseonhover === 'yes' || $pauseonhover === 'true' ),
			'rtl'           => ( $rtl === 'yes' ),
			'centerMode'    => ( $center_mode === 'yes' ),
			'fade'          => ( $fade === 'yes' ),
		);

		if ( $slick_config['fade'] ) {
			$slick_config['slidesToShow']   = 1;
			$slick_config['slidesToScroll'] = 1;
		}

		// Arrow override if style 2 (pp/nn buttons)
		$has_custom_arrows = ( $arrow_style == 2 && $slick_config['arrows'] );
		if ( $has_custom_arrows ) {
			$slick_config['prevArrow'] = '.pp';
			$slick_config['nextArrow'] = '.nn';
		}

		// Only add responsive rules if the user has configured any — preserves
		// original behaviour for existing pages that had no breakpoints.
		if ( $responsive_lg !== '' || $responsive_md !== '' || $responsive_sm !== '' ) {
			$lg = $responsive_lg !== '' ? (int) $responsive_lg : (int) $columns;
			$md = $responsive_md !== '' ? (int) $responsive_md : (int) $columns;
			$sm = $responsive_sm !== '' ? (int) $responsive_sm : (int) $columns;
			$slick_config['responsive'] = array(
				array( 'breakpoint' => 1200, 'settings' => array( 'slidesToShow' => $lg, 'slidesToScroll' => 1 ) ),
				array( 'breakpoint' => 992,  'settings' => array( 'slidesToShow' => $lg, 'slidesToScroll' => 1 ) ),
				array( 'breakpoint' => 768,  'settings' => array( 'slidesToShow' => $md, 'slidesToScroll' => 1 ) ),
				array( 'breakpoint' => 480,  'settings' => array( 'slidesToShow' => $sm, 'slidesToScroll' => 1 ) ),
			);
		}

		$slick_json = wp_json_encode( $slick_config );

		ob_start(); ?>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" >

			<?php if ( $has_custom_arrows ) : ?>
				<div class="caw-logo-carousel-arrow">
					<button class="pp"><i class="fa fa-chevron-left"></i></button>
					<button class="nn"><i class="fa fa-chevron-right"></i></button>
				</div>
			<?php endif; ?>

			<div
				class="caw-logo-carousel-js"
				data-slick='<?php echo esc_attr( $slick_json ); ?>'
			>
				<?php echo wp_kses_post(do_shortcode( $content )); ?>
			</div>

		</div>
		<?php
		return ob_get_clean();
	}
}