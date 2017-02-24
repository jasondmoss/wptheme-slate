<?php

/**
 * Feature: Settings
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


$settings = get_theme_support('settings');
if (is_array($settings[0])) {
    require_once __DIR__ .'/classes/SlateSettings.php';

    if (class_exists('SlateSettings')) {
        $settings = new SlateSettings($settings[0]);
    }
}

/* <> */
