
$(document).ready(function(){
    $(".product-big-photo").owlCarousel({
        loop:false,
        margin:10,
        items:1,
        nav: false,
        dots: false
    });

    $(".product-big-photo-dots").owlCarousel({
        loop:false,
        margin:3,
        items:7,
        dots: false,
        nav: true,
        // navContainer:true,
        // dotsContainer: true,
        responsive:{
            0:{
                items:3
            },
            400:{
                items:4,
                margin:10
            },
            500:{
                items:4
            },
            700:{
                items:6
            },
            1000:{
                items:6
            },
            1200:{
                items:7
            }
        }
    });

});
