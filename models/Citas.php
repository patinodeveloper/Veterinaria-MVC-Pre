<?php

class Citas {
    private $id;
    private $idPaciente;
    private $fecha;
    private $hora;
    private $idServicio;
    private $observaciones;

    public function __construct($idPaciente, $fecha, $hora, $idServicio, $observaciones, $id = null) {
        $this->id = $id;
        $this->idPaciente = $idPaciente;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->idServicio = $idServicio;
        $this->observaciones = $observaciones;
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getIdPaciente() {
        return $this->idPaciente;
    }

    public function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getIdServicio() {
        return $this->idServicio;
    }

    public function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }
    
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

}
?>
