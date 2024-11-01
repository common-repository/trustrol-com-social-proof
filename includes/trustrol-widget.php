<?php

add_action('wp_enqueue_scripts', 'trustrol_enqueue_parent_theme_style', 99);

function trustrol_enqueue_parent_theme_style() {
    $trustrol_options = get_option('trustrol_settings');
    if (isset($trustrol_options['enable']) && isset($trustrol_options['key']) && !(is_page(array($trustrol_options['pageid'])))) {
        wp_enqueue_script('script-trustrol', 'https://trustrol.com/pixel/'  . $trustrol_options['key'], array(), null, true);
    }
}
