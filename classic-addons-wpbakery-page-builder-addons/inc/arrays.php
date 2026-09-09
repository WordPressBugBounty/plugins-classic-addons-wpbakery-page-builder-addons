<?php
/**
 * Contain Arrays Functions
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

function cawpb_get_addons_meta(){

	$addons = array(
		'animated-heading' => array(
			'base' => 'caw_animated_heading',
			'name' => __( 'Animated Heading', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Spins different words.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Before Text',
						'key' => 'beforetxt',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'Spinner Headings',
						'key' => 'spinner_headings',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'After Text',
						'key' => 'aftertxt',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
				),
				'csseditor' => array()
			),
		),
		'alert-box' => array(
			'base' => 'caw_alert_box',
			'name' => __( 'Alert Box', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Display notices or warnings in a alert box', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Title',
						'key' => 'title',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'Content',
						'key' => 'content',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
				),
				'icon' => array(
					array(
						'title' => 'Icon',
						'key' => 'icon',
						'group' => 'Icon',
					)
				),				
				'csseditor' => array(),
			),
		),
		'button' => array(
			'base' => 'caw_button',
			'name' => __( 'Interactive Button', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'A bunch of pre made styles', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'button' => array(
					array(
						'title'   => 'Button',
						'key'     => 'btn',
						'group'   => 'Button',						
					)
				),
				'csseditor' => array()
			),
		),
		'count-up' => array(
			'base' => 'caw_count_up',
			'name' => __( 'Count Up', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Displays number counter.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'icon' => array(
					array(
						'title' => 'Icon',
						'key'   => 'icon',
						'group' => 'Icon',
					)
				),
				'typo' => array(
					array(
						'title' => 'Count Value',
						'key' => 'counter',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
				),
				'csseditor' => array()
			),
		),
		'filterable-portfolio' => array(
			'base' => 'caw_filterable_portfolio_c',
			'name' => __( 'Filterable Portfolio', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Sortable Portfolio Items.', 'classic-addons-wpbakery-page-builder' ),
			"content_element" => true,
			"js_view" => 'VcColumnView',
			"as_parent" => array('only' => 'caw_filterable_portfolio'),
		),
		'filterable-portfolio-item' => array(
			'base' => 'caw_filterable_portfolio',
			'name' => __( 'Filterable Portfolio Item', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Displays a single portfolio.', 'classic-addons-wpbakery-page-builder' ),
			"as_child" => array('only' => 'caw_filterable_portfolio_c'),
			"content_element" => true,
		),
		'info-table' => array(
			'base' => 'caw_info_table',
			'name' => __( 'Info Table', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Title, Image and button', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'Sub Heading',
						'key' => 'subheading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
				),
				'icon' => array(
					array(
						'title' => 'Icon',
						'key' => 'icon',
						'group' => 'Icon',
					)
				),
				'button' => array(
					array(
						'title' => 'Button',
						'key'   => 'btn',
						'group' => 'Button',						
					)
				),
				'csseditor' => array()
			),
		),
		'info-banner' => array(
			'base' => 'caw_info_banner',
			'name' => __( 'Info Banner', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Banner with optional ribbon.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'button' => array(
					array(
						'title' => 'Button',
						'key' => 'btn',
						'group' => 'Button',
					)
				),
				'csseditor' => array()
			),
		),
		'interactive-banner' => array(
			'base' => 'caw_interacive_banner',
			'name' => __( 'Interactive Banner', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Image and Caption with hover styles.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),					
				),
				'csseditor' => array(),
			),
		),
		'testimonial-slider' => array(
			'base' => 'caw_testimonial_slider_c',
			'name' => __( 'Testimonial Slider + Grid', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Testimonials with stars.', 'classic-addons-wpbakery-page-builder' ),
			"content_element" => true,
			"js_view" => 'VcColumnView',
			"as_parent" => array('only' => 'caw_testimonial_slider'),
		),
		'testimonial-slider-item' => array(
			'base' => 'caw_testimonial_slider',
			'name' => __( 'Single Testimonial', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Displays a single testimonial.', 'classic-addons-wpbakery-page-builder' ),
			"as_child" => array('only' => 'caw_testimonial_slider_c'),
			"content_element" => true,
		),
		'flip-box' => array(
			'base' => 'caw_flip_box',
			'name' => __( 'Flip Box', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Flip back front on hover', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'button' => array(
					array(
						'title' => 'Button',
						'key' => 'btn',
						'group' => 'Button',						
					)
				),
				'icon' => array(
					array(
						'title' => 'Icon',
						'key'   => 'icon',
						'group' => 'Icon',
					)
				),
				'typo' => array(
					array(
						'title' => 'Front Area Content',
						'key' => 'fcontent',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
					array(
						'title' => 'Back Area Content',
						'key' => 'bcontent',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
				),
				'csseditor' => array()
			),
		),
		'flip-book' => array(
			'base' => 'caw_flip_book_c',
			'name' => __( '3D Flip Book', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Displays Flip Book.', 'classic-addons-wpbakery-page-builder' ),
			"as_parent" => array('only' => 'caw_flip_book'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
		),
		'flip-book-item' => array(
			'base' => 'caw_flip_book',
			'name' => __( 'Book Page', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Renders single page for book.', 'classic-addons-wpbakery-page-builder' ),
			"content_element" => true,
			"as_child" => array('only' => 'caw_flip_book_c'),
		),
		'single-image' => array(
			'base' => 'caw_single_image',
			'name' => __( 'Single Image', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Info above the image.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'ribbon' => array(
					array(
						'title' => 'Ribbon',
						'key' => 'img_ribbon',
						'group' => 'Ribbon',				
					)
				),
				'typo' => array(
					array(
						'title' => 'Caption',
						'key' => 'caption',
						'group' => 'Typography',
						'support' => array('basic'),
					),
					array(
						'title' => 'Bottom Text',
						'key' => 'bt_txt',
						'group' => 'Typography',
						'support' => array('basic'),
					),
				),
				'csseditor' => array()
			),
		),
		'logo-carousel' => array(
			'base' => 'caw_logo_carousel_c',
			'name' => __( 'Logo Carousel', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Image Slider.', 'classic-addons-wpbakery-page-builder' ),
			"as_parent" => array('only' => 'caw_logo_carousel'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			'support' => array(
				'csseditor' => array()
			),
		),
		'logo-carousel-item' => array(
			'base' => 'caw_logo_carousel',
			'name' => __( 'Logo Carousel Item', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Displays single carousel item.', 'classic-addons-wpbakery-page-builder' ),
			"content_element" => true,
			"as_child" => array('only' => 'caw_logo_carousel_c'),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Footer Text',
						'key' => 'img_footer_txt',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
				),
				'csseditor' => array()
			),				
		),
		'info-box' => array(
			'base' => 'caw_info_box',
			'name' => __( 'Info Box', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Icon, Title and Content', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
					array(
						'title' => 'Content',
						'key' => 'subheading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily', 'spacing'),
					),
				),
				'icon' => array(
					array(
						'title' => 'Icon',
						'key' => 'icon',
						'group' => 'Icon',
					)
				),
				'csseditor' => array()
			),
		),
		'accordion' => array(
			'base' => 'caw_accordion_c',
			'name' => __( 'Accordion / FAQ', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Collapsible panels with FAQ support.', 'classic-addons-wpbakery-page-builder' ),
			'content_element' => true,
			'js_view'         => 'VcColumnView',
			'as_parent'       => array( 'only' => 'caw_accordion' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'accordion-item' => array(
			'base' => 'caw_accordion',
			'name' => __( 'Accordion Item', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Single accordion panel.', 'classic-addons-wpbakery-page-builder' ),
			'content_element' => true,
			'as_child'        => array( 'only' => 'caw_accordion_c' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'tabs' => array(
			'base' => 'caw_tabs_c',
			'name' => __( 'Tabs', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Horizontal or vertical tabbed content.', 'classic-addons-wpbakery-page-builder' ),
			'content_element' => true,
			'js_view'         => 'VcColumnView',
			'as_parent'       => array( 'only' => 'caw_tabs' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'tabs-item' => array(
			'base' => 'caw_tabs',
			'name' => __( 'Tab', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Single tab panel.', 'classic-addons-wpbakery-page-builder' ),
			'content_element' => true,
			'as_child'        => array( 'only' => 'caw_tabs_c' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'progress-bar' => array(
			'base' => 'caw_progress_bar',
			'name' => __( 'Progress Bar', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Animated skills or progress bars.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'team-member' => array(
			'base' => 'caw_team_member',
			'name' => __( 'Team Member', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Team profile card with social icons.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'countdown-timer' => array(
			'base' => 'caw_countdown_timer',
			'name' => __( 'Countdown Timer', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Counts down to a target date/time.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'before-after' => array(
			'base' => 'caw_before_after',
			'name' => __( 'Before / After Image', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Image comparison slider.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'post-grid' => array(
			'base' => 'caw_post_grid',
			'name' => __( 'Post Grid', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Display posts in grid or masonry layout.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'pricing-table' => array(
			'base' => 'caw_pricing_table',
			'name' => __( 'Pricing Table', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Plan with price, features and button.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
		'image-hotspots' => array(
			'base' => 'caw_image_hotspots',
			'name' => __( 'Image Hotspots', 'classic-addons-wpbakery-page-builder' ),
			'description' => __( 'Interactive markers on an image with tooltips.', 'classic-addons-wpbakery-page-builder' ),
			'support' => array(
				'csseditor' => array(),
			),
		),
	);

	/**
	 * Filter the master list of registered addons.
	 *
	 * External plugins (e.g. Classic Addons Pro) can use this filter to
	 * register additional modules without modifying the free plugin. Each
	 * entry must follow the same shape as the built-in modules: a 'base'
	 * shortcode, a translatable 'name', a 'description', and optionally a
	 * 'support' array.
	 *
	 * @since 4.2
	 *
	 * @param array $addons Map of slug => meta.
	 */
	return apply_filters( 'cawpb_modules', $addons );
}


function cawpb_get_addon_info(){

	$all_addons = cawpb_get_addons_meta();
	$addons = array();
	foreach ($all_addons as $slug => $addon) {
		if (strpos($slug, '-item') == false) {
			$addons[$slug] = $addon;
		}
	}

	/**
	 * Filter the list of addons displayed on the enable/disable settings
	 * screen. Child item slugs (e.g. accordion-item) are already removed.
	 *
	 * @since 4.2
	 *
	 * @param array $addons Map of slug => meta.
	 */
	$addons = apply_filters( 'cawpb_settings_modules', $addons );

	return $addons;
}