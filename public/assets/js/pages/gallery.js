(function($) {
    "use strict";
    var getname = function (a) {
        var name_category = a.getAttribute("data-category");
        $('#gallery-title').html(name_category);
        $('.gallery-nav .btn.btn-primary span').html(name_category);
        $('.gallery-nav #filters').removeClass('in');
    };

    $(function () {
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'masonry',
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function () {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            // show if name ends with -ium
            ium: function () {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };
        // bind filter button click
        $('.filters-button-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $grid.isotope({filter: filterValue});
        });
        // change is-checked class on buttons
        $('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
        $(window).on('resize load', function () {
            if ($(window).width() < 768) {
                $('.gallery-nav #filters').addClass('collapse');
                $('.gallery-nav #filters').html('<div class="filter-inner"><button data-filter="*" data-category="all" onclick="getname(this)" class="btn btn-white-blue-2 btn-all is-checked"><span>all</span></button><button data-filter=".apartment" data-category="apartment" onclick="getname(this)" class="btn btn-white-blue-2"><span>apartment</span></button><button data-filter=".condo" data-category="condo" onclick="getname(this)" class="btn btn-white-blue-2"><span>Condo</span></button><button data-filter=".cottage" data-category="cottage" onclick="getname(this)" class="btn btn-white-blue-2"><span>Cottage</span></button><button data-filter=".familyhome" data-category="family home" onclick="getname(this)" class="btn btn-white-blue-2"><span>Family Home</span></button><button data-filter=".singlehome" data-category="single home" onclick="getname(this)" class="btn btn-white-blue-2"><span>Single Home</span></button><button data-filter=".farmhouse" data-category="farm house" onclick="getname(this)" class="btn btn-white-blue-2"><span>Farm House</span></button><button data-filter=".bungalow" data-category="bungalow" onclick="getname(this)" class="btn btn-white-blue-2"><span>Bungalow</span></button><button data-filter=".mansion" data-category="mansion" onclick="getname(this)" class="btn btn-white-blue-2"><span>Mansion</span></button><button data-filter=".villa" data-category="villa" onclick="getname(this)" class="btn btn-white-blue-2"><span>Villa</span></button><button data-filter=".longhouse" data-category="long house" onclick="getname(this)" class="btn btn-white-blue-2"><span>Long House</span></button><button data-filter=".barndominium" data-category="barndominium" onclick="getname(this)" class="btn btn-white-blue-2"><span>Barndominium</span></button><button data-filter=".colonial" data-category="colonial" onclick="getname(this)" class="btn btn-white-blue-2"><span>Colonial</span></button></div>');
            } else {
                $('.gallery-nav #filters').removeClass('collapse');
                $('.gallery-nav #filters').html('<div class="general"><button data-filter="*" data-category="all" onclick="getname(this)" class="btn btn-white-blue-2 btn-all is-checked"><span>all</span></button></div><div class="specific"><button data-filter=".apartment" data-category="apartment" onclick="getname(this)" class="btn btn-white-blue-2"><span>apartment</span></button><button data-filter=".condo" data-category="condo" onclick="getname(this)" class="btn btn-white-blue-2"><span>Condo</span></button><button data-filter=".cottage" data-category="cottage" onclick="getname(this)" class="btn btn-white-blue-2"><span>Cottage</span></button><button data-filter=".familyhome" data-category="family home" onclick="getname(this)" class="btn btn-white-blue-2"><span>Family Home</span></button><button data-filter=".singlehome" data-category="single home" onclick="getname(this)" class="btn btn-white-blue-2"><span>Single Home</span></button><button data-filter=".farmhouse" data-category="farm house" onclick="getname(this)" class="btn btn-white-blue-2"><span>Farm House</span></button><button data-filter=".bungalow" data-category="bungalow" onclick="getname(this)" class="btn btn-white-blue-2"><span>Bungalow</span></button><button data-filter=".mansion" data-category="mansion" onclick="getname(this)" class="btn btn-white-blue-2"><span>Mansion</span></button><button data-filter=".villa" data-category="villa" onclick="getname(this)" class="btn btn-white-blue-2"><span>Villa</span></button><button data-filter=".longhouse" data-category="long house" onclick="getname(this)" class="btn btn-white-blue-2"><span>Long House</span></button><button data-filter=".barndominium" data-category="barndominium" onclick="getname(this)" class="btn btn-white-blue-2"><span>Barndominium</span></button><button data-filter=".colonial" data-category="colonial" onclick="getname(this)" class="btn btn-white-blue-2"><span>Colonial</span></button></div>');
            }
        });
        // get category name
        $(document).on('click',function (event) {
            var clickover = $(event.target);
            var _opened = $(".gallery-nav #filters").hasClass("collapse in");
            if (_opened === true) {
                $(".gallery-nav .btn-primary").click();
            }
        });

    });

})(jQuery);