(function($) {
    "use strict";
    $.Master = function(settings) {
        var config = {
            weekstart: 0,
            ampm: 0,
            url: '',
			editorCss: '',
            lang: {
                monthsFull: '',
                monthsShort: '',
                weeksFull: '',
                weeksShort: '',
                weeksMed: '',
                today: "Today",
                now: "Now",
				selPic: "Select Picture",
                delBtn: "Delete Record",
                trsBtn: "Move to Trash",
                arcBtn: "Move to Archive",
                uarcBtn: "Restore From Archive",
                restBtn: "Restore Item",
                canBtn: "Cancel",
                clear: "Clear",
                delMsg1: "Are you sure you want to delete this record?",
                delMsg2: "This action cannot be undone!!!",
                delMsg3: "Trash",
                delMsg5: "Move [NAME] to the archive?",
                delMsg6: "Remove [NAME] from the archive?",
                delMsg7: "Restore [NAME]?",
                delMsg8: "The item will remain in Trash for 30 days. To remove it permanently, go to Trash and empty it.",
                working: "working..."
            }
        };

        if (settings) {
            $.extend(config, settings);
        }

        /* == Custom Scroller == */
		$('.scrollbox_y').enscroll({
			showOnHover: true,
			spacer: 20, //push scrollbar to the edge
			addPaddingToPane: false,
			verticalTrackClass: 'scrolltrack',
			verticalHandleClass: 'scrollhandle'
		});
		
		$('.scrollbox_x').enscroll({
			showOnHover: true,
			horizontalScrolling: true,
			verticalScrolling: false,
			spacer: 0, //push scrollbar to the edge
			addPaddingToPane: false,
			horizontalTrackClass: 'scrolltrackx',
			horizontalHandleClass: 'scrollhandlex',
		});

        $("nav > ul > li > a").click(function() {
            var isOpen = $(this).find("+ ul").is(':visible'),
                dir = isOpen ? 'slideUp' : 'slideDown';
            $(this).toggleClass("expanded collapsed").find("+ ul").velocity(dir, {
                easing: 'easeOutQuart',
                duration: 500
            });
        });
        
        /* == Nav == */
        $("#mnav").click(function() {
            if ($('aside').is(':visible')) {
                $('aside').velocity('transition.slideLeftOut', 100);
            } else {
                $('aside').velocity('transition.slideLeftIn', 100);
            }
        });

        $("#mnav-alt").click(function() {
            if ($('aside .menuwrap').is(':visible')) {
                $('aside .menuwrap').velocity(
                    'slideUp', {
                        duration: 200,
                        complete: function() {
                            $('aside .menuwrap').css('display', '');
                        }
                    });

            } else {
                $('aside .menuwrap').velocity('slideDown', 200);
            }
        });

        $('.wojo.dropdown').dropdown();
        $('.wojo.checkbox').checkbox();
		$('.wojo.progress').progress();
		$('.wojo.accordion').accordion();
        $('.rangeslider').jRange();
		$('.spinner').wojoSpinner();
        $('[data-content]').popup({
            variation: "mini inverted",
			inline:true,
			
        });
		
		/* == Responsive Tables == */
		$('.wojo.table:not(.unstackable)').responsiveTable(); 
		$("table.sorting").tablesort();
		
		$('#randPass').click(function() {
			$(this).prev('input').val($.password(8));
		});

        /* == Transitions == */
        $(document).on('click', '[data-velocity="true"]', function() {
            var type = $(this).data('type');
            var trigger = $(this).data('trigger');
            $(trigger).velocity($(trigger).is(':visible') ? 'transition.' + type + 'Out' : 'transition.' + type + 'In', {duration:200});
        });

        /* == Datepicker == */
        $('[data-datepicker]').calendar({
            firstDayOfWeek: config.weekstart,
            today: true,
            type: 'date',
            text: {
                days: config.lang.weeksShort,
                months: config.lang.monthsFull,
                monthsShort: config.lang.monthsShort,
                today: config.lang.today,
            }
        });

        /* == Time Picker == */
        $('[data-timepicker]').calendar({
            firstDayOfWeek: config.weekstart,
            today: true,
            type: 'time',
            className: {
                popup: 'wojo inverted popup',
            },
            ampm: config.ampm,
            text: {
                days: config.lang.weeksShort,
                months: config.lang.monthsFull,
                monthsShort: config.lang.monthsShort,
                now: config.lang.now
            }
        });

        /* == Tabs == */
        $(".wojo.tab.item").hide();
        $(".wojo.tab.item:first").show();
		$(".wojo.tabs:not(.responsive) a:first").parent().addClass('active');
        $(".wojo.tabs:not(.responsive) a").on('click', function() {
            $(".wojo.tabs:not(.responsive) li").removeClass("active");
            $(this).parent().addClass("active");
            $(".wojo.tab.item").hide();
            var activeTab = $(this).data("tab");
			if($(activeTab).is(':first-child')) {
				$(activeTab).parent().addClass('tabbed');
			} else {
				$(activeTab).parent().removeClass('tabbed');
			}
            $(activeTab).show();
            return false;
        });

		/* == Dimmable content == */
		$(document).on('change', '.is_dimmable', function() {
			var dataset = $(this).data('set');
			var status = $(this).checkbox('is checked') ? 1 : 0;
			var result = $.extend(true, dataset.option[0], {"active":status});
			$.post(config.url + "/helper.php", result);
			$(dataset.parent).dimmer({variation:"inverted", closable:false}).dimmer('toggle');
		}); 

        /* == Fluid Grid == */
		$('.wojo.blocks').waitForImages().done(function() {
			$('.wojo.blocks').pinto();
		});
		
        /* == Basic color picker == */
        $('[data-color="true"]').spectrum({
            showPaletteOnly: true,
            showPalette:true,
			move: function(color) {
				var newcolor = color.toHexString();
				$(this).children().css('background', newcolor);
				$(this).prev('input').val(newcolor);
			}
        });

        /* == Advanced color picker == */
      $('[data-adv-color="true"]').spectrum({
          showInput: true,
          showAlpha: true,
          move: function(color) {
              var rgba = "transparent";
              if (color) {
                  rgba = color.toRgbString();
				  $(this).children().css('background', rgba);
				  $(this).prev('input').val(rgba);
              }
          },
      });
	  
        /* == Avatar Upload == */
        $('[data-type="image"]').ezdz({
            text: config.lang.selPic,
            validators: {
                maxWidth: 3200,
                maxHeight: 1800
            },
            reject: function(file, errors) {
                if (errors.mimeType) {
					$.notice(decodeURIComponent(file.name + ' must be an image.'), {
						autoclose: 4000,
						type: "error",
						title: 'Error'
					});
                }
                if (errors.maxWidth || errors.maxHeight) {
					$.notice(decodeURIComponent(file.name + ' must be width:3200px, and height:1800px  max.'), {
						autoclose: 4000,
						type: "error",
						title: 'Error'
					});
                }
            }
        });
					
        /* == Editor == */
		$('.bodypost').tinymce({
			script_url: config.surl + '/assets/tinymce/tinymce.min.js',
			height: 600,
			width: "100%",
			theme: "modern",
			convert_urls: 0,
			remove_script_host: 0,
			visualblocks_default_state: true,
			end_container_on_empty_block: true,
			verify_html: false,
			content_css: config.editorCss,
			link_list: config.url + "/helper.php?doAction=1&page=getlinks",
			plugins: [
				"advlist autolink lists link image hr",
				"visualblocks visualchars code fullscreen",
				"table contextmenu paste textcolor colorpicker visualblocks"
			],
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview | forecolor | visualblocks",
			image_advtab: true,
			extended_valid_elements : "+a[*],+i[*],+em[*],+li[*],+span[*],+div[*]",
			file_browser_callback: function(field_name, url, type, win) {
				var w = window,
					d = document,
					e = d.documentElement,
					g = d.getElementsByTagName('body')[0],
					x = w.innerWidth || e.clientWidth || g.clientWidth,
					y = w.innerHeight || e.clientHeight || g.clientHeight;
				var cmsURL = config.surl + '/assets/tinymce/plugins/manager/index.php?&field_name=' + field_name;
				if (type === 'image') {
					cmsURL = cmsURL + "&type=images";
				}
				tinyMCE.activeEditor.windowManager.open({
					file: cmsURL,
					title: 'Filemanager',
					width: x * 0.8,
					height: y * 0.8,
					resizable: "yes",
					close_previous: "no"
				}, {
					window: win,
					input: field_name,
					resizable: "yes",
				});
			},
			/*
		  setup: function (editor) {
			editor.addButton('cplugs', {
			  type: 'menubutton',
			  tooltip: 'Custom Text',
			  icon: 'ctext',
			  text: false,
			  onselect: function (e) {
				editor.insertContent(e.target.value());
				console.log(e.target.value())
			  },
			  menu: [
				{ text: 'Menu item 1', value: '&nbsp;<strong>bold text!</strong>' },
				{ text: 'Menu item 2', value: '&nbsp;<em>italic text!</em>' },
				{ text: 'Menu item 3', value: '&nbsp;plain text ...' }
			  ],
			});
		  },
*/
		});
		
        $('.altpost').tinymce({
			height: 200,
			width: "100%",
			theme: "modern",
			convert_urls: 0,
			remove_script_host: 0,
			schema: "html5",
			menubar:false,
			extended_valid_elements : "+a[*],+i[*],+em[*],+li[*],+span[*],+div[*]",
			script_url: config.surl + '/assets/tinymce/tinymce.min.js',
            toolbar: "bold italic alignleft aligncenter alignright alignjustify bullist numlist code fullscreen",
			plugins: [
				"advlist code fullscreen insertdatetime",
			],
        });
		

        /* == Simple Status Actions == */
        $(document).on('click', '.simpleAction', function() {
            var dataset = $(this).data("set");
            var $parent = dataset.parent;
            $.ajax({
                type: 'POST',
                url: config.url + dataset.url,
                dataType: 'json',
                data: dataset.option[0]
            }).done(function(json) {
                if (json.type === "success") {
                    switch (dataset.after) {
                        case "remove":
                            $($parent).transition({
                                animation: 'scale',
                                onComplete: function() {
                                    $($parent).remove();
                                }
                            });
						break;
						
                        case "replace":
                            $($parent).html(json.html).transition('fade in');
                        break;
						
                        case "prepend":
							$($parent).prepend(json.html).transition('fade in');
                        break;
						
                    }
									
                    if (dataset.redirect) {
						setTimeout(function() {
							$("body").transition({
								animation: 'scale'
							});
							window.location.href = json.redirect;
						}, 800);
                    }
                }
				
				if (json.message) {
					$.notice(decodeURIComponent(json.message), {
						autoclose: 12000,
						type: json.type,
						title: json.title
					});
				}
            });
        });
		
        /* == Inline Edit == */
        $('#editable').editableTableWidget();
        $('#editable')
            .on('validate', '[data-editable]', function(e, val) {
                if (val === "") {
                    return false;
                }
            })
            .on('change', '[data-editable]', function(e, val) {
                var data = $(this).data('set');
                var $this = $(this);
                $.ajax({
                    type: "POST",
                    url: (data.url) ? data.url : config.url + "/helper.php",
                    dataType: "json",
                    data: ({
                        'title': val,
                        'type': data.type,
                        'key': data.key,
                        'path': data.path,
                        'id': data.id,
                        'quickedit': 1
                    }),
                    beforeSend: function() {
                        $this.html('<i class="icon spinning spinner circles"></i>').animate({
                            opacity: 0.2
                        }, 800);
                    },
                    success: function(json) {
                        $this.animate({
                            opacity: 1
                        }, 800);
                        setTimeout(function() {
                            $this.html(json.title).fadeIn("slow");
                        }, 1000);
                    }
                });
            });
			
        /* == Clear Session Debug Queries == */
        $("#debug-panel").on('click', 'a.clear_session', function() {
            $.get(config.url + '/helper.php', {
                ClearSessionQueries: 1
            });
            $(this).css('color', '#222');
        });
			
        /* == From/To date range == */
        $('#fromdate').calendar({
            weekStart: config.weekstart,
            type: 'date',
            endCalendar: $('#enddate')
        });
        $('#enddate').calendar({
            weekStart: config.weekstart,
            type: 'date',
            startCalendar: $('#fromdate')
        });

        $('#fromtime').calendar({
            weekStart: config.weekstart,
            type: 'time',
			ampm: config.ampm,
            endCalendar: $('#endtime')
        });
        $('#endtime').calendar({
            weekStart: config.weekstart,
            type: 'time',
			ampm: config.ampm,
            startCalendar: $('#fromtime')
        });
		
		/* == Single File Picker == */
		$(document).on('click', '.filepicker', function() {
		    var parent = $(this).data('parent');
		    var type = $(this).data('ext');
			var update = $(this).data('update');
		    $.get(config.url + '/managerBuilder.php', {
		        pickFile: 1,
				editor: true
		    }).done(function(data) {
		        var modal =
		            '<div id="fileModal" class="wojo large modal">' +
		            '<div class="wojo content">' + data + '</div>' +
		            '</div>';
		        $(modal).modal('setting', 'onShow', function() {
		            var cmodal = this;
		            $("#result").on('click', '.is_file', function() {
		                var dataset = $(this).data('set');
		                switch (type) {
		                    case "images":
		                        if (dataset.image === "true") {
		                            $(parent).val(dataset.url);
		                            $(cmodal).modal('hide');
		                        }
		                        break;
		                    case "videos":
		                        if (dataset.ext === "mp4" || dataset.ext === "ogv" || dataset.ext === "wembm") {
		                            $(parent).val(dataset.url);
		                            $(cmodal).modal('hide');
		                        }
		                        break;
								
		                }
						if(update) {
							$(update.id).attr('src', update.src + dataset.url);
						}

		            });
		        }).modal('setting', 'onHidden', function() {
		            $(this).remove();
		        }).modal('show');
		    });
		});
		
        /* == Search == */
		var timeout;
        $(document).on('keyup', '#masterSearch', function() {
			var $input = $(this).parent();
			window.clearTimeout(timeout);
            var srch_string = $(this).val();
            var type_string = $(this).data('page');
			var url = $(this).data('url');
            if (srch_string.length > 3) {
				$input.addClass('loading');
				timeout = window.setTimeout(function(){
					$.ajax({
						type: "get",
						dataType: 'json',
						url: config.url + '/' + url + '.php',
						data: {
							liveSearch: 1,
							value: srch_string,
							type: type_string
						},
						success: function(json) {
							if(json.status === "success") {
								$('#mResults .padding').html(json.html);
								$('#mResults').dimmer({opacity:'.97',transition:'scale' }).dimmer('show');
							}
							$input.removeClass('loading');
							
						}
					});
				},700);
            }
            return false;
        });

        /* == Master Form == */
        $(document).on('click', 'button[name=dosubmit]', function() {
            var $button = $(this);
            var action = $(this).data('action');
			var $form = $(this).closest("form");
			var asseturl = $(this).data('url');

            function showResponse(json) {
                setTimeout(function() {
                    $($button).removeClass("loading").prop("disabled", false);
                }, 500);
                $.notice(json.message, {
                    autoclose: 12000,
                    type: json.type,
                    title: json.title
                });
                if (json.type === "success" && json.redirect) {
					$('.container')
					  .transition({
						animation  : 'scale',
						duration   : '1s',
						onComplete : function() {
						  window.location.href = json.redirect;
						}
					  });
                }
            }

            function showLoader() {
                $($button).addClass("loading").prop("disabled", true);
            }
            var options = {
                target: null,
                beforeSubmit: showLoader,
                success: showResponse,
                type: "post",
                url: asseturl ? config.url + "/" + asseturl + "/controller.php" : config.url + "/controller.php",
                data: {
                    action: action
                },
                dataType: 'json'
            };

            $($form).ajaxForm(options).submit();
        });
		
        /* == Add/Edit Modal Actions == */
        $(document).on('click', '.addAction', function() {
            var dataset = $(this).data("set");
            var $parent = dataset.parent;
            var $this = $(this);
			var actions = '';
			var asseturl = dataset.url;
			var closeb = dataset.buttons === false ? '<a class="close"><i class="icon close"></i></a>' : '';
			var url = asseturl ? config.url + "/" + asseturl : config.url + "/controller.php";

            $.get(url, dataset.option[0], function(data) {
				if(dataset.buttons !== false) {
					actions += '' +
                    '<div class="actions">' +
                    '<div class="wojo small cancel button">' + config.lang.canBtn + '</div>' +
                    '<button class="wojo ok small secondary button">' + dataset.label + '</button>' +
                    '</div>';
				}
                var $modal = $('<div class="wojo ' + dataset.modalclass + ' modal">' +
                    '' + closeb + '' +
					'' + data + '' +
                    '' + actions + '' +
                    '</div>');
					$($modal).modal('setting', 'onShow', function() {
					    $('.wojo.dropdown').dropdown();
						$('.wojo.checkbox').checkbox();
						$('[data-datepicker]').calendar({
							firstDayOfWeek: config.weekstart,
							today: true,
							type: 'date',
							text: {
								days: config.lang.weeksShort,
								months: config.lang.monthsFull,
								monthsShort: config.lang.monthsShort,
								today: config.lang.today,
							},
							onChange: function(date, text) {
								if (!date) {
									return '';
								}
								var day = date.getDate();
								var month = config.lang.monthsFull[date.getMonth()];
								var year = date.getFullYear();
								var formatted = month + ' ' + day + ', ' + year;
				
								var element = $(this).data('element');
								var parent = $(this).data('parent');
								$(parent).html(text);
								if ($(element).is(":input")) {
									$(element).val(text);
								} else {
									$(element).html(formatted);
								}
							}
						});
					}).modal('show').modal('setting', 'onApprove', function() {
                    var modal = this;
		
                    $('.ok.button', this).addClass('loading').prop("disabled", true);
                    function showResponse(json) {
                        setTimeout(function() {
                            $('.ok.button', modal).removeClass('loading').prop("disabled", false);
                            if (json.message) {
                                $.notice(decodeURIComponent(json.message), {
                                    autoclose: 12000,
                                    type: json.type,
                                    title: json.title
                                });
                            }
                            if (json.type === "success") {
                                if (dataset.redirect) {
                                    setTimeout(function() {
                                        $("body").transition({
                                            animation: 'scale'
                                        });
                                        window.location.href = json.redirect;
                                    }, 800);
                                } else {
                                    switch (dataset.action) {
										case "replace":
											$($parent).html(json.html).transition('fade in');
											break;
										case "replaceWith":
											$($this).replaceWith(json.html).transition('fade in');
											break;
										case "append":
											$($parent).append(json.html).transition('bounce');
											break;
										case "prepend":
											$($parent).prepend(json.html).transition('bounce');
											break;
										case "update":
											$($parent).replaceWith(json.html).transition('fade in');
											break;
										case "insert":
											if (dataset.mode === "append") {
												$($parent).append(json.html);
											}
											if (dataset.mode === "prepend") {
												$($parent).prepend(json.html);
											}
											break;
										case "highlite":
											$($parent).addClass('highlite');
											break;
										default:
											break;
                                    }
									$('.wojo.dropdown').dropdown();
									$('.wojo.checkbox').checkbox();
									$(modal).modal('hide');
                                }
                            }

                        }, 500);
                    }

                    var options = {
                        target: null,
                        success: showResponse,
                        type: "post",
						url: url,
                        data: dataset.option[0],
                        dataType: 'json'
                    };
                    $('#modal_form').ajaxForm(options).submit();

                    return false;
                }).modal('setting', 'onHidden', function() {
                    $(this).remove();
                });
            });
        });
		
        /* == Modal Delete/Archive/Trash Actions == */
        $(document).on('click', 'a.action', function() {
            var dataset = $(this).data("set");
            var $parent = $(this).closest(dataset.parent);
            var asseturl = dataset.url;
            var subtext = dataset.subtext;
            var children = dataset.children ? dataset.children[0] : null;
            var header;
            var content;
            var icon;
            var btnLabel;
            switch (dataset.action) {
                case "trash":
                    icon = "trash";
                    btnLabel = config.lang.trsBtn;
                    subtext = '<span class="wojo bold text">' + config.lang.delMsg8 + '</span>';
                    header = config.lang.delMsg3 + " <span class=\"wojo secondary text\">" + dataset.option[0].title + "?</span>";
                    content = "<i class=\"huge circular icon negative trash\"></i>";
                    break;

                case "archive":
                    icon = "briefcase";
                    btnLabel = config.lang.arcBtn;
                    header = config.lang.delMsg5.replace('[NAME]', '<span class=\"wojo secondary text\">' + dataset.option[0].title + '</span>');
                    content = "<i class=\"huge circular icon negative briefcase\"></i>";
                    break;

                case "unarchive":
                    icon = "briefcase alt";
                    btnLabel = config.lang.uarcBtn;
                    header = config.lang.delMsg6.replace('[NAME]', '<span class=\"wojo secondary text\">' + dataset.option[0].title + '</span>');
                    content = "<i class=\"huge circular icon positive briefcase alt\"></i>";
                    break;

                case "restore":
                    icon = "undo";
                    btnLabel = config.lang.restBtn;
                    subtext = '';
                    header = config.lang.delMsg7.replace('[NAME]', '<span class=\"wojo secondary text\">' + dataset.option[0].title + '</span>');
                    content = "<i class=\"huge circular icon positive undo\"></i>";
                    break;

                case "delete":
                    icon = "delete";
                    btnLabel = config.lang.delBtn;
                    subtext = '<span class="wojo bold text">' + config.lang.delMsg2 + '</span>';
                    header = config.lang.delMsg1;
                    content = "<i class=\"huge circular icon negative trash\"></i>";
                    break;
            }

            $('<div class="wojo tiny modal">' +
                '<div class="header">' + header + '</div>' +
                '<div class="content content-center">' + content + '' +
                '<p class="half-top-padding">' + subtext + '</p>' +
                '</div>' +
                '<div class="actions">' +
                '<div class="wojo cancel button">' + config.lang.canBtn + '</div>' +
                '<div class="wojo ok secondary button">' + btnLabel + '</div>' +
                '</div>' +
                '</div>').modal('show').modal('setting', 'onApprove', function() {
                var $this = $(this);
				console.log();
			    var button = $('.ok', $this);
				button.addClass('loading');
			  
                $.ajax({
                    type: 'POST',
                    url: asseturl ? config.url + "/" + asseturl + "/controller.php" : config.url + "/controller.php",
                    dataType: 'json',
                    data: dataset.option[0]
                }).done(function(json) {
                    if (json.type === "success") {
                        if (dataset.redirect) {
                            $this.modal('hide');
                            $.notice(decodeURIComponent(json.message), {
                                autoclose: 4000,
                                type: json.type,
                                title: json.title
                            });
                            setTimeout(function() {
                                $("body").transition({
                                    animation: 'scale'
                                });
                                window.location.href = dataset.redirect;
                            }, 1200);
                        } else {
                            $($parent).transition({
                                animation: 'fade',
                                duration: '1s',
                                onComplete: function() {
                                    $($parent).slideUp();
									$($parent).remove();
									if(dataset.redraw) {
										$(dataset.redraw).pinto();
									}
                                }
                            });
                            if (children) {
                                $.each(children, function(i, values) {
                                    $.each(values, function(k, v) {
                                        if (v === "html") {
                                            $(i).html(json[k]);
                                        } else {
                                            $(i).val(json[k]);
                                        }
                                    });
                                });
                            }

                            $('.huge.icon', $this).toggleClass('negative ' + icon + ' positive check transition hidden').transition('pulse').transition({
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
                        }

                    } else {
						$this.modal('hide').remove();
						$.notice(decodeURIComponent(json.message), {
							autoclose: 4000,
							type: json.type,
							title: json.title
						});
					}
					button.removeClass('loading');
                });
                return false;
            }).modal('setting', 'onHidden', function() {
                $(this).remove();
            });
        });
    };
})(jQuery);
