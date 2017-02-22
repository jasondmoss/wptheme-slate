<?php

/**
 * Slate: Footer
 *
 * Remember to always include the wp_footer() call before the </body> tag
 *
 * @package WordPress
 * @subpackage Slate
 */

?>

<footer id="footer">
  <p id="copyrights">
    &copy; <?php echo intval(date('Y')) . ' ' . esc_html(get_bloginfo('name')); ?>
  </p>
</footer>

<?php wp_footer(); ?>

</body></html>
