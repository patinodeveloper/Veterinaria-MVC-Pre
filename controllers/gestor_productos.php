<?php
require_once 'ProductosControlador.php';

$controlador = new ProductosControlador();

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'crear':
            $controlador->agregarProducto();
            break;
        case 'leer':
            $controlador->obtenerProductos();
            break;
        case 'actualizar':
            $controlador->actualizarProducto();
            break;
        case 'eliminar':
            $controlador->eliminarProducto();
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "No se especificó ninguna acción.";
}
?>
