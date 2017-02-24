<?php

/**
 * Template: Page (Default)
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

the_post();

get_template_part('template/content');

include "{$slate->dir->partials}/sidebar.php";

include "{$slate->dir->partials}/site-footer.php";

/* <> */
