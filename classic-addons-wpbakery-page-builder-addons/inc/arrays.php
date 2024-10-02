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
			'name' => __( 'Animated Heading', 'classic-addons' ),
			'description' => __( 'Spins different words.', 'classic-addons' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Before Text',
						'key' => 'beforetxt',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
					array(
						'title' => 'Spinner Headings',
						'key' => 'spinner_headings',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
					array(
						'title' => 'After Text',
						'key' => 'aftertxt',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
				),
				'csseditor' => array()
			),
		),
		'button' => array(
			'base' => 'caw_button',
			'name' => __( 'Interactive Button', 'classic-addons' ),
			'description' => __( 'A bunch of pre made styles', 'classic-addons' ),
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
			'name' => __( 'Count Up', 'classic-addons' ),
			'description' => __( 'Displays number counter.', 'classic-addons' ),
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
						'support' => array('basic', 'fontfamily'),
					),
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
				),
				'csseditor' => array()
			),
		),
		'filterable-portfolio' => array(
			'base' => 'caw_filterable_portfolio_c',
			'name' => __( 'Filterable Portfolio', 'classic-addons' ),
			'description' => __( 'Sortable Portfolio Items.', 'classic-addons' ),
			"content_element" => true,
			"is_container" => true,			
			"js_view" => 'VcColumnView',
			"as_parent" => array('only' => 'caw_filterable_portfolio'),
		),
		'filterable-portfolio-item' => array(
			'base' => 'caw_filterable_portfolio',
			'name' => __( 'Filterable Portfolio Item', 'classic-addons' ),
			'description' => __( 'Displays a single portfolio.', 'classic-addons' ),
			"as_child" => array('only' => 'caw_filterable_portfolio_c'),
			"content_element" => true,
		),
		'info-table' => array(
			'base' => 'caw_info_table',
			'name' => __( 'Info Table', 'classic-addons' ),
			'description' => __( 'Title, Image and button', 'classic-addons' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
					),
					array(
						'title' => 'Sub Heading',
						'key' => 'subheading',
						'group' => 'Typography',
						'support' => array('basic', 'fontfamily'),
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
			'name' => __( 'Info Banner', 'classic-addons' ),
			'description' => __( 'Banner with optional ribbon.', 'classic-addons' ),
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
			'name' => __( 'Interactive Banner', 'classic-addons' ),
			'description' => __( 'Image and Caption with hover styles.', 'classic-addons' ),
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
			'name' => __( 'Testimonial Slider + Grid', 'classic-addons' ),
			'description' => __( 'Testimonials with stars.', 'classic-addons' ),
			"content_element" => true,
			"is_container" => true,			
			"js_view" => 'VcColumnView',
			"as_parent" => array('only' => 'caw_testimonial_slider'),
		),
		'testimonial-slider-item' => array(
			'base' => 'caw_testimonial_slider',
			'name' => __( 'Single Testimonial', 'classic-addons' ),
			'description' => __( 'Displays a single testimonial.', 'classic-addons' ),
			"as_child" => array('only' => 'caw_testimonial_slider_c'),
			"content_element" => true,
		),
		'flip-box' => array(
			'base' => 'caw_flip_box',
			'name' => __( 'Flip Box', 'classic-addons' ),
			'description' => __( 'Flip back front on hover', 'classic-addons' ),
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
			'name' => __( '3D Flip Book', 'classic-addons' ),
			'description' => __( 'Displays Flip Book.', 'classic-addons' ),
			"as_parent" => array('only' => 'caw_flip_book'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
		),
		'flip-book-item' => array(
			'base' => 'caw_flip_book',
			'name' => __( 'Book Page', 'classic-addons' ),
			'description' => __( 'Renders single page for book.', 'classic-addons' ),
			"content_element" => true,
			"as_child" => array('only' => 'caw_flip_book_c'),
		),
		'single-image' => array(
			'base' => 'caw_single_image',
			'name' => __( 'Single Image', 'classic-addons' ),
			'description' => __( 'Info above the image.', 'classic-addons' ),
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
			'name' => __( 'Logo Carousel', 'classic-addons' ),
			'description' => __( 'Image Slider.', 'classic-addons' ),
			"as_parent" => array('only' => 'caw_logo_carousel'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			'support' => array(
				'csseditor' => array()
			),
		),
		'logo-carousel-item' => array(
			'base' => 'caw_logo_carousel',
			'name' => __( 'Logo Carousel Item', 'classic-addons' ),
			'description' => __( 'Displays single carousel item.', 'classic-addons' ),
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
			'name' => __( 'Info Box', 'classic-addons' ),
			'description' => __( 'Icon, Title and Content', 'classic-addons' ),
			'support' => array(
				'typo' => array(
					array(
						'title' => 'Heading',
						'key' => 'heading',
						'group' => 'Typography',
						'support' => array('basic'),
					),
					array(
						'title' => 'Sub Heading',
						'key' => 'subheading',
						'group' => 'Typography',
						'support' => array('basic'),
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
	);

	return $addons;
}


function cawpb_get_addon_info(){

	$all_addons = cawpb_get_addons_meta();
	$addons = array();
	foreach ($all_addons as $slug => $addon) {
		if (strpos($slug, '-item') == false) {
			$addons[$slug] = $addon;
		}
	}

	return $addons;
}