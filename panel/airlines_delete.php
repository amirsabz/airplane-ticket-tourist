<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM airlines WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'شرکت هواپیمایی مورد نظر با موفقیت حذف شد!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا شرکت هواپیمایی مورد نطر را برای حذف انتخاب کنید!';
	}

	header('location: airlines.php');

?>
