/* RIGHT slide bar */

function openNavRight(e) {
    $('body').addClass('body-fix');
    $('.mobile-nav-bg').fadeIn(300);

    // $('#filters-mobile').animate({
    //     marginRight: '0px'
    // }, 250, 'swing');

    $('#filters-mobile').removeClass('hideFilters').addClass('showFilters');
    $('#selected-filters-mobile').removeClass('hideFilters').addClass('showFilters');
}

function closeNavRight(e) {
    $('body').removeClass('body-fix');
    $('.mobile-nav-bg').fadeOut(300);

    // $('#filters-mobile').animate({
    //     marginRight: '-290px'
    // }, 250, 'swing');

    $('#filters-mobile').removeClass('showFilters').addClass('hideFilters');
    $('#selected-filters-mobile').removeClass('showFilters').addClass('hideFilters');
}

$(document).ready(function () {
    let menuOpenLinkRight = '[data-menu-open-link-right]',
        menuCloseLinkRight = '[data-menu-close-link-right]',
        isMenuOpenedRight = false;

    $('body').on('click', menuOpenLinkRight, function (e) {
        e.stopPropagation();
        openNavRight(e);

        isMenuOpenedRight = true;
    });

    $('body').on('click', menuCloseLinkRight, function (e) {
        e.stopPropagation();
        closeNavRight(e);

        isMenuOpenedRight = false;
    });

    $(document).on('click', 'body', function (e) {
        let $targetR = $(e.target);

        // if (isMenuOpenedRight &&
        //     (($targetR.attr('id') != 'selected-filters-mobile' && $targetR.closest('#selected-filters-mobile').length === 0) ||
        //         ($targetR.attr('id') != 'filters-mobile' && $targetR.closest('#filters-mobile').length === 0))) {
        //
        //     closeNavRight(e);
        //
        //     isMenuOpenedRight = false;
        // }
        if (isMenuOpenedRight && $targetR.hasClass('mobile-nav-bg')) {

            closeNavRight(e);

            isMenuOpenedRight = false;
        }
    });
});

$(window).resize(function(){
    $('#filters-mobile').removeClass('hideFilters').removeClass('showFilters');
    $('#selected-filters-mobile').removeClass('hideFilters').removeClass('showFilters');
});

/* RIGHT slide bar END */