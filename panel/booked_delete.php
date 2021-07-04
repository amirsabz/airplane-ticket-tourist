<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM booked_flight WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'بلیط مورد نظر با موفقیت حذف یا کنسل شد!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا شرکت هواپیمایی مورد نطر را برای حذف انتخاب کنید!';
	}

	header('location: booked.php');

?>
