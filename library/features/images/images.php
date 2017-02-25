<?php

/**
 * Feature: Images
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


/**
 * Add post-thumbnails support.
 */
add_theme_support('post-thumbnails');


/* -- */


$images = get_theme_support('images');
if (is_array($images[0])) {
    /**
     * Iterate through the images array and enable specific image sizes.
     */
    foreach ($images[0] as $name => $image) {
        add_image_size($name, $image['width'], $image['height'], $image['crop']);
    }
}

/* <> */
