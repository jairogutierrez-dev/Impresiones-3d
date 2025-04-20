<?php

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
		$httpRequest = file_get_contents('http://localhost/php/tienda3d/api/productoss/api-productos.php?get-item=' . $itemCarrito['id_producto']);

		//lo decodificamos para que sea un objeto en php
		$itemProducto = json_decode($httpRequest, 1)['item'];

		//anadimos el campo cantidad a nuestro objeto $itemProducto
		$itemProducto['cantidad'] = $itemCarrito['cantidad'];
		$itemProducto['subtotal'] = round(($itemProducto['cantidad'] * $itemProducto['precio']) * 100) / 100;

		// $itemProducto['subtotal'] = number_format($itemProducto['subtotal'], 2, ',', '.');

		//hacemos un sumatorio de subtotal para saber el precio TOTAL del carrito
		$total += $itemProducto['subtotal'];
		$totalItems += $itemProducto['cantidad'];

		//anadimos al array de fullItems nuesto itemproducto
		array_push($fullItems, $itemProducto);
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
