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
				$pac->__SET('Cedula', $r->cedula);		
				$pac->__SET('Nombres', $r->nombres);		
				$pac->__SET('Apellidos', $r->apellidos);		
				$pac->__SET('Edad', $r->edad);		
				$pac->__SET('Sexo', $r->sexo);		
				$pac->__SET('Telefono', $r->telefono);		
				$pac->__SET('Correo', $r->correo);		

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
						Nombres = ?,
						Apellidos = ?, 
						Edad = ?,
						Sexo = ?, 
						Telefono = ?,
						Direccion = ?, 
						Correo = ?,
						Estado = 2 
				    WHERE idPaciente = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Cedula'), 
					$data->__GET('NoExpediente'), 
					$data->__GET('Nombres'), 
					$data->__GET('Apellidos'),
					$data->__GET('Edad'),
					$data->__GET('Sexo'),
					$data->__GET('Telefono'), 
					$data->__GET('Direccion'), 
					$data->__GET('Correo'),
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

			$pac->__SET('idPac', $r->idPaciente);
			$pac->__SET('Cedula', $r->cedula);
			$pac->__SET('NoExpediente', $r->noExpediente);
			$pac->__SET('Nombres', $r->nombres);
			$pac->__SET('Apellidos', $r->apellidos);
			$pac->__SET('Edad', $r->edad);
			$pac->__SET('Sexo', $r->sexo);
			$pac->__SET('Telefono', $r->telefono);
			$pac->__SET('Direccion', $r->direccion);
			$pac->__SET('Correo', $r->correo);

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