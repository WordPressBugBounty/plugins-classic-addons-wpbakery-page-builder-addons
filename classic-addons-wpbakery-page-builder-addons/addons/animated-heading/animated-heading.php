<?php
/**
 * Animated Heading Addon Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

class WPBakeryShortCode_CAW_Animated_Heading extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'heading_tag' => 'h1',
			'before_heading' => 'We are here to',
			'spin_headings'  => '',
			'extra_classes'  => '',
			'spin_timer'     => '3000',
			'after_heading'  => 'you...',
			'after_margin'   => '',
			'animation_style'   => 'slide',
			'cssbox'     => '',
		), $attrs ) );

		wp_enqueue_style('caw-aheading', CAWPB_URL.'/addons/animated-heading/animated-heading.css');
		wp_enqueue_script('caw-aheading', CAWPB_URL.'/addons/animated-heading/animated-heading.js', array('jquery'));

		$cssbox = cawpb_add_inline_style($cssbox, $this->settings['base'], $attrs);

		$spacing_classes = array();
		$spacing_fields = [
		    'beforetxt' => ['margin', 'padding'],
		    'spinner_headings' => ['margin', 'padding'],
		    'aftertxt' => ['margin', 'padding']
		];

		foreach ($spacing_fields as $prefix => $properties) {
		    foreach ($properties as $property) {
		        $field = "{$prefix}_{$property}";
		        $spacing_classes[$prefix][] = isset($attrs[$field]) ? cawpb_add_inline_style($attrs[$field], $this->settings['base'], $attrs, 'caw-aheading'): '';
		    }
		    $spacing_classes[$prefix] = implode(' ', array_filter($spacing_classes[$prefix])); // Combine margin & padding classes
		}

		$beforetxt_istyle = cawpb_get_typo_styles('beforetxt', $attrs, array('font-size' => '20px'));
		$sph_istyle = cawpb_get_typo_styles('spinner_headings', $attrs, array('font-size' => '20px'));
		$aftertxt_istyle = cawpb_get_typo_styles('aftertxt', $attrs, array('font-size' => '20px'));

		$all_headings = array_map('sanitize_text_field', explode(',', $spin_headings));

		$wrapper_classes = array();
		$wrapper_classes[] = 'caw-aheading-wrapper';
		$wrapper_classes[] = 'caw-textcenter';
		$wrapper_classes[] = 'wpb_content_element';
		$wrapper_classes[] = 'animation-'.esc_attr($animation_style);
		$wrapper_classes[] = $cssbox;
		$wrapper_classes[] = $extra_classes;
		
		$allowed_heading_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
		
		$heading_tag = in_array($heading_tag, $allowed_heading_tags) ? $heading_tag : 'h1';

		ob_start(); ?>
			<div class="<?php echo cawpb_sanitize_html_classes($wrapper_classes); ?>" data-time="<?php echo intval($spin_timer); ?>">
				<<?php echo esc_attr($heading_tag) ?> style="margin-bottom: <?php echo esc_attr($after_margin); ?>;">
				  <span class="<?php echo esc_attr($spacing_classes['beforetxt']); ?>" style="<?php echo esc_attr($beforetxt_istyle); ?>"><?php echo esc_attr( $before_heading ); ?></span>
				  
				  	<span class="caw-aheading-spin <?php echo esc_attr($spacing_classes['spinner_headings']); ?>" style="<?php echo esc_attr($sph_istyle); ?>">
					  	<em class="current"><?php echo esc_attr( $all_headings[0] ); ?></em>
					  	<span class="next"><span></span></span>
				  	</span>

				  	<span class="<?php echo esc_attr($spacing_classes['aftertxt']); ?>" style="<?php echo esc_attr($aftertxt_istyle); ?>"><?php echo esc_attr( $after_heading ); ?></span>
				</<?php echo esc_attr($heading_tag) ?>>

				<ul class="caw-aheadings-list">
					<?php
						foreach ($all_headings as $heading) {?>
							<li><?php echo esc_attr( $heading ); ?></li>
						<?php }
					?>
				</ul>

				<div class="caw-aheading-content">
					<?php echo wp_kses_post($content); ?>
				</div>
			</div>
		<?php return ob_get_clean();
	}
}