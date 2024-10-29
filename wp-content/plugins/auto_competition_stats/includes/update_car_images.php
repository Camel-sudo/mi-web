<?php
// Asegúrate de incluir el archivo de configuración de WordPress
require_once('../../../wp-load.php'); // Ajusta la ruta según sea necesario

function acs_fetch_car_images($model) {
    $url = "https://www.carqueryapi.com/api/0.3.php?cmd=getModels&model=" . urlencode($model);
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return false; // Manejar el error según sea necesario
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    
    if (isset($data['models']) && count($data['models']) > 0) {
        return $data['models'][0]['model_img']; // Devolver la URL de la imagen del primer modelo
    }

    return false; // No se encontraron imágenes
}

$car_models = [
    "Porsche 911",
    "Ford Mustang",
    "Ferrari F40",
    "Audi Quattro",
    "McLaren MP4/4",
    "Lotus 72",
    "Chevrolet Corvette",
    "Mercedes-Benz W196",
    "Ferrari F40",
    "Jaguar E-Type",
    "BMW M3",
    "Lamborghini Miura",
    "Aston Martin DB5",
    "Subaru Impreza WRX",
    "Dodge Charger",
    "Lotus Elise",
    "Chevrolet Camaro",
    "Plymouth Barracuda",
    "Ford GT40",
    "Datsun 240Z",
    "Nissan 350Z",
    "Mazda RX-7",
    "Shelby Cobra",
    "Maserati Alfieri",
    "Ferrari 250 GTO",
    "BMW M1",
    "Honda NSX",
    "Lexus LFA",
    "Pagani Zonda",
    "McLaren F1",
    "Alfa Romeo Giulia Quadrifoglio",
    "Tesla Model S",
    "Renault 5 Turbo",
    "Citroën DS",
    "Porsche 917",
    "Lancia Delta Integrale"
];

global $wpdb;
$table_name = $wpdb->prefix . 'acs_car_stats';

foreach ($car_models as $model) {
    $image_url = acs_fetch_car_images($model);
    
    if ($image_url) {
        // Actualiza la fila en la base de datos
        $wpdb->update(
            $table_name,
            ['image_url' => $image_url],
            ['model' => $model]
        );
        echo "Imagen para {$model} actualizada: {$image_url}<br>";
    } else {
        echo "No se encontró imagen para {$model}.<br>";
    }
}
?>
