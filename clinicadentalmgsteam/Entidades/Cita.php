<?php

Class Cita{
    private $idCita;
    private $fecha;
    private $horaInicio;
    private $estado;
    private $doctorId;
    private $pacienteId;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}