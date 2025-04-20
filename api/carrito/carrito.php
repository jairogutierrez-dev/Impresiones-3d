<?php 
	include_once '../../lib/session.php';

	//clase Carrito hereda todos los metodos publicos de la clase Session
	class Carrito extends Session{

		function __construct(){
			//llamamos al constructor del padre(Session) y utilizamos su constrcutor con la variable carrito
			//creamos una nueva sesion llamada carrito, dentro de este carrito vamos a guardar un JSON, con los elementos del carrito
			parent::__construct('carrito');
		}


		public function load(){
			//preguntamos por el contenido de la sesion
			if ($this->getValue() == NULL) {
				return [];
			}

			//regresa el valor de la sesion
			return $this->getValue();
		}


		public function add($id){
			//comprobamos si el carrito esta vacio
			if ($this->getValue() == NULL) {
				$items = [];
			}else{
				//decodificamos nuestra JSON'carrito' para convertirlo en un array dentro de php
				$items = json_decode($this->getValue(), 1);

				for($i=0; $i<sizeof($items); $i++) {

					//si recorriendo mi array encontramos un elemento que ya esta anadido solo incrementamos la cantidad
					if ($items[$i]['id_producto'] == $id) {
						//incrementamos la cantida de elementos
						$items[$i]['cantidad']++;
						$this->setValue(json_encode($items));

						return $this->getValue();
					}
				}
			}

			//operaciones cuando el carrito esta vacio, AQUI se crea el valor cantidad de cada item del carrito, cuando anadimos
			//un producto se inicializa a 1
			$item =['id_producto' => (int)$id, 'cantidad' => 1];

			//anadimos al array $items el $item que acabamos de crear
			array_push($items, $item);

			//lo guardamos dentro de nuestra sesion
			$this->setValue(json_encode($items));

			return $this->getValue();

		}



		public function remove($id){
			if ($this->getValue() == NULL) {
				$items = [];
			}else{
				$items = json_decode($this->getValue(), 1);


				for($i=0; $i<sizeof($items); $i++) {

					//si recorriendo mi array encontramos un elemento que ya esta anadido solo incrementamos la cantidad
					if ($items[$i]['id_producto'] == $id) {
						
						$items[$i]['cantidad']--;

						//cuando la cantidad de un elemento es 0 lo borramos del array y reordenamos los indices
						if ($items[$i]['cantidad'] == 0) {
							unset($items[$i]);
							$items = array_values($items);
						}


						$this->setValue(json_encode($items));

						return $this->getValue();
					}
				}
			}
		}




	}

 ?>