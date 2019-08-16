<?php
include_once("Connect.php");

Class PacienteModelo extends Conexion{
    private $myCon;

	public function listarPac()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM paciente";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$pac = new Paciente();

				//_SET(CAMPOBD, atributoEntidad)			
				$pac->__SET('idPaciente', $r->idPaciente);		
				$pac->__SET('Cedula', $r->Cedula);		
				$pac->__SET('NoExpediente', $r->NoExpediente);		
				$pac->__SET('Nombres', $r->Nombres);		
				$pac->__SET('Apellidos', $r->Apellidos);		
				$pac->__SET('Edad', $r->Edad);		
				$pac->__SET('Sexo', $r->Sexo);		
				$pac->__SET('Telefono', $r->Telefono);		
				$pac->__SET('Correo', $r->Correo);		

				$result[] = $pac;

				//var_dump($result);
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(Paciente $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO paciente (Cedula,NoExpediente,Nombres,Apellidos,Edad,Sexo,Telefono,Direccion,Correo,Estado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('Cedula'),
			 $data->__GET('NoExpediente'),
			 $data->__GET('Nombres'),
			 $data->__GET('Apellidos'),
			 $data->__GET('Edad'),
			 $data->__GET('Sexo'),
			 $data->__GET('Telefono'),
			 $data->__GET('Direccion'),
			 $data->__GET('Correo')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizarPac(Paciente $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE paciente SET 
						Cedula = ?,
						NoExpediente = ?, 
						Nombres = ?,
						Apellidos = ?, 
						Telefono = ?,
						Estado = 2 
				    WHERE idPaciente = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Cedula'), 
					$data->__GET('NoExpediente'), 
					$data->__GET('Nombres'), 
					$data->__GET('Apellidos'),
					$data->__GET('Telefono'), 
					$data->__GET('idPaciente')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function obtenerPac($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM paciente WHERE idPaciente = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$pac = new Paciente();

			$pac->__SET('idPaciente', $r->idPaciente);		
			$pac->__SET('Cedula', $r->Cedula);		
			$pac->__SET('NoExpediente', $r->NoExpediente);
			$pac->__SET('Nombres', $r->Nombres);		
			$pac->__SET('Apellidos', $r->Apellidos);		
			$pac->__SET('Edad', $r->Edad);		
			$pac->__SET('Sexo', $r->Sexo);		
			$pac->__SET('Telefono', $r->Telefono);
			$pac->__SET('Direccion', $r->Direccion);		
			$pac->__SET('Correo', $r->Correo);

			return $pac;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminarPac($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM paciente WHERE idPaciente = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}