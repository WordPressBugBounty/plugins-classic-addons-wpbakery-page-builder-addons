<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="st-style17">
  <figcaption class="st-testimonial-bg"><?php echo wp_get_attachment_image($image_id, 'thumbnail', '', array('class' => 'profile') ); ?>
    <blockquote class="st-testimonial-content">
    	<?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
  </figcaption>
  <h3 class="st-testimonial-title"><?php echo esc_attr($title); ?><span class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h3>
    <span class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    	<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </span>  
</figure>