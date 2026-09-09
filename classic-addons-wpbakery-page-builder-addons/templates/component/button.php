<?php
/**
 * Button Component
 * 
 * This component include the following addons
 * 
 * info-table
 * flip-box
 * info-banner
 * 
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

extract( shortcode_atts( array(
	'btn_text'         => 'Click Me!',
	'btn_link'         => '',
	'btn_border'       => '',
	'btn_margin'       => '',
	'btn_padding'      => '',	
	'btn_icontype'     => 'fontawesome',
	'btn_iconpos'	   => 'none',
	'addon_id'	       => '',
	'btn_hvr_color'            => '',
	'btn_hvr_background_color' => '',
), $attrs ) );

$cawpb_button_link = vc_build_link($btn_link);

$cawpb_btn_border_css  = cawpb_add_inline_style($btn_border, $base, $attrs, $base);
$cawpb_btn_margin_css  = cawpb_add_inline_style($btn_margin, $base, $attrs, $base);
$cawpb_btn_padding_css = cawpb_add_inline_style($btn_padding, $base, $attrs, $base);

// Button Inline Style
$cawpb_btn_css = cawpb_get_btn_css('btn', $attrs);
$cawpb_btn_istyle  = '';
$cawpb_btn_istyle .= 'display:inline-block;';
$cawpb_btn_istyle .= $cawpb_btn_css;

$cawpb_icon_name = cawpb_get_icon_class('btn', $btn_icontype, $attrs);

$cawpb_inline_style = '';
if ($btn_hvr_color) {	
	$cawpb_inline_style.= '.'.esc_attr($addon_id). " a.caw-btn:hover{ color:".esc_attr($btn_hvr_color)." !important;}";
}

if ($btn_hvr_background_color) {
	
	$cawpb_inline_style.= '.'.esc_attr($addon_id). " a.caw-btn:hover{ background-color:".esc_attr($btn_hvr_background_color)." !important;}";
}

wp_add_inline_style( $base, $cawpb_inline_style );

$cawpb_btn_classes = array(
	'caw-btn',
	'vc_general',
	'vc_btn3',
	'vc_btn3-size-xs',
	$cawpb_btn_border_css,
	$cawpb_btn_margin_css,
	$cawpb_btn_padding_css
);

?>

<?php if(!empty($btn_text)){ ?>
	<a 
		href="<?php echo esc_url($cawpb_button_link['url']); ?>" 
		class="<?php echo esc_attr( cawpb_sanitize_html_classes( $cawpb_btn_classes ) ); ?>" 
		title="<?php echo esc_attr($cawpb_button_link['title']); ?>" 
		ref="<?php echo esc_attr($cawpb_button_link['rel']); ?>" 
		target="<?php echo esc_attr($cawpb_button_link['target']); ?>" 
		style="<?php echo esc_attr($cawpb_btn_istyle); ?>"
	>

		<?php  if ($btn_iconpos =='left'){  ?>
			<i class="<?php echo esc_attr($cawpb_icon_name); ?>"></i>
		<?php } ?>

		<?php echo esc_attr( $btn_text ); ?>

		<?php if($btn_iconpos =='right'){ ?>
			<i class="<?php echo esc_attr($cawpb_icon_name); ?>"></i>
		<?php } ?>
	</a>
<?php } ?>