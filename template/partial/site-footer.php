<?php

/**
 * Template Partial: Site Footer
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */

?>

<footer id="footer">
  <p id="copyrights">&copy; <?php echo intval(date('Y')) . ' ' . esc_html(get_bloginfo('name')); ?></p>
</footer>

<?php wp_footer(); ?>

</body></html>
