<?php
function acs_display_car_info($atts) {
    global $wpdb;
    $atts = shortcode_atts(
        array('model' => ''), 
        $atts,
        'car_info'
    );

    $model = $atts['model'];
    $table_name = $wpdb->prefix . 'acs_car_stats';

    $car_data = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table_name WHERE model = %s", 
        $model
    ));

    if ($car_data) {
        return "<div>
                    <h2>Modelo: {$car_data->model}</h2>
                    <h3>Historial de Competiciones</h3>
                    <p>{$car_data->competition_history}</p>
                    <h3>Ficha Técnica</h3>
                    <p>{$car_data->technical_specifications}</p>
                    <h3>Estadísticas de Éxitos</h3>
                    <p>{$car_data->success_statistics}</p>
                </div>";
    } else {
        return "<p>Lo sentimos, no se encontró información para el modelo '{$model}'.</p>";
    }
}
add_shortcode('car_info', 'acs_display_car_info');
?>
