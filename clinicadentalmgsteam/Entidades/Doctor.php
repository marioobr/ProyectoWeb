<?php

Class Doctor{
    private $idDoctor;
    private $cedula;
    private $codMinsa;
    private $Nombres;
    private $apellidos;
    private $telefono;
    private $sexo;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}