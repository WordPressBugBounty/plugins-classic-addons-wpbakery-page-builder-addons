(function ($) {
    'use strict';

    function activateTab($tabs, $navItem) {
        if (!$navItem || !$navItem.length) { return; }
        var targetSel = $navItem.attr('data-target');
        if (!targetSel) { return; }
        $tabs.find('> .caw-tab-nav .caw-tab-nav-item').removeClass('is-active').attr('aria-selected', 'false').attr('tabindex', '-1');
        $tabs.find('> .caw-tab-content > .caw-tab-panel').removeClass('is-active').attr('hidden', 'hidden');
        $navItem.addClass('is-active').attr('aria-selected', 'true').attr('tabindex', '0');
        $tabs.find(targetSel).addClass('is-active').removeAttr('hidden');
    }

    function buildNav($tabs) {
        var $nav     = $tabs.find('> .caw-tab-nav');
        var $content = $tabs.find('> .caw-tab-content');
        var $panels  = $content.find('> .caw-tab-panel');
        var showIcons = String($tabs.data('show-icons')) === '1';

        // Don't rebuild if nav already has items (e.g. re-init).
        if ($nav.children('.caw-tab-nav-item').length) { return; }

        var defaultIdx = -1;

        $panels.each(function (i) {
            var $panel = $(this);
            var title  = $panel.attr('data-title') || ('Tab ' + (i + 1));
            var icon   = $panel.attr('data-icon') || '';
            var isDef  = $panel.attr('data-default') === 'yes';

            if (!$panel.attr('id')) {
                $panel.attr('id', 'caw-tab-panel-' + Math.random().toString(36).slice(2, 8));
            }
            var panelId = $panel.attr('id');
            var tabBtnId = panelId + '-tab';

            $panel.attr('aria-labelledby', tabBtnId);

            var $btn = $('<button/>', {
                type: 'button',
                id: tabBtnId,
                'class': 'caw-tab-nav-item',
                role: 'tab',
                'aria-selected': 'false',
                'aria-controls': panelId,
                'data-target': '#' + panelId,
                tabindex: '-1'
            });
            if (showIcons && icon) {
                $btn.append($('<i/>', { 'class': 'caw-tab-nav-icon ' + icon, 'aria-hidden': 'true' }));
            }
            $btn.append($('<span/>', { 'class': 'caw-tab-nav-text' }).html(title));
            $nav.append($btn);

            if (isDef && defaultIdx === -1) { defaultIdx = i; }

            // Hide inactive by default — any "is-active" class from server is
            // respected, but we re-assert via activateTab below.
            $panel.attr('hidden', 'hidden').removeClass('is-active');
        });

        // Deep-linking: honor #hash if it matches a panel ID
        var hashMatchIdx = -1;
        if (window.location.hash && $panels.length) {
            var hashId = window.location.hash.substring(1);
            $panels.each(function (i) {
                if ($(this).attr('id') === hashId) { hashMatchIdx = i; return false; }
            });
        }

        var activeIdx = hashMatchIdx > -1 ? hashMatchIdx : (defaultIdx > -1 ? defaultIdx : 0);
        var $defaultBtn = $nav.children('.caw-tab-nav-item').eq(activeIdx);
        activateTab($tabs, $defaultBtn);
    }

    $(document).on('click', '.caw-tabs > .caw-tab-nav > .caw-tab-nav-item', function (e) {
        e.preventDefault();
        var $item = $(this);
        var $tabs = $item.closest('.caw-tabs');
        var rotator = $tabs.data('caw-rotate-timer');
        if (rotator) { clearInterval(rotator); $tabs.removeData('caw-rotate-timer'); }
        activateTab($tabs, $item);
    });

    $(document).on('keydown', '.caw-tabs > .caw-tab-nav > .caw-tab-nav-item', function (e) {
        var $item  = $(this);
        var $tabs  = $item.closest('.caw-tabs');
        var $items = $tabs.find('> .caw-tab-nav > .caw-tab-nav-item');
        var idx    = $items.index($item);
        var nextIdx = null;
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') { nextIdx = (idx + 1) % $items.length; }
        if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')   { nextIdx = (idx - 1 + $items.length) % $items.length; }
        if (nextIdx !== null) {
            e.preventDefault();
            var $next = $items.eq(nextIdx);
            $next.trigger('focus');
            activateTab($tabs, $next);
        }
    });

    $(function () {
        $('.caw-tabs').each(function () {
            var $tabs = $(this);
            buildNav($tabs);

            if (String($tabs.data('auto-rotate')) !== '1') { return; }
            var speed = parseInt($tabs.data('rotate-speed'), 10) || 5000;
            var timer = setInterval(function () {
                var $items  = $tabs.find('> .caw-tab-nav > .caw-tab-nav-item');
                if (!$items.length) { return; }
                var $active = $items.filter('.is-active');
                var idx     = $items.index($active);
                var next    = $items.eq((idx + 1) % $items.length);
                activateTab($tabs, next);
            }, speed);
            $tabs.data('caw-rotate-timer', timer);
        });
    });
})(jQuery);
