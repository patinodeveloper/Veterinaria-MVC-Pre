<?php

require '../vendor/autoload.php'; 

function conectarDB() {

    $host = 'localhost';
    $port = 27017;
    $dbName = 'veterinaria_db1';

    // Cadena de conexión a MongoDB
    $url = "mongodb://$host:$port";
    
    try {
        // Crear una nueva instancia de MongoDB\Client
        $client = new MongoDB\Client($url);
        
        // Selecciona la base de datos
        $database = $client->selectDatabase($dbName);
        
        // Retorna la instancia de la base de datos
        return $database;
    } catch (Exception $e) {
        // msj error
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        exit;
    }
}
?>
