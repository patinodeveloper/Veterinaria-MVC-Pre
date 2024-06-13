<?php

require_once '../models/CitasModelo.php';

class CitasControlador {
    private $citasModelo;

    public function __construct() {
        $this->citasModelo = new CitasModelo();
    }

    public function crearCita() {
        
        $idPaciente = $_POST['pacienteId'];
        $fecha = $_POST['fechaCita'];
        $hora = $_POST['horaCita'];
        $idServicio = $_POST['servicioCita'];
        $observaciones = $_POST['observacionesCita'];

        // Crear una instancia de una nueva Cita
        $cita = new Citas($idPaciente, $fecha, $hora, $idServicio, $observaciones);

        // Acceder al metodo de CitasModelo para generar una nueva cita
        $resultado = $this->citasModelo->crearCita($cita);

        // Se verifica que se ha creado
        if ($resultado) {
            // funciona...
            echo "La cita se creó correctamente.";
        }
    }

    public function obtenerCitasConPacientesYServicios() {
        $citas = $this->citasModelo->obtenerCitasConPacientesYServicios();

        // Devolver las citas obtenidas
        return $citas;
    }

// // Actualizar una cita
// public function actualizarCita() {
//     $idCita = $_POST['citaId'];
//     $idPaciente = $_POST['pacienteId'];
//     $fecha = $_POST['fechaCitaEditar'];
//     $hora = $_POST['horaCitaEditar'];
//     $idServicio = $_POST['servicioCitaEditar'];
//     $observaciones = $_POST['observacionesCitaEditar'];

//     $cita = new Citas($idPaciente, $fecha, $hora, $idServicio, $observaciones, $idCita);
//     return $this->citasModelo->actualizarCita($cita);
// }

    // Eliminar una cita
    public function eliminarCita($id) {
        return $this->citasModelo->eliminarCita($id);
    }
    
}
?>
