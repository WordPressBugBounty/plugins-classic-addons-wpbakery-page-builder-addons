<?php
/**
 * Accordion Container (parent)
 *
 * Renders a wrapper that holds one or more accordion items. Each item is its
 * own shortcode (caw_accordion), which lets authors use the full WP editor
 * for item content.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Accordion_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'style'                 => 'modern',
			'icon_position'         => 'right',
			'expand_icon'           => 'fa fa-plus',
			'collapse_icon'         => 'fa fa-minus',
			'allow_multiple'        => '',
			'close_others'          => 'yes',
			'title_color'           => '',
			'title_bg_color'        => '',
			'title_active_color'    => '',
			'title_active_bg_color' => '',
			'content_color'         => '',
			'content_bg_color'      => '',
			'border_color'          => '',
			'icon_color'            => '',
			'title_font_size'       => '',
			'content_font_size'     => '',
			'border_radius'         => '',
			'spacing'               => '',
			'cssbox'                => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-accordion';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/accordion/accordion.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/accordion/accordion.js', array( 'jquery' ), CAWPB_VERSION, true );
		cawpb_icon_fonts_enqueue( 'fontawesome' );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );

		$uid = 'caw-acc-' . wp_unique_id();

		$istyle = '';
		if ( $title_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-title{color:" . esc_attr( $title_color ) . ";}";
		}
		if ( $title_bg_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-title{background-color:" . esc_attr( $title_bg_color ) . ";}";
		}
		if ( $title_active_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-item.is-active > .caw-accordion-title{color:" . esc_attr( $title_active_color ) . ";}";
		}
		if ( $title_active_bg_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-item.is-active > .caw-accordion-title{background-color:" . esc_attr( $title_active_bg_color ) . ";}";
		}
		if ( $content_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-content{color:" . esc_attr( $content_color ) . ";}";
		}
		if ( $content_bg_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-content{background-color:" . esc_attr( $content_bg_color ) . ";}";
		}
		if ( $border_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-item{border-color:" . esc_attr( $border_color ) . ";}";
		}
		if ( $icon_color !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-icon{color:" . esc_attr( $icon_color ) . ";}";
		}
		if ( $title_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-title{font-size:" . esc_attr( $title_font_size ) . ";}";
		}
		if ( $content_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-content-inner{font-size:" . esc_attr( $content_font_size ) . ";}";
		}
		if ( $border_radius !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-item{border-radius:" . esc_attr( $border_radius ) . ";overflow:hidden;}";
		}
		if ( $spacing !== '' ) {
			$istyle .= "#{$uid} .caw-accordion-item + .caw-accordion-item{margin-top:" . esc_attr( $spacing ) . ";}";
		}
		if ( $istyle !== '' ) {
			wp_add_inline_style( $addon_handle, $istyle );
		}

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-accordion';
		$wrapper_classes[] = 'caw-accordion-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-accordion-icon-' . sanitize_html_class( $icon_position );
		$wrapper_classes[] = $cssbox;

		$data_attrs = array(
			'data-close-others="' . ( $close_others === 'yes' ? '1' : '0' ) . '"',
			'data-allow-multiple="' . ( $allow_multiple === 'yes' ? '1' : '0' ) . '"',
			'data-expand-icon="' . esc_attr( $expand_icon ) . '"',
			'data-collapse-icon="' . esc_attr( $collapse_icon ) . '"',
		);

		$inner = do_shortcode( $content );

		// Fallback if the editor has an empty container
		if ( trim( $inner ) === '' ) {
			$inner = '<p><em>' . esc_html__( 'Add accordion items inside this element.', 'classic-addons' ) . '</em></p>';
		}

		return sprintf(
			'<div id="%1$s" class="%2$s" %3$s>%4$s</div>',
			esc_attr( $uid ),
			esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ),
			implode( ' ', $data_attrs ),
			$inner
		);
	}
}
