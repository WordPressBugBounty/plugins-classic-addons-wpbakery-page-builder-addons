<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style1">
  <blockquote class="st-testimonial-content st-testimonial-bg">
	<?php echo wpb_js_remove_wpautop($content); ?>
  	<div class="arrow"></div>
  </blockquote>
  <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
  <div class="author st-testimonial-bg">
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?> <span class="st-testimonial-company">- <?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h5>
    <span class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    	<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </span>
  </div>
</figure>