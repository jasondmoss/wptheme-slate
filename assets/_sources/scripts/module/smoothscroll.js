/**
 * Module: Smooth Scroll.
 * Animate page srcolling to simulate "smoothness".
 *
 * @category   JavaScript|Module
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    1.0.0
 * @license    https://www.jdmlabs.com/license/license-WTFPL-2.txt [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */

if /* Browser passes check? */(okay) {

    /**
     * Function to animate the scroll.
     *
     * @param {Object}  anchor
     * @param {Integer} duration
     */
    (function () {
        "use strict";

        var smoothScroll = function (anchor, duration) {
            // Calculate how far and how fast to scroll.
            var startLocation = window.pageYOffset;
            var endLocation = anchor.offsetTop;
            var distance = endLocation - startLocation;
            var increments = distance / (duration / 16);
            var stopAnimation;

            // Scroll the page by an increment, and check if it's time to stop.
            var animateScroll = function () {
                window.scrollBy(0, increments);

                stopAnimation();
            };


            if /* Down Scroll. */(increments >= 0) {
                // Stop animation when you reach the anchor or the bottom of the page.
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if ((travelled >= (endLocation - increments)) ||
                        ((window.innerHeight + travelled) >= document.body.offsetHeight)
                    ) {
                        clearInterval(runAnimation);
                    }
                };
            } else /* Up Scroll. */{
                // Stop animation when you reach the anchor or the top of the page.
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if (travelled <= (endLocation || 0)) {
                        clearInterval(runAnimation);
                    }
                };
            }

            // Loop the animation function.
            var runAnimation = setInterval(animateScroll, 16);
        };


        // Define smooth scroll links.
        var scrollToggle = document.querySelectorAll(".back-to-top");
        [].forEach.call(scrollToggle, function (toggle) {
            toggle.addEventListener("click", function (ev) {
                ev.preventDefault();

                // Get anchor link and calculate distance from the top.
                var dataID = toggle.getAttribute("href");
                var dataTarget = document.querySelector(dataID);
                var dataSpeed = toggle.getAttribute("data-speed");

                // If the anchor exists...
                if (dataTarget) {
                    smoothScroll(dataTarget, dataSpeed || 500);
                }
            }, false);
        });
    })();
}

/* <> */
