<?php
/**
 * Padding Style Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
$param_type = isset( $settings['type'] ) ? $settings['type'] : '';
$class      = isset( $settings['class'] ) ? ' ' . $settings['class'] : '';
$heading    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';

$styles = cawpb_border_style();
?>

<div class="caw-border-style-wrapper">
	<div class="caw-style-handler" data-border="<?php echo esc_attr($value); ?>">
		<div class="vc_col-xs-1 vc_column">
			<label><?php esc_html_e( 'Left', 'landz' ); ?></label>
			<input type="text" name="padding_left" class="caw-padding-input" data-name="padding-left">
		</div>
		<div class="vc_col-xs-1 vc_column">
			<label><?php esc_html_e( 'right', 'landz' ); ?></label>
			<input type="text" name="padding_right" class="caw-padding-input" data-name="padding-right">
		</div>
		<div class="vc_col-xs-1 vc_column">
			<label><?php esc_html_e( 'Top', 'landz' ); ?></label>
			<input type="text" name="padding_top" class="caw-padding-input" data-name="padding-top">
		</div>
		<div class="vc_col-xs-1 vc_column">
			<label><?php esc_html_e( 'Bottom', 'landz' ); ?></label>
			<input type="text" name="padding_bottom" class="caw-padding-input" data-name="padding-bottom">
		</div>
		
		<input type="hidden" name="<?php echo esc_attr( $param_name ); ?>" class="caw-padding-input-js wpb_vc_param_value <?php echo esc_attr( $param_name ) ?> <?php echo esc_attr( $param_type ) ?>_field" value="<?php echo esc_attr( $value ); ?>"/>
	</div>
</div>

<style type="text/css">
	.caw-border-style-wrapper label{
		display: block !important;
		margin-bottom: 4px !important;
    	font-size: 12px !important;
	}
	.caw-style-handler .caw-padding-input{	    
	    text-align: center !important;
	    padding: 3px 0 !important;
	    height: 24px!important;
	    width: 34px!important;
	    margin: 0!important;
	    border: 1px solid #bdbdbd!important;
	    font-size: 11px!important;
	    line-height: 11px!important;
	}
	.caw-style-handler .vc_column{
		padding: 0 !important;
	}
	.caw-style-handler .wp-picker-container{
		display: block !important;
	}
	.caw-style-handler .color-group{
		margin-left: 22px !important;
	}
</style>