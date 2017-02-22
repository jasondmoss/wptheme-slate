<?php

/**
 * Slate: Comments Handler
 *
 * Cover the comments logic here (Shamelessly stolen from Twenty Eleven).
 *
 * @package WordPress
 * @subpackage Slate
 */

if (post_password_required()) {
    ?>This post is password protected. Enter the password to view any comments.<?php

    /*
    * Stop the rest of comments.php from being processed, but don't kill the
    * script entirely -- we still have to fully load the template.
    */
    return;
}

if (have_comments()) {
    /*
    * List comments according to custom_comment function specified in
    * {commentstemplate.php} file.
    */
    wp_list_comments([
        'callback' => 'slateComment'
    ]);

    paginate_comments_links();

    /*
    * If there are no comments and comments are closed, let's leave a little
    * note, shall we?  But we don't want the note on pages or post types that do
    * not support comments.
    */
} elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) {
    ?>Comments closed<?php
}


/**
 * Display comment form if comments are open and post type supports comments
 */
if (comments_open() && post_type_supports(get_post_type(), 'comments')) {
    /*
     * Alter default values of form field.
     *
     * Name, Author and URL are edited in functions.php via
     * [comment_form_default_fields] filter hook.
     */
    $defaults = [
        'comment_field'        => '<li><label for="message-txt">'. __('Message', 'slate') .'</label>'.
            '<textarea id="comment" name="comment" cols="87" rows="7"></textarea></li>',
        'must_log_in'          => '<p class="must-log-in">'. __('You must log in to post a comment.', 'slate') .'</p>',
        'logged_in_as'         => '<p class="logged-in-as">'. __('Logged in.', 'slate') .'</p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'button-add-comment',
        'title_reply'          => __('Leave a reply', 'slate'),
        'title_reply_to'       => __('Leave a Reply to %s', 'slate'),
        'cancel_reply_link'    => __('Cancel comment', 'slate'),
        'label_submit'         => __('Comment', 'slate')
    ];
    comment_form($defaults);
}

/* <> */
