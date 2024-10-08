jQuery(document).ready(function($) {
	$(".caw-slick-trigger").each(function(index, el) {
		var slick_ob = {
		  	infinite: true,
			dots: ($(this).data('dots') == true) ? true : false,		  
			arrows: ($(this).data('arrows') == true) ? true : false,		  
			autoplay: ($(this).data('autoplay') == true) ? true : false,
			autoplaySpeed: $(this).data('autoplayspeed'),
			draggable: true,
			speed: $(this).data('speed'),
			slidesToShow: $(this).data('slidestoshow'),
			slidesToScroll: $(this).data('slidestoscroll'),
			slidesPerRow: $(this).data('slidesperrow'),
			rows: $(this).data('rows'),
		  	responsive: [{
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    }]			
		};
		$(this).slick(slick_ob);
	});	
});