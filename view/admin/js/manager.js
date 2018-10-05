(function($, window, document, undefined) {
    "use strict";
    var pluginName = 'Manager';

    function Plugin(element, options) {
        this.element = element;
        this._name = pluginName;
        this._defaults = $.fn.Manager.defaults;
        this.options = $.extend({}, this._defaults, options);
        this.init();
    }

    $.extend(Plugin.prototype, {
        init: function() {
            this.buildList();
            this.bindEvents();
        },

        buildList: function(dirname, type, ext, sorting) {
            var plugin = this;
            var element = this.element;
            //plugin.addLoader();

            $.get(this.options.url + "/process/managerController.php", {
                action: "getFiles",
                exts: ext,
                layout: type,
                dir: dirname,
                sorting: sorting
            }).done(function(json) {
                var obj = $.parseJSON(json);
                var template = plugin.renderTemplate(type, obj);
                $(element).html(template).velocity('transition.fadeIn');
                $("#tsizeDir span").html(obj.dirsize);
                $("#tsizeFile span").html(obj.filesize);
                if (type === "grid") {
                    $('.wojo.blocks').waitForImages().done(function() {
                        $('.wojo.blocks').pinto({
                            itemWidth: plugin.options.gridSize
                        });
                    });
                }
				if(plugin.options.is_editor) {
					$(".wojo.modal").modal('refresh');
				}
            }, "json");

        },

        // Bind events that trigger methods
        bindEvents: function() {
            var plugin = this;
            var element = this.element;
			var lang = plugin.options.lang;

            $('#togglePreview').on('click', function() {
                var icon = $(this).children();
                $(icon).toggleClass('expand compress');
                $("#preview").toggle();
                var type = $('#displyType a.active').data('type');
                if (type === "grid") {
                    $('.wojo.blocks').pinto({
                        itemWidth: plugin.options.gridSize
                    });
                }
            });

            $('#fm').on('click', 'a.is_file', function() {
                var dataset = $(this).data('set');
                var url = plugin.options.dirurl + '/' + dataset.url;
                var murl = plugin.options.url + '/images/mime/' + dataset.ext + '.png';

                var is_image = (dataset.image === "true") ? url : murl;
                if (dataset.name) {
                    var template = '' +
                        '<img src="' + is_image + '" class="wojo medium basic image" alt=""> ' +
                        '<div class="wojo relaxed divided link list"> ' +
                        '<div class="item"><div class="header">' + plugin.maxLength(dataset.name, 20) + '</div></div> ' +
                        '<div class="item">' + lang.size + ': ' + dataset.size + '</div> ' +
                        '<div class="item">' + lang.lastm + ': ' + dataset.ftime + '</div> ' +
                        '<div class="item"><i class="icon download"></i><div class="content"> ' +
                        '<a href="' + url + '" class="wojo bold text inverted"> ' + lang.download + ' </a></div> ' +
                        '</div>';
                    if (dataset.ext === "zip") {
                        template += '' +
                            '<a class="item"><i class="icon shield"></i><div class="content"> ' +
                            '<div data-url="' + dataset.url + '/" class="wojo bold text unzip"> ' + lang.unzip + ' </div></div>' +
                            '</a>';
                    }
                    template += '' +
                        '<a class="item"><i class="icon trash"></i><div class="content"> ' +
                        '<div data-url="' + dataset.url + '/" data-name="' + dataset.name + '" data-type="file" class="wojo negative bold text delSingle"> ' + lang.delete + ' </div></div> ' +
                        '</a>' +
                        '<div class="wojo basic divider"></div>' +
                        '</div>';
						
                    if (plugin.options.is_mce) {
                        template += '' +
                            '<div class="content-center"><a class="wojo small primary button insertMCE" data-url="' + url + '"> ' + lang.insert + ' </a></div>';
                    }
                    $("#preview").html(template);
                }
            });

            //Browse directories
            $('#fm').on('click', 'a.is_dir', function() {
                var dataset = $(this).data('set');
                var items = plugin.filterDisplay();
                var folder = (dataset.files > 0) ? 'open' : 'closed';
                plugin.buildList(dataset.url, items.layout, items.filter, items.sorting);
                $("#fcrumbs").html('<a class="is_dir" data-set=\'{"url":""}\'>' + lang.home + '</a>  <i class="icon long right arrow"> </i> ' + plugin.getCrumbs(dataset.url));
                if (dataset.name) {
                    var template = '' +
                        '<img src="' + plugin.options.url + '/images/mime/' + folder + '_folder.png" class="wojo basic medium image" alt=""> ' +
                        '<div class="wojo relaxed divided link list"> ' +
                        '<div class="item"><div class="header">' + plugin.maxLength(dataset.name, 20) + '</div></div> ' +
                        '<div class="item"><div class="header">' + lang.items + ': ' + dataset.files + '</div></div> ' +
                        '<a class="item"><i class="icon trash"></i><div class="content"> ' +
                        '<div data-url="' + dataset.url + '" data-name="' + dataset.name + '" data-type="dir" class="wojo negative bold text delSingle"> ' + lang.delete + ' </div></div> ' +
                        '</a>' +
                        '<div class="wojo basic divider"></div>' +
                        '</div>';
                    $("#preview").html(template);
                    $("input[name=dir]").val(dataset.url);
                }
            });

            //Delete multiple files/folders
            $('#fm').on('click', '.delete', function() {
                var $this = $(this);
                var checkedValues = $('#listView input:checkbox:checked').map(function() {
                    return this.value;
                }).get();
                if (!$.isEmptyObject(checkedValues)) {
                    $this.addClass('loading');
                    $.post(plugin.options.url + "/process/managerController.php", {
                        action: "delete",
                        items: checkedValues,
                    }, function(json) {
                        if (json.type === "success") {
                            $('#listView tr').each(function() {
                                if ($(this).find('input:checked').length) {
                                    $(this).fadeOut(400, function() {
                                        $(this).remove();
                                    });
                                    $this.removeClass('loading');
                                }
                            });

                        }
                    }, "json");
                }
            });

            //Delete single files/folders
            $('#fm').on('click', '.delSingle', function() {
                var dir = $(this).data('url');
                var type = $(this).data('type');
                $.post(plugin.options.url + "/process/managerController.php", {
                    action: "delete",
                    items: [dir],
                }, function(json) {
                    if (json.type === "success") {
                        var layout = plugin.filterDisplay();
                        if (type === "dir") {
                            $(element).html('<div class="wojo basic centered image"><img src="' + plugin.options.url + '/images/search_empty.png" alt=""></div>').transition('fade in');
                            $("#preview").html('');
                        } else {
                            $(element).find("[data-id='" + dir + "']").remove();
                            $("#preview").html('<img class="wojo medium basic image" src="' + plugin.options.url + '/images/search_empty.png" alt="">');
                        }

                        if (layout.layout === "grid") {
                            $('.wojo.blocks').pinto({
                                itemWidth: plugin.options.gridSize
                            });
                        }

                    }
                }, "json");
            });

            //New Folder
            $('#fm').on('click', '#addFolder', function() {
                var $parent = $(this).parent('.input');
                var $field = $("input[name=foldername]");
                var items = plugin.filterDisplay();

                if ($field.val().length > 0) {
                    $parent.addClass('loading');
                    $.post(plugin.options.url + "/process/managerController.php", {
                        action: "newFolder",
                        name: $field.val(),
                        dir: items.dir
                    }, function(json) {
                        if (json.type === "success") {
                            plugin.buildList(items.dir, items.layout, items.filter, items.sorting);
                            $parent.removeClass('loading');
                            $parent.closest('.dropdown').dropdown('hide');
                        }
                    }, "json");
                }

            });

            /* == Unzip == */
            $('#fm').on('click', '.unzip', function() {
                var url = $(this).data('url');
                $.post(plugin.options.url + "/process/managerController.php", {
                    action: "unzip",
                    item: url,
                }, function(json) {
                    if (json.type === "success") {
                        var items = plugin.filterDisplay();
                        plugin.buildList(items.dir, items.layout, items.filter, items.sorting);
                    }
                }, "json");
            });

            /* == TinyMCE insert == */
            $('#fm').on('click', 'a.insertMCE', function() {
                var filename = $(this).data('url');
                var id = $.url().param('field_name');
                window.parent.$("#" + id).val(filename);
                if (typeof parent.tinyMCE !== "undefined") {
                    parent.tinyMCE.activeEditor.windowManager.close();
                }
                if (window.opener) {
                    window.close();
                }
            });
			
            /* == Check All == */
            $('#fm').on('change', '#selectAll', function() {
                $('#listView .checkbox').checkbox('toggle', $(this));

            });

            //Type filter
            $('#ftype').on('click', 'a', function() {
                $('#ftype a').removeClass('active');
                var filter = $(this).data('type');
                $(this).addClass('active');
                var items = plugin.filterDisplay();
                plugin.buildList(items.dir, items.layout, filter, items.sorting);
            });

            //Sorting type
            $('.fileSort').on('change', function() {
                var sorting = $(this).val();
                var items = plugin.filterDisplay();
                plugin.buildList(items.dir, items.layout, items.filter, sorting);
            });

            //Display type
            $('#displyType').on('click', 'a', function() {
                $('#displyType a').removeClass('active');
                var layout = $(this).data('type');
                $(this).addClass('active');
                var items = plugin.filterDisplay();
                plugin.buildList(items.dir, layout, items.filter, items.sorting);
            });

            //File Upload
            $('#drag-and-drop-zone').on('click', function() {
                var items = plugin.filterDisplay();
                $(this).wojoUpload({
                    url: plugin.options.url + "/process/managerController.php",
                    dataType: 'json',
                    extraData: {
                        action: "upload",
                        dir: items.dir
                    },
                    allowedTypes: '*',
                    onBeforeUpload: function(id) {
                        plugin.update_file_status(id, 'primary', 'Uploading...');
                    },
                    onNewFile: function(id, file) {
                        plugin.add_file(id, file);
                    },
                    onUploadProgress: function(id, percent) {
                        plugin.update_file_progress(id, percent);
                    },
                    onUploadSuccess: function(id, data) {
                        if (data.type === "error") {
                            plugin.update_file_status(id, 'negative', data.message);
                            plugin.update_file_progress(id, 0);
                        } else {
                            plugin.update_file_status(id, 'positive', '<i class="icon circle check"></i>');
                            plugin.update_file_progress(id, 100);
                            $('<img class="wojo basic upload image" src="' + data.filename + '">').insertBefore('#contentFile_' + id);
                        }
                    },
                    onUploadError: function(id, message) {
                        plugin.update_file_status(id, 'negative', message);
                    },
                    onFallbackMode: function(message) {
                        alert('Browser not supported: ' + message);
                    },

                    onComplete: function() {
                        $("#done").append('<a class="wojo tiny basic black button">' + lang.done + '</a>');
                        $("#done").on('click', 'a', function() {
                            plugin.buildList(items.dir, items.layout, items.filter, items.sorting);
                            $('#fileList').html('');
							$("#done a").remove();
                        });
                    }
                });
            });
        },

        addLoader: function() {
            $(this.element).prepend('<i class="icon large round chart spinning disabled"></i>');
        },

        add_file: function(id, file) {
            var template = '' +
                '<div class="item relative" id="uploadFile_' + id + '">' +
                '<div class="right floated content"><span class="wojo small medium text primary">Waiting</span></div>' +
                '<div class="content" id="contentFile_' + id + '">' +
                '<div class="header">' + file.name + '</div>' +
                '<div id="description_' + id + '" class="description wojo small text"></div>' +
                '</div>' +
                '<div class="wojo bottom attached indicating progress" data-percent="0">' +
                '<div class="bar" style="width:100%"></div>' +
                '</div>' +
                '</div>';

            $('#fileList').prepend(template);
        },

        update_file_status: function(id, status, message) {
            $('#uploadFile_' + id).find('span').html(message).toggleClass(status);
        },

        update_file_progress: function(id, percent) {
            $('#uploadFile_' + id).find('.progress').attr("data-percent", percent);
        },

        // trim long filenames
        maxLength: function(title, chars) {
            return (title.length > chars) ? title.substr(0, (chars - 3)) + '...' : title;
        },

        // display filter
        filterDisplay: function() {
            var layout = $('#displyType a.active').data('type');
            var filter = $('#ftype a.active').data('type');
            var dir = $("input[name=dir]").val();
            var sorting = $(".fileSort option:selected").val();
            return {
                "dir": dir,
                "layout": layout,
                "filter": filter,
                "sorting": sorting
            };
        },

        //do crumbs
        getCrumbs: function(dir) {
            var crumbs = [];
            crumbs = dir.split('/');
            crumbs = $.grep(crumbs, function(n) {
                return (n !== "" && n !== null);
            });
            var nav = '';
            $.each(crumbs, function(u, path) {
                if ((crumbs.length - 1) !== u) {
                    nav += '<a class="is_dir" data-set=\'{"url":"' + path + '"}\'>' + path.substr(0, 1).toUpperCase() + path.substr(1) + '</a> <i class="icon long right arrow"></i> ';
                } else {
                    nav += path.substr(0, 1).toUpperCase() + path.substr(1);
                }

            });

            return nav;
        },

        //Template
        renderTemplate: function(type, obj) {
            var plugin = this;
            var template = '';
            switch (type) {
                case "list":
                    template += '<div class="padding">';
                    template += '<div class="row gutters phone-block-1 tablet-block-2 screen-block-2">';
                    if (obj.directory) {
                        $.each(obj.directory, function() {
                            var folder = (this.total > 0) ? 'folder open' : 'folder';
                            template += '<div class="column" data-id="' + this.name + '">' +
                                '<a class="wojo boxed icon message is_dir" data-set=\'{"name":"' + this.name + '", "files":"' + this.total + '", "url":"' + this.path + '"}\'> ' +
                                '<i class="icon ' + folder + '"></i> ' +
                                '<div class="content"> ' +
                                '<div class="header"> ' +
                                '' + this.name + '' +
                                '</div> ' +
                                '<p>' + this.total + ' files</p> ' +
                                '</div> ' +
                                '</a>' +
                                '</div>';
                        });
                    }
                    if (obj.files) {
                        $.each(obj.files, function() {
                            var is_image = (this.is_image) ? plugin.options.dirurl + '/thumbs/' + this.name : plugin.options.url + '/images/mime/' + this.extension + '.png';
                            template += '<div class="column" data-id="' + this.name + '">' +
                                '<div class="selectable"><a class="wojo boxed transparent icon message is_file" data-set=\'{"name":"' + this.name + '", "image":"' + this.is_image + '", "ext":"' + this.extension + '", "ftime":"' + this.ftime + '", "size":"' + this.size + '", "url":"' + this.url + '"}\'> ' +
                                '<img src="' + is_image + '" alt=""> ' +
                                '<div class="content"> ' +
                                '<div class="header"> ' +
                                '' + plugin.maxLength(this.name, 20) + '' +
                                '</div> ' +
                                '<p>' + this.size + '</p> ' +
                                '</div> ' +
                                '</div></a>' +
                                '</div>';

                        });
                    }
                    template += '</div>';
                    template += '</div>';
                    break;

                case "grid":
                    template += '<div class="padding">';
                    template += '<div class="wojo blocks">';
                    if (obj.directory) {
                        $.each(obj.directory, function() {
                            var folder = (this.total > 0) ? 'open' : 'closed';
                            template += '<div class="item" data-id="' + this.name + '">' +
                                '<div class="wojo attached boxed segment"> ' +
                                '<div class="content-center">' +
                                '<a data-set=\'{"name":"' + this.name + '", "files":"' + this.total + '", "url":"' + this.path + '"}\' class="is_dir"> ' +
                                '<img alt="" src="' + plugin.options.url + '/images/mime/' + folder + '_folder.png" class="wojo basic image"> ' +
                                '</a> ' +
                                '</div> ' +
                                '<div class="wojo divider"></div>' +
                                '<span class="wojo bold text">' + this.name + '</span>' +
                                '<p class="wojo bold text">' + this.total + ' files</p>' +
                                '</div> ' +
                                '</div>';
                        });
                    }

                    if (obj.files) {
                        $.each(obj.files, function() {
                            var is_image = (this.is_image) ? plugin.options.dirurl + '/thumbs/' + this.name : plugin.options.url + '/images/mime/' + this.extension + '.png';
                            template += '<div class="item" data-id="' + this.name + '">' +
                                '<div class="wojo attached boxed segment selectable">' +
                                '<div class="content-center">' +
                                '<a class="is_file" data-set=\'{"name":"' + this.name + '", "image":"' + this.is_image + '", "ext":"' + this.extension + '", "ftime":"' + this.ftime + '", "size":"' + this.size + '", "url":"' + this.url + '"}\'>' +
                                '<img alt="" src="' + is_image + '" class="wojo basic image"></a>' +
                                '</div>' +
                                '<div class="wojo divider"></div>' +
                                '<span class="wojo bold text">' + plugin.maxLength(this.name, 20) + '</span>' +
                                '<p class="wojo bold text">' + this.size + '</p>' +
                                '</div>' +
                                '</div>';

                        });
                    }

                    template += '</div>';
                    template += '</div>';
                    break;

                default:
                    template += '<table class="wojo basic striped table">';
					if(!plugin.options.is_editor) {
						template += '' +
                        '<thead> ' +
                        ' <tr> ' +
                        '<th colspan="4" class="collapsing"><div class="wojo small slider checkbox"> ' +
                        '<input type="checkbox" name="master" value="1" id="selectAll"> ' +
                        '<label>&nbsp;</label> ' +
                        '</div></th> ' +
                        '</tr> ' +
                        '</thead>';
					}
                    template += '<tbody id="listView">';
                    if (obj.directory) {
                        $.each(obj.directory, function() {
                            var folder = (this.total > 0) ? 'folder open' : 'folder';
                            template += '<tr data-id="' + this.name + '">';
							    if(!plugin.options.is_editor) {
									template += '' +
                                '<td class="collapsing"><div class="wojo small checkbox">' +
                                '<input type="checkbox" name="' + this.name + '" value="' + this.path + '">' +
                                '<label>&nbsp;</label>' +
                                '</div>' +
                                '</td>';
								}
								template += '' +
                                '<td class="collapsing"><i class="icon primary ' + folder + '"></i></td> ' +
                                '<td><a class="black is_dir" data-set=\'{"name":"' + this.name + '", "files":"' + this.total + '", "url":"' + this.path + '"}\'>' + this.name + '</a></td> ' +
                                '<td class="collapsing">' + this.total + ' <small>(items)</small></td>';
                            template += '</tr>';
                        });
                    }

                    if (obj.files) {
                        $.each(obj.files, function() {
                            var mime = this.mime.split('/');
                            var icon = '';
                            switch (mime[0]) {
                                case "image":
                                    icon = '<i class="icon photo"></i>';
                                    break;
                                case "video":
                                    icon = '<i class="icon camera retro"></i>';
                                    break;
                                case "audio":
                                    icon = '<i class="icon volume"></i>';
                                    break;
                                default:
                                    icon = '<i class="icon file"></i>';
                                    break;
                            }

                            template += '<tr data-id="' + this.name + '" class="selectable">';
							   if(!plugin.options.is_editor) {
								   template += '' +
                                '<td class="collapsing"><div class="wojo small checkbox">' +
                                '<input type="checkbox" name="' + this.name + '" value="' + this.url + '">' +
                                '<label>&nbsp;</label>' +
                                '</div>' +
                                '</td>';
							   }
							   template += '' +
                                '<td class="collapsing">' + icon + '</td>' +
                                '<td><a class="black is_file" data-set=\'{"name":"' + this.name + '", "image":"' + this.is_image + '", "ext":"' + this.extension + '", "ftime":"' + this.ftime + '", "size":"' + this.size + '", "url":"' + this.url + '"}\'>' + this.name + '</a></td>' +
                                '<td class="collapsing">' + this.size + '</td>';
                            template += '</tr>';
                        });
                    }

                    template += '</tbody>';
                    template += '</table>';
                    break;

            }

            return template;
        }

    });

    $.fn.Manager = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        return this;
    };

    $.fn.Manager.defaults = {
        url: "",
        dirurl: "",
		is_editor: false,
		is_mce: false,
        gridSize: 220,
        lang: {
            delete: "Delete",
			insert: "Insert",
			download: "Download",
			unzip: "Unzip",
			size: "Size",
			lastm: "Last Modified",
			items: "items",
			done: "Done",
			home: "Home",
        }
    };

})(jQuery, window, document);