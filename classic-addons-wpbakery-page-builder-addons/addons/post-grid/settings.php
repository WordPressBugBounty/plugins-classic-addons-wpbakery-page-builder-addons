<?php
/**
 * Post Grid Addon Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Build a safe list of public post types.
$post_type_options = array();
if ( function_exists( 'get_post_types' ) ) {
	$pts = get_post_types( array( 'public' => true ), 'objects' );
	$post_type_options[ __( 'Any', 'classic-addons' ) ] = 'any';
	if ( is_array( $pts ) ) {
		foreach ( $pts as $pt ) {
			if ( $pt->name === 'attachment' ) { continue; }
			$post_type_options[ $pt->labels->singular_name . ' (' . $pt->name . ')' ] = $pt->name;
		}
	}
} else {
	$post_type_options = array( __( 'Post', 'classic-addons' ) => 'post' );
}

$params = array(
	// Query
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Post Type', 'classic-addons' ),
		'param_name' => 'post_type',
		'group'      => 'Query',
		'value'      => $post_type_options,
		'std'        => 'post',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Taxonomy', 'classic-addons' ),
		'param_name' => 'taxonomy',
		'group'      => 'Query',
		'value'      => 'category',
		'description' => __( 'Taxonomy slug (e.g. category, post_tag, product_cat).', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Term Slugs', 'classic-addons' ),
		'param_name' => 'terms',
		'group'      => 'Query',
		'description' => __( 'Comma-separated term slugs to filter by. Leave empty to show all.', 'classic-addons' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Author IDs', 'classic-addons' ),
		'param_name' => 'authors',
		'group'      => 'Query',
		'description' => __( 'Comma-separated author IDs. Leave empty for all.', 'classic-addons' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Posts Per Page', 'classic-addons' ),
		'param_name' => 'posts_per_page',
		'group'      => 'Query',
		'value'      => '6',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Offset', 'classic-addons' ),
		'param_name' => 'offset',
		'group'      => 'Query',
		'value'      => '0',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Order By', 'classic-addons' ),
		'param_name' => 'orderby',
		'group'      => 'Query',
		'value'      => array(
			__( 'Date', 'classic-addons' )           => 'date',
			__( 'Title', 'classic-addons' )          => 'title',
			__( 'Modified', 'classic-addons' )       => 'modified',
			__( 'Random', 'classic-addons' )         => 'rand',
			__( 'Menu Order', 'classic-addons' )     => 'menu_order',
			__( 'Comment Count', 'classic-addons' )  => 'comment_count',
		),
		'std' => 'date',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Order', 'classic-addons' ),
		'param_name' => 'order',
		'group'      => 'Query',
		'value'      => array(
			__( 'DESC', 'classic-addons' ) => 'DESC',
			__( 'ASC', 'classic-addons' )  => 'ASC',
		),
		'std' => 'DESC',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Exclude Current Post', 'classic-addons' ),
		'param_name' => 'exclude_current',
		'group'      => 'Query',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Ignore Sticky Posts', 'classic-addons' ),
		'param_name' => 'ignore_sticky',
		'group'      => 'Query',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Layout
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Layout', 'classic-addons' ),
		'param_name' => 'layout',
		'group'      => 'Layout',
		'value'      => array(
			__( 'Grid', 'classic-addons' )    => 'grid',
			__( 'Masonry', 'classic-addons' ) => 'masonry',
		),
		'std' => 'grid',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Desktop)', 'classic-addons' ),
		'param_name' => 'cols_desktop',
		'group'      => 'Layout',
		'value'      => '3',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Tablet)', 'classic-addons' ),
		'param_name' => 'cols_tablet',
		'group'      => 'Layout',
		'value'      => '2',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Mobile)', 'classic-addons' ),
		'param_name' => 'cols_mobile',
		'group'      => 'Layout',
		'value'      => '1',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Column Gap', 'classic-addons' ),
		'param_name' => 'col_gap',
		'group'      => 'Layout',
		'value'      => '24px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Row Gap', 'classic-addons' ),
		'param_name' => 'row_gap',
		'group'      => 'Layout',
		'value'      => '24px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style Preset', 'classic-addons' ),
		'param_name' => 'preset',
		'group'      => 'Layout',
		'value'      => array(
			__( 'Classic Card', 'classic-addons' ) => 'classic',
			__( 'Minimal', 'classic-addons' )      => 'minimal',
			__( 'Modern', 'classic-addons' )       => 'modern',
		),
		'std' => 'classic',
	),

	// Display
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Featured Image', 'classic-addons' ),
		'param_name' => 'show_image',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Size', 'classic-addons' ),
		'param_name' => 'image_size',
		'group'      => 'Display',
		'value'      => function_exists( 'cawpb_get_image_sizes' ) ? cawpb_get_image_sizes() : array( 'Default' => '' ),
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Crop to Fixed Aspect Ratio', 'classic-addons' ),
		'param_name' => 'crop_aspect',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Aspect Ratio', 'classic-addons' ),
		'param_name' => 'aspect_ratio',
		'group'      => 'Display',
		'value'      => '16/9',
		'description' => __( 'CSS aspect-ratio value, e.g. 16/9, 4/3, 1/1.', 'classic-addons' ),
		'dependency' => array( 'element' => 'crop_aspect', 'value' => 'yes' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Hover Effect', 'classic-addons' ),
		'param_name' => 'img_hover',
		'group'      => 'Display',
		'value'      => array(
			__( 'None', 'classic-addons' ) => 'none',
			__( 'Zoom', 'classic-addons' ) => 'zoom',
			__( 'Fade', 'classic-addons' ) => 'fade',
		),
		'std'        => 'zoom',
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Title', 'classic-addons' ),
		'param_name' => 'show_title',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Title Tag', 'classic-addons' ),
		'param_name' => 'title_tag',
		'group'      => 'Display',
		'value'      => array( 'H1' => 'h1', 'H2' => 'h2', 'H3' => 'h3', 'H4' => 'h4', 'H5' => 'h5', 'H6' => 'h6', 'DIV' => 'div' ),
		'std'        => 'h3',
		'dependency' => array( 'element' => 'show_title', 'value' => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Character Limit', 'classic-addons' ),
		'param_name' => 'title_limit',
		'group'      => 'Display',
		'description' => __( '0 = no limit.', 'classic-addons' ),
		'dependency' => array( 'element' => 'show_title', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Excerpt', 'classic-addons' ),
		'param_name' => 'show_excerpt',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Excerpt Limit Unit', 'classic-addons' ),
		'param_name' => 'excerpt_unit',
		'group'      => 'Display',
		'value'      => array(
			__( 'Words', 'classic-addons' )      => 'words',
			__( 'Characters', 'classic-addons' ) => 'chars',
		),
		'std'        => 'words',
		'dependency' => array( 'element' => 'show_excerpt', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Excerpt Limit', 'classic-addons' ),
		'param_name' => 'excerpt_limit',
		'group'      => 'Display',
		'value'      => '20',
		'dependency' => array( 'element' => 'show_excerpt', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Read More Button', 'classic-addons' ),
		'param_name' => 'show_readmore',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Read More Text', 'classic-addons' ),
		'param_name' => 'readmore_text',
		'group'      => 'Display',
		'value'      => __( 'Read More', 'classic-addons' ),
		'dependency' => array( 'element' => 'show_readmore', 'value' => 'yes' ),
	),

	// Meta
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Meta Row', 'classic-addons' ),
		'param_name' => 'show_meta',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Author', 'classic-addons' ),
		'param_name' => 'meta_author',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Date', 'classic-addons' ),
		'param_name' => 'meta_date',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Categories', 'classic-addons' ),
		'param_name' => 'meta_category',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Comment Count', 'classic-addons' ),
		'param_name' => 'meta_comments',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Links
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Make Title Clickable', 'classic-addons' ),
		'param_name' => 'link_title',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Make Image Clickable', 'classic-addons' ),
		'param_name' => 'link_image',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Open in New Tab', 'classic-addons' ),
		'param_name' => 'link_new_tab',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons' ) => 'yes' ),
	),

	// Pagination
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Pagination', 'classic-addons' ),
		'param_name' => 'pagination',
		'group'      => 'Pagination',
		'value'      => array(
			__( 'None', 'classic-addons' )            => 'none',
			__( 'Numbered', 'classic-addons' )        => 'numbered',
			__( 'Load More Button', 'classic-addons' ) => 'loadmore',
		),
		'std' => 'none',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Load More Button Text', 'classic-addons' ),
		'param_name' => 'loadmore_text',
		'group'      => 'Pagination',
		'value'      => __( 'Load More', 'classic-addons' ),
		'dependency' => array( 'element' => 'pagination', 'value' => 'loadmore' ),
	),

	// Empty state
	array(
		'type'       => 'textarea',
		'heading'    => __( 'No Posts Message', 'classic-addons' ),
		'param_name' => 'empty_message',
		'group'      => 'Empty State',
		'value'      => __( 'No posts found.', 'classic-addons' ),
	),

	// Style
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Card Background', 'classic-addons' ),
		'param_name' => 'card_bg',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Padding', 'classic-addons' ),
		'param_name' => 'card_padding',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Card Border Color', 'classic-addons' ),
		'param_name' => 'card_border_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Border Width', 'classic-addons' ),
		'param_name' => 'card_border_width',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Border Radius', 'classic-addons' ),
		'param_name' => 'card_radius',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Card Shadow', 'classic-addons' ),
		'param_name' => 'card_shadow',
		'group'      => 'Style',
		'value'      => array(
			__( 'None', 'classic-addons' )   => 'none',
			__( 'Light', 'classic-addons' )  => 'light',
			__( 'Medium', 'classic-addons' ) => 'medium',
			__( 'Heavy', 'classic-addons' )  => 'heavy',
		),
		'std' => 'light',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Title Color', 'classic-addons' ),
		'param_name' => 'title_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Font Size', 'classic-addons' ),
		'param_name' => 'title_font_size',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Font Weight', 'classic-addons' ),
		'param_name' => 'title_font_weight',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Meta Color', 'classic-addons' ),
		'param_name' => 'meta_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Excerpt Color', 'classic-addons' ),
		'param_name' => 'excerpt_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Background', 'classic-addons' ),
		'param_name' => 'btn_bg',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Text', 'classic-addons' ),
		'param_name' => 'btn_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Hover Background', 'classic-addons' ),
		'param_name' => 'btn_bg_hover',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Hover Text', 'classic-addons' ),
		'param_name' => 'btn_color_hover',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
);
