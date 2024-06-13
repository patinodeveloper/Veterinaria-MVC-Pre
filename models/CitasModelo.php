<?php

require_once 'conexion.php';
require_once 'Citas.php';
require '../vendor/autoload.php'; 

class CitasModelo {
    private $db;
    private $citasCollection;
    private $pacientesModelo;

    public function __construct() {
        // Obtener la conexión a la base de datos
        $this->db = conectarDB();

        // Seleccionar la colección de citas y
        $this->citasCollection = $this->db->citas;
        // pacientes
        $this->pacientesModelo = $this->db->pacientes;
    }

    public function crearCita(Citas $cita) {
    
        // Convertir el id_paciente a ObjectId
        $idPaciente = new MongoDB\BSON\ObjectId($cita->getIdPaciente());
    
        // Convertir el id_servicio a ObjectId
        $idServicio = new MongoDB\BSON\ObjectId($cita->getIdServicio());
    
        $nuevaCita = [
            'id_paciente' => $idPaciente,
            'fecha' => $cita->getFecha(),
            'hora' => $cita->getHora(),
            'id_servicio' => $idServicio,
            'observaciones' => $cita->getObservaciones()
        ];

        $result = $this->citasCollection->insertOne($nuevaCita);

        return $result->getInsertedCount() == 1;
    }
    

    public function obtenerCitasConPacientesYServicios() {
        // el aggregate para obtener las citas con los datos de los pacientes y servicios relacionados
        $cursor = $this->citasCollection->aggregate([
            [
                '$lookup' => [
                    'from' => 'pacientes', 
                    'localField' => 'id_paciente',
                    'foreignField' => '_id',
                    'as' => 'paciente'
                ]
            ],
            [
                '$lookup' => [
                    'from' => 'servicios', // Nombre de la colección de servicios
                    'localField' => 'id_servicio',
                    'foreignField' => '_id',
                    'as' => 'servicio'
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'fecha' => 1,
                    'hora' => 1,
                    'nombre' => ['$arrayElemAt' => ['$paciente.nombre', 0]],
                    'especie' => ['$arrayElemAt' => ['$paciente.especie', 0]],
                    'raza' => ['$arrayElemAt' => ['$paciente.raza', 0]],
                    'propietario' => ['$arrayElemAt' => ['$paciente.propietario', 0]],
                    'nombre_servicio' => ['$arrayElemAt' => ['$servicio.nombre_servicio', 0]],
                    'observaciones' => 1
                ]
            ]
        ]);

        // Convertir el cursor en un array para poder utilizar los datos
        $citas = iterator_to_array($cursor);

        //devolvemos las citas en un arreglo
        return $citas;
    }

//     // Actualizar una cita
// public function actualizarCita(Citas $cita) {
//     $citaId = $cita->getId();
//     if ($citaId && strlen($citaId) === 24 && ctype_xdigit($citaId)) {
//         $filter = ['_id' => new MongoDB\BSON\ObjectId($citaId)];
//          // Convertir el id_paciente en un ObjectId
//          $idPaciente = new MongoDB\BSON\ObjectId($cita->getIdPaciente());
    
//          // Convertir el id_servicio en un ObjectId
//          $idServicio = new MongoDB\BSON\ObjectId($cita->getIdServicio());
//         $update = [
//             '$set' => [
//                 'id_paciente' => $idPaciente,
//                 'fecha' => $cita->getFecha(),
//                 'hora' => $cita->getHora(),
//                 'id_servicio' => $idServicio,
//                 'observaciones' => $cita->getObservaciones()
//             ]
//         ];

//         try {
//             $result = $this->citasCollection->updateOne($filter, $update);
//             return $result->getModifiedCount() === 1;
//         } catch (Exception $e) {
//             echo "Error al actualizar la cita: " . $e->getMessage();
//             return false;
//         }
//     } else {
//         echo "El ID de la cita no es válido: $citaId";
//         return false;
//     }
// }

    // Eliminar una cita
    public function eliminarCita($citaId) {
        if ($citaId && strlen($citaId) === 24 && ctype_xdigit($citaId)) {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($citaId)];

            try {
                $result = $this->citasCollection->deleteOne($filter);
                return $result->getDeletedCount() === 1;
            } catch (Exception $e) {
                echo "Error al eliminar la cita: " . $e->getMessage();
                return false;
            }
        } else {
            echo "El ID de la cita no es válido: $citaId";
            return false;
        }
    }
}
?>
