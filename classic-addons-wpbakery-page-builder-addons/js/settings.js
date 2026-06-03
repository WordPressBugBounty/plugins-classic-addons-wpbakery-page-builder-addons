/* Classic Addons - Settings Page (jQuery for AJAX, vanilla for UI) */
jQuery(function ($) {
	'use strict';

	var $page       = $('.caw-settings-page');
	if (!$page.length) { return; }

	var $form       = $page.find('.caw-settings-form');
	var $cards      = $page.find('.caw-card');
	var $search     = $page.find('.caw-search-input');
	var $noResults  = $page.find('.caw-no-results');
	var $saveBar    = $page.find('.caw-js-save-bar');
	var $enabledStat = $page.find('.caw-js-enabled-count');
	var $toast      = $page.find('.caw-toast');
	var $submitBtn  = $form.find('button[type="submit"]');

	function updateEnabledCount() {
		var n = $cards.filter('.is-enabled').length;
		$enabledStat.text(n);
	}

	function isDirty() {
		var dirty = false;
		$cards.each(function () {
			var initial = $(this).attr('data-initial') === '1';
			var current = $(this).hasClass('is-enabled');
			if (initial !== current) { dirty = true; return false; }
		});
		return dirty;
	}

	function refreshDirty() {
		if (isDirty()) {
			$saveBar.addClass('is-visible');
		} else {
			$saveBar.removeClass('is-visible');
		}
	}

	function setCardState($card, enabled) {
		var $cb = $card.find('.caw-card-checkbox');
		$card.toggleClass('is-enabled', !!enabled);
		$cb.prop('checked', !!enabled);
	}

	// Click anywhere on card → toggle.
	// Using <label> for the card means clicking on it already moves focus to
	// the checkbox and toggles it. We hook into 'change' so the checkbox is the
	// single source of truth.
	$cards.on('change', '.caw-card-checkbox', function () {
		var $card = $(this).closest('.caw-card');
		$card.toggleClass('is-enabled', this.checked);
		updateEnabledCount();
		refreshDirty();
	});

	// Keyboard: allow Space/Enter to toggle when the card has focus via the
	// underlying checkbox (default browser behavior already supports this
	// because the checkbox is inside the <label>).

	// Search filter.
	$search.on('input', function () {
		var q = ($search.val() || '').toString().trim().toLowerCase();
		var matched = 0;
		$cards.each(function () {
			var name = ($(this).attr('data-name') || '').toLowerCase();
			var desc = ($(this).find('.caw-card-desc').text() || '').toLowerCase();
			var slug = ($(this).attr('data-slug') || '').toLowerCase();
			var match = q === '' || name.indexOf(q) !== -1 || desc.indexOf(q) !== -1 || slug.indexOf(q) !== -1;
			$(this).toggle(match);
			if (match) { matched++; }
		});
		$noResults.prop('hidden', matched !== 0);
	});

	// Bulk actions (operate on currently visible cards only).
	$page.on('click', '.caw-js-bulk', function () {
		var action = $(this).attr('data-bulk');
		var $target = $cards.filter(':visible');

		$target.each(function () {
			var initial = $(this).attr('data-initial') === '1';
			var enable;
			if (action === 'enable')       { enable = true; }
			else if (action === 'disable') { enable = false; }
			else                            { enable = initial; } // reset
			setCardState($(this), enable);
		});
		updateEnabledCount();
		refreshDirty();
	});

	// Discard: revert to initial state.
	$page.on('click', '.caw-js-discard', function () {
		$cards.each(function () {
			var initial = $(this).attr('data-initial') === '1';
			setCardState($(this), initial);
		});
		updateEnabledCount();
		refreshDirty();
	});

	// Warn before leaving with unsaved changes.
	window.addEventListener('beforeunload', function (e) {
		if (isDirty()) {
			e.preventDefault();
			e.returnValue = '';
		}
	});

	// Submit via AJAX.
	$form.on('submit', function (e) {
		e.preventDefault();
		if ($submitBtn.hasClass('is-loading')) { return; }
		$submitBtn.addClass('is-loading');

		var data = $form.serialize();
		$.post(window.ajaxurl, data, function (resp) {
			$submitBtn.removeClass('is-loading');
			// Update initial state to current — no longer dirty.
			$cards.each(function () {
				$(this).attr('data-initial', $(this).hasClass('is-enabled') ? '1' : '0');
			});
			refreshDirty();
			showToast(resp && resp.message ? resp.message : 'Settings saved.');
		}, 'json').fail(function () {
			$submitBtn.removeClass('is-loading');
			showToast('Save failed. Please try again.');
		});
	});

	var toastTimer = null;
	function showToast(text) {
		$toast.find('.caw-toast-text').text(text);
		$toast.prop('hidden', false);
		// Force reflow so transition runs.
		void $toast[0].offsetWidth;
		$toast.addClass('is-visible');
		if (toastTimer) { clearTimeout(toastTimer); }
		toastTimer = setTimeout(function () {
			$toast.removeClass('is-visible');
			setTimeout(function () { $toast.prop('hidden', true); }, 250);
		}, 2400);
	}

	// Initial sync (in case markup and props ever drift).
	updateEnabledCount();
	refreshDirty();
});
