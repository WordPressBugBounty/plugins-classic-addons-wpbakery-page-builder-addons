// "use strict";
jQuery(function($) {

    const caw_style_handler = {

        layouts: ["margin", "border-width", "padding"],
        positions: ["top", "right", "bottom", "left"],
        timer : null,
        changed : null,
        init: function(dataName) {

            this.colorpicker();
            this.eventsHandler();            
        },
        colorpicker: function() {

            $('.caw-colorpicker').wpColorPicker({
                change: function(event, ui){
                    var theColor = ui.color.toString();                    
                    if (theColor) {
                        const style_handler = $(this).closest('.caw-style-handler');                        
                        style_handler.find('.caw-border-color').val(theColor).trigger('keyup');
                    }
                }
            });
        },
        eventsHandler: function(){

            $( ".caw-style-handler" ).each(function( index, item ) {
                var style = $(item).attr('data-border');
                var parse_style =  caw_style_handler.parse(style);                
                if (parse_style != undefined) {
                    caw_style_handler.parseAtts(parse_style, $(item));
                }                
            });

            $(document).on('change', '.caw-border-select, .caw-colorpicker', function(){
                const style_handler = $(this).closest('.caw-style-handler');
                caw_style_handler.get_styles(style_handler);
            });

            $(document).on('keyup', '.caw-border-input', function(){
                const style_handler = $(this).closest('.caw-style-handler');
                caw_style_handler.get_styles(style_handler);

            });

            $(document).on('keyup', '.caw-margin-input', function(){
                const style_handler = $(this).closest('.caw-style-handler');
                caw_style_handler.get_styles2(style_handler);

            });

            $(document).on('keyup', '.caw-padding-input', function(){
                const style_handler = $(this).closest('.caw-style-handler');
                caw_style_handler.get_styles3(style_handler);                
            });
        },
        get_styles3: function($el) {
            
            var attrs = {};

            $.each(caw_style_handler.positions, function (side, type) {
                const padding = $el.find("[name=padding_" + type +"]").val();

                if (padding) {
                    ( padding && ( attrs["padding-" + type] = padding) );
                }
            });
            
            var string = '';
            (string =
                ".vc_custom_" +
                Date.now() +
                "{" +
                _.reduce(
                    attrs,
                    function (memo, value, key) {                        
                        return value ? memo + key + ": " + value + " !important;" : memo;
                    },
                    "",
                    this
                ) +
                "}"
            );
                        
            $el.find('.caw-padding-input-js').val(string);
        },
        get_styles2: function($el) {
            
            var attrs = {};

            $.each(caw_style_handler.positions, function (side, type) {
                const margin = $el.find("[name=margin_" + type +"]").val();

                if (margin) {
                    ( margin && ( attrs["margin-" + type] = margin) );
                }
            });

            var string = '';
            (string =
                ".vc_custom_" +
                Date.now() +
                "{" +
                _.reduce(
                    attrs,
                    function (memo, value, key) {                        
                        return value ? memo + key + ": " + value + " !important;" : memo;
                    },
                    "",
                    this
                ) +
                "}"
            );
                        
            $el.find('.caw-margin-input-js').val(string);
        },
        get_styles: function($el) {
            
            var attrs = {};
            var style = $el.find("[name=border_style]").val(),                
                color = $el.find("[name=save_border_color]").val();

            $.each(caw_style_handler.positions, function (side, type) {
                const width = $el.find("[name=border_" + type + "_width]").val();

                if (width) {                            
                    ( width && ( attrs["border-" + type + "-width"] = width), color && (attrs["border-" + type + "-color"] = color), style && (attrs["border-" + type + "-style"] = style));
                }
            });

            var string = '';
            (string =
                ".vc_custom_" +
                Date.now() +
                "{" +
                _.reduce(
                    attrs,
                    function (memo, value, key) {
                        return value ? memo + key + ": " + value + " !important;" : memo;
                    },
                    "",
                    this
                ) +
                "}"
            );
                        
            $el.find('.caw-border-input-js').val(string);
        },
        parseAtts: function(string, $el) {
            var border_regex = /(\d+\S*)\s+(\w+)\s+([\d\w#\(,]+)/,
                background_regex = /^([^\s]+)\s+url\(([^\)]+)\)([\d\w]+\s+[\d\w]+)?$/,
                background_size = !1;
            _.map(
                string.split(";"),
                function (val) {
                    var val_pos,
                        border_split,
                        background_split,
                        val_s = val.split(/:\s/),
                        value = val_s[1] || "",
                        name = val_s[0] || "",
                        value = value && value.trim();
                    name.match(new RegExp("^(" + caw_style_handler.layouts.join("|").replace("-", "\\-") + ")$")) && value
                        ? (1 === (val_pos = value.split(/\s+/g)).length
                              ? (val_pos = [val_pos[0], val_pos[0], val_pos[0], val_pos[0]])
                              : 2 === val_pos.length
                              ? ((val_pos[2] = val_pos[0]), (val_pos[3] = val_pos[1]))
                              : 3 === val_pos.length && (val_pos[3] = val_pos[1]),
                          _.each(
                              caw_style_handler.positions,
                              function (pos, key) {
                                  $el.find("[data-name=" + name + "-" + pos + "]").val(val_pos[key]);
                              },
                              this
                          ))
                        : "background-size" === name
                        ? ((background_size = value), $el.find("[name=background_style]").val(value))
                        : "background-repeat" !== name || background_size
                        ? "background-image" === name
                            ? this.setCurrentBgImage(value.replace(/url\(([^\)]+)\)/, "$1"))
                            : "background" === name && value
                            ? ((background_split = value.split(background_regex)) && background_split[1] && $el.find("[name=" + name + "_color]").val(background_split[1]),
                              background_split && background_split[2] && this.setCurrentBgImage(background_split[2]))
                            : "border" === name && value && value.match(border_regex)
                            ? ((border_split = value.split(border_regex)),
                              (val_pos = [border_split[1], border_split[1], border_split[1], border_split[1]]),
                              _.each(
                                  caw_style_handler.positions,
                                  function (pos, key) {
                                      $el.find("[name=" + name + "_" + pos + "_width]").val(val_pos[key]);
                                  },
                                  this
                              ),
                              $el.find("[name=border_style]").val(border_split[2]),
                              $el.find("[name=border_color]").val(border_split[3]).trigger("change"))
                            : -1 != name.indexOf("border") && value
                            ? -1 != name.indexOf("style")
                                ? $el.find("[name=border_style]").val(value)
                                : -1 != name.indexOf("color")
                                ? $el.find("[name=border_color]").val(value).trigger("change")
                                : -1 != name.indexOf("radius")
                                ? $el.find("[name=border_radius]").val(value)
                                : name.match(/^[\w\-\d]+$/) && $el.find("[name=" + name.replace(/\-+/g, "_") + "]").val(value)
                            : name.match(/^[\w\-\d]+$/) && value && $el.find("[name=" + name.replace(/\-+/g, "_") + "]").val(value)
                        : $el.find("[name=background_style]").val(value);
                },
                this
            );
        },
        parse: function(value) {
            var data_split = value.split(/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/g);
            // data_split && data_split[2];
            if (data_split && data_split[2]) {
                return data_split[2].replace(/\s+!important/g, "")
            }
        }
    }
    caw_style_handler.init();
});