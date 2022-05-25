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
            var settings = $(this).data('dreamwp');
            // Js Start
            var sliderSelector2 = new Swiper(".projectSwiper-container", {
                loop: true,
                speed: 800,
                autoplay: true,
                slidesPerView: 'auto', // or 'auto'
                spaceBetween: 0,
                centeredSlides: true,
                effect: "coverflow", // 'cube', 'fade', 'coverflow',
                coverflowEffect: {
                    rotate: 0, // Slide rotate in degrees
                    stretch: 400, // Stretch space between slides (in px)
                    depth: 100, // Depth offset in px (slides translate in Z axis)
                    modifier: 1, // Effect multipler
                    slideShadows: false, // Enables slides shadows
                },
                grabCursor: true,
                parallax: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            // Js End
        });
    };

    var SliderTwo = function ($scope, $) {
        $scope.find('.projectSlider-area').each(function () {
            var settings = $(this).data('dreamwp');
            // Js Start
            var sliderSelector2 = new Swiper(".bannerSwiper-container", {
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
                    slideShadows: false, // Enables slides shadows
                },
                grabCursor: true,
                parallax: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            // Js End
        });
    };

    var SliderThree = function ($scope, $) {
        $scope.find('.brandSlider-area').each(function () {
            var settings = $(this).find('.brandSlider-wrap').data('dreamwp');
            var settings2 = $(this).find('.brandSlider-wrap2').data('dreamwp2');
            // Js Start
            // var sliderSelector3 = new Swiper(".brandSlider-wrap", {
            //     slidesPerView: settings['item'],
            //     spaceBetween: 50,
            //     loop: true,
            //     autoplay: {
            //         speeds: 100,
            //         delay: 150,
            //     },
            //     //   speed: 1000,
            //     breakpoints: {
            //         1140: {
            //             slidesPerView: 5,
            //         },
            //         991: {
            //             slidesPerView: 4,
            //         },
            //         767: {
            //             slidesPerView: 3,
            //         },
            //         575: {
            //             slidesPerView: 2,
            //         },
            //         420: {
            //             slidesPerView: 1,
            //         },
            //     },
            // });
            var sliderSelector4 = new Swiper(".brandSlider-wrap2", {
                slidesPerView: settings2['item2'],
                spaceBetween: 50,
                loop: true,
                autoplay: {
                    delay: 1,
                    disableOnInteraction: false,
                    reverseDirection: true,
                },
                  speed: 1000,
                grabCursor: true,
                mousewheelControl: true,
                keyboardControl: true,

            });
            // Js End
        });
    };

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', DreamwpGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider1.default', SliderOne);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider2.default', SliderTwo);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider3.default', SliderThree);
        }
        else {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', DreamwpGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider1.default', SliderOne);
            // elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider2.default', SliderTwo);
            // elementorFrontend.hooks.addAction('frontend/element_ready/dreamwp_slider3.default', SliderThree);
        }
    });
console.log('addon js loaded');
})(jQuery);