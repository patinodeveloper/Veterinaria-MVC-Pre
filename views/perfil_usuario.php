<?php

$datos = require_once('../models/obtener_datos_usuario.php');

// Acceder a los datos del usuario
$user_datos = $datos['user_data'];
//var_dump($user_data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <!-- Incluir los estilos de Bootstrap -->
    <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir Font Awesome -->
    <link href="../public/fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet">
    <!-- Estilos propios -->
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php')?>

    <!-- Contenido del Perfil de Usuario -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Imagen de perfil -->
                        <div class="imagen mx-auto">
                            <img src="<?php echo $user_data['imagen_perfil']; ?>" alt="Imagen de perfil" class="img-fluid">
                        </div>
                        <!-- Nombre del usuario -->
                        <h5 class="card-title"><?php echo $user_data['nombre']; ?></h5>
                        <!-- demás datos del usuario -->
                        <p class="card-text">Cargo: <?php echo $user_data['cargo']; ?></p>
                        <p class="card-text">Teléfono: <?php echo $user_data['telefono']; ?></p>
                        <p class="card-text">Dirección: <?php echo $user_data['direccion']; ?></p>
                        <p class="card-text">Correo electrónico: <?php echo $user_data['email']; ?></p>
                        <p class="card-text">Edad: <?php echo $user_data['edad']; ?></p>
                        <p class="card-text">Sexo: <?php echo $user_data['sexo']; ?></p>
                        <p class="card-text">Estado Civil: <?php echo $user_data['estado_civil']; ?></p>
                        <!-- Botón para editar el perfil -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarPerfilModal">
                        Editar Perfil
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar perfil -->
    <div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-labelledby="editarPerfilModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarPerfilModalLabel">Editar perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar perfil -->
                    <form id="editarPerfilForm">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <!-- Campos a editar -->
                        <div class="mb-3">
                            <label for="nombreUsuario" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefonoUsuario" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefonoUsuario" name="telefonoUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccionUsuario" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionUsuario" name="direccionUsuario" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailUsuario" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="edadUsuario" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="edadUsuario" name="edadUsuario" required min="18" max="99">
                        </div>
                        <div class="mb-3">
                            <label for="sexoUsuario" class="form-label">Sexo</label>
                            <select class="form-select" id="sexoUsuario" name="sexoUsuario" required>
                                <option value="">Seleccionar</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="estadoCivilUsuario" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estadoCivilUsuario" name="estadoCivilUsuario" required>
                                <option value="">Seleccionar</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viudo">Viudo</option>
                                <option value="Unión libre">Unión libre</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../plugins/jquery/jquery-3.6.0.min.js"></script>
    <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/actualizar_usuario.js"></script>

</body>

</html>
