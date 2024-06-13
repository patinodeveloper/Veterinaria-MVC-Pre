<?php
require_once '../models/Pacientes.php';
require_once '../models/PacientesModelo.php';

class PacientesControlador {
    private $pacientesModelo;

    public function __construct() {
        $this->pacientesModelo = new PacientesModelo();
    }

    // Método para agregar un nuevo paciente
    public function agregarPaciente() {
        // Obtener datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST['nombrePaciente'];
            $especie = $_POST['especiePaciente'];
            $raza = $_POST['razaPaciente'];
            $edad = $_POST['edadPaciente'];
            $propietario = $_POST['propietarioPaciente'];
            $telefono = $_POST['telefonoPaciente'];
            $direccion = $_POST['direccionPaciente'];

            $paciente = new Pacientes($nombre, $especie, $raza, $edad, $propietario, $telefono, $direccion);

            $resultado = $this->pacientesModelo->insertarPaciente($paciente);

            if ($resultado) {
                echo "Paciente agregado correctamente.";
            } else {
                echo "Error al agregar el paciente.";
            }
        }
    }

    // obtener todos los pacientes
    public function obtenerPacientes() {
        // Obtener la lista de pacientes desde el modelo
        $listaPacientes = $this->pacientesModelo->obtenerPacientes();
        $pacientes = [];

        // Recorrer la lista de pacientes y construir un array con los datos de cada paciente
        foreach ($listaPacientes as $paciente) {
            $pacientes[] = [
                'id' => $paciente->getId(),
                'nombre' => $paciente->getNombre(),
                'especie' => $paciente->getEspecie(),
                'raza' => $paciente->getRaza(),
                'edad' => $paciente->getEdad(),
                'propietario' => $paciente->getPropietario(),
                'telefono' => $paciente->getTelefono(),
                'direccion' => $paciente->getDireccion()
            ];
        }

        return $pacientes;
    }

    // Método para actualizar un paciente
    public function actualizarPaciente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pacienteId = $_POST['idPacienteMostrado'];
            $nombre = $_POST['nombrePacienteEditar'];
            $especie = $_POST['especiePacienteEditar'];
            $raza = $_POST['razaPacienteEditar'];
            $edad = $_POST['edadPacienteEditar'];
            $propietario = $_POST['propietarioPacienteEditar'];
            $telefono = $_POST['telefonoPacienteEditar'];
            $direccion = $_POST['direccionPacienteEditar'];

            var_dump($pacienteId);
            var_dump($nombre);

            
            $paciente = new Pacientes($nombre, $especie, $raza, $edad, $propietario, $telefono, $direccion, $pacienteId);

            // usar la funcion del modelo
            $resultado = $this->pacientesModelo->actualizarPaciente($paciente);
            if ($resultado) {
                echo "Paciente actualizado correctamente.";
            } else {
                echo "Error al actualizar el paciente.";
            }
        }
    }
    
    // Eliminar un Paciente xd
    public function eliminarPaciente() {
        if (isset($_POST['id'])) {
            $pacienteId = $_POST['id'];

            if ($this->pacientesModelo->eliminarPaciente($pacienteId)) {
                echo "El Paciente y todas sus citas se han eliminado correctamente.";
            } else {
                echo "Error al eliminar el Paciente y sus citas.";
            }
        }
    }
}

?>
