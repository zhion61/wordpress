jQuery(document).ready(function ($) {
    if (tm_data.rtl == '1') {
        rtl = !0;
        nrtl = 'rtl';
    } else {
        rtl = !1;
        nrtl = 'ltr';
    }
    
    $(".top-news-slide").owlCarousel({
        items       : 8,
        autoplay   : true,
        loop       : true,
        nav   : true,
        margin  : 10,
        dots      : false, 
        mouseDrag : false,
        rtl        : rtl,
        responsive : {
            0 : {
                items: 2,
            },
            769 : {
                items: 5,
            },
            993 : {
                items: 8,
            }
        } 
    });

    $("#featured-news-slide").owlCarousel({
        autoPlay: !1,
        stopOnHover: !1,
        itemsDesktop: !1,
        itemsDesktopSmall: [981, 2],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        slideSpeed: 1500,
        responsive: {
            800: {
                items: 3
            },
            0: {
                items: 1
            }
        },
        nav: !0,
        navText: ["prev", "next"],
        mouseDrag: !1,
        addClassActive: !1,
        lazyLoad: !0,
        rtl: rtl
    });
});
