(function ($) {
    'use strict';

    function animateBar($bar) {
        if ($bar.data('caw-pb-done')) { return; }
        var $fill = $bar.find('.caw-progress-fill');
        var pct = parseFloat($fill.attr('data-target-width')) || 0;
        var speed = parseInt($bar.data('speed'), 10) || 1500;
        $fill.css('transition-duration', speed + 'ms');
        $fill[0].offsetWidth; // reflow
        $fill.css('width', pct + '%');
        // floating value follow
        var $floating = $bar.find('.caw-progress-value-floating');
        if ($floating.length) {
            $floating.css({ left: pct + '%', transition: 'left ' + speed + 'ms cubic-bezier(.25,.8,.25,1)' });
        }
        $bar.data('caw-pb-done', true);
    }

    function initObserver() {
        var $bars = $('.caw-progress-bar');
        $bars.each(function () {
            var $bar = $(this);
            var animate = String($bar.data('animate')) === 'yes' || $bar.data('animate') === undefined;
            if (!animate) {
                animateBar($bar);
                return;
            }
            if ('IntersectionObserver' in window) {
                var obs = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            animateBar($(entry.target));
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.25 });
                obs.observe($bar[0]);
            } else {
                animateBar($bar);
            }
        });
    }

    $(initObserver);
})(jQuery);
