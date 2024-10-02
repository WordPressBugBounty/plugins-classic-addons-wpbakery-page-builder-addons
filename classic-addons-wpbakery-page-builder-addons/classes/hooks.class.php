<?php 
/**
* All custom hooks
*/
class CAWPB_Hooks_Classic_Addons_WPBakery
{
	
	function __construct(){
		add_action( 'wcp_testimonial_display_rating', array($this, 'testimonial_display_rating'), 10, 1 );
		add_action( 'wcp_testimonial_display_company', array($this, 'testimonial_display_company'), 10, 2 );
		add_action( 'caw_render_icon_component', array($this, 'render_icon'), 10, 3 );
		add_action( 'caw_render_button_component', array($this, 'render_button'), 10, 3 );
	}

	function render_icon($attrs, $base, $has_body){
		include( CAWPB_PATH.'/templates/component/icon.php' );
	}

	function render_button($attrs, $base, $has_body){
		include( CAWPB_PATH.'/templates/component/button.php' );
	}

	function testimonial_display_company($company, $url){
		if ($url != '') { ?>
			<a target="_blank" href="<?php echo esc_url( $url ); ?>"><?php echo esc_attr( $company ); ?></a>
		<?php } else {
			echo esc_html($company);
		}
	}

	function testimonial_display_rating($count){
		switch ($count) {
			case '5.0':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
				break;
			case '4.5':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
				break;
			case '4.0':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
				break;
			case '3.5':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '3.0':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '2.5':
				echo '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '2.0':
				echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '1.5':
				echo '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '1.0':
				echo '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case '0.5':
				echo '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			
			default:
				echo '';
				break;
		}
	}
}