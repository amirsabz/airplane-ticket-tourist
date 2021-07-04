<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$provinces = $_POST['provinces'];


		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE cities SET province_id=:provinces, name=:name WHERE id=:id");
			$stmt->execute(['provinces'=>$provinces, 'name'=>$name, 'id'=>$id]);
			$_SESSION['success'] = 'شهر مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: cities.php');

?>
