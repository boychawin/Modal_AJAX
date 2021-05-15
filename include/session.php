<?php
	include 'include/conn.php';
	session_start();


	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
		}

		$pdo->close();
	}	
?>