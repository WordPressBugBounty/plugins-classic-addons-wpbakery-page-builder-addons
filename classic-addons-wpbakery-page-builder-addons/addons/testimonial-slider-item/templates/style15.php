<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="st-style15">
  <?php echo wp_get_attachment_image($image_id, 'thumbnail', '', array('class' => 'profile') ); ?>
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content">
    	<?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
  </figcaption>
  <h3 class="st-testimonial-title"><?php echo esc_attr($title); ?><span class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h3>
</figure>