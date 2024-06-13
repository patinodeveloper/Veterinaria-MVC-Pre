<?php
session_start(); // Iniciar sesión al principio del archivo
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <!-- Estilos de Bootstrap -->
    <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="../css/styles.css">
    

</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php') ?>

    <!-- Contenido de Registro de Ventas -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Registro de Ventas</h2>
                <!-- Botón para agregar nueva venta -->
                <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#agregarVentaModal">Agregar
                    Nueva Venta</button>

                <!-- Tabla de registros de ventas -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Imprimir los registros de ventas... (ya no se implementó :'c) -->
                            <tr>
                                <td>2024-03-18</td>
                                <td>Comida para Perros</td>
                                <td>2</td>
                                <td>$20.00</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detallesVentaModal">Detalles</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar nueva venta -->
    <div class="modal fade" id="agregarVentaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Venta</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar nueva venta -->
                    <form id="formAgregarVenta">
                        <div class="form-group">
                            <label for="productoVenta">Producto</label>
                            <select class="form-control" id="productoVenta" name="productoVenta" required>
                                <option value="">Seleccione un producto</option>
                                <!-- Aquí se cargarían los productos disponibles -->
                                <option value="1">Comida para Perros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidadVenta">Cantidad</label>
                            <input type="number" class="form-control" id="cantidadVenta" name="cantidadVenta" required>
                        </div>
                        <div class="form-group">
                            <label for="precioUnitario">Precio Unitario</label>
                            <input type="number" class="form-control" id="cantidadVenta" name="cantidadVenta" required>
                        </div>
                        <button type="submit" class="btn btn-success">Registrar Venta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para detalles de venta -->
    <div class="modal fade" id="detallesVentaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles de Venta</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Se obtienen los detalles de la venta seleccionada -->
                    <p>Fecha: 2024-03-18</p>
                    <p>Producto: Comida para Perros</p>
                    <p>Cantidad: 2</p>
                    <p>Total: $20.00</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>