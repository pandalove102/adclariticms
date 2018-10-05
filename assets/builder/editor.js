var cb_list = '';
var cb_edit = true;
(function($) {
    var $activeRow;
    $.contentbuilder = function(element, options) {
        var defaults = {
            selectable: "h1,h2,h3,h4,h5,h6,p,blockquote,ul,ol,small,.edit,.wojo,td",
            editMode: 'default',
            onRender: function() {},
            onDrop: function() {},
            onImageBrowseClick: function() {},
            onImageSettingClick: function() {},
            imageselect: '',
            fileselect: '',
            sScriptPath: '',
            sAdminPath: '',
            onImageSelectClick: function() {},
            onFileSelectClick: function() {},
            iconselect: '',
            imageEmbed: false,
            sourceEditor: true,
            colors: ["#ffffc5", "#fff", "#ffd5d5", "#ffd4df", "#c5efff", "#b4fdff", "#c6f5c6", "#fcd1fe", "#ececec", "#f7e97a", "#d09f5e", "#ff8d8d", "#ff80aa", "#63d3ff", "#7eeaed", "#94dd95", "#ef97f3", "#d4d4d4", "#fed229", "#cc7f18", "#ff0e0e", "#fa4273", "#00b8ff", "#0edce2", "#35d037", "#d24fd7", "#888888", "#ff9c26", "#955705", "#c31313", "#f51f58", "#1b83df", "#0bbfc5", "#1aa71b", "#ae19b4", "#333333"],
            snippetList: '#divSnippetList',
            toolbar: 'top',
            toolbarDisplay: 'auto',
            hideDragPreview: false,
            largerImageHandler: ''
        };
        this.settings = {};
        var $element = $(element),
            element = element;
        this.init = function() {
            this.settings = $.extend({}, defaults, options);
            var is_edge = detectEdge();
            if ($('#divCb').length === 0) {
                $('body').append('<div id="divCb"></div>');
            }

            if ($('#temp-contentbuilder').length === 0) {
                $('#divCb').append('<div id="temp-contentbuilder" style="display: none"></div>');
                $('#divCb').append('<input type="hidden" id="active-tempid" />');
            }
            $('#sidebar').on("click touchup", function() {
                $('.row-tools').stop(true, true).fadeOut(0);
            });
            this.applyBehavior();
            this.blockChanged();
            this.settings.onRender();

            $(document).on('mousedown', function(event) {
                var $active_element;
                if ($(event.target).parents(".ui-draggable").length > 0) {
                    if ($(event.target).parents(".ui-draggable").parent().data('contentbuilder')) {
                        $active_element = $(event.target).parents(".ui-draggable").parent();
                    }
                }
                if ($(event.target).attr("class") == 'ovl') {
                    $(event.target).css('z-index', '-1');
                }
                if ($(event.target).parents('.ui-draggable').length > 0 && $(event.target).parents(cb_list).length > 0) {
                    var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                    $(".ui-draggable").removeClass('code');

                    if ($(event.target).parents("[data-mode='code']").length > 0) {
                        $(event.target).parents(".ui-draggable").addClass('code');
                    }

                    if ($(event.target).parents("[data-mode='readonly']").length > 0) {
                        $(event.target).parents(".ui-draggable").addClass('code');
                    }
                    $(".ui-draggable").removeClass('ui-dragbox-outlined');

                    $(event.target).parents(".ui-draggable").addClass('ui-dragbox-outlined');
                    if (is_firefox) {
                        //$(event.target).parents(".ui-draggable").addClass('firefox');
                    }

                    return;
                }
                if ($(event.target).parent().attr('id') == 'rte-toolbar' || $(event.target).parent().parent().attr('id') == 'rte-toolbar') {
                    return;
                }
                if ($(event.target).is('[contenteditable]') || $(event.target).css('position') == 'absolute' || $(event.target).css('position') == 'fixed') {
                    return;
                }
                $(event.target).parents().each(function(e) {
                    if ($(this).is('[contenteditable]') || $(this).css('position') == 'absolute' || $(this).css('position') == 'fixed') {
                        return;
                    }
                });
                $(".ui-draggable").removeClass('code');
                $(".ui-draggable").removeClass('ui-dragbox-outlined');
                $('#rte-toolbar').css('display', 'none');
            });
        };

        this.html = function() {
            var selectable = this.settings.selectable;
            $('#temp-contentbuilder').html($element.html());

            $('#temp-contentbuilder').find('.ovl').remove();
            $('#temp-contentbuilder').find('[contenteditable]').removeAttr('contenteditable');
            $('*[class=""]').removeAttr('class');

            $('#temp-contentbuilder').find('.ui-draggable').replaceWith(function() {
                return $(this).html();
            });

            $('#temp-contentbuilder').find('.ui-sortable').replaceWith(function() {
                return $(this).html();
            });

            $("#temp-contentbuilder").find("[data-mode='code']").each(function() {
                if ($(this).attr("data-html") != undefined) {
                    $(this).html(decodeURIComponent($(this).attr("data-html")));
                }
            });

            var html = $('#temp-contentbuilder').html().trim();
            html = html.replace(/<font/g, '<span').replace(/<\/font/g, '</span');
            return html;
        };

        this.clearControls = function() {
            $(".ui-draggable").removeClass('code');
            $(".ui-draggable").removeClass('ui-dragbox-outlined');
            var selectable = this.settings.selectable;
            $element.find(selectable).blur();
        };

        this.loadHTML = function(html) {
            $element.html(html);
            $element.children("*").wrap("<div class='ui-draggable'></div>");
            $element.data('contentbuilder').applyBehavior();
            $element.data('contentbuilder').blockChanged();
            $element.data('contentbuilder').settings.onRender();
        };

        this.applyBehavior = function() {
            $element.find('.column-dummy a').click(function() {
                return false;
            });
            $element.find("[data-mode='code']").each(function() {
                if ($(this).attr("data-html") != undefined) {
                    $(this).html(decodeURIComponent($(this).attr("data-html")));
                }
            });
            var selectable = this.settings.selectable;
            var imageEmbed = this.settings.imageEmbed;
            var colors = this.settings.colors;
            var editMode = this.settings.editMode;
            var toolbar = this.settings.toolbar;
            var toolbarDisplay = this.settings.toolbarDisplay;
            var onImageSelectClick = this.settings.onImageSelectClick;
            var onFileSelectClick = this.settings.onFileSelectClick;
            var onImageBrowseClick = this.settings.onImageBrowseClick;
            var onImageSettingClick = this.settings.onImageSettingClick;
            var imageselect = this.settings.imageselect;
            var fileselect = this.settings.fileselect;
            var iconselect = this.settings.iconselect;
            var sScriptPath = this.settings.sScriptPath;
            var sAdminPath = this.settings.sAdminPath;
            var largerImageHandler = this.settings.largerImageHandler;
            $element.contenteditor({
                fileselect: fileselect,
                iconselect: iconselect,
                sScriptPath: sScriptPath,
                sAdminPath: sAdminPath,
                editable: selectable,
                colors: colors,
                editMode: editMode,
                toolbar: toolbar,
                toolbarDisplay: toolbarDisplay,
                onFileSelectClick: onFileSelectClick
            });
            $element.data('contenteditor').render();
            $element.find('img').each(function() {
                if ($(this).parents("[data-mode='code']").length > 0) {
                    return;
                }
                if ($(this).parents("[data-mode='readonly']").length > 0) {
                    return;
                }
                $(this).imageembed({
                    sScriptPath: sScriptPath,
                    imageselect: imageselect,
                    fileselect: fileselect,
                    imageEmbed: imageEmbed,
                    onImageBrowseClick: onImageBrowseClick,
                    onImageSettingClick: onImageSettingClick,
                    onImageSelectClick: onImageSelectClick,
                    onFileSelectClick: onFileSelectClick,
                    largerImageHandler: largerImageHandler,
                    colors: colors,
                });
                if ($(this).parents('figure').length !== 0) {
                    if ($(this).parents('figure').find('figcaption').css('position') == 'absolute') {
                        $(this).parents('figure').imageembed({
                            sScriptPath: sScriptPath,
                            imageselect: imageselect,
                            fileselect: fileselect,
                            imageEmbed: imageEmbed,
                            onImageBrowseClick: onImageBrowseClick,
                            onImageSettingClick: onImageSettingClick,
                            onImageSelectClick: onImageSelectClick,
                            onFileSelectClick: onFileSelectClick,
                            largerImageHandler: largerImageHandler,
                            colors: colors,
                        });
                    }
                }
            });
            $element.find(".flex-video").each(function() {
                if ($(this).parents("[data-mode='code']").length > 0) {
                    return;
                }
                if ($(this).parents("[data-mode='readonly']").length > 0) {
                    return;
                }
                if ($(this).find('.ovl').length === 0) {
                    $(this).append('<div class="ovl" style="position:absolute;background:#fff;opacity:0.2;cursor:pointer;top:0;left:0px;width:100%;height:100%;z-index:-1"></div>');
                }
            });
            $element.find(".flex-video").hover(function() {
                if ($(this).parents("[data-mode='code']").length > 0) {
                    return;
                }
                if ($(this).parents("[data-mode='readonly']").length > 0) {
                    return;
                }
                if ($(this).parents(".ui-draggable").css('outline-style') == 'none') {
                    $(this).find('.ovl').css('z-index', '1');
                }
            }, function() {
                $(this).find('.ovl').css('z-index', '-1');
            });
            $element.find(selectable).off('focus');
            $element.find(selectable).focus(function() {
                var selectable = $element.data('contentbuilder').settings.selectable;
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                $(".ui-draggable").removeClass('code');
                if ($(this).parents("[data-mode='code']").length > 0) {
                    $(this).parents(".ui-draggable").addClass('code');

                }
                if ($(this).parents("[data-mode='readonly']").length > 0) {
                    $(this).parents(".ui-draggable").addClass('code');
                }
                $(".ui-draggable").removeClass('ui-dragbox-outlined');
                $(this).parents(".ui-draggable").addClass('ui-dragbox-outlined');
                if (is_firefox) {
                    //$(this).parents(".ui-draggable").addClass('firefox');
                }

            });
        };
        this.blockChanged = function() {
            if ($element.children().length === 0) {
                $element.addClass('empty');
            } else {
                $element.removeClass('empty');
            }
        };
        this.destroy = function() {
            if (!$element.data('contentbuilder')) {
                return;
            }
            var sHTML = $element.data('contentbuilder').html();
            $element.html(sHTML);
            $element.sortable("destroy");
            var cbarr = cb_list.split(","),
                newcbarr = [];
            for (var i = 0; i < cbarr.length; i++) {
                if (cbarr[i] != "#" + $element.attr("id")) {
                    newcbarr.push(cbarr[i]);
                }
            }
            cb_list = newcbarr.join(",");
            $element.removeClass('connectSortable');
            $element.css({
                'min-height': ''
            });
            if (cb_list == "") {
                $('#divCb').remove();
                $(document).off('mousedown');
            }
            $element.removeData('contentbuilder');
            $element.removeData('contenteditor');
            $element.off();
        };
        this.init();
    };
    $.fn.contentbuilder = function(options) {
        return this.each(function() {
            if (undefined == $(this).data('contentbuilder')) {

                var plugin = new $.contentbuilder(this, options);
                $(this).data('contentbuilder', plugin);
            }
        });
    };
})($);
var ce_toolbarDisplay = 'auto';
var ce_outline = false;
(function($) {
    var $activeLink;
    var $activeElement;
    var $activeFrame;
    var instances = [];

    function instances_count() {}
    $.fn.count = function() {};
    $.contenteditor = function(element, options) {
        var defaults = {
            editable: "h1,h2,h3,h4,h5,h6,p,ul,ol,small,.edit,.wojo,td",
            editMode: "default",
            hasChanged: false,
            onRender: function() {},
            outline: false,
            fileselect: '',
            iconselect: '',
            sScriptPath: '',
            sAdminPath: '',
            onFileSelectClick: function() {},
            toolbar: 'top',
            toolbarDisplay: 'auto',
            colors: ["#ffffc5", "#e9d4a7", "#ffd5d5", "#ffd4df", "#c5efff", "#b4fdff", "#c6f5c6", "#fcd1fe", "#ececec", "#f7e97a", "#d09f5e", "#ff8d8d", "#ff80aa", "#63d3ff", "#7eeaed", "#94dd95", "#ef97f3", "#d4d4d4", "#fed229", "#cc7f18", "#ff0e0e", "#fa4273", "#00b8ff", "#0edce2", "#35d037", "#d24fd7", "#888888", "#ff9c26", "#955705", "#c31313", "#f51f58", "#1b83df", "#0bbfc5", "#1aa71b", "#ae19b4", "#333333"]
        };
        this.settings = {};
        var $element = $(element),
            element = element;
        this.init = function() {
            this.settings = $.extend({}, defaults, options);
            var bUseCustomFileSelect = false;
            if (this.settings.fileselect != '') {
                bUseCustomFileSelect = true;
            }
            var sFunc = (this.settings.onFileSelectClick + '').replace(/\s/g, '');
            if (sFunc != 'function(){}') {
                bUseCustomFileSelect = true;
            }
            if ($('#divCb').length === 0) {
                $('body').append('<div id="divCb"></div>');
            }
            ce_toolbarDisplay = this.settings.toolbarDisplay;
            ce_outline = this.settings.outline;
            var toolbar_attr = '';
            if (this.settings.toolbar === 'left') {
                toolbar_attr = ' class="rte-side"';
            }
            if (this.settings.toolbar === 'right') {
                toolbar_attr = ' class="rte-side right"';
            }
            var icon_button = '';
            if (this.settings.iconselect) {
                icon_button = '<a class="items" data-rte-cmd="icon" title="Icon"> <i class="icon wojologo"></i> </a>';
            }

            //Font Size
            var fontSize =
                '<div class="wojo scrolling dropdown" id="md-fontsize"><i class="icon wysiwyg size"></i>' +
                '<div class="small menu">' +
                '<div class="item" data-font-size="">Default</div>' +
                '<div class="item" data-font-size="10px">10px</div>' +
                '<div class="item" data-font-size="11px">11px</div>' +
                '<div class="item" data-font-size="12px">12px</div>' +
                '<div class="item" data-font-size="14px">14px</div>' +
                '<div class="item" data-font-size="16px">16px</div>' +
                '<div class="item" data-font-size="18px">18px</div>' +
                '<div class="item" data-font-size="20px">20px</div>' +
                '<div class="item" data-font-size="22px">22px</div>' +
                '<div class="item" data-font-size="24px">24px</div>' +
                '<div class="item" data-font-size="30px">30px</div>' +
                '<div class="item" data-font-size="36px">36px</div>' +
                '<div class="item" data-font-size="48px">48px</div>' +
                '<div class="item" data-font-size="60px">60px</div>' +
                '<div class="item" data-font-size="72px">72px</div>' +
                '<div class="item" data-font-size="90px">90px</div>' +
                '</div>' +
                '</div>';

            var paraSize =
                '<div class="wojo dropdown" id="md-headings"><i class="icon wysiwyg type"></i>' +
                '<div class="small menu">' +
                '<div class="item" data-heading="h1"><h1>H1</h1></div>' +
                '<div class="item" data-heading="h2"><h2>H2</h2></div>' +
                '<div class="item" data-heading="h3"><h3>H3</h3></div>' +
                '<div class="item" data-heading="h4"><h4>H4</h4></div>' +
                '<div class="item" data-heading="h5"><h5>H5</h5></div>' +
                '<div class="item" data-heading="h6"><h6>H6</h6></div>' +
                '<div class="item" data-heading="p">Paragraph</div>' +
                '<div class="item" data-heading="blockquote">Blockquote</div>' +
                '</div>' +
                '</div>';

            var alignSize =
                '<div class="wojo dropdown" id="md-align"><i class="icon reorder"></i>' +
                '<div class="small menu">' +
                '<div class="item" data-align="left"><i class="icon align left"></i> Left</div>' +
                '<div class="item" data-align="center"><i class="icon align center"></i> Center</div>' +
                '<div class="item" data-align="right"><i class="icon align right"></i> Right</div>' +
                '<div class="item" data-align="justify"><i class="icon align justify"></i> Justify</div>' +
                '</div>' +
                '</div>';

            var listSize =
                '<div class="wojo dropdown" id="md-list"><i class="icon unordered list"></i>' +
                '<div class="small menu">' +
                '<div class="item" data-list="indent"><i class="icon indent"></i> Indent</div>' +
                '<div class="item" data-list="outdent"><i class="icon outdent"></i> Outdent</div>' +
                '<div class="item" data-list="insertUnorderedList"><i class="icon unordered list"></i> Bulleted</div>' +
                '<div class="item" data-list="insertOrderedList"><i class="icon ordered list"></i> Numbered</div>' +
                '<div class="wojo basic divider"></div>' +
                '<div class="item" data-list="normal"><i class="icon negative close"></i> Remove</div>' +
                '</div>' +
                '</div>';


            var html_rte =
                '<div id="rte-toolbar"' + toolbar_attr + '>' +
                '<div id="dragBar" title="Drag"> <img src="' + this.settings.sAdminPath + 'builder/images/drag-handle.png"> </div>' +
                '<a class="items" data-rte-cmd="bold" title="Bold"> <i class="icon wysiwyg bold"></i> </a>' +
                '<a class="items" data-rte-cmd="italic" title="Italic"> <i class="icon wysiwyg italic"></i> </a>' +
                '<a class="items" data-rte-cmd="underline" title="Underline"> <i class="icon wysiwyg underline"></i> </a>' +
                '<a class="items" data-rte-cmd="strikethrough" title="Strikethrough"> <i class="icon wysiwyg strikethrough"></i> </a>' +
                '<a class="items" data-rte-cmd="color" title="Color"> <i class="icon wysiwyg contrast"></i> </a>' +
                '' + fontSize + '' +
                '<a class="items" data-rte-cmd="removeFormat" title="Clean"> <i class="icon pill"></i> </a>' +
                '' + paraSize + '' +
                '<div></div>' +
                '' + alignSize + '' +
                '' + listSize + '' +
                '<a class="items" data-rte-cmd="createLink" title="Link"> <i class="icon url"></i> </a>' +
                '<a class="items" data-rte-cmd="unlink" title="Remove Link"> <i class="icon unlink"></i> </a>' +
                '<a class="items" data-rte-cmd="undo" title="Undo"> <i class="icon undo"></i> </a>' +
                '<a class="items" data-rte-cmd="redo" title="Redo"> <i class="icon redo"></i> </a>' +
                '' + icon_button + '' +
                '<a class="items" data-rte-cmd="html" title="HTML"> <i class="icon code alt"></i> </a>' +
                '</div>' + '' +

                '<div id="divRteLink">' +
                '<i class="small icon url alt"></i> Edit Link' +
                '</div>' + '' +
                '<div id="divFrameLink">' +
                '<i class="small icon url alt"></i> Edit Link' +
                '</div>' + '' +
                '<div id="temp-contenteditor"></div>' +
				'<input type="hidden" id="active-input" />';
            // html		
            html_rte +=
                '<div class="wojo modal" id="md-html">' +
                '<div class="wojo form content"><textarea id="txtHtml" style="height:500px"></textarea></div>' +
                '<div class="actions">' + '<button id="btnHtmlOk" class="wojo primary fluid single button ok"> Ok </button> </div>' +
                '</div>';

            // color picker	
            html_rte +=
                '<div id="md-color" class="wojo popup">' +
                '<div class="header">' +
                '<div class="row half-horizontal-gutters">' +
                '<div class="column">' +
                '<select id="selColorApplyTo" class="wojo tiny fluid selection dropdown">' +
                '<option value="1">Text Color</option>' +
                '<option value="2">Background</option>' +
                '</select>' +
                '</div>' +
                '<div class="column shrink">' +
                '<button id="btnCleanColor" class="wojo tiny button negative icon"><i class="icon pill"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="wojo divider"></div>' +
                '<div class="content">' +
                '<div class="row phone-block-4 tablet-block-6 screen-block-6 quarter-gutters content-center">' +
                '[COLORS]' +
                '</div>' +
                '</div>' +
                '</div>';

            // icon picker	
            html_rte += '<div id="md-icons" class="wojo popup transition hidden"><div class="content clearfix" style="width:400px;height:400px;overflow:auto"></div></div>';

            // icon modal	
            html_rte +=
                '<div id="md-icons-list" class="wojo modal">' +
                '<div id="dragIconBar" title="Drag"> <img src="' + this.settings.sAdminPath + 'builder/images/drag-handle.png"> </div>' +
                '<div class="content clearfix"></div></div>';

            // link selector	
            html_rte +=
                '<div id="md-createlink" class="wojo modal">' +
                '<div class="wojo small form content">' +
                '<div class="wojo fields">' +
                '<div class="field three wide align-middle">' +
                '<label class="content-right">Link </label>' +
                '</div>' +
                '<div class="field">' +
                '<div class="wojo small fluid action input">' +
                '<input type="text" id="txtLink" value="http://">' +
                '<select id="contentUrl" class="wojo small selection dropdown">' +
                '<option value="empty">None</option>' +
                '</select>' +
				'<button id="btnLinkBrowse" type="button" class="wojo basic icon button"><i class="icon folder"></i></button>' + 
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="wojo fields">' +
                '<div class="field three wide align-middle">' +
                '<label class="content-right">Text </label>' +
                '</div>' +
                '<div class="field">' +
                '<input type="text" id="txtLinkText">' +
                '</div>' +
                '</div>' +
                '<div class="wojo fields">' +
                '<div class="field three wide align-middle">' +
                '<label class="content-right">Title </label>' +
                '</div>' +
                '<div class="field">' +
                '<input type="text" id="txtLinkTitle">' +
                '</div>' +
                '</div>' +
                '<div class="wojo fields">' +
                '<div class="field three wide align-middle">' +
                '<label class="content-right">Target </label>' +
                '</div>' +
                '<div class="field">' +
                '<div class="wojo checkbox">' +
                '<input type="checkbox" id="chkNewWindow">' +
                '<label for="chkNewWindow" class="inpchk">New Window</label>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="actions">' +
                '<div class="wojo fluid buttons">' +
                '<div class="wojo deny negative button">Cancel</div>' +
                '<div class="wojo ok primary button">OK</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            // iframe	
            html_rte +=
                '<div id="md-createsrc" class="wojo tiny modal">' +
                '<div class="wojo small form content">' +
                '<input type="text" id="txtSrc" class="inptxt" value="http:/' + '/"></input>' +
                '</div>' +
                '<div class="actions">' +
                '<button id="btnSrcOk" class="wojo fluid primary ok button"> Ok </button>' +
                '</div>' +
                '</div>';

            var html_colors = '';
            for (var i = 0; i < this.settings.colors.length; i++) {
                html_colors += '<div class="column"><button class="md-pick" style="background:' + this.settings.colors[i] + '"></button></div>';
            }
            html_rte = html_rte.replace('[COLORS]', html_colors);
            if ($('#rte-toolbar').length === 0) {
                $('#divCb').append(html_rte);
                this.prepareRteCommand('bold');
                this.prepareRteCommand('italic');
                this.prepareRteCommand('underline');
                this.prepareRteCommand('strikethrough');
                this.prepareRteCommand('undo');
                this.prepareRteCommand('redo');
                $('#rte-toolbar').draggable({
                    handle: '#dragBar'
                });

                $('.wojo.dropdown').dropdown();
                $('.wojo.checkbox').checkbox({
                    fireOnInit: false
                });
            }
            var isCtrl = false;
            $element.on('keyup', function(e) {
                $element.data('contenteditor').realtime();
            });
            $element.on('mouseup', function(e) {
                $element.data('contenteditor').realtime();
            });
            $(document).on("paste", '#' + $element.attr('id'), function(e) {
                pasteContent($activeElement);
            });
            $element.on('keydown', function(e) {
                if (e.which == 46 || e.which == 8) {
                    var el;
                    try {
                        if (window.getSelection) {
                            el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode;
                        } else if (document.selection) {
                            el = document.selection.createRange().parentElement();
                        }
                        if (el.nodeName.toLowerCase() == 'p') {
                            var t = '';
                            if (window.getSelection) {
                                t = window.getSelection().toString();
                            } else if (document.getSelection) {
                                t = document.getSelection().toString();
                            } else if (document.selection) {
                                t = document.selection.createRange().text;
                            }
                            if (t == el.innerText) {
                                $(el).html('<br>');
                                return false;
                            }
                        }
                    } catch (e) {}
                }
                if (e.which == 17) {
                    isCtrl = true;
                    return;
                }
                if ((e.which == 86 && isCtrl == true) || (e.which == 86 && e.metaKey)) {
                    pasteContent($activeElement);
                }
                if (e.ctrlKey) {
                    if (e.keyCode == 65 || e.keyCode == 97) {
                        e.preventDefault();
                        var is_ie = detectIE();
                        var el;
                        var range;
                        try {
                            if (window.getSelection) {
                                el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode
                            } else if (document.selection) {
                                el = document.selection.createRange().parentElement()
                            }
                        } catch (e) {
                            return;
                        }
                        if (is_ie) {
                            range = document.body.createTextRange();
                            range.moveToElementText(el);
                            range.select();
                        } else {
                            range = document.createRange();
                            range.selectNodeContents(el);
                            var oSel = window.getSelection();
                            oSel.removeAllRanges();
                            oSel.addRange(range);
                        }
                    }
                }
            }).keyup(function(e) {
                if (e.which == 17) {
                    isCtrl = false;
                }
            });

            $(document).on('mousedown', function(event) {
                var $active_element;
                var $active_editable;
                var bEditable = false;
                if ($(event.target).parents(".ui-draggable").length > 0) {
                    if ($(event.target).parents(".ui-draggable").parent().data('contentbuilder')) {
                        $active_element = $(event.target).parents(".ui-draggable").parent();
                        $active_editable = $(event.target);

                        $("#propInspector").hide();
                        $active_element.find('.column-tools').hide();
                        $active_element.find('.el-selected').removeClass('el-selected');
                        $active_editable.closest('.column-dummy').addClass('el-selected');
                        $active_editable.closest('.column-wrap').find('.column-tools').show();

                    }
                }

                if ($('#rte-toolbar').css('display') == 'none') {
                    return;
                }
                var el = $(event.target).prop("tagName").toLowerCase();
                $(event.target).parents().each(function(e) {
                    if ($(this).is('[contenteditable]') || $(this).hasClass('md-modal') || $(this).attr('id') == 'divCb') {
                        bEditable = true;
                        return;
                    }
                });
                if ($(event.target).is('[contenteditable]')) {
                    bEditable = true;
                    return;
                }
                if (!bEditable) {
                    /*
                    $activeElement = null;
                    if (ce_toolbarDisplay == 'auto') {
                        var el;
                        if (window.getSelection) {
                            el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode
                        } else if (document.selection) {
                            el = document.selection.createRange().parentElement()
                        }
                        var found = false;
                        $(el).parents().each(function() {
                            if ($(this).data('contentbuilder')) {
                                found = true
                            }
                        });
                        if (!found) $('#rte-toolbar').css('display', 'none')
                    }
					*/
                    if (ce_outline) {
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).css('outline', '');
                            $(instances[i]).find('*').css('outline', '');
                        }
                    }
                    $(".ui-draggable").removeClass('code');
                    $(".ui-draggable").removeClass('ui-dragbox-outlined');
                    $('#rte-toolbar').css('display', 'none');
                }
            });
        };
        this.contentRender = function() {
            this.settings = $.extend({}, defaults, options);
            var iconselect = this.settings.iconselect;
            if (iconselect) {
                $element.find('.column-dummy i.icon').each(function() {
                    if ($(this).html() == '') {
                        $(this).off('click');
                        $(this).click(function() {
                            if (!$(this).attr('data-tempid')) {
                                $(this).attr('data-tempid', Date.now());
                            }
                            $activeIcon = $(this);
                            var Iclass = $activeIcon.attr('class');
                            var tid = $activeIcon.attr('data-tempid');
                            $("#active-tempid").val(tid);

                            $("#propInspector .element-head").text("icon");

                            var activeSize = findInString(Iclass, ['tiny', 'small', 'big', 'large', 'huge', 'massive', 'gigantic']);

                            $('#icon-size a').removeClass('active');
                            if (activeSize) {
                                $(".md-icon-size[data-size=" + activeSize + "]").addClass('active');
                            } else {
                                $(".md-icon-size").first().addClass('active');
                            }

                            $("#propColor, #text-color, #propSize, #icon-size, #icon-types").show();
                            $("#border-color, #background-color, #propBackground, #propMargin, #propShadow, #propPadding, #propBorder").hide();

                            if ($activeIcon.css('color')) {
                                $(".text-color").css("background-color", $activeIcon.css('color'));
                                $(".text-color").spectrum("set", $activeIcon.css('color'));
                            }

                            $(".text-color").spectrum({
                                showPalette: true,
                                allowEmpty: true,
                                showInput: true,
                                showAlpha: true,
                                palette: [$element.data('contenteditor').settings.colors],
                                move: function(color) {
                                    var rgba = "transparent";
                                    if (color) {
                                        rgba = color.toRgbString();
                                    }
                                    $(this).css("background-color", rgba);
                                },
                                change: function(color) {
                                    var rgba = "transparent";
                                    if (color) {
                                        rgba = color.toRgbString();
                                    }
                                    $("[data-tempid=" + $("#active-tempid").val() + "]").css("color", rgba);
                                },
                            });

                            $("#propInspector").velocity('transition.expandIn');

                            $('#icon-size').on('click', 'a', function() {
                                $('#icon-size a').removeClass('active');
                                $(this).addClass('active');
                                applyIconSize($(this).data('size'));
                            });

                            $('#icon-types').on('click', 'a', function() {
                                $("#md-icons-list").modal({
                                    inverted: true,
                                }).modal('show');
                            });

                            $('#md-icons-list').on('click', 'a', function() {
                                $('#md-icons-list a').removeClass('active');
                                $(this).addClass('active');
                                applyIconClass($(this).children().attr('class'));
                            });

                        });
                    }

                });
            }
        };
        this.realtime = function() {
            var is_ie = detectIE();
            var el;
            try {
                if (window.getSelection) {
                    el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode;
                } else if (document.selection) {
                    el = document.selection.createRange().parentElement();
                }
            } catch (e) {
                return;
            }
            if ($(el).parents("[data-mode='code']").length > 0) {return;}
            if ($(el).parents("[data-mode='readonly']").length > 0){ return;}
			/*
            if (el.nodeName.toLowerCase() == 'a') {
                $("#divRteLink").addClass('forceshow');
            } else {
                $("#divRteLink").removeClass('forceshow');
            }
			*/
            var editable = $element.data('contenteditor').settings.editable;
            if (editable == '') {} else {
                $element.find(editable).off('mousedown');
                $element.find(editable).on('mousedown', function(e) {
                    $activeElement = $(this);
                    $("#rte-toolbar").stop(true, true).fadeIn(200);
                    if (ce_outline) {
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).css('outline', '');
                            $(instances[i]).find('*').css('outline', '');
                        }
                        $(this).css('outline', 'rgba(0, 0, 0, 0.43) dashed 1px');
                    }
                });
                $element.find('.edit').find(editable).removeAttr('contenteditable');
            }
        };
        this.render = function() {
            var editable = $element.data('contenteditor').settings.editable;
            if (editable == '') {
                $element.attr('contenteditable', 'true');
                $element.off('mousedown');
                $element.on('mousedown', function(e) {
                    $activeElement = $(this);
                    $("#rte-toolbar").stop(true, true).fadeIn(200);
                    if (ce_outline) {
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).css('outline', '');
                            $(instances[i]).find('*').css('outline', '');
                        }
                        $(this).css('outline', 'rgba(0, 0, 0, 0.43) dashed 1px');
                    }
                });
            } else {
                $element.find(editable).each(function() {
                    if ($(this).parents("[data-mode='code']").length > 0) {return;}
                    if ($(this).parents("[data-mode='readonly']").length > 0) {return;}
                    var editMode = $element.data('contenteditor').settings.editMode;
                    if (editMode == 'default') {} else {
                        var attr = $(this).attr('contenteditable');
                        if (typeof attr !== typeof undefined && attr !== false) {} else {
                            $(this).attr('contenteditable', 'true');
                        }
                    }
                });
                $element.find(editable).off('mousedown');
                $element.find(editable).on('mousedown', function(e) {
                    $activeElement = $(this);
                    $("#rte-toolbar").stop(true, true).fadeIn(200);
                    if (ce_outline) {
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).css('outline', '');
                            $(instances[i]).find('*').css('outline', '');
                        }
                        $(this).css('outline', 'rgba(0, 0, 0, 0.43) dashed 1px');
                    }
                });
                $element.find('.edit').find(editable).removeAttr('contenteditable');
            }

            $element.find('.column-dummy a').each(function() {
                if ($(this).parents("[data-mode='code']").length > 0) {return;}
                if ($(this).parents("[data-mode='readonly']").length > 0) {return;}
                $(this).attr('contenteditable', 'true');
            });
            var editMode = $element.data('contenteditor').settings.editMode;
            if (editMode == 'default') {
                $element.find("h1,h2,h3,h4,h5,h6").off('keydown');
                $element.find("h1,h2,h3,h4,h5,h6").on('keydown', function(e) {
                    if (e.keyCode == 13) {
                        var is_ie = detectIE();
                        if (is_ie && is_ie <= 10) {
                            var oSel = document.selection.createRange();
                            if (oSel.parentElement) {
                                oSel.pasteHTML('<br>');
                                e.cancelBubble = true;
                                e.returnValue = false;
                                oSel.select();
                                oSel.moveEnd("character", 1);
                                oSel.moveStart("character", 1);
                                oSel.collapse(false);
                                return false;
                            }
                        } else {
                            var oSel = window.getSelection();
                            var range = oSel.getRangeAt(0);
                            range.extractContents();
                            range.collapse(true);
                            var docFrag = range.createContextualFragment('<br>');
                            var lastNode = docFrag.lastChild;
                            range.insertNode(docFrag);
                            range.setStartAfter(lastNode);
                            range.setEndAfter(lastNode);
                            if (range.endContainer.nodeType == 1) {
                                if (range.endOffset == range.endContainer.childNodes.length - 1) {
                                    range.insertNode(range.createContextualFragment("<br />"));
                                    range.setStartAfter(lastNode);
                                    range.setEndAfter(lastNode);
                                }
                            }
                            var comCon = range.commonAncestorContainer;
                            if (comCon && comCon.parentNode) {
                                try {
                                    comCon.parentNode.normalize();
                                } catch (e) {}
                            }
                            oSel.removeAllRanges();
                            oSel.addRange(range);
                            return false;
                        }
                    }
                });
                $element.find("h1,h2,h3,h4,h5,h6,p,img").each(function() {
                    if ($(this).parents("[data-mode='code']").length > 0) {return;}
                    if ($(this).parents("[data-mode='readonly']").length > 0) {return;}
                    $(this).parent().attr('contenteditable', true);
                });
                $element.find(".box > .view").each(function() {
                    if ($(this).parents("[data-mode='code']").length > 0) {return;}
                    if ($(this).parents("[data-mode='readonly']").length > 0) {return;}
                    $(this).attr('contenteditable', true);
                });
                $element.find("div").off('keyup');
                $element.find("div").on('keyup', function(e) {
                    var el;
                    var curr;
                    if (window.getSelection) {
                        curr = window.getSelection().getRangeAt(0).commonAncestorContainer;
                        el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode;
                    } else if (document.selection) {
                        curr = document.selection.createRange();
                        el = document.selection.createRange().parentElement();
                    }
                    if (e.keyCode == 13 && !e.shiftKey) {
                        var is_ie = detectIE();
                        if (is_ie > 0) {} else {
                            var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
                            var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
                            var isOpera = window.opera;
                            var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                            if (isChrome || isOpera) {
                                if ($(el).prop("tagName").toLowerCase() == 'p' || $(el).prop("tagName").toLowerCase() == 'div') {
                                    document.execCommand('formatBlock', false, '<p>');
                                }
                            }
                            if (isFirefox) {
                                if (!$(curr).html()) document.execCommand('formatBlock', false, '<p>');
                            }
                        }


                    }
                })
            } else {
                $element.find("p").off('keydown');
                $element.find("p").on('keydown', function(e) {
                    if (e.keyCode == 13 && $element.find("li").length == 0) {
                        var UA = navigator.userAgent.toLowerCase();
                        var LiveEditor_isIE = (UA.indexOf('msie') >= 0) ? true : false;
                        if (LiveEditor_isIE) {
                            var oSel = document.selection.createRange();
                            if (oSel.parentElement) {
                                oSel.pasteHTML('<br>');
                                e.cancelBubble = true;
                                e.returnValue = false;
                                oSel.select();
                                oSel.moveEnd("character", 1);
                                oSel.moveStart("character", 1);
                                oSel.collapse(false);
                                return false;
                            }
                        } else {
                            var oSel = window.getSelection();
                            var range = oSel.getRangeAt(0);
                            range.extractContents();
                            range.collapse(true);
                            var docFrag = range.createContextualFragment('<br>');
                            var lastNode = docFrag.lastChild;
                            range.insertNode(docFrag);
                            range.setStartAfter(lastNode);
                            range.setEndAfter(lastNode);
                            if (range.endContainer.nodeType == 1) {
                                if (range.endOffset == range.endContainer.childNodes.length - 1) {
                                    range.insertNode(range.createContextualFragment("<br />"));
                                    range.setStartAfter(lastNode);
                                    range.setEndAfter(lastNode);
                                }
                            }
                            var comCon = range.commonAncestorContainer;
                            if (comCon && comCon.parentNode) {
                                try {
                                    comCon.parentNode.normalize();
                                } catch (e) {}
                            }
                            oSel.removeAllRanges();
                            oSel.addRange(range);
                            return false;
                        }
                    }
                })
            }
            $('#rte-toolbar a[data-rte-cmd="removeElement"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="removeElement"]').click(function(e) {
                $activeElement.remove();
                $element.data('contenteditor').settings.hasChanged = true;
                $element.data('contenteditor').render();
                e.preventDefault()
            });
            $('#rte-toolbar a[data-rte-cmd="color"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="color"]').click(function(e) {
                var savedSel = saveSelection();

                $(this).popup({
                    on: 'manual',
                    popup: $("#md-color"),
                    lastResort: true,
                    exclusive: true,
                    hideOnScroll: false,
                    hoverable: true,
                    position: "bottom center"
                }).popup('show');

                e.preventDefault();
                var text = getSelected();
                $('.md-pick').off('click');
                $('.md-pick').click(function() {
                    restoreSelection(savedSel);
                    var el;
                    var curr;
                    if (window.getSelection) {
                        curr = window.getSelection().getRangeAt(0).commonAncestorContainer;
                        if (curr.nodeType == 3) {
                            el = curr.parentNode;
                        } else {
                            el = curr;
                        }
                    } else if (document.selection) {
                        curr = document.selection.createRange();
                        el = document.selection.createRange().parentElement()
                    }
                    var selColMode = $('#selColorApplyTo').val();
                    if ($.trim(text) != '' && $(el).text() != text) {
                        document.execCommand('styleWithCSS', false, true);
                        if (selColMode == 1) {
                            document.execCommand("ForeColor", false, $(this).css("background-color"));
                        }
                        if (selColMode == 2) {
                            document.execCommand("BackColor", false, $(this).css("background-color"));
                        }
                        var fontElements = document.getElementsByTagName("span");
                        for (var i = 0, len = fontElements.length; i < len; ++i) {
                            var s = fontElements[i].color;
                            if (s != '') {
                                fontElements[i].removeAttribute("color");
                                fontElements[i].style.color = s;
                            }
                        }
                        var is_ie = detectIE();
                        if (is_ie) {
                            $activeElement.find('span').each(function() {
                                if ($(this).find('span').length == 1) {
                                    if ($(this).text() == $(this).find('span:first').text()) {
                                        var innerspanstyle = $(this).find('span:first').attr('style');
                                        $(this).html($(this).find('span:first').html());
                                        var newstyle = $(this).attr('style') + ';' + innerspanstyle;
                                        $(this).attr('style', newstyle);
                                    }
                                }
                            })
                        }
                    } else if ($(el).text() == text) {
                        if (selColMode == 1) {
                            if ($(el).html()) {
                                $(el).css('color', $(this).css("background-color"));
                            } else {
                                $(el).parent().css('color', $(this).css("background-color"));
                            }
                        }
                        if (selColMode == 2) {
                            if ($(el).html()) {
                                $(el).css('background-color', $(this).css("background-color"));
                            } else {
                                $(el).parent().css('background-color', $(this).css("background-color"));
                            }
                        }
                    } else {
                        if (selColMode == 1) {
                            $(el).css('color', $(this).css("background-color"));
                        }
                        if (selColMode == 2) {
                            $(el).css('background-color', $(this).css("background-color"));
                        }
                    };
                    if (selColMode == 3) {
                        $(el).parents('.ui-draggable').children().first().css('background-color', $(this).css("background-color"));
                    }
                });

                $('#btnCleanColor').off('click');
                $('#btnCleanColor').click(function() {
                    restoreSelection(savedSel);
                    var el;
                    var curr;
                    if (window.getSelection) {
                        curr = window.getSelection().getRangeAt(0).commonAncestorContainer;
                        if (curr.nodeType == 3) {
                            el = curr.parentNode;
                        } else {
                            el = curr;
                        }
                    } else if (document.selection) {
                        curr = document.selection.createRange();
                        el = document.selection.createRange().parentElement();
                    }
                    var selColMode = $('#selColorApplyTo').val();
                    if ($.trim(text) != '' && $(el).text() != text) {
                        if (selColMode == 1) {
                            document.execCommand("ForeColor", false, '')
                        }
                        if (selColMode == 2) {
                            document.execCommand("BackColor", false, '')
                        }
                        var fontElements = document.getElementsByTagName("font");
                        for (var i = 0, len = fontElements.length; i < len; ++i) {
                            var s = fontElements[i].color;
                            fontElements[i].removeAttribute("color");
                            fontElements[i].style.color = s
                        }
                    } else if ($(el).text() == text) {
                        if (selColMode == 1) {
                            if ($(el).html()) {
                                $(el).css('color', '')
                            } else {
                                $(el).parent().css('color', '')
                            }
                        }
                        if (selColMode == 2) {
                            if ($(el).html()) {
                                $(el).css('background-color', '')
                            } else {
                                $(el).parent().css('background-color', '')
                            }
                        }
                    } else {
                        if (selColMode == 1) {
                            $(el).css('color', '')
                        }
                        if (selColMode == 2) {
                            $(el).css('background-color', '')
                        }
                    };
                    if (selColMode == 3) {
                        $(el).parents('.ui-draggable').children().first().css('background-color', '')
                    }
                });
            });

            $('#md-fontsize .item').click(function() {
                var savedSel = saveSelection();
                restoreSelection(savedSel);
                var text = getSelected();
                var el;
                var curr;
                if (window.getSelection) {
                    curr = window.getSelection().getRangeAt(0).commonAncestorContainer;
                    if (curr.nodeType == 3) {
                        el = curr.parentNode
                    } else {
                        el = curr
                    }
                } else if (document.selection) {
                    curr = document.selection.createRange();
                    el = document.selection.createRange().parentElement()
                }
                var s = $(this).attr('data-font-size');
                if ($.trim(text) != '' && $(el).text() != text) {
                    document.execCommand("fontSize", false, "7");
                    var fontElements = document.getElementsByTagName("font");
                    for (var i = 0, len = fontElements.length; i < len; ++i) {
                        if (fontElements[i].size == "7") {
                            fontElements[i].removeAttribute("size");
                            fontElements[i].style.fontSize = s
                        }
                    }
                } else if ($(el).text() == text) {
                    if ($(el).html()) {
                        $(el).css('font-size', s)
                    } else {
                        $(el).parent().css('font-size', s)
                    }
                } else {
                    $(el).css('font-size', s)

                };
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
            });

            $('#md-headings .item').click(function() {
                var savedSel = saveSelection();
                restoreSelection(savedSel);
                var s = $(this).attr('data-heading');
                $element.attr('contenteditable', true);
                document.execCommand('formatBlock', false, '<' + s + '>');
                $element.removeAttr('contenteditable');
                $element.data('contenteditor').render();
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
            });


            $('#rte-toolbar a[data-rte-cmd="removeFormat"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="removeFormat"]').click(function(e) {
                document.execCommand('removeFormat', false, null);
                document.execCommand('removeFormat', false, null);
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
                e.preventDefault()
            });

            $('#rte-toolbar a[data-rte-cmd="undo"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="undo"]').click(function(e) {
                document.execCommand('undo', false, null);
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
                e.preventDefault()
            });

            $('#rte-toolbar a[data-rte-cmd="redo"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="redo"]').click(function(e) {
                document.execCommand('redo', false, null);
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
                e.preventDefault()
            });

            $('#rte-toolbar a[data-rte-cmd="unlink"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="unlink"]').click(function(e) {
                document.execCommand('unlink', false, null);
                $("#divRteLink").removeClass('forceshow');
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
                e.preventDefault()
            });

            $('#rte-toolbar a[data-rte-cmd="html"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="html"]').click(function(e) {
				  var el;
				  if (window.getSelection) {
					  el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode
				  } else if (document.selection) {
					  el = document.selection.createRange().parentElement()
				  }
		
				  var $activeRow = $(el).closest('.column-wrap').children('.column-dummy');
				  if ($activeRow.closest('.columns').data('mode') === 'html' && $activeRow.closest('.columns').attr('data-html') !== undefined) {
					  $('#txtHtml').val(decodeURIComponent($activeRow.closest('.columns').attr('data-html')));
				  } else {
					  $('#temp-contentbuilder').html($activeRow.html());
					  $('#temp-contentbuilder').find('[contenteditable]').removeAttr('contenteditable');
					  $('#temp-contentbuilder *[class=""]').removeAttr('class');
					  $('#temp-contentbuilder *[style=""]').removeAttr('style');
					  $('#temp-contentbuilder .ovl').remove();
					  var html = $('#temp-contentbuilder').html().trim();
					  html = html.replace(/<font/g, '<span').replace(/<\/font/g, '</span');
					  $('#txtHtml').val(formatCode(html));
	  
				  }
				  $('#md-html').modal('setting', 'onApprove', function() {
					  if ($activeRow.closest('.columns').data('mode') === 'html') {
						  $activeRow.closest('.columns').attr('data-html', encodeURIComponent($('#txtHtml').val()));
						  //$activeRow.html('');
					  } else {
						  $activeRow.html($('#txtHtml').val());
					  }
					  $element.data('contentbuilder').applyBehavior();
					  $element.data('contentbuilder').blockChanged();
					  $element.data('contentbuilder').settings.onRender();
				  }).modal('show');
            });

            $('#md-align .item').click(function() {
                var savedSel = saveSelection();
                restoreSelection(savedSel);
                var el;
                if (window.getSelection) {
                    el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode;
                    if (el.nodeName != 'H1' && el.nodeName != 'H2' && el.nodeName != 'H3' && el.nodeName != 'H4' && el.nodeName != 'H5' && el.nodeName != 'H6' && el.nodeName != 'P') {
                        el = el.parentNode;
                    }
                } else if (document.selection) {
                    el = document.selection.createRange().parentElement();
                    if (el.nodeName != 'H1' && el.nodeName != 'H2' && el.nodeName != 'H3' && el.nodeName != 'H4' && el.nodeName != 'H5' && el.nodeName != 'H6' && el.nodeName != 'P') {
                        el = el.parentElement();
                    }
				}
                var s = $(this).data('align');
                el.style.textAlign = s;
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
            });

            $('#md-list .item').click(function() {
                var savedSel = saveSelection();
                restoreSelection(savedSel);
                var s = $(this).data('list');
                try {
                    if (s == 'normal') {
                        document.execCommand('outdent', false, null);
                        document.execCommand('outdent', false, null);
                        document.execCommand('outdent', false, null)
                    } else {
                        document.execCommand(s, false, null)
                    }
                } catch (e) {
                    $activeElement.parents('div').addClass('edit');
                    var el;
                    if (window.getSelection) {
                        el = window.getSelection().getRangeAt(0).commonAncestorContainer.parentNode;
                        el = el.parentNode
                    } else if (document.selection) {
                        el = document.selection.createRange().parentElement();
                        el = el.parentElement()
                    }
                    el.setAttribute('contenteditable', true);
                    if (s == 'normal') {
                        document.execCommand('outdent', false, null);
                        document.execCommand('outdent', false, null);
                        document.execCommand('outdent', false, null)
                    } else {
                        document.execCommand(s, false, null)
                    }
                    el.removeAttribute('contenteditable');
                    $element.data('contenteditor').render()
                }
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
            });

            $('#rte-toolbar a[data-rte-cmd="createLink"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="createLink"]').click(function(e) {
                var html = "";
                if (typeof window.getSelection != "undefined") {
                    var sel = window.getSelection();
                    if (sel.rangeCount) {
                        var container = document.createElement("div");
                        for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                            container.appendChild(sel.getRangeAt(i).cloneContents())
                        }
                        html = container.innerHTML
                    }
                } else if (typeof document.selection != "undefined") {
                    if (document.selection.type == "Text") {
                        html = document.selection.createRange().htmlText
                    }
                }
                if (html == '') {
                    $.notice(decodeURIComponent('Please select some text'), {
                        autoclose: 12000,
                        type: 'error',
                        title: 'Link Error'
                    });
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return
                }
                var el;
                if (window.getSelection) {
                    el = window.getSelection().getRangeAt(0).commonAncestorContainer
                } else if (document.selection) {
                    el = document.selection.createRange()
                }
                if (el.nodeName.toLowerCase() == 'a') {
                    $activeLink = $(el)
                } else {
                    document.execCommand('createLink', false, 'http://dummy');
                    $activeLink = $("a[href='http://dummy']").first();
                    $activeLink.attr('href', 'http://')
                }

                $('#txtLink').val($activeLink.attr('href'));
                $('#txtLinkText').val($activeLink.html());
                $('#txtLinkTitle').val($activeLink.attr('title'));
                if ($activeLink.attr('target') == '_blank') {
                    $('#chkNewWindow').prop('checked', true)
                } else {
                    $('#chkNewWindow').removeAttr('checked')
                }
				if($('#contentUrl option').length < 2) {
					$.getJSON($element.data('contenteditor').settings.sAdminPath + 'helper.php', {
						doAction: 1,
						page: "getlinks",
						is_builder: 1,
					}, function(json) {
						$.each(json.message, function(key, val) {
							$('#contentUrl option:first').after($('<option>').val(val.href).html(val.name));
							$('#contentUrl').dropdown('refresh');
	
							$('#contentUrl').change(function() {
								if ($(this).val() === "empty") {
									$('#txtLink').val($activeLink.attr('href'));
								} else {
									$('#txtLink').val($(this).val());
								}
							});
						});
	
					}, "json");
				}

                $('#md-createlink').modal({
                    closable: false
                }).modal('setting', 'onApprove', function() {
                    $activeLink.attr('href', $('#txtLink').val());
                    if ($('#txtLink').val() == 'http://' || $('#txtLink').val() == '') {
                        $activeLink.replaceWith($activeLink.html())
                    }
                    $activeLink.attr('title', $('#txtLinkTitle').val());
                    $activeLink.html($('#txtLinkText').val());
                    if ($('#chkNewWindow').is(":checked")) {
                        $activeLink.attr('target', '_blank')
                    } else {
                        $activeLink.removeAttr('target')
                    }
                    for (var i = 0; i < instances.length; i++) {
                        $(instances[i]).data('contenteditor').settings.hasChanged = true;
                        $(instances[i]).data('contenteditor').render();
                    }
                }).modal('setting', 'onDeny', function() {
                    if ($activeLink.attr('href') == 'http://') {
                        $activeLink.replaceWith($activeLink.html());
                    }
                }).modal('show');

                e.preventDefault()

            });

            $('#rte-toolbar a[data-rte-cmd="icon"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="icon"]').click(function(e) {
                $savedSel = saveSelection();
                $activeIcon = null;
                var iconselect = $element.data('contenteditor').settings.iconselect;

                if ($('#md-icons .content').children().length < 1) {
                    var list = '';
                    $.getJSON(iconselect)
                        .done(function(json) {
                            $.each(json.iconset, function(i, item) {
                                list += '<a class="md-icon" title="' + item.name + '"><i class="icon ' + item.code + '"></i></a>';
                            });
                            $("#md-icons .content").html(list);
                        });
                }
                $('body').children('.popup').remove()
                $(this).popup({
                    on: 'click',
                    popup: $("#md-icons"),
                    lastResort: true,
                    exclusive: true,
                    hideOnScroll: false,
                    hoverable: true,
                    position: "bottom center",
                }).popup('show');

                $('#md-icons').on('click', 'a.md-icon', function() {
                    applyIconClass($(this).children().attr('class'));
                    $element.data('contenteditor').settings.onRender();
                    $element.data('contenteditor').contentRender();
                });

                e.preventDefault();
                return;
            });


            $element.find(".flex-video").off('hover');
            $element.find(".flex-video").hover(function(e) {
                if ($(this).parents("[data-mode='code']").length > 0) return;
                if ($(this).parents("[data-mode='readonly']").length > 0) return;

                var _top;
                var _left;
                var scrolltop = $(window).scrollTop();
                var offsettop = $(this).offset().top;
                var offsetleft = $(this).offset().left;
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                var is_ie = detectIE();
                var browserok = true;
                if (is_firefox || is_ie) browserok = false;
                if (browserok) {
                    _top = ((offsettop - 20)) + (scrolltop - scrolltop);
                    _left = offsetleft;
                } else {
                    if (is_ie) {
                        var space = $element.getPos().top;
                        var adjy_val = (-space / 1.1) + space / 1.1;
                        var space2 = $element.getPos().left;
                        var adjx_val = -space2 + space2;
                        var p = $(this).getPos();
                        _top = ((p.top - 20)) + adjy_val;
                        _left = (p.left) + adjx_val;
                    }
                    if (is_firefox) {
                        _top = offsettop - 20;
                        _left = offsetleft;
                    }
                }
                $("#divFrameLink").css("top", _top + "px");
                $("#divFrameLink").css("left", _left + "px");
                $("#divFrameLink").stop(true, true).css({
                    display: 'none'
                }).fadeIn(20);
                $activeFrame = $(this).find('iframe');
                $("#divFrameLink").off('click');
                $("#divFrameLink").on('click', function(e) {

                    $('#txtSrc').val($activeFrame.attr('src'));
                    $('#md-createsrc').modal({
                        inverted: true
                    }).modal('setting', 'onApprove', function() {
                        var srcUrl = $('#txtSrc').val();
                        var youRegex = /^http[s]?:\/\/(((www.youtube.com\/watch\?(feature=player_detailpage&)?)v=)|(youtu.be\/))([^#\&\?]*)/;
                        var vimeoRegex = /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/)|(video\/))?([0-9]+)\/?/;
                        var youRegexMatches = youRegex.exec(srcUrl);
                        var vimeoRegexMatches = vimeoRegex.exec(srcUrl);
                        if (youRegexMatches != null || vimeoRegexMatches != null) {
                            if (youRegexMatches != null && youRegexMatches.length >= 7) {
                                var youMatch = youRegexMatches[6];
                                srcUrl = '//www.youtube.com/embed/' + youMatch + '?rel=0'
                            }
                            if (vimeoRegexMatches != null && vimeoRegexMatches.length >= 7) {
                                var vimeoMatch = vimeoRegexMatches[6];
                                srcUrl = '//player.vimeo.com/video/' + vimeoMatch
                            }
                        }
                        $activeFrame.attr('src', srcUrl);
                        if ($('#txtSrc').val() == '') {
                            $activeFrame.attr('src', '')
                        }
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).data('contenteditor').settings.hasChanged = true;
                            $(instances[i]).data('contenteditor').render()
                        }
                    }).modal('show');

                });

                $("#divFrameLink").hover(function(e) {
                    $(this).stop(true, true).css("display", "block")
                }, function() {
                    $(this).stop(true, true).fadeOut(0)
                })
            }, function(e) {
                $("#divFrameLink").stop(true, true).fadeOut(0)
            });

            $element.find('.column-dummy a').not('.not-a').off('hover');
            $element.find('.column-dummy a').not('.not-a').hover(function(e) {
                if ($(this).parents("[data-mode='code']").length > 0) return;
                if ($(this).parents("[data-mode='readonly']").length > 0) return;
                if ($(this).children('img').length == 1 && $(this).children().length == 1) return;
                var _top;
                var _left;
                var scrolltop = $(window).scrollTop();
                var offsettop = $(this).offset().top;
                var offsetleft = $(this).offset().left;
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                var is_ie = detectIE();
                var browserok = true;
                if (is_firefox || is_ie) browserok = false;
                if (browserok) {
                    _top = ((offsettop - 27)) + (scrolltop - scrolltop);
                    _left = offsetleft
                } else {
                    if (is_ie) {
                        var space = $element.getPos().top;
                        var adjy_val = (-space / 1.1) + space / 1.1;
                        var space2 = $element.getPos().left;
                        var adjx_val = -space2 + space2;
                        var p = $(this).getPos();
                        _top = ((p.top - 25)) + adjy_val;
                        _left = (p.left) + adjx_val
                    }
                    if (is_firefox) {
                        _top = offsettop - 25;
                        _left = offsetleft
                    }
                }
                $("#divRteLink").css("top", _top + "px");
                $("#divRteLink").css("left", _left + "px");
                $("#divRteLink").stop(true, true).css({
                    display: 'none'
                }).fadeIn(20);
                $activeLink = $(this);

                $("#divRteLink").off('click');
                $("#divRteLink").on('click', function(e) {
                    $('#txtLink').val($activeLink.attr('href'));
                    $('#txtLinkText').val($activeLink.html());
                    $('#txtLinkTitle').val($activeLink.attr('title'));
                    if ($activeLink.attr('target') == '_blank') {
                        $('#chkNewWindow').prop('checked', true)
                    } else {
                        $('#chkNewWindow').removeAttr('checked')
                    }

					if($('#contentUrl option').length < 2) {
						$.getJSON($element.data('contenteditor').settings.sAdminPath + 'helper.php', {
							doAction: 1,
							page: "getlinks",
							is_builder: 1,
						}, function(json) {
							$.each(json.message, function(key, val) {
								$('#contentUrl option:first').after($('<option>').val(val.href).html(val.name));
								$('#contentUrl').dropdown('refresh');
		
								$('#contentUrl').change(function() {
									if ($(this).val() === "empty") {
										$('#txtLink').val($activeLink.attr('href'));
									} else {
										$('#txtLink').val($(this).val());
									}
								});
							});
		
						}, "json");
					}

                    $('#md-createlink').modal({
                        closable: false
                    }).modal('setting', 'onApprove', function() {
                        $activeLink.attr('href', $('#txtLink').val());
                        if ($('#txtLink').val() == 'http://' || $('#txtLink').val() == '') {
                            $activeLink.replaceWith($activeLink.html())
                        }
                        $activeLink.attr('title', $('#txtLinkTitle').val());
                        $activeLink.html($('#txtLinkText').val());
                        if ($('#chkNewWindow').is(":checked")) {
                            $activeLink.attr('target', '_blank')
                        } else {
                            $activeLink.removeAttr('target')
                        }
                        for (var i = 0; i < instances.length; i++) {
                            $(instances[i]).data('contenteditor').settings.hasChanged = true;
                            $(instances[i]).data('contenteditor').render();
                        }
                    }).modal('setting', 'onDeny', function() {
                        if ($activeLink.attr('href') == 'http://') {
                            $activeLink.replaceWith($activeLink.html());
                        }
                    }).modal('show');
                });

                $("#divRteLink").hover(function(e) {
                    $(this).stop(true, true).css("display", "block")
                }, function() {
                    $(this).stop(true, true).fadeOut(0)
                });
            }, function(e) {
                $("#divRteLink").stop(true, true).fadeOut(0)
            });

            $("#btnLinkBrowse").off('click');
            $("#btnLinkBrowse").on('click', function(e) {
                $("#divToolImg").stop(true, true).fadeOut(0);
                $("#divToolImgSettings").stop(true, true).fadeOut(0);
                $("#divRteLink").stop(true, true).fadeOut(0);
				$("#md-createlink").modal('hide');
				
                var sFunc = ($element.data('contenteditor').settings.onFileSelectClick + '').replace(/\s/g, '');
                if (sFunc != 'function(){}') {
                    $element.data('contenteditor').settings.onFileSelectClick({
                        targetInput: $("#txtLink").get(0),
                        theTrigger: $("#btnLinkBrowse").get(0)
                    })
                } else {
					$.get($element.data('contenteditor').settings.fileselect, {
						editor: true
					}).done(function(data) {
						var md_imageselect =
							'<div id="md-imageselect" class="wojo fullscreen modal">' +
							'<div class="content" style="overflow:auto;max-height:600px">' +
							'' + data + ''
						'</div>' +
						'</div>';
						$(md_imageselect).modal('setting', 'onShow', function() {
							var modal = this;
							$('#active-input').val('txtLink');
							$("#result").on('click', '.is_file', function() {
								var dataset = $(this).data('set')
								$("#md-imageselect").modal('hide').remove();
								$("#md-createlink").modal('show');
								var inp = $('#active-input').val();
								$('#' + inp).val($element.data('contenteditor').settings.sScriptPath + "uploads/" + dataset.url);
							});
						}).modal('setting', 'onHidden', function() {
							$(this).remove();
						}).modal('show');
					});
                }
            });
			
            $element.data('contenteditor').settings.onRender();
            $element.data('contenteditor').contentRender();
        };
        this.prepareRteCommand = function(s) {
            $('#rte-toolbar a[data-rte-cmd="' + s + '"]').off('click');
            $('#rte-toolbar a[data-rte-cmd="' + s + '"]').click(function(e) {
                try {
                    document.execCommand(s, false, null)
                } catch (e) {
                    $element.attr('contenteditable', true);
                    document.execCommand(s, false, null);
                    $element.removeAttr('contenteditable');
                    $element.data('contenteditor').render()
                }
                $(this).blur();
                $element.data('contenteditor').settings.hasChanged = true;
                e.preventDefault()
            })
        };
        this.init()
    };
    $.fn.contenteditor = function(options) {
        return this.each(function() {
            instances.push(this);
            if (undefined == $(this).data('contenteditor')) {
                var plugin = new $.contenteditor(this, options);
                $(this).data('contenteditor', plugin)
            }
        })
    }
})($);

function pasteContent($activeElement) {
    var savedSel = saveSelection();
    $('#idContentWord').remove();
    var tmptop = $activeElement.offset().top;
    $('#divCb').append("<div style='position:absolute;z-index:-1000;top:" + tmptop + "px;left:-1000px;width:1px;height:1px;overflow:auto;' name='idContentWord' id='idContentWord' contenteditable='true'></div>");
    var pasteFrame = document.getElementById("idContentWord");
    pasteFrame.focus();
    setTimeout(function() {
        try {
            restoreSelection(savedSel);
            var $node = $(getSelectionStartNode());
            if ($('#idContentWord').length == 0) return;
            var sPastedText = '';
            var bRichPaste = false;
            if ($('#idContentWord table').length > 0 || $('#idContentWord img').length > 0 || $('#idContentWord p').length > 0 || $('#idContentWord a').length > 0) {
                bRichPaste = true
            }
            if (bRichPaste) {
                sPastedText = $('#idContentWord').html();
                sPastedText = cleanHTML(sPastedText);
                $('#idContentWord').html(sPastedText);
                if ($('#idContentWord').children('p,h1,h2,h3,h4,h5,h6,ul,li').length > 1) {
                    $('#idContentWord').contents().filter(function() {
                        return (this.nodeType == 3 && $.trim(this.nodeValue) != '')
                    }).wrap("<p></p>").end().filter("br").remove()
                }
                sPastedText = '<div class="edit">' + $('#idContentWord').html() + '</div>'
            } else {
                $('#idContentWord').find('p,h1,h2,h3,h4,h5,h6').each(function() {
                    $(this).html($(this).html() + ' ')
                });
                sPastedText = $('#idContentWord').text()
            }
            $('#idContentWord').remove();
            var oSel = window.getSelection();
            var range = oSel.getRangeAt(0);
            range.extractContents();
            range.collapse(true);
            var docFrag = range.createContextualFragment(sPastedText);
            var lastNode = docFrag.lastChild;
            range.insertNode(docFrag);
            range.setStartAfter(lastNode);
            range.setEndAfter(lastNode);
            range.collapse(false);
            var comCon = range.commonAncestorContainer;
            if (comCon && comCon.parentNode) {
                try {
                    comCon.parentNode.normalize()
                } catch (e) {}
            }
            oSel.removeAllRanges();
            oSel.addRange(range)
        } catch (e) {
            $('#idContentWord').remove()
        }
    }, 200)
}
var savedSel;

function saveSelection() {
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            var ranges = [];
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                ranges.push(sel.getRangeAt(i))
            }
            return ranges
        }
    } else if (document.selection && document.selection.createRange) {
        return document.selection.createRange()
    }
    return null
};

function restoreSelection(savedSel) {
    if (savedSel) {
        if (window.getSelection) {
            sel = window.getSelection();
            sel.removeAllRanges();
            for (var i = 0, len = savedSel.length; i < len; ++i) {
                sel.addRange(savedSel[i])
            }
        } else if (document.selection && savedSel.select) {
            savedSel.select()
        }
    }
};

function getSelectionStartNode() {
    var node, selection;
    if (window.getSelection) {
        selection = getSelection();
        node = selection.anchorNode
    }
    if (!node && document.selection) {
        selection = document.selection;
        var range = selection.getRangeAt ? selection.getRangeAt(0) : selection.createRange();
        node = range.commonAncestorContainer ? range.commonAncestorContainer : range.parentElement ? range.parentElement() : range.item(0)
    }
    if (node) {
        return (node.nodeName == "#text" ? node.parentNode : node)
    }
};
var getSelectedNode = function() {
    var node, selection;
    if (window.getSelection) {
        selection = getSelection();
        node = selection.anchorNode
    }
    if (!node && document.selection) {
        selection = document.selection;
        var range = selection.getRangeAt ? selection.getRangeAt(0) : selection.createRange();
        node = range.commonAncestorContainer ? range.commonAncestorContainer : range.parentElement ? range.parentElement() : range.item(0)
    }
    if (node) {
        return (node.nodeName == "#text" ? node.parentNode : node)
    }
};

function getSelected() {
    if (window.getSelection) {
        return window.getSelection()
    } else if (document.getSelection) {
        return document.getSelection()
    } else {
        var selection = document.selection && document.selection.createRange();
        if (selection.text) {
            return selection.text
        }
        return false
    }
    return false
};

function pasteHtmlAtCaret(html, selectPastedContent) {
    var sel, range;
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(),
                node, lastNode;
            while ((node = el.firstChild)) {
                lastNode = frag.appendChild(node)
            }
            var firstNode = frag.firstChild;
            range.insertNode(frag);
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                if (selectPastedContent) {
                    range.setStartBefore(firstNode)
                } else {
                    range.collapse(true)
                }
                sel.removeAllRanges();
                sel.addRange(range)
            }
        }
    } else if ((sel = document.selection) && sel.type != "Control") {
        var originalRange = sel.createRange();
        originalRange.collapse(true);
        sel.createRange().pasteHTML(html);
        if (selectPastedContent) {
            range = sel.createRange();
            range.setEndPoint("StartToStart", originalRange);
            range.select()
        }
    }
}
var $savedSel;
var $activeIcon;

function applyIconClass(s) {
    if ($activeIcon) {
        var sClassSize = "";
        if ($activeIcon.hasClass('tiny')) sClassSize = 'tiny';
        if ($activeIcon.hasClass('small')) sClassSize = 'small';
        if ($activeIcon.hasClass('large')) sClassSize = 'large';
        if ($activeIcon.hasClass('big')) sClassSize = 'big';
        if ($activeIcon.hasClass('huge')) sClassSize = 'huge';
        if ($activeIcon.hasClass('massive')) sClassSize = 'massive';
        if ($activeIcon.hasClass('gigantic')) sClassSize = 'gigantic';

        $activeIcon.css('font-size', '');
        if (s.indexOf('size-') == -1 && s != '') {
            $activeIcon.attr('class', s);
            if (sClassSize != '') {
                $activeIcon.addClass(sClassSize);
            }
        } else {
            $activeIcon.removeClass('tiny');
            $activeIcon.removeClass('small');
            $activeIcon.removeClass('large');
            $activeIcon.removeClass('big');
            $activeIcon.removeClass('huge');
            $activeIcon.removeClass('massive');
            $activeIcon.removeClass('gigantic');
            $activeIcon.addClass(s)
        }
    } else {
        restoreSelection($savedSel);
        pasteHtmlAtCaret(' <i class="' + s + '"></i> ', true);
        $(cb_list).each(function() {
            $(this).data('contenteditor').contentRender()
        })
    }
}

function applyIconSize(s) {
    $activeIcon.removeClass("tiny small big large huge massive gigantic");
    $activeIcon.addClass(s);
}

var $imgActive;
(function($) {
    var tmpCanvas;
    var nInitialWidth;
    var nInitialHeight;
    $.imageembed = function(element, options) {
        var defaults = {
            sScriptPath: '',
            imageselect: '',
            colors: [],
            fileselect: '',
            imageEmbed: true,
            linkDialog: true,
            largerImageHandler: '',
            onChanged: function() {},
            onImageBrowseClick: function() {},
            onImageSettingClick: function() {},
            onImageSelectClick: function() {},
            onFileSelectClick: function() {}
        };
        this.settings = {};
        var $element = $(element),
            element = element;
        this.init = function() {

            this.settings = $.extend({}, defaults, options);
            if ($('#divCb').length === 0) {
                $('body').append('<div id="divCb"></div>')
            }
            var html_photo_file = '';
            var html_photo_file2 = '';
            if (navigator.appName.indexOf('Microsoft') != -1) {
                html_photo_file2 = ''
            } else {
                html_photo_file = '<div style="display:none"><input type="file" name="fileImage" id="fileImage" class="my-file"></div>';
            }
            var bUseCustomImageSelect = false;
            if (this.settings.imageselect != '') bUseCustomImageSelect = true;
            var sFunc = (this.settings.onImageSelectClick + '').replace(/\s/g, '');
            if (sFunc != 'function(){}') {
                bUseCustomImageSelect = true
            }
            var bUseCustomFileSelect = false;
            if (this.settings.fileselect != '') bUseCustomFileSelect = true;
            var sFunc = (this.settings.onFileSelectClick + '').replace(/\s/g, '');
            if (sFunc != 'function(){}') {
                bUseCustomFileSelect = true
            }
            var imageEmbed = this.settings.imageEmbed;
            var html_hover_icons = '';

            var html_hover_icons = html_photo_file2 + ' ' +
                '<a id="divToolImgSettings" class="wojo small negative icon button">\
                <i class="icon url alt"></i>\
                </a>\
                <a id="divToolImgEdit" class="wojo small positive icon button">\
                <i class="icon pencil"></i>\
                </a>';

            //if ($('#active-input').length === 0) {
                html_hover_icons +=
                    '<div id="md-img" class="wojo modal">' +
                    ' <div class="wojo form content"> ' +
                    ' <div class="row align-middle"> ' +
                    ' <div class="column screen-30 content-center"> ' +
                    ' <div id="imgholder"></div> ' +
                    '</div> ' +
                    ' <div class="screen-70"> ' +
                    ' <div class="wojo fields"> ' +
                    ' <div class="field three wide align-middle"> ' +
                    '<label class="content-right"> Source:</label> ' +
                    '</div> ' +
                    ' <div class="field"> ' +
                    ' <div class="wojo fluid action input"> ' +
                    '<input type="text" readonly="" id="txtImgUrl"> ' +
                    '<button class="wojo icon basic button" id="btnImageBrowse"><i class="icon folder"></i> </button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    ' <div class="wojo fields"> ' +
                    ' <div class="field three wide align-middle"> ' +
                    '<label class="content-right">Title:</label> ' +
                    '</div> ' +
                    ' <div class="field"> ' +
                    '<input type="text" id="txtAltText"> ' +
                    '</div> ' +
                    '</div> ' +
                    ' <div class="wojo fields"> ' +
                    ' <div class="field three wide align-middle"> ' +
                    '<label class="content-right"> Link:</label> ' +
                    '</div> ' +
                    ' <div class="field"> ' +
                    ' <div class="wojo fluid action input"> ' +
                    '<input type="text" readonly="" id="txtLinkUrl"> ' +
                    '<button class="wojo icon basic button" id="btnFileBrowse"> <i class="icon folder"> </i> </button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '<div class="actions">' +
                    '<div class="wojo fluid buttons">' +
                    '<div class="wojo deny negative button">Cancel</div>' +
                    '<div class="wojo ok primary button">OK</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            //}

            if ($('#divToolImgSettings').length === 0) {
                $('#divCb').append(html_hover_icons);
            }

            $element.hover(function(e) {
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                var _top;
                var _top2;
                var _left;
                var scrolltop = $(window).scrollTop();
                var offsettop = $(this).offset().top;
                var offsetleft = $(this).offset().left;
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
                var is_ie = detectIE();
                var is_edge = detectEdge();
                var browserok = true;
                if (is_firefox || is_ie || is_edge) browserok = false;
                var _top_adj = 36;
                if (browserok) {
                    _top = ((offsettop + parseInt($(this).css('height')) / 2) - 32) + (scrolltop - scrolltop);
                    _left = ((offsetleft + parseInt($(this).css('width')) / 2) - 16);
                    _top2 = _top + _top_adj
                } else {
                    if (is_edge) {}
                    if (is_ie) {
                        var space = 0;
                        var space2 = 0;
                        $element.parents().each(function() {
                            if ($(this).data('contentbuilder')) {
                                space = $(this).getPos().top;
                                space2 = $(this).getPos().left
                            }
                        });
                        var adjy_val = -space + space;
                        var adjx_val = -space2 + space2;
                        var p = $(this).getPos();
                        _top = ((p.top - 32 + parseInt($(this).css('height')) / 2)) + adjy_val;
                        _left = ((p.left - 16 + parseInt($(this).css('width')) / 2)) + adjx_val;
                        _top2 = _top + _top_adj
                    }
                    if (is_firefox) {
                        var imgwidth = parseInt($(this).css('width'));
                        var imgheight = parseInt($(this).css('height'));
                        _top = offsettop - 32 + imgheight / 2;
                        _left = offsetleft - 16 + imgwidth / 2;
                        _top2 = _top + _top_adj
                    }
                }
                var fixedimage = false;
                $imgActive = $(this);
                if ($imgActive.attr('data-fixed') == 1) {
                    fixedimage = true
                }
                if (cb_edit && !fixedimage) {
                    $("#divToolImgEdit").css("top", _top + "px");
                    $("#divToolImgEdit").css("left", _left + "px");
                    $("#divToolImgEdit").stop(true, true).css({
                        display: 'none'
                    }).fadeIn(20)

                    if ($(this).data("imageembed").settings.linkDialog) {
                        $("#divToolImgSettings").css("top", _top2 + "px");
                        $("#divToolImgSettings").css("left", _left + "px");
                        $("#divToolImgSettings").stop(true, true).css({
                            display: 'none'
                        }).fadeIn(20)
                    } else {
                        $("#divToolImgSettings").css("top", "-10000px")
                        $("#divToolImgEdit").css("top", "-10000px")
                    }
                }

                if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
                    $("#divToolImgSettings").on('touchstart mouseenter focus', function(e) {
                        if (e.type == 'touchstart') {
                            e.stopImmediatePropagation();
                            e.preventDefault()
                        }
                        $("#divToolImgSettings").click();
                        e.preventDefault();
                        e.stopImmediatePropagation()
                    })
                }


                $("#divToolImgSettings").off('hover');
                $("#divToolImgSettings").hover(function(e) {
                    $("#divToolImgSettings").stop(true, true).css("display", "block")
                }, function() {
                    $("#divToolImgSettings").stop(true, true).fadeOut(0)
                });

                $("#divToolImgEdit").off('hover');
                $("#divToolImgEdit").hover(function(e) {
                    $("#divToolImgEdit").stop(true, true).css("display", "block")
                }, function() {
                    $("#divToolImgEdit").stop(true, true).fadeOut(0)
                });

                $("#divToolImgEdit").off('click');
                $("#divToolImgEdit").on('click', function(e) {
					if (!$imgActive.attr('data-tempid')) {
						$imgActive.attr('data-tempid', Date.now());
					}

					var tid = $imgActive.attr('data-tempid');
					var sid = $imgActive.attr('data-shadow');
					$("#active-tempid").val(tid);
					//box-shadow
					$("#shadowList .item").removeClass('active');
					$("#shadowList .item[data-shadow=" +  sid + "]").addClass('active');
					
					$("#propInspector .element-head").text("image");
					$("#propColor, #propShadow, #propBorder, #propColor, #border-color").show();
					$("#propSize, #propBackground, #propPadding, #propMargin, #background-color, #text-color").hide();

                    var border = $imgActive.css([
					  'borderTopWidth',
					  'borderLeftColor', 
					  'borderTopStyle'
					]);
                    var radius = $imgActive.css([
					  'borderTopLeftRadius',
					  'borderTopRightRadius',
					  'borderBottomLeftRadius',
					  'borderBottomRightRadius',
					]);

					borderRadius = new Styler($("[data-tempid=" + tid + "]"));
					if(border.borderTopStyle !="none") {
						$('#border-width').jRange('setValue', parseInt(border.borderTopWidth));
						borderRadius.setBorderColor(border.borderLeftColor);
						$(".border-color").spectrum("set", border.borderLeftColor);
						$(".border-color").css("background", border.borderLeftColor);
						$("#border-color-alt").val(border.borderLeftColor);
						$("#border-style").dropdown('set value', border.borderTopStyle);
					} else {
						$('#border-width').jRange('setValue', 0);
						$("#border-style").dropdown('set value', 'solid');
					}

					$.each(radius, function(key, value ) {
						if(parseInt(value) > 0) {
							$('input[name=' + key + ']').jRange('setValue', parseInt(value));
						} else {
							$('input[name=' + key + ']').jRange('setValue', 0);
						}
					});
				
					$("#borderList").on("change", ".rangeslider", function() {
						var val = borderRadius._getFromField($(this).val(), 0, 100, $(this));
						if($(this).prop('name') === "all") {
							borderRadius.setAllBorderCorners(val);
							$('#border-topLeft').jRange('setValue', val);
							$('#border-topRight').jRange('setValue', val);
							$('#border-bottomLeft').jRange('setValue', val);
							$('#border-bottomRight').jRange('setValue', val);
						} else {
							borderRadius[$(this).prop('name')] = val;
						}
						borderRadius.borderRefresh();
					});
				
					$(".border-color").spectrum({
						showPalette: true,
						allowEmpty: true,
						showInput: true,
						showAlpha: true,
						move: function(color) {
							var rgba = "transparent";
							if (color) {
								rgba = color.toRgbString();
							}
							$("#border-color-alt").val(rgba);
							$(".border-color").css("background", rgba);
							borderRadius.setBorderColor(rgba);
							borderRadius.borderRefresh();
						}
					});
												
					$('#border-style').on('change', function () {
						var val = $(this).val();
						borderRadius.borderStyle = val;
						borderRadius.borderRefresh();
						if(val === "none") {
							$('#border-width').jRange('setValue', 0);
							$("[data-tempid=" + tid + "]").css('border', '');
						}
					});
					
					$("#propInspector").velocity('transition.expandIn');
                });
					
                $("#divToolImgSettings").off('click');
                $("#divToolImgSettings").on('click', function(e) {
                    $("#divToolImgSettings").stop(true, true).fadeOut(0);
                    var sFunc = ($element.data('imageembed').settings.onImageSettingClick + '').replace(/\s/g, '');
                    if (sFunc != 'function(){}') {
                        $element.data('imageembed').settings.onImageSettingClick();
                        return
                    }

                    $("#md-img").modal({
                        closable: false
                    }).modal('show').modal('setting', 'onApprove', function() {
                        var builder;
                        $element.parents().each(function() {
                            if ($(this).data('contentbuilder')) {
                                builder = $(this).data('contentbuilder')
                            }
                        });

                        if ($img.attr('src') != $('#txtImgUrl').val()) {
                            if ($img.attr('src').indexOf($element.data('imageembed').settings.sScriptPath + 'image.png') != -1 && $('#txtImgUrl').val().indexOf(this.settings.sScriptPath + 'image.png') == -1) {
                                $img.css('width', '');
                                $img.css('height', '')
                            }
                            $img.attr('src', $('#txtImgUrl').val())
                        }

                        $img.attr('alt', $('#txtAltText').val());
                        if ($('#txtLinkUrl').val() == 'http://' || $('#txtLinkUrl').val() == '') {
                            $img.parents('a:first').replaceWith($img.parents('a:first').html())
                        } else {
                            var imagelink = $('#txtLinkUrl').val();
                            if ($img.parents('a:first').length == 0) {
                                $img.wrap('<a href="' + imagelink + '"></a>')
                            } else {
                                $img.parents('a:first').attr('href', imagelink)
                            }
                            if (imagelink.toLowerCase().indexOf('.jpg') != -1 || imagelink.toLowerCase().indexOf('.jpeg') != -1 || imagelink.toLowerCase().indexOf('.png') != -1 || imagelink.toLowerCase().indexOf('.gif') != -1) {
                                $img.parents('a:first').addClass('lightbox');
                            } else {
                                $img.parents('a:first').removeClass('lightbox');
                                $img.parents('a:first').removeAttr('target')
                            }
                        }
                        if (builder) builder.applyBehavior();
                        $('md-imageselect').modal('hide');
                    });


                    var $img = $element;
                    if ($element.prop("tagName").toLowerCase() == 'figure') {
                        $img = $element.find('img:first')
                    }
                    $('#txtImgUrl').val($img.attr('src'));
                    $('#txtAltText').val($img.attr('alt'));
                    $('#txtLinkUrl').val('');
                    if ($img.parents('a:first') != undefined) {
                        $('#txtLinkUrl').val($img.parents('a:first').attr('href'))
                    }
                    $("#imgholder").html('<img src="' + $('#txtImgUrl').val() + '" class="wojo medium image">');
                    e.preventDefault();
                    e.stopImmediatePropagation()
                });

                //image browser
                $(document).off('click', '#btnImageBrowse');
                $(document).on('click', '#btnImageBrowse', function(e) {
                    $("#divToolImgSettings").stop(true, true).fadeOut(0);
                    $("#divToolImgEdit").stop(true, true).fadeOut(0);
                    $("#divRteLink").stop(true, true).fadeOut(0);
                    $("#divFrameLink").stop(true, true).fadeOut(0);
                    $("#md-img").modal('hide');

                    var sFunc = ($element.data('imageembed').settings.onImageSelectClick + '').replace(/\s/g, '');
                    if (sFunc != 'function(){}') {
                        $element.data('imageembed').settings.onImageSelectClick({
                            targetInput: $("#txtImgUrl").get(0),
                            theTrigger: $("#btnImageBrowse").get(0)
                        })
                    } else {
                        $.get($element.data('imageembed').settings.imageselect, {
                            editor: true
                        }).done(function(data) {
                            var md_imageselect =
                                '<div id="md-imageselect" class="wojo fullscreen modal">' +
                                '<div class="content" style="overflow:auto;max-height:600px">' +
                                '' + data + ''
                            '</div>' +
                            '</div>';
                            $(md_imageselect).modal('setting', 'onShow', function() {
                                var modal = this;
                                $('#active-input').val('txtImgUrl');
                                $("#result").on('click', '.is_file', function() {
                                    var dataset = $(this).data('set')
                                    $("#md-imageselect").modal('hide').remove();
                                    $("#md-img").modal('show');
                                    var inp = $('#active-input').val();
                                    $('#' + inp).val($element.data('imageembed').settings.sScriptPath + "uploads/" + dataset.url);
                                    $("#imgholder").html('<img src="' + $('#' + inp).val() + '" class="wojo medium image">');
                                });
                            }).modal('show');
                        });
                    }
                });

                //file browser
                $(document).off('click', '#btnFileBrowse');
                $(document).on('click', '#btnFileBrowse', function(e) {
                    $("#divToolImgSettings").stop(true, true).fadeOut(0);
                    $("#divToolImgEdit").stop(true, true).fadeOut(0);
                    $("#divRteLink").stop(true, true).fadeOut(0);
                    $("#divFrameLink").stop(true, true).fadeOut(0);
                    $("#md-img").modal('hide');

                    var sFunc = ($element.data('imageembed').settings.onFileSelectClick + '').replace(/\s/g, '');
                    if (sFunc != 'function(){}') {
                        $element.data('imageembed').settings.onFileSelectClick({
                            targetInput: $("#txtLinkUrl").get(0),
                            theTrigger: $("#btnFileBrowse").get(0)
                        })
                    } else {
                        $.get($element.data('imageembed').settings.fileselect, {
                            editor: true
                        }).done(function(data) {
                            var md_imageselect =
                                '<div id="md-imageselect" class="wojo fullscreen modal">' +
                                '<div class="content" style="overflow:auto;max-height:600px">' +
                                '' + data + ''
                            '</div>' +
                            '</div>';
                            $(md_imageselect).modal('setting', 'onShow', function() {
                                var modal = this;
                                $('#active-input').val('txtLinkUrl');
                                $("#result").on('click', '.is_file', function() {
                                    var dataset = $(this).data('set')
                                    $("#md-imageselect").modal('hide').remove();
                                    $("#md-img").modal('show');
                                    var inp = $('#active-input').val();
                                    $('#' + inp).val($element.data('imageembed').settings.sScriptPath + "uploads/" + dataset.url);
                                });
                            }).modal('setting', 'onHidden', function() {
                                $(this).remove();
                            }).modal('show');
                        });
                    }
                });
				
                $('.my-file[type=file]').off('change');
                $('.my-file[type=file]').on('change', function(e) {
                    changeImage(e);
                    $('#my-image').attr('src', '');
                    if ($imgActive.parent().hasClass("lightbox")) {} else {
                        $(this).clearInputs()
                    }
                });

            }, function(e) {
                $("#divToolImgSettings").stop(true, true).fadeOut(0);
                $("#divToolImgEdit").stop(true, true).fadeOut(0);
            })
        };
        var changeImage = function(e) {
            if (typeof FileReader == "undefined") return true;
            var file = e.target.files[0];
            var extension = file.name.substr((file.name.lastIndexOf('.') + 1)).toLowerCase();
            if (extension != 'jpg' && extension != 'jpeg' && extension != 'png' && extension != 'gif' && extension != 'bmp') {
                alert('Please select an image');
                return
            }
            $("#divToolImgSettings").stop(true, true).fadeOut(0);
            $("#divToolImgEdit").stop(true, true).fadeOut(0);
            $('.overlay-bg').css('width', '100%');
            $('.overlay-bg').css('height', '100%');
            $("#divToolImgLoader").css('display', 'block');
        };

        this.init()
    };
    $.fn.imageembed = function(options) {
        return this.each(function() {
            if (undefined == $(this).data('imageembed')) {
                var plugin = new $.imageembed(this, options);
                $(this).data('imageembed', plugin)
            }
        })
    }
})($);

$.fn.getPos = function() {
    var o = this[0];
    var left = 0,
        top = 0,
        parentNode = null,
        offsetParent = null;
    offsetParent = o.offsetParent;
    var original = o;
    var el = o;
    while (el.parentNode != null) {
        el = el.parentNode;
        if (el.offsetParent != null) {
            var considerScroll = true;
            if (window.opera) {
                if (el == original.parentNode || el.nodeName == "TR") {
                    considerScroll = false
                }
            }
            if (considerScroll) {
                if (el.scrollTop && el.scrollTop > 0) {
                    top -= el.scrollTop
                }
                if (el.scrollLeft && el.scrollLeft > 0) {
                    left -= el.scrollLeft
                }
            }
        }
        if (el == offsetParent) {
            left += o.offsetLeft;
            if (el.clientLeft && el.nodeName != "TABLE") {
                left += el.clientLeft
            }
            top += o.offsetTop;
            if (el.clientTop && el.nodeName != "TABLE") {
                top += el.clientTop
            }
            o = el;
            if (o.offsetParent == null) {
                if (o.offsetLeft) {
                    left += o.offsetLeft
                }
                if (o.offsetTop) {
                    top += o.offsetTop
                }
            }
            offsetParent = o.offsetParent
        }
    }
    return {
        left: left,
        top: top
    }
};

function cleanHTML(input) {
    var stringStripper = /(\n|\r| class=(")?Mso[a-zA-Z]+(")?)/g;
    var output = input.replace(stringStripper, ' ');
    var commentSripper = new RegExp('<!--(.*?)-->', 'g');
    var output = output.replace(commentSripper, '');
    var tagStripper = new RegExp('<(/)*(meta|link|span|\\?xml:|st1:|o:|font)(.*?)>', 'gi');
    output = output.replace(tagStripper, '');
    var badTags = ['style', 'script', 'applet', 'embed', 'noframes', 'noscript'];
    for (var i = 0; i < badTags.length; i++) {
        tagStripper = new RegExp('<' + badTags[i] + '.*?' + badTags[i] + '(.*?)>', 'gi');
        output = output.replace(tagStripper, '')
    }
    var badAttributes = ['style', 'start'];
    for (var i = 0; i < badAttributes.length; i++) {
        var attributeStripper = new RegExp(' ' + badAttributes[i] + '="(.*?)"', 'gi');
        output = output.replace(attributeStripper, '')
    }
    return output
}

function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');
    var edge = ua.indexOf('Edge/');
    if (msie > 0) {
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10)
    }
    if (edge > 0) {
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10)
    }
    if (trident > 0) {
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10)
    }
    return false
}

function detectEdge() {
    var ua = window.navigator.userAgent;
    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10)
    }
    return false
}
function parseObjectToInt(object) {
	var newObject = {};
	$.each(object, function( key, value ) {
	  newObject[key]=parseInt(value, 10);
	});
	
	return newObject;
}
function getStyles(el) {
    var output = {};
    if (!el || !el.attr('style')) {
        return output;
    }

    var style = el.attr('style');
    var rules = style.split(';');

    rules = rules.filter(function(x) {
        return (x !== (undefined || ''));
    });

    for (i = 0; i < rules.length; i++) {
        rules_arr = rules[i]
        rules_arr = rules[i].split(/:(?!\/\/)/g);
        rules_arr[1] = $.trim(rules_arr[1]);
        output[rules_arr[0].replace(/-([a-z])/g, function(g) {
            return g[1].toUpperCase();
        })] = rules_arr[1];
    }

    return output;
}

function findInString(string, keywords) {
    return string.split(/\b/).filter(word => keywords.some(w => w === word))[0] || false;
}

function formatCode(code, stripWhiteSpaces, stripEmptyLines) {
    "use strict";
    var whitespace = ' '.repeat(4); // Default indenting 4 whitespaces
    var currentIndent = 0;
    var char = null;
    var nextChar = null;
    var result = '';
    for (var pos = 0; pos <= code.length; pos++) {
        char = code.substr(pos, 1);
        nextChar = code.substr(pos + 1, 1);

        // If opening tag, add newline character and indention
        if (char === '<' && nextChar !== '/') {
            result += '\n' + whitespace.repeat(currentIndent);
            currentIndent++;
        }
        // if Closing tag, add newline and indention
        else if (char === '<' && nextChar === '/') {
            // If there're more closing tags than opening
            if (--currentIndent < 0) currentIndent = 0;
            result += '\n' + whitespace.repeat(currentIndent);
        }

        // remove multiple whitespaces
        else if (stripWhiteSpaces === true && char === ' ' && nextChar === ' ') char = '';
        // remove empty lines
        else if (stripEmptyLines === true && char === '\n') {
            //debugger;
            if (code.substr(pos, code.substr(pos).indexOf("<")).trim() === '') char = '';
        }

        result += char;
    }

    return result;
}