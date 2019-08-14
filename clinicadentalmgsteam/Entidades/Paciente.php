<?php
Class Paciente{
    private $idPaciente;
    private $Cedula;
    private $NoExpediente;
    private $Nombres;
    private $Apellidos;
    private $Edad;
    private $Sexo;
    private $Telefono;
    private $Direccion;
    private $Correo;
    private $Estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}