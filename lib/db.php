<?php

class DB
{
	private $host;
	private $db;
	private $user;
	private $password;

	public function __construct()
	{
		$config = require __DIR__ . '/config_env.php';

		$this->host     = $config['DB_HOST'];
		$this->db       = $config['DB_NAME'];
		$this->user     = $config['DB_USER'];
		$this->password = $config['DB_PASS'];
	}


	function connect()
	{

		try {

			$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";port=3306;charset=utf8mb4";
			$options = [
				PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES		=> false,
			];
			$pdo = new PDO($connection, $this->user, $this->password, $options);


			return $pdo;
		} catch (Exception $e) {
			throw new Exception('Error de conexión: ' . $e->getMessage());
		}
	}
}
