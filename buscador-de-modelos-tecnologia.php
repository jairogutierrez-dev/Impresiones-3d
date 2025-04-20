<!-- Buscador de modelos de Tecnologia -->
<?php require "check_auth.php" ?>
<!DOCTYPE html>
<html>

<head>
	<title>Buscador de modelos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/buscador-de-modelos-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/all.min.css">


</head>

<body>
	<?php require "header.php"; ?>

	<main role="main">

		<div class="titulo-1 wrapper">
			<h1>Encuentra tu modelo 3D</h1>
			<br>
			<hr>
		</div>
		<!-- <div class="buscador-modelos">
			<div class="buscador wrapper">
				<div class="buscador-caja">
					
					<div class="input-busqueda">
						<input type="text" placeholder="Busca tu objeto" required>
						<div class="btn-busqueda">
							<i class="fas fa-search"></i>
						</div>
					</div>


				</div>
			</div>
		</div> -->

		<?php include_once('layout/menu.php'); ?>


		<div class="modelos-encontrados">
			<div class="objet">

			</div>
		</div>

		<!-- Menu de seleccion de categoria -->


		<!-- Div que contiene todos los objetos de la pagina -->
		<div class="div-buscador">
			<div class="div-cuadrados wrapper">
				<div class="contenedor-objetos-buscados">
					<?php
					require_once('api/productoss/productos.php'); 
                    //$category = 'pelicula';
					//transimitos la respuesta del fichero a una cadena en este caso, es $response
				    $productos = new Productos();
                    $response = $productos->getItemsByCategory('tecnologia');

					// $categoria=gadgets&categoria=fantasia&categoria=videojuego&categoria=animal&categoria=utensilio&categoria=tecnologia


					//como el resultado es true el string se convierte en un array
					if ($response ) {
						//por cada elemento que haya en items lo descomponemos en 1 item
						//items -> array que agrupa todos los objetos de la misma categoria
						foreach ($response as $item) {
							include('layout/items.php');
						}
					} else {
						echo 'No se han podido recuperar los items';
					}


					// var_dump($response);
					?>
				</div>
			</div>
		</div>


	</main>

	<?php require "footer.php"; ?>

	<script src="js/main.js"></script>
</body>

</html>