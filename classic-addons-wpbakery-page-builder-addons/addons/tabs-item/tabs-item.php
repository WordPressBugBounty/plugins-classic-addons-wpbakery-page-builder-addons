<?php
/**
 * Tab Item (child)
 *
 * Renders a single tab panel. Meant to live inside a caw_tabs_c container.
 * The tab nav button is rendered client-side from this panel's data
 * attributes so authors get full WP editor content via textarea_html.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Tabs extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'title'       => __( 'Tab', 'classic-addons' ),
			'icon'        => '',
			'is_default'  => '',
			'tab_id'      => '',
			'extra_class' => '',
			'cssbox'      => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-tabs';

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );

		$panel_id = $tab_id !== '' ? sanitize_html_class( $tab_id ) : 'caw-tab-panel-' . wp_unique_id();

		$panel_classes   = array();
		$panel_classes[] = 'caw-tab-panel';
		if ( $extra_class !== '' ) {
			$panel_classes[] = sanitize_html_class( $extra_class );
		}
		$panel_classes[] = $cssbox;

		// The nav button is rendered client-side via .html(), so strip any
		// script / dangerous attrs from the title before it hits the DOM.
		$safe_title = wp_kses_post( $title );

		$data_attrs   = array();
		$data_attrs[] = 'data-title="' . esc_attr( $safe_title ) . '"';
		if ( $icon !== '' ) {
			$data_attrs[] = 'data-icon="' . esc_attr( $icon ) . '"';
		}
		if ( $is_default === 'yes' ) {
			$data_attrs[] = 'data-default="yes"';
		}

		$content_html = wp_kses_post( wpb_js_remove_wpautop( $content, true ) );

		return sprintf(
			'<div id="%1$s" class="%2$s" role="tabpanel" %3$s>%4$s</div>',
			esc_attr( $panel_id ),
			esc_attr( cawpb_sanitize_html_classes( $panel_classes ) ),
			implode( ' ', $data_attrs ),
			$content_html
		);
	}
}
