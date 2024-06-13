<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Veterinaria</a>
        <!-- Botón para togglear el menú en dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion_citas.php">Gestión de Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion_pacientes.php">Gestión de Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion_inventario.php">Gestión de Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro_ventas.php">Registro de Ventas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Imagen del usuario -->
                        <img src="<?php echo isset($_SESSION['imagen_perfil']) ? $_SESSION['imagen_perfil'] : 'placeholder.jpg'; ?>" alt="Imagen de perfil" style="width: 30px; height: 30px; border-radius: 50%;">
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuario'; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil_usuario.php">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../index.html">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
