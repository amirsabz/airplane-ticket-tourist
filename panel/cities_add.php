<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$provinces = $_POST['provinces'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO cities (province_id, name) VALUES (:provinces, :name)");
				$stmt->execute(['provinces'=>$provinces, 'name'=>$name]);
				$_SESSION['success'] = 'شهر مورد نظر با موفقیت افزوده شد.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'فیلد یا فیلدهای خواسته شده را ابتدا پر نمایید!';
	}

	header('location: cities.php');

?>
