<?php

/**
 * Template: Search
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */

include "{$slate->dir->partials}/site-header.php";

if (have_posts()) {
    get_search_query();

    while (have_posts()) {
        the_post();

        get_template_part('template/content', 'loop');
    }
} else {
    include "{$slate->dir->partials}/searchform.php";

    ?>

  <div class="not-found">
    <h2> <?php _e('Nothing Found', 'slate'); ?> </h2>
    <p> <?php _e('Perhaps checking one of these categories could help you? ', 'slate'); ?></p>
    <ul><?php

        wp_list_categories([
            'orderby'    => 'count',
            'order'      => 'DESC',
            'show_count' => 1,
            'title_li'   => '',
            'number'     => 10
        ]);

    ?></ul>
  </div>

    <?php
}

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
