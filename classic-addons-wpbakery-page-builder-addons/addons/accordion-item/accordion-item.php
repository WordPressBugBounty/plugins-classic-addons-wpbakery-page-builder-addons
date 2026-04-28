<?php
/**
 * Accordion Item (child)
 *
 * Renders a single accordion panel. Meant to live inside a caw_accordion_c
 * container. Uses textarea_html so authors get the full WP editor.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Accordion extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'title'            => __( 'Accordion Item', 'classic-addons' ),
			'is_open'          => '',
			'expand_icon'      => '',
			'collapse_icon'    => '',
			'title_color'      => '',
			'title_bg_color'   => '',
			'content_color'    => '',
			'content_bg_color' => '',
			'extra_class'      => '',
			'cssbox'           => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-accordion';

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );

		$uid = 'caw-acc-item-' . wp_unique_id();

		$is_active = ( $is_open === 'yes' );

		$item_classes   = array();
		$item_classes[] = 'caw-accordion-item';
		if ( $is_active ) {
			$item_classes[] = 'is-active';
		}
		if ( $extra_class !== '' ) {
			$item_classes[] = sanitize_html_class( $extra_class );
		}
		$item_classes[] = $cssbox;

		// Per-item inline overrides, scoped by the item's unique ID.
		$istyle = '';
		if ( $title_color !== '' ) {
			$istyle .= "#{$uid} > .caw-accordion-title{color:" . esc_attr( $title_color ) . ";}";
		}
		if ( $title_bg_color !== '' ) {
			$istyle .= "#{$uid} > .caw-accordion-title{background-color:" . esc_attr( $title_bg_color ) . ";}";
		}
		if ( $content_color !== '' ) {
			$istyle .= "#{$uid} > .caw-accordion-content{color:" . esc_attr( $content_color ) . ";}";
		}
		if ( $content_bg_color !== '' ) {
			$istyle .= "#{$uid} > .caw-accordion-content{background-color:" . esc_attr( $content_bg_color ) . ";}";
		}
		if ( $istyle !== '' ) {
			wp_add_inline_style( $addon_handle, $istyle );
		}

		$icon_attrs = array();
		if ( $expand_icon !== '' ) {
			$icon_attrs[] = 'data-expand-icon="' . esc_attr( $expand_icon ) . '"';
		}
		if ( $collapse_icon !== '' ) {
			$icon_attrs[] = 'data-collapse-icon="' . esc_attr( $collapse_icon ) . '"';
		}

		$content_html = wp_kses_post( wpb_js_remove_wpautop( $content, true ) );

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>" class="<?php echo cawpb_sanitize_html_classes( $item_classes ); ?>" <?php echo implode( ' ', $icon_attrs ); ?>>
			<button type="button" class="caw-accordion-title" aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>">
				<span class="caw-accordion-title-text"><?php echo wp_kses_post( $title ); ?></span>
				<span class="caw-accordion-icon" aria-hidden="true"><i class=""></i></span>
			</button>
			<div class="caw-accordion-content"<?php echo $is_active ? '' : ' style="display:none;"'; ?>>
				<div class="caw-accordion-content-inner"><?php echo $content_html; ?></div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
