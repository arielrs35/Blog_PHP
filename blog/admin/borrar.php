<?php session_start();

require 'config.php';
require '../function.php';

comprobarSession();

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
}

//recivimos el id que queremos eliminar y lo limpiamos por las moscas.
$id = limpiarDatos($_GET['id']);

if (!$id) {
	header('Location:'.RUTA.'/admin');
}

//Eliminamos el id seleccionado
$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array('id'=>$id));

header('Location:'.RUTA.'/admin');

 ?>