<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE tourist_attractions SET tourist_attractions_cat_id=:category, name=:name, description=:description, address=:address, slug=:slug, city_id=:city_id WHERE id=:id");
			$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'address'=>$address, 'city_id'=>$city, 'id'=>$id]);
			$_SESSION['success'] = 'جاذبه گردشگری یا خدمات گردشگری مورد نظر با موفقیت به روز رسانی شد.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: products.php');

?>
