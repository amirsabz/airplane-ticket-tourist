<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM flights WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'پرواز مورد نظر با موفقیت حذف شد!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا محصول مورد نطر را برای حذف انتخاب کنید!';
	}

	header('location: flights.php');

?>
