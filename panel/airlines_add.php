<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM airlines WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'این مورد موجود می باشد!';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = uniqid().'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../image/'.$new_filename);
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO airlines ( name, slug, logo) VALUES ( :name, :slug, :photo)");
				$stmt->execute(['name'=>$name, 'slug'=>$slug, 'photo'=>$new_filename]);
				$_SESSION['success'] = 'شرکت هواپیمایی جدید با موفقیت افزوده شد.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'فیلد یا فیلدهای خواسته شده را ابتدا پر نمایید!';
	}

	header('location: airlines.php');

?>
