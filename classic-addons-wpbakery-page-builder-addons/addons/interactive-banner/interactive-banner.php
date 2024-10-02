<?php
/**
 * Info Box Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Interacive_Banner extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'style' 	    => '1',
			'heading'	    => 'Custom Heading',
			'attach_link' 	=> '',
			'cssbox' 		=> '',
			'image_id'	    => '',
			'img_padding'   => '',
			'img_size'      => 'full',
		), $attrs ));

		$addon_base = $this->settings['base'];

		wp_enqueue_style('caw-interactive-banner', CAWPB_URL.'/addons/interactive-banner/interactive-banner.css');

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-interactive-banner');

		$heading_istyle = cawpb_get_typo_styles('heading', $attrs, array());
		
		$attach_link = vc_build_link($attach_link);

		$img = cawpb_get_image_by_size( array(
			'attach_id'  => $image_id,
			'thumb_size' => $img_size,
			'class'      => 'caw-single-image',
		));

		$wrapper_classes = array();
		$wrapper_classes[] = 'cawpb-interactive-banner-wrapper';
		$wrapper_classes[] = $cssbox;

		ob_start(); ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">				
				<figure class="cawpb-int-banner-<?php echo esc_attr( $style ); ?>">
				    <?php
				    	if (isset($img['thumbnail']) && $img['thumbnail'] != '') {
				    		echo wp_kses_post($img['thumbnail']);	
				    	} else {
				    		echo esc_attr__( 'You must also set an image to use interactive banner addon', 'classic-addons' );
				    	}
				    ?>
				    <figcaption>
				        <h3 style="<?php echo esc_attr($heading_istyle); ?>"><?php echo esc_attr( $heading ); ?></h3>
				        <p><?php echo wp_kses_post( $content ); ?></p>
				    </figcaption>
				    <a 
				    	title="<?php echo (isset($attach_link['title'])) ? esc_attr( $attach_link['title'] ) : '' ; ?>"
				    	target="<?php echo (isset($attach_link['target']) && $attach_link['target'] != '') ? esc_attr( $attach_link['target'] ) : '' ; ?>"
				    	href="<?php echo (isset($attach_link['url']) && $attach_link['url'] != '') ? esc_url($attach_link['url']) : 'javascript:void(0)' ; ?>">
				    </a>
				</figure>
			</div>
		<?php
		return ob_get_clean();
	}
}