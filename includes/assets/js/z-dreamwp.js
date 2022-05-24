(function ($) {
"use strict";

    var DreamwpGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function() {
            $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
        });
        // Js End

    };

    var SliderOne = function ($scope, $) {
        $scope.find('.projectSlider-area').each(function () {
            // Js Start
            var sliderSelector2 = new Swiper(".projectSwiper-container", {
                loop: true,
                speed: 800,
                autoplay: true,
                slidesPerView: 2, // or 'auto'
                // spaceBetween: 10,
                centeredSlides: true,
                effect: "coverflow", // 'cube', 'fade', 'coverflow',
                coverflowEffect: {
                    rotate: 0, // Slide rotate in degrees
                    stretch: 400, // Stretch space between slides (in px)
                    depth: 100, // Depth offset in px (slides translate in Z axis)
                    modifier: 1, // Effect multipler
                    slideShadows: true, // Enables slides shadows
                },
                grabCursor: true,
                parallax: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1180: {
                        slidesPerView: 2,
                    },
                    1023: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                },
            });
            // Js End
        });
    };

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', DreamwpGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider1.default', SliderOne);
        }
        else {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', DreamwpGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider1.default', SliderOne);
        }
    });
console.log('addon js loaded');
})(jQuery);