/*
* Created and developed by Red Cubez Inc.
* http://www.redcubez.com
*/

$(document).ready(function(event){
    // jQuery code
    var $body = $('body');
    var $background = $('.background-overlay');
    var $menu = $('.static-menu-wrapper');
    var $menuItems = $(document).find('.menu-item-static');
    var $searchWrapper = $('.search-wrapper');
    var $searchFormWrapper = $('.search-form-wrapper');
    var $searchSuggestionList = $('.search-suggestions-list');
    var $searchSuggestionItems = $searchSuggestionList.children('li');

    function displaySearch() {
        if(! $body.hasClass('search-on')) {
            $body.addClass('search-on');

            //add background to searchbar on top in hompage
            document.getElementById("nav-background").style.display = 'block';
            //if not on homepage addbackground to top nav searchbar
            if($('.homepage').attr('class')!= 'homepage')
            {
              $('.main_h').addClass('addbackground');
            }
            //if on homepage set the opacity of jumbotron so it does not confilct with nav background
            if(document.getElementById('home'))
            {
              document.getElementById('home').style.opacity = '1';
            }
            //hide scroll
            $body.addClass('hide-scroll');
            // Fade out the menu items
            $menu.velocity({
                opacity: 0
            }, {
                duration:500,
                easing: [20]
            });
            $menuItems.velocity({
                opacity: 0,
                scale: 0.70
            }, {
                duration: 210,
                easing: [20]
            });
            // Display background overlay
            $background.velocity({
                opacity: 1
            }, {
                duration: 50,
                easing: "easeInQuad",
                display: "block"
            });
            // Display the search
            $searchWrapper.addClass('search-displayed');
            $searchWrapper.velocity({
                opacity: 1
            }, {
                duration: 500
            });
            $searchFormWrapper.velocity({
                left: '10px',
                opacity:1
            }, {
                duration: 600,
                easing: 'easeOutSine',
                delay: 175
            });
            $searchSuggestionItems.velocity('transition.expandIn', {
                duration: 200,
                stagger: 25
            });
            // Change search icon to x
            $('#search').html('<i class="fa fa-close" id="search-close"></i>');
        } else {
            $body.removeClass('search-on');

            if($('.homepage').attr('class')!= 'homepage')
            {
              $('.main_h').removeClass('addbackground');
            }
            document.getElementById("nav-background").style.display = 'none';
            if(document.getElementById('home'))
            {
              document.getElementById('home').style.opacity = '0.8';
            }
            $body.removeClass('hide-scroll');

            $searchWrapper.velocity({
              right:'10px',
              opacity:0
            },{
              duration:600,
              easing:'easeOutSine',
              delay:175
            });
            $menu.velocity('reverse');
            $menuItems.velocity({opacity: 1, scale: 1}, {
                duration: 800,
                easing: [20],
                stagger: 100
            });
            $background.velocity('reverse');
            $searchFormWrapper.velocity('reverse');
            $searchWrapper.removeClass('search-displayed');
            $searchWrapper.add($searchSuggestionItems).velocity('reverse');
            $('#search').html('<i class="fa fa-search" ></i>');
        }

    }

    $("#search").on('click', function(){
        displaySearch();
    });
    $("#search-close").on('click', function(){
        displaySearch();
    });

    function displaySearchInto() {
        if(! $body.hasClass('search-on')) {
            $body.addClass('search-on');
            //set the main_h2 to main_h when search is clicked on top
            $('.main_h').addClass('1');
            $('.main_h').removeClass('main_h');
            $('.main_h2').addClass('main_h').addClass('sticky');
            $('.main_h2').removeClass('main_h2');
            //show logo
            document.getElementById("hide").style.display = 'block';
            //add background
            document.getElementById("nav-background").style.display = 'block';
            //remove scroll
            $body.addClass('hide-scroll');
            // Fade out the menu items
            $menu.velocity({
                opacity: 0
            }, {
                duration:195,
                easing: [20]
            });
            $menuItems.velocity({
                opacity: 0,
                scale: 0.70
            }, {
                duration: 210,
                easing: [20]
            });
            // Display background overlay
            $background.velocity({
                opacity: 1
            }, {
                duration: 50,
                easing: "easeInQuad",
                display: "block"
            });
            // Display the search
            $searchWrapper.addClass('search-displayed');
            $searchWrapper.velocity({
                opacity: 1
            }, {
                duration: 200
            });
            $searchFormWrapper.velocity({
                left: '10px',
                opacity:1
            }, {
                duration: 600,
                easing: 'easeOutSine',
                delay: 175
            });
            $searchSuggestionItems.velocity('transition.expandIn', {
                duration: 200,
                stagger: 25
            });
            // Change search icon to x
            $('#search-into').html('<i class="fa fa-close" id ="search-into-close"></i>');
        } else {
            $body.removeClass('search-on');

            $('.main_h').addClass('main_h2');
            $('.main_h').removeClass('sticky').removeClass('main_h');
            $('.1').addClass('main_h');
            $('.1').removeClass('1');
            document.getElementById("hide").style.display = 'none';
            document.getElementById("nav-background").style.display = 'none';
            $body.removeClass('hide-scroll');
            $searchWrapper.velocity({
              right:'10px',
              opacity:0
            },{
              duration:600,
              easing:'easeOutSine',
              delay:175
            });
            $menu.velocity('reverse');
            $menuItems.velocity({opacity: 1, scale: 1}, {
                duration: 200,
                easing: [20],
                stagger: 100
            });
            $background.velocity('reverse');
            $searchFormWrapper.velocity('reverse');
            $searchWrapper.removeClass('search-displayed');
            $searchWrapper.add($searchSuggestionItems).velocity('reverse');
            $('#search-into').html('<i class="fa fa-search"></i>');
        }

    }
    $("#search-into").on('click', function(){
        displaySearchInto();
    });
    $("#search-into-close").on('click', function(){
        displaySearchInto();
    });
});
/* Full screen Navigation
 -------------------------------------------------------*/
$('#nav-icon, .overlay-menu').on("click", function(){
    $('#nav-icon').toggleClass('open');
    $('#overlay').toggleClass('open');
});
$('#nav-icon2, .overlay-menu').on("click", function(){
    $('#nav-icon2').toggleClass('open');
    $('#overlay2').toggleClass('open');
});

// Closes the Responsive Menu on Menu Item Click
function initOnepagenav(){

    $('.navigation-overlay .navbar-collapse ul li a, .nav-type-4 .navbar-collapse ul li a').on('click',function() {
        $('.navbar-toggle:visible').click();
    });

    // Smooth Scroll Navigation
    $('.local-scroll').localScroll({offset: {top: -60},duration: 1500,easing:'easeInOutExpo'});
    $('.local-scroll-no-offset').localScroll({offset: {top: 0},duration: 1500,easing:'easeInOutExpo'});
}

/* Overlay Menu
 -------------------------------------------------------*/
$(document).ready(function(){
    $("#nav-icon").click(function(){
        $(".overlay").fadeToggle(200);
        $(this).toggleClass('btn-open').toggleClass('btn-close');
        if($('#nav-icon').hasClass('btn-close')) {
          document.documentElement.style.overflow=document.body.style.overflow='hidden';
        }
        else
        {
          document.documentElement.style.overflow=document.body.style.overflow='visible';
        }
    });

});
$(document).ready(function(){
    $("#nav-icon2").click(function(){
        $(".overlay2").fadeToggle(200);
        $(this).toggleClass('btn-open').toggleClass('btn-close');
        if($('#nav-icon2').hasClass('btn-close')) {
          document.documentElement.style.overflow=document.body.style.overflow='hidden';
        }
        else
        {
          document.documentElement.style.overflow=document.body.style.overflow='visible';
        }
    });
});
$('.overlay').on('click', function(){
    $(".overlay").fadeToggle(200);
    $("#nav-icon").toggleClass('btn-close').toggleClass('btn-open');
    $('#nav-icon').toggleClass('open');
    $("#nav-icon a").toggleClass('btn-open').toggleClass('btn-close');
    if($('#nav-icon').hasClass('btn-open')) {
      document.documentElement.style.overflow=document.body.style.overflow='visible';
    }
    open = false;
});
$('.overlay2').on('click', function(){
    $(".overlay2").fadeToggle(200);
    $("#nav-icon2").toggleClass('btn-close').toggleClass('btn-open');
    $('#nav-icon2').toggleClass('open');
    $("#nav-icon2 a").toggleClass('btn-open').toggleClass('btn-close');
    if($('#nav-icon2').hasClass('btn-open')) {
      document.documentElement.style.overflow=document.body.style.overflow='visible';
    }
    open = false;
});

/* Client logos slider -------------*/
$(document).ready(function() {
    $('.slider').slick({
        centerMode: false,
        centerPadding: '160px',
        margin:'130px',
        slidesToShow: 5,
        slidesToScroll: 5,
        speed: 1500,
        index: 2,
        focusOnSelect:true,
        dots:true,
        prevArrow: false,
        nextArrow: false,
        infinite: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },{
            breakpoint: 991,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },{
            breakpoint: 767,
            settings: {
                arrows: false,
                centerMode: false,
                dots:false,
                centerPadding: '40px',
                slidesToShow: 2,
                slidesToScroll: 2,
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: false,
                dots:false,
                centerPadding: '40px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
});
