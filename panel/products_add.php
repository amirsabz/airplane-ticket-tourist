<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tourist_attractions WHERE slug=:slug");
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
				$stmt = $conn->prepare("INSERT INTO tourist_attractions (tourist_attractions_cat_id, name, description, address, slug, photo, city_id) VALUES (:category, :name, :description, :address, :slug, :photo, :city_id)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'photo'=>$new_filename, 'address'=>$address, 'city_id'=>$city]);
				$_SESSION['success'] = 'مورد با موفقیت افزوده شد.';

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

	header('location: products.php');

?>
