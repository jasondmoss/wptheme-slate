<?php

if (current_theme_supports('images')) {
    /* Add post-thumbnails support. */
    add_theme_support('post-thumbnails');

    $images = get_theme_support('images');

    /* If some parameters have been added to the images. */
    if (is_array($images[0])) {
        $images = $images[0];

        /* Iterate through the images array and enable specific image sizes. */
        foreach ($images as $key => $image) {
            add_image_size($key, $image['width'], $image['height'], $image['crop']);
        }
    }
}

/* <> */
