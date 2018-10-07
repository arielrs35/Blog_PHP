<?php 

function conexion($db_config){ //Esta funcion me permite conectarme a la base de datos cuando se me cante.

try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$db_config['basedatos'], $db_config['usuario'], $db_config['pass']);
	return $conexion;
} catch (PDOException $e) {
	return false;
}

}

function limpiarDatos($datos){ //limpiando datos, seguramente agregare otras que vaya aprendiendo.
	$datos=trim($datos);
	$datos=stripcslashes($datos);
	$datos=htmlspecialchars($datos);
	return $datos;
}

function pagina_actual(){// Nos permitirá saber en que página estamos.
	return isset($_GET['p']) ? (int) $_GET['p'] : 1;
}

function obtener_post($post_por_pagina, $conexion){

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

//Funcion para numero de paginas en paginacion
function numero_paginas($post_por_pagina, $conexion){
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

//funcion que permite eliminar cualquier codigo maldito del id por seguridad
function id_articulo($id){
	return (int)limpiarDatos($id);
}

//Nos permitirá mandar los datos de nuestra base de datos de la id solicitada.
function obtener_post_por_id($conexion,$id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE ID = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

//Para que podamos ordenar nuestra fecha.
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp )-1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de ".$meses[$mes]." del $year";
	return $fecha;
}

//Nos permite comprobar si hay una session activa.
function comprobarSession(){
	if (!isset($_SESSION['admin'])) {
		header('Location: '.RUTA);
	}
}
 
 ?>
