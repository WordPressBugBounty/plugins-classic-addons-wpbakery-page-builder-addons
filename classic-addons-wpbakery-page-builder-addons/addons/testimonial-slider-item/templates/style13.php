<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="st-style13">
  <?php echo wp_get_attachment_image( $image_id,  'full' ); ?>
  <figcaption>
    <blockquote class="st-testimonial-content">
      <?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
    <h3 class="st-testimonial-title"><?php echo esc_attr($title); ?></h3>
    <h5 class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></h5>
  </figcaption>
</figure>