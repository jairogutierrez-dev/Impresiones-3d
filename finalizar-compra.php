<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php 
	require "check_auth.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Buscador de modelos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
		<link rel="stylesheet" type="text/css" href="CSS/pageStyles/buscador-de-modelos-estilos.css">
		<link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
		<link rel="stylesheet" type="text/css" href="CSS/pageStyles/finalizar-compra-estilos.css">
		<link rel="stylesheet" type="text/css" href="CSS/all.min.css">


	</head>
	<body>
		<?php
		require "header.php";
		require "finalizar-compra-accion.php";

		?>

		
	<main role="main">

		<div class="div-login">
			<div class="login wrapper">
				<div class="container">
					<!--Div que agrupa el formulario de inicio de sesion -->
					<div class="sigin-signup">

						<div class="forms-container">
							<form action="finalizar-compra.php" method="POST">
								<h2 class="title">Finalizar Compra</h2>
				
								<br>
								<div class="input-field">
									<i class="far fa-credit-card"></i>
									<!-- <label for="inputUser">Usuario</label> -->
									<input type="number" name="user" id="inputUser" placeholder="Nº de Tarjeta" required>
									<br>
								</div>

								<div class="input-field">
									<i class="fas fa-user"></i>
									<!-- <label for="inputPass">Contraseña</label> -->
									<input type="text" name="pass" id="inputPass" placeholder="Titular tarjeta" required>
									<br>

								</div>


								<!-- Formulario que nos deja escoger la fecha de caducidad -->
								<div class="expiracion-contenedor">
									<div class="grupo-expira">
										<label for="selectMes">Expiracion</label>
										<div class="flexbox">
											<div class="grupo-select">
												<select name="mes" id="selectMes" required>
													<option disabled selected>Mes</option>
													<option enabled >1</option>
													<option enabled >2</option>
													<option enabled >3</option>
													<option enabled >4</option>
													<option enabled >5</option>
													<option enabled >6</option>
													<option enabled >7</option>
													<option enabled >8</option>
													<option enabled >9</option>
													<option enabled >10</option>
													<option enabled >11</option>
													<option enabled >12</option>
												</select>
												<!-- <i class="fas fa-angle-down"></i> -->
											</div>
											<div class="grupo-select">
												<select name="year" id="selectYear" required>
													<option disabled selected>Año</option>
													<option enabled >2025</option>
													<option enabled >2026</option>
													<option enabled >2027</option>
													<option enabled >2028</option>
													<option enabled >2029</option>
													<option enabled >2030</option>
													<option enabled >2031</option>
													<option enabled >2032</option>
													<option enabled >2033</option>
												</select>
												<!-- <i class="fas fa-angle-down"></i> -->
											</div>
											<div class="grupo ccv">
												<label for="inputCCV">CCV</label>
												<input type="text" id="inputCCV" maxlength="3" required>
											</div>
										</div>
										
									</div>

									
								</div>

								<!-- -------------------------------------------------------- -->

								<div class="btn-container">
									<input type="submit" id="input-compra" class="btn solid" value="Realizar compra" name="compra-def">
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>

	<?php require "footer.php"; ?>

	<script src="js/compra.js"></script>
	<script src="js/main.js"></script>
	</body>
</html>