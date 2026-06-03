<?php
/**
 * Countdown Timer Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Countdown_Timer extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'target_datetime'    => '',
			'timezone_mode'      => 'site',
			'style'              => 'boxed',
			'alignment'          => 'center',
			'show_separator'     => '',
			'show_days'          => 'yes',
			'show_hours'         => 'yes',
			'show_minutes'       => 'yes',
			'show_seconds'       => 'yes',
			'label_days'         => 'Days',
			'label_hours'        => 'Hours',
			'label_minutes'      => 'Minutes',
			'label_seconds'      => 'Seconds',
			'expiry_action'      => 'message',
			'expiry_message'     => '',
			'number_color'       => '',
			'label_color'        => '',
			'box_bg'             => '',
			'box_border_color'   => '',
			'separator_color'    => '',
			'number_font_size'   => '',
			'number_font_weight' => '',
			'label_font_size'    => '',
			'label_font_weight'  => '',
			'box_size'           => '',
			'unit_gap'           => '16px',
			'box_radius'         => '',
			'box_border_width'   => '',
			'cssbox'             => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-countdown-timer';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/countdown-timer/countdown-timer.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/countdown-timer/countdown-timer.js', array(), CAWPB_VERSION, true );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-ct-' . wp_unique_id();

		// Resolve target timestamp (server-side, sanitized).
		$target_ts = $this->resolve_target_timestamp( $target_datetime, $timezone_mode );

		// Build inline styles.
		$num_style = '';
		if ( $number_color !== '' )       { $num_style .= 'color:' . $number_color . ';'; }
		if ( $number_font_size !== '' )   { $num_style .= 'font-size:' . $number_font_size . ';'; }
		if ( $number_font_weight !== '' ) { $num_style .= 'font-weight:' . $number_font_weight . ';'; }

		$lbl_style = '';
		if ( $label_color !== '' )       { $lbl_style .= 'color:' . $label_color . ';'; }
		if ( $label_font_size !== '' )   { $lbl_style .= 'font-size:' . $label_font_size . ';'; }
		if ( $label_font_weight !== '' ) { $lbl_style .= 'font-weight:' . $label_font_weight . ';'; }

		$box_style = '';
		if ( $box_bg !== '' )           { $box_style .= 'background-color:' . $box_bg . ';'; }
		if ( $box_size !== '' )         { $box_style .= 'min-width:' . $box_size . ';'; }
		if ( $box_radius !== '' )       { $box_style .= 'border-radius:' . $box_radius . ';'; }
		if ( $box_border_color !== '' ) { $box_style .= 'border-color:' . $box_border_color . ';'; }
		if ( $box_border_width !== '' ) { $box_style .= 'border-width:' . $box_border_width . ';border-style:solid;'; }

		$wrap_style = '';
		if ( $unit_gap !== '' ) { $wrap_style .= 'gap:' . $unit_gap . ';'; }

		$sep_style = '';
		if ( $separator_color !== '' ) { $sep_style .= 'color:' . $separator_color . ';'; }

		// Wrapper classes.
		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-countdown';
		$wrapper_classes[] = 'caw-countdown-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-countdown-align-' . sanitize_html_class( $alignment );
		if ( $show_separator === 'yes' ) { $wrapper_classes[] = 'caw-countdown-has-sep'; }
		$wrapper_classes[] = $cssbox;

		$units = array(
			'days'    => array( 'flag' => $show_days,    'label' => $label_days ),
			'hours'   => array( 'flag' => $show_hours,   'label' => $label_hours ),
			'minutes' => array( 'flag' => $show_minutes, 'label' => $label_minutes ),
			'seconds' => array( 'flag' => $show_seconds, 'label' => $label_seconds ),
		);

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo cawpb_sanitize_html_classes( $wrapper_classes ); ?>"
			style="<?php echo esc_attr( $wrap_style ); ?>"
			data-target="<?php echo esc_attr( $target_ts ); ?>"
			data-expiry-action="<?php echo esc_attr( $expiry_action ); ?>"
			role="timer"
			aria-live="polite">
			<div class="caw-countdown-units">
				<?php
				$visible_keys = array();
				foreach ( $units as $key => $data ) {
					if ( $data['flag'] === 'yes' ) {
						$visible_keys[] = $key;
					}
				}
				$last_index = count( $visible_keys ) - 1;
				foreach ( $visible_keys as $idx => $key ) :
					$label = $units[ $key ]['label'];
					?>
					<div class="caw-countdown-unit caw-countdown-unit-<?php echo esc_attr( $key ); ?>" data-unit="<?php echo esc_attr( $key ); ?>" style="<?php echo esc_attr( $box_style ); ?>">
						<span class="caw-countdown-number" style="<?php echo esc_attr( $num_style ); ?>" data-caw-value>--</span>
						<span class="caw-countdown-label" style="<?php echo esc_attr( $lbl_style ); ?>"><?php echo esc_html( $label ); ?></span>
					</div>
					<?php if ( $show_separator === 'yes' && $idx < $last_index ) : ?>
						<span class="caw-countdown-separator" aria-hidden="true" style="<?php echo esc_attr( $sep_style ); ?>">:</span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php if ( $expiry_action === 'message' && $expiry_message !== '' ) : ?>
				<div class="caw-countdown-expired-message" hidden><?php echo wp_kses_post( $expiry_message ); ?></div>
			<?php endif; ?>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Resolve user-entered date into a UTC millisecond timestamp for the JS.
	 * Returns 0 when input is invalid (JS treats that as already-expired).
	 */
	private function resolve_target_timestamp( $datetime_string, $mode ) {

		$datetime_string = trim( (string) $datetime_string );
		if ( $datetime_string === '' ) {
			return 0;
		}

		try {
			if ( $mode === 'local' ) {
				// Hand the parsed wall-clock back to the JS as components
				// so the visitor's browser interprets it in their local zone.
				$tmp = new DateTime( $datetime_string, new DateTimeZone( 'UTC' ) );
				return 'local:' . $tmp->format( 'Y-m-d\TH:i:s' );
			}

			if ( $mode === 'utc' ) {
				$tz = new DateTimeZone( 'UTC' );
			} else {
				$tz = wp_timezone();
			}

			$dt = new DateTime( $datetime_string, $tz );
			return (int) $dt->getTimestamp() * 1000;

		} catch ( Exception $e ) {
			return 0;
		}
	}
}
