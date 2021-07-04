<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM tourist_attractions_cat WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'حذف دسته بندی مورد نظر با موفقیت انجام شد!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'دسته بندی مورد نظر را برای حذف انتخاب کنید';
	}

	header('location: category.php');

?>
