jQuery(document).ready(function($) {
    $(document).on('click', '.caw-alert-close', function(e) {
        e.preventDefault();
        var target = $(this).data('dismiss-target');
        $(target).slideUp(300, function() {
            $(this).remove();
        });
    });
});