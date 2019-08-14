<?php
include_once("Connect.php");

Class DocModelo extends Conexion{
    private $myCon;

	public function listarPac()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM doctor";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$doc = new Doctor();

				//_SET(CAMPOBD, atributoEntidad)			
				$doc->__SET('idDoctor', $r->idDoctor);		
				$doc->__SET('Cedula', $r->cedula);		
				$doc->__SET('CodMINSA', $r->codMinsa);		
				$doc->__SET('Nombres', $r->nombres);		
				$doc->__SET('Apellidos', $r->apellidos);
				$doc->__SET('Telefono', $r->telefono);		
				$doc->__SET('Sexo', $r->sexo);		

				$result[] = $doc;

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
	
	public function Registrar(Doctor $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO doctor (Cedula,CodMINSA,Nombres,Apellidos,Telefono,Telefono,Sexo,Estado) 
		        VALUES (?, ?, ?, ?, ?, ?, 1)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('Cedula'),
			 $data->__GET('CodMINSA'),
			 $data->__GET('Nombres'),
			 $data->__GET('Apellidos'),
			 $data->__GET('Telefono'),
			 $data->__GET('Sexo')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizarDoc(Doctor $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE doctor SET 
						Cedula = ?,
                        CodMINSA = ?, 
						Nombres = ?,
						Apellidos = ?,
						Telefono = ?,
						Sexo = ?,
						Estado = 2 
				    WHERE idDoctor = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Cedula'), 
					$data->__GET('CodMINSA'), 
					$data->__GET('Nombres'), 
					$data->__GET('Apellidos'),
					$data->__GET('Telefono'),
					$data->__GET('Sexo'),
					$data->__GET('idDoctor')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function obtenerDoc($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM doctor WHERE idDoctor = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$doc = new Doctor();

			$doc->__SET('idDoc', $r->idDoctor);
			$doc->__SET('Cedula', $r->cedula);
			$doc->__SET('CodMINSA', $r->codMinsa);
			$doc->__SET('Nombres', $r->nombres);
			$doc->__SET('Apellidos', $r->apellidos);
			$doc->__SET('Telefono', $r->telefono);
			$doc->__SET('Sexo', $r->sexo);

			return $doc;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminarDoc($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM doctor WHERE idDoctor = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}