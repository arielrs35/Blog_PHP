<?php session_start();

require 'admin/config.php';
require 'function.php';

$conexion=conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$user=limpiarDatos($_POST['usuario']);
	$pass1=limpiarDatos($_POST['password']);
	$pass2=limpiarDatos($_POST['password2']);
	$errores='';

	if (empty($user) or empty($pass1) or empty($pass2)) {
		$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
	}else{
		

		$statement = $conexion->prepare('SELECT * FROM login_pass WHERE user=:usuario LIMIT 1');
		$statement->execute(array(':usuario' => $user ));
		$resultado = $statement->fetch(); //el metodo fech fevuelve false si no existe el usuario

		if ($resultado != false) {
			$errores .= '<li>El nombre de ususario ya existe</li>';
		}

		$pass1 = hash('sha512', $pass1);//Encriptamos la contraseña
		$pass2 = hash('sha512', $pass2);

		if ($pass1 != $pass2) {
			$errores.= '<li>Las contraseñas no son iguales</li>';
		}
	}


	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO login_pass (id,user,pass) VALUES (NULL, :usuario, :pass)');
		$statement->execute(array(':usuario'=>$user, ':pass'=>$pass1));
		header('Location:'.RUTA.'/admin');
		
	}
}




require'views/registrarse.view.php';
 ?>