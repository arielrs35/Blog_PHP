<?php require 'header.php'; ?>

<div class="contenedor">
		<div class="post">
			<h2 class="titulo">Iniciar Sesion</h2>
			
			<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<input type="text" name="usuario" placeholder="Usuario">
				<input type="password" name="password" placeholder="Contraseña">
				<input type="submit" name="Iniciar Sesion">
			</form>

				<?php if (!empty($errores)): ?>
				               <div>
				                  <ul>
				                     <?php echo $errores ?>
				                  </ul>
				               </div>
				            <?php endif ?>

			<h3 class="titulo"><a href="registrarse.php">Registrarse</a></h3>
			
		</div>

<?php require'footer.php'; ?>