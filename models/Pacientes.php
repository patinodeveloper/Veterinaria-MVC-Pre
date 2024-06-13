<?php
class Pacientes {
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $edad;
    private $propietario;
    private $telefono;
    private $direccion;

    // Constructor
    public function __construct($nombre, $especie, $raza, $edad, $propietario, $telefono, $direccion, $id = null) {
        $this->id = $id; 
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->propietario = $propietario;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

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

    public function getEspecie() {
        return $this->especie;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getPropietario() {
        return $this->propietario;
    }

    public function setPropietario($propietario) {
        $this->propietario = $propietario;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

}

?>