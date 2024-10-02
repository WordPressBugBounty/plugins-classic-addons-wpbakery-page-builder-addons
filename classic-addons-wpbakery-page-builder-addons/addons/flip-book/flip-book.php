<?php
/**
 * FlipBook Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Flip_Book_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {
		wp_enqueue_style( 'caw-flipbook-styles', plugins_url('flip-book/css/flipper.min.css' , dirname(__FILE__) ));
		wp_enqueue_script( 'wcp-flipbook-script', plugins_url('flip-book/js/flipper.js' , dirname(__FILE__) ), array('jquery'));
		wp_enqueue_script( 'wcp-flipbook-trigger', plugins_url('flip-book/js/script.js' , dirname(__FILE__) ), array('jquery'));
		wp_localize_script( 'wcp-flipbook-trigger', 'wcpbook', array('path' => plugins_url( 'flip-book/images/' , dirname(__FILE__) ) ) );
		extract( shortcode_atts( array(
			'style' 	     => 'caw_fb_dual_pages',
			'ex_classes'     => '',
			'width' 	     => '700px',
			'height_desktop' => '350x',
			'height_mobile'  => '200px',
			'mobile_size' 	 => '400px',
			'arrows' 	     => '',
			'tabs' 	         => '',
		), $attrs ) );

		$addon_id = cawpb_get_unique_class('flipbook');

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-flipbook-wrapper';
		$wrapper_classes[] = 'caw-flipbook-counter-' .$addon_id;
		$wrapper_classes[] = $ex_classes;
		$wrapper_classes[] = $style;
		$wrapper_classes[] = 'bookwrap';

		$wrapper_istyle = '';
		if ( $width ) {
			$wrapper_istyle .= 'max-width: '. $width . ';';
		}

		$GLOBALS['caw_flipbook_style'] = $style;

		ob_start(); ?>
		<style>
			.caw-flipbook-counter-<?php echo esc_attr($addon_id) ?> .caw-flipbook-inner {
				height: <?php echo esc_attr($height_desktop); ?> !important;
			}
			.caw-flipbook-counter-<?php echo esc_attr($addon_id) ?> .flipper-prev-page, .caw-flipbook-counter-<?php echo esc_attr($addon_id) ?> .flipper-next-page {
				display: <?php echo ($arrows == 'true') ? 'block' : 'none' ; ?>
			}
			.caw-flipbook-counter-<?php echo esc_attr($addon_id) ?> .flipper-pager-wrap {
				display: <?php echo ($tabs == 'true') ? 'block' : 'none' ; ?>
			}
			@media only screen and (max-width: <?php echo esc_attr($mobile_size) ?>){
				.caw-flipbook-counter-<?php echo esc_attr($addon_id) ?> .caw-flipbook-inner {
					height: <?php echo esc_attr($height_mobile); ?> !important;
				}
			}
		</style>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" style="<?php echo esc_attr($wrapper_istyle); ?>">

			<img class="caw-flipbook-loader" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Loading">

			<div 
				class="caw-flipbook-inner"
				data-mode="<?php echo esc_attr($style); ?>"
				data-width="<?php echo esc_attr($width); ?>"
			>
				<?php echo wp_kses_post( do_shortcode( $content ) ); ?>
			</div>
		</div>
		<?php return ob_get_clean();
	}
}