<?php
/**
 * Button Addon Settings
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

$params = array(
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Style', 'classic-addons' ),
		"param_name" 	=> "btn_style",
		"description" 	=> __( 'Choose the button style.', 'classic-addons' ),
		"group" 		=> 'General',
		"value" 		=> array(
			'Animated Button' =>  'animated'
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Animation Style', 'classic-addons' ),
		"param_name" 	=> "animated_style",
		"description" 	=> __( 'Choose animation style on hover', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "btn_style", 
			'value' => 'animated'
		),
		"value" 		=> array(
			'2D Transition'         =>  'transition',
			'Background Transition' =>  'bg_transition',
			'Shadow and Glow'       =>  'shadow',
			'Border Transition'     =>  'brdr_transition',
			'Speech Bubbles'        =>  'speech_bubbles',
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( '2D Transition', 'classic-addons' ),
		"param_name" 	=> "animated_trans",
		"description" 	=> __( 'Choose 2D Transition style.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'transition'
		),
		"value" => array(
			'Grow' 			=>  'hvr-grow',
			'Shrink' 		=>  'hvr-shrink',
			'Pulse'		    =>	'hvr-pulse',
			'Pulse Grow'	=>	'hvr-pulse-grow',
			'Pulse Shrink'	=>	'hvr-pulse-shrink',
			'Push'			=>	'hvr-push',
			'Pop'			=>	'hvr-pop',
			'Bounce In'		=>	'hvr-bounce-in',
			'Bounce Out'	=>	'hvr-bounce-out',
			'Rotate'		=>	'hvr-rotate',
			'Grow Rotate'	=>	'hvr-grow-rotate',
			'Float'			=>	'hvr-float',
			'Sink'			=>	'hvr-sink',
			'Bob'			=>	'hvr-bob',
			'Hang'			=>	'hvr-hang',
			'Skew'			=>	'hvr-skew',
			'Skew Forward'	=>	'hvr-skew-forward',
			'Skew Backward'	=>	'hvr-skew-backward',
			'Wobble Horizontal'	     =>	'hvr-wobble-horizontal',
			'Wobble Vertical'	     =>	'hvr-wobble-vertical',
			'Wobble To Bottom Right' =>	'hvr-wobble-to-bottom-right',
			'Wobble To Top Right'	 =>	'hvr-wobble-to-top-right',
			'Wobble Top'	=>	'hvr-wobble-top',
			'Wobble Bottom'	=>	'hvr-wobble-bottom',
			'Wobble Skew'	=>	'hvr-wobble-skew',
			'Buzz'			=>	'hvr-buzz',
			'Buzz Out'		=>	'hvr-buzz-out',
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Background Transition', 'classic-addons' ),
		"param_name" 	=> "background_trans",
		"description" 	=> __( 'Choose background transition style.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'bg_transition'
		),
		"value" 		=> array(
			'Fade'             => 'hvr-fade',
			'Back Pulse'       => 'hvr-back-pulse',
			'Sweep To Right'   => 'hvr-sweep-to-right',
			'Sweep To Left'    => 'hvr-sweep-to-left',
			'Sweep To Bottom'  => 'hvr-sweep-to-bottom',
			'Sweep To Top'     => 'hvr-sweep-to-top',
			'Bounce To Right'  => 'hvr-bounce-to-right',
			'Bounce To Left'   => 'hvr-bounce-to-left',
			'Bounce To Bottom' => 'hvr-bounce-to-bottom',
			'Bounce To Top'    => 'hvr-bounce-to-top',
			'Radial Out'       => 'hvr-radial-out',
			'Rectangle Out'    => 'hvr-rectangle-out',
			'Shutter Out Horizontal' => 'hvr-shutter-out-horizontal',
			'Shutter Out Vertical'   => 'hvr-shutter-out-vertical',
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Border Transition', 'classic-addons' ),
		"param_name" 	=> "border_trans",
		"description" 	=> __( 'Choose border transition style.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'brdr_transition'
		),
		"value" => array(
			'Underline From Left'   => 'hvr-underline-from-left',
			'Underline From Center' => 'hvr-underline-from-center',
			'Underline From Right'  => 'hvr-underline-from-right',
			'Underline Reveal'      => 'hvr-underline-reveal',
			'Overline Reveal'       => 'hvr-overline-reveal',
			'Overline From Left'    => 'hvr-overline-from-left',
			'Overline From Center'  => 'hvr-overline-from-center',
			'Overline From Right'   => 'hvr-overline-from-right',
			'Reveal'                => 'hvr-reveal',
		)
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __( 'Border Animation Color', 'classic-addons' ),
		"param_name" 	=> "border_trans_clr",
		"description" 	=> __( 'It will apply on button transitoin.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'brdr_transition'
		),
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Speech Bubbles', 'classic-addons' ),
		"param_name" 	=> "bubble_trans",
		"description" 	=> __( 'Choose speech bubbles style.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'speech_bubbles'
		),
		"value" => array(
			'Bubble Top'          =>  'hvr-bubble-top',
			'Bubble Right'        =>  'hvr-bubble-right',
			'Bubble Bottom'       =>  'hvr-bubble-bottom',
			'Bubble Left'         =>  'hvr-bubble-left',
			'Bubble Float Top'    =>  'hvr-bubble-float-top',
			'Bubble Float Right'  =>  'hvr-bubble-float-right',
			'Bubble Float Bottom' =>  'hvr-bubble-float-bottom',
			'Bubble Float Left'   =>  'hvr-bubble-float-left',
		)
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __( 'Shadow and Glow', 'classic-addons' ),
		"param_name" 	=> "shadow_trans",
		"description" 	=> __( 'Choose shadow and glow style.', 'classic-addons' ),
		"group" 		=> 'General',
		"dependency" => array(
			'element' => "animated_style", 
			'value' => 'shadow'
		),
		"value" => array(
			'Shadow'		    =>	'hvr-shadow',
			'Grow Shadow'	    =>	'hvr-grow-shadow',
			'Float Shadow'	    =>	'hvr-float-shadow',
			'Glow'			    =>	'hvr-glow',
			'Shadow Radial'	    =>	'hvr-shadow-radial',
			'Box Shadow Outset'	=>	'hvr-box-shadow-outset',
			'Box Shadow Inset'	=>	'hvr-box-shadow-inset',
		)
	),
	array(
		"type" 			=> 	"dropdown",
		"heading" 		=> 	__( 'Alignment', 'classic-addons' ),
		"param_name" 	=> 	"btn_alignment",
		"description" 	=> 	__( 'select text align', 'classic-addons' ),
		"group" 		=> 	'General',
		"value" => array(
			"Left"	 => "left",
			"Center" => "center",
			"Right"	 => "right",
		)
	),
);