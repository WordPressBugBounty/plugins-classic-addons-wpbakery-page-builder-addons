<?php
/**
 * Testimonial Slider Single Item Template
*/
 
/*
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
?>

<figure class="style11">
  <blockquote class="st-testimonial-bg st-testimonial-content">
  	<?php echo wpb_js_remove_wpautop($content); ?>
  </blockquote>
  <div class="author">
    <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
    <h5 class="st-testimonial-title"><?php echo esc_attr($title); ?> <span class="st-testimonial-company"> <?php do_action( 'wcp_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</figure>