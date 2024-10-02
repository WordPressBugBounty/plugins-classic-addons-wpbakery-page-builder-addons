jQuery(function($) {

	if($('.caw-aheading-wrapper').length){
		$('.caw-aheading-wrapper').each(function(index, el) {

			var spinTime = $(this).data('time');
			var words = [];
			var headingsList = $(this).find('.caw-aheadings-list li');
			headingsList.each(function() {
				words.push($(this).text());    
			});

			headingsList.remove();

			var $ss = $(this).find('.caw-aheading-spin');
			var i = 0, i_next = 1;

			$('.next span', $ss).text(words[i_next]);
			$ss.width($(this).find('.current').width());

			setInterval(function() {

				$ss.addClass('swap');
				i = i_next;
				i_next++;

				if(i_next >= words.length) {
					i_next = 0;
				};

				$ss.width($ss.find('.next span').width());

				setTimeout(function() {
					$('.next span', $ss).text(words[i_next]);
					$('.current', $ss).text(words[i]);
					$ss.removeClass('swap');
				}, 1000);

			}, spinTime);

		});
	}
});