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

$button_link = vc_build_link($btn_link);

$btn_border_css  = cawpb_add_inline_style($btn_border, $base, $attrs, $base);
$btn_margin_css  = cawpb_add_inline_style($btn_margin, $base, $attrs, $base);
$btn_padding_css = cawpb_add_inline_style($btn_padding, $base, $attrs, $base);

// Button Inline Style
$btn_css = cawpb_get_btn_css('btn', $attrs);
$btn_istyle  = '';
$btn_istyle .= 'display:inline-block;';
$btn_istyle .= $btn_css;

$icon_name = cawpb_get_icon_class('btn', $btn_icontype, $attrs);

$inline_style = '';
if ($btn_hvr_color) {	
	$inline_style.= '.'.esc_attr($addon_id). " a.caw-btn:hover{ color:".esc_attr($btn_hvr_color)." !important;}";
}

if ($btn_hvr_background_color) {
	
	$inline_style.= '.'.esc_attr($addon_id). " a.caw-btn:hover{ background-color:".esc_attr($btn_hvr_background_color)." !important;}";
}

wp_add_inline_style( $base, $inline_style );

$btn_classes = array(
	'caw-btn',
	'vc_general',
	'vc_btn3',
	'vc_btn3-size-xs',
	$btn_border_css,
	$btn_margin_css,
	$btn_padding_css
);

?>

<?php if(!empty($btn_text)){ ?>
	<a 
		href="<?php echo esc_url($button_link['url']); ?>" 
		class="<?php echo cawpb_sanitize_html_classes($btn_classes); ?>" 
		title="<?php echo esc_attr($button_link['title']); ?>" 
		ref="<?php echo esc_attr($button_link['rel']); ?>" 
		target="<?php echo esc_attr($button_link['target']); ?>" 
		style="<?php echo esc_attr($btn_istyle); ?>"
	>

		<?php  if ($btn_iconpos =='left'){  ?>
			<i class="<?php echo esc_attr($icon_name); ?>"></i>
		<?php } ?>

		<?php echo esc_attr( $btn_text ); ?>

		<?php if($btn_iconpos =='right'){ ?>
			<i class="<?php echo esc_attr($icon_name); ?>"></i>
		<?php } ?>
	</a>
<?php } ?>