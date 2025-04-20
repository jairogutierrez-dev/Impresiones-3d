<?php 

	include_once 'db.php';


	/**
	 * 
	 */
	class Productos extends DB{
		
		function __construct(){
			//llamamos al constructor del padre que en este caso es DB y realizamos la conexion con la base de datos
			//lo que hace el constructo es conectaros con nuestra base de datos, definir a la base de datos a la que nos conectamos
			parent::__construct();
		}


		//obtenemos los productos por su id
		public function get($id){
			//Obtenemos TODOS los campos de un producto mediante la id de un producto
			/*$query = $this->connect()->prepare('SELECT * FROM producto WHERE id_producto = :id_producto limit 0,12');*/
			$query = $this->connect()->prepare('SELECT * FROM producto WHERE id_producto = :id_producto ');
			$query->execute(['id_producto' => $id]);


			$row = $query->fetch();
			
			//cuando ejecutamos la funcion execute() nos devuelve un array
			return[
				//dentro del array que devolvemos incrustamos los resultados de nuesstra query SQL
				'id_producto' 	=> $row['id_producto'],
				'nombre' 		=> $row['nombre'],
				'precio' 		=> $row['precio'],
				'imagen' 		=> $row['imagen'],
				'dim_alto' 		=> $row['dim_alto'],
				'dim_ancho' 	=> $row['dim_ancho'],
				'dim_largo' 	=> $row['dim_largo'],
				'material' 		=> $row['material'],
				'dimension' 	=> $row['dimension'],
				'categoria' 	=> $row['categoria']
			];

		}

		//obtenemos los productos por su categoria
		public function getItemsByCategory($category){
			//Obtenemos TODOS los campos de un producto mediante la CATEGORIA de un producto
			$query = $this->connect()->prepare('SELECT * FROM producto WHERE categoria = :cat ');
			$query->execute(['cat' => $category]);


			//arrays que contiene todos los arrays que hemos obtenido
			//INCIALIZACION de la variable $items, array que contiene los demas array que nos van  salir de la consulta sql
			$items=[];

			//obtenemos todos los productos de una categoria y mientras tengamos resultados generamos un array del producto
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				
				//INCIALIZACION de la variable $item, variable donde almacenamos todos los resultados del producto segun la categoria
				//crea un nuevo elemento con la informacion de cada uno de los productos
				$item = [
					'id_producto' 	=> $row['id_producto'],
					'nombre' 		=> $row['nombre'],
					'precio' 		=> $row['precio'],
					'imagen' 		=> $row['imagen'],
					'dim_alto' 		=> $row['dim_alto'],
					'dim_ancho' 	=> $row['dim_ancho'],
					'dim_largo' 	=> $row['dim_largo'],
					'material' 		=> $row['material'],
					'dimension' 	=> $row['dimension'],
					'categoria' 	=> $row['categoria']
				];

				array_push($items, $item);
			}
			return $items;
		}

	}//fin clase productos




 ?>