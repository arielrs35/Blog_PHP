<?php require '../views/header.php'; ?>

	<div class="contenedor">
		<h2>Panel de control</h2>
		<a class="btn" href="nuevo.php">Nuevo Post</a>
		<a class="btn" href="cerrar.php">Cerrar Sesion</a>
		<?php foreach ($posts as $post): ?>
			<div class="post">
				<article>
					<h2 class="titulo"><?php echo $post['id'].'.-'.$post['titulo']; ?></h2>
					<a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>	
					<a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
					<a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>
					<p><?php echo $post['id']; ?></p>
					</article>
			</div>
		<?php endforeach ?>
		 

	<?php require'../paginacion.php'; ?>
	</div>
	<?php require'../views/footer.php'; ?>
