/**
 * Site Core.
 *
 * @category   JavaScript
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


/**
 * Test for relatively modern browser.
 *
 * @returns {Boolean} True if browser supports
 */
var okay = function () {
    return (
        "querySelector" in document &&
        "addEventListener" in window &&
        Array.prototype.forEach
    );
};

/* <> */
