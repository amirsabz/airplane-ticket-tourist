<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
        include '../includes/conn.php';



    $this->db = new Database;
    $this->db = $this->db->conn;
	}
	function __destruct() {
        $this->db = new Database;
	    $this->db->close();
	    ob_end_flush();
	}

	function book_flight(){
		extract($_POST);
		foreach ($name as $k => $value) {
			$data = " flight_id = $flight_id ";
			$data .= " , name = '$name[$k]' ";
			$data .= " , address = '$address[$k]' ";
			$data .= " , contact = '$contact[$k]' ";

            $this->db = new Database;
            $this->db->open();
			$save = $this->db->conn->prepare("INSERT INTO booked_flight set ".$data);
            $save->execute();
		}
		if(isset($save))
			return 1;
	}
	/*function update_booked(){
		extract($_POST);
			$data = "  name = '$name' ";
			$data .= " , address = '$address' ";
			$data .= " , contact = '$contact' ";

            $this->db = new Database;
            $this->db->open();
			$save= $this->db->prepare("UPDATE booked_flight set ".$data." where id =".$id);
            $save->execute();
		if($save)
			return 1;
	}*/
}
