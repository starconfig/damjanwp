<?php
/*
Plugin Name: DamjanWP
Plugin URI: https://example.com/damjanwp
Description: A custom WordPress plugin with custom URL fields
Author: Damjan Savic
Version: 1.0
*/

function damjanwp_add_custom_fields() {
    add_meta_box(
        'damjanwp_url_box',
        'Custom URL Box',
        'damjanwp_url_box_html',
        array('post', 'page'),
        'normal',
        'default'
    );
}

function damjanwp_url_box_html($post) {
    $url = get_post_meta($post->ID, 'damjanwp_url', true);
    $url_text = get_post_meta($post->ID, 'damjanwp_url_text', true);
    ?>
    <label for="damjanwp_url">Custom URL:</label>
    <input type="text" name="damjanwp_url" id="damjanwp_url" value="<?php echo esc_attr($url); ?>">
    <br>
    <label for="damjanwp_url_text">URL Text:</label>
    <input type="text" name="damjanwp_url_text" id="damjanwp_url_text" value="<?php echo esc_attr($url_text); ?>">
    <?php
}

function damjanwp_save_custom_fields($post_id) {
    if (array_key_exists('damjanwp_url', $_POST)) {
        update_post_meta(
            $post_id,
            'damjanwp_url',
            sanitize_text_field($_POST['damjanwp_url'])
        );
    }
    if (array_key_exists('damjanwp_url_text', $_POST)) {
        update_post_meta(
            $post_id,
            'damjanwp_url_text',
            sanitize_text_field($_POST['damjanwp_url_text'])
        );
    }
}

add_action('add_meta_boxes', 'damjanwp_add_custom_fields');
add_action('save_post', 'damjanwp_save_custom_fields');
