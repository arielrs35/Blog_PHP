<?php session_start();
require 'admin/config.php';
require 'function.php';

//Comprobando la conexion a la base de datos, si algo sale mal nos manda a la página de error o a la ...
 $conexion = conexion($bd_config);
 if (!$conexion) {
 	header('Location: error.php');

}

//Si todo sale bien, estamos listos para cargar los posts.
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

 if (!$posts) {
 	header('Location: error.php');
}

require'views/index.view.php';

 ?>