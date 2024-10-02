<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style7 st-testimonial-bg">
  <i class="fa fa-quote-left"></i>
  <blockquote class="st-testimonial-content st-testimonial-bg">
  	<?php echo wpb_js_remove_wpautop($content); ?>
  </blockquote>
    <div class="starrating st-rating">
      <?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </div>
  <?php echo wp_get_attachment_image($image_id, 'full' ); ?>
  <div class="author">
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?><span class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</figure>