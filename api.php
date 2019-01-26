<?php
/**
 * Recibe peticiones
 */
	include "datos.php";

	$route 	= $_SERVER['REQUEST_URI'];
	$method = $_SERVER['REQUEST_METHOD'];

	$route = substr($route, 1);
	$route = explode("?", $route);
	$route = explode("/", $route[0]);
	$route = array_diff($route, array('php', 'Tema10', 'Caso_Final'));
	$route = array_values($route);

	echo $route[0];

	$arr_json = null;

	if (count($route) <= 5)
	{
		switch ($route[1])
		{
			case 'equipos':
				if (isset($_REQUEST['Ciudad']))
				{
					$datos = new Datos($_REQUEST['Ciudad'],$_REQUEST['Conferencia'],$_REQUEST['Division']);
				}
				else
				{
					$datos = new Datos("","","");
				}
				$arr_json = $datos->verificarMetodo($method,$route);
				break;

			default:
				$arr_json = array('status' => 404);
				break;
		}

	}
	else
	{
		$arr_json = array('status' => 404);
	}

	echo json_encode($arr_json);
?>
