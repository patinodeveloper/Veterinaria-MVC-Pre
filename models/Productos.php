<?php

class Productos {
    private $id;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $precio;
    private $cantidad;

    // Constructor
    public function __construct($nombre, $descripcion, $categoria, $precio, $cantidad, $id = null) {
        $this->id = $id; 
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->precio = (float)$precio;
        $this->cantidad = (int)$cantidad;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = (float)$precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = (int)$cantidad;
    }
}

?>
