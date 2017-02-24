<?php

/**
 * Template: 404
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

// include "{$slate->dir->partials}/searchform.php";

?>

<div class="not-found">
  <p> Perhaps checking one of these categories could help you?</p>
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

include "{$slate->dir->partials}/site-footer.php";

/* <> */
