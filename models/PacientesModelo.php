<?php
require_once 'conexion.php';
require_once 'Pacientes.php';
require '../vendor/autoload.php'; 

class PacientesModelo {
    private $db;
    private $pacientesCollection;
    private $citasCollection;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = conectarDB();
        // Seleccionamos la colección de pacientes y citas
        $this->pacientesCollection = $this->db->pacientes;
        $this->citasCollection = $this->db->citas;

    }

    // Insertar un nuevo paciente
    public function insertarPaciente(Pacientes $paciente) {
        // Arreglo con los datos del paciente
        $nuevoPaciente = [
            'nombre' => $paciente->getNombre(),
            'especie' => $paciente->getEspecie(),
            'raza' => $paciente->getRaza(),
            'edad' => $paciente->getEdad(),
            'propietario' => $paciente->getPropietario(),
            'telefono' => $paciente->getTelefono(),
            'direccion' => $paciente->getDireccion(),
        ];

        // Insertamos el nuevo paciente en la colección
        $result = $this->pacientesCollection->insertOne($nuevoPaciente);

        // Verifica si se insertó correctamente
        return $result->getInsertedCount() === 1;
    }

        // Método para obtener todos los pacientes
    public function obtenerPacientes() {
        // Obtener todos los documentos de la colección de pacientes
        $pacientesCursor = $this->pacientesCollection->find();

        // Inicializar un array para almacenar los pacientes
        $pacientes = [];

        // Recorrer el cursor y agregar cada paciente al array
        foreach ($pacientesCursor as $pacienteDoc) {
            // Verificar si el campo _id está presente en el documento
            $id = isset($pacienteDoc['_id']) ? $pacienteDoc['_id']->__toString() : null;

            $paciente = new Pacientes(
                $pacienteDoc['nombre'],
                $pacienteDoc['especie'],
                $pacienteDoc['raza'],
                $pacienteDoc['edad'],
                $pacienteDoc['propietario'],
                $pacienteDoc['telefono'],
                $pacienteDoc['direccion'],
                $id // Convertir el ID a string
            );
            $pacientes[] = $paciente;
        }

        return $pacientes;
    }

    // Actualizar un producto
    public function actualizarPaciente(Pacientes $paciente) {
        //Obtenemos el id del paciente
        $pacienteId = $paciente->getId();
        //depuracion xd
        //var_dump($pacienteId);

        // Verificar si el ID del producto es válido antes de construir el filtro
        if ($pacienteId && strlen($pacienteId) === 24 && ctype_xdigit($pacienteId)) {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($pacienteId)];
            $update = [
                        '$set' => [
                            'nombre' => $paciente->getNombre(),
                            'especie' => $paciente->getEspecie(),
                            'raza' => $paciente->getRaza(),
                            'edad' => $paciente->getEdad(),
                            'propietario' => $paciente->getPropietario(),
                            'telefono' => $paciente->getTelefono(),
                            'direccion' => $paciente->getDireccion(),
                        ]
                    ];

            $result = $this->pacientesCollection->updateOne($filter, $update);
            if ($result->getModifiedCount() === 1) {
                return true;
            } else {
                echo "No se encontraron cambios en el paciente.";
                return false;
            }
        } else {
            // Manejar el caso en que el ID del producto no es válido
            echo "El ID del Paciente no es válido: $pacienteId";
            var_dump($pacienteId);
            return false;
        }
    }

    public function eliminarPaciente($pacienteId) {
        // filtro para encontrar el paciente por su ID
        $filterPaciente = ['_id' => new MongoDB\BSON\ObjectId($pacienteId)];
    
        // Eliminar el paciente de la coleccion y bd
        $resultPaciente = $this->pacientesCollection->deleteOne($filterPaciente);
    
        // compronar q se ha eliminado
        if ($resultPaciente->getDeletedCount() === 1) {
            // Filtro para eliminar las citas relacionadas al paciente
            $filterCitas = ['id_paciente' => new MongoDB\BSON\ObjectId($pacienteId)];
    
            // Eliminar las citas asociadas :)
            $this->citasCollection->deleteMany($filterCitas);
    
            return true;
        } else {
            // Si no se eliminó el paciente, devolvemos false
            return false;
        }
    }
    
}
?>
