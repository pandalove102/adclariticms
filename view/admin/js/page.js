(function($) {
    "use strict";
    $.Page = function(settings) {
        var config = {
            url: "",
            lang: {
                nomemreq: "",

            }
        };
        if (settings) {
            $.extend(config, settings);
        }

        $('#access_id').on('change', function() {
            var type = $(this).val();
            if (type === "Membership") {
                $(".access_id").addClass('loading');
                $.get(config.url, {
                    doAction: 1,
                    page: "membershiplist",
					type: type,
                }, function(json) {
                    if (json.status === "success") {
                        var template = '<select name="membership_id[]" class="wojo fluid selection dropdown" multiple>';
                        template += json.html;
                        template += '</select>';
                        $("#membership").html(template);
                        $("#membership select").dropdown();
                    }
                    $(".access_id").removeClass('loading');
                }, "json");
            } else {
                $('#membership').html('<input disabled="disabled" type="text" placeholder="' + config.lang.nomemreq + '" name="na">');
            }
        });
/*
        if ($.inArray("edit", $.url().segment()) !==-1) {
            var id = $('#modulename').data('id');
            var mdata = $('#modulename').data('module');
            loadModuleList(mdata, id);
        }
		
        $('#modulename').on('change', function() {
            var id = $(this).val();
            var mdata = $(this).data('module');
            loadModuleList(mdata, id);
        });
*/
        $('.removebg').on('click', function() {
            var parent = $(this).prev('input');
            $(parent).val('');
        });
		/*
        function loadModuleList(mdata, id) {
            $(".module_id").addClass('loading');
            $.get(config.url, {
				doAction: 1,
				page: "modulelist",
                id: id,
                module_data: mdata,
            }, function(json) {
                if (json.status === "success") {
                    $("#modshow").html(json.html);
                    $("#modshow select").dropdown();
                } else {
					$('#modshow').html('<input type="hidden" name="module_data" value="0">');
				}
                $(".module_id").removeClass('loading');
            }, "json");
        }
		*/
    };
})(jQuery);