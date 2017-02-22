/**
 * Module: Turtle.
 *
 * Hide the header while scolling the page down; Show on scroll up or when the
 * bottom of the page is reached.
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

// if /* Browser passes check? */(okay) {
//     (function (document, window, index) {
//         "use strict";
//
//         var element = document.querySelector("#siteHeader");
//
//         if (!element) {
//             return true;
//         }
//
//         var dHeight = 0;
//         var elHeight = 0;
//         var elTop = 0;
//         var wHeight = 0;
//         var wScrollBefore = 0;
//         var wScrollCurrent = 0;
//         var wScrollDiff = 0;
//
//         window.addEventListener("scroll", function () {
//             elHeight = element.offsetHeight;
//             dHeight = document.body.offsetHeight;
//             wHeight = window.innerHeight;
//             wScrollCurrent = window.pageYOffset;
//             wScrollDiff = wScrollBefore - wScrollCurrent;
//             elTop = parseInt(window.getComputedStyle(element).getPropertyValue("top")) + wScrollDiff;
//
//             if /* Scrolled to top. */(wScrollCurrent <= 0) {
//                 element.style.top = '0px';
//             } else if /* Scrolled up. */(wScrollDiff > 0) {
//                 element.style.top = (elTop > 0 ? 0 : elTop) +"px";
//             } else if /* Scrolled down. */(wScrollDiff < 0) {
//                 if /* Scrolled to bottom. */(wScrollCurrent + wHeight >= dHeight - elHeight) {
//                     element.style.top = ((elTop = wScrollCurrent + wHeight - dHeight) < 0 ? elTop : 0) +"px";
//                 } else /* Scrolled down. */{
//                     element.style.top = (Math.abs(elTop) > elHeight ? -elHeight : elTop) +"px";
//                 }
//             }
//
//             wScrollBefore = wScrollCurrent;
//         });
//     }(document, window, 0));
// }

/* <> */
