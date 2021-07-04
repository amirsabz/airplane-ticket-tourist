<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		try{
			$stmt = $conn->prepare("UPDATE provinces SET name=:name WHERE id=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id]);
			$_SESSION['success'] = 'استان مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: provinces.php');

?>
