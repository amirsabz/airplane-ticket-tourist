<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM provinces WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'این استان وجود دارد!';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO provinces (name) VALUES (:name)");
				$stmt->execute(['name'=>$name]);
				$_SESSION['success'] = 'استان موردنظر با موفقیت افزوده شد.';
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

	header('location: provinces.php');

?>
