<?php
	include_once 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM tourist_attractions_cat WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		$pdo->close();

		echo json_encode($row);
	}
?>
