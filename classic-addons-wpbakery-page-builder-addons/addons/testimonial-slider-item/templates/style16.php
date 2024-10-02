<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style16">
  <?php echo wp_get_attachment_image($image_id, 'thumbnail', '', array('class' => 'profile') ); ?>
  <figcaption>
    <h2 class="st-testimonial-title"><?php echo esc_attr($title); ?></h2>
    <h4 class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></h4>
    <div class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    	<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </div>    
    <blockquote class="st-testimonial-bg st-testimonial-content">
    	<?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
  </figcaption>
</figure>