<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM airports WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'این فرودگاه وجود دارد!';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO airports (name, slug) VALUES (:name, :slug)");
				$stmt->execute(['name'=>$name, 'slug'=>$slug]);
				$_SESSION['success'] = 'فرودگاه با موفقیت افزوده شد.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'ابتدا فیلد یا فیلدهای خواسته شده را پر نمایید!';
	}

	header('location: airports.php');

?>
