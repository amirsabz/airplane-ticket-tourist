<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "book_flight"){
	$save = $crud->book_flight();
	if($save)
		echo $save;
}

if($action == "update_booked"){
	$save = $crud->update_booked();
	if($save)
		echo $save;
}


