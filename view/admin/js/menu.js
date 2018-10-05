(function($) {
    "use strict";
    $.Menu = function(settings) {
        var config = {
            url: "",
            lang: {
                delMsg3: "Trash",
                delMsg8: "The item will remain in Trash for 30 days. To remove it permanently, go to Trash and empty it.",
                canBtn: "Cancel",
                trsBtn: "Move to Trash",
            }
        };
        if (settings) {
            $.extend(config, settings);
        }
        
		$('#mIcons').find('i[class="' + $("input[name=icon]").val() + '"]').parent('.button').addClass('highlite');
		
        $('#contenttype').on('change', function() {
            var $icon = $(this).parent();
            $icon.addClass('loading');
            var option = $(this).val();
            $.get(config.url + "/helper.php", {
				doAction: 1,
				page : "contenttype",
                type: option,
            }, function(json) {
                switch (json.type) {
                    case "page":
                        $("#contentid").show();
                        $("#webid").hide();
                        $('#page_id').html(json.message).dropdown('clear').dropdown('show');
                        $('#page_id').prop('name', 'page_id');
                        break;

                    case "module":
                        $("#contentid").show();
                        $("#webid").hide();
                        $('#page_id').html(json.message).dropdown('clear').dropdown('show');
                        $('#page_id').prop('name', 'mod_id');
                        break;

                    default:
                        $("#contentid").hide();
						$("#webid").show();
                        $('#page_id').prop('name', 'web_id');
                        break;
                }

                $icon.removeClass('loading');
            }, "json");
        });

        $(document).on('click', 'a.delMenu', function() {
            var dataset = $(this).data("set");
            var $parent = $(this).closest(dataset.parent);
            $('<div class="wojo tiny modal">' +
                '<div class="header">' + config.lang.delMsg3 + ' <span class=\"wojo secondary text\">' + dataset.option[0].title + '?</span></div>' +
                '<div class="content content-center"><i class=\"huge circular icon negative trash\"></i>' +
                '<p class="half-top-padding"><span class="wojo bold text">' + config.lang.delMsg8 + '</span></p>' +
                '</div>' +
                '<div class="actions">' +
                '<div class="wojo cancel button"> ' + config.lang.canBtn + '</div>' +
                '<div class="wojo ok secondary button">' + config.lang.trsBtn + '</div>' +
                '</div>' +
                '</div>').modal('show').modal('setting', 'onApprove', function() {
                var $this = $(this);
                $.ajax({
                    type: 'POST',
                    url: config.url + "/controller.php",
                    dataType: 'json',
                    data: dataset.option[0]
                }).done(function(json) {
                    if (json.type === "success") {
                        $($parent).transition({
                            animation: 'fade',
                            duration: '1s',
                            onComplete: function() {
                                $($parent).slideUp();
                            }
                        });

						$("#parent_id").html(json.menu).dropdown('refresh');
                        $("#parent_id").parent().addClass('loading');

                        $('.huge.icon', $this).toggleClass('negative trash positive check transition hidden').transition('pulse').transition({
                            animation: 'fade out',
                            duration: '1s',
                            onComplete: function() {
                                $this.modal('hide').remove();
                                $.notice(decodeURIComponent(json.message), {
                                    autoclose: 4000,
                                    type: json.type,
                                    title: json.title
                                });
                            }
                        });
                        setTimeout(function() {
                            $("#parent_id").parent().removeClass('loading');
                        }, 1200);
                    }
                });
                return false;
            }).modal('setting', 'onHidden', function() {
                $(this).remove();
            });
        });

        /* == Toggle Menu icons == */
        $('#mIcons').on('click', '.button', function() {
            var micon = $("input[name=icon]");
            $('#mIcons .button.highlite').not(this).removeClass('highlite');
            $(this).toggleClass("highlite");
            micon.val($(this).hasClass('highlite') ? $(this).children().attr('class') : "");
        });

        $('#sortlist').nestable({
            maxDepth: 4
        }).on('change', function() {
            var json_text = $('#sortlist').nestable('serialize');
            $.ajax({
                cache: false,
                type: "post",
                url: config.url + "/helper.php",
                dataType: "json",
                data: {
					processItem: 1,
                    page: "sortMenus",
                    sortlist: JSON.stringify(json_text)
                }
            });
        }).nestable('collapseAll');
    };
})(jQuery);