<?php
function kybernethik_disable_rest_api( $access ) {
    if (!is_user_logged_in()) {
        return new WP_Error('rest_forbidden', __('REST API ist für nicht eingeloggte Nutzer deaktiviert', 'kybernethik'), array('status' => 401));
    }
    return $access;
}
add_filter('rest_authentication_errors', 'kybernethik_disable_rest_api');