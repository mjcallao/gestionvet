(function($) {
    "use strict";

    // fixed nav bar scroll
    $(function() {
        var nav_locate = $('.nav-bar').offset(),
            on_top = $('.property-detail').offset();
        $(window).scroll(function() {
            var nav_scroll = $(window).scrollTop();
            if(nav_scroll > ($('.page-title').height()+$('header').height())) {
                $('.nav-bar').addClass('nav-fix');
                if($('.header-main').hasClass('hide-menu')) {
                    $('.nav-fix').css("top","0");
                }
                else {
                    $('.nav-fix').css("top",$('.header-main').height());
                }
            } else {
                $('.nav-bar').removeClass('nav-fix');
                $('.nav-bar').css("top", "0");
            };
            if(nav_scroll > $(".location").offset().top - $('.nav-bar').height()) {
                $('.nav-bar').css('top', '-200px');
            };
            if(nav_scroll < $(".condition").offset().top - $('.nav-bar').height()) {
                $('.active').removeClass('active');
                $('.on-top-btn').addClass('active');
            } else {                
                $('.active').removeClass('active');
                $('.condition-btn').addClass('active');
            }
            if(nav_scroll >= $(".description").offset().top - $('.nav-bar').height()) {
                $('.active').removeClass('active');
                $('.description-btn').addClass('active');
            };
            if(nav_scroll >= $(".location").offset().top - $('.nav-bar').height()) {
                $('.active').removeClass('active');
                $('.location-btn').addClass('active');
            };
        });
        $('.on-top-btn').on('click', function() {
            $('.active').removeClass('active');
            $('.on-top-btn').addClass('active');
            $('body,html').animate({
                scrollTop: on_top.top - $('.nav-bar').height()
            }, 1500);
            return false;
        });
        $('.condition-btn').on('click', function() {
            $('.active').removeClass('active');
            $('.condition-btn').addClass('active');
            $('body,html').animate({
                scrollTop: $(".condition").offset().top - $('.nav-bar').height()
            }, 1500);
            return false;
        });
        $('.description-btn').on('click', function() {
            $('.active').removeClass('active');
            $('.description-btn').addClass('active');
            $('body,html').animate({
                scrollTop: $(".description").offset().top - $('.nav-bar').height()
            }, 1500);
            return false;
        });
        $('.location-btn').on('click', function() {
            $('.active').removeClass('active');
            $('.location-btn').addClass('active');
            $('body,html').animate({
                scrollTop: $(".location").offset().top - $('.nav-bar').height()
            }, 1500);
            return false;
        });

        // var gallery
        $('.gallery-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.gallery-nav'
        });
        $('.slider-nav-wrapper').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            asNavFor: '.gallery-slider',
            centerMode: true,
            infinite: true,
            focusOnSelect: true
        });
    });

})(jQuery);
