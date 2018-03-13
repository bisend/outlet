/* left slide bar */
function openNav(e) {
    $('body').addClass('body-fix');
    $('.mobile-nav-bg').fadeIn(300);


    $('#mySidenav').animate({
        marginLeft: '0px'
    }, 250, 'swing');


}

function closeNav(e) {
    $('body').removeClass('body-fix');
    $('.mobile-nav-bg').fadeOut(300);
    $('#mySidenav').animate({
        marginLeft: '-290px'
    }, 250, 'swing');

}

$(document).ready(function () {
    var menuOpenLink = '[data-menu-open-link]',
        menuCloseLink = '[data-menu-close-link]',
        isMenuOpened = false;

    $('body').on('click', menuOpenLink, function (e) {
        e.stopPropagation();
        openNav(e);

        isMenuOpened = true;
    });

    $('body').on('click', menuCloseLink, function (e) {
        e.stopPropagation();
        closeNav(e);

        isMenuOpened = false;
    });

    $(document).on('click', 'body', function (e) {
        var $target = $(e.target);

        if (isMenuOpened &&
            ($target.attr('id') != 'mySidenav' &&
            $target.closest('#mySidenav').length === 0)) {

            closeNav(e);

            isMenuOpened = false;
        }
    });
});

/* left slide bar END */