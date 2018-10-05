(function($) {
    "use strict";
    $.Language = function(settings) {
        var config = {
            url: "",
        };
        if (settings) {
            $.extend(config, settings);
        }

        $("#filter").on("keyup", function() {
            var filter = $(this).val(),
                count = 0;
            $("span[data-editable=true]").each(function() {
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).parents('.item').fadeOut();
                } else {
                    $(this).parents('.item').fadeIn();
                    count++;
                }
            });
        });

        $('#pgroup').on('click', '.item', function() {
            var sel = $(this).data('value');
            var type = $(this).data('type');
            $('#pgroup').addClass('loading');
            $.get(config.url + "/helper.php", {
				doAction:1,
                page: "languagesection",
                type: type,
                section: sel
            }, function(json) {
                $("#editable").html(json.html).fadeIn("slow");
                $('#editable').editableTableWidget();
                $('#pgroup').removeClass('loading');
            }, "json");
        });

        $('#group').on('click', '.item', function() {
            var sel = $(this).data('value');
            var type = $(this).data('type');
            $('#group').addClass('loading');
            $.get(config.url + "/helper.php", {
				doAction:1,
                page: "languagefile",
                type: type,
                section: sel
            }, function(json) {
                if (json.type === "success") {
                    $("#editable").html(json.html).fadeIn("slow");
                    $('#editable').editableTableWidget();
                } else {
                    $.notice(decodeURIComponent(json.message), {
                        autoclose: 12000,
                        type: json.type,
                        title: json.title
                    });
                }

                $('#group').removeClass('loading');
            }, "json");
        });

        $('[data-lang-color="true"]').spectrum({
            showPaletteOnly: true,
            showPalette:true,
			move: function(color) {
				var newcolor = color.toHexString();
                if ($.inArray("edit", $.url().segment()) || $.inArray("new", $.url().segment())) {
                    $(this).children().css('background', newcolor);
                    $(this).prev('input').val(newcolor);
                } else {
                    $(this).css('background', newcolor);
                    $.post(config.url + "/helper.php", {
						simpleAction:1,
                        action: "langcolor",
						color: newcolor,
                        id: $(this).data('id')
                    });
                }
			}
        });
    };
})(jQuery);