<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM airlines WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = uniqid().'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../image/'.$new_filename);
		}

		try{
			$stmt = $conn->prepare("UPDATE airlines SET logo=:photo WHERE id=:id");
			$stmt->execute(['photo'=>$new_filename, 'id'=>$id]);
			$_SESSION['success'] = 'تصویر مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'ابتدا تصویر مورد نظر را برای وبرایش انتخاب نمایید!';
	}

	header('location: airlines.php');
?>
