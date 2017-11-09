/**
 * Created and developed by Red Cubez Inc.
 * http://www.redcubez.com
 */

(function ($) {
// grabbing the class names from the data attributes
    // var navBar = $('.navbar'),
    // data = navBar.data();
   var page = $('.homepage');
// booleans used to tame the scroll event listening a little..

    var scrolling = false,
    scrolledPast = false;

// transition Into
    function switchInto() {
        // update `scrolledPast` bool
        if(page.attr('class') == 'homepage')
        {
            scrolledPast = true;
            $('.main_h').addClass('sticky');
            $('.main_h2').hide();
            $('.hero-img').fadeOut(170);
        }
        else {
            scrolledPast = true;
            $('.main_h').addClass('addbackground');
            $('.main_h2').hide();
        }

    };

// transition Start
    function switchStart() {
        // update `scrolledPast` bool
        // add/remove CSS classes
        if(page.attr('class') == 'homepage')
        {
            scrolledPast = false;
            $('.main_h').removeClass('sticky');
            $('.main_h2').show();
            $('.hero-img').fadeIn(170);
        }
        else {
            scrolledPast = false;
            $('.main_h').removeClass('addbackground');
            $('.main_h2').show();
        }
    }

// set `scrolling` to true when user scrolls
$(window).scroll(function () {
    return scrolling = true;
});

setInterval(function () {
    // when `scrolling` becomes true...
    if (scrolling) {
        // set it back to false
        scrolling = false;
        // check scroll position
        if ($(window).scrollTop() > 30) {
            // user has scrolled > 100px from top since last check
            if (!scrolledPast) {
                switchInto();
            }
        } else {
            // user has scrolled back <= 100px from top since last check
            if (scrolledPast) {
                switchStart();
            }
        }
    }
    // take a breath.. hold event listener from firing for 100ms
}, 100);

if(page.attr('class') != 'homepage')
{
  $('.main_h2').remove();
  $('.main_h').addClass('sticky1');
}
//Sticky Header
// $(window).scroll(function() {
//
//     if ($(window).scrollTop() > 100) {
//         $('.main_h').addClass('sticky');
//     } else {
//         $('.main_h').removeClass('sticky');
//
//
//     }
// });

// Mobile Navigation
$('.main_h li a').click(function() {
    if ($('.main_h').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_h').removeClass('open-nav');
    }
});

// Navigation Scroll - ljepo radi materem
$('nav a').click(function(event) {
    var id = $(this).attr("href");
    var offset = 70;
    var target = $(id).offset().top - offset;
    $('html, body').animate({
        scrollTop: target
    }, 500);
    event.preventDefault();
});
}(jQuery));

/* Demo purposes only */
$(".hover").mouseleave(
    function () {
        $(this).removeClass("hover");
    }
);

/** Document Ready Functions **/
/********************************************************************/

$( document ).ready(function() {

    // Resive video
    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

/** Reusable Functions **/
/********************************************************************/

function scaleVideoContainer() {

    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        videoWidth,
        videoHeight;


    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width'),
            windowAspectRatio = windowHeight/windowWidth;

        if (videoAspectRatio > windowAspectRatio) {
            videoWidth = windowWidth;
            videoHeight = videoWidth * 0.5625;
            $(this).css({'top' : -(videoHeight - windowHeight) / 2 + 'px', 'margin-left' : 0});
        } else {
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
        }

        $(this).width(videoWidth).height(videoHeight);

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');


    });
}


/* ***************************
 Enable Smooth Scrolling
 Author: Chris Coyier
 URL:  CSS-Tricks.com
 ***************************** */

// Enable Smooth Scrolling ...  by Chris Coyier of CSS-Tricks.com
$('a[href*="#"]:not([href="#"]):not([href="#show"]):not([href="#hide"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});
// // poster frame click event
// $(document).on('click','.js-videoPoster',function(ev) {
//   ev.preventDefault();
//   var $poster = $(this);
//   var $wrapper = $poster.closest('.js-videoWrapper');
//   videoPlay($wrapper);
// });

// // play the targeted video (and hide the poster frame)
// function videoPlay($wrapper) {
//   var $iframe = $wrapper.find('.js-videoIframe');
//   var src = $iframe.data('src');
//   // hide poster
//   $wrapper.addClass('videoWrapperActive');
//   // add iframe src in, starting the video
//   $iframe.attr('src',src);
// }

// // stop the targeted/all videos (and re-instate the poster frames)
// function videoStop($wrapper) {
//   // if we're stopping all videos on page
//   if (!$wrapper) {
//     var $wrapper = $('.js-videoWrapper');
//     var $iframe = $('.js-videoIframe');
//   // if we're stopping a particular video
//   } else {
//     var $iframe = $wrapper.find('.js-videoIframe');
//   }
//   // reveal poster
//   $wrapper.removeClass('videoWrapperActive');
//   // remove youtube link, stopping the video from playing in the background
//   $iframe.attr('src','');
// }
