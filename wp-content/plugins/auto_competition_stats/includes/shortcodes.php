<?php
function acs_display_random_cars() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acs_car_stats';

    // Obtener 3 coches aleatorios
    $cars = $wpdb->get_results("SELECT * FROM $table_name ORDER BY RAND() LIMIT 3");

    if ($cars) {
        $output = '<div class="car-gallery" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 50px;">';
        
        foreach ($cars as $car) {
            $output .= '<div class="card" style="border: 1px solid #ccc; border-radius: 8px; padding: 16px; width: 500px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
            if ($car->image_url) {
                $output .= "<img src='{$car->image_url}' alt='{$car->model}' style='width: 100%; height: 300px; object-fit: cover; border-radius: 8px; margin-bottom: 8px;' />";
            }
            $output .= "<h2>{$car->model}</h2>
                        <h3>Historial de Competiciones</h3>
                        <p>{$car->competition_history}</p>
                        <h3>Ficha Técnica</h3>
                        <p>{$car->technical_specifications}</p>
                        <h3>Estadísticas de Éxitos</h3>
                        <p>{$car->success_statistics}</p>
                    </div>";
        }
        
        $output .= '</div>'; // cierra .car-gallery
        return $output;
    } else {
        return "<p>No se encontraron coches.</p>";
    }
}
add_shortcode('random_cars', 'acs_display_random_cars');
?>
