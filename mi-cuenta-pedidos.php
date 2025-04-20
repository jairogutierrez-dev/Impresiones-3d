<?php require "check_auth.php" ?>

<!-- Conexion y comprobacion de que el usuario y la contraseña -->
<?php
//Conexion e inicializacion con la base de datos
$config = require __DIR__ . '/config_env.php';
$db = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);

//$_SESSION['user_id']
// $resultado = $db->query($sql);
// $row = $resultado->fetch_assoc();
//Conexion e inicializacion con la base de datos
//$db = new mysqli("localhost:3306", "root", "", "tienda3d");

// 
if (!isset($_SESSION['user_id'])) {
	if (!isset($_POST['user']) || !isset($_POST['pass'])) {
		header("Location: login.php?relogin=1");
		exit;
	}

	// Recogemos las variables puestas en el formulario
	$user = $_POST['user'];
	$pass = $_POST['pass'];


	if ($db->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		exit;
	}

	$stmt = $db->prepare("SELECT id_usuario,nombre FROM usuario WHERE nickname LIKE ? AND pass LIKE ?");
	$stmt->bind_param("ss", $user, $pass);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows != 1) {
		header("Location: login.php?relogin=1");
		exit;
	}
}
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
	<link rel="stylesheet" type="text/css" href="CSS/pageStyles/mi-cuenta-estilos.css">

	<link rel="stylesheet" type="text/css" href="CSS/all.min.css">
</head>

<body>

	<?php require "header.php"; ?>

	<div class="main">




		<div class="wrapper tabla-pedidos">
			<div class="containertable">

				<div class="tabletitle">Pedidos</div>
				<div class="tableheader">Pedido</div>
				<div class="tableheader">Numero factura</div>
				<div class="tableheader">Fecha de compra</div>
				<div class="tableheader">Fecha de entrega</div>
				<div class="tableheader">Estado</div>

				<?php

				$sql = "SELECT num_factura,fecha_compra, fecha_entrega, estado FROM pedido WHERE fk_usuario ='$user_id' ORDER BY fecha_compra ASC";
				$resultado = $db->query($sql);

				//$row=fetch_assoc($resultado)

				while ($row = $resultado->fetch_assoc()) { ?>

					<div class="tableitem"><span></span></div>
					<div class="tableitem"><?php echo $row["num_factura"]; ?> </div>
					<div class="tableitem"><?php echo $row["fecha_compra"]; ?> </div>
					<div class="tableitem"><?php echo $row["fecha_entrega"]; ?> </div>
					<div class="tableitem"><?php echo $row["estado"]; ?> <!-- <button class="btn-informacion"><a href="" style="color: black;">  +  </a></button> --> </div>

				<?php }
				//mysqli_free_result($resultado); 
				?>
			</div>

			<div class="atras">
				<a href="mi-cuenta.php"><i class="fas fa-arrow-circle-left"></i></a>
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