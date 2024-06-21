;
(function ($) {
    "use strict";

    // var testimonialTextSlider = function ($scope, $) {
    //     $(document).ready(function () {
    //         var $boxes = $scope.find('.scroll-box'); // Ensure boxes are within the scope

    //         var controller = new ScrollMagic.Controller();

    //         var tween = gsap.timeline()
    //             .fromTo($boxes.eq(0), { x: '30vw' }, { x: '-40vw', ease: 'none' }, 0)
    //             .fromTo($boxes.eq(1), { x: '31vw' }, { x: '-39vw', ease: 'none' }, 0)
    //             .fromTo($boxes.eq(2), { x: '32vw' }, { x: '-38vw', ease: 'none' }, 0);

    //         new ScrollMagic.Scene({
    //             triggerElement: $boxes.eq(2)[0], // Use the third box as the trigger element
    //             triggerHook: 0.9,
    //             duration: '100%'
    //         })
    //             .setTween(tween)
    //             .addTo(controller);
    //     });
    // };


    var testimonialTextSlider = function ($scope, $) {
        $(document).ready(function () {
            var $boxes = $scope.find('.scroll-box'); // Ensure boxes are within the scope

            var controller = new ScrollMagic.Controller();

            var tween = gsap.timeline()
            .fromTo($boxes.eq(0), { x: '2vw' }, { x: '-10vw', ease: 'none' }, 0)
            .fromTo($boxes.eq(1), { x: '2vw' }, { x: '-10vw', ease: 'none' }, 0)
            .fromTo($boxes.eq(2), { x: '2vw' }, { x: '-10vw', ease: 'none' }, 0);
        

            new ScrollMagic.Scene({
                triggerElement: $boxes.eq(2)[0], // Use the third box as the trigger element
                triggerHook: 0.9,
                duration: '500%'
            })
                .setTween(tween)
                .addTo(controller);
        });
    };

    var boxAnimation2 = function ($scope, $) {
        $(document).ready(function () {
            var $box1 = $scope.find('.box1');
            var $box3 = $scope.find('.box3');

            var controller = new ScrollMagic.Controller();

            var tween = gsap.timeline()
                .fromTo($box1, {x: '10vw'}, {x: '-15vw', ease: 'none'}, 0)
                .fromTo($box3, {x: '-10vw'}, {x: '15vw', ease: 'none'}, 0);

            new ScrollMagic.Scene({
                triggerElement: $box3[0], // Use the first DOM element from the jQuery object
                triggerHook: 0.9,
                duration: '100%'
            })
                .setTween(tween)
                .addTo(controller);
        });
    };

    var textLoop = function ($scope, $) {
        $(document).ready(function () {
            var $scrollContent = $scope.find('.loop-content');
            var $scrollItems = $scrollContent.find('.loop-item');
            var totalWidth = 0;

            // Calculate total width of all items
            $scrollItems.each(function() {
                totalWidth += $(this).outerWidth(true);
            });

            // Duplicate the items for seamless scrolling
            $scrollContent.append($scrollItems.clone());

            // Set the width of the scroll-content
            $scrollContent.width(totalWidth * 2);

            // Adjust the animation duration based on total width
            var animationDuration = totalWidth / 50; // Adjust this ratio as needed

            // Initialize GSAP animation
            gsap.to($scrollContent, {
                x: -totalWidth,
                duration: animationDuration,
                ease: 'none',
                repeat: -1
            });
        });
    };



    var gridAnimation = function ($scope, $) {
        $(document).ready(function () {
            // Ensure elements are scoped within $scope
            var $box1 = $scope.find('.box1');
            var $box2 = $scope.find('.box2');
            var $box3 = $scope.find('.box3');
            var $box4 = $scope.find('.box4');

            var controller = new ScrollMagic.Controller();

            var tween = gsap.timeline()
                .fromTo($box1, { x: '2vw' }, { x: '-15vw', ease: 'none' }, 0)
                .fromTo($box3, { x: '2vw' }, { x: '-10vw', ease: 'none' }, 0)
                .fromTo($box2, { x: '-2vw' }, { x: '15vw', ease: 'none' }, 0)
                .fromTo($box4, { x: '-2vw' }, { x: '10vw', ease: 'none' }, 0);

            new ScrollMagic.Scene({
                triggerElement: $box3[0], // Use the third box as the trigger element
                triggerHook: 0.9,
                duration: '100%'
            })
                .setTween(tween)
                .addTo(controller);
        });
    };
    var logoLoop = function ($scope, $) {
        if (window.elementorFrontend && window.elementorFrontend.isEditMode()) {
            return; // Exit if in Elementor editor
        }
        $($scope).ready(function () {
            const $text = $scope.find('.text');
            const $logos = $scope.find('.logos');
            const $logo = $scope.find('.logo');
            const logoWidth = $logo.outerWidth(true);
            const screenWidth = $(window).width();
            const logosCount = $logo.length;
            const totalWidth = logoWidth * logosCount;

            // Clone logos for infinite scrolling effect
            function cloneLogos() {
                const minClones = Math.ceil(screenWidth / totalWidth) + 1; // Ensure enough clones to cover the screen width
                for (let i = 0; i < minClones; i++) {
                    $logos.append($logos.html());
                }
            }

            if ($logos.length && logoWidth > 0 && logosCount > 0) {
                cloneLogos();
            } else {
                console.error('Invalid logos or logo dimensions');
                return; // Exit if there's an issue with logos or dimensions
            }

            // GSAP animation for scrolling logos
            const tl = gsap.timeline({repeat: -1, paused: true});
            tl.to('.logos', {
                x: '-100%',
                duration: 150, // Increased duration to slow down the animation
                ease: 'linear',
                modifiers: {
                    x: gsap.utils.unitize((x) => parseFloat(x) % totalWidth)
                }
            });

            // ScrollMagic scene to start animation when section is in view
            const controller = new ScrollMagic.Controller();
            const scene = new ScrollMagic.Scene({
                triggerElement: '.brands-section',
                triggerHook: 0.8, // Start the animation when the section is 80% in the viewport
            })
                .on('enter', function () {
                    tl.play();
                })
                .addTo(controller);

            // Function to check logo position and adjust text opacity
            function checkLogoPosition() {
                const textRect = $text[0].getBoundingClientRect();
                const logoRects = $('.logo img').map(function () {
                    return this.getBoundingClientRect();
                }).get();

                let isOverlapping = logoRects.some(logoRect => {
                    return logoRect.right >= textRect.left && logoRect.left <= textRect.right;
                });

                if (isOverlapping) {
                    $text.css('opacity', '0.5');  // Reduce opacity
                    $text.addClass('overlape')
                } else {
                    $text.css('opacity', '1');  // Reset opacity
                    $text.removeClass('overlape')
                }

                requestAnimationFrame(checkLogoPosition);
            }

            checkLogoPosition();
        });
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/box-animation-3.default', testimonialTextSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/box-animation-2.default', boxAnimation2);
        elementorFrontend.hooks.addAction('frontend/element_ready/text-roll.default', textLoop);
        elementorFrontend.hooks.addAction('frontend/element_ready/grid-animation.default', gridAnimation);
        elementorFrontend.hooks.addAction('frontend/element_ready/logo-loop.default', logoLoop);
    });
})(jQuery);