<?php
	include 'includes/session.php';

	$output = '';
	$province_id = $_POST["province_id"];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM cities WHERE province_id = $province_id");
	$stmt->execute();
	$stmt = $stmt->fetchAll();

	foreach($stmt as $row)
	{
?>
		<option value="<?php echo $row["id"];?>" class='append_items'><?php echo $row["name"];?></option>
<?php

	}

	$pdo->close();
?>





