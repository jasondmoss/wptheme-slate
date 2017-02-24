<?php

/**
 * Feature: Threaded Comments
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


add_action('after_setup_theme', 'slateSetup');


/* -- */


/**
 * Add threaded comment if enabled.
 *
 * @hook after_setup_theme
 */
function slateSetup()
{
    if (is_singular() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

/* <> */
