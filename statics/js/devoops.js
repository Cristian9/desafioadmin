//
//    Main script of DevOOPS v1.0 Bootstrap Theme
//
"use strict";

var app = (function() {
    function resetTables() {
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnClearTable();
            $(this).dataTable().fnDestroy();
        });
    }

    function base64_encode(stringToEncode) {
        // eslint-disable-line camelcase
        //  discuss at: http://locutus.io/php/base64_encode/
        // original by: Tyler Akins (http://rumkin.com)
        // improved by: Bayron Guevara
        // improved by: Thunder.m
        // improved by: Kevin van Zonneveld (http://kvz.io)
        // improved by: Kevin van Zonneveld (http://kvz.io)
        // improved by: Rafał Kukawski (http://blog.kukawski.pl)
        // bugfixed by: Pellentesque Malesuada
        //   example 1: base64_encode('Kevin van Zonneveld')
        //   returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
        //   example 2: base64_encode('a')
        //   returns 2: 'YQ=='
        //   example 3: base64_encode('✓ à la mode')
        //   returns 3: '4pyTIMOgIGxhIG1vZGU='

        if (typeof window !== 'undefined') {
            if (typeof window.btoa !== 'undefined') {
                return window.btoa(escape(encodeURIComponent(stringToEncode)));
            }
        } else {
            return new Buffer(stringToEncode).toString('base64');
        }

        var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
        var o1;
        var o2;
        var o3;
        var h1;
        var h2;
        var h3;
        var h4;
        var bits;
        var i = 0;
        var ac = 0;
        var enc = '';
        var tmpArr = [];

        if (!stringToEncode) {
            return stringToEncode;
        }

        stringToEncode = unescape(encodeURIComponent(stringToEncode));

        do {
            // pack three octets into four hexets
            o1 = stringToEncode.charCodeAt(i++);
            o2 = stringToEncode.charCodeAt(i++);
            o3 = stringToEncode.charCodeAt(i++);

            bits = o1 << 16 | o2 << 8 | o3;

            h1 = bits >> 18 & 0x3f;
            h2 = bits >> 12 & 0x3f;
            h3 = bits >> 6 & 0x3f;
            h4 = bits & 0x3f;

            // use hexets to index into b64, and append result to encoded string
            tmpArr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
        } while (i < stringToEncode.length)

        enc = tmpArr.join('');

        var r = stringToEncode.length % 3;

        return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
    }



    function LoadAjaxContent(url) {
        //$('.preloader').show();
        $.ajax({
            mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
            url: url,
            type: 'GET',
            success: function(data) {
                $('#ajax-content').html(data);
                $('.preloader').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            },
            dataType: "html",
            async: false
        });
    }

    return {
      base64_encode : base64_encode,
      LoadAjaxContent : LoadAjaxContent,
      resetTables : resetTables
    }
})();

String.prototype.ucfirst = function() {
    return this.charAt(0).toUpperCase() + this.substr(1);
};

String.prototype.lcfirst = function() {
    return this.charAt(0).toLowerCase() + this.substr(1);
};



//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
//
//      MAIN DOCUMENT READY SCRIPT OF DEVOOPS THEME
//
//      In this script main logic of theme
//
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
$(document).ready(function() {
    $('body').on('click', '.show-sidebar', function(e) {
        e.preventDefault();
        $('div#main').toggleClass('sidebar-show');
        setTimeout(MessagesMenuWidth, 250);
    });
    var ajax_url = location.hash.replace(/^#/, '');
    if (ajax_url.length > 1) {
        app.LoadAjaxContent(ajax_url);
    }

    $('.main-menu').on('click', 'a', function(e) {
        var parents = $(this).parents('li');

        //var li = $(this).closest('li.dropdown');
        var another_items = $('.main-menu li').not(parents);
        another_items.find('a').removeClass('active');
        another_items.find('a').removeClass('active-parent');
        if ($(this).hasClass('dropdown-toggle') || $(this).closest('li').find('ul').length == 0) {
            $(this).addClass('active-parent');
            var current = $(this).next();
            if (current.is(':visible')) {
                li.find("ul.dropdown-menu").slideUp('fast');
                li.find("ul.dropdown-menu a").removeClass('active')
            } else {
                another_items.find("ul.dropdown-menu").slideUp('fast');
                current.slideDown('fast');
            }
        } else {
            if (li.find('a.dropdown-toggle').hasClass('active-parent')) {
                var pre = $(this).closest('ul.dropdown-menu');
                pre.find("li.dropdown").not($(this).closest('li')).find('ul.dropdown-menu').slideUp('fast');
            }
        }
        if ($(this).hasClass('active') == false) {
            $(this).parents("ul.dropdown-menu").find('a').removeClass('active');
            $(this).addClass('active')
        }
        if ($(this).hasClass('ajax-link')) {
            e.preventDefault();
            if ($(this).hasClass('add-full')) {
                $('#content').addClass('full-content');
            } else {
                $('#content').removeClass('full-content');
            }
            var url = $(this).attr('href');
            window.location.hash = url;
            app.LoadAjaxContent(url);
        }
        /*if ($(this).attr('href') == '#') {
        	e.preventDefault();
        }*/
    });
    var height = window.innerHeight - 49;
    $('#main').css('min-height', height).on('click', '.expand-link', function(e) {
        var body = $('body');
        e.preventDefault();
        var box = $(this).closest('div.box');
        var button = $(this).find('i');
        button.toggleClass('fa-expand').toggleClass('fa-compress');
        box.toggleClass('expanded');
        body.toggleClass('body-expanded');
        var timeout = 0;
        if (body.hasClass('body-expanded')) {
            timeout = 100;
        }
        setTimeout(function() {
            box.toggleClass('expanded-padding');
        }, timeout);
        setTimeout(function() {
            box.resize();
            box.find('[id^=map-]').resize();
        }, timeout + 50);
    })
    .on('click', '.collapse-link', function(e) {
        e.preventDefault();
        var box = $(this).closest('div.box');
        var button = $(this).find('i');
        var content = box.find('div.box-content');
        content.slideToggle('fast');
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        setTimeout(function() {
            box.resize();
            box.find('[id^=map-]').resize();
        }, 50);
    })
    .on('click', '.close-link', function(e) {
        e.preventDefault();
        var content = $(this).closest('div.box');
        content.remove();
    });
});
