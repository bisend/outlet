
$( document ).ready(function() {
    let objToStick = $(".category-nav");
    let topOfObjToStick = $(objToStick).offset().top;

    $(window).scroll(function () {
        let windowScroll = $(window).scrollTop();
        if (windowScroll > topOfObjToStick) {
            $(objToStick).addClass("topWindow");
            $('.after-header-mrg').show();
        } else {
            $('.after-header-mrg').hide();
            $(objToStick).removeClass("topWindow");
        }
    });
});