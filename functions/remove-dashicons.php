<?php
/* Admin-Bar- und Dashicons-Stile entfernen */
function kybernethik_remove_admin_bar_styles() {
    if (!is_admin()) {
        wp_dequeue_style('dashicons');
        wp_dequeue_style('admin-bar');
    }
}
add_action('wp_enqueue_scripts', 'kybernethik_remove_admin_bar_styles', 100);