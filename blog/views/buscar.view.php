<?php require 'header.php'; ?>

	<div class="contenedor">
		<h2><?php echo $titulo; ?></h2>
		<?php foreach ($resultados as $post): ?>
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
		 

		 <!--Si no hay resultados es obvio que no tendremos una paginación. 
		 	Salvo que queramos mostrar otros artículos que le puedan interesar al lector.
		 	Lo podemos hacer despues, por ahora asi esta bien-->
		<?php if (empty($resultados)): ?>
			
		<?php else: ?>
			<?php require'paginacion.php'; ?>
		<?php endif ?>
		
	</div>
	

	<?php require'footer.php'; ?>