jQuery(document).ready(function($) {
	$(".caw-slick-trigger").each(function(index, el) {
		var $el = $(this);

		function boolData(name, def) {
			var v = $el.data(name);
			if (v === undefined || v === null || v === '') { return def; }
			return v === true || v === 'true' || v === 'yes' || v === 1 || v === '1';
		}
		function intData(name, def) {
			var v = parseInt($el.data(name), 10);
			return isNaN(v) ? def : v;
		}
		function hasData(name) {
			var v = $el.data(name);
			return v !== undefined && v !== null && v !== '';
		}

		var slick_ob = {
			infinite: true,
			dots: boolData('dots', false),
			arrows: boolData('arrows', false),
			autoplay: boolData('autoplay', false),
			autoplaySpeed: intData('autoplayspeed', 3000),
			draggable: true,
			pauseOnHover: boolData('pauseonhover', true),
			fade: boolData('fade', false),
			centerMode: boolData('center_mode', false),
			rtl: boolData('rtl', false),
			speed: intData('speed', 500),
			slidesToShow: intData('slidestoshow', 1),
			slidesToScroll: intData('slidestoscroll', 1),
			slidesPerRow: intData('slidesperrow', 1),
			rows: intData('rows', 1)
		};

		// Preserve original responsive defaults (992:2, 768:1) unless user
		// has configured new per-breakpoint options in 4.0+.
		if (hasData('responsive_lg') || hasData('responsive_md') || hasData('responsive_sm')) {
			var lg = intData('responsive_lg', 2);
			var md = intData('responsive_md', 1);
			var sm = intData('responsive_sm', 1);
			slick_ob.responsive = [
				{ breakpoint: 1200, settings: { slidesToShow: lg, slidesToScroll: 1 } },
				{ breakpoint: 992,  settings: { slidesToShow: lg, slidesToScroll: 1 } },
				{ breakpoint: 768,  settings: { slidesToShow: md, slidesToScroll: 1 } },
				{ breakpoint: 480,  settings: { slidesToShow: sm, slidesToScroll: 1 } }
			];
		} else {
			slick_ob.responsive = [
				{ breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 1 } },
				{ breakpoint: 768, settings: { slidesToShow: 1, slidesToScroll: 1 } }
			];
		}

		// fade requires slidesToShow: 1
		if (slick_ob.fade) {
			slick_ob.slidesToShow = 1;
			slick_ob.slidesToScroll = 1;
		}

		$el.slick(slick_ob);
	});
});
