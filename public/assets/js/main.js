(function($) {
    "use strict";
    $(function(){
        // ----------------------- BACK TOP --------------------------- //
        $('#back-top a').on('click', function () {
            $('body,html').animate({
                scrollTop: 0
            }, 700);
            return false;
        });

        var temp = $(window).height();
        $(window).scroll(function () {
            if ($(window).scrollTop() > temp){
                $('#back-top a').addClass('show').removeClass('hide');
            }
            else {
                $('#back-top a').addClass('hide').removeClass('show');
            }
        });

        // ----------------------- HEADER JS --------------------------- //
        // add class fixed for menu when scroll
        if ($('.header-main').hasClass('header-default') || $('.header-main').hasClass('header-style2')) {
            var header_height = $('.header-main'),
                offset = header_height.offset();

            $(window).scroll(function () {
                if ($(window).scrollTop() > offset.top) {
                    $(".header-main").addClass('header-fixed');
                }
                else {
                    $(".header-main").removeClass('header-fixed');
                }
            });
        };

        // show menu when scroll up, hide menu when scroll down
        var lastScroll = 50;
        $(window).on('scroll load', function (event) {
            var st = $(this).scrollTop();
            if (st > lastScroll) {
                $('.header-main').addClass('hide-menu');
            }
            else if (st < lastScroll) {
                $('.header-main').removeClass('hide-menu');
            }
            if ($(window).scrollTop() == 0 ){
                $('.header-main').removeClass('.header-fixed').removeClass('hide-menu');
            };
            lastScroll = st;

        });

        // show dropdown menu language
        $('.language').on('click', function(){
            $('.dropdown-language').toggleClass('hide');
        });

        $('body').on('click', function(event){
            if ( $('.language').has(event.target).length == 0 && !$('.language').is(event.target)) {
                if ($('.dropdown-language').hasClass('hide') == false) {
                    $('.dropdown-language').addClass('hide');
                    //alert('xxx');
                }
            }
        });

        // menu responsive
        if ($(window).width() <= 767) {

            // show hide dropdown menu
            $('.nav-links>.dropdown>a').on('click', function(){
                if ($(this).parent().find('.dropdown-menu-1').hasClass('dropdown-focus') == true) {
                    $(this).parent().find('.dropdown-menu-1').removeClass('dropdown-focus');
                }
                else {
                    $('.nav-links .dropdown .dropdown-menu-1').removeClass('dropdown-focus');
                    $(this).parent().find('.dropdown-menu-1').addClass('dropdown-focus');
                }
            });
            $('.dropdown-menu-1 .dropdown>a').on('click', function(){
                $(this).parent().find('.dropdown-menu-2:first').toggleClass('dropdown-focus');
            });

            // show hide dropdown menu when click body
            $('body').click(function (event) {
                if (
                    $('.btn-navbar').has(event.target).length == 0 && !$('.btn-navbar').is(event.target)
                    && $('.navigation').has(event.target).length == 0 && !$('.navigation').is(event.target)
                ) {
                    if ($('.navbar-collapse').hasClass('in')) {
                        $('.btn-navbar').click();
                    }
                }

                if ( $('.nav-links').has(event.target).length == 0 && !$('.nav-links').is(event.target)) {
                    if ($('.dropdown-menu').hasClass('dropdown-focus')) {
                        $('.dropdown-menu').removeClass('dropdown-focus');
                    }
                }
            });

            $(window).scroll(function (event) {
                // hide dropdown menu when scroll
                if ($('.navbar-collapse').hasClass('in')) {
                    $('.btn-navbar').click();
                }

                // overflow scroll when screen small
                if ($(window).scrollTop() < 52) {
                    var screen_height = $(window).height() - $('.header-main').height() - $('.header-topbar').height(),
                        navigation = $('.navigation').height();
                    $('.navigation').css('max-height', screen_height - 20);
                    if (navigation > screen_height) {
                        $('.navigation').addClass('scroll-nav');
                    }
                }
                else {
                    var screen_height = $(window).height() - $('.header-main').height(),
                        navigation = $('.navigation').height();
                    $('.navigation').css('max-height', screen_height - 20);
                    if (navigation > screen_height) {
                        $('.navigation').addClass('scroll-nav');
                    }
                }

                // close dropdown sub menu
                var st2 = $(this).scrollTop();
                if (st2 > 0) {
                    //Replace this with your function call for downward-scrolling
                    $('.navigation').find('.dropdown').removeClass('open');
                };
            });
        };

        // ----------------------- SET WIDTH/HEIGHT --------------------------- //
        var screen_height = $(window).height();
        var header_height = $('header').height();
        // banner default - page 02
        $('.banner-full-screen').height(screen_height -  $('header').height());

        // banner home page 04 - page 01 - page 03
        $('.banner-full-screen-2').height(screen_height);
        $('.banner-full-screen-2').css('top',header_height*(-1));
        $('.banner-full-screen-2').css('margin-bottom',header_height*(-1));

        // banner footer 2
        $('.height-full-screen').height(screen_height);

        // set height for page contact
        $('.contact').height($('.contact-wrapper').height() - 120);

        // ----------------------- ANIMATION JS --------------------------- //
        new WOW().init();

        // ----------------------- SELECTBOX --------------------------- //
        // change style for select box
        $(".selectbox").selectbox();
 
        $('.nstSlider').nstSlider({
            "left_grip_selector": ".leftGrip",
            "right_grip_selector": ".rightGrip",
            "value_bar_selector": ".bar",
            "value_changed_callback": function(cause, leftValue, rightValue) {
                $(this).parent().find('.leftLabel').text(leftValue);
                $(this).parent().find('.rightLabel').text(rightValue);
            }
        });


        // ----------------------- SHOW FILTER --------------------------- //
        // show more filter - Search form
        $('.more-filter').on('click',function(){
            $('.more-filter').toggleClass('show-more');
            $('.more-filter .text-1').toggleClass('hide');
            $('.more-filter .text-2').toggleClass('hide');
        });


        // ----------------------- COUNT TO --------------------------- //
        // animate number
        $('.statistic-items').appear(function(){
            setTimeout(function(){
                $('.statistic-items .number').countTo();
            },700);
        });

        // ----------------------- FOOTER --------------------------- //
        // efect for footer
        //if($(window).width() > 768) {
        //    var footer_height = $('.footer-efect').height();
        //    $('#wrapper-content').css('margin-bottom', footer_height - 1);
        //}
        //else {
        //    $('#wrapper-content').css('margin-bottom', 0);
        //}

        // find browser
        if($('body').hasClass('11')){
            $('body').addClass('browser-ie');
        }

        //------------------------select 2--------------------------------- //
        $(".select-featured").select2({
            tags: true,
            tokenSeparators: [',', ' '],
        })

        // ----------------------- SLIDER SLICK --------------------------- //
        $('.near-attraction-slider').slick({
            dots: true,
            speed: 500,
            slidesToShow: 1
        });

        // ----------------------- PAGE 06 --------------------------------//

        $('.nav-infomation-wrapper').slick({
            dots: false,
            infinite: false,
            speed: 500,
            adaptiveHeight: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
            ]
        });

        $('.amenites-content').slick({
            dots: false,
            speed: 500,
            autoplay: false,
            adaptiveHeight: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

    });

    // Set height for banner full screen
    var shw_banner_full_screen = function () {
        var screen_height = $(window).height();
        var header_height = $('header').height();
        // banner default - page 02
        $('.banner-full-screen').height(screen_height -  $('header').height());

        // banner home page 04 - page 01 - page 03
        $('.banner-full-screen-2').height(screen_height);
        $('.banner-full-screen-2').css('top',header_height*(-1));
        $('.banner-full-screen-2').css('margin-bottom',header_height*(-1));

        // banner footer 2
        $('.height-full-screen').height(screen_height);

        // set height for page contact
        $('.contact').height($('.contact-wrapper').height() - 120);
    };

    // owl carousel for ....
    var shw_slider_carousel = function() {
        // owl carousel slider logos
        $('.carousel-logos').owlCarousel({
            margin: 120,
            loop: true,
            nav: false,
            autoplay:true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 20
                },
                381: {
                    items: 3,
                    margin: 30
                },
                600: {
                    items: 4,
                    margin: 50
                },
                1024: {
                    items: 5,
                    margin: 50
                },
                1025: {
                    items: 5
                }
            }
        });

        // owl carousel slider our clients said
        $('.our-clients-said .our-clients-said-content').owlCarousel({
            margin: 30,
            loop: true,
            nav: false,
            autoplay:true,
            autoplayTimeout: 7000,
            smartSpeed: 1500,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                1024: {
                    items: 2
                }
            }
        });

        // owl carousel slider
        $('.our-agents .our-agents-content').owlCarousel({
            margin: 30,
            loop: true,
            nav: false,
            autoplay:true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 2
                },
                650: {
                    items: 3
                },
                1024: {
                    items: 4
                }
            }
        });

        if ($(window).width() <= 768){
            $('.our-service-content').owlCarousel({
                margin: 0,
                loop: true,
                nav: false,
                autoplay:true,
                autoplayTimeout: 7000,
                smartSpeed: 2000,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    }
                }
            });

            $('.company-statistics-wrapper').owlCarousel({
                margin: 0,
                loop: true,
                nav: false,
                autoplay:true,
                autoplayTimeout: 7000,
                smartSpeed: 2000,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    }
                }
            });
        }
    };

    // SHOW IMAGE GALLERY
    var shw_fancybox = function(){
        $(".fancybox-button").fancybox({
            prevEffect		: 'none',
            nextEffect		: 'none',
            closeBtn		: false,
            helpers		: {
                title	: { type : 'inside' },
                buttons	: {}
            }
        });0
    };


    $(window).load(function() {
        shw_slider_carousel();
        shw_fancybox();
    });

    $(window).resize(function() {
        shw_banner_full_screen();
    });

})(jQuery);
