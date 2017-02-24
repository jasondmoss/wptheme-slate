<?php

/**
 * Template Partial: Search form
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

  <form id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="s" class="assistive-text"><?php _e('Search', 'slate'); ?></label>
    <input id="s" name="s" class="field" type="text" placeholder="<?php esc_attr_e('Search', 'slate'); ?>">
    <input id="searchsubmit" name="submit" class="submit" type="submit" value="<?php esc_attr_e('Search', 'slate'); ?>">
  </form>
