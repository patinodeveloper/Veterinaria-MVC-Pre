<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Veterinaria</title>
    <!-- Estilos de Bootstrap -->
    <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar.php')?>

    <!-- Contenido del Dashboard -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Lista de citas del día -->
                <div class="card">
                    <div class="card-header">
                        Citas del día
                    </div>
                    <div class="card-body">
                        <ul id="listaCitas" class="list-group">
                            <!-- Las citas se deberían cargar aquí x'd -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Estadísticas de citas (Ya no se implementó :C ) -->
                <div class="card">
                    <div class="card-header">
                        Estadísticas de citas
                    </div>
                    <div class="card-body">
                        <!-- Gráfico de barras para mostrar la cantidad de citas por día -->
                        <canvas id="citasPorDiaChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../plugins/jquery/jquery-3.6.0.js"></script>
    <!-- Scripts de Chart.js para crear gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Scripts del Dashboard -->
    <script src="../js/dashboard.js"></script>
</body>
</html>
