<?php

Class Cita{
    private $idCita;
    private $Fecha;
    private $HoraInicio;
    private $Estado;
    private $Doctor_idDoctor;
    private $Paciente_idPaciente;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}