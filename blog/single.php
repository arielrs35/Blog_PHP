<?php session_start();
require 'admin/config.php';
require 'function.php';

$conexion = conexion($bd_config);
$id_articulo = id_articulo($_GET['id']);

if (!$conexion) { // Si no hay conexion nos vamos a la página de error.
	header('Location: error.php');
}

if (empty($id_articulo)) { //Si no hay un id nos vamos al la página principal.
	header('Location: index.php');
	
}

//Le pedimos a la funcion obtener_post_por_id que nos mande los datos del id solocitado.
$post = obtener_post_por_id($conexion,$id_articulo);

if (!$post) { //Si por alguna razón no obtenemos el post nos vamos a la pagina de inicio,
	header('Location: index.php');
	
}

$post = $post[0];

require'views/single.view.php';

 ?>