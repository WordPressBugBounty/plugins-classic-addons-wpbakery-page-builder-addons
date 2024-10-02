<?php
extract( shortcode_atts( array(
	'icon_type'        => 'fontawesome',
	'body_bgclr'       => '',
	'body_border'      => '',
	'body_padding'     => '',
	'icon_border'      => '',
	'icon_margin'      => '',
	'icon_imgsize'     => '',
), $attrs ) );

$icon_border_css  = cawpb_add_inline_style($icon_border, $base, $attrs, 'caw-info-table');

$icon_margin_css  = cawpb_add_inline_style($icon_margin, $base, $attrs, 'caw-info-table');

if ($has_body) {
	$body_border_css  = cawpb_add_inline_style($body_border, $base, $attrs, 'caw-info-table');
	$body_padding_css  = cawpb_add_inline_style($body_padding, $base, $attrs, 'caw-info-table');

	// Body Inline Style
	$body_istyle = '';
	if ( $body_bgclr ) {
		$body_istyle .= 'background:' . esc_attr( $body_bgclr ) . ';';
	}
}

$icon_class = cawpb_get_icon_class('icon', $icon_type, $attrs);
$icon_css   = cawpb_icon_styles('icon', $attrs, array('font-size' => '20px'));
$icon_wrapperclass = 'caw-icon-component-style';

if ($icon_type == 'imageicon') {
    $icon_wrapperclass = 'caw-imgicon-component-style';
    $img_border = $icon_border_css;
    $icon_border_css = '';
}

$icon_istyle = '';
$img_istyle  = '';
$icon_istyle .= 'display:inline-block;';
$icon_radius = cawpb_get_border_radius_css('icon', $attrs);

if ($icon_type != 'imageicon') {
	$icon_istyle .= $icon_css;
	$icon_istyle .= $icon_radius;			
} else {
	$img_istyle .= $icon_radius;
	if ( $icon_imgsize ) {
		$img_istyle .= 'max-width:' . esc_attr( $icon_imgsize ) . ';';
	}
}
?>
		
<?php if ($icon_class){ ?>
	<?php if ($has_body) { ?>
		<div class="caw-it-body <?php echo esc_attr($body_border_css); ?> <?php echo esc_attr($body_padding_css); ?>" style="<?php echo esc_attr($body_istyle); ?>">
	<?php } ?>
		<div class="<?php echo esc_attr($icon_wrapperclass); ?>">
			<div class="<?php echo esc_attr($icon_border_css); ?> <?php echo esc_attr($icon_margin_css); ?>"  style="<?php echo esc_attr($icon_istyle); ?>">
				<?php if ($icon_type == 'imageicon') { ?>
					<img src="<?php echo esc_url($icon_class); ?>" style="<?php echo esc_attr($img_istyle); ?>" class="<?php echo esc_attr($img_border); ?>" >
				<?php } else { ?>
					<i class="<?php echo esc_attr($icon_class); ?>"></i>
				<?php } ?>								
			</div>
		</div>
	<?php if ($has_body) { ?>
		</div>
	<?php } ?>
<?php } ?>