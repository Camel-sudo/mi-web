<?php
function acs_options_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'acs_car_stats';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $model = sanitize_text_field($_POST['model']);
        $competition_history = sanitize_textarea_field($_POST['competition_history']);
        $technical_specifications = sanitize_textarea_field($_POST['technical_specifications']);
        $success_statistics = sanitize_textarea_field($_POST['success_statistics']);

        $wpdb->insert(
            $table_name,
            array(
                'model' => $model,
                'competition_history' => $competition_history,
                'technical_specifications' => $technical_specifications,
                'success_statistics' => $success_statistics,
            )
        );
        echo "<div class='updated'><p>Datos guardados correctamente.</p></div>";
    }

    ?>
    <div class="wrap">
        <h1>Añadir Información de Competición de Coches</h1>
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
            <button type="submit" class="button button-primary">Guardar</button>
        </form>
    </div>
    <?php
}
?>
