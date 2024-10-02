<?php
/**
 * Helpers Functions
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

/*
**========== Print Array =========== 
*/
function cawpb_pa($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

/*
**========== Load Templates =========== 
*/
function cawpb_load_templates( $template_name, $vars = null) {

    if( $vars != null && is_array($vars) ){
        extract( $vars );
    }

    $default_path =  CAWPB_PATH . "/templates/{$template_name}";
    
    if( file_exists( $default_path ) ){
        require ( $default_path );
    } else {
        die( "Error while loading file {$default_path}" );
    }
}


/*
**========== Get Image Sizes =========== 
*/
function cawpb_get_image_sizes(){
	$sizes = array(__( 'Default', 'classic-addons' ) => '');
    $image_sizes = get_intermediate_image_sizes();
    foreach ($image_sizes as $index => $val) {
      $sizes[$val] = $val;
    }

    return $sizes;                    
}


/*
**========== Generate Random Key =========== 
*/
function cawpb_get_random_class($prefix=''){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	$randomString = "{$prefix}-";
	for ($i = 0; $i < 5; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function cawpb_get_unique_class($prefix=''){

	$class_name = '';

	if ($prefix != '') {
		$prefix = "{$prefix}-";
	}

	$class_name .= wp_unique_id($prefix);
	
	if ($class_name != '') {
		$class_name .='-box';
	}
	return $class_name;
}


/*
**========== Get Border Radius CSS =========== 
*/
function cawpb_get_border_radius_css($key, $attrs, $defaults = array()){

	$style_attributes = array(
		'border-radius',
	);

	$css = '';
	$def = (isset($defaults['border-radius'])) ? $defaults['border-radius'] : '' ;
	$attr_key = str_replace("-", "_", 'border-radius');
	$val = (isset($attrs[$key.'_'.$attr_key])) ? $attrs[$key.'_'.$attr_key] : $def ;	

	if ($val != '') {
		$css .= "border-radius: $val;";
	}

	return $css;
}


/*
**========== Get Button Basic CSS =========== 
*/
function cawpb_get_btn_css($key, $attrs, $defaults = array()){

	$style_attributes = array(
		'font-size',
		'color',
		'background-color',
		'border-radius',
	);

	$css = '';
	foreach ($style_attributes as $style_attribute) {

		$def = (isset($defaults[$style_attribute])) ? $defaults[$style_attribute] : '' ;
		$attr_key = str_replace("-", "_", $style_attribute);
		$val = (isset($attrs[$key.'_'.$attr_key])) ? $attrs[$key.'_'.$attr_key] : $def ;

		if ($val != '') {
			$css .= "$style_attribute: $val;";
		}
	}

	return $css;
}


/*
**========== Get Typograpy Basic CSS =========== 
*/
function cawpb_get_typo_styles($key, $attrs, $defaults = array()){

	$style_attributes = array(
		'font-size',
		'font-family',
		'color',
		'line-height',
		'background-color',
	);

	$css = '';
	foreach ($style_attributes as $style_attribute) {

		$def = (isset($defaults[$style_attribute])) ? $defaults[$style_attribute] : '' ;
		$attr_key = str_replace("-", "_", $style_attribute);
		$val = (isset($attrs[$key.'_'.$attr_key])) ? $attrs[$key.'_'.$attr_key] : $def ;

		if ($val != '' && 'font_family' != $attr_key) {
			$css .= "$style_attribute: $val;";
		}

		// var_dump($attr_key);
		if ('font_family' == $attr_key) {

			$fontsData = vc_parse_multi_attribute($val);

			if(isset($fontsData['font_family'])){
				// var_dump($fontsData['font_family']);
				$googlefonts_style = cawpb_googlefonts_style( $fontsData );
				cawpb_enqueue_googlefonts( $fontsData );
				$css .= $googlefonts_style;
			}
		}
	}

	return $css;
}


/*
**========== Get Icons CSS =========== 
*/
function cawpb_icon_styles($key, $attrs, $defaults = array()){

	$style_attributes = array(
		'font-size',
		'background-color',
		'color',
	);

	$css = '';
	if ($key != 'iconbox') {		
		foreach ($style_attributes as $style_attribute) {

			$def = (isset($defaults[$style_attribute])) ? $defaults[$style_attribute] : '' ;
			$attr_key = str_replace("-", "_", $style_attribute);
			$val = (isset($attrs[$key.'_'.$attr_key])) ? $attrs[$key.'_'.$attr_key] : $def ;

			if ($val != '') {
				$css .= "$style_attribute: $val;";
			}
		}
	}
	
	$iconbox = (isset($attrs[$key.'_boxsize'])) ? $attrs[$key.'_boxsize'] : '' ;
	if ($iconbox) {
		$css .= 'width: ' . esc_attr( $iconbox ) . ';';
		$css .= 'height: ' . esc_attr( $iconbox ) . ';';
		$css .= 'line-height: ' . esc_attr( $iconbox ) . ';';	
	}	

	return $css;
}


/*
**========== Get GoogleFonts CSS =========== 
*/
function cawpb_googlefonts_style( $fontsData ) {
	
	$css = '';
	$font_style = isset($fontsData['font_style']) ? $fontsData['font_style']: '';
	$fontFamily = explode( ':', $fontsData['font_family'] );
	$fontStyles = explode( ':', $font_style );
	$family = isset($fontFamily[0]) ? $fontFamily[0] : '';
	$weight = isset($fontStyles[1]) ? $fontStyles[1] : '';
	$style = isset($fontStyles[2]) ? $fontStyles[2] : '';
	$css .= 'font-family:' .$family.';';
	$css .= 'font-weight:' .$weight.';';
	$css .= 'font-style:' .$style.';';

	return $css;
}


/*
**========== Load GoogleFonts =========== 
*/
function cawpb_enqueue_googlefonts( $fontsData ) {
	
	$settings = get_option( 'wpb_js_google_fonts_subsets' );
	if ( is_array( $settings ) && ! empty( $settings ) ) {
		$subsets = '&subset=' . implode( ',', $settings );
	} else {
		$subsets = '';
	}
	if ( isset( $fontsData['font_family'] ) ) {
		wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['font_family'] ), '//fonts.googleapis.com/css?family=' . $fontsData['font_family'] . $subsets );
	}
}


/*
**========== Border Style Options =========== 
*/
function cawpb_border_style(){

	$style = array(
			esc_html__( 'None', 'classic-addons' )	   => 'none',
			esc_html__( 'Solid', 'classic-addons' )    => 'solid',
			esc_html__( 'Dotted', 'classic-addons' )   => 'dotted',
			esc_html__( 'Dashed', 'classic-addons' )   => 'dashed',
			esc_html__( 'Double', 'classic-addons' )   => 'double',
			esc_html__( 'Groove', 'classic-addons' )   => 'groove',
			esc_html__( 'Ridge', 'classic-addons' )	   => 'rige',
			esc_html__( 'Inset', 'classic-addons' )	   => 'inset',
			esc_html__( 'Outset', 'classic-addons' )   => 'outset',
		);

	return apply_filters( 'cawpb_border_style_options_data', $style);
}


function cawpb_get_image_by_size( $params = array() ) {

	$params = array_merge( array(
		'post_id'    => null,
		'attach_id'  => null,
		'thumb_size' => 'full',
		'class'      => '',
	), $params );

	if ( ! $params['thumb_size'] ) {
		$params['thumb_size'] = 'full';
	}

	$img_style = '';
	if ( isset($params['style']) && $params['style'] != '' ) {
		$img_style = $params['style'];
	}

	if ( ! $params['attach_id'] && ! $params['post_id'] ) {
		return false;
	}

	$image_url = '';

	$post_id = $params['post_id'];

	$attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
	$thumb_size = $params['thumb_size'];
	$thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

	global $_wp_additional_image_sizes;
	$thumbnail = '';

	$sizes = array(
		'thumbnail',
		'thumb',
		'medium',
		'large',
		'full',
	);
	if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {

		$attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );

		if ($img_style) {
			$attributes['style'] = $img_style;
		}

		$thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );

	} elseif ( $attach_id ) {		
		if ( is_string( $thumb_size ) ) {
			preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
			if ( isset( $thumb_matches[0] ) ) {
				$thumb_size = array();
				$count = count( $thumb_matches[0] );
				if ( $count > 1 ) {
					$thumb_size[] = $thumb_matches[0][0]; // width
					$thumb_size[] = $thumb_matches[0][1]; // height
				} elseif ( 1 === $count ) {
					$thumb_size[] = $thumb_matches[0][0]; // width
					$thumb_size[] = $thumb_matches[0][0]; // height
				} else {
					$thumb_size = false;
				}
			}
		}
		if ( is_array( $thumb_size ) ) {
			// Resize image to custom size
			$p_img = wpb_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
			$alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
			$attachment = get_post( $attach_id );
			if ( ! empty( $attachment ) ) {
				$title = trim( wp_strip_all_tags( $attachment->post_title ) );

				if ( empty( $alt ) ) {
					$alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
				}
				if ( empty( $alt ) ) {
					$alt = $title;
				}

				if ( $p_img ) {

					$img_props = array(
						'class'  => $thumb_class,
						'src'    => $p_img['url'],
						'width'  => $p_img['width'],
						'height' => $p_img['height'],
						'alt'    => $alt,
						'title'  => $title,
					);

					if ($img_style) {
						$img_props['style'] = $img_style;
					}

					$attributes = vc_stringify_attributes($img_props);

					$thumbnail = '<img ' . $attributes . ' />';
				}
			}
		}
	}


	$p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );	
	$image_url = wp_get_attachment_image_url( $attach_id, 'full' );


	return apply_filters( 'caw_get_image_by_size', array(
		'thumbnail'   => $thumbnail,
		'p_img_large' => $p_img_large,
		'image_url'   => $image_url,
	), $attach_id, $params );
}

function cawpb_icon_fonts_enqueue( $type ) {
	switch ( $type ) {
		case 'fontawesome':
			wp_enqueue_style( 'vc_font_awesome_5' );
			break;	
		case 'linecons':
			wp_enqueue_style( 'vc_linecons' );
			break;
	}
}

function cawpb_get_icon_class( $key, $type, $attrs, $default = '' ) {
	
	cawpb_icon_fonts_enqueue($type);
	
	$icon_class = '';
	$icon_class = (isset($attrs[$key.'_'.$type])) ? $attrs[$key.'_'.$type] : $default;

	if (is_numeric($icon_class)) {
		$image_arr = wp_get_attachment_image_src( $icon_class);
		$icon_class = isset($image_arr[0]) ? $image_arr[0] : '';		
	}

	return $icon_class;
}

function cawpb_sanitize_html_classes($classes, $sep = " "){
    $return = "";

    if(!is_array($classes)) {
        $classes = explode($sep, $classes);
    }

    if(!empty($classes)){
        foreach($classes as $class){
            $return .= sanitize_html_class($class) . " ";
        }
    }

    return $return;
}

function cawpb_add_inline_style($css, $addon_id, $attrs, $style_handler = ''){

	$styleClass = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $addon_id, $attrs );

	if ($style_handler != '') {		
		wp_add_inline_style( $style_handler, $css );
	}

	return $styleClass;
}