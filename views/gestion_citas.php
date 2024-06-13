<?php
session_start();

require_once('../controllers/CitasControlador.php');

// Obtener las citas
$controlador = new CitasControlador();
$citas = $controlador->obtenerCitasConPacientesYServicios();

// Imprimir el array para depurar
//var_dump($citas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    <!-- Estilos de frameworks -->
    <link rel="stylesheet" href="../plugins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../plugins/Buttons-3.0.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../plugins/DataTables-2.0.2/css/dataTables.bootstrap5.min.css">
    <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/fontawesome/all.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php') ?>

    <!-- Contenido de Gestión de Citas -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Gestión de Citas</h2>
                <!-- Botón para agregar nueva cita -->
                <button class="btn btn-primary mb-4 agregarCitaModal" style="display:none;" data-bs-toggle="modal" data-bs-target="#agregarCitaModal">Agregar
                    Nueva Cita</button>
                <!-- Tabla de citas -->
                <div class="table-responsive">
                    <table id="tablaCitas" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Mascota</th>
                                <th>Especie</th>
                                <th>Raza</th>
                                <th>Propietario</th>
                                <th>Servicio</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostrar las citas obtenidas de la base de datos -->
                            <?php foreach ($citas as $cita) : ?>
                                <tr>
                                    <td><?= $cita['fecha'] ?></td>
                                    <td><?= $cita['hora'] ?></td>
                                    <td><?= $cita['nombre'] ?></td>
                                    <td><?= $cita['especie'] ?></td>
                                    <td><?= $cita['raza'] ?></td>
                                    <td><?= $cita['propietario'] ?></td>
                                    <td><?= $cita['nombre_servicio'] ?></td>
                                    <td><?= $cita['observaciones'] ?></td>
                                    <td>
                                        <div class='d-flex justify-content-center'>
                                            <div class="me-2">
                                            <button class="btn btn-sm btn-primary editarCitaBtn" 
                                                data-cita-id="<?= $cita['_id'] ?>"
                                                data-paciente-id="<?= $cita['id_paciente'] ?>"
                                                data-fecha="<?= $cita['fecha'] ?>"
                                                data-hora="<?= $cita['hora'] ?>"
                                                data-servicio-id="<?= $cita['id_servicio'] ?>"
                                                data-observaciones="<?= $cita['observaciones'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#editarCitaModal">
                                            <i class='fa fa-pencil-alt'></i> Editar
                                        </button>
                                            </div>
                                            <div class="me-2">
                                                <button class="btn btn-sm btn-danger eliminarCitaBtn" data-cita-id="<?= $cita['_id'] ?>" data-bs-toggle="modal" data-bs-target="#eliminarCitaModal"><i class='fa fa-trash-alt'></i> Eliminar</button>
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

    <!-- Modal para editar cita -->
    <div class="modal fade" id="editarCitaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cita</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar cita -->
                    <form id="formEditarCita">
                        <div class="mb-3">
                            <label for="fechaCitaEditar" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fechaCitaEditar" name="fechaCitaEditar"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="horaCitaEditar" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="horaCitaEditar" name="horaCitaEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="servicioActualCita" class="form-label">Servicio Actual</label>
                            <input type="text" class="form-control" id="servicioActualCita" name="servicioActualCita" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="servicioCitaEditar" class="form-label">Servicio</label>
                            <select class="form-select" id="servicioCitaEditar" name="servicioCitaEditar" required>
                                <option value="">Seleccione un servicio</option>
                                <?php foreach ($servicios as $servicio): ?>
                                    <option value="<?= $servicio['id'] ?>"><?= $servicio['nombre_servicio'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="observacionesCitaEditar" class="form-label">Observaciones</label>
                            <textarea type="text" class="form-control" id="observacionesCitaEditar" name="observacionesCitaEditar" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal para eliminar cita -->
    <div class="modal fade" id="eliminarCitaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Cita</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta cita?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarEliminarCita">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de frameworks -->
    <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../plugins/jquery/jquery-3.6.0.js"></script>
    <script src="../plugins/DataTables/datatables.min.js"></script>
    <script src="../plugins/Buttons-3.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="../plugins/DataTables-2.0.2/js/dataTables.bootstrap5.min.js"></script>
    <!-- Scripts de citas  -->
    <script src="../js/gestion_citas.js"></script>
    <script src="../js/citas.js"></script>
    <script src="../js/editar_cita.js"></script>
    <!-- <script src="../js/eliminar_cita.js"></script> -->
    <script src="../js/servicios.js"></script>

</body>

</html>