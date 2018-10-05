/*
Wojo Slider
*/
(function($){if($('head script[src="https://www.youtube.com/iframe_api"]').length){return}else{var H=document.createElement('script');H.src="https://www.youtube.com/iframe_api";var I=document.getElementsByTagName('script')[0];I.parentNode.insertBefore(H,I)}var J=function(){function e(a){return new e.fn.init(a)}function g(a,c,b){if(!b.contentWindow.postMessage)return!1;a=JSON.stringify({method:a,value:c});b.contentWindow.postMessage(a,h)}function l(a){var c,b;try{c=JSON.parse(a.data),b=c.event||c.method}catch(e){}"ready"!=b||k||(k=!0);if(!/^https?:\/\/player.vimeo.com/.test(a.origin))return!1;"*"===h&&(h=a.origin);a=c.value;var m=c.data,f=""===f?null:c.player_id;c=f?d[f][b]:d[b];b=[];if(!c)return!1;void 0!==a&&b.push(a);m&&b.push(m);f&&b.push(f);return 0<b.length?c.apply(null,b):c.call()}function n(a,c,b){b?(d[b]||(d[b]={}),d[b][a]=c):d[a]=c}var d={},k=!1,h="*";e.fn=e.prototype={element:null,init:function(a){"string"===typeof a&&(a=document.getElementById(a));this.element=a;return this},api:function(a,c){if(!this.element||!a)return!1;var b=this.element,d=""!==b.id?b.id:null,e=c&&c.constructor&&c.call&&c.apply?null:c,f=c&&c.constructor&&c.call&&c.apply?c:null;f&&n(a,f,d);g(a,e,b);return this},addEvent:function(a,c){if(!this.element)return!1;var b=this.element,d=""!==b.id?b.id:null;n(a,c,d);"ready"!=a?g("addEventListener",a,b):"ready"==a&&k&&c.call(null,d);return this},removeEvent:function(a){if(!this.element)return!1;var c=this.element,b=""!==c.id?c.id:null;a:{if(b&&d[b]){if(!d[b][a]){b=!1;break a}d[b][a]=null}else{if(!d[a]){b=!1;break a}d[a]=null}b=!0}"ready"!=a&&b&&g("removeEventListener",a,c)}};e.fn.init.prototype=e.fn;window.addEventListener?window.addEventListener("message",l,!1):window.attachEvent("onmessage",l);return window.Froogaloop=window.$f=e}();$.WojoSlider=function(m,n){var o=$(m);var p='div.wojoslider';var q='div.ws-slides';var r='div.ws-slide';var s='> *';var t;var u=0;var v=false;var w=false;var x=false;var y=true;var z=new Timer(function(){},0);var A=new Array();var B=new Array();var C={};var D={};var E=1;var F=0;if((typeof(YT)=='undefined'||typeof(YT.Player)=='undefined')){var G=setInterval(function(){if(typeof(YT)!='undefined'&&typeof(YT.Player)!='undefined'){clearInterval(G);init()}},100)}else{init()}function init(){o.wrapInner('<div class="wojoslider '+n.theme+'" />');o.find(p+' > div').addClass('ws-slides');o.find(p+' '+q+' > div').addClass('ws-slide');t=getSlides().length;if(t==0){return false}if(t==1){var b=getSlide(0);var c=o.find(p).find(q);b.clone().prependTo(c);t++}if(n.showControls){o.find(p).append('<div class="ws-controls"><span class="ws-next"></span><span class="ws-previous"></span></div>')}if(n.showNavigation){var d='<div class="ws-navigation">';getSlides().each(function(){if(n.hasThumbs){d+='<span class="ws-slide-link thumb"><img src="'+$(this).css('background-image').replace(/(url\(|\)|'|")/gi,'')+'"></span>'}else{d+='<span class="ws-slide-link"></span>'}});d+='</div>';o.find(p).append(d)}if(n.showProgressBar){o.find(p).append('<div class="ws-progress-bar"></div>')}else{o.find(p).append('<div class="ws-progress-bar ws-progress-bar-hidden"></div>')}o.css('display','block');if(n.responsive){setScale()}setLayout();setPreloader();initVideos().done(function(){var a=setInterval(function(){if(document.readyState=='complete'&&o.find(p).find('.ws-preloader').length>0){clearInterval(a);loadedWindow()}},100)})}function initVideos(){var b=new $.Deferred();var c=getSlides().find('.ws-yt-iframe, .ws-vimeo-iframe').length;var d=0;if(c==0){return b.resolve().promise()}getSlides().find('.ws-yt-iframe, .ws-vimeo-iframe').each(function(){var a=$(this);a.one('load',function(){d++;if(d==c){initYoutubeVideos().done(function(){initVimeoVideos().done(function(){b.resolve()})})}})});return b.promise()}function initYoutubeVideos(){var f=new $.Deferred();var g=getSlides();var h=g.find('.ws-yt-iframe').length;var i=0;var j;if(h==0){return f.resolve().promise()}g.each(function(){var c=$(this);var d=c.find('.ws-yt-iframe');d.each(function(){var a=$(this);a.attr('id','ws-yt-iframe-'+Date.now());var b=new YT.Player(a.attr('id'),{events:{'onReady':function(e){i++;if(i==h){f.resolve();if(getItemData(a,'autoplay')){e.target.playVideo()}}},'onStateChange':function(e){if(e.data===YT.PlayerState.ENDED&&getItemData(a,'loop')){b.playVideo()}},},});j={player:b,played_once:false};C[a.attr('id')]=j})});return f.promise()}function initVimeoVideos(){var e=new $.Deferred();var f=getSlides();var g=f.find('.ws-vimeo-iframe').length;var h=0;var i;if(g==0){return e.resolve().promise()}f.each(function(){var c=$(this);var d=c.find('.ws-vimeo-iframe');d.each(function(){var a=$(this);a.attr('id','ws-vimeo-iframe-'+Date.now());a.attr('src',a.attr('src')+'&player_id='+a.attr('id'));var b=$f(a[0]);b.addEvent('ready',function(){b.addEvent('finish',function(){D[a.attr('id')].ended=true});b.addEvent('play',function(){D[a.attr('id')].played_once=true;D[a.attr('id')].ended=false});if(getItemData(a,'loop')){b.api('setLoop',true)}h++;if(h==g){e.resolve()}});i={player:b,played_once:false,ended:false,};D[a.attr('id')]=i})});return e.promise()}function loadedWindow(){if(n.responsive){setScale()}setLayout();F=$(window).width();initProperties();addListeners();unsetPreloader();n.beforeStart();if(n.responsive){setResponsive()}else{play()}}function initProperties(){getSlides().each(function(){var c=$(this);c.find(s).each(function(){var b=$(this);b.children().each(function(){var a=$(this);setElementDatas(a,true)});setElementDatas(b,false)});c.css('display','none');c.data('opacity',parseFloat(c.css('opacity')))})}function setElementDatas(a,b){a.data('width',parseFloat(a.width()));a.data('height',parseFloat(a.height()));a.data('letter-spacing',parseFloat(a.css('letter-spacing')));a.data('font-size',parseFloat(a.css('font-size')));if(a.css('line-height').slice(-2).toLowerCase()=='px'){a.data('line-height',parseFloat(a.css('line-height')))}else{a.data('line-height',parseFloat(a.css('line-height'))*getItemData(a,'font-size'))}a.data('padding-top',parseFloat(a.css('padding-top')));a.data('padding-right',parseFloat(a.css('padding-right')));a.data('padding-bottom',parseFloat(a.css('padding-bottom')));a.data('padding-left',parseFloat(a.css('padding-left')));a.data('opacity',parseFloat(a.css('opacity')));if(!b){a.css('display','none')}}function addListeners(){if(n.responsive){$(window).resize(function(){if(F!=$(window).width()&&((n.layout=='full-width'&&getWidth()!=$(o).width())||($(o).width()<getWidth()||(($(o).width()>getWidth())&&getWidth()<n.startWidth)))){setResponsive()}})}o.find(p).find('.ws-controls > .ws-previous').click(function(){changeSlide(getPreviousSlide())});o.find(p).find('.ws-controls > .ws-next').click(function(){changeSlide(getNextSlide())});if(n.enableSwipe){o.find(p).on('swipeleft',function(){resume();changeSlide(getNextSlide())});o.find(p).on('swiperight',function(){resume();changeSlide(getPreviousSlide())})}o.find(p).find('.ws-navigation > .ws-slide-link').click(function(){changeSlide($(this).index())});if(n.pauseOnHover){o.find(p).find(q).hover(function(){pause()});o.find(p).find(q).mouseleave(function(){resume()})}}function setPreloader(){o.find(p).find(q).css('visibility','hidden');o.find(p).find('.ws-progress-bar').css('display','none');o.find(p).find('.ws-navigation').css('display','none');o.find(p).find('.ws-controls').css('display','none');var a=getSlide(0).css('background-image');a=a.replace(/^url\(["']?/,'').replace(/["']?\)$/,'');if(!a.match(/\.(jpeg|jpg|gif|png|bmp|tiff|tif)$/)){addPreloaderHTML()}else{$('<img>').load(function(){addPreloaderHTML()}).attr('src',a).each(function(){if(this.complete){$(this).load()}})}function addPreloaderHTML(){o.find(p).append('<div class="ws-preloader"><div class="ws-bg"></div><div class="ws-loader"><div class="ws-spinner"></div></div></div>');o.find(p).find('.ws-preloader').css({'background-color':getSlide(0).css('background-color'),'background-image':getSlide(0).css('background-image'),'background-position':getSlide(0).css('background-position'),'background-repeat':getSlide(0).css('background-repeat'),'background-size':getSlide(0).css('background-size'),});o.find(p).find('.ws-preloader > .ws-bg').css({'background-color':getSlide(0).css('background-color'),'background-image':getSlide(0).css('background-image'),'background-position':getSlide(0).css('background-position'),'background-repeat':getSlide(0).css('background-repeat'),'background-size':getSlide(0).css('background-size'),})}}function unsetPreloader(){o.find(p).find(q).css('visibility','visible');o.find(p).find('.ws-progress-bar').css('display','block');o.find(p).find('.ws-navigation').css('display','block');o.find(p).find('.ws-controls').css('display','block');slideIn(getSlide(0));getSlide(0).finish();o.find(p).find('.ws-preloader').animate({'opacity':0,},300,function(){o.find(p).find('.ws-preloader').remove()})}function setLayout(){var a=n.layout;var b,height;switch(a){case'fixed':b=n.startWidth;height=n.startHeight;o.find(p).css({'width':getScaled(b),'height':getScaled(height),});getSlides().css({'width':getScaled(b),'height':getScaled(height),});break;case'full-width':b=o.width();height=n.startHeight;o.find(p).css({'width':b,'height':getScaled(height),});getSlides().css({'width':b,'height':getScaled(height),});break;default:return false;break}}function getLayoutGaps(a){var b=(getHeight()-n.startHeight)/2;var c=(getWidth()-n.startWidth)/2;var d=0;var e=0;if(b>0){d=b}if(c>0){e=c}return{top:d,left:e,}}function setResponsive(){n.beforeSetResponsive();var e=getSlides();stop(true);e.each(function(){var b=$(this);var c=b.find(s);b.finish();slideIn(b);b.finish();c.each(function(){var a=$(this);a.finish();elementIn(a);a.finish();if(isVideo(a)){pauseVideo(a)}})});setScale();setLayout();e.each(function(){var c=$(this);var d=c.find(s);d.each(function(){var b=$(this);b.children('*').each(function(){var a=$(this);scaleElement(a)});scaleElement(b);b.finish();elementOut(b);b.finish();if(isVideo(b)){pauseVideo(b)}});c.finish();slideOut(c);c.finish()});F=$(window).width();play()}function scaleElement(a){a.css({'top':getScaled(getItemData(a,'top')+getLayoutGaps(a).top),'left':getScaled(getItemData(a,'left')+getLayoutGaps(a).left),'padding-top':getScaled(getItemData(a,'padding-top')),'padding-right':getScaled(getItemData(a,'padding-right')),'padding-bottom':getScaled(getItemData(a,'padding-bottom')),'padding-left':getScaled(getItemData(a,'padding-left')),});if(a.is('input')||a.is('button')||a.text().trim().length){a.css({'line-height':getScaled(getItemData(a,'line-height'))+'px','letter-spacing':getScaled(getItemData(a,'letter-spacing')),'font-size':getScaled(getItemData(a,'font-size')),})}else{a.css({'width':getScaled(getItemData(a,'width')),'height':getScaled(getItemData(a,'height')),})}}function setScale(){var a=o.width();var b=n.startWidth;if(a>=b||!n.responsive){E=1}else{E=a/b}}function getScaled(a){return a*E}function play(){if(n.automaticSlide){loopSlides()}else{executeSlide(u)}y=false}function stop(c){for(var i=0;i<A.length;i++){A[i].clear()}for(var i=0;i<B.length;i++){B[i].clear()}z.clear();getSlides().each(function(){var b=$(this);if(c){b.finish()}else{b.stop(true,true)}b.find(s).each(function(){var a=$(this);if(c){a.finish()}else{a.stop(true,true)}})});resetProgressBar()}function pause(){if(!v&&w){n.beforePause();var a=o.find(p).find('.ws-progress-bar');a.stop(true);z.pause();v=true}}function resume(){if(v&&w){n.beforeResume();var a=o.find(p).find('.ws-progress-bar');var b=getItemData(getSlide(u),'time');var c=z.getRemaining();a.animate({'width':'100%',},c);z.resume();v=false}}function getWidth(){return o.find(p).width()}function getHeight(){return o.find(p).height()}function getNextSlide(){if(u+1==t){return 0}return u+1}function getPreviousSlide(){if(u-1<0){return t-1}return u-1}function getItemData(a,b){var c;if(a.parent('ul').hasClass('ws-slides')){c=true}else{c=false}switch(b){case'ease-in':if(c){return isNaN(parseInt(a.data(b)))?n.slidesEaseIn:parseInt(a.data(b))}else{return isNaN(parseInt(a.data(b)))?n.elementsEaseIn:parseInt(a.data(b))}break;case'ease-out':if(c){return isNaN(parseInt(a.data(b)))?n.slidesEaseOut:parseInt(a.data(b))}else{return isNaN(parseInt(a.data(b)))?n.elementsEaseOut:parseInt(a.data(b))}break;case'delay':return isNaN(parseInt(a.data(b)))?n.elementsDelay:parseInt(a.data(b));break;case'time':if(c){return isNaN(parseInt(a.data(b)))?n.slidesTime:parseInt(a.data(b))}else{if(a.data(b)=='all'){return'all'}else{return isNaN(parseInt(a.data(b)))?n.itemsTime:parseInt(a.data(b))}}break;case'ignore-ease-out':if(parseInt(a.data(b))==1){return true}else if(parseInt(a.data(b))==0){return false}return n.ignoreElementsEaseOut;break;case'autoplay':if(parseInt(a.data(b))==1){return true}else if(parseInt(a.data(b))==0){return false}return n.videoAutoplay;break;case'loop':if(parseInt(a.data(b))==1){return true}else if(parseInt(a.data(b))==0){return false}return n.videoLoop;break;case'top':case'left':case'width':case'height':case'padding-top':case'padding-right':case'padding-bottom':case'padding-left':case'line-height':case'letter-spacing':case'font-size':return isNaN(parseFloat(a.data(b)))?0:parseFloat(a.data(b));break;case'in':case'out':case'opacity':case'delay':return a.data(b);break;default:return false;break}}function getSlides(){return o.find(p).find(q).find(r)}function getSlide(a){return getSlides().eq(a)}function Timer(a,b){var c;var d;var e=b;this.pause=function(){clearTimeout(c);e-=new Date()-d};this.resume=function(){d=new Date();clearTimeout(c);c=window.setTimeout(function(){a()},e)};this.clear=function(){clearTimeout(c)};this.getRemaining=function(){return e};this.resume()}function isMobile(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)}function loopSlides(){executeSlide(u).done(function(){if(!v){u=getNextSlide();loopSlides()}})}function drawProgressBar(){var a=o.find(p).find('.ws-progress-bar');resetProgressBar();a.animate({'width':'100%',},getItemData(getSlide(u),'time'))}function resetProgressBar(){var a=o.find(p).find('.ws-progress-bar');a.stop();a.css('width',0)}function setNavigationLink(){var b=o.find(p).find('.ws-navigation');var c=b.find('> .ws-slide-link');c.each(function(){var a=$(this);if(a.index()==u){a.addClass('ws-active')}else{a.removeClass('ws-active')}})}function changeSlide(a){if(a==u){return}if(w||x){stop(false);finishSlide(u,false,true).done(function(){u=a;play()})}}function executeSlide(b){n.beforeSlideStart();var c=new $.Deferred();x=false;for(var i=0;i<A.length;i++){A[i].clear()}for(var i=0;i<B.length;i++){B[i].clear()}z.clear();getSlide(b).finish();slideOut(b);getSlide(b).finish();var d=getSlide(b).find(s);d.each(function(){var a=$(this);a.finish();elementOut(a);a.finish()});setNavigationLink();runSlide(b);if(n.automaticSlide){finishSlide(b,true,true).done(function(){x=true;c.resolve()})}else{finishSlide(b,true,false).done(function(){x=true;c.resolve()})}return c.promise()}function runSlide(c){var d=getSlide(c);var e=d.find(s);var f=0;var g=false;var h=new $.Deferred();w=false;slideIn(c).done(function(){drawProgressBar();w=true;g=true;if(g&&f==e.length){h.resolve()}});e.each(function(){var a=$(this);var b=getItemData(a,'delay');B.push(new Timer(function(){elementIn(a).done(function(){if(isVideo(a)){playVideo(a)}f++;if(g&&f==e.length){h.resolve()}})},b))});return h.promise()}function finishSlide(d,e,f){var g=getSlide(d);var h=g.find(s);var i=e?getItemData(g,'time')+getItemData(g,'ease-in'):0;var j=0;var k=false;var l=new $.Deferred();h.each(function(){var a=$(this);var b=getItemData(a,'time');if(b!='all'){var c=e?b:0;if(getItemData(a,'ignore-ease-out')){j++;if(h.length==j&&k&&f){pauseVideos(d);slideOut(d);l.resolve()}}A.push(new Timer(function(){elementOut(a).done(function(){if(!getItemData(a,'ignore-ease-out')){j++;if(h.length==j&&k&&f){pauseVideos(d);slideOut(d);l.resolve()}}})},c))}});z=new Timer(function(){w=false;resetProgressBar();k=true;if(h.length==j&&k&&f){pauseVideos(d);slideOut(d);l.resolve()}if(!f){l.resolve()}else{h.each(function(){var a=$(this);var b=getItemData(a,'time');if(b=='all'){if(getItemData(a,'ignore-ease-out')){j++;if(h.length==j&&k&&f){pauseVideos(d);slideOut(d);l.resolve()}}elementOut(a).done(function(){if(!getItemData(a,'ignore-ease-out')){j++;if(h.length==j&&k&&f){pauseVideos(d);slideOut(d);l.resolve()}}})}})}},i);return l.promise()}function isVideo(a){return isYoutubeVideo(a)||isVimeoVideo(a)}function playVideo(a){if(isYoutubeVideo(a)){playYoutubeVideo(a)}else{playVimeoVideo(a)}}function pauseVideos(a){pauseYoutubeVideos(a);pauseVimeoVideos(a)}function pauseVideo(a){if(isYoutubeVideo(a)){pauseYoutubeVideo(a)}else{pauseVimeoVideo(a)}}function isYoutubeVideo(a){return a.hasClass('ws-yt-iframe')}function getYoutubePlayer(a){return C[a.attr('id')].player}function getYoutubePlayerState(a){return getYoutubePlayer(a).getPlayerState()}function playYoutubeVideo(a){if(getItemData(a,'autoplay')&&!C[a.attr('id')].played_once&&!isMobile()){getYoutubePlayer(a).playVideo()}if(getYoutubePlayerState(a)==2){getYoutubePlayer(a).playVideo()}C[a.attr('id')].played_once=true}function pauseYoutubeVideos(b){getSlide(b).each(function(){var a=$(this);a.find('.ws-yt-iframe').each(function(){pauseYoutubeVideo($(this))})})}function pauseYoutubeVideo(a){if(getYoutubePlayerState(a)==1){getYoutubePlayer(a).pauseVideo()}}function isVimeoVideo(a){return a.hasClass('ws-vimeo-iframe')}function getVimeoPlayer(a){return D[a.attr('id')].player}function playVimeoVideo(a){if(getItemData(a,'autoplay')&&!D[a.attr('id')].played_once&&!isMobile()){getVimeoPlayer(a).api('play')}if(getVimeoPlayer(a).api('paused')&&!D[a.attr('id')].ended&&D[a.attr('id')].played_once){getVimeoPlayer(a).api('play')}}function pauseVimeoVideos(b){getSlide(b).each(function(){var a=$(this);a.find('.ws-vimeo-iframe').each(function(){pauseVimeoVideo($(this))})})}function pauseVimeoVideo(a){getVimeoPlayer(a).api('pause')}function slideIn(a){var b=getSlide(a);var c=getItemData(b,'in');var d=getItemData(b,'ease-in');var e=new $.Deferred();if(b.css('display')=='block'){return e.resolve().promise()}if(y){b.css({'display':'block','top':0,'left':0,'opacity':getItemData(b,'opacity'),});return e.resolve().promise()}if(c){b.velocity('transition.'+c+'In',{duration:d,complete:function(){e.resolve()}})}else{b.css({'display':'block','top':0,'left':0,'opacity':getItemData(b,'opacity'),});e.resolve()}return e.promise()}function slideOut(a){var b=getSlide(a);var c=getItemData(b,'out');var d=getItemData(b,'ease-out');var e=new $.Deferred();if(b.css('display')=='none'){return e.resolve().promise()}switch(c){case'fade':b.animate({'opacity':0,},d,function(){b.css({'display':'none','opacity':getItemData(b,'opacity'),});e.resolve()});break;case'fadeLeft':b.animate({'opacity':0,'left':-getWidth(),},d,function(){b.css({'display':'none','opacity':getItemData(b,'opacity'),'left':0,});e.resolve()});break;case'fadeRight':b.animate({'opacity':0,'left':getWidth(),},d,function(){b.css({'display':'none','opacity':getItemData(b,'opacity'),'left':0,});e.resolve()});break;case'slideLeft':b.animate({'left':-getWidth(),},d,function(){b.css({'display':'none','left':0,});e.resolve()});break;case'slideRight':b.animate({'left':getWidth(),},d,function(){b.css({'display':'none','left':0,});e.resolve()});break;case'slideUp':b.animate({'top':-getHeight(),},d,function(){b.css({'display':'none','top':0,});e.resolve()});break;case'slideDown':b.animate({'top':getHeight(),},d,function(){b.css({'display':'none','top':0,});e.resolve()});break;default:b.css({'display':'none',});e.resolve();break}return e.promise()}function elementIn(a){var b=a.outerWidth();var c=a.outerHeight();var d=getItemData(a,'in');var e=getItemData(a,'ease-in');var f=getItemData(a,'delay');var g=getItemData(a,'top');var h=getItemData(a,'left');var i=new $.Deferred();if(a.css('display')=='block'){return i.resolve().promise()}if(d!=""){a.velocity('transition.'+d+'In',{duration:e,delay:f,complete:function(){i.resolve()}})}else{a.css({'display':'block','top':getScaled(g+getLayoutGaps(a).top),'left':getScaled(h+getLayoutGaps(a).left),'opacity':getItemData(a,'opacity'),});i.resolve()}return i.promise()}function elementOut(a){var b=a.outerWidth();var c=a.outerHeight();var d=getItemData(a,'out');var e=getItemData(a,'ease-out');var f=getItemData(a,'delay');var g=new $.Deferred();if(a.css('display')=='none'){return g.resolve().promise()}if(d){a.velocity('transition.'+d+'Out',{duration:e,delay:f,complete:function(){g.resolve()}})}else{a.css({'display':'none',});g.resolve()}return g.promise()}this.resume=function(){resume()};this.pause=function(){pause()};this.nextSlide=function(){changeSlide(getNextSlide())};this.previousSlide=function(){changeSlide(getPreviousSlide())};this.changeSlide=function(a){changeSlide(a)};this.getCurrentSlide=function(){return u};this.getTotalSlides=function(){return t}};$.fn.wojoSlider=function(b){var c=$(this).data('wslider');var d=$.extend({layout:'full-width',responsive:true,startWidth:1920,startHeight:500,pauseOnHover:true,automaticSlide:true,showControls:true,showNavigation:true,showProgressBar:true,theme:'standard',hasThumbs:false,enableSwipe:true,slidesTime:3000,elementsDelay:0,elementsTime:'all',slidesEaseIn:300,elementsEaseIn:300,slidesEaseOut:300,elementsEaseOut:300,ignoreElementsEaseOut:false,videoAutoplay:false,videoLoop:false,beforeStart:function(){},beforeSetResponsive:function(){},beforeSlideStart:function(){},beforePause:function(){},beforeResume:function(){},},b);return this.each(function(){if(undefined==$(this).data('wojoSlider')){var a=new $.WojoSlider(this,d);$(this).data('wojoSlider',a)}})}})(jQuery);