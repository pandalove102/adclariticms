(function($, window, document, undefined) {
    "use strict";
    var pluginName = 'Slider';

    function Plugin(element, options) {
        this.element = element;
        this._name = pluginName;
        this._defaults = $.fn.Slider.defaults;
        this.options = $.extend({}, this._defaults, options);

        this.doptions = {
            containment: this.element,
            snap: true,
            stack: ".ws-layer",
            distance: 10,
            grid: [5, 5],
            start: function() {
                $(this).css("margin", "");
            },
            stop: function() {
                $(this).attr('data-top', $(this).position().top.toFixed());
                $(this).attr('data-left', $(this).position().left.toFixed());
            }

        };

        this.roptions = {
            grid: [20, 20],
            delay: 150,
            distance: 20,
            containment: this.element,
            handles: 'all',
            stop: function() {
                $(this).attr('data-top', $(this).position().top.toFixed());
                $(this).attr('data-left', $(this).position().left.toFixed());
            }
        };

        this.soptions = {
            items: ".sortable",
            opacity: ".5",
            cursor: "move",
            placeholder: "wojo placeholder",
            start: function(e, ui) {
                ui.placeholder.css({
                    height: ui.item.height(),
                    width: ui.item.width(),
                });
            }
        };

        this.elements = {
            toolbar: "#toolbar",
            editor: "#editor",
            animation: "#animation",
            layeritems: "#layeritems",
            slideholder: "#slideholder",
            source: "#source",
            settings: "#settings",
            position: "#position"
        };

        this.init();
    }

    $.extend(Plugin.prototype, {
        init: function() {
            this.bindEvents();
            this.toolbarActions();
            this.animationActions();
            this.slideHolderActions();
            this.sourceActions();
            this.configActions();
        },

        bindEvents: function() {
            var plugin = this;
            var element = $(this.element);

            //prevent link clicking
            $(element).on('click', 'a', function(event) {
                event.preventDefault();
            });

            //Select item
            $(element).on('click', '.ws-layer', function() {
                $('.ws-layer', element).draggable(plugin.doptions);
                $('.ws-layer', element).resizable(plugin.roptions);
                var type = $(this).attr('data-type');
                var id = $(this).attr('id');
                $(plugin.elements.editor).remove();
                if (type === "header" || type === "para" || type === "button") {
                    var content = (type === "button") ? $('.column', this).prop('outerHTML') : $('.row', this).prop('outerHTML');
                    var $editor = $('<div id ="editor"></div>');
                    $editor.prependTo(element).attr('data-id', id).html(content);
                }

                if ($('.ws-layer', element).not(this).data("ui-draggable")) {
                    $('.ws-layer', element).not(this).draggable("destroy");
                    $('.ws-layer', element).not(this).resizable("destroy");
                }

                var time = $(this).attr('data-ease-in');
                var delay = $(this).attr('data-delay');
                var animation = $(this).attr('data-in');

                $("#anipack").dropdown('set selected', (!animation ? 'none' : animation));
                $("#atime").val(time);
                $("#dtime").val(delay);

                $("a.item", plugin.elements.layeritems).removeClass('highlite');
                $("a.item[data-id=" + id + "]", plugin.elements.layeritems).addClass('highlite');
            });

            //trash elements
            $(document).on('keypress', function(event) {
                if (event.keyCode === 46) {
                    var $active = $(element).find('.ui-draggable');
                    var id = $active.attr('id');
                    $active.transition({
                        animation: "fade out",
                        onComplete: function() {
                            $active.remove();
                            $("a.item[data-id=" + id + "]", plugin.elements.layeritems).remove();
                        }
                    });
                }
            });

            //move elements
            $(document).on('keypress', function(event) {
                var position = $(element).find('.ui-draggable').position();
                var that = $(element).find('.ui-draggable');
                var distance = plugin.options.adistance;
                switch (event.keyCode) {
                    case 37:
                        position.left -= distance;
                        break; // Left
                    case 38:
                        position.top -= distance;
                        break; // Up
                    case 39:
                        position.left += distance;
                        break; // Right
                    case 40:
                        position.top += distance;
                        break; // Down
                    default:
                        return true;
                }

                if (position.left >= 0 && position.top >= 0 &&
                    position.left + $(that).width() <= $(element).width() &&
                    position.top + $(that).height() <= $(element).height()) {
                    $(that).css(position);
                    $(that).attr('data-top', position.top.toFixed());
                    $(that).attr('data-left', position.left.toFixed());
                }
                event.preventDefault();
            });

            //Deselect item
            $(element).on('click', function(e) {
                if ($(e.target).is('.ucontent')) {
                    $(element).find('.ui-draggable').draggable("destroy");
                    $(element).find('.ui-resizable').resizable("destroy");
                    $("a.item", plugin.elements.layeritems).removeClass('highlite');
                    $("a.button.align", plugin.elements.position).removeClass('primary');
                }
            });

            //Insert layer
            $("#layertype").on('click', 'a', function() {
                var type = $(this).data('value');
                var id = 'edit_' + plugin.uniqId();
                var html = '';
                switch (type) {
                    case "header":
                        html = '<div id="' + id + '" class="ws-layer" data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="' + type + '" style="width:400px;height:100px;position:absolute"><div class="row"><div class="column"><!--edit from here--><div data-text="true" style="font-size:40px">Suspendisse eu leo nec leo</div><!--edit to here--></div</div></div>';
                        plugin.addLayerItem(id, 'wysiwyg bold', plugin.options.lang.header);
                        break;

                    case "button":
                        plugin.insertButton();
                        break;

                    case "shape":
                        plugin.insertShape();
                        break;

                    case "icon":
                        plugin.insertIcon();
                        break;

                    case "video":
                        plugin.insertVideo();
                        break;

                    default:
                        html = '<div id="' + id + '" class="ws-layer" data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="' + type + '" style="width:360px;height:30px;position:absolute"><div class="row"><div class="column"><!--edit from here--><p>Quisque et nulla ut neque venenatis ullamcorper.</p><!--edit to here--></div</div></div>';
                        plugin.addLayerItem(id, 'wysiwyg paragraph', plugin.options.lang.paragraph);
                        break;
                }

                $(".ucontent", element).append(html);
            });
        },

        toolbarActions: function() {
            var plugin = this;
            var element = $(this.element);

            //Select item from toolbar
            $(this.elements.layeritems).on('click', 'a.item', function() {
                var active = $(element).find('.ui-draggable');
                var id = $(this).attr('data-id');
                $("a.item", plugin.elements.layeritems).removeClass('highlite');
                $(this).addClass('highlite');

                if (active.length) {
                    $(active).draggable("destroy");
                    $(active).resizable("destroy");
                }
                $('#' + id + '.ws-layer').draggable(plugin.doptions);
                $('#' + id + '.ws-layer').resizable(plugin.roptions);
            });

            //Toolbar edit
            $(this.elements.toolbar).on('click', 'a#edit', function() {
                var $active = $(element).find('.ui-draggable');
                var type = $active.attr('data-type');
                if ($active.length && type === "header" || type === "para" || type === "button") {
                    $("a#save").removeClass('disabled');
                    $(plugin.elements.editor).css({
                        height: "100%"
                    }).transition('fade in');
                    $(".is_e", plugin.elements.toolbar).addClass("disabled");

                    $(plugin.elements.editor).tinymce({
                        inline: true,
                        theme: "modern",
                        convert_urls: 0,
                        remove_script_host: 0,
                        schema: "html5",
                        menubar: false,
                        extended_valid_elements: "+a[*],+i[*],+em[*],+li[*],+span[*],+div[*]",
                        link_list: plugin.options.aurl + "/helper.php?doAction=1&page=getlinks",
                        script_url: plugin.options.surl + '/assets/tinymce/tinymce.min.js',
                        toolbar: "bold italic alignleft aligncenter alignright alignjustify bullist numlist forecolor link code fullscreen",
                        plugins: [
                            "advlist code fullscreen textcolor colorpicker link",
                        ],
                    });

                    plugin.addFiller(plugin.elements.slideholder);
                }
            });

            //Toolbar trash
            $(this.elements.toolbar).on('click', 'a#trash', function() {
                var $active = $(element).find('.ui-draggable');
                var id = $active.attr('id');
                $active.transition({
                    animation: "fade out",
                    onComplete: function() {
                        $active.remove();
                        $("a.item[data-id=" + id + "]", plugin.elements.layeritems).remove();
                    }
                });
            });

            //Toolbar save slide
            $(this.elements.toolbar).on('click', 'a#saveall', function() {
                if ($(plugin.element).is(':parent')) {
                    var button = $(this);
                    $(button).addClass('loading');
                    var $active = $(plugin.element).find('.ui-draggable');
                    if ($active.length) {
                        $(plugin.element).find('.ui-draggable').draggable("destroy");
                        $(plugin.element).find('.ui-resizable').resizable("destroy");
                    }

                    var id = $('.uitem', plugin.element).attr('id');
                    var mode = $('.uitem', plugin.element).attr('data-type');
                    var raw = $("#" + id).prop('outerHTML');
                    var tmpcontent = $('.ucontent', plugin.element).html();

                    $("#temp-slide").html(tmpcontent);
                    $('#temp-slide').children().removeAttr('id');
                    $('#temp-slide').children().css({
                        'transform': '',
                        'opacity': '',
						'display': '',
						'transform-origin':''
                    });
                    $("#temp-slide").find('.column').each(function() {
                        $(this).parents('.ws-layer').html($(this).html());
                    });

                    $("#temp-slide").find('.ws-layer[data-type=header], .ws-layer[data-type=para]').each(function() {
                        $(this).css('width', '');

                    });

                    $("#temp-slide").find('.iframe').each(function() {
                        var autoplay = $(this).attr('data-autoplay');
                        var loop = $(this).attr('data-loop');
                        var id = $(this).attr('data-vidid');
                        var size = $(this).parent('.ws-layer').css(["width", "height"]);
                        $(this).replaceWith('<iframe data-autoplay="' + autoplay + '" data-loop="' + loop + '" width="' + parseInt(size.width) + '" height="' + parseInt(size.height) + '" frameborder="0" src="https://www.youtube.com/embed/' + id + '?enablejsapi=1" type="text/html" class="ws-yt-iframe"></iframe>');
                    });

                    var content = $("#temp-slide").html();

                    $.post(plugin.options.url, {
                        action: "saveSlideData",
                        id: id.replace('item_', ''),
                        html: content,
                        html_raw: raw,
                        image: $("#bg_img").val(),
                        color: $("#bg_color").val(),
                        mode: mode,
                    }, function(json) {
                        if (json.type === "success") {
                            setTimeout(function() {
                                $(button).removeClass('loading');
                            }, 1000);
                        }
                    }, "json");

                }
            });

            //Toolbar save
            $(this.elements.toolbar).on('click', 'a#save', function() {
                var id = $(plugin.elements.editor).attr('data-id');
				var type = $(plugin.element).find('.ui-draggable').attr('data-type');
                var newcontent = $(plugin.elements.editor).html();

				if(type === "button") {
					$("#" + id + ' .column').replaceWith(newcontent);
				} else {
					$("#" + id + ' .row').replaceWith(newcontent);
				}
                $(plugin.elements.editor).tinymce().remove();
                $(plugin.elements.editor).transition('fade out');
                $(".is_e", plugin.elements.toolbar).removeClass("disabled");
                $(this).addClass("disabled");
                $(".filler", plugin.elements.slideholder).remove();
            });

            //Toolbar crop
            $(this.elements.toolbar).on('click', 'a#crop', function() {
                var active = $(element).find('.ui-draggable');
                if (active.length) {
                    var h = $(active).children('.row').height();
                    $(active).css('height', h);
                    $(active).attr('data-width', $(active).width().toFixed());
                    $(active).attr('data-height', $(active).height().toFixed());

                    $(active).attr('data-vertical', $(active).position().top.toFixed());
                    $(active).attr('data-horizontal', $(active).position().left.toFixed());
                }
            });

            //Toolbar copy
            $(this.elements.toolbar).on('click', 'a#copy', function() {
                var active = $(element).find('.ui-draggable');
                if (active.length) {
                    var id = plugin.uniqId();
                    var $clone = $(active).clone().attr('id', 'edit_' + id);
                    $clone.removeClass('ui-draggable ui-resizable ui-draggable-handle');
                    $clone.find('.ui-resizable-handle').remove();
                    $clone.appendTo(".ucontent", element);

                    var icon, name;
                    switch ($(active).attr('data-type')) {
                        case "header":
                            icon = 'wysiwyg bold';
                            name = plugin.options.lang.header;
                            break;

                        case "para":
                            icon = 'wysiwyg paragraph';
                            name = plugin.options.lang.paragraph;
                            break;

                        case "button":
                            icon = 'youtube';
                            name = plugin.options.lang.button;
                            break;


                        case "shape":
                            icon = 'checkbox';
                            name = plugin.options.lang.shape;
                            break;

                        case "icon":
                            icon = 'heart';
                            name = plugin.options.lang.icon;
                            break;

                        case "video":
                            icon = 'youtube';
                            name = plugin.options.lang.button;
                            break;
                    }
                    plugin.addLayerItem(id, icon, name);
                }
            });

            //Toolbar align
            $(this.elements.position).on('click', 'a.button.align', function() {
                var active = $(element).find('.ui-draggable');
                if (active.length) {
                    $("a.button.align", plugin.elements.position).removeClass('primary');
                    $(this).addClass('primary');
                    var position = $(this).attr('data-type');
                    $(active).position({
                        my: position,
                        at: position,
                        of: '.ucontent',
                        within: '.ucontent',
                    });
                    var ipos = $(active).position();
                    $(active).attr({
                        "data-top": parseInt(ipos.top),
                        "data-left": parseInt(ipos.left)
                    });
                }
            });
        },

        animationActions: function() {
            var element = $(this.element);

            //Animation
            $(this.elements.animation).on('click', '#anipack .item', function() {
                var active = $(element).find('.ui-draggable');

                if (active.length) {
                    $(active).attr("data-in", $(this).data('value'));
                    var type = $(active).attr('data-in');
                    var time = $(active).attr('data-ease-in');
                    var delay = $(active).attr('data-delay');

                    if (!type) {
                        type = $(this).data('value');
                    }
                    if (!time) {
                        time = 2000;
                    }
                    if (!delay) {
                        delay = 0;
                    }
                    if ($(this).data('value') === "none") {
                        $(active).attr("data-in", '');
                        $(active).find('.row').removeClass('ws-animate');
                        $(active).addClass('ws-static');
                    } else {
                        $(active).velocity("transition." + type + "In", {
                            duration: parseInt(time),
                            delay: parseInt(delay)
                        });
                        $(active).find('.row').addClass('ws-animate');
                        $(active).removeClass('ws-static');
                    }
                }

            });

            // Play Animation
            $("#play").on('click', function() {
                $.each($('.ws-layer', element), function() {
                    var type = $(this).attr('data-in');
                    var time = $(this).attr('data-ease-in');
                    var delay = $(this).attr('data-delay');
                    if (type) {
                        $(this).velocity("transition." + type + "In", {
                            duration: parseInt(time),
                            delay: parseInt(delay)
                        });
                    }
                });
            });

            //Animation time
            $("#atime").on('change', function() {
                var time = $(this).val().replace(/[^0-9\.]/g, '');
                var active = $(element).find('.ui-draggable');
                if (active.length) {
                    $(active).attr("data-ease-in", time);
                }
            });

            //Animation delay
            $("#dtime").on('change', function() {
                var time = $(this).val().replace(/[^0-9\.]/g, '');
                var active = $(element).find('.ui-draggable');
                if (active.length) {
                    $(active).attr("data-delay", time);
                }
            });
        },

        //Insert Button
        insertButton: function() {
            var plugin = this;
            $.get(plugin.options.url, {
                action: "getButtons"
            }, function(json) {
                var template = '' +
                    '<div class="wojo modal" id="bModal">' +
                    '' + json.html + '' +
                    '<div class="actions">' +
                    '<div class="wojo small cancel button">' + plugin.options.lang.canBtn + '</div>' +
                    '<div class="wojo small ok secondary button">' + plugin.options.lang.insBtn + '</div>' +
                    '</div>' +
                    '</div>';
                $(template).modal({
                    closable: false,
                    onApprove: function() {
                        var $active = $("#buttons").find('.highlite');
                        if ($active.length) {
                            var id = 'edit_' + plugin.uniqId();
                            var button = '' +
                                '<div id="' + id + '" data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="button"' +
                                'style="position:absolute;left:100px;top:100px;z-index:500;" class="ws-layer">' +

                                '<div class="column"> ' + $active.html() + ' </div>' +
                                '</div>';
                            $('.ucontent', plugin.element).append(button);
                            plugin.addLayerItem(id, 'youtube', plugin.options.lang.button);
                        } else {
                            return false;
                        }
                    },
                    onHidden: function() {
                        $(".sp-container").remove();
                        $(this).remove();
                    }
                }).modal('show');
            }, "json");

        },

        //Insert Shape
        insertShape: function() {
            var plugin = this;
            $.get(plugin.options.url, {
                action: "getShape"
            }, function(json) {
                var template = '' +
                    '<div class="wojo modal">' +
                    '' + json.html + '' +
                    '<div class="actions">' +
                    '<div class="wojo small cancel button">' + plugin.options.lang.canBtn + '</div>' +
                    '<div class="wojo small ok secondary button">' + plugin.options.lang.insBtn + '</div>' +
                    '</div>';

                $(template).modal({
                    onApprove: function() {
                        var id = 'edit_' + plugin.uniqId();
                        var shapecss = $("#shape").attr('style');
                        var inner = $(".shape-inner").css(["width", "height"]);
                        var shape = '<div style="width:100%;height:100%;position:absolute;padding:0;visibility:inherit;' + shapecss + '"></div>';
                        var wrap = '<div id="' + id + '"  data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="shape" class="ws-layer" style="z-index:500;position:absolute;top:100px;left:100px;width:' + inner.width + ';height:' + inner.height + '"><div class="column">' + shape + '</div></div>';

                        $(".ucontent", plugin.element).append(wrap);
                        plugin.addLayerItem(id, 'checkbox', plugin.options.lang.shape);

                    },
                    onHidden: function() {
                        $(".sp-container").remove();
                        $(this).remove();
                    }
                }).modal('show');
            }, "json");
        },

        //Insert Icon
        insertIcon: function() {
            var plugin = this;
            $.get(plugin.options.url, {
                action: "getIcons"
            }, function(json) {
                var template = '' +
                    '<div class="wojo modal">' +
                    '<div class="content" style="height:500px;overflow:auto" id="iconlayer">' + json.html + '</div>' +
                    '</div>';
                $(template).modal({
                    onShow: function() {
                        var $modal = $(this);
                        $('.content', this).on('click', '.button', function() {
                            var id = 'edit_' + plugin.uniqId();
                            var pic = $(this).html();
                            var icon = '<div id="' + id + '" data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="icon" class="ws-layer" style="z-index:500;position:absolute;top:100px;left:100px;width:100px;height:100px:display:block"><div class="column">' + pic + '</div></div>';
                            $(".ucontent", plugin.element).append(icon);
                            plugin.addLayerItem(id, 'heart', plugin.options.lang.icon);
                            $modal.modal('hide');
                        });
                    },
                    onHidden: function() {
                        $(this).remove();
                    }
                }).modal('show');
            }, "json");
        },

        //Insert Video
        insertVideo: function() {
            var plugin = this;
            var template = '' +
                '<div class="wojo modal">' +
                '<div class="content" style="height:500px;overflow:auto" id="ytlayer">' +
                '<div class="wojo small fluid action input">' +
                '<input id="findVid" type="search" autocomplete="off">' +
                '<button id="searchBtn" class="wojo small button">Search</button>' +
                '</div>' +
                '<div class="half-top-padding content-center">' +
                '<div class="wojo checkbox">' +
                '<input name="autoplay" type="checkbox" value="1">' +
                '<label>Autoplay</label>' +
                '</div>' +
                '<div class="wojo separator"></div>' +
                '<div class="wojo checkbox">' +
                '<input name="loop" type="checkbox" value="1">' +
                '<label>Loop Video</label>' +
                '</div>' +
                '</div>' +
                '<div class="wojo divider"></div>' +
                '<div id="vidresult" class="row gutters phone-block-2 tablet-block-3 screen-block-4 content-center"></div>' +
                '</div>' +
                '<div class="actions">' +
                '<div class="wojo small cancel button">' + plugin.options.lang.canBtn + '</div>' +
                '<div class="wojo small ok secondary button">' + plugin.options.lang.insBtn + '</div>' +
                '</div>' +
                '</div>';
            $(template).modal({
                onShow: function() {
                    $("#searchBtn").on('click', function() {
                        var srch_string = $("#findVid").val();
                        if (srch_string.length > 3) {
                            $.get(
                                "https://www.googleapis.com/youtube/v3/search", {
                                    part: 'snippet, id',
                                    q: srch_string,
                                    type: 'video',
                                    maxResults: 20,
                                    key: plugin.options.ytapi
                                },
                                function(data) {
                                    $.each(data.items, function(i, item) {
                                        var output = '<div class="column">' +
                                            '<div class="wojo boxed segment attached">' +
                                            '<a data-id="' + item.id.videoId + '" class="inverted"><img src="' + item.snippet.thumbnails.high.url + '" class="wojo image">' +
                                            '<small>' + $.trim(item.snippet.title).substring(0, 50) + '</small>' +
                                            '</a></div>' +
                                            '</div>';
                                        $('#vidresult').append(output);
                                    });
                                });
                        }
                    });
                    $("#vidresult").on('click', '.segment a', function() {
                        $("#vidresult .segment").removeClass('active');
                        $(this).parent().addClass('active');
                    });
                },
                onApprove: function() {
                    var vidid = $("#vidresult .segment.active").find('a').attr('data-id');
                    var autoplay = $("#ytlayer input[name=autoplay]").is(':checked');
                    var loop = $("#ytlayer input[name=loop]").is(':checked');
                    if (vidid) {
                        var id = 'edit_' + plugin.uniqId();
                        var video = '<div id="' + id + '" data-delay="0" data-ease-in="0" data-in="" data-time="all" data-top="100" data-left="100" data-type="video" class="ws-layer" style="z-index:500;position:absolute;top:100px;left:100px;width:560px;height:350px;display:block"><div class="column"><div data-vidid="' + vidid + '" data-autoplay="' + (autoplay ? 1 : 0) + '" data-loop="' + (loop ? 1 : 0) + '" class="iframe"><i class="icon huge youtube"></i></div></div></div>';
                        $(".ucontent", plugin.element).append(video);
                        plugin.addLayerItem(id, 'camera retro', plugin.options.lang.video);
                    } else {
                        return false;
                    }
                },
                onHidden: function() {
                    $(this).remove();
                }
            }).modal('show');

        },

        slideHolderActions: function() {
            var element = $(this.element);
            var plugin = this;

            //Slide Holder actions
            $(this.elements.slideholder).on('click', '.menu a', function() {
                var $this = $(this);
                var $parent = $this.closest('.sortable');
                var set = $(this).data('set');
                element.addClass('loading');
                switch (set.mode) {
                    case "prop":
                        $.post(plugin.options.url, {
                            action: "propSlide",
                            id: set.id,
                        }, function(json) {
                            if (json.type === "success") {
                                plugin.addFiller(plugin.elements.slideholder);
                                $('.thumb', plugin.elements.slideholder).removeClass('active');
                                $parent.replaceWith(json.thumb);
                                $(':radio[value=' + json.mode + ']', plugin.elements.source).prop('checked', true);
                                $("#bg_img").val(json.image);
                                $("#bg_color").val(json.color);
                                $("[data-id=cl_asset] .button", plugin.elements.source).css('backgbound-color', json.color);
                                element.html(json.html_raw);
                                $('[data-id=' + json.mode + '_asset]').show();
                                $(plugin.elements.source).transition('slide down');
                                plugin.getLayers();
                                $(".wojo.dropdown").dropdown();
                                $('#editable').editableTableWidget();
                                plugin.doneLoader(element);

                            }
                        }, "json");

                        break;

                    case "edit":
                        $.post(plugin.options.url, {
                            action: "editSlide",
                            id: set.id,
                        }, function(json) {
                            if (json.type === "success") {
                                $('.thumb', plugin.elements.slideholder).removeClass('active');
                                $this.closest('.thumb').addClass('active');
                                element.html(json.html);
                                $('.filler', plugin.elements.toolbar).remove();
                                plugin.getLayers();
                                $("#bg_img").val(json.image);
                                $("#bg_color").val(json.color);
                                plugin.doneLoader(element);
                            }

                        }, "json");
                        break;

                    case "duplicate":
                        $.post(plugin.options.url, {
                            action: "duplicateSlide",
                            id: set.id,
                        }, function(json) {
                            if (json.type === "success") {
                                $(json.thumb).insertAfter($parent);
                                element.html(json.html);
                                $(".wojo.dropdown").dropdown();
                                $('#editable').editableTableWidget();
                                $('.filler', plugin.elements.toolbar).remove();
                                plugin.sortSlide();
                                plugin.doneLoader(element);
                            }

                        }, "json");
                        break;

                    case "delete":
                        $.post(plugin.options.url, {
                            action: "deleteSlide",
                            id: set.id
                        }, function(json) {
                            if (json.type === "success") {
                                $parent.transition({
                                    animation: 'drop',
                                    onComplete: function() {
                                        $parent.remove();
                                        $(plugin.element).html('');
                                        $('.list', plugin.elements.layeritems).html('');
                                        plugin.addFiller(plugin.elements.toolbar);
                                        plugin.doneLoader(element);
                                    }
                                });
                            }

                        }, "json");
                        break;
                }
            });

            //Reorder slides
            $(this.elements.slideholder).on('click', 'a#reorder', function() {
                $(this).addClass('disabled loading');
                plugin.addFiller(plugin.elements.toolbar);
                $('a#rsave', plugin.elements.slideholder).removeClass('disabled');
                $(plugin.elements.slideholder).sortable(plugin.soptions)
                    .on('sortupdate', function() {
                        plugin.sortSlide.call(plugin);
                    });
            });

            //Finish reordering
            $(this.elements.slideholder).on('click', 'a#rsave', function() {
                $(this).addClass('disabled');
                $('a#reorder', plugin.elements.slideholder).removeClass('disabled loading');
                $(plugin.elements.slideholder).sortable('destroy');
                $(".filler", plugin.elements.toolbar).remove();
            });

            //Add new slide
            $(this.elements.slideholder).on('click', 'a#addnew', function() {
                plugin.fileBrowse("new", '');
                element.addClass('loading');
            });
        },

        sourceActions: function() {
            var element = $(this.element);
            var plugin = this;

            //Slide source
            $(this.elements.source).on('change', 'input[type=radio]', function() {
                var active = $(plugin.elements.slideholder).find('.thumb.active');
                var image = $('#bg_img').val();
                var value = $(this).val();
                if (active.length) {
                    switch (value) {
                        case "bg":
                            $('[data-id=cl_asset]').hide();
                            $('[data-id=bg_asset]').show();
                            $(active).find('.holder, .checkers, img').remove();
                            $(active).prepend('<img src="' + plugin.options.surl + '/uploads/' + image + '">');

                            $('.uimage', element).css({
                                'background-image': 'url(' + plugin.options.surl + '/uploads/' + image + ')',
                                'background-color': color ? color : '#fcfcfc'
                            });

                            $('.uitem', element).attr('data-type', 'bg');
                            break;

                        case "tr":
                            $('[data-id=cl_asset],[data-id=bg_asset]').hide();
                            $(active).find('.holder, img').remove();
                            $('<div/>', {
                                'class': 'checkers'
                            }).prependTo(active);
                            $('.uimage', element).css({
                                'background-color': '',
                                'background-image': 'none'
                            });
                            $('.uitem', element).attr('data-type', 'tr');
                            break;

                        case "cl":
                            $('[data-id=bg_asset]').hide();
                            $('[data-id=cl_asset]').show();
                            $(active).find('.checkers, img').remove();
                            var color = $('#bg_color').val();
                            $('<div/>', {
                                'class': 'holder',
                                'css': {
                                    "background-color": color ? color : "#fcfcfc"
                                }
                            }).prependTo(active);

                            $('.uimage', element).css({
                                'background-image': 'none',
                                'background-color': color ? color : '#fcfcfc'
                            });
                            $('.uitem', element).attr('data-type', 'cl');

                            $("[data-id=cl_asset] .button").spectrum({
                                showInput: true,
                                showAlpha: true,
                                move: function(color) {
                                    var rgba = "transparent";
                                    if (color) {
                                        rgba = color.toRgbString();
                                    }

                                    $(this).css("color", rgba);
                                    $(".holder", active).css("background-color", rgba);
                                    $('.uimage', element).css("background-color", rgba);

                                },
                                change: function(color) {
                                    var rgba = "transparent";
                                    if (color) {
                                        rgba = color.toRgbString();
                                    }
                                    $('#bg_color').val(rgba);
                                }
                            });
                            break;
                    }
                }
            });

            //change image
            $(this.elements.source).on('click', '.bg_image', function() {
                var active = $(plugin.elements.slideholder).find('.thumb.active');
                plugin.fileBrowse("bg", active);
            });

            //Close source
            $(this.elements.source).on('click', 'a#closeSource', function() {
                $(plugin.elements.source).transition('slide up');
                $(".filler", plugin.elements.slideholder).remove();
            });
        },

        configActions: function() {
            var plugin = this;

            $("input[name=height]").on('change', function() {
                var height = parseInt($(this).val());
                $(plugin.element).height(height);
                $('.uitem').height(height);
            });
        },

        getLayers: function() {
            var html = '';
            var that = this;
            $.each($('.ws-layer', this.element), function() {
                var id = $(this).attr('id');
                var type = $(this).attr('data-type');
                switch (type) {
                    case "header":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon wysiwyg bold"></i> ' + that.options.lang.header + '</a>';
                        break;
                    case "para":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon wysiwyg paragraph"></i> ' + that.options.lang.paragraph + '</a>';
                        break;
                    case "button":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon youtube"></i> ' + that.options.lang.button + '</a>';
                        break;
                    case "shape":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon checkbox"></i> ' + that.options.lang.shape + '</a>';
                        break;
                    case "icon":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon heart"></i> ' + that.options.lang.icon + '</a>';
                        break;
                    case "video":
                        html += '<a data-id="' + id + '" class="item inverted"><i class="icon camera retro"></i> ' + that.options.lang.video + '</a>';
                        break;
                }
            });

            $(".list", that.elements.layeritems).html(html);
        },

        fileBrowse: function(process, active) {
            var that = this;
            $.get(this.options.aurl + '/managerBuilder.php', {
                pickFile: 1,
                editor: true
            }).done(function(data) {
                var modal =
                    '<div class="wojo large modal">' +
                    '<div class="wojo content">' + data + '</div>' +
                    '</div>';
                $(modal).modal('setting', 'onShow', function() {
                    var cmodal = this;
                    $("#result").on('click', '.is_file', function() {
                        var dataset = $(this).data('set');
                        switch (process) {
                            case "bg":
                                if (dataset.image === "true") {
                                    $("#bg_img").val(dataset.url);
                                    $(active).find('.holder, .checkers, img').remove();
                                    $(active).prepend('<img src="' + that.options.surl + '/uploads/' + dataset.url + '">');
                                    $('.uimage', that.element).css({
                                        "background-image": "url('" + that.options.surl + "/uploads/" + dataset.url + "')"
                                    });

                                    $(cmodal).modal('hide');
                                }
                                break;

                            case "new":
                                if (dataset.image === "true") {
                                    that.addSlide(dataset.url);
                                    $(cmodal).modal('hide');
                                }
                                break;
                        }
                    });
                }).modal('setting', 'onHidden', function() {
                    that.doneLoader(that.element);
                    $(this).remove();
                }).modal('show');
            });
        },

        addSlide: function(image) {
            var that = this;
            $.post(this.options.url, {
                action: "newSlide",
                id: $.url().segment(-1),
                image: image
            }, function(json) {
                if (json.type === "success") {
                    var height = $(that.element).height();
                    var html = ('' +
                        '<div class="uitem" id="item_' + json.id + '" data-type="' + json.mode + '" style="height:' + height + 'px;position:relative">' +
                        '<div class="uimage" style="' +
                        'width:100%;' +
                        'height:100%;' +
                        'position:absolute;' +
                        'z-index:1;' +
                        'background-size:cover;' +
                        'background-position:center;' +
                        'background-repeat:no-repeat;' +
                        'background-image:url(' + json.image + ')">' +
                        '<div class="ucontent" style="position:relative;height:100%"> </div>' +
                        '</div>' +
                        '</div>');

                    $(that.element).html(html);
                    $("#bg_img").val(image);
                    $(json.thumb).insertBefore('#tadd');
                    $(':radio[value=' + json.mode + ']', that.elements.source).prop('checked', true);
                    $('[data-id=' + json.mode + '_asset]').show();
                    $(that.elements.source).transition('slide down');
                    $(".wojo.dropdown").dropdown();
                    $('#editable').editableTableWidget();
                    that.addFiller(that.elements.slideholder);
                    $('.list', that.elements.layeritems).html('');
                    that.doneLoader(that.element);
                }
            }, "json");
        },

        addLayerItem: function(id, icon, name) {
            $(".list", this.elements.layeritems).append('<a data-id="' + id + '" class="item inverted"><i class="icon ' + icon + '"></i> ' + name + '</a>');
        },

        sortSlide: function() {
            var order = $('.sortable', this.elements.slideholder).map(function() {
                return $(this).data("id");
            }).get();
            $.post(this.options.url, {
                list: order,
                action: "slideOrder"
            });
        },

        addFiller: function(el) {
            $('<div/>', {
                'class': 'filler',
                'css': {
                    "position": "absolute",
                    "width": "100%",
                    "height": "100%",
                    "opacity": ".5",
                    "left": 0,
                    "top": 0,
                    "background": "#fff"
                }
            }).appendTo(el);
        },

        uniqId: function() {
            return Math.round(new Date().getTime() + (Math.random() * 100));
        },

        doneLoader: function(el) {
            setTimeout(function() {
                $(el).removeClass('loading');
            }, 800);
        },
    });

    //Global Configuration
    $("#layoutMode").on('click', 'a', function() {
        $("#layoutMode .segment").removeClass('active');
        $(this).parent().addClass('active');
        $("input[name=layout]").val($(this).data('type'));
    });

    $("select[name=transition]").on('change', function() {
        var type = $(this).val();
        var time = $("input[name=slidesEaseIn]").val();

        if (!type) {
            type = $(this).data('value');
        }
        if (!time) {
            time = 1;
        }
        if ($(this).val() !== "none") {
            $("#dummy").velocity('transition.' + type, {
                duration: parseInt(time)
            });
        }
    });

    $.fn.Slider = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        return this;
    };

    $.fn.Slider.defaults = {
        url: "",
        aurl: "",
        surl: "",
        element: "",
        ytapi: "",
        adistance: 5,
        lang: {
            canBtn: "",
            updBtn: "",
            insBtn: "",
            icon: "",
            button: "",
            video: "",
            shape: "",
            header: "",
            paragraph: ""
        }
    };

})(jQuery, window, document);