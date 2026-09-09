<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'icon_type'        => 'fontawesome',
	'body_bgclr'       => '',
	'body_border'      => '',
	'body_padding'     => '',
	'icon_border'      => '',
	'icon_margin'      => '',
	'icon_imgsize'     => '',
), $attrs ) );

$cawpb_icon_border_css  = cawpb_add_inline_style($icon_border, $base, $attrs, 'caw-info-table');

$cawpb_icon_margin_css  = cawpb_add_inline_style($icon_margin, $base, $attrs, 'caw-info-table');

if ($has_body) {
	$cawpb_body_border_css  = cawpb_add_inline_style($body_border, $base, $attrs, 'caw-info-table');
	$cawpb_body_padding_css  = cawpb_add_inline_style($body_padding, $base, $attrs, 'caw-info-table');

	// Body Inline Style
	$cawpb_body_istyle = '';
	if ( $body_bgclr ) {
		$cawpb_body_istyle .= 'background:' . esc_attr( $body_bgclr ) . ';';
	}
}

$cawpb_icon_class = cawpb_get_icon_class('icon', $icon_type, $attrs);
$cawpb_icon_css   = cawpb_icon_styles('icon', $attrs, array('font-size' => '20px'));
$cawpb_icon_wrapperclass = 'caw-icon-component-style';

if ($icon_type == 'imageicon') {
    $cawpb_icon_wrapperclass = 'caw-imgicon-component-style';
    $cawpb_img_border = $cawpb_icon_border_css;
    $cawpb_icon_border_css = '';
}

$cawpb_icon_istyle = '';
$cawpb_img_istyle  = '';
$cawpb_icon_istyle .= 'display:inline-block;';
$cawpb_icon_radius = cawpb_get_border_radius_css('icon', $attrs);

if ($icon_type != 'imageicon') {
	$cawpb_icon_istyle .= $cawpb_icon_css;
	$cawpb_icon_istyle .= $cawpb_icon_radius;			
} else {
	$cawpb_img_istyle .= $cawpb_icon_radius;
	if ( $icon_imgsize ) {
		$cawpb_img_istyle .= 'max-width:' . esc_attr( $icon_imgsize ) . ';';
	}
}
?>
		
<?php if ($cawpb_icon_class){ ?>
	<?php if ($has_body) { ?>
		<div class="caw-it-body <?php echo esc_attr($cawpb_body_border_css); ?> <?php echo esc_attr($cawpb_body_padding_css); ?>" style="<?php echo esc_attr($cawpb_body_istyle); ?>">
	<?php } ?>
		<div class="<?php echo esc_attr($cawpb_icon_wrapperclass); ?>">
			<div class="<?php echo esc_attr($cawpb_icon_border_css); ?> <?php echo esc_attr($cawpb_icon_margin_css); ?>"  style="<?php echo esc_attr($cawpb_icon_istyle); ?>">
				<?php if ($icon_type == 'imageicon') { ?>
					<img src="<?php echo esc_url($cawpb_icon_class); ?>" style="<?php echo esc_attr($cawpb_img_istyle); ?>" class="<?php echo esc_attr($cawpb_img_border); ?>" >
				<?php } else { ?>
					<i class="<?php echo esc_attr($cawpb_icon_class); ?>"></i>
				<?php } ?>								
			</div>
		</div>
	<?php if ($has_body) { ?>
		</div>
	<?php } ?>
<?php } ?>