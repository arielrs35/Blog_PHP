
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" conten="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href='https://font.googleapis.com/css?family=Open+Sans'>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA; ?>/css/estilos.css">

	<title>Blog</title>

</head>
<body>
	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo RUTA; ?> ">Mi primer blog</a></p>
			</div>
			<div class="derecha">
				<form class="buscar" name="busqueda" action="<?php echo RUTA; ?>/buscar.php " method="get">
					<input type="text" name="busqueda" placeholder="Buscar"><button type="submit" class="icono fa fa-search"></button>	
				</form>

				<nav class="menu">
					<ul>
						<li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
						<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
						<li><a href="#">Contacto <i class="fa fa-envelope"></i></a></li>
						<?php if (isset($_SESSION['admin'])): ?>
							<li><a href="<?php echo 	RUTA ?>/admin/index.php" >Hola: <?php echo $_SESSION['admin'] ?></a></li>
						<?php else: ?>
							<li><a href="<?php RUTA ?>login.php">Login <i class="fas fa-sign-in-alt"></i></a>
						<?php endif ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>