(function ($) {
    'use strict';

    function iconFor($item, $accordion, state) {
        // Per-item override wins over the accordion-level default.
        var expandIcon   = $item.data('expand-icon') || $accordion.data('expand-icon') || 'fa fa-plus';
        var collapseIcon = $item.data('collapse-icon') || $accordion.data('collapse-icon') || 'fa fa-minus';
        return state === 'open' ? collapseIcon : expandIcon;
    }

    function toggleItem($item, open, $accordion) {
        var $content = $item.find('> .caw-accordion-content');
        var $title   = $item.find('> .caw-accordion-title');
        var $iconEl  = $item.find('> .caw-accordion-title .caw-accordion-icon i');

        if (open) {
            $item.addClass('is-active');
            $title.attr('aria-expanded', 'true');
            $content.stop(true, true).slideDown(250);
            if ($iconEl.length) { $iconEl.attr('class', iconFor($item, $accordion, 'open')); }
        } else {
            $item.removeClass('is-active');
            $title.attr('aria-expanded', 'false');
            $content.stop(true, true).slideUp(250);
            if ($iconEl.length) { $iconEl.attr('class', iconFor($item, $accordion, 'closed')); }
        }
    }

    $(document).on('click', '.caw-accordion .caw-accordion-title', function (e) {
        e.preventDefault();
        var $title     = $(this);
        var $item      = $title.closest('.caw-accordion-item');
        var $accordion = $title.closest('.caw-accordion');
        var allowMultiple = String($accordion.data('allow-multiple')) === '1';
        var closeOthers   = String($accordion.data('close-others')) === '1';
        var isActive      = $item.hasClass('is-active');

        if (!allowMultiple && closeOthers) {
            $accordion.find('.caw-accordion-item.is-active').each(function () {
                if (!$(this).is($item)) {
                    toggleItem($(this), false, $accordion);
                }
            });
        }

        toggleItem($item, !isActive, $accordion);
    });

    // Initial icon paint — children render with an empty <i>, so we set the
    // right class on DOM ready based on each item's current state.
    $(function () {
        $('.caw-accordion').each(function () {
            var $accordion = $(this);
            $accordion.find('.caw-accordion-item').each(function () {
                var $item = $(this);
                var $i = $item.find('> .caw-accordion-title .caw-accordion-icon i');
                if (!$i.length) { return; }
                var state = $item.hasClass('is-active') ? 'open' : 'closed';
                $i.attr('class', iconFor($item, $accordion, state));
            });
        });
    });
})(jQuery);
