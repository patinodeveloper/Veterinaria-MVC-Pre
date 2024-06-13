<?php
session_start();
require_once('../models/conexion.php');

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Imprimir las credenciales del usuario (depurar)
echo "Usuario: $username<br>";
echo "Contraseña: $password<br>";

$mongodb = conectarDB(); 

// Verificar si la conexión a MongoDB fue exitosa
if (!$mongodb) {
    echo "Error: No se pudo conectar a la base de datos.";
    exit;
}

// Seleccionar la colección de usuarios
$usuariosCollection = $mongodb->selectCollection('usuarios');

// encontrar un usuario con dichas credenciales
$usuario = $usuariosCollection->findOne(['usuario' => $username, 'contraseña' => $password]);

// Si sí, entonces..
if ($usuario) {
    // Inicio de sesión exitoso
    $_SESSION['user_id'] = $usuario['_id'];
    $_SESSION['username'] = $usuario['usuario'];
    $_SESSION['imagen_perfil'] = $usuario['imagen_perfil']; 
    header("Location: ../views/dashboard.php"); 
    exit;
} else {
    // Credenciales incorrectas
    echo "Usuario o contraseña incorrectos.";
}
?>
