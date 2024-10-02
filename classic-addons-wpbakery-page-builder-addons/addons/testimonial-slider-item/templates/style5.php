<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="st-style5">
  <?php echo wp_get_attachment_image($image_id, 'full' ); ?>
  <div class="border one">
    <div></div>
  </div>
  <div class="border two">
    <div></div>
  </div>
  <figcaption>
    <blockquote class="st-testimonial-content">
      <?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
    <div class="starrating st-rating">
      <?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </div>    
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?><span class="st-testimonial-company"><?php echo esc_attr( $company ); ?></span></h5>
  </figcaption> <?php echo ($url != '') ? '<a href="'.esc_url($url).'"></a>' : $url ; ?>
</figure>