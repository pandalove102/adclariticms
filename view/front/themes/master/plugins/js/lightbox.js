/*
 * lightbox - jQuery Plugin
 * version: 1.10
 *
 */
(function($) {
    "use strict";
    var autoplay, bgcolor, blocknum, blocktitle, border, core, container, content, dest,
        elementcontent, elementnext, elementprev, extraCss, childrenall, framewidth, frameheight,
        infinigall, items, keyNav, margin, numeration, overlayColor, overlay,
        first, title, thisgall, thenext, theprev,
        winH, elmH, nextok, prevok;

    $.fn.extend({
        //plugin name - wlightbox
        wlightbox: function(options) {

            // default option
            var defaults = {
                framewidth: '',
                frameheight: '',
                border: '0',
                bgcolor: '#fff',
                titleattr: 'data-title',
                numeration: true,
                infinigall: true,
                overlayclose: false
            };

            var option = $.extend(defaults, options);

            return this.each(function() {
                var obj = $(this);

                // Prevent double initialization
                if (obj.data('wlightbox')) {
                    return true;
                }

                obj.addClass('wbox-item');
                obj.data('framewidth', option.framewidth);
                obj.data('frameheight', option.frameheight);
                obj.data('border', option.border);
                obj.data('bgcolor', option.bgcolor);
                obj.data('numeration', option.numeration);
                obj.data('infinigall', option.infinigall);
                obj.data('overlayclose', option.overlayclose);
                obj.data('wlightbox', true);

                obj.click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    obj = $(this);
                    overlayColor = obj.data('overlay');
                    framewidth = obj.data('framewidth');
                    frameheight = obj.data('frameheight');
                    autoplay = obj.data('autoplay') || false;
                    border = obj.data('border');
                    bgcolor = obj.data('bgcolor');
                    nextok = false;
                    prevok = false;
                    keyNav = false;
                    dest = obj.data('href') || obj.attr('href');
                    extraCss = obj.data('css') || "";
                    $('body').addClass('wbox-open');
                    core = '<div class="wbox-overlay ' + extraCss + '" style="background:' + overlayColor + '"><div class="wbox-preloader"></div><div class="wbox-container"><div class="wbox-content"></div></div><div class="wbox-title"></div><div class="wbox-num">0/0</div><a class="wbox-close"><i class="icon close"></i></a><a class="wbox-next"><i class="icon chevron right"></i></a><a class="wbox-prev"><i class="icon chevron left"></i></a></div>';
                    $('body').append(core);
                    overlay = $('.wbox-overlay');
                    container = $('.wbox-container');
                    content = $('.wbox-content');
                    blocknum = $('.wbox-num');
                    blocktitle = $('.wbox-title');
                    content.html('');
                    content.css('opacity', '0');
					
                    checknav();
                    overlay.css('min-height', $(window).outerHeight());

                    // fade in overlay
                    overlay.velocity({
                        opacity: 1
                    }, 250, function() {
                        if (obj.data('type') === 'iframe') {
                            loadIframe();
                        } else if (obj.data('type') === 'inline') {
                            loadInline();
                        } else if (obj.data('type') === 'ajax') {
                            loadAjax();
                        } else if (obj.data('type') === 'vimeo') {
                            loadVimeo(autoplay);
                        } else if (obj.data('type') === 'youtube') {
                            loadYoutube(autoplay);
                        } else {
                            content.html('<img src="' + dest + '">');
                            preloadFirst();
                        }
                    });

                    // check next-prev
                    function checknav() {
                        thisgall = obj.data('gall');
                        numeration = obj.data('numeration');
                        infinigall = obj.data('infinigall');

                        items = $('.wbox-item[data-gall="' + thisgall + '"]');

                        if (items.length > 1 && numeration === true) {
                            blocknum.html(items.index(obj) + 1 + ' / ' + items.length);
                            blocknum.show();
                        } else {
                            blocknum.hide();
                        }

                        thenext = items.eq(items.index(obj) + 1);
                        theprev = items.eq(items.index(obj) - 1);

                        if (obj.attr(option.titleattr)) {
                            title = obj.attr(option.titleattr);
                            blocktitle.show();
                        } else {
                            title = '';
                            blocktitle.hide();
                        }

                        if (items.length > 1 && infinigall === true) {
                            nextok = true;
                            prevok = true;

                            if (thenext.length < 1) {
                                thenext = items.eq(0);
                            }
                            if (items.index(obj) < 1) {
                                theprev = items.eq(items.index(items.length));
                            }
                        } else {
                            if (thenext.length > 0) {
                                $('.wbox-next').css('display', 'block');
                                nextok = true;
                            } else {
                                $('.wbox-next').css('display', 'none');
                                nextok = false;
                            }
                            if (items.index(obj) > 0) {
                                $('.wbox-prev').css('display', 'block');
                                prevok = true;

                            } else {
                                $('.wbox-prev').css('display', 'none');
                                prevok = false;
                            }
                        }

						if(nextok) {
							container.on('swipeleft', function() {
								gallnav.next();
							});
						}
						if(prevok) {
							container.on('swiperight', function() {
								gallnav.next();
							});
						}
                    }

                    //navigation
                    var gallnav = {
                        prev: function() {
                            if (keyNav) {
                                return;
                            } else {
                                keyNav = true;
                            }

                            overlayColor = theprev.data('overlay');
                            framewidth = theprev.data('framewidth');
                            frameheight = theprev.data('frameheight');
                            border = theprev.data('border');
                            bgcolor = theprev.data('bgcolor');
                            dest = theprev.data('href') || theprev.attr('href');
                            autoplay = theprev.data('autoplay');

                            if (theprev.attr(option.titleattr)) {
                                title = theprev.attr(option.titleattr);
                            } else {
                                title = '';
                            }

                            if (overlayColor === undefined) {
                                overlayColor = "";
                            }

                            content.velocity({
                                opacity: 0
                            }, 500, function() {
                                overlay.css('background', overlayColor);
                                if (theprev.data('type') === 'iframe') {
                                    loadIframe();
                                } else if (theprev.data('type') === 'inline') {
                                    loadInline();
                                } else if (theprev.data('type') === 'ajax') {
                                    loadAjax();
                                } else if (theprev.data('type') === 'youtube') {
                                    loadYoutube(autoplay);
                                } else if (theprev.data('type') === 'vimeo') {
                                    loadVimeo(autoplay);
                                } else {
                                    content.html('<img src="' + dest + '">');
                                    preloadFirst();
                                }
                                obj = theprev;
                                checknav();
                                keyNav = false;
                            });

                        },

                        next: function() {
                            if (keyNav) {
                                return;
                            } else {
                                keyNav = true;
                            }

                            overlayColor = thenext.data('overlay');
                            framewidth = thenext.data('framewidth');
                            frameheight = thenext.data('frameheight');
                            border = thenext.data('border');
                            bgcolor = thenext.data('bgcolor');
                            dest = thenext.data('href') || thenext.attr('href');
                            autoplay = thenext.data('autoplay');

                            if (thenext.attr(option.titleattr)) {
                                title = thenext.attr(option.titleattr);
                            } else {
                                title = '';
                            }

                            if (overlayColor === undefined) {
                                overlayColor = "";
                            }

                            content.velocity({
                                opacity: 0
                            }, 500, function() {
                                overlay.css('background', overlayColor);
                                if (thenext.data('type') === 'iframe') {
                                    loadIframe();
                                } else if (thenext.data('type') === 'inline') {
                                    loadInline();
                                } else if (thenext.data('type') === 'ajax') {
                                    loadAjax();
                                } else if (thenext.data('type') === 'youtube') {
                                    loadYoutube(autoplay);
                                } else if (thenext.data('type') === 'vimeo') {
                                    loadVimeo(autoplay);
                                } else {
                                    content.html('<img src="' + dest + '">');
                                    preloadFirst();
                                }
                                obj = thenext;
                                checknav();
                                keyNav = false;
                            });
                        }
                    };

                    //arrow keys
                    $('body').keydown(function(e) {
                        if (e.keyCode === 37 && prevok === true) { // left
                            gallnav.prev();
                        }
                        if (e.keyCode === 39 && nextok === true) { // right
                            gallnav.next();
                        }
                    });

                    $('.wbox-prev').click(function() {
                        gallnav.prev();
                    });

                    $('.wbox-next').click(function() {
                        gallnav.next();
                    });

                    function escapeHandler(e) {
                        if (e.keyCode === 27) {
                            closeWbox();
                        }
                    }

                    //close lightbox
                    function closeWbox() {
                        $('body').removeClass('wbox-open');
                        $('body').off('keydown', escapeHandler);
						overlay.velocity('transition.swoopOut', {
							duration: 600,
							complete: function() {
								overlay.remove();
								keyNav = false;
								obj.focus();
							}
						});
                    }

                    //close click
                    var closeclickclass = '.wbox-close, .wbox-overlay';
                    if (!obj.data('overlayclose')) {
                        closeclickclass = '.wbox-close';
                    }

                    $(closeclickclass).click(function(e) {
                        elementcontent = '.children';
                        elementprev = '.wbox-prev';
                        elementnext = '.wbox-next';
                        childrenall = '.children *';
                        if (!$(e.target).is(elementcontent) && !$(e.target).is(elementnext) && !$(e.target).is(elementprev) && !$(e.target).is(childrenall)) {
                            closeWbox();
                        }
                    });
                    $('body').keydown(escapeHandler);
                    return false;
                });
            });
        }
    });

    //ajax
    function loadAjax() {
        $.ajax({
            url: dest,
            cache: false
        }).done(function(msg) {
            content.html('<div class="wbox-inline">' + msg + '</div>');
            updateoverlay(true);

        }).fail(function() {
            content.html('<div class="wbox-inline"><p>Error retrieving contents, please retry</div>');
            updateoverlay(true);
        });
    }

    //iframe
    function loadIframe() {
        content.html('<iframe class="wojoframe" src="' + dest + '"></iframe>');
        updateoverlay();
    }

    //vimeo
    function loadVimeo(autoplay) {
        var parts = dest.split('/');
        var videoid = parts[parts.length - 1];
        var stringAutoplay = autoplay ? "?autoplay=1" : "";
        content.html('<iframe class="wojoframe" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" src="//player.vimeo.com/video/' + videoid + stringAutoplay + '"></iframe>');
        updateoverlay();
    }

    //youtube
    function loadYoutube(autoplay) {
        var parts = dest.split('/');
        var videoid = parts[parts.length - 1];
        var stringAutoplay = autoplay ? "?autoplay=1" : "";
        content.html('<iframe class="wojoframe" webkitallowfullscreen mozallowfullscreen allowfullscreen src="//www.youtube.com/embed/' + videoid + stringAutoplay + '"></iframe>');
        updateoverlay();
    }

    //inline
    function loadInline() {
        content.html('<div class="wbox-inline">' + $(dest).html() + '</div>');
        updateoverlay();
    }

    //preload
    function preloadFirst() {
        first = $('.wbox-content').find('img');
        first.one('load', function() {
            updateoverlay();
        }).each(function() {
            if (this.complete) {
                $(this).load();
            }
        });
    }

    function updateoverlay() {
        blocktitle.html(title);
        content.find(">:first-child").addClass('children');
        $('.children').css('width', framewidth).css('height', frameheight).css('padding', border).css('background', bgcolor);

        elmH = content.outerHeight();
        winH = $(window).height();

        if (elmH + 80 < winH) {
            margin = (winH - elmH) / 2;
            content.css('margin-top', margin);
            content.css('margin-bottom', margin);
        } else {
            content.css('margin-top', '40px');
            content.css('margin-bottom', '40px');
        }
        content.velocity({
            'opacity': '1'
        }, 600);
    }

    function updateoverlayresize() {
        if ($('.wbox-content').length) {
            elmH = content.height();
            winH = $(window).height();
            if (elmH + 80 < winH) {
                margin = (winH - elmH) / 2;
                content.css('margin-top', margin);
                content.css('margin-bottom', margin);
            } else {
                content.css('margin-top', '40px');
                content.css('margin-bottom', '40px');
            }
        }
    }

    $(window).resize(function() {
        updateoverlayresize();
    });
})(jQuery);