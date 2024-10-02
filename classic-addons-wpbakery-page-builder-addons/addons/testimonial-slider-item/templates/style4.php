<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style4 st-testimonial-bg">
  <blockquote class="st-testimonial-content">
  	<?php echo wpb_js_remove_wpautop($content); ?>
  </blockquote>
      	<div class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    		<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    	</div>
  <div class="author"><?php echo wp_get_attachment_image($image_id, 'thumbnail' ); ?>
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?></h5><span class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span>
  </div>
</figure>