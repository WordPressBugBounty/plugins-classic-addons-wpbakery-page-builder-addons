// "use strict";
jQuery(function($) {

    /**
        Submit Form Data
    **/
    $(".caw-settings-form").submit(function(e) {
        e.preventDefault();

        const $this = $(this);
        $this.closest('div').find('.spinner').css({'visibility':'visible','display':'inline-block'});
        var data = $(this).serialize();

        $.post(ajaxurl, data, function(resp) {
            $this.closest('div').find('.spinner').css({'visibility':'hidden', 'display':'none'});
            $(".spinner-msg").show().delay(3000).fadeOut();
        }, 'json');

    });
});