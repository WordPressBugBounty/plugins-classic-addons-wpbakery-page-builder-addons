/* Classic Addons - Post Grid (vanilla JS, no jQuery) */
(function () {
	'use strict';

	function applyHoverColors(root) {
		var nodes = root.querySelectorAll('.caw-pg-readmore, .caw-pg-loadmore');
		for (var i = 0; i < nodes.length; i++) {
			(function (btn) {
				var hoverBg    = btn.getAttribute('data-hover-bg') || '';
				var hoverColor = btn.getAttribute('data-hover-color') || '';
				if (hoverBg === '' && hoverColor === '') { return; }

				var originalBg    = btn.style.backgroundColor;
				var originalColor = btn.style.color;

				btn.addEventListener('mouseenter', function () {
					if (hoverBg !== '')    { btn.style.backgroundColor = hoverBg; }
					if (hoverColor !== '') { btn.style.color = hoverColor; }
				});
				btn.addEventListener('mouseleave', function () {
					btn.style.backgroundColor = originalBg;
					btn.style.color = originalColor;
				});
			})(nodes[i]);
		}
	}

	function init(root) {
		if (root.getAttribute('data-caw-init') === '1') { return; }
		root.setAttribute('data-caw-init', '1');
		applyHoverColors(root);
	}

	function boot() {
		var roots = document.querySelectorAll('.caw-post-grid');
		for (var i = 0; i < roots.length; i++) { init(roots[i]); }
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	if (typeof window !== 'undefined') {
		window.cawPostGridInit = boot;
	}
})();
