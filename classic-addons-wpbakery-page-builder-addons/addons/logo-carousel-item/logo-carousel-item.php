<?php
/**
 * Single Logo [Logo Carousel]
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Logo_Carousel extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'image_id'        => '',
			'img_size'        => '',
			'link'            => '',
			'img_bt_text'     => '',
			'image_font_size' => '15px',
			'text_color'      => 'black',
			'cssbox'      => '',
      		'img_border'      => ''
		), $attrs ) );

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-logo-carousel-item');

		$img_istyle = '';
		if ( $img_border ) {
			$img_istyle .= 'border-radius:' . esc_attr( $img_border ) . ';';
		}

		$img = cawpb_get_image_by_size( array(
			'attach_id' => $image_id,
			'thumb_size' => $img_size,
			'class' => 'caw-single-image',
			'style' => $img_istyle
		));

		// SubHeading Inline Style
		$txt_istyle = cawpb_get_typo_styles('img_footer_txt', $attrs);

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-logo-carousel-inner-wrapper';
		$wrapper_classes[] = $cssbox;

		ob_start();
		?>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">

			<?php if ($link){ ?>				
				<a href="<?php echo esc_url($link); ?>" >
					<?php echo wp_kses_post($img['thumbnail']); ?>
				</a>
			<?php }else{ ?>
				<?php echo wp_kses_post($img['thumbnail']); ?>
			<?php } ?>

			<?php if(!empty($img_bt_text)) { ?>
				<h3 style="<?php echo esc_attr($txt_istyle); ?>">
					<?php echo esc_attr($img_bt_text); ?>
				</h3>		
			<?php } ?>

		</div>
		<?php return ob_get_clean();
	}
}