<?php
session_start(); 

require_once '../controllers/ProductosControlador.php';
$controlador = new ProductosControlador();
$productos = $controlador->obtenerProductos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
        <!-- Estilos de Bootstrap, Font Awesome, DataTables -->
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

    <!-- Contenido y tabla de Gestión de Inventario -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Inventario de Productos</h2>
                <!-- Btn para agregar nuevo producto -->
                <button class="btn btn-primary mb-4 agregarNuevoProducto" style="display: none;" data-bs-toggle="modal" 
                    data-bs-target="#agregarProductoModal">Agregar Nuevo Producto</button>
                <!-- Tabla de productos -->
                <div class="table-responsive">
                    <table id="tablaProductos" class="table table-striped table-bordered table-productos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- datos de los productos obtenidos de la bd -->
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo $producto['descripcion']; ?></td>
                                    <td><?php echo $producto['categoria']; ?></td>
                                    <td><?php echo "$" . number_format($producto['precio'], 2); ?></td>
                                    <td><?php echo $producto['cantidad']; ?></td>
                                    <td>
                                        <div class='d-flex justify-content-center'>
                                            <button class='btn btn-sm btn-primary me-2 editarProductoBtn' data-bs-toggle='modal' data-bs-target='#editarProductoModal'
                                                data-id="<?php echo $producto['id']; ?>"
                                                data-nombre="<?php echo $producto['nombre']; ?>" data-descripcion="<?php echo $producto['descripcion']; ?>"
                                                data-categoria="<?php echo $producto['categoria']; ?>" data-precio="<?php echo $producto['precio']; ?>"
                                                data-cantidad="<?php echo $producto['cantidad']; ?>">
                                                <i class="fa fa-pencil-alt"></i> Editar
                                            </button>
                                            <button class='btn btn-sm btn-danger eliminarProductoBtn' data-id='<?php echo $producto['id']; ?>' data-bs-toggle='modal' data-bs-target='#eliminarProductoModal'>
                                                <i class='fa fa-trash-alt'></i> Eliminar
                                            </button>
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

        <!-- Modal para agregar producto -->
        <div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formAgregarProducto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Nuevo Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionProducto" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="categoriaProducto" class="form-label">Categoría</label>
                                <input type="text" class="form-control" id="categoriaProducto" name="categoriaProducto" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioProducto" class="form-label">Precio Unitario</label>
                                <input type="number" step="0.01" class="form-control" id="precioProducto" name="precioProducto" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidadProducto" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para editar producto -->
        <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formEditarProducto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="productoId" name="productoId">
                            <div class="mb-3">
                                <label for="nombreProductoEditar" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombreProductoEditar" name="nombreProductoEditar" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionProductoEditar" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcionProductoEditar" name="descripcionProductoEditar" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="categoriaProductoEditar" class="form-label">Categoría</label>
                                <input type="text" class="form-control" id="categoriaProductoEditar" name="categoriaProductoEditar" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioProductoEditar" class="form-label">Precio Unitario</label>
                                <input type="number" step="0.01" class="form-control" id="precioProductoEditar" name="precioProductoEditar" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidadProductoEditar" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidadProductoEditar" name="cantidadProductoEditar" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para eliminar producto -->
        <div class="modal fade" id="eliminarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar este producto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Botón para confirmar la eliminación del producto -->
                        <button type="button" class="btn btn-danger confirmarEliminarProducto" id="confirmarEliminarProducto" data-id="ID_DEL_PRODUCTO">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Scripts de Bootstrap, etc -->
        <script src="../plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../plugins/jquery/jquery-3.6.0.js"></script>
    <script src="../plugins/DataTables/datatables.min.js"></script>
    <script src="../plugins/Buttons-3.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="../plugins/DataTables-2.0.2/js/dataTables.bootstrap5.min.js"></script>
    <!-- Scripts de inventario -->
    <script src="../js/gestionar_productos.js"></script>
    <script src="../js/gestion_inventario.js"></script>
</body>

</html>