<?php
/**
 * Tabs Container (parent)
 *
 * Renders the tabs wrapper. The nav (tab buttons) is built on the client
 * from the child panels so each tab can keep the full WP editor content.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Tabs_C extends WPBakeryShortCodesContainer {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'style'              => 'line',
			'orientation'        => 'horizontal',
			'alignment'          => 'left',
			'show_icons'         => '',
			'auto_rotate'        => '',
			'rotate_speed'       => '5000',
			'title_color'        => '',
			'title_active_color' => '',
			'active_bg_color'    => '',
			'active_border'      => '',
			'content_color'      => '',
			'title_font_size'    => '',
			'content_font_size'  => '',
			'tab_padding'        => '',
			'content_padding'    => '',
			'cssbox'             => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-tabs';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/tabs/tabs.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/tabs/tabs.js', array( 'jquery' ), CAWPB_VERSION, true );
		cawpb_icon_fonts_enqueue( 'fontawesome' );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-tabs-' . wp_unique_id();

		$istyle = '';
		if ( $title_color !== '' ) {
			$istyle .= "#{$uid} .caw-tab-nav-item{color:" . esc_attr( $title_color ) . ";}";
		}
		if ( $title_active_color !== '' ) {
			$istyle .= "#{$uid} .caw-tab-nav-item.is-active{color:" . esc_attr( $title_active_color ) . ";}";
		}
		if ( $active_bg_color !== '' ) {
			$istyle .= "#{$uid} .caw-tab-nav-item.is-active{background-color:" . esc_attr( $active_bg_color ) . ";}";
		}
		if ( $active_border !== '' ) {
			$istyle .= "#{$uid}.caw-tabs-style-line .caw-tab-nav-item.is-active{border-color:" . esc_attr( $active_border ) . ";}";
			$istyle .= "#{$uid}.caw-tabs-style-line .caw-tab-nav-item.is-active::after{background-color:" . esc_attr( $active_border ) . ";}";
		}
		if ( $content_color !== '' ) {
			$istyle .= "#{$uid} .caw-tab-panel{color:" . esc_attr( $content_color ) . ";}";
		}
		if ( $title_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-tab-nav-item{font-size:" . esc_attr( $title_font_size ) . ";}";
		}
		if ( $content_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-tab-panel{font-size:" . esc_attr( $content_font_size ) . ";}";
		}
		if ( $tab_padding !== '' ) {
			$istyle .= "#{$uid} .caw-tab-nav-item{padding:" . esc_attr( $tab_padding ) . ";}";
		}
		if ( $content_padding !== '' ) {
			$istyle .= "#{$uid} .caw-tab-panel{padding:" . esc_attr( $content_padding ) . ";}";
		}
		if ( $istyle !== '' ) {
			wp_add_inline_style( $addon_handle, $istyle );
		}

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-tabs';
		$wrapper_classes[] = 'caw-tabs-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-tabs-orient-' . sanitize_html_class( $orientation );
		$wrapper_classes[] = 'caw-tabs-align-' . sanitize_html_class( $alignment );
		$wrapper_classes[] = $cssbox;

		$data_attrs   = array();
		$data_attrs[] = 'data-show-icons="' . ( $show_icons === 'yes' ? '1' : '0' ) . '"';
		$data_attrs[] = 'data-auto-rotate="' . ( $auto_rotate === 'yes' ? '1' : '0' ) . '"';
		$data_attrs[] = 'data-rotate-speed="' . esc_attr( max( 1000, (int) $rotate_speed ) ) . '"';

		$inner = do_shortcode( $content );
		if ( trim( $inner ) === '' ) {
			$inner = '<div class="caw-tab-panel is-active" data-title="' . esc_attr__( 'Tab 1', 'classic-addons' ) . '">' . esc_html__( 'Add tab items inside this element.', 'classic-addons' ) . '</div>';
		}

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>" class="<?php echo esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ); ?>" <?php echo implode( ' ', $data_attrs ); ?>>
			<div class="caw-tab-nav" role="tablist"></div>
			<div class="caw-tab-content"><?php echo $inner; ?></div>
		</div>
		<?php
		return ob_get_clean();
	}
}
