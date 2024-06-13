<?php
session_start();
require_once('conexion.php');

// Verificar si el usuario está autenticado (creo que no funciona xd)
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no está autenticado, se manda a la página de inicio de sesión
    header("Location: ../index.html");
    exit;
}

// Obtener el ID de usuario de la sesión
$user_id = $_SESSION['user_id'];

// Realizar la conexión a la base de datos
$database = conectarDB();

// Seleccionar la colección de usuarios
$usuariosCollection = $database->usuarios;

// obtener los datos del usuario por su ID
$query = ['_id' => new MongoDB\BSON\ObjectID($user_id)];
$user_data = $usuariosCollection->findOne($query);

if ($user_data) {
    // Devolver los datos del usuario
    return ['user_data' => $user_data];
} else {
    // Error al obtener los datos del usuario
    echo "Error: No se encontraron datos para el usuario con ID: $user_id";
    exit;
}
?>
