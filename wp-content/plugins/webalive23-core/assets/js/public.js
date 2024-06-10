;
(function ($) {
    "use strict";

    var testimonialTextSlider = function ($scope, $) {
        $(document).ready(function () {
            var $boxes = $scope.find('.scroll-box'); // Ensure boxes are within the scope

            var controller = new ScrollMagic.Controller();

            var tween = gsap.timeline()
                .fromTo($boxes.eq(0), { x: '20vw' }, { x: '-40vw', ease: 'none' }, 0)
                .fromTo($boxes.eq(1), { x: '25vw' }, { x: '-30vw', ease: 'none' }, 0)
                .fromTo($boxes.eq(2), { x: '30vw' }, { x: '-20vw', ease: 'none' }, 0);

            new ScrollMagic.Scene({
                triggerElement: $boxes.eq(2)[0], // Use the third box as the trigger element
                triggerHook: 0.9,
                duration: '100%'
            })
                .setTween(tween)
                .addTo(controller);
        });
    };



    // var testimonialTextSlider = function ($scope, $) {
    //     $(document).ready(function () {
    //         var $boxes = $scope.find('.scroll-box'); // Ensure boxes are within the scope
    
    //         var controller = new ScrollMagic.Controller();
    
    //         var tween = gsap.timeline()
    //             .fromTo($boxes.eq(0), { x: '20vw' }, { x: '-10vw', ease: 'none' }, 0)
    //             .fromTo($boxes.eq(1), { x: '25vw' }, { x: '-7.5vw', ease: 'none' }, 0)
    //             .fromTo($boxes.eq(2), { x: '30vw' }, { x: '-5vw', ease: 'none' }, 0);
    
    //         new ScrollMagic.Scene({
    //             triggerElement: $boxes.eq(2)[0], // Use the third box as the trigger element
    //             triggerHook: 0.9,
    //             duration: '100%'
    //         })
    //             .setTween(tween)
    //             .addTo(controller);
    //     });
    // };
    
    

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
            var $scrollItems = $scope.find('.loop-item');
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


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/box-animation-3.default', testimonialTextSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/box-animation-2.default', boxAnimation2);
        // elementorFrontend.hooks.addAction('frontend/element_ready/text-roll.default', textLoop);
        elementorFrontend.hooks.addAction('frontend/element_ready/grid-animation.default', gridAnimation);
    });
})(jQuery);