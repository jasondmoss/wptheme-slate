<?php

/**
 * Template Partial: Content Single
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

  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php echo esc_attr(get_permalink()); ?>"><?php the_title(); ?></a>
    <?php

    the_time('m/d/Y');

    if (has_post_thumbnail()) {
        the_post_thumbnail();
    }

    ?>
    <div class="content"> <?php the_content(); ?></div>
    <?php comments_template() ?>
  </div>
