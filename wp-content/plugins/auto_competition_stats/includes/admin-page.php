<?php  
function acs_options_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acs_car_stats';

    // Manejo del formulario existente para añadir coches
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $model = sanitize_text_field($_POST['model']);
        $competition_history = sanitize_textarea_field($_POST['competition_history']);
        $technical_specifications = sanitize_textarea_field($_POST['technical_specifications']);
        $success_statistics = sanitize_textarea_field($_POST['success_statistics']);
        
        // Manejar la carga del archivo de imagen
        $image_url = ''; // Inicializa la variable
        if (!empty($_FILES['image_file']['name'])) {
            // Directorio para guardar las imágenes
            $upload_dir = wp_upload_dir();
            $target_dir = $upload_dir['path'] . '/';
            $target_file = $target_dir . basename($_FILES['image_file']['name']);
            $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Comprobar si es un formato de imagen válido
            if (in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Mover el archivo subido al directorio de destino
                if (move_uploaded_file($_FILES['image_file']['tmp_name'], $target_file)) {
                    $image_url = $upload_dir['url'] . '/' . basename($target_file); // URL de la imagen
                } else {
                    echo "<div class='error'><p>Error al subir la imagen.</p></div>";
                }
            } else {
                echo "<div class='error'><p>Formato de imagen no válido. Solo se permiten JPG, JPEG, PNG y GIF.</p></div>";
            }
        }

        // Insertar en la base de datos solo si hay una URL de imagen válida
        if (!empty($image_url)) {
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
    }

    // Mostrar 3 imágenes aleatorias
    $cars = $wpdb->get_results("SELECT * FROM $table_name ORDER BY RAND() LIMIT 3");

    ?>
    <div class="wrap">
        <h1>Añadir Información de Competición de Coches</h1>
        <form method="POST" enctype="multipart/form-data"> <!-- Añadir enctype para carga de archivos -->
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
            <label>Archivo de la Imagen:</label>
            <input type="file" name="image_file" accept="image/*" required>
            <br><br>
            <button type="submit" class="button button-primary">Guardar</button>
        </form>

        <h2>Muestreo de Coches</h2>
        <div class="car-gallery" style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
            <?php
            if ($cars) {
                foreach ($cars as $car) {
                    echo '<div class="card" style="border: 1px solid #ccc; border-radius: 8px; padding: 16px; width: 30%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
                    if ($car->image_url) {
                        echo "<img src='{$car->image_url}' alt='{$car->model}' style='width:100%; height:auto; border-radius: 8px; margin-bottom: 8px;'/>";
                    }
                    echo "<h2>{$car->model}</h2>
                          <h3>Historial de Competiciones</h3>
                          <p>{$car->competition_history}</p>
                          <h3>Ficha Técnica</h3>
                          <p>{$car->technical_specifications}</p>
                          <h3>Estadísticas de Éxitos</h3>
                          <p>{$car->success_statistics}</p>
                          </div>"; // cierra .card
                }
            } else {
                echo "<p>No se encontraron coches.</p>";
            }
            ?>
        </div>
    </div>
    <?php
}
?>
