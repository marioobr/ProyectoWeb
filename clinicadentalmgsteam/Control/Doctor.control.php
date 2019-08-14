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
                    header("Location: /clinicadentalmgsteam/tblPacientes.php?msjNewEmp=1");
                    
                }
                catch(Exception $e) {
                    header("Location: /clinicadentalmgsteam/tblPacientes.php?msjNewEmp=2");
                    die($e->getMessage());
                }
                break;
            
            case '2':
                try {
                    $pac->__SET('idPaciente', $_POST['txtid']);
                    $pac->__SET('cedula', $_POST['txtcedula']);
                    $pac->__SET('noExpediente', $_POST['txtexpediente']);
                    $pac->__SET('nombres', $_POST['txtnombres']);
                    $pac->__SET('apellidos', $_POST['txtapellidos']);
                    $pac->__SET('edad', $_POST['txtedad']);
                    $pac->__SET('sexo', $_POST['selsexo']);
                    $pac->__SET('telefono', $_POST['txttelefono']);
                    $pac->__SET('direccion', $_POST['txtdireccion']);
                    $pac->__SET('correo', $_POST['txtcorreo']);
            
                    $pacModelo->actualizarEmp($pac);
                    //var_dump($emp);
                    header("Location: /clinicadentalmgsteam/tblPacientes.php?msjEditEmp=1");

                } catch (Exception $e) {
                    header("Location:/clinicadentalmgsteam/tblPacientes.php?msjEditEmp=2");
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
    