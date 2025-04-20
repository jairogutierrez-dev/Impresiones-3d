<?php 

	include_once 'productos.php';
	

	//comprobamos si la variable categoris esta definida
	if (isset($_GET['categoria'])) {
		//si existe guardamos la categoria dentro de una variable
		$categoria = $_GET['categoria'];

		//comprobamos is categoria es un string vacio
		if ($categoria == '') {
			//nuestra api-producto nos DEVULEVE UN JSON con la respuesta
			echo json_encode(['statuscode' => 400, 'response' => 'No existe esa categoria']);
		}else{
			//aqui establacemos lo que pasa si categoria SI tiene un valor
			//creamos un objeto productos y lo instanciamos
			$productos =  new Productos();
			$items = $productos->getItemsByCategory($categoria);



			//retornamos nuestos elmentos dentro de un JSON dentro de la variabel items
			echo json_encode(['statuscode' => 200, 'items' => $items]);

		}

	}else if(isset($_GET['get-item'])) {
		$id = $_GET['get-item'];


		if ($id == '') {
			echo json_encode(['statuscode' => 400, 'response' => 'No hay valor para ese id']);
		}else{
			//cargamos la clase productos con sus metodos
			$productos = new Productos();

			//metodo get() nos permite encontrar un producto mediante si $id
			$item = $productos->get($id);
			echo json_encode(['statuscode' => 200, 'item' => $item]);
		}

	}

	else{
		echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
	}

 ?>
