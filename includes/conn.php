<?php

Class Database{

	private $server = "mysql:host=localhost;dbname=tourismdb";
	private $username = "root";
	private $password = 123456;
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	public $conn;

	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
			//$this->conn->exec("set names utf8");
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "مشکلی در ارتباط به وجود آمده است: " . $e->getMessage();
 		}

    }

	public function close(){
   		$this->conn = null;
 	}

}

$pdo = new Database();

?>
