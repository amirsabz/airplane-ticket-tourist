<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact= $_POST['contact'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE booked_flight SET name=:name, address=:address, contact=:contact WHERE id=:id");
			$stmt->execute(['name'=>$name, 'address'=>$address, 'contact'=>$contact, 'id'=>$id]);
			$_SESSION['success'] = 'اطلاعات مسافر مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: booked.php');

?>
