<!-- cualquier inconveniente con el header consultar en header.php -->
<?php require 'header.php'; ?>

	<div class="contenedor">

		<?php foreach ($posts as $post): ?>
			<div class="post">
				<article>
					<h2 class="titulo"><a href="single.php?id=<?php echo $post['id'] ?>"> <?php echo $post['titulo'] ?> </a></h2>
						<p class="fecha"><?php echo fecha($post['fecha']); ?></p>
							<div class="thumb">
								<a href="single.php?id=<?php echo $post['id'] ?>">
									<img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb'] ?>">
								</a>
							</div>
						<p class="extract"><?php echo $post['extracto'] ?></a>
						<a href="single.php?id=<?php echo $post['id'] ?>">Continual leyendo</a>	
					</article>
			</div>
		<?php endforeach ?>
		 

		<?php require'paginacion.php'; ?>
	</div>

	<!-- Cualquier inconveniente con el footer, consultar con el footer.php -->
	<?php require'footer.php'; ?>

	