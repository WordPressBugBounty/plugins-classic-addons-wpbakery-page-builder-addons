<?php
/**
 * FlipBook Single Page
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Flip_Book extends WPBakeryShortCode {

	public $page_number    = 0;
	public $content_arr    = array();
	public $single_classes = array();

	protected function content( $attrs, $content = null ) {

		extract( shortcode_atts( array(
			'cssbox' 	=> '',
		), $attrs ) );

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-flipbook-styles');

		ob_start(); 
		global $caw_flipbook_style;
		?>

		<?php
		if ($caw_flipbook_style == 'caw_fb_single_pages') {

			$this->content_arr[]    = $content;
			$this->single_classes[] = $cssbox;

    		if ($this->page_number%2 != 0) {
    		?>

    			<div 
    				class="flipper-page" 
    				data-styles="<?php echo htmlspecialchars(json_encode($this->single_classes)); ?>"
    				data-imgurls="<?php echo htmlspecialchars(json_encode($this->content_arr)); ?>"
    			>
    			</div>
    		<?php
    			$this->content_arr = array();
    			$this->single_classes = array();
    		}
    		$this->page_number++;
		} else { ?>
			<div class="flipper-page" data-styles="<?php echo esc_attr( $cssbox ); ?>">
				<?php echo wp_kses_post( do_shortcode( $content ) ); ?>
			</div>
		<?php } ?>
		<?php return ob_get_clean();
	}
}