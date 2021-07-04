<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE airlines SET name=:name, slug=:slug WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'id'=>$id]);
			$_SESSION['success'] = 'شرکت هواپیمایی مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: airlines.php');

?>
