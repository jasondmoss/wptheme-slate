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

use \Slate\Library\Features\Settings\SettingsManager;

require_once __DIR__ .'/SettingsManager.php';

$settings = get_theme_support('settings');
if (class_exists("\\Slate\\Library\\Features\\Settings\\SettingsManager")) {
    $settings = new SettingsManager($settings[0]);
}

/* <> */
