<?php
	include 'includes/session.php';

	if(isset($_POST['bc-edit'])){
		$id = $_POST['id'];
		$email = $_POST['email'];

		$conn = $pdo->open();
		
		try{
			$stmt = $conn->prepare("UPDATE `users` SET `email`=:email WHERE `id`=:id");
			$stmt->execute(['email'=>$email, 'id'=>$id]);
			$_SESSION['success'] = 'successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Check the information completely.';
	}

	header('location: index.php');

?>