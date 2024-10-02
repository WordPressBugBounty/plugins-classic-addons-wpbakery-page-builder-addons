jQuery(document).ready(function($) {
	
	if ($('.caw-single-image-wrapper').hasClass('caw-single-image-zoom')) {
		$('.caw-single-image-zoom a').zoom();
	}

	if ($('.caw-single-image-wrapper').hasClass('caw-single-image-popop')) {
		new SimpleLightbox('.caw-single-image-popop a', {});	
	}
	
	$(".hover").mouseleave(
	 	function () {
	    	$(this).removeClass("hover");
	  	}
  	);
});