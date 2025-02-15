<?php
function kybernethik_disable_embeds() {
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_filter('the_content', 'wp_oembed_autoembed');
}
add_action('init', 'kybernethik_disable_embeds');