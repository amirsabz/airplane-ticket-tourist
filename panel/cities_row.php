<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, c.id as cityId, c.name as cityName, p.id as provincesId, p.name as provincesName 
										FROM cities as c
										INNER JOIN provinces as p
										ON c.province_id = p.id
		 								WHERE c.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		$pdo->close();

		echo json_encode($row);
	}
?>
