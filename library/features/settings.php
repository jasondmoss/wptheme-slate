<?php

if (current_theme_supports('settings')) {
    $settings = get_theme_support('settings');

    /* If some parameters have been added to the menus. */
    if (is_array($settings[0])) {
        require_once __DIR__ .'/classes/SlateSettings.php';

        if (class_exists('SlateSettings')) {
            $settings = new SlateSettings($settings[0]);
        }
    }
}

/* <> */
