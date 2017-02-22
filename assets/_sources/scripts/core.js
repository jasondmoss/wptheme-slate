/**
 * Site Core.
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


/**
 * Browser capability test.
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


/**
 * Concatenate individual arrays into single array for easier manipulation.
 *
 * @param {Array} Individual arrays; as many as required.
 *
 * @returns {Array} Concatenated array.
 */
function mergeArrays()
{
    return [].concat.apply([], arguments);
}


/* -- */


if /* Browser passes check? */(okay) {

    /**
     * ...
     *
     * @var {Object}
     */
    var Site = Site || {};
}

/* <> */
