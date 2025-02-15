<?php

/* ========================= */
/* 1. Styles & Scripts */
/* ========================= */

function kybernethik_theme_enqueue_styles() {
    // Haupt-CSS-Datei aus dem "styles"-Verzeichnis laden
    wp_enqueue_style('kybernethik-style', get_template_directory_uri() . '/styles/main.css');
    // Zusätzliche Theme-CSS-Datei laden
    wp_enqueue_style('kybernethik-theme', get_template_directory_uri() . '/styles/theme.css', array('kybernethik-style'), null);
}
add_action('wp_enqueue_scripts', 'kybernethik_theme_enqueue_styles');

/* ========================= */
/* 2. Theme-Support aktivieren */
/* ========================= */

// Dynamische Title-Tags aktivieren
add_theme_support('title-tag');

// Beitragsbilder aktivieren
add_theme_support('post-thumbnails');

// HTML5-Markup-Unterstützung für bestimmte Elemente aktivieren
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

// Custom Logo ermöglichen
add_theme_support('custom-logo');

// RSS-Feeds für Beiträge und Kommentare aktivieren
add_theme_support('automatic-feed-links');

/* ========================= */
/* 3. Navigationsmenüs registrieren */
/* ========================= */

function kybernethik_register_menus() {
    register_nav_menus(array(
        'primary' => __('Hauptmenü', 'kybernethik'),
    ));
}
add_action('after_setup_theme', 'kybernethik_register_menus');

/* ========================= */
/* 4. Widgets aktivieren */
/* ========================= */

function kybernethik_register_sidebar() {
    register_sidebar(array(
        'name' => __('Seitenleiste', 'kybernethik'),
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'kybernethik_register_sidebar');

/* ========================= */
/* 5. Überflüssige WordPress-Funktionen entfernen */
/* ========================= */

// remove dashicons and admin styles
require_once get_template_directory() . '/functions/remove-dashicons.php';

/* Gutenberg Global Styles entfernen */
require_once get_template_directory() . '/functions/remove-gutenberg-styles.php';

// Emoji-Skripte deaktivieren
require_once get_template_directory() . '/functions/remove-emojis.php';

// Automatische Embeds deaktivieren
require_once get_template_directory() . '/functions/remove-embeds.php';

// REST API für nicht eingeloggte Nutzer deaktivieren
require_once get_template_directory() . '/functions/remove-restapi.php';

// Entfernt unnötige Header-Meta-Tags
require_once get_template_directory() . '/functions/remove-headertags.php';

// jQuery von WordPress deaktivieren (falls nicht benötigt)
require_once get_template_directory() . '/functions/remove-jquery.php';

// Custom Kontakte Tabellen anlegen
require_once get_template_directory() . '/functions/custom-contacts.php';

?>