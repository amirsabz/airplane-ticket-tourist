<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT c.id as cityId, c.name as cityName, p.name as provincesName 
                                      FROM cities as c
                                      INNER JOIN provinces as p
                                      ON c.province_id = p.id
                                      ");
	$stmt->execute();
	foreach($stmt as $row){
		$output .= "
			<option value='".$row['cityId']."' class='append_items'>".$row['cityName']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>
