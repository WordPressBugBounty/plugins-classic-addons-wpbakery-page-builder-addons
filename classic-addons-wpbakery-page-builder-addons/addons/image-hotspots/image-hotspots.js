/* Classic Addons - Image Hotspots (vanilla JS, no jQuery) */
(function () {
	'use strict';

	function closeAllIn(root, except) {
		var markers = root.querySelectorAll('.caw-hs-marker');
		for (var i = 0; i < markers.length; i++) {
			if (markers[i] === except) { continue; }
			markers[i].classList.remove('caw-hs-active', 'caw-hs-open-default');
			var inner = markers[i].querySelector('.caw-hs-marker-inner');
			if (inner) { inner.setAttribute('aria-expanded', 'false'); }
		}
	}

	function initRoot(root) {
		if (root.getAttribute('data-caw-init') === '1') { return; }
		root.setAttribute('data-caw-init', '1');

		var markers = root.querySelectorAll('.caw-hs-marker');
		for (var i = 0; i < markers.length; i++) {
			(function (marker) {
				var trigger = marker.getAttribute('data-trigger') || 'hover';
				var inner = marker.querySelector('.caw-hs-marker-inner');
				if (!inner) { return; }

				// Update aria-expanded for default-open click markers.
				if (marker.classList.contains('caw-hs-open-default')) {
					inner.setAttribute('aria-expanded', 'true');
				}

				if (trigger === 'click') {
					inner.addEventListener('click', function (e) {
						// Don't intercept actual links (let them navigate).
						if (inner.tagName === 'A' && inner.getAttribute('href')) {
							return;
						}
						e.preventDefault();
						e.stopPropagation();
						var willOpen = !marker.classList.contains('caw-hs-active') &&
						               !marker.classList.contains('caw-hs-open-default');
						closeAllIn(root);
						if (willOpen) {
							marker.classList.add('caw-hs-active');
							inner.setAttribute('aria-expanded', 'true');
						}
					});

					// Touch/tap behaves like click for hover-trigger markers too.
				} else {
					// Hover trigger: on touch devices, tap should open/close.
					var hasTouch = ('ontouchstart' in window) || navigator.maxTouchPoints > 0;
					if (hasTouch) {
						inner.addEventListener('click', function (e) {
							if (inner.tagName === 'A' && inner.getAttribute('href')) {
								return;
							}
							e.preventDefault();
							e.stopPropagation();
							var willOpen = !marker.classList.contains('caw-hs-active');
							closeAllIn(root);
							if (willOpen) {
								marker.classList.add('caw-hs-active');
								inner.setAttribute('aria-expanded', 'true');
							}
						});
					}
				}
			})(markers[i]);
		}

		// Click outside closes any open click-tooltips inside this root.
		document.addEventListener('click', function (e) {
			if (!root.contains(e.target)) {
				closeAllIn(root);
			}
		});

		// Escape closes.
		root.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') {
				closeAllIn(root);
			}
		});
	}

	function boot() {
		var roots = document.querySelectorAll('.caw-image-hotspots');
		for (var i = 0; i < roots.length; i++) {
			if (!roots[i].classList.contains('caw-image-hotspots-empty')) {
				initRoot(roots[i]);
			}
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	if (typeof window !== 'undefined') {
		window.cawImageHotspotsInit = boot;
	}
})();
