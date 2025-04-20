<?php 
	
	include_once 'db.php';

	class Productos extends DB{

		private $paginaActual;
		private $totalPaginas;
		private $nResultados;
		private $resultadosPorPagina;
		private $indice;

		//incializamos un constructor
		function __construct($nPorPagina){//numero de resultados que queremos que se muestren por pagina 
			//llamamos al constructor de DB
			parent::__construct();

			$this->resultadosPorPagina = $nPorPagina;
			$this->indice = 0;//es 0 para que cuando se cargue la pagina cargue desde la posicion 0
			$this->paginaActual = 1;

			$this->calcularPaginas();
		}

		//calculamos el numero de las paginas que obtenemos
		function calcularPaginas(){
			//connect() es una funciona de la clase DB
			$query = $this->connect()->query('SELECT COUNT(*) AS total FROM producto');
			//retorna un objeto con el valor de la consulta que hemos hecho
			$this->nResultados = $query->fetch(PDO::FETCH_OBJ)->total;
			//cantidad de paginas que mostrados en nuestra pagina
			$this->totalPaginas = $this->nResultados / $this->resultadosPorPagina;


			//comprobamos si existe la variable pagina
			if (isset($_GET['pagina'])) {
				//validar que pagina sea un numero
				if (is_numeric($_GET['pagina'])) {
					//validar que pagina sea mayor o igual a 1 y menor o igual a totalPaginas
					if ($_GET['pagina'] >=1 && $_GET['pagina'] <= $this->totalPaginas) {


						$this->paginaActual = $_GET['pagina'];
						//posicion en la que debe empezar a mostrar resultados
						$this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
					}

					}else{
						echo "No existe esa pagina";
					}	

			}//fin primer if
			else{
				echo "Error al mostrar la pagina";
			}

		}//fin funcion calcularPaginas


		function mostrarProductos(){

		}

		function mostrarPaginas(){

		}
	}

 ?>