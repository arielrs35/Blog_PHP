<?php 

require 'admin/config.php';
require 'function.php';

//Nos conectamos.
$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['busqueda'])){
	$busqueda = limpiarDatos($_GET['busqueda']);//Importante limpiar los datos para que no nos caguen.

	$statement = $conexion->prepare(//Preparamos nuestro query para buscar en nuestra base de datos.
		//Nos traerá todos los datos del articulo que tenga la palabra buscada, ya sea en el titulo o en el texto.
		'SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda'
	);
	$statement->execute(array(':busqueda' => "%$busqueda%"));
	$resultados = $statement->fetchAll();

	if (empty($resultados)) {
		$titulo = 'No se encontraron articulos con el resultado: '.$busqueda;
	}else{
		$titulo = 'Resultados de la busqueda: '.$busqueda;
	} 
}else{
	header('Location: '.RUTA.'/index.php');
}

require 'views/buscar.view.php';

 ?>