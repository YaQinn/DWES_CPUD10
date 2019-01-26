<?php
/**
* CRUD
*/
include "db.php";

class Datos
{
	//Attributos
	private $nombre;
	private $ciudad;
	private $conferencia;
	private $division;
	private $db;
	private $method;

	function __construct($ciudad = '', $conferencia = '', $division = '')
	{
		//Constructor que rellena los atributos
		$this->db = db::getInstance();
		$this->ciudad = $ciudad;
		$this->conferencia = $conferencia;
		$this->division = $division;
	}

	function verificarMetodo($method,$route)
	{
		//Verifica el método enviado
		switch ($method)
		{
			case 'GET':
				//GET --> SELECT
				return self::doGet($route);
				break;
			case 'POST':
				//POST --> INSERT
				if(!empty($route[1]))
				{
					return self::doPost($route);
				}
				else
				{
					return $arr_json = array('status' => 404);
				}
				break;
			case 'PUT':
				//PUT --> UPDATE
				return self::doPut($route);
				break;
			case 'DELETE':
				//DELETE --> DELETE
				return self::doDelete($route);
				break;
			default:
				//Si no es ninguno de los métodos anteriores, devuelve un mensaje de error
				return array('status' => 405);
	      break;
		}
	}

	//GET
	function doGet($route)
	{
		$sql = 'SELECT * FROM nba.equipos WHERE Nombre = :Nombre';
	    $stmt = $this->db->prepare($sql);
	    $stmt->bindValue(":Nombre", $route[2]);
	    $stmt->execute();

	    if($stmt->rowCount() > 0)
	    {
				//Exito
	    	$row  = $stmt->fetch(PDO::FETCH_ASSOC);
				return $arr_json = array('status' => 200, 'client' => $row);
	    }
			else
			{
				//Error
				return $arr_json = array('status' => 404);
	    }
	}

	//POST
	function doPost($route)
	{
		$sql = 'INSERT nba.equipos (Nombre,Ciudad,Conferencia,Division) VALUES (:Nombre,:Ciudad,:Conferencia,:Division)';
	    $stmt = $this->db->prepare($sql);
			$stmt->bindValue(':Nombre', $route[2]);
	    $stmt->bindValue(':Ciudad', $this->ciudad);
	    $stmt->bindValue(':Conferencia', $this->conferencia);
	    $stmt->bindValue(':Division', $this->division);
	    $stmt->execute();

	    if($stmt->rowCount() > 0)
	    {
				//Exito
				return $arr_json = array('status' => 200);
	    }
			else
			{
				//Error
				return $arr_json = array('status' => 400);
	    }
	}

	//PUT
	function doPut($route)
	{
		$sql = 'UPDATE nba.equipos
						SET
							Ciudad = :Ciudad,
							Conferencia = :Conferencia,
							Division = :Division
						WHERE Nombre = :Nombre';

	    $stmt = $this->db->prepare($sql);
	    $stmt->bindValue(':Ciudad', $this->ciudad);
	    $stmt->bindValue(':Conferencia', $this->conferencia);
	    $stmt->bindValue(':Division', $this->division);
	    $stmt->bindValue(":Nombre", $route[2]);
	    $stmt->execute();

	    if($stmt->rowCount() > 0)
	    {
				//Exito
				return $arr_json = array('status' => 200);
	    }
			else
			{
				//Error
				return $arr_json = array('status' => 400);
	    }
	}

	//DELETE
	function doDelete($route)
	{
		$sql = 'DELETE FROM nba.equipos WHERE Nombre = :Nombre';
	    $stmt = $this->db->prepare($sql);
	    $stmt->bindValue(":Nombre", $route[2]);
	    $stmt->execute();
	    if($stmt->rowCount() > 0)
	    {
				//Exito
				return $arr_json = array('status' => 200);
	    }
			else
			{
				//Error
				return $arr_json = array('status' => 400);
	    }
	}
}
?>
