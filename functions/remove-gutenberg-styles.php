<?php
function kybernethik_remove_global_styles() {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
}
add_action('init', 'kybernethik_remove_global_styles');

// Gutenberg Block-Editor Standard-Stile entfernen
function kybernethik_remove_block_library_css() {
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'kybernethik_remove_block_library_css', 100);