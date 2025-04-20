<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
include_once 'carrito.php';


if (isset($_GET['action'])) {
	$accion = $_GET['action'];
	$carrito = new Carrito();

	switch ($accion) { //mostrar, anadir y remover
		case 'mostrar':
			mostrar($carrito);
			break;

		case 'add':
			add($carrito);
			break;

		case 'remove':
			remove($carrito);
			break;

		default:
	}
} else {
	echo json_encode(['statuscode' => 404, 'response' => 'No se puede procesar la solicitud']);
}


function mostrar($carrito)
{
	//cargar arreglo en la sesion
	//consultar la base de datos par actualizar los valores de los elementos
	//cuando la decodificamos para a ser un array en php
	$itemsCarrito = json_decode($carrito->load(), 1);

	//variable que contiene toda la informacion de los productos
	$fullItems = [];

	//suma total del precio de los produtos
	$total = 0;

	//cantidad de productos dentro del carrito
	$totalItems = 0;

	foreach ($itemsCarrito as $itemCarrito) {
		//solicitud http a nuestra propia API, conseguimos los datos de un prodcuto mediante su $id 
		$httpRequest = file_get_contents('http://tienda3d.free.nf/api-productos.php?get-item=' . $itemCarrito['id_producto']);
        
        if ($httpRequest === false) {
            echo json_encode([
                'statuscode' => 500,
                'response' => 'No se pudo acceder a api-productos.php'
            ]);
            return;
        }

		//lo decodificamos para que sea un objeto en php
		 $itemProductoRaw = json_decode($httpRequest,true);

		// Verificamos que la respuesta sea válida
		if (!is_array($itemProductoRaw) || !isset($itemProductoRaw['item'])) {
            echo json_encode([
                'statuscode' => 500,
                'response' => 'Error al obtener el producto. Respuesta recibida: ' . $httpRequest
            ]);
            return;
        }

		$itemProducto = $itemProductoRaw['item'];

		// Asegurar que precio sea número (por si viene como string)
        $precio = floatval($itemProducto['precio']);
        $cantidad = intval($itemCarrito['cantidad']);

        $itemProducto['cantidad'] = $cantidad;
        $itemProducto['subtotal'] = round($cantidad * $precio, 2);

        $total += $itemProducto['subtotal'];
        $totalItems += $cantidad;

        $fullItems[] = $itemProducto;
	}

	//configuramos nuestra respuesta en forma de array
	$resArray = array('info' => ['count' => $totalItems, 'total' => $total], 'items' => $fullItems);

	echo json_encode($resArray);
}

function add($carrito)
{
	if (isset($_GET['id_producto'])) {
		$res = $carrito->add($_GET['id_producto']);
		echo $res;
	} else {
		echo json_encode(['statuscode' => 400, 'response' => 'No se puede procesar la solicitud, id vacio']);
	}
}

function remove($carrito)
{
	if (isset($_GET['id_producto'])) {
		$res = $carrito->remove($_GET['id_producto']);
		if ($res) {
			echo json_encode(['statuscode' => 200]);
		} else {
			echo json_encode(['statuscode' => 400]);
		}
	} else {
		echo json_encode(['statuscode' => 400, 'response' => 'No se puede procesar la solicitud, id vacio']);
	}
}
