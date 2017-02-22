<?php

if (current_theme_supports('commentsThreaded')) {
    /**
     * Theme configuration setup
     * Load comment reply link in case of page and post pages
     * if threaded comments are enabled
     *
     * @hook after_setup_theme
     */
    function slateSetup()
    {
        /* Add threaded comments. */
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('after_setup_theme', 'slateSetup');
}

/* <> */
