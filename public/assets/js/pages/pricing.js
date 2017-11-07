(function($) {
    "use strict";
    $(window).load(function() {
        $('.pricing-table-wrapper').owlCarousel({
            loop: true,
            margin: 40,
            autoplay:true,
            autoplayTimeout:7000,
            nav:true,
            navText: ['&#10094;', '&#10095;'],
            responsiveClass:true,
            touch: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2,
                    margin: 15
                },
                768: {
                    items: 3,
                    margin: 20
                },
                1024: {
                    items: 3
                },
                1025: {
                    items: 4,
                    loop: false,
                    nav: false,
                    touchDrag: false,
                    mouseDrag: false
                }
            }
        });
    });

})(jQuery);