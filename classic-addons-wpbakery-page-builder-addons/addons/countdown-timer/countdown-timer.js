/* Classic Addons - Countdown Timer (vanilla JS, no jQuery) */
(function () {
	'use strict';

	function pad(n) { return n < 10 ? '0' + n : '' + n; }

	function resolveTargetMs(raw) {
		if (!raw) { return 0; }
		// Server may pass either a millisecond timestamp (fixed-zone modes)
		// or "local:YYYY-MM-DDTHH:mm:ss" (visitor-local zone mode).
		if (typeof raw === 'string' && raw.indexOf('local:') === 0) {
			var local = new Date(raw.substring(6));
			var t = local.getTime();
			return isNaN(t) ? 0 : t;
		}
		var ms = parseInt(raw, 10);
		return isNaN(ms) ? 0 : ms;
	}

	function update(el, targetMs) {
		var now = Date.now();
		var diff = targetMs - now;

		if (diff <= 0) {
			handleExpiry(el);
			return false;
		}

		var totalSec = Math.floor(diff / 1000);
		var days = Math.floor(totalSec / 86400);
		var hours = Math.floor((totalSec % 86400) / 3600);
		var minutes = Math.floor((totalSec % 3600) / 60);
		var seconds = totalSec % 60;

		var showDays = el.querySelector('[data-unit="days"]') !== null;
		// If days hidden, roll into hours.
		if (!showDays) {
			hours += days * 24;
			days = 0;
		}

		setUnit(el, 'days', days);
		setUnit(el, 'hours', pad(hours));
		setUnit(el, 'minutes', pad(minutes));
		setUnit(el, 'seconds', pad(seconds));

		return true;
	}

	function setUnit(el, key, value) {
		var unit = el.querySelector('[data-unit="' + key + '"] [data-caw-value]');
		if (unit) {
			var str = '' + value;
			if (unit.textContent !== str) {
				unit.textContent = str;
			}
		}
	}

	function handleExpiry(el) {
		var action = el.getAttribute('data-expiry-action') || 'message';
		// Zero out all visible units.
		var nums = el.querySelectorAll('[data-caw-value]');
		for (var i = 0; i < nums.length; i++) {
			nums[i].textContent = '00';
		}
		var daysUnit = el.querySelector('[data-unit="days"] [data-caw-value]');
		if (daysUnit) { daysUnit.textContent = '0'; }

		if (action === 'hide') {
			el.style.display = 'none';
		} else {
			var unitsWrap = el.querySelector('.caw-countdown-units');
			if (unitsWrap) { unitsWrap.style.display = 'none'; }
			var seps = el.querySelectorAll('.caw-countdown-separator');
			for (var s = 0; s < seps.length; s++) { seps[s].style.display = 'none'; }
			var msg = el.querySelector('.caw-countdown-expired-message');
			if (msg) { msg.hidden = false; }
		}
		el.setAttribute('data-caw-expired', '1');
	}

	function init(el) {
		if (el.getAttribute('data-caw-init') === '1') { return; }
		el.setAttribute('data-caw-init', '1');

		var targetMs = resolveTargetMs(el.getAttribute('data-target'));
		if (!targetMs) {
			handleExpiry(el);
			return;
		}

		if (!update(el, targetMs)) { return; }

		var timerId = setInterval(function () {
			if (!update(el, targetMs)) {
				clearInterval(timerId);
			}
		}, 1000);
	}

	function boot() {
		var nodes = document.querySelectorAll('.caw-countdown');
		for (var i = 0; i < nodes.length; i++) { init(nodes[i]); }
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	// Re-scan when WPBakery frontend editor swaps DOM.
	if (typeof window !== 'undefined') {
		window.cawCountdownInit = boot;
	}
})();
