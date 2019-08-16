<?php

    include_once("../Entidades/Paciente.php");
    include_once("../Modelo/Paciente.modelo.php");

    $pac = new Paciente();
    $pacModelo = new PacienteModelo();


    if ($_POST) 
    {
        $varAccion = $_POST['txtaccion'];

        switch ($varAccion) 
        {
            case '1':
                try
                {

                    $pac->__SET('Cedula', $_POST['txtcedula']);
                    $pac->__SET('NoExpediente', $_POST['txtexpediente']);
                    $pac->__SET('Nombres', $_POST['txtnombres']);
                    $pac->__SET('Apellidos', $_POST['txtapellidos']);
                    $pac->__SET('Edad', $_POST['txtedad']);
                    $pac->__SET('Sexo', $_POST['selsexo']);
                    $pac->__SET('Telefono', $_POST['txttelefono']);
                    $pac->__SET('Direccion', $_POST['txtdireccion']);
                    $pac->__SET('Correo', $_POST['txtcorreo']);
            
                    $pacModelo->Registrar($pac);
                    //var_dump($emp);
                    header("Location: clinicadentalmgsteam/tblPacientes.php?msjNewPac=1");
                    
                }
                catch(Exception $e) {
                    header("Location: clinicadentalmgsteam/tblPacientes.php?msjNewPac=2");
                    die($e->getMessage());
                }
                break;
            
            case '2':
                try {
                    $pac->__SET('idPaciente', $_POST['txtIdPac']);
                    $pac->__SET('Cedula', $_POST['txtcedula']);
                    $pac->__SET('NoExpediente', $_POST['txtminsa']);
                    $pac->__SET('Nombres', $_POST['txtnombres']);
                    $pac->__SET('Apellidos', $_POST['txtapellidos']);
                    $pac->__SET('Telefono', $_POST['txttelefono']);
                    $pac->__SET('Estado', $_POST['txttelefono']);
            
                    $pacModelo->actualizarPac($pac);
                    //var_dump($emp);
                    header("Location: clinicadentalmgsteam/tblPacientes.php?msjEditPac=1");

                } catch (Exception $e) {
                    header("Location: clinicadentalmgsteam/tblPacientes.php?msjEditPac=2");
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
        try 
        {
            $pac->__SET('idPaciente', $_GET['idPac']);
            $pacModelo->eliminarPac($pac->__GET('idPaciente'));
            header("Location: Proyecto/clinicadentalmgsteam/tblPacientes.php?eliminado=1");
        } 
        catch(Exception $e)
        {
            header("Location: Proyecto/clinicadentalmgsteam/tblPacientes.php?eliminado=2");
            die($e->getMessage());
        }
    }
    