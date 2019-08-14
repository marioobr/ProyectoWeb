<?php

    include_once("../Entidades/Doctor.php");
    include_once("../Modelo/Doctor.modelo.php");

    $doc = new Doctor();
    $docModelo = new DocModelo();


    if ($_POST) 
    {
        $varAccion = $_POST['txtaccion'];

        switch ($varAccion) 
        {
            case '1':
                try
                {

                    $doc->__SET('Cedula', $_POST['txtcedula']);
                    $doc->__SET('CodMINSA', $_POST['txtminsa']);
                    $doc->__SET('Nombres', $_POST['txtnombres']);
                    $doc->__SET('Apellidos', $_POST['txtapellidos']);
                    $doc->__SET('Telefono', $_POST['txttelefono']);
                    $doc->__SET('Sexo', $_POST['selsexo']);
            
                    $docModelo->Registrar($doc);
                    //var_dump($emp);
                    header("Location: /clinicadentalmgsteam/tblDoctores?msjNewDoc=1");
                    
                }
                catch(Exception $e) {
                    header("Location: /clinicadentalmgsteam/tblDoctores.php?msjEditDoc=2");
                    die($e->getMessage());
                }
                break;
            
            case '2':
                try {
                    $doc->__SET('idDoctor', $_POST['txtid']);
                    $doc->__SET('Cedula', $_POST['txtcedula']);
                    $doc->__SET('CodMINSA', $_POST['txtminsa']);
                    $doc->__SET('Nombres', $_POST['txtnombres']);
                    $doc->__SET('Apellidos', $_POST['txtapellidos']);
                    $doc->__SET('Telefono', $_POST['txttelefono']);
                    $doc->__SET('Sexo', $_POST['selsexo']);
            
                    $docModelo->actualizarDoc($doc);
                    //var_dump($emp);
                    header("Location: /clinicadentalmgsteam/tblDoctores.php?msjEditEmp=1");

                } catch (Exception $e) {
                    header("Location:/clinicadentalmgsteam/tblDoctores.php?msjEditEmp=2");
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
        $emp->__SET('idDoctor', $_GET['idDoc']);
        $empModelo->eliminarEmp($emp->__GET('idDoctor'));
        header("Location: /clinicadentalmgsteam/tblDoctores.php");
    }
    