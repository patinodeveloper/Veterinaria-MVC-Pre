<?php
session_start(); 

require_once '../controllers/PacientesControlador.php';
// instancia del controlador de pacientes
$controlador = new PacientesControlador();
$pacientes = $controlador->obtenerPacientes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pacientes</title>
    <!-- Estilos de Bootstrap, Font Awesome, DataTables -->
    <link rel="stylesheet" href="../plugins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../plugins/Buttons-3.0.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../plugins/DataTables-2.0.2/css/dataTables.bootstrap5.min.css">
    <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/fontawesome/all.css">

    <!-- Estilos propios -->
    <link href="../css/styles.css" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php') ?>

    <!-- Contenido de Gestión de Pacientes -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Gestión de Pacientes</h2>
                <!-- Botón para agregar nuevo paciente -->
                <button class="btn btn-primary mb-4 agregarNuevoPaciente" style="display: none;" data-bs-toggle="modal"
                    data-bs-target="#agregarPacienteModal">Agregar Nuevo Paciente</button>
                <!-- Tabla de pacientes -->
                <div class="table-responsive">
                    <table id="tablaPacientes" class="table table-striped table-bordered table-pacientes">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th>Raza</th>
                                <th>Edad</th>
                                <th>Propietario</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPacientesBody">
                            <!-- Mostrar los pacientes obtenidos de la base de datos -->
                            <?php foreach ($pacientes as $paciente): ?>
                                <tr>
                                    <td><?php echo $paciente['nombre']; ?></td>
                                    <td><?php echo $paciente['especie']; ?></td>
                                    <td><?php echo $paciente['raza']; ?></td>
                                    <td><?php echo $paciente['edad']; ?></td>
                                    <td><?php echo $paciente['propietario']; ?></td>
                                    <td><?php echo $paciente['telefono']; ?></td>
                                    <td><?php echo $paciente['direccion']; ?></td>
                                    <td>
                                        <div class='d-flex justify-content-center'>
                                            <div class='me-2'>
                                                <button class='btn btn-sm btn-warning insertarCitaBtn' data-bs-toggle='modal' data-bs-target='#crearCitaModal'
                                                data-id='<?php echo $paciente['id']; ?>'>
                                                <i class='fa fa-calendar-plus'></i> Insertar Cita
                                                </button>
                                            </div>
                                            <!-- eDITAR paciente -->
                                            <div class='me-2'>
                                                <button class='btn btn-sm btn-primary editarPacienteBtn' data-bs-toggle='modal' data-bs-target='#editarPacienteModal'
                                                data-id='<?php echo $paciente['id'];?>'
                                                data-nombre='<?php echo $paciente['nombre']; ?>'
                                                data-especie='<?php echo $paciente['especie']; ?>'
                                                data-raza='<?php echo $paciente['raza']; ?>'
                                                data-edad='<?php echo $paciente['edad']; ?>'
                                                data-propietario='<?php echo $paciente['propietario']; ?>'
                                                data-telefono='<?php echo $paciente['telefono']; ?>'
                                                data-direccion='<?php echo $paciente['direccion']; ?>'>
                                                <i class='fa fa-pencil-alt'></i> Editar
                                                <?php //var_dump($paciente['id']); ?>
                                                </button>
                                            </div>
                                            <div class='ms-2'>
                                                <button class='btn btn-sm btn-danger eliminarPacienteBtn'
                                                data-id='<?php echo $paciente['id']; ?>'
                                                data-bs-toggle='modal'
                                                data-bs-target='#eliminarPacienteModal'>
                                                <i class='fa fa-trash-alt'></i> Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para crear una nueva cita -->
    <div class="modal fade" id="crearCitaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Mostrar el nombre del paciente seleccionado -->
                    <div class="alert alert-info" role="alert">
                        <strong>Paciente:</strong> <span id="nombrePaciente"></span>
                    </div>
                    <!-- Formulario para crear una nueva cita -->
                    <form id="formCrearCita">
                        <input type="hidden" id="pacienteId" name="pacienteId">
                        <div class="mb-3">
                            <label for="fechaCita" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fechaCita" name="fechaCita" required>
                        </div>
                        <div class="mb-3">
                            <label for="horaCita" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="horaCita" name="horaCita" required>
                        </div>
                        <div class="mb-3">
                            <label for="servicioCita" class="form-label">Servicio</label>
                            <select class="form-select" id="servicioCita" name="servicioCita" required>
                                <option value="">Seleccione un servicio</option>
                                <?php foreach ($servicios as $servicio): ?>
                                    <option value="<?= $servicio['id'] ?>"><?= $servicio['nombre_servicio'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="observacionesCita" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observacionesCita" name="observacionesCita" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="guardarCita">Guardar Cita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para agregar nuevo paciente -->
    <div class="modal fade" id="agregarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- formulario para agregar un paciente -->
                    <form id="formAgregarPaciente" method="post" action="../models/insertar_paciente.php">
                        <div class="mb-3">
                            <label for="nombrePaciente" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombrePaciente" name="nombrePaciente" required>
                        </div>
                        <div class="mb-3">
                            <label for="especiePaciente" class="form-label">Especie</label>
                            <input type="text" class="form-control" id="especiePaciente" name="especiePaciente" required>
                        </div>
                        <div class="mb-3">
                            <label for="razaPaciente" class="form-label">Raza</label>
                            <input type="text" class="form-control" id="razaPaciente" name="razaPaciente">
                        </div>
                        <div class="mb-3">
                            <label for="edadPaciente" class="form-label">Edad</label>
                            <input type="text" class="form-control" id="edadPaciente" name="edadPaciente">
                        </div>
                        <div class="mb-3">
                            <label for="propietarioPaciente" class="form-label">Propietario</label>
                            <input type="text" class="form-control" id="propietarioPaciente" name="propietarioPaciente">
                        </div>
                        <div class="mb-3">
                            <label for="telefonoPaciente" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonoPaciente" name="telefonoPaciente">
                        </div>
                        <div class="mb-3">
                            <label for="direccionPaciente" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionPaciente" name="direccionPaciente">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="guardarNuevoPaciente">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar paciente -->
    <div class="modal fade" id="editarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario para editar paciente -->
                    <form id="formEditarPaciente">
                        <!-- Campos del formulario -->
                        <input type="hidden" id="idPacienteMostrado" name="idPacienteMostrado">
                        <!--  mostrar el ID del paciente -->
                        <!-- <p id="idPacienteMostrado"></p> -->

                        <div class="mb-3">
                            <label for="nombrePacienteEditar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombrePacienteEditar" name="nombrePacienteEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="especiePacienteEditar" class="form-label">Especie</label>
                            <input type="text" class="form-control" id="especiePacienteEditar" name="especiePacienteEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="razaPacienteEditar" class="form-label">Raza</label>
                            <input type="text" class="form-control" id="razaPacienteEditar" name="razaPacienteEditar">
                        </div>
                        <div class="mb-3">
                            <label for="edadPacienteEditar" class="form-label">Edad</label>
                            <input type="text" class="form-control" id="edadPacienteEditar" name="edadPacienteEditar">
                        </div>
                        <div class="mb-3">
                            <label for="propietarioPacienteEditar" class="form-label">Propietario</label>
                            <input type="text" class="form-control" id="propietarioPacienteEditar" name="propietarioPacienteEditar">
                        </div>
                        <div class="mb-3">
                            <label for="telefonoPacienteEditar" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonoPacienteEditar" name="telefonoPacienteEditar">
                        </div>
                        <div class="mb-3">
                            <label for="direccionPacienteEditar" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionPacienteEditar" name="direccionPacienteEditar">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="guardarEditarPaciente">Guardar Cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar paciente -->
    <div class="modal fade" id="eliminarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este paciente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger confirmarEliminarPaciente" id="eliminarPaciente">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts de Frameworks -->
    <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../plugins/jquery/jquery-3.6.0.js"></script>
    <script src="../plugins/DataTables/datatables.min.js"></script>
    <script src="../plugins/Buttons-3.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="../plugins/DataTables-2.0.2/js/dataTables.bootstrap5.min.js"></script>
    <!-- Scripts de Pacientes -->
    <script src="../js/pacientes.js"></script>
    <script src="../js/gestion_pacientes.js"></script>
    <!-- Incluir scripts de Citas -->
    <script src="../js/citas.js"></script>
    <!-- <script src="../js/guardar_cita.js"></script> -->
    <script src="../js/servicios.js"></script>
    
</body>

</html>