<?php
class WPBakeryShortCode_CAW_Testimonial_Slider extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'cols'          => '1',
			'image_id'      => '',
			'title'         => '',
			'company'       => '',
			'stars'         => '5.0',
			'style'         => '1',
			'url'           => '',
			'cssbox'        => '',
		), $attrs ) );

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs, 'caw-info-table');

		$column_class = 'masonry-item col-1-'.esc_attr($cols);
		
		$theme_path = get_stylesheet_directory().'/caw/testimonials/style'.$style.'.php';

		ob_start(); ?>
			<div class="<?php echo esc_attr($column_class); ?> <?php echo esc_attr($cssbox); ?>">

				<?php if (file_exists($theme_path)) {
					include $theme_path;
				} else {
					include 'templates/style'.$style.'.php';
				} ?>

			</div>
		<?php
		return ob_get_clean();
	}
}