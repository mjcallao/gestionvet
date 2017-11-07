(function($) {
    "use strict";

    $(function () {
         //$('.btn-list').on('click', list);
         //$('.btn-list').trigger(list());
        // ----------------------- PROPERTY LIST / GIRD --------------------------- //
        // change property view
        $('.btn-grid').on('click', grid);
        $('.btn-list').on('click', list);
        function list() {
            $('.property-content').addClass('list-view');
            $('.btn-grid').removeClass('active');
            $('.btn-list').addClass('active');
            $('.lst-item').removeClass('nodisplay');
            $('.grd-item').addClass('nodisplay');
            $('#loading').show();
            setTimeout(function() { $('#loading').hide();}, 300);
            $('.btn-list').off('click');
            $('.btn-grid').on('click', grid);
        };
        function grid() {
            $('.property-content').removeClass('list-view');
            $('.btn-grid').addClass('active');
            $('.btn-list').removeClass('active');
            $('.lst-item').addClass('nodisplay');
            $('.grd-item').removeClass('nodisplay');
            $('#loading').show();
            setTimeout(function() { $('#loading').hide();}, 300);
            $('.btn-grid').off('click');
            $('.btn-list').on('click', list);
        };
    });


})(jQuery);