<?php
session_start();
require_once('conexion.php');

// Verificar si se recibió un ID de cita válido
if (isset($_POST['id'])) {
    $citaId = $_POST['id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $servicioId = $_POST['servicio'];
    $observaciones = $_POST['observaciones'];

    // Establecer conexión a la base de datos
    $db = conectarDB();

    // Seleccionar la colección de citas
    $citasCollection = $db->citas;

    //  filtro de busqueda por id y la actualización a la bd
    $filter = ['_id' => new MongoDB\BSON\ObjectId($citaId)];
    $update = [
        '$set' => [
            'fecha' => $fecha,
            'hora' => $hora,
            'id_servicio' => new MongoDB\BSON\ObjectId($servicioId),
            'observaciones' => $observaciones
        ]
    ];

    // se ejecuta la consulta previamente preparada
    $updateResult = $citasCollection->updateOne($filter, $update);

    if ($updateResult->getModifiedCount() === 1) {
        // La actualización fue exitosa entonces... :D
        echo "La cita se actualizó correctamente.";
    } else {
        // msj de error
        echo "Error al actualizar la cita o la cita no existe.";
    }
}
?>
