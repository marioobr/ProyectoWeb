<?php

    include_once("../Entidades/Cita.php");
    include_once("../Modelo/Cita.modelo.php");

    $pac = new Cita();
    $citModelo = new CitaModelo();


    if ($_POST) 
    {
        $varAccion = $_POST['txtaccion'];

        switch ($varAccion) 
        {
            case '1':
                try
                {

                    $pac->__SET('Fecha', $_POST['txtFecha']);
                    $pac->__SET('HoraInicio', $_POST['txtTime']);
                    $pac->__SET('Doctor_idDoctor', $_POST['txtDoctor']);
                    $pac->__SET('Paciente_idPaciente', $_POST['txtPaciente']);
            
                    $citModelo->Registrar($pac);
                    //var_dump($emp);
                    header("Location: /clinicadentalmgsteam/tblCitas.php?msjNewCita=1");
                    
                }
                catch(Exception $e) {
                    header("Location: /clinicadentalmgsteam/tblCita.php?msjNewCita=2");
                    die($e->getMessage());
                }
                break;
            
            case '2':
                try {

                    $pac->__SET('Fecha', $_POST['txtFecha']);
                    $pac->__SET('HoraInicio', $_POST['txtTime']);
                    $pac->__SET('Doctor_idDoctor', $_POST['txtDoctor']);
                    $pac->__SET('Paciente_idPaciente', $_POST['txtPaciente']);
            
                    $citModelo->actualizarCita($pac);
                    //var_dump($emp);
                    header("Location: /clinicadentalmgsteam/tblCitas.php?msjEditCita=1");

                } catch (Exception $e) {
                    header("Location:/clinicadentalmgsteam/tblCitas.php?msjEditCita=2");
                    die($e->getMessage());
                }
                
                break;
            
            default:
                # code...
                break;
        }
        

          
    }
    
    if ($_GET) 
    {
        $emp->__SET('idPaciente', $_GET['idPac']);
        $empModelo->eliminarEmp($emp->__GET('idPaciente'));
        header("Location: /clinicadentalmgsteam/tblPacientes.php");
    }
    