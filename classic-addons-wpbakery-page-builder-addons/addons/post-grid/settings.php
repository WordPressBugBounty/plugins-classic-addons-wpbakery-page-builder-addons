<?php
/**
 * Post Grid Addon Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Build a safe list of public post types.
$cawpb_post_type_options = array();
if ( function_exists( 'get_post_types' ) ) {
	$cawpb_pts = get_post_types( array( 'public' => true ), 'objects' );
	$cawpb_post_type_options[ __( 'Any', 'classic-addons-wpbakery-page-builder' ) ] = 'any';
	if ( is_array( $cawpb_pts ) ) {
		foreach ( $cawpb_pts as $cawpb_pt ) {
			if ( $cawpb_pt->name === 'attachment' ) { continue; }
			$cawpb_post_type_options[ $cawpb_pt->labels->singular_name . ' (' . $cawpb_pt->name . ')' ] = $cawpb_pt->name;
		}
	}
} else {
	$cawpb_post_type_options = array( __( 'Post', 'classic-addons-wpbakery-page-builder' ) => 'post' );
}

$cawpb_params = array(
	// Query
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Post Type', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'post_type',
		'group'      => 'Query',
		'value'      => $cawpb_post_type_options,
		'std'        => 'post',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Taxonomy', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'taxonomy',
		'group'      => 'Query',
		'value'      => 'category',
		'description' => __( 'Taxonomy slug (e.g. category, post_tag, product_cat).', 'classic-addons-wpbakery-page-builder' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Term Slugs', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'terms',
		'group'      => 'Query',
		'description' => __( 'Comma-separated term slugs to filter by. Leave empty to show all.', 'classic-addons-wpbakery-page-builder' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Author IDs', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'authors',
		'group'      => 'Query',
		'description' => __( 'Comma-separated author IDs. Leave empty for all.', 'classic-addons-wpbakery-page-builder' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Posts Per Page', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'posts_per_page',
		'group'      => 'Query',
		'value'      => '6',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Offset', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'offset',
		'group'      => 'Query',
		'value'      => '0',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Order By', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'orderby',
		'group'      => 'Query',
		'value'      => array(
			__( 'Date', 'classic-addons-wpbakery-page-builder' )           => 'date',
			__( 'Title', 'classic-addons-wpbakery-page-builder' )          => 'title',
			__( 'Modified', 'classic-addons-wpbakery-page-builder' )       => 'modified',
			__( 'Random', 'classic-addons-wpbakery-page-builder' )         => 'rand',
			__( 'Menu Order', 'classic-addons-wpbakery-page-builder' )     => 'menu_order',
			__( 'Comment Count', 'classic-addons-wpbakery-page-builder' )  => 'comment_count',
		),
		'std' => 'date',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Order', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'order',
		'group'      => 'Query',
		'value'      => array(
			__( 'DESC', 'classic-addons-wpbakery-page-builder' ) => 'DESC',
			__( 'ASC', 'classic-addons-wpbakery-page-builder' )  => 'ASC',
		),
		'std' => 'DESC',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Exclude Current Post', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'exclude_current',
		'group'      => 'Query',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Ignore Sticky Posts', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'ignore_sticky',
		'group'      => 'Query',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Layout
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Layout', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'layout',
		'group'      => 'Layout',
		'value'      => array(
			__( 'Grid', 'classic-addons-wpbakery-page-builder' )    => 'grid',
			__( 'Masonry', 'classic-addons-wpbakery-page-builder' ) => 'masonry',
		),
		'std' => 'grid',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Desktop)', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'cols_desktop',
		'group'      => 'Layout',
		'value'      => '3',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Tablet)', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'cols_tablet',
		'group'      => 'Layout',
		'value'      => '2',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Columns (Mobile)', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'cols_mobile',
		'group'      => 'Layout',
		'value'      => '1',
		'edit_field_class' => 'vc_col-xs-4 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Column Gap', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'col_gap',
		'group'      => 'Layout',
		'value'      => '24px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Row Gap', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'row_gap',
		'group'      => 'Layout',
		'value'      => '24px',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style Preset', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'preset',
		'group'      => 'Layout',
		'value'      => array(
			__( 'Classic Card', 'classic-addons-wpbakery-page-builder' ) => 'classic',
			__( 'Minimal', 'classic-addons-wpbakery-page-builder' )      => 'minimal',
			__( 'Modern', 'classic-addons-wpbakery-page-builder' )       => 'modern',
		),
		'std' => 'classic',
	),

	// Display
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Featured Image', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_image',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'image_size',
		'group'      => 'Display',
		'value'      => function_exists( 'cawpb_get_image_sizes' ) ? cawpb_get_image_sizes() : array( 'Default' => '' ),
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Crop to Fixed Aspect Ratio', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'crop_aspect',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Aspect Ratio', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'aspect_ratio',
		'group'      => 'Display',
		'value'      => '16/9',
		'description' => __( 'CSS aspect-ratio value, e.g. 16/9, 4/3, 1/1.', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'crop_aspect', 'value' => 'yes' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image Hover Effect', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'img_hover',
		'group'      => 'Display',
		'value'      => array(
			__( 'None', 'classic-addons-wpbakery-page-builder' ) => 'none',
			__( 'Zoom', 'classic-addons-wpbakery-page-builder' ) => 'zoom',
			__( 'Fade', 'classic-addons-wpbakery-page-builder' ) => 'fade',
		),
		'std'        => 'zoom',
		'dependency' => array( 'element' => 'show_image', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Title', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_title',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Title Tag', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'title_tag',
		'group'      => 'Display',
		'value'      => array( 'H1' => 'h1', 'H2' => 'h2', 'H3' => 'h3', 'H4' => 'h4', 'H5' => 'h5', 'H6' => 'h6', 'DIV' => 'div' ),
		'std'        => 'h3',
		'dependency' => array( 'element' => 'show_title', 'value' => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Character Limit', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'title_limit',
		'group'      => 'Display',
		'description' => __( '0 = no limit.', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'show_title', 'value' => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Excerpt', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_excerpt',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Excerpt Limit Unit', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'excerpt_unit',
		'group'      => 'Display',
		'value'      => array(
			__( 'Words', 'classic-addons-wpbakery-page-builder' )      => 'words',
			__( 'Characters', 'classic-addons-wpbakery-page-builder' ) => 'chars',
		),
		'std'        => 'words',
		'dependency' => array( 'element' => 'show_excerpt', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Excerpt Limit', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'excerpt_limit',
		'group'      => 'Display',
		'value'      => '20',
		'dependency' => array( 'element' => 'show_excerpt', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Read More Button', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_readmore',
		'group'      => 'Display',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Read More Text', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'readmore_text',
		'group'      => 'Display',
		'value'      => __( 'Read More', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'show_readmore', 'value' => 'yes' ),
	),

	// Meta
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Show Meta Row', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'show_meta',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Author', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'meta_author',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Date', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'meta_date',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Categories', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'meta_category',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Comment Count', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'meta_comments',
		'group'      => 'Meta',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'dependency' => array( 'element' => 'show_meta', 'value' => 'yes' ),
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),

	// Links
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Make Title Clickable', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'link_title',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Make Image Clickable', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'link_image',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
		'std'        => 'yes',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => __( 'Open in New Tab', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'link_new_tab',
		'group'      => 'Links',
		'value'      => array( __( 'Yes', 'classic-addons-wpbakery-page-builder' ) => 'yes' ),
	),

	// Pagination
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Pagination', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'pagination',
		'group'      => 'Pagination',
		'value'      => array(
			__( 'None', 'classic-addons-wpbakery-page-builder' )            => 'none',
			__( 'Numbered', 'classic-addons-wpbakery-page-builder' )        => 'numbered',
			__( 'Load More Button', 'classic-addons-wpbakery-page-builder' ) => 'loadmore',
		),
		'std' => 'none',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Load More Button Text', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'loadmore_text',
		'group'      => 'Pagination',
		'value'      => __( 'Load More', 'classic-addons-wpbakery-page-builder' ),
		'dependency' => array( 'element' => 'pagination', 'value' => 'loadmore' ),
	),

	// Empty state
	array(
		'type'       => 'textarea',
		'heading'    => __( 'No Posts Message', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'empty_message',
		'group'      => 'Empty State',
		'value'      => __( 'No posts found.', 'classic-addons-wpbakery-page-builder' ),
	),

	// Style
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Card Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_bg',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Padding', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_padding',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Card Border Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_border_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Border Width', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_border_width',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Card Border Radius', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_radius',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Card Shadow', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'card_shadow',
		'group'      => 'Style',
		'value'      => array(
			__( 'None', 'classic-addons-wpbakery-page-builder' )   => 'none',
			__( 'Light', 'classic-addons-wpbakery-page-builder' )  => 'light',
			__( 'Medium', 'classic-addons-wpbakery-page-builder' ) => 'medium',
			__( 'Heavy', 'classic-addons-wpbakery-page-builder' )  => 'heavy',
		),
		'std' => 'light',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Title Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'title_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Font Size', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'title_font_size',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'textfield',
		'heading'    => __( 'Title Font Weight', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'title_font_weight',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Meta Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'meta_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Excerpt Color', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'excerpt_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'btn_bg',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Text', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'btn_color',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Hover Background', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'btn_bg_hover',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
	array(
		'type'       => 'colorpicker',
		'heading'    => __( 'Button Hover Text', 'classic-addons-wpbakery-page-builder' ),
		'param_name' => 'btn_color_hover',
		'group'      => 'Style',
		'edit_field_class' => 'vc_col-xs-6 vc_column',
	),
);
