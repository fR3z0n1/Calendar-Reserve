<?php 

class Connection {

	public static function OpenConnection() {

		$host = 'localhost';
		$db = 'date_bron';
		$user = 'root';
		$pass = '';
		$pdo = null;

		$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

		$pdo = new PDO($dsn, $user, $pass);

		return $pdo; 
	}
}