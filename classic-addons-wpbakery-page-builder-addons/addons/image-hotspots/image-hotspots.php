<?php
/**
 * Image Hotspots Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Image_Hotspots extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'image'                => '',
			'img_size'             => 'full',
			'overlay_color'        => '',
			'overlay_opacity'      => '0',
			'max_width'            => '',
			'markers'              => '',
			// Marker style
			'marker_size'          => '32px',
			'marker_icon_size'     => '14px',
			'marker_color'         => '#ffffff',
			'marker_bg'            => '#0073aa',
			'marker_border_color'  => '',
			'marker_border_width'  => '',
			'marker_radius'        => '50%',
			'marker_shadow'        => 'light',
			'marker_pulse'         => 'yes',
			// Tooltip
			'tip_bg'               => '#222222',
			'tip_color'            => '#ffffff',
			'tip_font_size'        => '13px',
			'tip_heading_size'     => '15px',
			'tip_min_width'        => '160px',
			'tip_max_width'        => '260px',
			'tip_padding'          => '10px 14px',
			'tip_radius'           => '6px',
			'tip_shadow'           => 'medium',
			'tip_arrow'            => 'yes',
			'tip_animation'        => 'fade',
			'cssbox'               => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-image-hotspots';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/image-hotspots/image-hotspots.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/image-hotspots/image-hotspots.js', array(), CAWPB_VERSION, true );
		cawpb_icon_fonts_enqueue( 'fontawesome' );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-hs-' . wp_unique_id();

		if ( empty( $image ) ) {
			ob_start(); ?>
			<div class="caw-image-hotspots caw-image-hotspots-empty">
				<p><?php echo esc_html__( 'Please select a base image.', 'classic-addons-wpbakery-page-builder' ); ?></p>
			</div>
			<?php
			return ob_get_clean();
		}

		$img = cawpb_get_image_by_size( array(
			'attach_id'  => $image,
			'thumb_size' => $img_size,
			'class'      => 'caw-hs-image',
		) );
		$img_html = ( is_array( $img ) && ! empty( $img['thumbnail'] ) ) ? $img['thumbnail'] : '';

		if ( $img_html === '' ) {
			ob_start(); ?>
			<div class="caw-image-hotspots caw-image-hotspots-empty">
				<p><?php echo esc_html__( 'Selected base image is no longer available.', 'classic-addons-wpbakery-page-builder' ); ?></p>
			</div>
			<?php
			return ob_get_clean();
		}

		// Decode markers.
		$decoded_markers = array();
		if ( ! empty( $markers ) ) {
			$raw = vc_param_group_parse_atts( $markers );
			if ( is_array( $raw ) ) {
				$decoded_markers = $raw;
			}
		}

		// Sanitize choices.
		$marker_shadow = in_array( $marker_shadow, array( 'none', 'light', 'medium', 'heavy' ), true ) ? $marker_shadow : 'light';
		$tip_shadow    = in_array( $tip_shadow,    array( 'none', 'light', 'medium', 'heavy' ), true ) ? $tip_shadow    : 'medium';
		$tip_animation = in_array( $tip_animation, array( 'fade', 'slide', 'none' ), true ) ? $tip_animation : 'fade';

		$opacity = (float) $overlay_opacity;
		if ( $opacity < 0 ) { $opacity = 0; }
		if ( $opacity > 1 ) { $opacity = 1; }

		$wrap_istyle = '';
		if ( $max_width !== '' ) { $wrap_istyle .= 'max-width:' . $max_width . ';'; }

		$overlay_istyle = '';
		if ( $overlay_color !== '' && $opacity > 0 ) {
			$overlay_istyle .= 'background-color:' . $overlay_color . ';opacity:' . $opacity . ';';
		}

		// Build marker style string (applied to every marker via inline style).
		$marker_istyle = '';
		if ( $marker_size !== '' )         { $marker_istyle .= 'width:' . $marker_size . ';height:' . $marker_size . ';'; }
		if ( $marker_bg !== '' )           { $marker_istyle .= 'background-color:' . $marker_bg . ';'; }
		if ( $marker_color !== '' )        { $marker_istyle .= 'color:' . $marker_color . ';'; }
		if ( $marker_radius !== '' )       { $marker_istyle .= 'border-radius:' . $marker_radius . ';'; }
		if ( $marker_border_color !== '' && $marker_border_width !== '' ) {
			$marker_istyle .= 'border:' . $marker_border_width . ' solid ' . $marker_border_color . ';';
		}

		$marker_icon_istyle = $marker_icon_size !== '' ? 'font-size:' . $marker_icon_size . ';' : '';

		// Build tooltip style (applied to every tooltip).
		$tip_istyle = '';
		if ( $tip_bg !== '' )        { $tip_istyle .= 'background-color:' . $tip_bg . ';'; }
		if ( $tip_color !== '' )     { $tip_istyle .= 'color:' . $tip_color . ';'; }
		if ( $tip_font_size !== '' ) { $tip_istyle .= 'font-size:' . $tip_font_size . ';'; }
		if ( $tip_min_width !== '' ) { $tip_istyle .= 'min-width:' . $tip_min_width . ';'; }
		if ( $tip_max_width !== '' ) { $tip_istyle .= 'max-width:' . $tip_max_width . ';'; }
		if ( $tip_padding !== '' )   { $tip_istyle .= 'padding:' . $tip_padding . ';'; }
		if ( $tip_radius !== '' )    { $tip_istyle .= 'border-radius:' . $tip_radius . ';'; }

		// Use tooltip bg for the arrow.
		$arrow_istyle = $tip_bg !== '' ? 'background-color:' . $tip_bg . ';' : '';

		$tip_heading_istyle = $tip_heading_size !== '' ? 'font-size:' . $tip_heading_size . ';' : '';

		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-image-hotspots';
		$wrapper_classes[] = 'caw-hs-marker-shadow-' . sanitize_html_class( $marker_shadow );
		$wrapper_classes[] = 'caw-hs-tip-shadow-' . sanitize_html_class( $tip_shadow );
		$wrapper_classes[] = 'caw-hs-anim-' . sanitize_html_class( $tip_animation );
		if ( $marker_pulse === 'yes' ) { $wrapper_classes[] = 'caw-hs-pulse'; }
		if ( $tip_arrow === 'yes' )    { $wrapper_classes[] = 'caw-hs-has-arrow'; }
		$wrapper_classes[] = $cssbox;

		// Allowed HTML for tooltip description.
		$tip_html_allow = array(
			'a'      => array( 'href' => true, 'title' => true, 'target' => true, 'rel' => true ),
			'strong' => array(), 'em' => array(), 'b' => array(), 'i' => array(),
			'br'     => array(),
			'p'      => array(),
			'ul'     => array(), 'ol' => array(), 'li' => array(),
			'span'   => array( 'class' => true ),
			'small'  => array(),
		);

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ); ?>"
			style="<?php echo esc_attr( $wrap_istyle ); ?>">
			<div class="caw-hs-frame">
				<div class="caw-hs-image-wrap"><?php echo wp_kses_post( $img_html ); ?></div>

				<?php if ( $overlay_istyle !== '' ) : ?>
					<div class="caw-hs-overlay" style="<?php echo esc_attr( $overlay_istyle ); ?>" aria-hidden="true"></div>
				<?php endif; ?>

				<?php foreach ( $decoded_markers as $idx => $marker ) :
					$mx        = isset( $marker['pos_x'] ) ? (float) $marker['pos_x'] : 50;
					$my        = isset( $marker['pos_y'] ) ? (float) $marker['pos_y'] : 50;
					$mx        = max( 0, min( 100, $mx ) );
					$my        = max( 0, min( 100, $my ) );

					$mtype     = isset( $marker['marker_type'] ) ? $marker['marker_type'] : 'icon';
					$mtype     = in_array( $mtype, array( 'icon', 'text', 'image' ), true ) ? $mtype : 'icon';

					$micon     = isset( $marker['icon'] ) ? $marker['icon'] : 'fas fa-plus';
					$mtext     = isset( $marker['text'] ) ? $marker['text'] : '';
					$mimage    = isset( $marker['image'] ) ? $marker['image'] : '';

					$mtrigger  = isset( $marker['trigger'] ) && $marker['trigger'] === 'click' ? 'click' : 'hover';
					$mtip_pos  = isset( $marker['tooltip_pos'] ) ? $marker['tooltip_pos'] : 'top';
					$mtip_pos  = in_array( $mtip_pos, array( 'top', 'bottom', 'left', 'right' ), true ) ? $mtip_pos : 'top';

					$mhead     = isset( $marker['tooltip_heading'] ) ? $marker['tooltip_heading'] : '';
					$mdesc_raw = isset( $marker['tooltip_desc'] ) ? $marker['tooltip_desc'] : '';
					$mdesc     = rawurldecode( base64_decode( $mdesc_raw ) );

					$mopen     = isset( $marker['open_default'] ) && $marker['open_default'] === 'yes';
					$mlink_raw = isset( $marker['link'] ) ? $marker['link'] : '';

					$mlink         = vc_build_link( $mlink_raw );
					$mlink_url     = isset( $mlink['url'] ) ? $mlink['url'] : '';
					$mlink_target  = isset( $mlink['target'] ) && $mlink['target'] !== '' ? trim( $mlink['target'] ) : '_self';
					$mlink_rel     = isset( $mlink['rel'] ) && $mlink['rel'] !== '' ? trim( $mlink['rel'] ) : '';

					$pos_style = 'left:' . $mx . '%;top:' . $my . '%;';

					$marker_classes = array(
						'caw-hs-marker',
						'caw-hs-marker-' . $mtype,
						'caw-hs-trigger-' . $mtrigger,
						'caw-hs-tip-pos-' . $mtip_pos,
					);
					if ( $mopen )           { $marker_classes[] = 'caw-hs-open-default'; }
					if ( $mlink_url !== '' ) { $marker_classes[] = 'caw-hs-has-link'; }

					$has_tooltip = ( $mhead !== '' || $mdesc !== '' );
					/* translators: %d: hotspot number */
					$marker_label = $mhead !== '' ? $mhead : sprintf( __( 'Hotspot %d', 'classic-addons-wpbakery-page-builder' ), $idx + 1 );
					?>
					<div class="<?php echo esc_attr( cawpb_sanitize_html_classes( $marker_classes ) ); ?>"
						style="<?php echo esc_attr( $pos_style ); ?>"
						data-trigger="<?php echo esc_attr( $mtrigger ); ?>"
						<?php if ( $mopen ) : ?>data-open-default="1"<?php endif; ?>>
						<?php
						// Allow-listed literal: 'a' when linked, 'button' otherwise.
						$marker_inner_tag = $mlink_url !== '' ? 'a' : 'button';
						?>
						<<?php echo esc_html( $marker_inner_tag ); ?> class="caw-hs-marker-inner"
							style="<?php echo esc_attr( $marker_istyle ); ?>"
							aria-label="<?php echo esc_attr( $marker_label ); ?>"
							<?php if ( $has_tooltip ) : ?>aria-haspopup="true" aria-expanded="false"<?php endif; ?>
							<?php if ( $mlink_url !== '' ) : ?>
								href="<?php echo esc_url( $mlink_url ); ?>" target="<?php echo esc_attr( $mlink_target ); ?>"
								<?php if ( $mlink_rel !== '' ) : ?>rel="<?php echo esc_attr( $mlink_rel ); ?>"<?php endif; ?>
							<?php else : ?>
								type="button"
							<?php endif; ?>>
							<?php if ( $mtype === 'icon' ) : ?>
								<i class="<?php echo esc_attr( $micon ); ?>" style="<?php echo esc_attr( $marker_icon_istyle ); ?>" aria-hidden="true"></i>
							<?php elseif ( $mtype === 'text' ) : ?>
								<span class="caw-hs-marker-text"><?php echo esc_html( $mtext ); ?></span>
							<?php elseif ( $mtype === 'image' && $mimage !== '' ) :
								$marker_img = cawpb_get_image_by_size( array(
									'attach_id'  => $mimage,
									'thumb_size' => 'thumbnail',
									'class'      => 'caw-hs-marker-image',
								) );
								if ( is_array( $marker_img ) && ! empty( $marker_img['thumbnail'] ) ) {
									echo wp_kses_post( $marker_img['thumbnail'] );
								}
							endif; ?>
							<?php if ( $marker_pulse === 'yes' ) : ?>
								<span class="caw-hs-marker-pulse" aria-hidden="true"></span>
							<?php endif; ?>
						</<?php echo esc_html( $marker_inner_tag ); ?>>

						<?php if ( $has_tooltip ) : ?>
							<div class="caw-hs-tooltip" role="tooltip" style="<?php echo esc_attr( $tip_istyle ); ?>">
								<?php if ( $mhead !== '' ) : ?>
									<div class="caw-hs-tooltip-heading" style="<?php echo esc_attr( $tip_heading_istyle ); ?>"><?php echo esc_html( $mhead ); ?></div>
								<?php endif; ?>
								<?php if ( $mdesc !== '' ) : ?>
									<div class="caw-hs-tooltip-desc"><?php echo wp_kses( $mdesc, $tip_html_allow ); ?></div>
								<?php endif; ?>
								<?php if ( $tip_arrow === 'yes' ) : ?>
									<span class="caw-hs-tooltip-arrow" style="<?php echo esc_attr( $arrow_istyle ); ?>" aria-hidden="true"></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
