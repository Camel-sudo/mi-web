<?php    
function acs_options_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acs_car_stats';

    $cars = $wpdb->get_results("SELECT * FROM $table_name ORDER BY RAND() LIMIT 3");
    ?>
    <div class="wrap">
        <h1>Muestreo de Coches</h1>
        <div class="car-gallery" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 50px;">
            <div class="cards-container" style="display: flex; flex-wrap: wrap; gap: 50px; justify-content: center;">
                <?php
                if ($cars) {
                    foreach ($cars as $car) {
                        echo '<div class="card" style="border: 1px solid #ccc; border-radius: 8px; padding: 16px; width: 500px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
                        if ($car->image_url) {
                            echo "<img src='{$car->image_url}' alt='{$car->model}' style='width: 100%; height: 300px; object-fit: cover; border-radius: 8px; margin-bottom: 8px;' />";
                        }
                        echo "<h2 style='font-weight: bold; font-size: 40px;'>{$car->model}</h2> <!-- Modelo en negrita y tamaño aumentado -->
                              <h3>Historial de Competiciones</h3>
                              <p>{$car->competition_history}</p>
                              <h3>Ficha Técnica</h3>
                              <p>{$car->technical_specifications}</p>
                              <h3>Estadísticas de Éxitos</h3>
                              <p>{$car->success_statistics}</p>
                              </div>";
                    }
                } else {
                    echo "<p>No se encontraron coches.</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>
