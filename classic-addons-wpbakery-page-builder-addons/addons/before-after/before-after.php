<?php
/**
 * Before / After Image Comparison Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Before_After extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'before_image'   => '',
			'after_image'    => '',
			'img_size'       => 'full',
			'orientation'    => 'horizontal',
			'interaction'    => 'drag',
			'start_position' => '50',
			'show_labels'    => 'yes',
			'before_label'   => 'Before',
			'after_label'    => 'After',
			'label_color'    => '',
			'label_bg'       => '',
			'divider_color'  => '#ffffff',
			'divider_width'  => '3px',
			'handle_bg'      => '#ffffff',
			'handle_color'   => '#333333',
			'handle_size'    => '40px',
			'max_width'      => '',
			'cssbox'         => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-before-after';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/before-after/before-after.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/before-after/before-after.js', array(), CAWPB_VERSION, true );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-ba-' . wp_unique_id();

		// Normalize start position (0..100).
		$start = (float) $start_position;
		if ( $start < 0 )   { $start = 0; }
		if ( $start > 100 ) { $start = 100; }

		// Sanitize orientation/interaction to known values for class output.
		$orientation = in_array( $orientation, array( 'horizontal', 'vertical' ), true ) ? $orientation : 'horizontal';
		$interaction = in_array( $interaction, array( 'drag', 'hover' ), true ) ? $interaction : 'drag';

		// Resolve images.
		$before = cawpb_get_image_by_size( array(
			'attach_id'  => $before_image,
			'thumb_size' => $img_size,
			'class'      => 'caw-ba-image caw-ba-image-before',
		) );
		$after  = cawpb_get_image_by_size( array(
			'attach_id'  => $after_image,
			'thumb_size' => $img_size,
			'class'      => 'caw-ba-image caw-ba-image-after',
		) );

		$before_html = ( is_array( $before ) && ! empty( $before['thumbnail'] ) ) ? $before['thumbnail'] : '';
		$after_html  = ( is_array( $after )  && ! empty( $after['thumbnail'] ) )  ? $after['thumbnail']  : '';

		if ( $before_html === '' || $after_html === '' ) {
			// Editor placeholder: show a friendly hint instead of broken markup.
			ob_start(); ?>
			<div class="caw-before-after caw-before-after-empty">
				<p><?php echo esc_html__( 'Please select both Before and After images.', 'classic-addons-wpbakery-page-builder' ); ?></p>
			</div>
			<?php
			return ob_get_clean();
		}

		// Wrapper inline styles.
		$wrap_style = '';
		if ( $max_width !== '' ) { $wrap_style .= 'max-width:' . $max_width . ';'; }

		$divider_style = '';
		if ( $divider_color !== '' ) { $divider_style .= '--caw-ba-divider-color:' . $divider_color . ';'; }
		if ( $divider_width !== '' ) { $divider_style .= '--caw-ba-divider-width:' . $divider_width . ';'; }
		if ( $handle_size !== '' )   { $divider_style .= '--caw-ba-handle-size:' . $handle_size . ';'; }

		$handle_istyle = '';
		if ( $handle_bg !== '' )    { $handle_istyle .= 'background-color:' . $handle_bg . ';'; }
		if ( $handle_color !== '' ) { $handle_istyle .= 'color:' . $handle_color . ';'; }
		if ( $handle_size !== '' )  { $handle_istyle .= 'width:' . $handle_size . ';height:' . $handle_size . ';'; }

		$label_style = '';
		if ( $label_color !== '' ) { $label_style .= 'color:' . $label_color . ';'; }
		if ( $label_bg !== '' )    { $label_style .= 'background-color:' . $label_bg . ';'; }

		$combined_wrap_style = $wrap_style . $divider_style;

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-before-after';
		$wrapper_classes[] = 'caw-ba-orient-' . sanitize_html_class( $orientation );
		$wrapper_classes[] = 'caw-ba-mode-' . sanitize_html_class( $interaction );
		$wrapper_classes[] = $cssbox;

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ); ?>"
			style="<?php echo esc_attr( $combined_wrap_style ); ?>"
			data-orientation="<?php echo esc_attr( $orientation ); ?>"
			data-interaction="<?php echo esc_attr( $interaction ); ?>"
			data-start="<?php echo esc_attr( $start ); ?>">
			<div class="caw-ba-frame">
				<div class="caw-ba-before"><?php echo wp_kses_post( $before_html ); ?></div>
				<div class="caw-ba-after" style="<?php echo esc_attr( $orientation === 'horizontal' ? 'width:' . $start . '%;' : 'height:' . $start . '%;' ); ?>">
					<div class="caw-ba-after-inner"><?php echo wp_kses_post( $after_html ); ?></div>
				</div>

				<?php if ( $show_labels === 'yes' ) : ?>
					<?php if ( $before_label !== '' ) : ?>
						<span class="caw-ba-label caw-ba-label-before" style="<?php echo esc_attr( $label_style ); ?>"><?php echo esc_html( $before_label ); ?></span>
					<?php endif; ?>
					<?php if ( $after_label !== '' ) : ?>
						<span class="caw-ba-label caw-ba-label-after" style="<?php echo esc_attr( $label_style ); ?>"><?php echo esc_html( $after_label ); ?></span>
					<?php endif; ?>
				<?php endif; ?>

				<div class="caw-ba-divider" style="<?php echo esc_attr( $orientation === 'horizontal' ? 'left:' . $start . '%;' : 'top:' . $start . '%;' ); ?>">
					<button type="button" class="caw-ba-handle"
						style="<?php echo esc_attr( $handle_istyle ); ?>"
						role="slider"
						aria-label="<?php echo esc_attr__( 'Drag to compare before and after images', 'classic-addons-wpbakery-page-builder' ); ?>"
						aria-valuemin="0"
						aria-valuemax="100"
						aria-valuenow="<?php echo esc_attr( (int) $start ); ?>"
						aria-orientation="<?php echo esc_attr( $orientation ); ?>">
						<span class="caw-ba-arrow caw-ba-arrow-1" aria-hidden="true"></span>
						<span class="caw-ba-arrow caw-ba-arrow-2" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
