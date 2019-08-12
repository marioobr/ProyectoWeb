<?php
Class Paciente{
    private $idPaciente;
    private $cedula;
    private $noExpediente;
    private $nombres;
    private $apellidos;
    private $edad;
    private $sexo;
    private $telefono;
    private $direccion;
    private $correo;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}