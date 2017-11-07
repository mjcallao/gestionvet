(function ($) {
    "use strict";
    $(function() {

        $('.banner-06').slick({
            dots: true,
            speed: 700,
            fade: true,
            autoplay: true,
            autoplaySpeed: 7000,
            cssEase: 'linear',
            pauseOnHover: false
        });

        $('.banner-06').on('afterChange', function(event, slick, currentSlide){
            $('.slick-active  .wrapper-title').addClass('animatied fadeInDown');
            $('.slick-active  .content').addClass('animatied fadeInUp');
            $('.slick-active  .text-left').addClass('animatied fadeInLeft');
            $('.slick-active  .text-right').addClass('animatied fadeInRight');
            $('.slick-active  .wrapper-title').removeClass('hidden');
            $('.slick-active  .content').removeClass('hidden');
            $('.slick-active  .text-left').removeClass('hidden');
            $('.slick-active  .text-right').removeClass('hidden');
        });

        $('.banner-06').on('beforeChange', function(event, slick, currentSlide){
            $('.slick-active  .wrapper-title').removeClass('animatied fadeInDown');
            $('.slick-active  .content').removeClass('animatied fadeInUp');
            $('.slick-active  .text-left').removeClass('animatied fadeInLeft');
            $('.slick-active  .text-right').removeClass('animatied fadeInRight');
            $('.slick-active  .wrapper-title').addClass('hidden');
            $('.slick-active  .content').addClass('hidden');
            $('.slick-active  .text-left').addClass('hidden');
            $('.slick-active  .text-right').addClass('hidden');
        });

        // efect for banner flip
        $('.banner-flip-item .banner-font').on('click',function(){
            $(this).parent().addClass('applyflip');
        });
        $('.banner-flip-item').on('mouseleave', function(){
            $(this).removeClass('applyflip');
        })


        // INITIALIZE ISOTOPE WHEN NEWTAB ACTIVE
        $('.picture-gallery-wrapper a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.grid').isotope({
                itemSelector: '.grid-items',
                masonry: {
                    columnWidth: '.grid-items'
                }
            });
        });

        // GALLERY ISSOTOPE
        var shw_gallery_picture = function() {
            $('.grid').isotope({
                itemSelector: '.grid-items',
                masonry: {
                    columnWidth: '.grid-items'
                }
            });

        };


        $(window).load(function() {
            shw_gallery_picture()
        });
    });
})(jQuery);