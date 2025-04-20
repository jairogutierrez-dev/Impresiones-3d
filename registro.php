<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
require "config.php";
$config = require __DIR__ . '/config_env.php';
$db = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);

if ($db->connect_errno) {
	echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	exit;
}

function registrar_usuario(
	mysqli $conn,
	string $f_nombre,
	string $apellido_1,
	string $apellido_2,
	string $correo,
	string $nickname,
	string $f_pass,
	string $direnvio1,
	string $direnvio2,
	string $codpos,
	string $provincia,
	string $ciudad
): int {

	$stmt = $conn->prepare("insert into usuario(`nombre`,`apellido_1`,`apellido_2`,`correo`,`nickname`,`pass`,`direnvio_1`,`direnvio_2`,`codpos`,`provincia`,`ciudad`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $f_nombre, $apellido_1, $apellido_2, $correo, $nickname, $f_pass, $direnvio1, $direnvio2, $codpos, $provincia, $ciudad);
	if (!$stmt->execute()) {
		echo "Error SQL: " . $stmt->error;
		return -98;
	}

	$stmt->close();
	return 0;
}


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['registrarse'])) {

	$resultado = 0;

	//Campos obligatorios dentro del formulario
	if (empty($_POST['f_nombre']) || empty($_POST['apellido_1']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL) || empty($_POST['nickname']) || empty($_POST['f_pass'])) {
		$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "Error",content: "Correo no válido o campo obligatorio vacío"});</script>';
		exit;
	} else {
		$f_nombre = $_POST['f_nombre'];
		$apellido_1 = $_POST['apellido_1'];
		$apellido_2 = $_POST['apellido_2'];
		$correo = $_POST['correo'];
		$nickname = $_POST['nickname'];
		$f_pass = $_POST['f_pass'];
		$f_pass_regconf =  $_POST['f_pass_regconf'];
	}

	// Campos opcionales (convertir vacíos a null)
	$direnvio1 = !empty($_POST['direnvio1']) ? $_POST['direnvio1'] : null;
	$direnvio2 = !empty($_POST['direnvio2']) ? $_POST['direnvio2'] : null;
	$codpos = !empty($_POST['codpos']) ? $_POST['codpos'] : null;
	$provincia = !empty($_POST['provincia']) ? $_POST['provincia'] : null;
	$ciudad = !empty($_POST['ciudad']) ? $_POST['ciudad'] : null;

	//Comprobamos que no existe ningun usuario con el mismo nombre ni con el mismo correo
	$existente = $db->prepare("SELECT * FROM usuario WHERE nombre = ? OR correo = ?");
	$existente->bind_param("ss", $f_nombre, $correo);
	$existente->execute();
	$result = $existente->get_result();



	if ($result->num_rows > 0) {
		$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "Error",content: "Nombre de usuario y/o correo ya existente"});</script>';
	} else if ($f_pass != $f_pass_regconf) {
		$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "Error",content: "Las contraseñas no coinciden"});</script>';
	} else {

		try {
			$resultado = registrar_usuario(
				$db,
				$f_nombre,
				$apellido_1,
				$apellido_2,
				$correo,
				$nickname,
				$f_pass,
				$direnvio1,
				$direnvio2,
				$codpos,
				$provincia,
				$ciudad
			);

			if ($resultado !== 0) {
				echo "❌ Error al registrar usuario (código: $res)";
				exit;
			} else {
				$stmt = true;
			}
		} catch (PDOException $e) {
			print_r('ERROR:' . $e);
		}

		if ($stmt) {
			$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "Registro completado",content: "Se ha registrado correctamente"});</script>';
		}
	}
}
