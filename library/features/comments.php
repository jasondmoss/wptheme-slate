<?php

if (current_theme_supports('comments')) {
    /**
     * Alter comments form default fields via filter function
     */
    function slateCommentFields($fields)
    {
        $fields['author'] = '<li><label for="name-txt">Name *</label>'.
            '<input type="text" id="name-txt" name="author" value=""></li>';
        $fields['email'] = '<li><label for="email-txt">Email *</label>'.
            '<input type="text" id="email-txt" name="email" value=""></li>';

        return $fields;
    }

    add_filter('comment_form_default_fields', 'slateCommentFields');

    if (!function_exists('slateComment')) {
        /**
         * Template for comments, without pingbacks or trackbacks
         * Based on Twenty Eleven Theme
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
    }
}

/* <> */
