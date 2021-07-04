<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, ta.id as taId, 
										tac.id as tacId, tac.name as tacName,
										c.id as cityid, c.name as cityName
										FROM tourist_attractions as ta 
										INNER JOIN tourist_attractions_cat as tac
										ON ta.tourist_attractions_cat_id = tac.id
										INNER JOIN cities as c
										ON ta.city_id = c.id");
	$stmt->execute();
	foreach($stmt as $row){
		$output .= "
			<option value='".$row['taId']."' class='append_items'>".$row['name']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>
