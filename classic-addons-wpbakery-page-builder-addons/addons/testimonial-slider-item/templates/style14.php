<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="st-style14">
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content">
      <?php echo wpb_js_remove_wpautop($content); ?>
    </blockquote>
    <div class="starrating st-rating" title="Rated <?php echo esc_attr($stars); ?> out of 5.0">
    	<?php do_action( 'wcp_testimonial_display_rating', $stars ); ?>
    </div>      
    <h3 class="st-testimonial-title"><?php echo esc_attr($title); ?></h3>
    <h4 class="st-testimonial-company"><?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></h4>
  </figcaption>
</figure>