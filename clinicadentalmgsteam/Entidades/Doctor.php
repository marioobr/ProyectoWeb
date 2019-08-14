<?php

Class Doctor{
    private $idDoctor;
    private $Cedula;
    private $CodMINSA;
    private $Nombres;
    private $Apellidos;
    private $Telefono;
    private $Sexo;
    private $Estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}