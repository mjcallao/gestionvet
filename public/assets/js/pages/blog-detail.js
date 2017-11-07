(function ($) {
    "use strict";
    $(function(){
        // ----------------------- SCROLL TO --------------------------- //
        // comment-scroll
        $('.btn-crystal').on('click', function() {
            $('body, html').animate({
                scrollTop: $('.leave-comment').offset().top
            }, 1500);
            return false;
        });
    });
})(jQuery);