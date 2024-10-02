<?php
/**
 * Filterable Portfolio Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Filterable_Portfolio extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'image_id'   => '',
			'link'       => '',
			'category'   => 'design Seo',
		), $attrs ) );

		$image_url = wp_get_attachment_url($image_id);

		// Main Wrapper Classes
		$wrapper_classes   = array();
		$wrapper_classes[] = 'col-4';
		$wrapper_classes[] = 'mix';
		$wrapper_classes[] = sanitize_key($category);

		ob_start(); ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
				<div class="caw-filportfolio-single">
					<div class="caw-filportfolio-img">
						<span class="caw-filterable-item">		
							<img src="<?php echo esc_url($image_url); ?>" alt="" />
						</span>
					</div>
					<div class="caw-filportfolio-info">
						<div class="caw-filportfolio-info-icon">
							<a class="caw-filportfolio-popup" href="<?php echo esc_url($image_url); ?>">
								<i class="fa fa-plus"></i>
							</a>
							<?php if ($link){ ?>
							<a href="<?php echo esc_url($link); ?>">
								<i class="fa fa-eye"></i>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php return ob_get_clean();
	}
}