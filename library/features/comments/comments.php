<?php

/**
 * Feature: Comments
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


$comments = get_theme_support('comments');
if (true === $comments[0]['threaded']) {
    /**
     * Add threaded comment if enabled.
     *
     * @hook after_setup_theme
     */
    add_action('after_setup_theme', function () {
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    });
}

add_filter('comment_form_default_fields', 'slateCommentFields');


/* -- */


/**
 * Alter comments form default fields via filter function.
 *
 * @param array $fields
 *
 * @return array
 */
function slateCommentFields($fields)
{
    $fields['author'] = '<li><label for="name-txt">Name *</label>'.
        '<input type="text" id="name-txt" name="author" value=""></li>';
    $fields['email'] = '<li><label for="email-txt">Email *</label>'.
        '<input type="text" id="email-txt" name="email" value=""></li>';

    return $fields;
}


/**
 * Template for comments, without pingbacks or trackbacks.
 *
 * @param string  $comment
 * @param array   $args
 * @param integer $depth
 *
 * @return void
 */
function slateComment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;

    switch ($comment->comment_type) {
        case 'pingback':
        case 'trackback':
            ?>Pingback: <?php comment_author_link(); ?><?php edit_comment_link(); ?><?php
            break;

        default:
            $avatar_size = 49;
            if ('0' != $comment->comment_parent) {
                $avatar_size = 49;
            }

            ?>
    <div id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
      <?php echo get_avatar($comment, $avatar_size); ?>
      <div id="comment-<?php comment_ID(); ?>" class="user-comment">
        <ul class="meta">
          <li class="author"><?php echo get_comment_author_link(); ?> says:</li>
          <li class="time"><a href="#"><?php echo get_comment_date(); ?></a> at <?php echo get_comment_time(); ?></li>
        </ul>
        <?php

            comment_text();
            comment_reply_link(array_merge($args, [
                'reply_text' => __('Reply', 'slate'),
                'depth'      => $depth,
                'max_depth'  => $args['max_depth']
            ]));

            edit_comment_link();

        ?>
      </div>
    </div>
            <?php

            if ('0' == $comment->comment_approved) {
                ?>Your comment is awaiting moderation.<?php
            }
            break;
    }
}

/* <> */
