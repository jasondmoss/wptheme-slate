/**
 * Site Main.
 *
 * @category   JavaScript
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
     * ...
     *
     */
    window.addEventListener("scroll", function (ev) {
        "use strict";

        var distanceY = window.pageYOffset || document.documentElement.scrollTop;
        var siteHeader = document.querySelector("#siteHeader");
        var marker = 300;

        if (distanceY > marker) {
            siteHeader.classList.add("smaller");
        } else if (siteHeader.classList.contains("smaller")) {
            siteHeader.classList.remove("smaller");
        }
    });
}

/* <> */
