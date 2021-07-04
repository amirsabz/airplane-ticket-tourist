<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);

		try{
			$stmt = $conn->prepare("UPDATE tourist_attractions_cat SET name=:name, cat_slug=:cat_slug WHERE id=:id");
			$stmt->execute(['name'=>$name, 'cat_slug'=>$slug, 'id'=>$id]);
			$_SESSION['success'] = 'دسته مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: category.php');

?>
