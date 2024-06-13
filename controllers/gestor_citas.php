<?php
require_once 'CitasControlador.php';

$citasControlador = new CitasControlador();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    $respuesta = "";

    switch ($accion) {
        case 'crear':
           $citasControlador->crearCita();
            break;
        // case 'actualizar':
        //     $citasControlador->actualizarCita();
        //     break;
        case 'eliminar':
            $id = $_POST['id'];
            $respuesta = $citasControlador->eliminarCita($id);
            break;
        default:
            $respuesta = "Acción no reconocida.";
            break;
    }

    // if ($respuesta) {
    //     echo "Operación realizada con éxito.";
    // }
    
}
?>
