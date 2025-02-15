<?php
function kybernethik_deregister_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'kybernethik_deregister_jquery');