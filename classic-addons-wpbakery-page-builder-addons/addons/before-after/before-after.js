/* Classic Addons - Before / After Image Comparison (vanilla JS, no jQuery) */
(function () {
	'use strict';

	function clamp(v, min, max) { return Math.max(min, Math.min(max, v)); }

	function syncFrameWidth(el) {
		// For horizontal mode, the "after" image needs the full frame width
		// inside the clipped container so it doesn't squish as the clip slides.
		var frame = el.querySelector('.caw-ba-frame');
		if (!frame) { return; }
		var w = frame.clientWidth;
		if (w > 0) {
			el.style.setProperty('--caw-ba-frame-width', w + 'px');
		}
	}

	function setPosition(el, pct) {
		var orientation = el.getAttribute('data-orientation') || 'horizontal';
		pct = clamp(pct, 0, 100);

		var afterEl = el.querySelector('.caw-ba-after');
		var divider = el.querySelector('.caw-ba-divider');
		var handle  = el.querySelector('.caw-ba-handle');

		if (orientation === 'vertical') {
			if (afterEl) { afterEl.style.height = pct + '%'; }
			if (divider) { divider.style.top = pct + '%'; }
		} else {
			if (afterEl) { afterEl.style.width = pct + '%'; }
			if (divider) { divider.style.left = pct + '%'; }
		}
		if (handle) { handle.setAttribute('aria-valuenow', Math.round(pct)); }
	}

	function pointToPct(el, clientX, clientY) {
		var frame = el.querySelector('.caw-ba-frame');
		if (!frame) { return 50; }
		var rect = frame.getBoundingClientRect();
		var orientation = el.getAttribute('data-orientation') || 'horizontal';
		if (orientation === 'vertical') {
			if (rect.height === 0) { return 50; }
			return ((clientY - rect.top) / rect.height) * 100;
		}
		if (rect.width === 0) { return 50; }
		return ((clientX - rect.left) / rect.width) * 100;
	}

	function init(el) {
		if (el.getAttribute('data-caw-init') === '1') { return; }
		el.setAttribute('data-caw-init', '1');

		var start = parseFloat(el.getAttribute('data-start'));
		if (isNaN(start)) { start = 50; }

		syncFrameWidth(el);
		setPosition(el, start);

		// Refresh frame width when images finish loading or window resizes.
		var imgs = el.querySelectorAll('img');
		for (var i = 0; i < imgs.length; i++) {
			if (!imgs[i].complete) {
				imgs[i].addEventListener('load', function () { syncFrameWidth(el); }, { once: true });
			}
		}
		window.addEventListener('resize', function () { syncFrameWidth(el); });

		var mode = el.getAttribute('data-interaction') || 'drag';
		var frame = el.querySelector('.caw-ba-frame');
		var handle = el.querySelector('.caw-ba-handle');
		if (!frame || !handle) { return; }

		if (mode === 'hover') {
			frame.addEventListener('mousemove', function (e) {
				setPosition(el, pointToPct(el, e.clientX, e.clientY));
			});
			frame.addEventListener('mouseleave', function () {
				setPosition(el, start);
			});
			// Touch: tap-and-drag still works in hover mode for accessibility.
			frame.addEventListener('touchmove', function (e) {
				if (e.touches.length === 0) { return; }
				var t = e.touches[0];
				setPosition(el, pointToPct(el, t.clientX, t.clientY));
				e.preventDefault();
			}, { passive: false });
		} else {
			var dragging = false;

			function onDown(e) {
				dragging = true;
				handle.focus();
				var p = (e.touches && e.touches[0]) ? e.touches[0] : e;
				setPosition(el, pointToPct(el, p.clientX, p.clientY));
				if (e.cancelable) { e.preventDefault(); }
			}
			function onMove(e) {
				if (!dragging) { return; }
				var p = (e.touches && e.touches[0]) ? e.touches[0] : e;
				setPosition(el, pointToPct(el, p.clientX, p.clientY));
				if (e.cancelable && e.touches) { e.preventDefault(); }
			}
			function onUp() { dragging = false; }

			handle.addEventListener('mousedown', onDown);
			frame.addEventListener('mousedown', onDown);
			document.addEventListener('mousemove', onMove);
			document.addEventListener('mouseup', onUp);

			handle.addEventListener('touchstart', onDown, { passive: false });
			frame.addEventListener('touchstart', onDown, { passive: false });
			document.addEventListener('touchmove', onMove, { passive: false });
			document.addEventListener('touchend', onUp);
			document.addEventListener('touchcancel', onUp);
		}

		// Keyboard support (always).
		handle.addEventListener('keydown', function (e) {
			var orientation = el.getAttribute('data-orientation') || 'horizontal';
			var current = parseFloat(handle.getAttribute('aria-valuenow')) || 50;
			var step = e.shiftKey ? 10 : 2;
			var inc = null;

			if (orientation === 'horizontal') {
				if (e.key === 'ArrowLeft')  { inc = -step; }
				if (e.key === 'ArrowRight') { inc = step; }
			} else {
				if (e.key === 'ArrowUp')   { inc = -step; }
				if (e.key === 'ArrowDown') { inc = step; }
			}
			if (e.key === 'Home') { setPosition(el, 0);   e.preventDefault(); return; }
			if (e.key === 'End')  { setPosition(el, 100); e.preventDefault(); return; }
			if (inc !== null) {
				setPosition(el, current + inc);
				e.preventDefault();
			}
		});
	}

	function boot() {
		var nodes = document.querySelectorAll('.caw-before-after');
		for (var i = 0; i < nodes.length; i++) {
			if (!nodes[i].classList.contains('caw-before-after-empty')) {
				init(nodes[i]);
			}
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	if (typeof window !== 'undefined') {
		window.cawBeforeAfterInit = boot;
	}
})();
