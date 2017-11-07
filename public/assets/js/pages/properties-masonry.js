$(window).load( function() {

    $('.property-masonry').isotope({
        itemSelector: '.property-item',
        layoutMode: 'masonry',
        masonry: {
            columnWidth: '.property-item'
        }
    });

});
