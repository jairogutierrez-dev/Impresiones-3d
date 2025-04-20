<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require "check_auth.php" ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/registro-cuenta-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/modal.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/all.min.css">
	<script src="js/modalWindow.js"></script>
</head>

<body>

    <?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	?>
	<?php require "header.php"; ?>

	<?php require "registro.php" ?>

	<?php
	if (isset($mensaje)) {
		echo $mensaje;
	}
	?>
	<div class="div-login">
		<div class="login wrapper">
			<div class="container">
				<!--Div que agrupa el formulario de inicio de sesion -->
				<div class="sigin-signup">

					<div class="forms-container">
						<form method="POST" autocomplete="off">
							<h2 class="title">Registrarse</h2>

							<div class="left-right-container">
								<div class="form-left">
									<!--Nombre -->
									<div class="input-field">
										<i class="fas fa-address-card"></i>
										<input type="text" name="f_nombre" id="form_nombre" placeholder="Nombre *" required>
										<br>
									</div>

									<!--Primer Apellido -->
									<div class="input-field">
										<i class="fas fa-address-card"></i>
										<input type="text" name="apellido_1" id="form_apellido_1" placeholder="Primer apellido *" required>
										<br>
									</div>

									<!--Segundo Apellido  -->
									<div class="input-field">
										<i class="fas fa-address-card"></i>
										<input type="text" name="apellido_2" id="form_apellido_2" placeholder="Segundo apellido" required>
										<br>
									</div>


									<!--nickname Usuario-->
									<div class="input-field">
										<i class="fas fa-user"></i>
										<input type="text" name="nickname" id="form_nickname" placeholder="Nickname usuario *" required>
										<br>
									</div>

									<!--Contraseña -->
									<div class="input-field">
										<i class="fas fa-lock"></i>
										<input type="password" name="f_pass" id="inputPass" placeholder="Contraseña *" placeholder="Contraseña *" required>
										<br>
									</div>

									<!--Contraseña confirmacion-->
									<div class="input-field">
										<i class="fas fa-lock"></i>
										<input type="password" name="f_pass_regconf" id="inputPass_regconf" placeholder="Confirmar contraseña" required>
										<br>
									</div>
								</div>


								<div class="form-right">
									<!--Correo electronico-->
									<div class="input-field">
										<i class="fas fa-envelope"></i>
										<input type="email" name="correo" id="form_correo" placeholder="Correo electrónico *" required>
										<br>
									</div>

									<!-- Direccion de envio 1-->
									<div class="input-field">
										<i class="fas fa-map-marker-alt"></i>
										<input type="text" name="direnvio1" id="form_direnvio1" placeholder="Dirección de envio 1">
										<br>
									</div>


									<!-- Direccion de envio 2-->
									<div class="input-field">
										<i class="fas fa-map-marker-alt"></i>
										<input type="text" name="direnvio2" id="form_direnvio2" placeholder="Dirección de envio 2">
									</div>

									<!-- Codigo Postal-->
									<div class="input-field">
										<i class="fas fa-address-book"></i>
										<input type="text" name="codpos" id="codpos" placeholder="Código postal">
									</div>

									<!-- Provincia-->
									<div class="input-field">
										<i class="fas fa-city"></i>
										<input type="text" name="provincia" id="provincia" placeholder="Provincia">
									</div>

									<!-- Ciudad-->
									<div class="input-field">
										<i class="fas fa-building"></i>
										<input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
									</div>
								</div>
							</div>

							<!-- Boton para registrarse -->
							<div class="btn-container">
								<input type="submit" name="registrarse" class="btn solid" value="Confirmar registro">
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