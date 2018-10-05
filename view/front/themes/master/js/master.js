(function($) {
	var config = {
		weekstart : 0,
		ampm : 0,
		url : '',
		lang : {
			monthsFull : '',
			monthsShort : '',
			weeksFull : '',
			weeksShort : '',
			weeksMed : '',
			today : "Today",
			now : "Now",
			button_text : "Choose file...",
			empty_text : "No file...",
			sel_pic : "Choose image...",
		}
	};
	
	$("button[name=contactformsubmit]").on('click', function() {
		var $btn = $(this);
		var $cont = $("#pass_form").find('.wojo.form').parent();
		$btn.addClass('loading');
		$btn.prop('disabled', true);
		var email = $("input[name=email]").val();
		var name = $("input[name=name]").val();
		var notes = $("textarea[name=notes]").val();
		$.ajax({
			type : 'post',
			url : config.url + "/view/front/controller.php",
			data : {
				'action' : 'contactus',
				'email' : email,
				'fname' : name,
				'notes' : notes
			},
			dataType : "json",
			success : function(json) {
				if (json.type === "success") {
					$("#passform .field").removeClass('error');
					$("#passform .field i.icon").removeClass('asterisk');
					$btn.remove();
					window.location.href ="/page/thank-you/";
					//$cont.closest('.wojo.segment').removeClass('top attached');
					//$cont.replaceWith('<div class="wojo notice success"><div class="content content-center"><span>' + json.message + '</span></div></div>');
				} else {
					$("#passform .field").addClass('error');
					$("#passform .field i.icon").addClass('asterisk');
				}
				$btn.removeClass('loading');
				$btn.prop('disabled', false);
			}
		});
	});

	
	
	$("button[name=loginformsubmit]").on('click', function() {
		var $btn = $(this);
		var $cont = $("#pass_form").find('.wojo.form').parent();
		$btn.addClass('loading');
		$btn.prop('disabled', true);
		var email = $("input[name=email]").val();
		var name = $("input[name=password]").val();
		$.ajax({
			type : 'post',
			url : config.url + "/view/front/controller.php",
			data : {
				'action' : 'login',
				'email' : email,
				'password' : name
			},
			dataType : "json",
			success : function(json) {
				if (json.type === "success") {
					$("#passform .field").removeClass('error');
					$("#passform .field i.icon").removeClass('asterisk');
					$btn.remove();
					window.location.href ="/admin/";
					//$cont.closest('.wojo.segment').removeClass('top attached');
					//$cont.replaceWith('<div class="wojo notice success"><div class="content content-center"><span>' + json.message + '</span></div></div>');
				} else {
					$("#passform .field").addClass('error');
					$("#passform .field i.icon").addClass('asterisk');
				}
				$btn.removeClass('loading');
				$btn.prop('disabled', false);
			}
		});
	});
	
	
	/*"use strict";
	$.Master = function(settings) {
	    var config = {
	        weekstart: 0,
	        ampm: 0,
	        url: '',
	        lang: {
	            monthsFull: '',
	            monthsShort: '',
	            weeksFull: '',
	            weeksShort: '',
	            weeksMed: '',
	            today: "Today",
	            now: "Now",
	            button_text: "Choose file...",
	            empty_text: "No file...",
	            sel_pic: "Choose image...",
	        }
	    };

	    if (settings) {
	        $.extend(config, settings);
	    }
	    */

	/*
	        $('.wojo.dropdown').dropdown();
	        $('.wojo.checkbox').checkbox();
	        $('.wojo.progress').progress();
	        $('.wojo.accordion').accordion();
	        $('.rangeslider').jRange();
	        $('.wojo.tabs li').tab();
	        $('.spinner').wojoSpinner();*/

	// sticky menu desktop only
	/*
	if ($.browser.desktop) {
	    var stickyNavTop = $('#bottombar').offset().top;
	    var stickyNav = function() {
	        var scrollTop = $(window).scrollTop();
	        if (scrollTop > stickyNavTop) {
	            $('#bottombar').addClass('sticky');
	        } else {
	            $('#bottombar').removeClass('sticky');
	        }
	    };
	    stickyNav();
	    $(window).on('scroll', stickyNav);
	}

	$('[data-content]').popup({
	    variation: "mini inverted",
	    inline: true,
	});
*/
	/* == Fluid Grid == */
	/*
	$('.wojo.blocks').waitForImages(true).done(function() {
	    $('.wojo.blocks').each(function() {
	        var set = $(this).data('wblocks');
	        $(this).pinto(set);
	    });
	});*/

	//Lightbox
	/*
	$('.lightbox').wlightbox();*/

	//Poll
	/*
	$('.poll').Poll({
	    url: config.url + '/plugins_/poll/controller.php'
	});
*/
	//Comments
	/*
	$('#comments').Comments({
	    url: config.url + '/modules_/comments/'
	});
*/
	//Carousel
	/*
	$('.wojo.carousel').each(function() {
	    var set = $(this).data('wcarousel');
	    $(this).owlCarousel(set);
	});*/

	//Dimmable
	/*
	$('.wDimmer').dimmer({
	    on: 'hover'
	});*/

	//wojo slider
	/*
	$('.wSlider').each(function() {
	    var set = $(this).data('wslider');
	    $(this).wojoSlider({
	        startWidth: set.width,
	        startHeight: set.height,
	        automaticSlide: set.automaticSlide,
	        theme: set.layout,
	        hasThumbs: set.thumbs,
	        showControls: set.arrows,
	        showNavigation: set.buttons,
	        showProgressBar: set.showProgressBar,
	    });
	});*/

	/* == Responsive Tables == */
	/*$('.wojo.table:not(.unstackable)').responsiveTable();*/

	/* == Vertical Menus == */
	/*
	$("ul.vertical-menu").find('ul.menu-submenu').parent().prepend('<i class=\"icon chevron down\"></i>');
	$('ul.vertical-menu .chevron.down').click(function() {
	    var icon = this;
	    var isOpen = $(this).siblings('ul.vertical-menu ul.menu-submenu').is(':visible');
	    var slideDir = isOpen ? 'slideUp' : 'slideDown';
	    $(this).siblings('ul.vertical-menu ul.menu-submenu').velocity(slideDir, {
	        easing: 'easeOutQuart',
	        duration: 300,
	        complete: function() {
	            $(icon).toggleClass('vertically flipped');
	        }
	    });
	});*/

	/* == Basic color picker == */
	/*
	$('[data-color="true"]').spectrum({
	    showPaletteOnly: true,
	    showPalette: true,
	    move: function(color) {
	        var newcolor = color.toHexString();
	        $(this).children().css('background', newcolor);
	        $(this).prev('input').val(newcolor);
	    }
	});*/

	/* == Advanced color picker == */
	/*
	$('[data-adv-color="true"]').spectrum({
	    showInput: true,
	    showAlpha: true,
	    move: function(color) {
	        var rgba = "transparent";
	        if (color) {
	            rgba = color.toRgbString();
	            $(this).children().css('background', rgba);
	            $(this).children('input').val(rgba);
	        }
	    },
	});*/

	/* == Datepicker == */
	/*
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
	});*/

	/* == Time Picker == */
	/*
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
	});*/

	//Main menu
	/*
	$('nav.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
	$('nav.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
	$("nav.menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");
	$("nav.menu > ul > li").hover(function(e) {
	    if ($(window).width() > 768) {
	        $(this).children("ul").stop(true, false).slideToggle(150);
	        e.preventDefault();
	    }
	});
	$("nav.menu > ul > li").click(function() {
	    if ($(window).width() <= 768) {
	        $(this).children("ul").fadeToggle(150);
	    }
	});
	$("nav.menu .menu-mobile").click(function(e) {
	    $("nav.menu > ul").toggleClass('show-on-mobile');
	    e.preventDefault();
	});*/

	/* == Change User Poster == */
	/* $("#changePoster").on('click', function() {
	     if ($('#posterPopup').length === 0) {
	         var that = $(".icon", this);
	         that.attr("class", "icon circles spinner spinning");
	         $('<div id="posterPopup" class="wojo popup" style="min-width:300px"><div class="wojo images"></div></div>').appendTo('body');
	         $.get(config.url + '/controller.php', {
	             action: "posters"
	         }, function(data) {
	             $('#posterPopup .images').html(data);
	             that.attr("class", "icon horizontal ellipsis");
	         });
	     }

	     $(this).popup({
	         on: 'manual',
	         popup: $("#posterPopup"),
	         lastResort: true,
	         exclusive: true,
	         hideOnScroll: false,
	         hoverable: true,
	     }).popup('show');
	 });

	 $(document).on('click', '#posterPopup img', function() {
	     var img = $(this).attr('src');
	     var uimg = img.split(/[\\\/]/).pop();
	     $("#userProfile").css('background-image', 'url(' + img + ')');
	     $.cookie("CMSPRO_POSTER", uimg, {
	         expires: 120,
	         path: '/'
	     });
	 });*/

	/* == Membership Select == */
	/*$(".add-membership").on("click", function() {
	    $("#membershipSelect .segment").removeClass('active');
	    $(this).closest('.segment').addClass('active');
	    var id = $(this).data('id');
	    $.post(config.url + "/controller.php", {
	        action: "buyMembership",
	        id: id
	    }, function(json) {
	        $("#mResult").html(json.message);
	        $("#mResult").velocity('scroll', {
	            duration: 500,
	            offset: -40,
	            easing: 'ease-in-out'
	        });
	    }, "json");
	});*/

	/* == Gateway Select == */
	/*$("#mResult").on("click", ".sGateway", function() {
	    var button = $(this);
	    $("#mResult .sGateway").removeClass('primary');
	    button.addClass('primary loading');
	    var id = $(this).data('id');
	    $.post(config.url + "/controller.php", {
	        action: "selectGateway",
	        id: id
	    }, function(json) {
	        $("#mResult #gdata").html(json.message);
	        $("#mResult #gdata").velocity('scroll', {
	            duration: 500,
	            offset: -40,
	            easing: 'ease-in-out'
	        });
	        button.removeClass('loading');
	    }, "json");
	});*/

	/* == Membership Select == */
	/*$("#mResult").on("click", "#cinput", function() {
	    var id = $(this).data('id');
	    var $this = $(this);
	    var $parent = $(this).parent();
	    var $input = $("input[name=coupon]");
	    if (!$input.val()) {
	        $parent.addClass('error');
	    } else {
	        $parent.addClass('loading');
	        $.post(config.url + "/controller.php", {
	            action: "getCoupon",
	            id: id,
	            code: $input.val()
	        }, function(json) {
	            if (json.type === "success") {
	                $parent.removeClass('error');
	                $this.toggleClass('find check');
	                $parent.prop('disabled', true);
	                $(".totaltax").html(json.tax);
	                $(".totalamt").html(json.gtotal);
	                $(".disc").html(json.disc);
	                $(".disc").parent().addClass('highlite');
	            } else {
	                $parent.addClass('error');
	            }
	            $parent.removeClass('loading');
	        }, "json");
	    }
	});*/

	// Scroll to top
	/*$(window).scroll(function() {
	    if ($(this).scrollTop() > 100) {
	        $('#back-to-top').fadeIn(500);
	    } else {
	        $('#back-to-top').fadeOut(300);
	    }
	});

	$('#back-to-top').click(function() {
	    $('html,body').velocity('scroll', {
	        duration: 700,
	        offset: 0,
	        easing: 'ease-in-out'
	    });
	    return false;
	});*/

	/* == Clear Session Debug Queries == */
	/*$("#debug-panel").on('click', 'a.clear_session', function() {
	    $.get(config.url + '/controller.php', {
	        ClearSessionQueries: 1
	    });
	    $(this).css('color', '#222');
	});*/

	/* == Master Form == */
	/*$(document).on('click', 'button[name=dosubmit]', function() {
	    var $button = $(this);
	    var action = $(this).data('action');
	    var $form = $(this).closest("form");
	    var asseturl = $(this).data('url');
	    var hide = $(this).data('hide');

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
	            $('body')
	                .velocity('transition.swoopOut', {
	                    delay: 2500,
	                    duration: 800,
	                    complete: function() {
	                        window.location.href = json.redirect;
	                    }
	                });
	        }
	        if (json.type === "success" && hide) {
	            $form.children().velocity('transition.swoopOut', {
	                stagger: 250
	            }, 800);
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
	});*/

	/* == Avatar Upload == */
	/* $('[data-type="image"]').ezdz({
	     text: config.lang.sel_pic,
	     validators: {
	         maxWidth: 1200,
	         maxHeight: 1200
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
	             $.notice(decodeURIComponent(file.name + ' must be width:1200px, and height:1200px  max.'), {
	                 autoclose: 4000,
	                 type: "error",
	                 title: 'Error'
	             });
	         }
	     },
	     accept: function() {
	         if ($(this).data('process')) {
	             var action = $(this).data('action');
	             var data = new FormData();
	             data.append(action, $(this).prop('files')[0]);
	             data.append("action", "avatar");

	             $.ajax({
	                 type: 'POST',
	                 processData: false,
	                 contentType: false,
	                 data: data,
	                 url: config.url + "/controller.php",
	                 dataType: 'json',
	             });

	         }

	     }
	 });*/

	/* == Password Reset == */
	/*$("#backto").on('click', function() {
	    $("#passform").velocity('transition.slideDownBigOut', {
	        duration: 500,
	        complete: function() {
	            $("#loginform").velocity("transition.slideUpBigIn", {
	                duration: 150
	            });
	        }
	    });
	});
	$("#passreset").on('click', function() {
	    $("#loginform").velocity('transition.slideUpBigOut', {
	        duration: 500,
	        complete: function() {
	            $("#passform").velocity("transition.slideDownBigIn", {
	                duration: 150
	            });
	        }
	    });

	});
	
	
	$("button[name=passreset]").on('click', function() {
	    var $btn = $(this);
	    var $cont = $("#pass_form").find('.wojo.form').parent();
	    $btn.addClass('loading');
	    $btn.prop('disabled', true);
	    var email = $("input[name=pemail]").val();
	    var fname = $("input[name=fname]").val();
	    $.ajax({
	        type: 'post',
	        url: config.url + "/controller.php",
	        data: {
	            'action': 'uResetPass',
	            'email': email,
	            'fname': fname
	        },
	        dataType: "json",
	        success: function(json) {
	            if (json.type === "success") {
	                $("#passform .field").removeClass('error');
	                $("#passform .field i.icon").removeClass('asterisk');
	                $btn.remove();
	                $cont.closest('.wojo.segment').removeClass('top attached');
	                $cont.replaceWith('<div class="wojo notice success"><div class="content content-center"><span>' + json.message + '</span></div></div>');
	            } else {
	                $("#passform .field").addClass('error');
	                $("#passform .field i.icon").addClass('asterisk');
	            }
	            $btn.removeClass('loading');
	            $btn.prop('disabled', false);
	        }
	    });
	});*/



	/* == Language Switcher == */
	/*
	$('#langChange').on('click', 'a', function() {
	    $.cookie("LANG_CMSPRO", $(this).data('value'), {
	        expires: 120,
	        path: '/'
	    });
	    $('body')
	        .velocity('transition.swoopOut', {
	            duration: 1200,
	            complete: function() {
	                window.location.href = config.surl;
	            }
	        });
	    return false;
	});*/

	/* == Search == */
	/*
	$("#searchButton").on('click', function() {
	    var icon = $(this);
	    var input = $("#masterSearch").find("input");
	    var url = $("#masterSearch").data('url');

	    $("#masterSearch").animate({
	        "width": "100%",
	        "opacity": 1
	    }, 300, function() {
	        input.focus();
	    });
	    icon.css('opacity', 0);

	    input.blur(function() {
	        if (!input.val()) {
	            $("#masterSearch").animate({
	                "width": "0",
	                "opacity": 0
	            }, 200);
	            icon.css('opacity', 1);
	        }
	    });

	    input.keypress(function(e) {
	        var key = e.which;
	        if (key === 13) {
	            var value = $.trim($(this).val());
	            if (value.length) {
	                window.location.href = url + '?keyword=' + value;
	            }
	        }
	    });
	});
	 */


	// convert logo svg to editable 

/*
$('.logo img').each(function() {
    var $img = $(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function(data) {
        var $svg = $(data).find('svg');
        if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
        }
        $svg = $svg.removeAttr('xmlns:a');
        $img.replaceWith($svg);
    }, 'xml');

});*/
/*};*/
})(jQuery);

function changeLanguage(e) {
	//	
	$.cookie("LANG_CMSPRO", $(e).val().toLowerCase(), {
		expires : 120,
		path : document.URL
	});

	$('body')
		.velocity('transition.swoopOut', {
			duration : 1200,
			complete : function() {
				window.location.href =document.URL;
			}
		});
}