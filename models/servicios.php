<?php
require_once 'conexion.php';

// Obtener la conexión a la base de datos MongoDB
$database = conectarDB();

// Verificar que la conexión a MongoDB sea válida
if (!$database) {
    echo json_encode(['error' => 'Conexión a MongoDB no válida.']);
    exit;
}

// Seleccionar la colección 
$serviciosCollection = $database->servicios;

// Obtenemos todos los servicios.
$serviciosCursor = $serviciosCollection->find([]);

// Array de servicioss
$servicios = [];

// Recorrer el cursor de servicios y almacenarlos en el array
foreach ($serviciosCursor as $servicio) {
    $servicios[] = [
        'id' => (string)$servicio->_id, // Convertir ObjectId a string
        'nombre' => $servicio->nombre_servicio
    ];
}

// Devuelve el arreglo de servicios como JSON
echo json_encode($servicios);
?>
