<?php
/**
 * Filterable Portfolio Container
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Filterable_Portfolio_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'menu_items' => 'Basic,Premium,Pro,Extreme',
			'enable_all_btn' => 'enable',
			'cssbox' => '',
			'btn_color' => '',
			'extra_class' => '',
			'btn_bgclr' => '',
			'btn_hoverclr' => '',
			'btn_hover_bgclr' => '',			
			'btn_activeclr' => '',			
			'hover_img_bg_color' => '',			
			'hover_img_icons_color' => '',			
			'hover_img_btn_bgclr' => '',			
			'hover_img_icon_hover_color' => '',			
			'hover_img_btn_hover_bgclr' => '',			
		), $attrs ) );
		$addon_id = cawpb_get_unique_class('filportfolio');

		cawpb_icon_fonts_enqueue('fontawesome');
		wp_enqueue_style('caw-portfolio', CAWPB_URL.'/addons/filterable-portfolio/filterable-portfolio.css');
		wp_enqueue_style('caw-simple-grid', CAWPB_URL.'/css/simple-grid.css');
		wp_enqueue_style('caw-simplepopup-lib', CAWPB_URL.'/css/simple-lightbox.css');
		wp_enqueue_script('caw-mixitup-lib', CAWPB_URL.'/addons/filterable-portfolio/jquery.mixitup.min.js', array('jquery'));
		wp_enqueue_script('caw-simplepopup-lib', CAWPB_URL.'/js/simple-lightbox.js', array('jquery'));
		wp_enqueue_script('caw-filterable', CAWPB_URL.'/addons/filterable-portfolio/filterable-portfolio.js', array('jquery'));

		$cssbox  = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs);

		// Main Wrapper Classes
		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-'.$addon_id;
		$wrapper_classes[] = 'caw-filportfolio-wrapper';
		$wrapper_classes[] = 'wpb_content_element';
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $extra_class;
		$category_list = explode(",", $menu_items);

		ob_start(); ?>
		<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>">
			<div class="caw-filportfolio-navbar">
				<ul class="caw-filportfolio-filter caw-textcenter">
					<?php  
					if ($enable_all_btn == 'enable') {
						?>
						<li class="filter active" data-filter="all">
							<?php echo esc_html__( 'All', 'classic-addons' ); ?>
						</li>
						<?php
					}
					foreach ($category_list as $c_name => $c_val) {
						?>
						<li class="filter" data-filter=".<?php echo sanitize_key($c_val); ?>"><?php echo esc_attr( $c_val ); ?></li>
						<?php
					}
					?>
				</ul>
			</div>
			<div class="caw-filportfolio-content">
				<div class="row">
					<?php echo wp_kses_post(do_shortcode( $content )); ?>
				</div>
			</div>
			<style type="text/css">
				.caw-<?php echo esc_attr($addon_id); ?> ul.caw-filportfolio-filter li{
					color: <?php echo esc_attr($btn_color) ?>;
					background-color: <?php echo esc_attr($btn_bgclr) ?>;
				}
				.caw-<?php echo esc_attr($addon_id); ?> ul.caw-filportfolio-filter li:hover{
					color: <?php echo esc_attr($btn_hoverclr) ?>;
					background-color: <?php echo esc_attr($btn_hover_bgclr) ?>;
				}
				.caw-<?php echo esc_attr($addon_id); ?> ul.caw-filportfolio-filter li.filter.active{
					background: <?php echo esc_attr($btn_activeclr) ?>;
				}
				.caw-<?php echo esc_attr($addon_id); ?> .caw-filportfolio-img .caw-filterable-item::before{
					background-color: <?php echo esc_attr($hover_img_bg_color) ?> !important;
				}
				.caw-<?php echo esc_attr($addon_id); ?> .caw-filportfolio-info-icon i{
					color: <?php echo esc_attr($hover_img_icons_color) ?>!important;
					background-color: <?php echo esc_attr($hover_img_btn_bgclr) ?> !important;	
				}
				.caw-<?php echo esc_attr($addon_id); ?> .caw-filportfolio-info-icon i:hover{
					color: <?php echo esc_attr($hover_img_icon_hover_color) ?>!important;
					background-color: <?php echo esc_attr($hover_img_btn_hover_bgclr) ?> !important;	
				}
			</style>
		</div>	
		<?php return ob_get_clean();
	}
}