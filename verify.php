<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = 'کلمه عبور اشتباه است!';
					}
				}
				else{
					$_SESSION['error'] = 'حساب شما غیرفعال است!';
				}
			}
			else{
				$_SESSION['error'] = 'ایمیل یافت نشد!';
			}
		}
		catch(PDOException $e){
			echo "مشکلی در ارتباط به وجود آمده است: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'فیلدهای خواسته شده برای ورد را وارد نمایید.';
	}

	$pdo->close();

	header('location: login.php');

?>
