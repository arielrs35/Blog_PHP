<?php require 'header.php'; ?>

<div  class="contenedor">
	<div class="post">	
   		<h1 class="titulo">Registrate</h1>
   		
   		
   		
   		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">

   			
   				<input type="text" name="usuario" class="usuario" placeholder="Usuario">
   			<br>

   			
   				</i><input type="password" name="password" class="password" placeholder="Contraseña">
   			<br>

   			
   				<input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña">
   				
   			<br>
   				<input type="submit" name="Registrarse">

   			<?php if (!empty($errores)): ?>
   				<div>
   					<ul>
   						<?php echo $errores ?>
   					</ul>
   				</div>
   			<?php endif ?>

   		</form>
   		<h3 class="titulo" > 
   			¿ Ya tenés una cuenta ?
   			<a href="login.php">Iniciar Sesión</a>
   		</h3>
	</div>
</div>

<?php require'footer.php'; ?>