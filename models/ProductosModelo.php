<?php
require_once 'conexion.php';
require_once 'Productos.php';
require '../vendor/autoload.php'; 

class ProductosModelo {
    private $db;
    private $collection;

    public function __construct() {
        $this->db = conectarDB();
        $this->collection = $this->db->inventario;
    }

    // Insertar un nuevo producto
    public function insertarProducto(Productos $producto) {
        $nuevoProducto = [
            'nombre' => $producto->getNombre(),
            'descripcion' => $producto->getDescripcion(),
            'categoria' => $producto->getCategoria(),
            'precio' => $producto->getPrecio(),
            'cantidad' => $producto->getCantidad(),
        ];

        $result = $this->collection->insertOne($nuevoProducto);
        return $result->getInsertedCount() === 1;
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $productosCursor = $this->collection->find();
        $productosArray = [];

        foreach ($productosCursor as $productoDoc) {
            // Verificar si el campo _id está en el documento..
            $id = isset($productoDoc['_id']) ? $productoDoc['_id']->__toString() : null;
        
            $producto = new Productos(
                $productoDoc['nombre'],
                $productoDoc['descripcion'],
                $productoDoc['categoria'],
                $productoDoc['precio'],
                $productoDoc['cantidad'],
                $id
            );
            $productosArray[] = $producto;
        }
        
        return $productosArray;
    }

    // Actualizar un producto
    public function actualizarProducto(Productos $producto) {
        // Verificar si el ID del producto es válido antes de construir el filtro
        $productoId = $producto->getId();
        if ($productoId && strlen($productoId) === 24 && ctype_xdigit($productoId)) {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($productoId)];

            $update = [
                '$set' => [
                    'nombre' => $producto->getNombre(),
                    'descripcion' => $producto->getDescripcion(),
                    'categoria' => $producto->getCategoria(),
                    'precio' => $producto->getPrecio(),
                    'cantidad' => $producto->getCantidad()
                ]
            ];

            $result = $this->collection->updateOne($filter, $update);
            //var_dump($productoId);
            if ($result->getModifiedCount() === 1) {
                return true;
            } else {
                echo "No se encontraron cambios en el producto.";
                return false;
            }
        } else {
            echo "El ID del producto no es válido: $productoId";
            return false;
        }
    }

    // Eliminar un producto
    public function eliminarProducto($productoId) {
        $filter = ['_id' => new MongoDB\BSON\ObjectId($productoId)];
        $result = $this->collection->deleteOne($filter);
        return $result->getDeletedCount() === 1;
    }
    
}
?>
