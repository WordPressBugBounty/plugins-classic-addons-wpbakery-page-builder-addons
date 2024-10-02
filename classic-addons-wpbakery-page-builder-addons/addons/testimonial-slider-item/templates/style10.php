<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style10">
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content">
      <?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
    <div class="arrow"></div>
  </figcaption>
  <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
  <div class="author">
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?> <span class="st-testimonial-company">- <?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h5>
    <span class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    	<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </span>    
  </div>
</figure>