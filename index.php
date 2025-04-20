<!-- Link de los iconos usados de Font Awesome:https://fontawesome.com/license -->
<!-- Icons made by Smashicons from www.flaticon.com -->
<!-- Icons made by Freepik from www.flaticon.com -->
<!-- Icons made by prettycons from www.flaticon.com -->
<!-- Icons made by Karma from www.flaticon.com -->
<!-- url imagen buscador:<a href="https://www.freepik.es/fotos/ordenador">Foto de Ordenador creado por 8photo - www.freepik.es</a> -->

<!-- Comprobacion si tenemos iniciada la sesion -->
<?php require "check_auth.php" ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>I3D</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/all.min.css">
</head>

<body>

	<!--CABECERA DE LA PAGINA -->
	<?php require "header.php"; ?>

	<!-- Main que incluye desde el nav hacia abajo, que no incluye el buscador -->
	<main class="main" style="margin-bottom: 20px;">
		<section>

			<!-- GIF de la pagina principal, frases y botones-->
			<div class="div-imagen">
				<img src="images\impresora-3d.gif">


				<div class="div-frase">
					<div class="nombre-empresa">IMPRESIONES 3D</div>
					<div class="lema-empresa">Servicio de Impresión 3D Online</div>
					<div class="frase-imagen">precisión calidad fiabilidad</div>
				</div>

				<!-- Botones dentro de la imagen -->
				<div class="btn-imagen">
					<div class="btnBuscar">
						<a href="buscador-de-modelos-pelicula.php">
							<div class="img">
								<img src="images/search-solid.svg">
								<!-- <i class="fas fa-cubes"></i> -->
							</div>
							<div class="text">
								<span>
									BUSCAR UN <br> MODELO
								</span>
							</div>
							<div class="clear">
							</div>
						</a>
					</div>
				</div>

			</div>

			<!-- Menu Entrega rapida, Devolucion, Contacto -->
			<div id="slider-bar" class="slider-bar">
				<div class="slider-info wrapper">
					<ul class="table">
						<li class="col col-1">
							<div class="cell-info">
								<div class="cell-img">
									<i class="fas fa-plane-departure"></i>
								</div>
								<div class="cell-content">
									<span class="cell-caption">Entrega rápida</span>
									<span class="cell-subcaption">en 72 horas</span>
								</div>
							</div>
						</li>



						<li class="col col-2">
							<div class="cell-info">
								<div class="cell-img">
									<i class="fas fa-people-carry"></i>
								</div>
								<div class="cell-content">
									<span class="cell-caption">Devolucion</span>
									<span class="cell-subcaption">gratuita</span>
								</div>
							</div>
						</li>


						<li class="col col-3">
							<div class="cell-info">
								<div class="cell-img">
									<i class="fas fa-headset"></i>
								</div>
								<div class="cell-content">
									<span class="cell-caption">Contáctanos</span>
									<span class="cell-subcaption">91401569</span>
								</div>
							</div>
						</li>

					</ul>
				</div>
			</div>


			<!-- Menu principal donde se explica como funcionar la empresa -->
			<div class="row-1">
				<div class="wrapper">

					<h2 class="title-steps">¿Cómo funciona nuestra empresa?</h2>

					<ul class="steps">
						<!--Primer elemento -->
						<li class="steps-order step-1">
							<div class="picture-step">
								<img src="images/3d.svg">
								<div class="step-icon">
									<i class="fas fa-chevron-circle-right"></i>
								</div>

							</div>


							<div class="text-steps">
								Sube o escoge tu archivo
							</div>
						</li>

						<!--Segundo elemento -->
						<li class="steps-order step-2">
							<div class="picture-step">
								<img src="images/3d-printing-filament.svg">
								<div class="step-icon">
									<i class="fas fa-chevron-circle-right"></i>
								</div>

							</div>

							<div class="text-steps">
								Selecciona el material
							</div>
						</li>


						<!--Tercer elemento -->
						<li class="steps-order step-3">
							<div class="picture-step">
								<img src="images/best-price.svg">
								<div class="step-icon">
									<i class="fas fa-chevron-circle-right"></i>
								</div>

							</div>


							<div class="text-steps">
								Obten tu precio
							</div>
						</li>

						<!--Cuarto elemento -->
						<li class="steps-order step-4">
							<div class="picture-step">
								<img src="images/3d-printer.svg">
								<div class="step-icon">
									<i class="fas fa-chevron-circle-right"></i>
								</div>

							</div>


							<div class="text-steps">
								Nos encargamos de la producción
							</div>
						</li>

						<!--Quinto elemento -->
						<li class="steps-order step-5">
							<div class="picture-step">
								<img src="images/delivery-box.svg">
								<div class="step-icon">
									<i class="fas fa-chevron-circle-right"></i>
								</div>
							</div>


							<div class="text-steps">
								Recibe el producto en tu casa o negocio
							</div>
						</li>
					</ul>

					<hr>
				</div>
			</div>

			<div class="row-2">
				<div class="wrapper">
					<div class="data-info">
						<div class="table-info-title">Servicio de impresión 3D online</div>
						<ul class="table-info">
							<li>
								<div class="data-img">
									<img src="images/3d-printer-row2.svg">
								</div>
								<div class="text-img">
									<p>13.000</p> Piezas impresas en 3D
								</div>
							</li>

							<li>
								<div class="data-img">
									<img src="images/rating.svg">
								</div>
								<div class="text-img">
									<p>99%</p> Clientes satisfechos
								</div>
							</li>

							<li>
								<div class="data-img">
									<img src="images/3d-printing-filament(3).svg">
								</div>
								<div class="text-img">
									<p>14.0000</p> Metros de filamento usado
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</section>
	</main>

	<!-- Div que agrupa wl wrapper y el boton de busqueda encima del boton de buscar -->
	<div class="wrapper">
		<a href="">
			<div class="banner-buscador-general">
				<div class="texto-banner">
					Encuentra el objeto que necesitas en nuestro<br> <b> buscador de modelos</b>
				</div>

				<div class="separador">

				</div>

				<div class="button-banner">
					<div>
						BUSCAR AHORA
					</div>
				</div>
			</div>
		</a>
	</div>

	<!--FOOTER DE LA PAGINA -->
	<?php require "footer.php"; ?>



	<script src="js/main.js"></script>
</body>

</html>
