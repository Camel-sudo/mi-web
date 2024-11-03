<?php
/*
Plugin Name: Auto Competition Stats
Description: Plugin para mostrar información de coches en algunas competiciones de automovilismo.
Version: 1.1
Author: Ruben y Diego
*/

// Incluir archivos adicionales
include(plugin_dir_path(__FILE__) . 'includes/admin-page.php');
include(plugin_dir_path(__FILE__) . 'includes/shortcodes.php');

// Crear tablas para almacenar datos en la base de datos al activar el plugin
function acs_create_tables() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'acs_car_stats';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        model varchar(255) NOT NULL,
        competition_history text NOT NULL,
        technical_specifications text NOT NULL,
        success_statistics text NOT NULL,
        image_url text DEFAULT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'acs_create_tables');

// Agregar una página de opciones en el menú de administración
function acs_add_admin_menu() {
    add_menu_page(
        'Auto Competition Stats', 
        'Auto Competition Stats', 
        'manage_options',         
        'auto_competition_stats', 
        'acs_options_page'        
    );
}
add_action('admin_menu', 'acs_add_admin_menu');
?>
