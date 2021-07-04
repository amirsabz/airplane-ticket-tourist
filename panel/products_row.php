<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, ta.id as taId, ta.name as taName,
										tac.id as tacId, tac.name as tacName,
										c.id as cityId, c.name as cityName,
										p.id as provincesId, p.name as provincesName
										FROM tourist_attractions as ta 
										INNER JOIN tourist_attractions_cat as tac
										ON ta.tourist_attractions_cat_id = tac.id
										INNER JOIN cities as c
										ON ta.city_id = c.id
										INNER JOIN provinces as p
										ON c.province_id = p.id
		 								WHERE ta.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		$pdo->close();

		echo json_encode($row);
	}
?>
