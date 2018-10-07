<?php session_start();

require'config.php';
require '../function.php';

comprobarSession();

$conexion=conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Reciviendo datos del formulario
	
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name'];
	
	$archivo_subido = '../'. $blog_config['carpeta_imagenes'].$_FILES['thumb']['name'];

	//funcion que mueve el archivo desde la pc al servidor
	move_uploaded_file($thumb, $archivo_subido);

	//Preparando consulta a base de datos
	$statement = $conexion->prepare(
		'INSERT INTO articulos(id, titulo, extracto, texto, thumb) VALUES(null, :titulo, :extracto, :texto, :thumb)');

	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $_FILES['thumb']['name']
		));

	header('Location: '.RUTA.'/admin');//Redirigimos al index de admin.
}

require '../views/nuevo.view.php';

 ?>