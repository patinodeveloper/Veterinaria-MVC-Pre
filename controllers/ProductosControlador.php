<?php
require_once '../models/Productos.php';
require_once '../models/ProductosModelo.php';

class ProductosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new ProductosModelo();
    }

    // Insertar un nuevo producto
    public function agregarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombreProducto'];
            $descripcion = $_POST['descripcionProducto'];
            $categoria = $_POST['categoriaProducto'];
            $precio = floatval($_POST['precioProducto']);
            $cantidad = intval($_POST['cantidadProducto']);

            $producto = new Productos($nombre, $descripcion, $categoria, $precio, $cantidad);

            if ($this->modelo->insertarProducto($producto)) {
                echo "Producto agregado correctamente.";
            } else {
                echo "Error al agregar el producto.";
            }
        } else {
            echo "Método de solicitud no válido.";
        }
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $listaProductos = $this->modelo->obtenerProductos();
        $productos = [];

        foreach ($listaProductos as $producto) {
            $productos[] = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'descripcion' => $producto->getDescripcion(),
                'categoria' => $producto->getCategoria(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $producto->getCantidad()
            ];
        }

        return $productos;
    }

    // Actualizar un producto
    public function actualizarProducto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productoId = $_POST['productoId'];
            $nombre = $_POST['nombreProductoEditar'];
            $descripcion = $_POST['descripcionProductoEditar'];
            $categoria = $_POST['categoriaProductoEditar'];
            $precio = floatval($_POST['precioProductoEditar']);
            $cantidad = intval($_POST['cantidadProductoEditar']);
    
            $producto = new Productos($nombre, $descripcion, $categoria, $precio, $cantidad, $productoId);
    
            if ($this->modelo->actualizarProducto($producto)) {
                echo "Producto actualizado correctamente.";
            } else {
                echo "Error al actualizar el producto o no se encontraron cambios.";
            }
        } else {
            echo "Método de solicitud no permitido.";
        }
    }    

    // Eliminar un producto
    public function eliminarProducto() {
        if (isset($_POST['id'])) {
            $productoId = $_POST['id'];

            if ($this->modelo->eliminarProducto($productoId)) {
                echo "El producto se eliminó correctamente.";
            } else {
                echo "Error al eliminar el producto.";
            }
        }
    }
}
?>
