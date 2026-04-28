<?php
/**
 * Team Member Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Team_Member extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			'style'          => 'classic',
			'image'          => '',
			'img_size'       => 'medium',
			'img_shape'      => 'rounded',
			'name'           => 'John Doe',
			'designation'    => 'Designer',
			'bio'            => '',
			'hover_effect'   => 'none',
			'alignment'      => 'center',
			'attach_link'    => '',
			'name_color'     => '',
			'designation_color' => '',
			'bio_color'      => '',
			'team_bg_color'       => '',
			'border_color'   => '',
			'border_width'   => '',
			'border_radius'  => '8px',
			'shadow'         => 'light',
			'padding'        => '',
			'name_font_size' => '',
			'desig_font_size'=> '',
			'social_items'   => '',
			'social_style'   => 'filled',
			'social_size'    => '36px',
			'social_color'   => '',
			'social_bg'      => '',
			'social_hover_color' => '',
			'social_hover_bg'    => '',
			'cssbox'         => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-team-member';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/team-member/team-member.css', array(), CAWPB_VERSION );
		cawpb_icon_fonts_enqueue( 'fontawesome' );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-tm-' . wp_unique_id();

		$link = vc_build_link( $attach_link );

		$decoded_social = array();
		if ( ! empty( $social_items ) ) {
			$raw = vc_param_group_parse_atts( $social_items );
			if ( is_array( $raw ) ) {
				$decoded_social = $raw;
			}
		}

		// Image
		$img_markup = '';
		if ( ! empty( $image ) ) {
			$img = cawpb_get_image_by_size( array(
				'attach_id' => $image,
				'thumb_size' => $img_size,
				'class' => 'caw-team-image',
			) );
			if ( ! empty( $img['thumbnail'] ) ) {
				$img_markup = $img['thumbnail'];
			}
		}

		// Inline styles
		$istyle = '';
		if ( $name_color !== '' ) {
			$istyle .= "#{$uid} .caw-team-name{color:" . esc_attr( $name_color ) . ";}";
		}
		if ( $designation_color !== '' ) {
			$istyle .= "#{$uid} .caw-team-designation{color:" . esc_attr( $designation_color ) . ";}";
		}
		if ( $bio_color !== '' ) {
			$istyle .= "#{$uid} .caw-team-bio{color:" . esc_attr( $bio_color ) . ";}";
		}
		if ( $team_bg_color !== '' ) {
			$istyle .= "#{$uid}.caw-team-member{background-color:" . esc_attr( $team_bg_color ) . ";}";
		}
		if ( $border_width !== '' || $border_color !== '' ) {
			$bw = $border_width !== '' ? $border_width : '1px';
			$bc = $border_color !== '' ? $border_color : '#e5e7eb';
			$istyle .= "#{$uid}.caw-team-member{border:" . esc_attr( $bw ) . ' solid ' . esc_attr( $bc ) . ';}';
		}
		if ( $border_radius !== '' ) {
			$istyle .= "#{$uid}.caw-team-member{border-radius:" . esc_attr( $border_radius ) . ";overflow:hidden;}";
		}
		if ( $padding !== '' ) {
			$istyle .= "#{$uid} .caw-team-body{padding:" . esc_attr( $padding ) . ";}";
		}
		if ( $name_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-team-name{font-size:" . esc_attr( $name_font_size ) . ";}";
		}
		if ( $desig_font_size !== '' ) {
			$istyle .= "#{$uid} .caw-team-designation{font-size:" . esc_attr( $desig_font_size ) . ";}";
		}
		if ( $social_color !== '' ) {
			$istyle .= "#{$uid} .caw-team-social a{color:" . esc_attr( $social_color ) . ";}";
		}
		if ( $social_bg !== '' ) {
			$istyle .= "#{$uid} .caw-team-social a{background-color:" . esc_attr( $social_bg ) . ";}";
		}
		if ( $social_hover_color !== '' ) {
			$istyle .= "#{$uid} .caw-team-social a:hover{color:" . esc_attr( $social_hover_color ) . ";}";
		}
		if ( $social_hover_bg !== '' ) {
			$istyle .= "#{$uid} .caw-team-social a:hover{background-color:" . esc_attr( $social_hover_bg ) . ";}";
		}
		if ( $social_size !== '' ) {
			$istyle .= "#{$uid} .caw-team-social a{width:" . esc_attr( $social_size ) . ';height:' . esc_attr( $social_size ) . ';line-height:' . esc_attr( $social_size ) . ';}';
		}
		if ( $istyle !== '' ) {
			wp_add_inline_style( $addon_handle, $istyle );
		}

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-team-member';
		$wrapper_classes[] = 'caw-team-style-' . sanitize_html_class( $style );
		$wrapper_classes[] = 'caw-team-shape-' . sanitize_html_class( $img_shape );
		$wrapper_classes[] = 'caw-team-align-' . sanitize_html_class( $alignment );
		$wrapper_classes[] = 'caw-team-hover-' . sanitize_html_class( $hover_effect );
		$wrapper_classes[] = 'caw-team-shadow-' . sanitize_html_class( $shadow );
		$wrapper_classes[] = 'caw-team-social-' . sanitize_html_class( $social_style );
		$wrapper_classes[] = $cssbox;

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>" class="<?php echo cawpb_sanitize_html_classes( $wrapper_classes ); ?>">
			<div class="caw-team-image-wrap">
				<?php if ( ! empty( $link['url'] ) ) : ?>
					<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" rel="<?php echo esc_attr( $link['rel'] ); ?>">
				<?php endif; ?>
					<?php echo $img_markup; ?>
				<?php if ( ! empty( $link['url'] ) ) : ?>
					</a>
				<?php endif; ?>

				<?php if ( $style === 'overlay' && ! empty( $decoded_social ) ) : ?>
					<div class="caw-team-social caw-team-social-overlay">
						<?php foreach ( $decoded_social as $social ) :
							$sicon = isset( $social['icon'] ) ? $social['icon'] : '';
							$surl  = isset( $social['url'] ) ? $social['url'] : '#';
							$slabel = isset( $social['label'] ) ? $social['label'] : '';
							if ( $sicon === '' ) { continue; }
							?>
							<a href="<?php echo esc_url( $surl ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $slabel ); ?>"><i class="<?php echo esc_attr( $sicon ); ?>"></i></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="caw-team-body">
				<?php if ( $name !== '' ) : ?>
					<h3 class="caw-team-name">
						<?php if ( ! empty( $link['url'] ) ) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" rel="<?php echo esc_attr( $link['rel'] ); ?>"><?php echo esc_html( $name ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $name ); ?>
						<?php endif; ?>
					</h3>
				<?php endif; ?>
				<?php if ( $designation !== '' ) : ?>
					<div class="caw-team-designation"><?php echo esc_html( $designation ); ?></div>
				<?php endif; ?>
				<?php if ( $bio !== '' ) : ?>
					<div class="caw-team-bio"><?php echo wp_kses_post( $bio ); ?></div>
				<?php endif; ?>
				<?php if ( $style !== 'overlay' && ! empty( $decoded_social ) ) : ?>
					<div class="caw-team-social">
						<?php foreach ( $decoded_social as $social ) :
							$sicon  = isset( $social['icon'] ) ? $social['icon'] : '';
							$surl   = isset( $social['url'] ) ? $social['url'] : '#';
							$slabel = isset( $social['label'] ) ? $social['label'] : '';
							if ( $sicon === '' ) { continue; }
							?>
							<a href="<?php echo esc_url( $surl ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $slabel ); ?>"><i class="<?php echo esc_attr( $sicon ); ?>"></i></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
