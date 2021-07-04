<?php
	include 'includes/session.php';
	include 'includes/slugify.php';
	include 'functions/functions.php';

	if(isset($_POST['add'])){
		$de_datetime              =    convertNumbers( $_POST['departure_datetime'] , false);
		$departure_datetime_arr           =    explode('-', $de_datetime );

		$year       =   intval($departure_datetime_arr[0]);
		$month      =  intval(ltrim($departure_datetime_arr[1], '0'));
		$day        =   intval(ltrim($departure_datetime_arr[2], '0'));
		$de_time 		= 	$departure_datetime_arr[3];

		$de_datetime = jalali_to_gregorian($year,$month,$day,'-').$de_time;


		$ar_datetime              =    convertNumbers( $_POST['arrival_datetime'] , false);
		$arrival_datetime_arr           =    explode('-', $ar_datetime );

		$year       =   intval($arrival_datetime_arr[0]);
		$month      =  intval(ltrim($arrival_datetime_arr[1], '0'));
		$day        =   intval(ltrim($arrival_datetime_arr[2], '0'));
		$ar_time    =   $arrival_datetime_arr[3];

		$ar_datetime = jalali_to_gregorian($year,$month,$day,'-').$ar_time;

		$airline = $_POST['airline'];
		$flight_number = $_POST['flight_number'];
		$departure_airport_id = $_POST['departure_airport_id'];
		$arrival_airport_id = $_POST['arrival_airport_id'];
		$departure_datetime = $de_datetime;
		$arrival_datetime = $ar_datetime;
		$seats = $_POST['seats'];
		$price = $_POST['price'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO flights (airline_id, flight_number, departure_airport_id, arrival_airport_id, departure_datetime, arrival_datetime, seats, price) VALUES (:airline_id, :flight_number, :departure_airport_id, :arrival_airport_id, :departure_datetime, :arrival_datetime, :seats, :price)");
				$stmt->execute(['airline_id'=>$airline, 'flight_number'=>$flight_number, 'departure_airport_id'=>$departure_airport_id, 'arrival_airport_id'=>$arrival_airport_id, 'departure_datetime'=>$departure_datetime, 'arrival_datetime'=>$arrival_datetime, 'seats'=>$seats, 'price'=>$price]);
				$_SESSION['success'] = 'پرواز با موفقیت افزوده شد.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'فیلد یا فیلدهای خواسته شده را ابتدا پر نمایید!';
	}

	header('location: flights.php');

?>
