<?php
function kybernethik_remove_jquery() {
    if (!is_admin()) {
        wp_dequeue_script('jquery');  // Entfernt es nur im Frontend
    }
}
add_action('wp_enqueue_scripts', 'kybernethik_remove_jquery', 11);
