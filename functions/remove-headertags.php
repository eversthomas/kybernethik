<?php
remove_action('wp_head', 'rsd_link'); // Really Simple Discovery Link entfernen
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer Manifest Link entfernen
remove_action('wp_head', 'wp_shortlink_wp_head'); // Shortlink entfernen
remove_action('wp_head', 'wp_generator'); // WordPress Versionsnummer aus <head> entfernen