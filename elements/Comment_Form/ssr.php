<?php

$comment_form_args = array(
    'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
    'title_reply_after' => '</h5>',
    'class_form' => 'breakdance-form breakdance-form--comments',
    'class_submit' => 'comment-form__submit button-atom button-atom--primary breakdance-form-button',
    'comment_field' => '<div class="breakdance-form-field breakdance-form-field--textarea"><label class="breakdance-form-field__label" for="comment">' . _x('Comment', 'noun') . ' <span class="required">*</span></label><textarea class="breakdance-form-field__input" id="comment" name="comment" aria-required="true"></textarea></div>',
    'submit_field' => '<div class="breakdance-form-field breakdance-form-footer">%1$s %2$s</div>',
    'fields' => apply_filters('comment_form_default_fields', array(
        

        'author' =>
        '<div class="breakdance-form-fields-row">' .
        '<div class="breakdance-form-field breakdance-form-field--half">' .
        '<label class="breakdance-form-field__label" for="author">' . __('Name') . ' <span class="required">*</span></label> ' .
        '<input id="author" class="breakdance-form-field__input" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
        '"' . $aria_req . ' /></div>',

        'email' =>
        '<div class="breakdance-form-field breakdance-form-field--half"><label class="breakdance-form-field__label" for="email">' . __('Email') . ' <span class="required">*</span></label> ' .
        '<input id="email" class="breakdance-form-field__input" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
        '"' . $aria_req . ' /></div>' .
        '</div>',

        'cookies' => '<div class="breakdance-form-field"><div class="breakdance-form-checkbox"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' /><label class="breakdance-form-checkbox__text" for="wp-comment-cookies-consent">'. __( 'Save my name and email in this browser for the next time I comment.' ) .'</label></div></div>',

    ),

    ),
);

$postId = get_the_ID();

if (comments_open($postId)) {
    if (get_post_status($postId) === 'draft' && \Breakdance\isRequestFromBuilderSsr()){
        echo '<div class="breakdance-form-message breakdance-form-message--error comments-form__closed"><p>' . __('Draft posts can\'t have comments', 'breakdance') . '</p></div>';
    }

    comment_form($comment_form_args);
} else {
    echo '<div class="breakdance-form-message breakdance-form-message--error comments-form__closed"><p>' . __('Comments are closed') . '</p></div>';
}
