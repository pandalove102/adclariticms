(function($) {
    "use strict";
    $.Builder = function(settings) {
        var config = {
            adminPath: "",
            sitePath: "",
            imageselect: "",
            iconselect: "",
            pagename: "",
            lang: {
                cancel: "Cancel",
                ok: "OK"
            }
        };

        var element = "#container";
        var $element = $("#container");

        var wraps = {
            rowWrap: '<div class="row-tools">' +
                '<a class="row-up not-a"><i class="icon chevron up"></i></a>' +
                '<a class="row-down not-a"><i class="icon chevron down"></i></a>' +
                '<a class="row-copy not-a"><i class="icon copy"></i></a>' +
                '<a class="row-config not-a"><i class="icon cog"></i></a>' +
                '<a class="row-handle not-a"><i class="icon move vertical"></i></a>' +
                '<a class="row-edit not-a"><i class="icon code alt"></i></a>' +
                '<a class="row-delete not-a"><i class="icon trash"></i></a>' +
                '</div>',
            columnWrap: '<div class="column-tools">' +
                '<a class="column-handle not-a"><i class="icon arrows"></i></a>' +
                '<a class="column-delete not-a"><i class="icon trash"></i></a>' +
                '</div>',
        };

        //sortableRows
        var sortableRows = {
            axis: "y",
            placeholder: "row-ghost",
            handle: ".row-handle",
            cursor: "move",
            receive: function(event, ui) {
                if (ui.sender.is(".grids")) {
                    ui.helper.replaceWith($('.hidden', ui.item).html());
                    prepareInitRow($element.children('.wojo-grid'));
                }

                if (ui.sender.is(".sections")) {
                    var html = ui.item.find('.section');
                    var set = ui.item.children('.hidden').data('set');
                    if (set) {
                        processElement(ui.item, set);
                    }
                    prepareDragSectionColumn(html);
                    ui.helper.replaceWith($('.hidden', ui.item).html());
                    prepareInitRow($element.children('.section'));
                }

                if (ui.sender.is(".elements")) {
                    var htmle = ui.item.children('.hidden');
                    prepareDragColumn(htmle);
                    ui.helper.replaceWith(htmle.html());
                }

                if (ui.sender.is(".pluginlist")) {
                    var phtml = ui.item.children('.phidden');
                    var el = $("[data-mode=readonly]", phtml);
                    var pid = el.attr('data-plugin-id');
                    var group = el.attr('data-plugin-group');
                    prepareDragColumn(phtml);
                    ui.helper.replaceWith(phtml.html());
                    ui.sender.parent().remove();
                    assignPlugin(pid, group);
                }

                if (ui.sender.is(".modulelist")) {
                    var mhtml = ui.item.children('.phidden');
                    var mel = $("[data-mode=readonly]", mhtml);
                    var mid = mel.attr('data-module-module_id');
                    var mgroup = mel.attr('data-module-group');
                    prepareDragColumn(mhtml);
                    ui.helper.replaceWith(mhtml.html());
					$("#cModules [data-module-group='" + mgroup + "']").closest('.column').remove();
                    assignModule(mid, mgroup);
                }
				
                if (ui.helper && ui.sender.is(":not(.grids)")) {
                    $element.data('contentbuilder').applyBehavior();
                    $element.data('contentbuilder').blockChanged();
                }
            },
        };

        //sortableColumns
        var sortableColumns = {
            connectWith: ".columns",
            placeholder: "column-ghost",
            handle: ".column-handle",
            cursor: "move",
            start: function() {
                $('body').addClass("movable");
            },
            stop: function() {
                $('body').removeClass("movable");
            },
            receive: function(event, ui) {
                if (ui.sender.is(".elements")) {
                    var html = ui.item.children('.hidden');
                    var set = html.data('set');
                    if (set) {
                        processElement(ui.item, set);
                    }
		
                    prepareDragColumn(html);
                    ui.helper.replaceWith(html.html());
                }

                if (ui.sender.is(".pluginlist")) {
                    var phtml = ui.item.children('.phidden');
                    var el = $("[data-mode=readonly]", phtml);
                    var pid = el.attr('data-plugin-id');
                    var group = el.attr('data-plugin-group');
                    prepareDragColumn(phtml);
                    ui.helper.replaceWith(phtml.html());
                    ui.sender.parent().remove();
                    assignPlugin(pid, group);
                }

                if (ui.sender.is(".modulelist")) {
                    var mhtml = ui.item.children('.phidden');
                    var mel = $("[data-mode=readonly]", mhtml);
                    var mid = mel.attr('data-module-module_id');
                    var mgroup = mel.attr('data-module-group');
                    prepareDragColumn(mhtml);
                    ui.helper.replaceWith(mhtml.html());
					$("#cModules [data-module-group='" + mgroup + "']").closest('.column').remove();
                    assignModule(mid, mgroup);
					
                }
				
                if (ui.helper && ui.sender.is(":not(.grids)")) {
                    $element.data('contentbuilder').applyBehavior();
                    $element.data('contentbuilder').blockChanged();

                }
            },
        };

        //draggableGrid
        var draggableGrid = {
            helper: function(event) {
                return $('<div class="cloner"><p>' + $(event.target).data('text') + '</p><i class="icon large reorder"></i></div>');
            },
            placeholder: "row-ghost",
            connectToSortable: element,
            tolerance: "pointer",
            stop: function(event, ui) {
                $(".columns", element).sortable({
                    connectWith: ".columns",
                    placeholder: "column-ghost",
                    handle: ".column-handle",
                    receive: function(event, ui) {
                        if (ui.sender.is(".elements")) {
                            var html = ui.item.children('.hidden');
                            prepareDragColumn(html);
                            ui.helper.replaceWith(html.html());
                            $element.data('contentbuilder').applyBehavior();
                            $element.data('contentbuilder').blockChanged();
                        }

                        if (ui.sender.is(".pluginlist")) {
                            var phtml = ui.item.children('.phidden');
                            var el = $("[data-mode=readonly]", phtml);
                            var pid = el.attr('data-plugin-id');
                            var group = el.attr('data-plugin-group');
                            prepareDragColumn(phtml);
                            ui.helper.replaceWith(phtml.html());
                            ui.sender.parent().remove();
                            assignPlugin(pid, group);
                            $element.data('contentbuilder').applyBehavior();
                            $element.data('contentbuilder').blockChanged();
                        }
						
                        if (ui.sender.is(".modulelist")) {
                            var mhtml = ui.item.children('.phidden');
							var mel = $("[data-mode=readonly]", mhtml);
							var mid = mel.attr('data-module-module_id');
							var mgroup = mel.attr('data-module-group');
                            prepareDragColumn(mhtml);
                            ui.helper.replaceWith(mhtml.html());
                            $("#cModules [data-module-group='" + mgroup + "']").closest('.column').remove();
							
                            assignModule(mid, mgroup);
                            $element.data('contentbuilder').applyBehavior();
                            $element.data('contentbuilder').blockChanged();
                        }
                    },
                });
            },
        };

        //draggableSections
        var draggableSections = {
            helper: function(event) {
                return $('<div class="cloner"><p>' + $(event.target).data('text') + '</p><i class="icon large reorder"></i></div>');
            },
            placeholder: "row-ghost",
            connectToSortable: element,
            tolerance: "pointer",
            stop: function(event, ui) {
                $(".columns", element).sortable({
                    connectWith: ".columns",
                    placeholder: "column-ghost",
                    handle: ".column-handle",
                    receive: function(event, ui) {
                        if (ui.sender.is(".elements")) {
                            var html = ui.item.children('.hidden');
                            var set = html.data('set');
                            if (set) {
                                processElement(ui.item, set);
                            }
                            prepareDragColumn(html);
                            ui.helper.replaceWith(html.html());
                        }

                        if (ui.sender.is(".pluginlist")) {
                            var phtml = ui.item.children('.phidden');
                            var el = $("[data-mode=readonly]", phtml);
                            var pid = el.attr('data-plugin-id');
                            var group = el.attr('data-plugin-group');
                            prepareDragColumn(phtml);
                            ui.helper.replaceWith(phtml.html());
                            ui.sender.parent().remove();
                            assignPlugin(pid, group);
                        }

						if (ui.sender.is(".modulelist")) {
							var mhtml = ui.item.children('.phidden');
							var mel = $("[data-mode=readonly]", mhtml);
							var mid = mel.attr('data-module-module_id');
							var mgroup = mel.attr('data-module-group');
							prepareDragColumn(mhtml);
							ui.helper.replaceWith(mhtml.html());
							$("#cModules [data-module-group=" + mgroup + "]").closest('.column').remove();
							assignModule(mid, mgroup);
						}
				
                        $element.data('contentbuilder').applyBehavior();
                        $element.data('contentbuilder').blockChanged();
                    },

                });
            },
        };

        //draggableElements
        var draggableElements = {
            helper: function(event) {
                return $('<div class="cloner"><p>' + $(event.target).data('text') + '</p><i class="icon large reorder"></i></div>');
            },
            placeholder: "column-ghost",
            connectToSortable: ".columns",
        };

        //draggablePlugins
        var draggablePlugins = {
            helper: function(event) {
                return $('<div class="cloner"><p>' + $(event.target).data('text') + '</p><i class="icon large reorder"></i></div>');
            },
            placeholder: "column-ghost",
            connectToSortable: ".columns",
        };

        //draggableModules
        var draggableModules = {
            helper: function(event) {
                return $('<div class="cloner"><p>' + $(event.target).data('text') + '</p><i class="icon large reorder"></i></div>');
            },
            placeholder: "column-ghost",
            connectToSortable: ".columns",
        };
		
        if (settings) {
            $.extend(config, settings);
        }

        init();

        $(element).on('click', '[data-mode=readonly] a', function(e) {
            e.preventDefault();
        });

        $('[data-plugin-id]', $element).each(function() {
            var id = $(this).attr('data-plugin-plugin_id');
            $("#plg_" + id).parent('.column').remove();
        });

        $('[data-module-id]', $element).each(function() {
            var id = $(this).attr('data-module-module');
            $("#mod_" + id).parent('.column').remove();
        });
		
        $('.wojo.accordion').accordion();
        $('#propEl').accordion({
            exclusive: false,
            animateChildren: false,
        });
        $('[data-content]').popup({
            variation: "mini",
            lastResort: true,
            inline: true,
        });
        $('#propInspector').draggable({
            cursor: "move",
            delay: 300
        });

        $('#propInspector > .content').enscroll({
            showOnHover: true,
            spacer: 8, //push scrollbar to the edge
            addPaddingToPane: false,
            verticalTrackClass: 'scrolltrack',
            verticalHandleClass: 'scrollhandle'
        });

        $('#sidebar').enscroll({
            showOnHover: true,
            spacer: 20, //push scrollbar to the edge
            addPaddingToPane: false,
            verticalTrackClass: 'scrolltrack',
            verticalHandleClass: 'scrollhandle'
        });
        $("#md-icons-list").draggable({
            cursor: "move",
            handle: "#dragIconBar"
        });

        $('.rangeslider').jRange();
		$('#sOpener').panelslider();
		
		//wojo blocks
		$('.wojo.blocks').waitForImages().done(function() {
			$('.wojo.blocks').each(function () {
				var set = $(this).data('wblocks');
				$(this).pinto(set);
			});	
		});
		
		//carousel
        $('.wojo.carousel').each(function() {
            var set = $(this).data('wcarousel');
            $(this).owlCarousel(set);
        });

		//wojo slider
		$('.wSlider').each(function () {
			var set = $(this).data('wslider');
			$(this).wojoSlider({
				startWidth:set.width,
				startHeight: set.height,
				automaticSlide: set.automaticSlide,
				theme: set.layout,
				hasThumbs: set.thumbs,
				showControls: set.arrows,
				showNavigation: set.buttons,
				showProgressBar:set.showProgressBar,
			});
		 });
		 	
        if ($('#md-icons-list .content').children().length < 1) {
            var list = '';
            var list2 = '';
            $.getJSON(config.adminPath + 'builder/snippets/iconset.json')
                .done(function(json) {
                    $.each(json.iconset, function(i, item) {
                        list += '<a class="md-icon-type" title="' + item.name + '"><i class="icon ' + item.code + '"></i></a>';
                        list2 += '<a class="md-icon" title="' + item.name + '"><i class="icon ' + item.code + '"></i></a>';
                    });
                    $("#md-icons-list .content").html(list);
                    $("#md-icons .content").html(list2);
                });
        }

        function init() {
            $element.children('.section').each(function() {
                prepareInitRow($(this));
                $(this).children('.wojo-grid').find('.columns').each(function() {
                    prepareInitColumn(this);
                });
            });

            $element.children('.wojo-grid').each(function() {
                prepareInitRow($(this));
                $(this).children('.row').children('.columns').each(function() {
                    prepareInitColumn(this);
                });
            });

            $element.sortable(sortableRows);

            $('.columns', element).sortable(sortableColumns);
            $("#sidebar .grids").draggable(draggableGrid);
            $("#sidebar .elements").draggable(draggableElements);
            $("#sidebar .pluginlist").draggable(draggablePlugins);
			$("#sidebar .modulelist").draggable(draggableModules);
            $("#sidebar .sections").draggable(draggableSections);

            $element.contentbuilder({
                sScriptPath: config.sitePath,
                sAdminPath: config.adminPath,
                imageselect: config.imageselect,
                fileselect: config.imageselect,
                iconselect: config.iconselect,
                container: config.container,
            });
			
			$('[data-plugin-id]', $element).each(function() {
				var plugin = $(this).attr("data-plugin-id");
				$("#plg_" + plugin).parent().remove();
			});
	
			$('[data-module-id]', $element).each(function() {
				var module = $(this).attr("data-module-group");
				$("#cModules [data-module-group=" + module + "]").closest('.column').remove();
			});
        }

        //Prepare init rows
        function prepareInitRow(row) {
            if (row.parent().is('.ui-draggable')) {
                row.append(wraps.rowWrap);
            } else {
                row.addClass('ui-draggable');
                row.append(wraps.rowWrap);
            }
        }

        //Prepare init columns
        function prepareInitColumn(col) {
            if ($(col).is(':parent')) {
                $(col).children('p, h1, h2, h3, h4, h5, h6, img, div').each(function() {
					//if($(this).attr('data-mode') !== "readonly") {
						$(this).wrap('<div class="column-wrap"><div class="column-dummy"></div></div>');
						$(this).parents('.column-wrap').append(wraps.columnWrap);		
					//}
                });
            }
        }

        function prepareDragColumn(col) {
            col.children('.column-wrap').each(function() {
                return $(this).children('.column-dummy').after(wraps.columnWrap);
            });
        }

        function prepareDragSectionColumn(col) {
            col.children('.wojo-grid').find('.columns').each(function() {
                prepareInitColumn(this);
            });
        }

        function processElement(item, set) {
            item.find('iframe').attr('src', set.frame);
        }

        function assignPlugin(item, group) {
            $("#newPlugin_" + item).addClass('wojo loader');
            $.getJSON(config.adminPath + 'helper.php', {
                doAction: 1,
                page: "builderPlugin",
                id: item
            }).done(function(json) {
                if (json.type === "success") {
                    $("#newPlugin_" + item).html(json.html);
                } else {
                    $("#newPlugin_" + item).remove();
                }

				//wojo slider
				$('.wSlider').each(function () {
					var set = $(this).data('wslider');
					$(this).wojoSlider({
						startWidth:set.width,
						startHeight: set.height,
						automaticSlide: set.automaticSlide,
						theme: set.layout,
						hasThumbs: set.thumbs,
						showControls: set.arrows,
						showNavigation: set.buttons,
						showProgressBar:set.showProgressBar,
					});
				 });
				 
				//wojo carousel
				$('.wojo.carousel').each(function() {
					var set = $(this).data('wcarousel');
					$(this).owlCarousel(set);
				});
		
                $("#newPlugin_" + item).removeClass('wojo loader');
            });
        }

        function loadPlugins(items) {
            $.getJSON(config.adminPath + 'helper.php', {
                doAction: 1,
                page: "loadBuilderPlugins",
                ids: items
            }).done(function(json) {
                $("#cPlugins .row").append(json.html);
                $("#sidebar .pluginlist").draggable(draggablePlugins);
                $('[data-content]').popup({
                    variation: "mini",
                    lastResort: true,
                    inline: true,
                });
            });
        }

        function assignModule(item, group) {
            $("#newModule_" + item).addClass('wojo loader');
            $.getJSON(config.adminPath + 'helper.php', {
                doAction: 1,
                page: "builderModule",
                id: item
            }).done(function(json) {
                if (json.type === "success") {
                    $("#newModule_" + item).html(json.html);
                } else {
                    $("#newModule_" + item).remove();
                }
                $("#newModule_" + item).removeClass('wojo loader');
            });
        }

        function loadModules(items) {
            $.getJSON(config.adminPath + 'helper.php', {
                doAction: 1,
                page: "loadBuilderModules",
                modalias: items
            }).done(function(json) {
                $("#cModules .row").append(json.html);
                $("#sidebar .modulelist").draggable(draggableModules);
                $('[data-content]').popup({
                    variation: "mini",
                    lastResort: true,
                    inline: true,
                });
            });
        }
		
        // clone element	
        $(element).on('click', 'a.row-copy', function() {
            var row = $(this).closest('.ui-draggable');
            var clone = row.clone();
            $('#temp-contentbuilder').html(clone);
            $('#temp-contentbuilder').find('[contenteditable]').removeAttr('contenteditable');
            $('#temp-contentbuilder .ovl').remove();
            $('#temp-contentbuilder').find("[data-plugin-plugin_id]").remove();
			$('#temp-contentbuilder').find("[data-module-module_id]").remove();
            var html = $('#temp-contentbuilder').html().trim();
            row.after(html);

            $('.columns', element).sortable(sortableColumns);
            $element.data('contentbuilder').applyBehavior();
            $element.data('contentbuilder').blockChanged();

        });

        // remove element
        $(element).on("click", "a.row-delete, a.column-delete", function() {
            var parent = $(this).is('.row-delete') ? $(this).closest('.ui-draggable') : $(this).closest('.column-wrap');
            var plugins = [];
			var modules = [];

            $('[data-plugin-id]', parent).each(function() {
                plugins.push($(this).attr("data-plugin-id"));
            });

            $('[data-module-id]', parent).each(function() {
                modules.push($(this).attr("data-module-alias"));
            });
			
            if ($(this).is('.row-delete')) {
                $(parent).css({
                    'outline': "2px solid #F37369"
                });
                var md_delrowconfirm =
                    '<div id="md-delrowconfirm" class="wojo tiny modal">' +
                    '<div class="content content-center">' +
                    '<p>Are you sure you want to delete this block?</p>' +
                    '</div>' +
                    '<div class="actions">' +
                    '<div class="wojo basic cancel button">' + config.lang.cancel + '</div>' +
                    '<div class="wojo ok negative button">' + config.lang.ok + '</div>' +
                    '</div>' +
                    '</div>';

                $(md_delrowconfirm)
                    .modal('setting', 'onApprove', function() {
                        if (plugins.length > 0) {
                            loadPlugins(plugins);
                        }
                        if (modules.length > 0) {
                            loadModules(modules);
                        }
                        $(parent).remove();
                        $element.data('contentbuilder').blockChanged();
                        $element.data('contentbuilder').settings.onRender();
                    }).modal('setting', 'onHidden', function() {
                        $(parent).css({
                            'outline': ""
                        });
                    }).modal('show');
            } else {
                if (plugins.length > 0) {
                    loadPlugins(plugins);
                }
                if (modules.length > 0) {
                    loadModules(modules);
                }
                $(parent).remove();

                $element.data('contentbuilder').blockChanged();
                $element.data('contentbuilder').settings.onRender();
            }

        });

        $(element).on("click", "a.row-config", function() {
            var parent = $(this).parent().parent();

            if (!parent.attr('data-tempid')) {
                parent.attr('data-tempid', Date.now());
            }

            var tid = parent.attr('data-tempid');
            $("#active-tempid").val(tid);
            if (parent.is('.wojo-grid')) {
                var activeSize = parent.children('.row').attr('class').replace('row ', '');
                $('#mButtons input').prop('checked', false);

                switch (activeSize) {
                    case "gutters":
                        $('#mButtons .sizefull').prop('checked', true);
                        break;

                    case "vertical-gutters":
                        $('#mButtons .sizefull input, #mButtons .typevertical input').prop('checked', true);
                        break;

                    case "horizontal-gutters":
                        $('#mButtons .sizefull input, #mButtons .horizontal input').prop('checked', true);
                        break;

                    case "half-gutters":
                        $('#mButtons .sizehalf input').prop('checked', true);
                        break;

                    case "half-vertical-gutters":
                        $("#mButtons .sizehalf input, #mButtons .typevertical input").prop('checked', true);
                        break;

                    case "half-horizontal-gutters":
                        ("#mButtons .sizehalf input, #mButtons .horizontal input").prop('checked', true);
                        break;

                    case "double-gutters":
                        $('#mButtons .sizedouble input').prop('checked', true);
                        break;

                    case "double-vertical-gutters":
                        $("#mButtons .sizedouble input, #mButtons .typevertical input").prop('checked', true);
                        break;

                    case "double-horizontal-gutters":
                        $("#mButtons .sizedouble input, #mButtons .typehorizontal input").prop('checked', true);
                        break;

                    default:
                        $('#mButtons .checkbox.sizenone').checkbox('check');
                        break;
                }

                $("#propInspector .element-head").text("row");
                $("#propColor, #propSize, #propBackground, #propPadding, #propShadow, #propBorder").hide();
                $("#propMargin").show();
            } else {
                var bgimage = parent.css('backgroundImage');
                var bgcolor = parent.css('backgroundColor');
                var padding = parent.css(['paddingTop', 'paddingRight', 'paddingBottom', 'paddingLeft']);

                $("#propInspector .element-head").text("section");
                if (bgimage === "none") {
                    $("#bgimage").html('<i class="icon large black photo"></i>');
                } else {
                    $("#bgimage").html('<img src="' + parent.css('backgroundImage').replace(/(url\(|\)|'|")/gi, '') + '">');
                }

                if (bgcolor !== "transparent") {
                    $(".backgroundColor").css("backgroundColor", bgcolor);
                    $(".backgroundColor").spectrum("set", bgcolor);
                }

                $.each(padding, function(key, value) {
                    if (parseInt(value) > 0) {
                        $('input[name=' + key + ']').jRange('setValue', parseInt(value));
                    } else {
                        $('input[name=' + key + ']').jRange('setValue', 0);
                    }
                });

                var pStyles = {
                    paddingLeft: parseInt($('#paddingLeft').val()),
                    paddingRight: parseInt($('#paddingRight').val()),
                    paddingTop: parseInt($('#paddingTop').val()),
                    paddingBottom: parseInt($('#paddingBottom').val()),
                };


                $("#paddingList").on("change", ".rangeslider", function() {
                    var val = $(this).val();
                    if ($(this).prop('name') === "all") {
                        $('#paddingTop').jRange('setValue', val);
                        $('#paddingBottom').jRange('setValue', val);
                        $('#paddingLeft').jRange('setValue', val);
                        $('#paddingRight').jRange('setValue', val);
                    } else {
                        pStyles[$(this).prop('name')] = val;
                    }
                    var cssCode = pStyles.paddingTop + 'px ' + pStyles.paddingRight + 'px ' + pStyles.paddingBottom + 'px ' + pStyles.paddingLeft + 'px ';
                    $("[data-tempid=" + $("#active-tempid").val() + "]").css('padding', cssCode);
                });

                $(".background-color").spectrum({
                    showPalette: true,
                    allowEmpty: true,
                    showInput: true,
                    showAlpha: true,
                    palette: [$element.data('contentbuilder').settings.colors],
                    move: function(color) {
                        var rgba = "transparent";
                        if (color) {
                            rgba = color.toRgbString();
                        }
                        $(this).css("backgroundColor", rgba);
                    },
                    change: function(color) {
                        var rgba = "transparent";
                        if (color) {
                            rgba = color.toRgbString();
                        }
                        $("[data-tempid=" + $("#active-tempid").val() + "]").css("backgroundColor", rgba);
                    },
                });

                $("#text-color, #border-color, #propSize, #propMargin, #propBorder").hide();
                $("#propColor, #background-color, #propBackground, #propPadding, #propShadow").show();
            }

            $("#propInspector").velocity('transition.expandIn');
        });

        //padding reset
        $(".padding-reset").click(function() {
            $('#paddingList .rangeslider').jRange('setValue', 0);
            $("[data-tempid=" + $("#active-tempid").val() + "]").css("padding", '');
        });

        $("#mButtons input").on('change', function() {
            var row = $("[data-tempid=" + $("#active-tempid").val() + "]").children('.row');
            var type = $("#mButtons input[name=gridtype]:checked").val();
            var size = $("#mButtons input[name=gridsize]:checked").val();
            var value = $(this).val();
            switch (value) {
                case "none":
                    $("#mButtons .typevertical input, #mButtons .typehorizontal input").prop('checked', false);
                    row.attr('class', 'row');
                    break;

                case "half":
                    if (type) {
                        row.attr('class', 'row half-' + type + '-gutters');
                    } else {
                        row.attr('class', 'row half-gutters');
                    }
                    break;

                case "full":
                    if (type) {
                        row.attr('class', 'row ' + type + '-gutters');

                    } else {
                        row.attr('class', 'row gutters');
                    }
                    break;

                case "double":
                    if (type) {
                        row.attr('class', 'row double-' + type + '-gutters');
                    } else {
                        row.attr('class', 'row double-gutters');
                    }
                    break;

                case "vertical":
                case "horizontal":
                    if (size === "none") {
                        row.attr('class', 'row');
                    } else if (size === "half" || size === "double") {
                        row.attr('class', 'row ' + size + '-' + type + '-gutters');
                    } else {
                        row.attr('class', 'row ' + type + '-gutters');
                    }
                    break;
            }
        });

        $("#changeBg").on('click', function() {
            $.get(config.adminPath + 'managerBuilder.php', {
                pickFile: 1,
                editor: true
            }).done(function(data) {
                var modal =
                    '<div id="fileModal" class="wojo fullscreen modal">' +
                    '<div class="wojo content">' + data + '</div>' +
                    '</div>';
                $(modal).modal('setting', 'onShow', function() {
                    var cmodal = this;
                    $("#result").on('click', '.is_file', function() {
                        var dataset = $(this).data('set');
						//console.log(dataset);
                        if (dataset.image === "true") {
                            $("#bgimage").html('<img src="' + config.sitePath + 'uploads/' + dataset.url + '">');
                            $("[data-tempid=" + $("#active-tempid").val() + "]").css({
                                "backgroundImage": "url(" + config.sitePath + "uploads/" + dataset.url + ")",
                                "backgroundSize": "cover"
                            });

                            $(cmodal).modal('hide');
                        }
                    });
                }).modal('setting', 'onHidden', function() {
                    $(this).remove();
                }).modal('show');
            });
        });

        $("#clearBg").on('click', function() {
            $("[data-tempid=" + $("#active-tempid").val() + "]").css({
                "background-image": "",
                "background-size": "",
                "background-color": ""
            });
            $("#bgimage").html('<i class="icon large black photo"></i>');
        });

        //Block html
        $(element).on('click', '.row-edit', function() {
            var $activeRow = $(this).parents('.ui-draggable');

            $('#temp-contentbuilder').html($activeRow.html());
            $('#temp-contentbuilder').find('[contenteditable]').removeAttr('contenteditable');
            $('#temp-contentbuilder *[class=""]').removeAttr('class');
            $("#temp-contentbuilder .columns").removeClass("ui-sortable");
            $('#temp-contentbuilder *[style=""]').removeAttr('style');
            $('#temp-contentbuilder').find('.row-tools').remove();
            $('#temp-contentbuilder').find('.column-tools').remove();

            $('#temp-contentbuilder').find('.columns').each(function() {
                $(this).find('.column-wrap, .column-dummy').children().unwrap();
            });

            $("[id^=plug_]").remove();
            $('#temp-contentbuilder').find('[data-mode=readonly]').each(function(i) {
                $(this).attr('id', 'ptmp_' + i);
                $('<div/>', {
                    id: 'plug_' + i,
                }).css('display', 'none').html($(this).html()).appendTo('#divCb');
                $(this).html('!!!DO NOT REMOVE!!!');
            });

            $('#temp-contentbuilder .ovl').remove();
            var html = $('#temp-contentbuilder').html().trim();
            html = html.replace(/<font/g, '<span').replace(/<\/font/g, '</span');
            $('#txtHtml').val(formatCode(html));

            $('#md-html').modal('setting', 'onApprove', function() {
                if ($activeRow.closest('.columns').data('mode') === 'html') {
                    $activeRow.closest('.columns').attr('data-html', encodeURIComponent($('#txtHtml').val()));
                } else {
                    $activeRow.html($('#txtHtml').val());
                }

                $('#temp-contentbuilder').find('[data-mode=readonly]').each(function(i) {
                    var html = $("#plug_" + i).html();
                    $("#ptmp_" + i).html(html);
                });

                if ($activeRow.is('.section')) {
                    $activeRow.each(function() {
                        prepareInitRow($(this));
                        $(this).children('.wojo-grid').find('.columns').each(function() {
                            prepareInitColumn(this);
                        });
                    });
                } else {
                    $activeRow.each(function() {
                        prepareInitRow($(this));
                        $(this).children('.row').children('.columns').each(function() {
                            prepareInitColumn(this);
                        });
                    });
                }

                $('.columns', $activeRow).sortable(sortableColumns);
                $("[id^=ptmp_]").removeAttr('id');

                $element.data('contentbuilder').applyBehavior();
                $element.data('contentbuilder').blockChanged();
                $element.data('contentbuilder').settings.onRender();
            }).modal('show');
        });

        //box shadow
        $("#shadowList").on('click', '.item', function() {
            var el = $("[data-tempid=" + $("#active-tempid").val() + "]");
            var shadow = $(this).css('box-shadow');
            var sid = $(this).attr('data-shadow');

            el.css("box-shadow", shadow);
            el.attr("data-shadow", sid);
            $("#shadowList .item").removeClass('active');
            $(this).addClass('active');
        });

        $("#shadow-reset").on('click', function() {
            var el = $("[data-tempid=" + $("#active-tempid").val() + "]");
            $("#shadowList .item").removeClass('active');
            el.css("box-shadow", "");
            el.removeAttr("data-shadow");
        });

        //border reset
        $("#border-reset").on('click', function() {
            var el = $("[data-tempid=" + $("#active-tempid").val() + "]");
            $("#borderList .rangeslider").jRange('setValue', 0);
            el.css({
                "border": "",
                "border-radius": ""
            });
        });

        $(element).on('click', '.row-up', function() {
            var $current = $(this).closest('.ui-draggable');
            var $previous = $current.prev('.ui-draggable');
            if ($previous.length !== 0) {
                $current.insertBefore($previous);
            }
            return false;
        });

        $(element).on('click', '.row-down', function() {
            var $current = $(this).closest('.ui-draggable');

            var $next = $current.next('.ui-draggable');
            if ($next.length !== 0) {
                $current.insertAfter($next);
            }
            return false;
        });

        // close Inspector	
        $('.closeInspector').on('click', function() {
            $("#propInspector").velocity('transition.expandOut');
        });

        // save	page
        $("#header").on('click', 'a.save', function() {
            $(element).addClass('wojo loader');
				
            $("#temp-contentbuilder").html($(element).html());
			
            $('#temp-contentbuilder').find('[contenteditable]').removeAttr('contenteditable');
            $('#temp-contentbuilder').find('.ovl').remove();

            $("#temp-contentbuilder").children().each(function() {
                $(this).removeClass("ui-draggable");
                $(this).children('.row-tools').remove();
            });

            $("#temp-contentbuilder").find('.column-tools').remove();
            $("#temp-contentbuilder").siblings().removeClass("ui-sortable");

            $("#temp-contentbuilder").find('.columns').each(function() {
                $(this).removeClass("ui-sortable");
                $(this).find('.column-dummy').unwrap();
                $(this).find('.column-dummy').children().unwrap();
            });

            $("#temp-contentbuilder").find('[data-plugin-id]').each(function() {
				var palias = $(this).attr('data-plugin-alias');
				var pid = $(this).attr('data-plugin-id');
				var plugin_id = $(this).attr('data-plugin-plugin_id');
                $(this).replaceWith("%%" + palias + "|plugin|" + plugin_id + "|" + pid + "%%");
            });

            $("#temp-contentbuilder").find('[data-module-id]').each(function() {
				var malias = $(this).attr('data-module-alias');
				var mid = $(this).attr('data-module-id');
				var module_id =$(this).attr('data-module-module_id');
                $(this).replaceWith("%%" + malias + "|module|" + module_id + "|" + mid + "%%");
            });

            var html = $("#temp-contentbuilder").html();
            var langall = ($("input[name=langall]").is(':checked')) ? "all" : $.url().segment(-2);

            $.ajax({
                url: config.adminPath + 'controller.php',
                dataType: "json",
                method: "POST",
                data: {
                    action: "processBuilder",
                    content: html,
                    id: $.url().segment(-1),
                    lang: langall,
                    pagename: config.pagename
                }
            }).done(function(json) {
                $.notice(json.message, {
                    autoclose: 12000,
                    type: json.type,
                    title: json.title
                });
                $(element).removeClass('wojo loader');
            });
        });

        // responsive view
        $('.reswitch').on('click', 'a.action', function() {
            $('#container').removeClass('tabletview phoneview');
            var mode = $(this).data('mode');
            $('.reswitch').find('i.icon').removeClass('active');

            switch (mode) {
                case "screen":
                    $("#container").velocity({
                        width: '100%'
                    }, 1000);
                    break;

                case "tablet":
                    $("#container").velocity({
                        width: '1024px'
                    }, 1000, function() {
                        $('#container').addClass('tabletview');
                    });
                    break;

                case "phone":
                    $("#container").velocity({
                        width: '768px'
                    }, 1000, function() {
                        $('#container').addClass('phoneview');
                    });
                    break;
            }
            $('.icon', this).addClass('active');
        });
    };
})(jQuery);