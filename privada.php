<?php 
 	//Conexion e inicializacion con la base de datos
	session_start();
	$config = require __DIR__ . '/config_env.php';
    $db = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);

	// 
	if(!isset($_SESSION['user_id'])){
		if(!isset($_POST['user']) || !isset($_POST['pass'])){
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

		$stmt = $db->prepare("SELECT id_usuario FROM usuario WHERE nickname LIKE ? AND pass LIKE ?");
		$stmt->bind_param("ss", $user, $pass);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows != 1){
			header("Location: login.php?relogin=1");
			exit;
		}

		// Se asocia el id_usario al user_id de la variable $_SESSION
		$_SESSION['user_id'] = $result->fetch_assoc()['id_usuario'];
	}

	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Área privada</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Área privada</h1>
		Login correcto
		<a href="perfil.php">Ver perfil</a>
		<a href="logout.php">Cerrar sesión</a>
		<?php 
			echo session_id();
			if($_SESSION['user_id'] == 1){
				$result = $db->query("SELECT id_usuario, nickname FROM usuario;");
		?>
			<table>
				<tr>
					<th>Id</th>
					<th>Nick</th>
				</tr>
		<?php 
				while($user = $result->fetch_assoc()) {
		?>
					<tr>
						<td><?php echo $user['id_usuario'] ?></td>
						<td><?php echo $user['nickname'] ?></td>
					</tr>
		<?php
				}
		?>
			</table>
		<?php
			}
		?>

	<script src="js/main.js"></script>
	</body>
</html>