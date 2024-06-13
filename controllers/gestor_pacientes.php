<?php
require_once 'PacientesControlador.php';

$controlador = new PacientesControlador();

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'crear':
            $controlador->agregarPaciente($_POST);
            break;
        case 'leer':
            $controlador->obtenerPacientes();
            break;
        case 'actualizar':
            $controlador->actualizarPaciente($_POST);
            break;
        case 'eliminar':
            $controlador->eliminarPaciente();
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "No se especificó ninguna acción.";
}
?>