<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT f.id as flightid, f.flight_number, f.departure_datetime, f.arrival_datetime, f.seats, f.price, 
 										ap1.id as departureAirportId, ap1.name as departureAirportName, ap1.slug as departureAirportSlug, 
 										ap2.id as arrivalAirportId, ap2.name as arrivalAirportName, ap2.slug as arrivalAirportSlug,
 										al.id as airlineId, al.name as airlineName, al.logo, al.slug asairlineSlug
 										FROM flights as f
 										INNER JOIN airports as ap1
 										ON f.departure_airport_id = ap1.id
 										INNER JOIN airports as ap2
 										ON f.arrival_airport_id = ap2.id
 										INNER JOIN airlines as al
 										ON f.airline_id=al.id 
 										WHERE f.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		$pdo->close();

		echo json_encode($row);
	}
?>
