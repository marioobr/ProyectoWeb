<?php

Class Conexion
{
    private $pdo;
    private $pdoStmt;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;

	public function conectar()
	{
        $serverName = 'localhost';
        $dbName = 'clinicadental';
        $userName = 'root';
        $pwd = '';

		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Se conecto a HR exitosamente!";
            return $this->pdo; 		        
		}
		catch(PDOException $e)
		{
            echo "La conexión ha fallado!";
			die($e->getMessage());
		}
    }
    
    public function desconectar()
    {
        try
		{
            $pdo = null;
            //echo "Se desconectó de HR exitosamente!";
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }
   
}