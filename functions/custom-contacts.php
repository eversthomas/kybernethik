<?php
function create_kontakte_cpt() {
    register_post_type('kontakte',
        array(
            'labels'      => array(
                'name' => __('Kontakte', 'kybernethik'),
                'singular_name' => __('Kontakt', 'kybernethik'),
            ),
            'public'      => true,
            'has_archive' => false,
            'supports'    => array('title', 'editor'),
        )
    );
}
add_action('init', 'create_kontakte_cpt');

function add_kontakt_meta_box() {
    add_meta_box(
        'kontakt_info',
        'Kontakt-Informationen',
        'kontakt_meta_callback',
        'kontakte',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_kontakt_meta_box');

function kontakt_meta_callback($post) {
    // Bestehende Werte abrufen
    $nachname = get_post_meta($post->ID, 'nachname', true);
    $vorname = get_post_meta($post->ID, 'vorname', true);
    $strasse = get_post_meta($post->ID, 'strasse', true);
    $plz = get_post_meta($post->ID, 'plz', true);
    $stadt = get_post_meta($post->ID, 'stadt', true);
    $funktion = get_post_meta($post->ID, 'funktion', true);
    $telefonnummer = get_post_meta($post->ID, 'telefonnummer', true);
    $email = get_post_meta($post->ID, 'email', true);

    // Eingabefelder anzeigen
    echo '<label>Nachname:</label><input type="text" name="nachname" value="' . esc_attr($nachname) . '" style="width:100%;"><br><br>';
    echo '<label>Vorname:</label><input type="text" name="vorname" value="' . esc_attr($vorname) . '" style="width:100%;"><br><br>';
    echo '<label>Straße:</label><input type="text" name="strasse" value="' . esc_attr($strasse) . '" style="width:100%;"><br><br>';
    echo '<label>PLZ:</label><input type="text" name="plz" value="' . esc_attr($plz) . '" style="width:100%;"><br><br>';
    echo '<label>Stadt:</label><input type="text" name="stadt" value="' . esc_attr($stadt) . '" style="width:100%;"><br><br>';
    echo '<label>Funktion:</label><input type="text" name="funktion" value="' . esc_attr($funktion) . '" style="width:100%;"><br><br>';
    echo '<label>Telefonnummer:</label><input type="text" name="telefonnummer" value="' . esc_attr($telefonnummer) . '" style="width:100%;"><br><br>';
    echo '<label>E-Mail-Adresse:</label><input type="email" name="email" value="' . esc_attr($email) . '" style="width:100%;"><br>';
}

function save_kontakt_meta($post_id) {
    $fields = ['nachname', 'vorname', 'strasse', 'plz', 'stadt', 'funktion', 'telefonnummer', 'email'];
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_kontakt_meta');

function add_kontakt_dropdown() {
    add_meta_box(
        'kontakt_meta_box',
        'Kontakt auswählen',
        'kontakt_dropdown_callback',
        'page',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_kontakt_dropdown');

function kontakt_dropdown_callback($post) {
    $kontakte = get_posts(array('post_type' => 'kontakte', 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC'));
    $selected_kontakt = get_post_meta($post->ID, '_selected_kontakt', true);

    echo '<select name="selected_kontakt">';
    echo '<option value="">-- Bitte einen Kontakt auswählen --</option>';
    foreach ($kontakte as $kontakt) {
        echo '<option value="' . $kontakt->ID . '" ' . selected($selected_kontakt, $kontakt->ID, false) . '>' . get_post_meta($kontakt->ID, 'nachname', true) . ', ' . get_post_meta($kontakt->ID, 'vorname', true) . '</option>';
    }
    echo '</select>';
}

function save_kontakt_selection($post_id) {
    if (isset($_POST['selected_kontakt'])) {
        update_post_meta($post_id, '_selected_kontakt', $_POST['selected_kontakt']);
    }
}
add_action('save_post', 'save_kontakt_selection');

function show_selected_kontakt() {
    global $post;
    $kontakt_id = get_post_meta($post->ID, '_selected_kontakt', true);

    if ($kontakt_id) {
        // Stelle sicher, dass Daten abgerufen werden
        $nachname = get_post_meta($kontakt_id, 'nachname', true) ?: 'Nicht angegeben';
        $vorname = get_post_meta($kontakt_id, 'vorname', true) ?: 'Nicht angegeben';
        $strasse = get_post_meta($kontakt_id, 'strasse', true) ?: 'Nicht angegeben';
        $plz = get_post_meta($kontakt_id, 'plz', true) ?: 'Nicht angegeben';
        $stadt = get_post_meta($kontakt_id, 'stadt', true) ?: 'Nicht angegeben';
        $funktion = get_post_meta($kontakt_id, 'funktion', true) ?: 'Nicht angegeben';
        $telefonnummer = get_post_meta($kontakt_id, 'telefonnummer', true) ?: 'Nicht angegeben';
        $email = get_post_meta($kontakt_id, 'email', true) ?: 'Nicht angegeben';

        // Strukturierte HTML-Ausgabe
        $output = "<div class='kontakt-box'>";
        $output .= "<h3>$vorname $nachname</h3>";
        $output .= "<p><strong>Funktion:</strong> $funktion</p>";
        if ($strasse !== 'Nicht angegeben' || $plz !== 'Nicht angegeben' || $stadt !== 'Nicht angegeben') {
            $output .= "<p><strong>Adresse:</strong> $strasse, $plz $stadt</p>";
        }
        if ($telefonnummer !== 'Nicht angegeben') {
            $output .= "<p><strong>Telefon:</strong> $telefonnummer</p>";
        }
        if ($email !== 'Nicht angegeben') {
            $output .= "<p><strong>E-Mail:</strong> <a href='mailto:$email'>$email</a></p>";
        }
        $output .= "</div>";

        return $output;
    }
    return '<p>Kein Kontakt ausgewählt.</p>';
}
add_shortcode('kontakt_auswahl', 'show_selected_kontakt');
