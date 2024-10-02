(function ($, undefined) {
	$(document).ready(function() {
		
		jQuery('.caw-flipbook-loader').hide();

		$('.caw-flipbook-inner').each(function(index, el) {
			var mode = $(el).data('mode');
			var book_width = $(el).data('width');
			$(el).flipper({
				'arrows' : true,
				'pager' : true,
				'imagesPath' : wcpbook.path,
				'width' : parseInt(book_width),
			});

			if(mode == 'caw_fb_dual_pages'){
				$('.flipper-page-wrap').each(function(index, el) {
					var css_class = $(this).data('styles');
					$(this).find('.flipper-page').addClass(css_class);
				});
			}
		});

	});

	jQuery(window).resize(function(event) {
		jQuery('.caw-flipbook-loader').show();
		var bk_width = jQuery('.caw-flipbook-loader').innerWidth();
		jQuery('.caw-flipbook-inner').css('width', bk_width);
		jQuery('.caw-flipbook-loader').hide();
	});
	

	jQuery(window).load(function(event) {
		jQuery(window).trigger('resize');
	});

}(jQuery));