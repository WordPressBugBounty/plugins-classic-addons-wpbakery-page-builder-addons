<?php
/**
 * Pricing Table Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Pricing_Table extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'style'              => 'classic',
			'is_featured'        => '',
			// Header
			'title'              => 'Basic',
			'title_tag'          => 'h3',
			'subtitle'           => '',
			'media_type'         => 'none',
			'header_icon'        => '',
			'header_icon_color'  => '',
			'header_icon_size'   => '40px',
			'header_image'       => '',
			'header_bg'          => '',
			'title_color'        => '',
			'subtitle_color'     => '',
			'title_font_size'    => '',
			'subtitle_font_size' => '',
			// Pricing
			'currency'           => '$',
			'currency_position'  => 'before',
			'price'              => '29',
			'old_price'          => '',
			'period'             => '/mo',
			'on_sale'            => '',
			'sale_text'          => 'Sale',
			'price_color'        => '',
			'currency_color'     => '',
			'period_color'       => '',
			'price_font_size'    => '48px',
			// Features
			'features'           => '',
			'feature_divider'    => '',
			'feature_text_color' => '',
			'divider_color'      => '',
			// Footer
			'button_text'        => 'Choose Plan',
			'button_link'        => '',
			'footer_info'        => '',
			'btn_bg'             => '',
			'btn_color'          => '',
			'btn_bg_hover'       => '',
			'btn_color_hover'    => '',
			// Ribbon
			'ribbon_enable'      => '',
			'ribbon_text'        => 'Popular',
			'ribbon_style'       => 'corner',
			'ribbon_position'    => 'top-right',
			'ribbon_bg'          => '',
			'ribbon_color'       => '',
			// Box
			'box_bg'             => '',
			'box_border_color'   => '',
			'box_border_width'   => '',
			'box_radius'         => '10px',
			'box_shadow'         => 'light',
			'featured_accent'    => '',
			'cssbox'             => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-pricing-table';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/pricing-table/pricing-table.css', array(), CAWPB_VERSION );
		cawpb_icon_fonts_enqueue( 'fontawesome' );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-pt-' . wp_unique_id();

		// Sanitize title tag.
		$allowed_tags = array( 'h1','h2','h3','h4','h5','h6','div','span','p' );
		$title_tag    = in_array( strtolower( $title_tag ), $allowed_tags, true ) ? strtolower( $title_tag ) : 'h3';

		$style            = in_array( $style, array( 'classic', 'minimal', 'modern' ), true ) ? $style : 'classic';
		$box_shadow       = in_array( $box_shadow, array( 'none', 'light', 'medium', 'heavy' ), true ) ? $box_shadow : 'light';
		$ribbon_style     = in_array( $ribbon_style, array( 'corner', 'flag', 'stripe' ), true ) ? $ribbon_style : 'corner';
		$ribbon_position  = in_array( $ribbon_position, array( 'top-left', 'top-right' ), true ) ? $ribbon_position : 'top-right';
		$currency_position = $currency_position === 'after' ? 'after' : 'before';

		// Box inline style.
		$box_istyle = '';
		if ( $box_bg !== '' )           { $box_istyle .= 'background-color:' . $box_bg . ';'; }
		if ( $box_border_color !== '' ) { $box_istyle .= 'border-color:' . $box_border_color . ';'; }
		if ( $box_border_width !== '' ) { $box_istyle .= 'border-width:' . $box_border_width . ';border-style:solid;'; }
		if ( $box_radius !== '' )       { $box_istyle .= 'border-radius:' . $box_radius . ';'; }
		if ( $is_featured === 'yes' && $featured_accent !== '' ) {
			$box_istyle .= 'border-color:' . $featured_accent . ';';
		}

		// Header.
		$header_istyle = '';
		if ( $header_bg !== '' ) { $header_istyle .= 'background-color:' . $header_bg . ';'; }

		$title_istyle = '';
		if ( $title_color !== '' )     { $title_istyle .= 'color:' . $title_color . ';'; }
		if ( $title_font_size !== '' ) { $title_istyle .= 'font-size:' . $title_font_size . ';'; }

		$subtitle_istyle = '';
		if ( $subtitle_color !== '' )     { $subtitle_istyle .= 'color:' . $subtitle_color . ';'; }
		if ( $subtitle_font_size !== '' ) { $subtitle_istyle .= 'font-size:' . $subtitle_font_size . ';'; }

		$icon_istyle = '';
		if ( $header_icon_color !== '' ) { $icon_istyle .= 'color:' . $header_icon_color . ';'; }
		if ( $header_icon_size !== '' )  { $icon_istyle .= 'font-size:' . $header_icon_size . ';'; }

		// Pricing.
		$price_istyle = '';
		if ( $price_color !== '' )     { $price_istyle .= 'color:' . $price_color . ';'; }
		if ( $price_font_size !== '' ) { $price_istyle .= 'font-size:' . $price_font_size . ';'; }

		$currency_istyle = $currency_color !== '' ? 'color:' . $currency_color . ';' : '';
		$period_istyle   = $period_color !== ''   ? 'color:' . $period_color . ';'   : '';

		// Features.
		$decoded_features = array();
		if ( ! empty( $features ) ) {
			$raw = vc_param_group_parse_atts( $features );
			if ( is_array( $raw ) ) {
				$decoded_features = $raw;
			}
		}

		$feature_text_istyle = $feature_text_color !== '' ? 'color:' . $feature_text_color . ';' : '';
		$divider_istyle      = $divider_color !== ''      ? 'border-color:' . $divider_color . ';' : '';

		// Footer button.
		$link = vc_build_link( $button_link );
		$link_url    = isset( $link['url'] ) ? $link['url'] : '';
		$link_title  = isset( $link['title'] ) ? $link['title'] : '';
		$link_target = isset( $link['target'] ) && $link['target'] !== '' ? trim( $link['target'] ) : '_self';
		$link_rel    = isset( $link['rel'] ) && $link['rel'] !== '' ? trim( $link['rel'] ) : '';

		$btn_istyle = '';
		if ( $btn_bg !== '' )    { $btn_istyle .= 'background-color:' . $btn_bg . ';'; }
		if ( $btn_color !== '' ) { $btn_istyle .= 'color:' . $btn_color . ';'; }
		if ( $is_featured === 'yes' && $featured_accent !== '' && $btn_bg === '' ) {
			$btn_istyle .= 'background-color:' . $featured_accent . ';';
		}

		$btn_data_hover_bg    = $btn_bg_hover !== ''    ? $btn_bg_hover    : '';
		$btn_data_hover_color = $btn_color_hover !== '' ? $btn_color_hover : '';

		// Ribbon.
		$ribbon_istyle = '';
		if ( $ribbon_bg !== '' )    { $ribbon_istyle .= 'background-color:' . $ribbon_bg . ';'; }
		if ( $ribbon_color !== '' ) { $ribbon_istyle .= 'color:' . $ribbon_color . ';'; }

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-pricing-table';
		$wrapper_classes[] = 'caw-pt-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-pt-shadow-' . sanitize_html_class( $box_shadow );
		if ( $is_featured === 'yes' ) { $wrapper_classes[] = 'caw-pt-featured'; }
		if ( $feature_divider === 'yes' ) { $wrapper_classes[] = 'caw-pt-has-divider'; }
		if ( $ribbon_enable === 'yes' ) {
			$wrapper_classes[] = 'caw-pt-has-ribbon';
			$wrapper_classes[] = 'caw-pt-ribbon-' . sanitize_html_class( $ribbon_style );
			$wrapper_classes[] = 'caw-pt-ribbon-' . sanitize_html_class( $ribbon_position );
		}
		$wrapper_classes[] = $cssbox;

		// Allowed HTML for feature text.
		$feature_html_allow = array(
			'strong' => array(), 'em' => array(), 'b' => array(), 'i' => array(),
			'br' => array(), 'span' => array( 'class' => true ), 'small' => array(),
		);

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ); ?>"
			style="<?php echo esc_attr( $box_istyle ); ?>">

			<?php if ( $ribbon_enable === 'yes' && $ribbon_text !== '' ) : ?>
				<div class="caw-pt-ribbon" style="<?php echo esc_attr( $ribbon_istyle ); ?>">
					<span class="caw-pt-ribbon-text"><?php echo esc_html( $ribbon_text ); ?></span>
				</div>
			<?php endif; ?>

			<div class="caw-pt-header" style="<?php echo esc_attr( $header_istyle ); ?>">
				<?php if ( $media_type === 'icon' && $header_icon !== '' ) : ?>
					<div class="caw-pt-header-icon">
						<i class="<?php echo esc_attr( $header_icon ); ?>" style="<?php echo esc_attr( $icon_istyle ); ?>" aria-hidden="true"></i>
					</div>
				<?php elseif ( $media_type === 'image' && $header_image !== '' ) :
					$img = cawpb_get_image_by_size( array(
						'attach_id'  => $header_image,
						'thumb_size' => 'medium',
						'class'      => 'caw-pt-header-image',
					) );
					if ( is_array( $img ) && ! empty( $img['thumbnail'] ) ) : ?>
					<div class="caw-pt-header-img-wrap"><?php echo wp_kses_post( $img['thumbnail'] ); ?></div>
				<?php endif; endif; ?>

				<<?php echo esc_html( $title_tag ); ?> class="caw-pt-title" style="<?php echo esc_attr( $title_istyle ); ?>"><?php echo esc_html( $title ); ?></<?php echo esc_html( $title_tag ); ?>>

				<?php if ( $subtitle !== '' ) : ?>
					<div class="caw-pt-subtitle" style="<?php echo esc_attr( $subtitle_istyle ); ?>"><?php echo wp_kses_post( $subtitle ); ?></div>
				<?php endif; ?>
			</div>

			<div class="caw-pt-pricing">
				<?php if ( $on_sale === 'yes' && $sale_text !== '' ) : ?>
					<span class="caw-pt-sale-badge"><?php echo esc_html( $sale_text ); ?></span>
				<?php endif; ?>

				<?php if ( $old_price !== '' ) : ?>
					<div class="caw-pt-old-price"><del><?php echo esc_html( $old_price ); ?></del></div>
				<?php endif; ?>

				<div class="caw-pt-price-row" style="<?php echo esc_attr( $price_istyle ); ?>">
					<?php if ( $currency_position === 'before' && $currency !== '' ) : ?>
						<span class="caw-pt-currency" style="<?php echo esc_attr( $currency_istyle ); ?>"><?php echo esc_html( $currency ); ?></span>
					<?php endif; ?>
					<span class="caw-pt-price"><?php echo esc_html( $price ); ?></span>
					<?php if ( $currency_position === 'after' && $currency !== '' ) : ?>
						<span class="caw-pt-currency" style="<?php echo esc_attr( $currency_istyle ); ?>"><?php echo esc_html( $currency ); ?></span>
					<?php endif; ?>
					<?php if ( $period !== '' ) : ?>
						<span class="caw-pt-period" style="<?php echo esc_attr( $period_istyle ); ?>"><?php echo esc_html( $period ); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( ! empty( $decoded_features ) ) : ?>
				<ul class="caw-pt-features" style="<?php echo esc_attr( $divider_istyle ); ?>">
					<?php foreach ( $decoded_features as $feature ) :
						$ftext     = isset( $feature['text'] ) ? $feature['text'] : '';
						$ficon     = isset( $feature['icon'] ) ? $feature['icon'] : 'fas fa-check';
						$fcolor    = isset( $feature['icon_color'] ) ? $feature['icon_color'] : '';
						$fexcluded = isset( $feature['excluded'] ) && $feature['excluded'] === 'yes';

						$display_icon = $fexcluded ? 'fas fa-times' : $ficon;
						$icon_inline  = $fcolor !== '' ? 'color:' . $fcolor . ';' : '';
						$li_classes   = array( 'caw-pt-feature' );
						if ( $fexcluded ) { $li_classes[] = 'caw-pt-excluded'; }
						?>
						<li class="<?php echo esc_attr( cawpb_sanitize_html_classes( $li_classes ) ); ?>">
							<i class="caw-pt-feature-icon <?php echo esc_attr( $display_icon ); ?>" style="<?php echo esc_attr( $icon_inline ); ?>" aria-hidden="true"></i>
							<span class="caw-pt-feature-text" style="<?php echo esc_attr( $feature_text_istyle ); ?>"><?php echo wp_kses( $ftext, $feature_html_allow ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $button_text !== '' && $link_url !== '' ) : ?>
				<div class="caw-pt-footer">
					<a class="caw-pt-button"
						href="<?php echo esc_url( $link_url ); ?>"
						<?php if ( $link_title !== '' ) : ?>title="<?php echo esc_attr( $link_title ); ?>"<?php endif; ?>
						target="<?php echo esc_attr( $link_target ); ?>"
						<?php if ( $link_rel !== '' ) : ?>rel="<?php echo esc_attr( $link_rel ); ?>"<?php endif; ?>
						style="<?php echo esc_attr( $btn_istyle ); ?>"
						data-hover-bg="<?php echo esc_attr( $btn_data_hover_bg ); ?>"
						data-hover-color="<?php echo esc_attr( $btn_data_hover_color ); ?>">
						<?php echo esc_html( $button_text ); ?>
					</a>
					<?php if ( $footer_info !== '' ) : ?>
						<div class="caw-pt-footer-info"><?php echo esc_html( $footer_info ); ?></div>
					<?php endif; ?>
				</div>
			<?php elseif ( $button_text !== '' ) : ?>
				<div class="caw-pt-footer">
					<span class="caw-pt-button caw-pt-button-static" style="<?php echo esc_attr( $btn_istyle ); ?>"><?php echo esc_html( $button_text ); ?></span>
					<?php if ( $footer_info !== '' ) : ?>
						<div class="caw-pt-footer-info"><?php echo esc_html( $footer_info ); ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $btn_data_hover_bg !== '' || $btn_data_hover_color !== '' ) :
			$safe_hover_bg    = $this->sanitize_css_color( $btn_data_hover_bg );
			$safe_hover_color = $this->sanitize_css_color( $btn_data_hover_color );
			if ( $safe_hover_bg !== '' || $safe_hover_color !== '' ) : ?>
			<style>
				#<?php echo esc_html( $uid ); ?> .caw-pt-button:hover {
					<?php if ( $safe_hover_bg !== '' ) : ?>background-color: <?php echo esc_html( $safe_hover_bg ); ?> !important;<?php endif; ?>
					<?php if ( $safe_hover_color !== '' ) : ?>color: <?php echo esc_html( $safe_hover_color ); ?> !important;<?php endif; ?>
				}
			</style>
		<?php endif; endif; ?>
		<?php
		return ob_get_clean();
	}

	/**
	 * Strictly validate a user-supplied CSS color string.
	 * Returns empty string for anything that doesn't match the safe patterns.
	 */
	private function sanitize_css_color( $val ) {
		$val = trim( (string) $val );
		if ( $val === '' ) {
			return '';
		}
		if ( preg_match( '/^#(?:[0-9a-fA-F]{3,4}|[0-9a-fA-F]{6}|[0-9a-fA-F]{8})$/', $val ) ) {
			return $val;
		}
		if ( preg_match( '/^(?:rgb|rgba|hsl|hsla)\(\s*[0-9.,\s%\/]+\s*\)$/i', $val ) ) {
			return $val;
		}
		if ( preg_match( '/^[a-zA-Z]{1,30}$/', $val ) ) {
			return $val;
		}
		return '';
	}
}
