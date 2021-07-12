
<?php
	include 'includes/session.php';

	if(isset($_POST['bc-add'])){
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'already have information';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO users (email) VALUES (:email)");
				$stmt->execute(['email'=>$email]);
				$_SESSION['success'] = 'successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Check the information completely.';
	}

	header('location: index.php');

?>