<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// include_once '../../api/carrito/carrito.php';
require "config.php";
// require "check_auth.php";
$db = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));

if ($db->connect_errno) {
	echo "Falló la conexión con MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	exit;
}

// Función 1: registrar_usuario_pedido
function registrar_usuario_pedido(mysqli $conn, int $id_usuario): int
{

	$result = $conn->query("SELECT MIN(id_usuario) AS minid, MAX(id_usuario) AS maxid FROM usuario LIMIT 1");
	if (!$result) return -99;
	$row = $result->fetch_assoc();

	$minid = (int)$row['minid'];
	$maxid = (int)$row['maxid'];

	if ($id_usuario < 0) return -3;
	if ($id_usuario < $minid) return -1;
	if ($id_usuario > $maxid) return -2;

	$res = $conn->query("SELECT MAX(cod_orden) AS max_cod FROM pedido");
	$row = $res->fetch_assoc();
	$cod_orden = ((int)$row['max_cod']) + 1;

	$fecha_compra = date('Y-m-d H:i:s');
	$fecha_entrega = date('Y-m-d H:i:s', strtotime('+3 days'));
	$num_factura = $id_usuario + $cod_orden + 1000;

	$stmt = $conn->prepare("INSERT INTO pedido (num_factura, fecha_compra, fecha_entrega, cod_orden, estado, fk_usuario) VALUES (?, ?, ?, ?, 'pendiente', ?)");
	$stmt->bind_param("sssii", $num_factura, $fecha_compra, $fecha_entrega, $cod_orden, $id_usuario);

	if (!$stmt->execute()) {
		return -98;
	}

	$stmt->close();
	return 0;
}

// Función 2: registrar_linea_pedido
function registrar_linea_pedido(mysqli $conn, int $id_usuario, int $id_producto, int $cantidad): int
{
	$stmt = $conn->prepare("SELECT MAX(id_pedido) FROM pedido WHERE fk_usuario = ? LIMIT 1");
	$stmt->bind_param("i", $id_usuario);
	$stmt->execute();
	$stmt->bind_result($id_pedido_temp);
	$stmt->fetch();
	$stmt->close();

	$result = $conn->query("SELECT MIN(id_usuario) AS minid, MAX(id_usuario) AS maxid FROM usuario LIMIT 1");
	if ($row = $result->fetch_assoc()) {
		$minid = (int)$row['minid'];
		$maxid = (int)$row['maxid'];
	}

	if ($id_usuario < 0) return -3;
	if ($id_usuario < $minid) return -1;
	if ($id_usuario > $maxid) return -2;

	$id_pedido_producto = $id_pedido_temp . $id_producto;

	$stmt = $conn->prepare("INSERT INTO lineas_pedido (id_pedido_producto, fk_producto, fk_pedido, cantidad) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("siii", $id_pedido_producto, $id_producto, $id_pedido_temp, $cantidad);
	$stmt->execute();
	$stmt->close();

	return 0;
}

// Proceso de compra
if (isset($_POST['compra-def'])) {
	$id_usuario = $_SESSION['user_id'];

	$arrayprueba = [];
	$arrayprueba = json_decode($_SESSION['carrito']);
	$todo_correcto = true;

	if ($arrayprueba === null) {
		$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "❌ Error", content: "El carrito esta vacio"});</script>';
		$_SESSION['mensaje'] = $mensaje;
		header("Location: buscador-de-modelos-pelicula.php");
		$todo_correcto = false;
		exit;
	} else {
		$res = registrar_usuario_pedido($db, $id_usuario);
		if ($res !== 0) {
			echo "❌ Error al registrar pedido (código: $res)";
			exit;
		}
		foreach ($arrayprueba as $clave) {
			$res_linea = registrar_linea_pedido($db, $id_usuario, (int)$clave->id_producto, (int)$clave->cantidad);

			if ($res_linea !== 0) {
				$todo_correcto = false;
				break;
			}
		}
	}

	if ($todo_correcto) {
		$mensaje = '<script type="text/javascript">ModalWindow.openModal({title: "Éxito", content: "Se ha realizado la compra correctamente"});</script>';
		$_SESSION['mensaje'] = $mensaje;
		header("Location: buscador-de-modelos-pelicula.php");
		exit;
	}
}
