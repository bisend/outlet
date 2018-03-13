
$( document ).ready(function() {
    var objToStick = $(".category-nav");
    var topOfObjToStick = $(objToStick).offset().top;

    $(window).scroll(function () {
        var windowScroll = $(window).scrollTop();
        if (windowScroll > topOfObjToStick) {
            $(objToStick).addClass("topWindow");
            $('.after-header-mrg').show();
        } else {
            $('.after-header-mrg').hide();
            $(objToStick).removeClass("topWindow");
        }
    });
});