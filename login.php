<?php require "check_auth.php" ?>
<!DOCTYPE html>
<html>

<head>
	<title>Acceder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/log-in-estilos.css">


	<link rel="stylesheet" type="text/css" href="CSS/all.min.css">
</head>

<body>

	<?php require "header.php"; ?>



	<div class="div-login">
		<div class="login wrapper">
			<div class="container">
				<!--Div que agrupa el formulario de inicio de sesion -->
				<div class="sigin-signup">

					<div class="forms-container">
						<form action="mi-cuenta.php" method="POST">
							<h2 class="title">Iniciar sesión</h2>
							<?php
							if (isset($_GET['relogin'])) {
								if ($_GET['relogin'] == '1') {
							?>
									<p>Usuario o contraseña incorrectos. Vuelve a intentarlo</p>
							<?php
								}
							}
							?>
							<br>
							<div class="input-field">
								<i class="fas fa-user"></i>
								<!-- <label for="inputUser">Usuario</label> -->
								<input type="text" name="user" id="inputUser" placeholder="Usuario" required>
								<br>
							</div>

							<div class="input-field">
								<i class="fas fa-lock"></i>
								<!-- <label for="inputPass">Contraseña</label> -->
								<input type="password" name="pass" id="inputPass" placeholder="Contraseña" required>
								<br>

							</div>
							<div class="btn-container">
								<input type="submit" class="btn solid" value="Acceder">
								<input type="button" class="btn solid" value="Registrarme" onclick="location.href='registro-cuenta.php';">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- Buscador de modelos -->
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
	<?php require "footer.php"; ?>

	<script src="js/main.js"></script>
</body>

</html>