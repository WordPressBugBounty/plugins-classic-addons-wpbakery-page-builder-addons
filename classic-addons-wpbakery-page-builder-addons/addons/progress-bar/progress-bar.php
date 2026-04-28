<?php
/**
 * Progress Bar Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Progress_Bar extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'style'             => 'default',
			'label'             => 'Skill',
			'value'             => '75',
			'max'               => '100',
			'unit'              => '%',
			'show_label'        => 'yes',
			'show_value'        => 'yes',
			'value_position'    => 'inline',
			'label_color'       => '',
			'value_color'       => '',
			'bar_color'         => '',
			'bar_bg_color'      => '',
			'bar_gradient'      => '',
			'gradient_from'     => '',
			'gradient_to'       => '',
			'bar_height'        => '10px',
			'border_radius'     => '999px',
			'animation'         => 'yes',
			'animation_speed'   => '1500',
			'striped'           => '',
			'animated_stripes'  => '',
			'label_font_size'   => '',
			'value_font_size'   => '',
			'cssbox'            => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-progress-bar';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/progress-bar/progress-bar.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/progress-bar/progress-bar.js', array( 'jquery' ), CAWPB_VERSION, true );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-pb-' . wp_unique_id();

		$max_val   = max( 1, (float) $max );
		$value_num = max( 0, min( (float) $value, $max_val ) );
		$percent   = ( $value_num / $max_val ) * 100;

		$bar_istyle = '';
		if ( $bar_gradient === 'yes' && $gradient_from !== '' && $gradient_to !== '' ) {
			$bar_istyle .= 'background: linear-gradient(90deg,' . esc_attr( $gradient_from ) . ',' . esc_attr( $gradient_to ) . ');';
		} elseif ( $bar_color !== '' ) {
			$bar_istyle .= 'background-color:' . esc_attr( $bar_color ) . ';';
		}
		$bar_istyle .= 'width:0;';
		$bar_istyle .= 'border-radius:' . esc_attr( $border_radius ) . ';';

		$track_istyle = '';
		if ( $bar_bg_color !== '' ) {
			$track_istyle .= 'background-color:' . esc_attr( $bar_bg_color ) . ';';
		}
		$track_istyle .= 'height:' . esc_attr( $bar_height ) . ';';
		$track_istyle .= 'border-radius:' . esc_attr( $border_radius ) . ';';

		$label_istyle = '';
		if ( $label_color !== '' ) {
			$label_istyle .= 'color:' . esc_attr( $label_color ) . ';';
		}
		if ( $label_font_size !== '' ) {
			$label_istyle .= 'font-size:' . esc_attr( $label_font_size ) . ';';
		}
		$value_istyle = '';
		if ( $value_color !== '' ) {
			$value_istyle .= 'color:' . esc_attr( $value_color ) . ';';
		}
		if ( $value_font_size !== '' ) {
			$value_istyle .= 'font-size:' . esc_attr( $value_font_size ) . ';';
		}

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-progress-bar';
		$wrapper_classes[] = 'caw-progress-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-progress-value-' . sanitize_html_class( $value_position );
		if ( $striped === 'yes' ) { $wrapper_classes[] = 'is-striped'; }
		if ( $animated_stripes === 'yes' ) { $wrapper_classes[] = 'is-animated-stripes'; }
		$wrapper_classes[] = $cssbox;

		$animation_duration = max( 200, (int) $animation_speed );

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo cawpb_sanitize_html_classes( $wrapper_classes ); ?>"
			data-animate="<?php echo esc_attr( $animation ); ?>"
			data-speed="<?php echo esc_attr( $animation_duration ); ?>"
			data-percent="<?php echo esc_attr( $percent ); ?>"
			data-value="<?php echo esc_attr( $value_num ); ?>"
			data-unit="<?php echo esc_attr( $unit ); ?>">
			<?php if ( $show_label === 'yes' || ( $show_value === 'yes' && $value_position === 'top' ) ) : ?>
				<div class="caw-progress-head">
					<?php if ( $show_label === 'yes' ) : ?>
						<span class="caw-progress-label" style="<?php echo esc_attr( $label_istyle ); ?>"><?php echo esc_html( $label ); ?></span>
					<?php endif; ?>
					<?php if ( $show_value === 'yes' && $value_position === 'top' ) : ?>
						<span class="caw-progress-value" style="<?php echo esc_attr( $value_istyle ); ?>"><?php echo esc_html( $value_num . $unit ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="caw-progress-track" style="<?php echo esc_attr( $track_istyle ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $value_num ); ?>" aria-valuemin="0" aria-valuemax="<?php echo esc_attr( $max_val ); ?>">
				<div class="caw-progress-fill" style="<?php echo esc_attr( $bar_istyle ); ?>" data-target-width="<?php echo esc_attr( $percent ); ?>">
					<?php if ( $show_value === 'yes' && $value_position === 'inline' ) : ?>
						<span class="caw-progress-value caw-progress-value-inline" style="<?php echo esc_attr( $value_istyle ); ?>"><?php echo esc_html( $value_num . $unit ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
