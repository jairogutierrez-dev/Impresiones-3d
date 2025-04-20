<!-- PRINCIPIO DE CABECERA -->
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<nav>
	<!-- <input type="checkbox" id="nav-check"> -->

	<div class="nav-logo">
		<div class="wrapper">

			<div class="nav-logoContainer">
				<div class="top-bar left">
					<div>
						<i class="fas fa-envelope-open"></i>
						impresiones3D@gmail.com
						<br>
						<i class="fas fa-phone-square-alt"></i>
						(+34)91401569
					</div>
				</div>

				<!-- <img src="images/LogoBlanco.png"> -->
				<!-- Arreglar la imagen del header -->
				<a href="index.php" class="logo-header"><img src="images/LogoBlanco.png"></a>

				<div class="top-bar right">
					<div class="lista-derecha-container">
						<ul class="lista-derecha">
							<li class="item-1">

								<?php if ($user_id == -1): ?>

									<a href="login.php">
										<i class="fas fa-user"></i> Acceder
									</a>

								<?php else: ?>
									<a href="mi-cuenta.php">
										<i class="fas fa-user"></i> Mi cuenta
									</a>
								<?php endif ?>
							</li>
							<li class="item-2" style="z-index: 3000">
								<a href="#" class="btn-carrito"><i class="fas fa-shopping-cart"></i> Carrito</a>
								<div id="carrito-container" style="color: black;">
									<div id="tabla" style="color: black;">

									</div>
									<?php if ($user_id == -1): ?>

										<p>Tienes que <a href="login.php" style="color: black;">Acceder</a> o <a href="registro-cuenta.php" style="color: black;">registrarte</a>
											para poder finalizar la compra.</p>

									<?php else: ?>
										<div class="finalizar-compra">
											<a href="finalizar-compra.php" style="color: black;">
												Finalizar compra
											</a>
										</div>


									<?php endif ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>

</nav>


<!-- Div que contiene los menus, materiales, busqueda, guia de diseno -->
<div class="nav-secundario">
	<div class="menu-secundario wrapper">
		<ul>
			<li id="menu-secundario-item1"><a href="materiales.php">MATERIALES</a></li>
			<li id="menu-secundario-item2"><a href="buscador-de-modelos-pelicula.php">BUSQUEDA</a></li>
			<li id="menu-secundario-item3"><a href="guia-diseno.php">GUIA DE DISEÑO</a></li>
		</ul>
	</div>
</div>