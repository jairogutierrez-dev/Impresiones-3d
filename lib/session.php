<?php 

class Session{

	private $session = NULL;

	//constructor de esta clase Session
	public function __construct($session_name){
		session_start();

		//si el nombre de la sesion no esta seteado se setea NULL
		if (!isset($_SESSION[$session_name])) {
			$_SESSION[$session_name] = NULL;
			// echo "Sesion $session_name creada";
		}
		// echo "Sesion $session_name ya no existe";

		//nuestra variable session valdra lo que hayamos introducido por el constrcutor que en esta caso sera 'carrito'
		$this->session = $session_name;	
	}

	//funcion que setea el valor de la variable ssession dentro de la variable superglobal $_SESSION
	public function setValue($value){
		$_SESSION[$this->session] = $value;
	}

	//funcion que devulve el valor de la variable ssession dentro de la variable superglobal $_SESSION
	public function getValue(){
		return $_SESSION[$this->session];
	}

}

 ?>