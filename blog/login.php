<?php session_start();

require 'admin/config.php';
require 'function.php';

//Nos conectamos con la base de datos
$conexion=conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD']=='POST') { //comprobamos que se hayan enviado los datos.
	 $usuario = limpiarDatos($_POST['usuario']);
	 $password = limpiarDatos($_POST['password']);
	 $password = hash('sha512', $password);//Desencrimptamos la contraseña previamente encriptada al registrarse.
	 $errores='';

	 $statement = $conexion->prepare('SELECT * FROM login_pass WHERE user=:usuario AND pass=:pasword');
	 $statement->execute(array(':usuario'=>$usuario,':pasword'=>$password));
	 $resultado = $statement->fetch(); //Si no hay datos nos devuelde false.

	 if ($resultado !== false) {
	 	$_SESSION['admin'] = $usuario;
	 	header('Location:'.RUTA.'/admin');
	 	
	 }else{
		$errores.='<li>Ups! Verifica tu usuario o contraseña.</li>';
	}


	 
}

require 'views/login.view.php';

 ?>