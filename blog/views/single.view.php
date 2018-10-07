<?php require 'header.php'; ?>

	<div class="contenedor">
		<div class="post">
			<h2 class="titulo"><?php echo $post['titulo']; ?></h2>
			<p class="fecha"><?php echo fecha($post['fecha']); ?></p>
			<div class="thumb">
				
					<img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo']; ?>">
				
			</div>
			<!-- nl2br permite que nos respeten los espaceados en los parrafos -->
			<p class="extract"><?php echo nl2br($post['texto']); ?></p>
			
		</div>

		
	</div>
	

	<?php require'footer.php'; ?>