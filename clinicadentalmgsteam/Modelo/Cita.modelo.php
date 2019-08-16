<?php
include_once("Connect.php");

Class CitaModelo extends Conexion{
    private $myCon;

	public function listarCita()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM cita";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$cit = new Cita();

				//_SET(CAMPOBD, atributoEntidad)			
				$cit->__SET('idCita', $r->idCita);		
				$cit->__SET('Fecha', $r->Fecha);		
				$cit->__SET('HoraInicio', $r->HoraInicio);		
				$cit->__SET('Estado', $r->Estado);		
				$cit->__SET('Doctor_idDoctor', $r->Doctor_idDoctor);		
				$cit->__SET('Paciente_idPaciente', $r->Paciente_idPaciente);

				$result[] = $cit;

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
	
	public function Registrar(Cita $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO cita (Fecha, HoraInicio, Estado, Doctor_idDoctor, Paciente_idPaciente) 
		        VALUES (?, ?, 1, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('Fecha'),
			 $data->__GET('HoraInicio'),
			 $data->__GET('Estado'),
			 $data->__GET('Doctor_idDoctor'),
			 $data->__GET('Paciente_idPaciente')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizarCita(Cita $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE cita SET 
						Fecha = ?, 
						HoraInicio = ?,
						Estado = 2, 
						Doctor_idDoctor = ?,
						idPaciente = ?
				    WHERE idPaciente = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Fecha'),
					$data->__GET('HoraInicio'),
					$data->__GET('Estado'),
					$data->__GET('Doctor_idDoctor'),
					$data->__GET('Paciente_idPaciente')));
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function obtenerCita($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM cita WHERE idCita = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$cit = new Cita();

			$cit->__SET('idCita', $r->idCita);		
			$cit->__SET('Fecha', $r->Fecha);		
			$cit->__SET('HoraInicio', $r->HoraInicio);		
			$cit->__SET('Estado', $r->Estado);		
			$cit->__SET('Doctor_idDoctor', $r->Doctor_idDoctor);		
			$cit->__SET('Paciente_idPaciente', $r->Paciente_idPaciente);

			return $cit;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminarCita($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM cita WHERE idCita = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}