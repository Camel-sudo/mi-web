<?php

function acs_display_random_cars() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acs_car_stats';

    // Obtener 3 coches aleatorios
    $cars = $wpdb->get_results("SELECT * FROM $table_name ORDER BY RAND() LIMIT 3");

    if ($cars) {
        $output = '<div class="car-gallery" style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">';
        
        foreach ($cars as $car) {
            $output .= '<div class="card" style="border: 1px solid #ccc; border-radius: 8px; padding: 16px; width: 30%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
            if ($car->image_url) {
                $output .= "<img src='{$car->image_url}' alt='{$car->model}' style='width:100%; height:auto; border-radius: 8px; margin-bottom: 8px;'/>";
            }
            $output .= "<h2>{$car->model}</h2>
                        <h3>Historial de Competiciones</h3>
                        <p>{$car->competition_history}</p>
                        <h3>Ficha Técnica</h3>
                        <p>{$car->technical_specifications}</p>
                        <h3>Estadísticas de Éxitos</h3>
                        <p>{$car->success_statistics}</p>
                    </div>"; // cierra .card
        }
        
        $output .= '</div>'; // cierra .car-gallery
        return $output;
    } else {
        return "<p>No se encontraron coches.</p>";
    }
}
add_shortcode('random_cars', 'acs_display_random_cars');

function acs_display_add_car_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'acs_car_stats';

        $model = sanitize_text_field($_POST['model']);
        $competition_history = sanitize_textarea_field($_POST['competition_history']);
        $technical_specifications = sanitize_textarea_field($_POST['technical_specifications']);
        $success_statistics = sanitize_textarea_field($_POST['success_statistics']);
        $image_url = esc_url_raw($_POST['image_url']);  // Nueva variable para la URL de la imagen

        // Insertar en la base de datos
        $wpdb->insert(
            $table_name,
            array(
                'model' => $model,
                'competition_history' => $competition_history,
                'technical_specifications' => $technical_specifications,
                'success_statistics' => $success_statistics,
                'image_url' => $image_url  // Almacenar la URL de la imagen
            )
        );

        echo "<div class='updated'><p>Datos guardados correctamente.</p></div>";
    }

    ob_start(); // Comenzar el buffer de salida
    ?>
    <div>
        <h2>Añadir un Nuevo Coche</h2>
        <form method="POST">
            <label>Modelo del Coche:</label>
            <input type="text" name="model" required>
            <br><br>
            <label>Historial de Competiciones:</label>
            <textarea name="competition_history" required></textarea>
            <br><br>
            <label>Ficha Técnica:</label>
            <textarea name="technical_specifications" required></textarea>
            <br><br>
            <label>Estadísticas de Éxitos:</label>
            <textarea name="success_statistics" required></textarea>
            <br><br>
            <label>URL de la Imagen:</label>
            <input type="text" name="image_url" placeholder="http://example.com/image.jpg">
            <br><br>
            <button type="submit" class="button button-primary">Añadir Coche</button>
        </form>
    </div>
    <?php
    return ob_get_clean(); // Devolver el contenido del buffer
}
add_shortcode('add_car_form', 'acs_display_add_car_form');
?>
