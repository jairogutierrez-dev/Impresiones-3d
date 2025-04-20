<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require "check_auth.php" ?>

<!-- Conexion y comprobacion de que el usuario y la contraseña -->
<?php
//Conexion e inicializacion con la base de datos
$config = require __DIR__ . '/config_env.php';
$db = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);

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

	// Se asocia el id_usario al user_id de la variable $_SESSION
	$_SESSION['user_id'] = $result->fetch_assoc()['id_usuario'];
	// $_SESSION['user_name'] = $result->fetch_assoc()['nombre'];
	$_SESSION['nick'] = $user;
}
//variable de sesion que corresponde con el id del usuario logueado	
$user_id = $_SESSION['user_id'];

$sql = "SELECT id_usuario, nombre FROM usuario 	WHERE id_usuario ='$user_id'";
$resultado = $db->query($sql);
$row = $resultado->fetch_assoc();
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
		<div class="user-menu">
			<div class="menu wrapper">


				<h3>Hola!, <?php echo ($row['nombre']); ?></h3>


				<div class="pedidos">
					<a href="mi-cuenta-pedidos.php"> <i class="fas fa-shipping-fast"></i> Estado de mis pedidos</a>
				</div>

				<div class="cerrar-sesion">
					<a href="logout.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
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